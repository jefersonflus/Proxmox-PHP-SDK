#!/usr/bin/env node

'use strict';

const fs = require('fs');
const path = require('path');
const https = require('https');
const vm = require('vm');

const API_DOC_URL = process.env.PVE_APIDOC_URL || 'https://pve.proxmox.com/pve-docs/api-viewer/apidoc.js';
const SRC_DIR = path.join(process.cwd(), 'src');
const VALID_METHODS = new Set(['GET', 'POST', 'PUT', 'DELETE']);

function fetchText(url, redirectCount = 0) {
  return new Promise((resolve, reject) => {
    if (redirectCount > 5) {
      reject(new Error('Too many redirects while fetching apidoc.js'));
      return;
    }

    https
      .get(url, (response) => {
        const status = response.statusCode || 0;
        if (status >= 300 && status < 400 && response.headers.location) {
          const next = new URL(response.headers.location, url).toString();
          response.resume();
          fetchText(next, redirectCount + 1).then(resolve).catch(reject);
          return;
        }

        if (status !== 200) {
          reject(new Error(`Failed to fetch apidoc.js (HTTP ${status})`));
          response.resume();
          return;
        }

        const chunks = [];
        response.on('data', (chunk) => chunks.push(chunk));
        response.on('end', () => resolve(Buffer.concat(chunks).toString('utf8')));
      })
      .on('error', reject);
  });
}

function normalizePathTemplate(pathValue) {
  let value = String(pathValue || '');
  if (!value.startsWith('/')) {
    value = `/${value}`;
  }

  // Convert PHP string interpolation placeholders first, then normalize all template vars.
  value = value.replace(/\$[A-Za-z_][A-Za-z0-9_]*/g, '{}');
  value = value.replace(/\{[^}]+\}/g, '{}');
  return value;
}

function parseOfficialPairs(apiDocSource) {
  const context = { Ext: { onReady: function onReady() {} } };
  vm.createContext(context);
  vm.runInContext(`${apiDocSource}\nthis.__apiSchema = apiSchema;`, context);

  const pairs = new Set();

  function walk(node) {
    if (Array.isArray(node)) {
      node.forEach(walk);
      return;
    }
    if (!node || typeof node !== 'object') {
      return;
    }
    if (node.path && node.info && typeof node.info === 'object') {
      const normalizedPath = normalizePathTemplate(node.path);
      Object.keys(node.info)
        .filter((method) => VALID_METHODS.has(method))
        .forEach((method) => {
          pairs.add(`${method} ${normalizedPath}`);
        });
    }
    if (node.children) {
      walk(node.children);
    }
  }

  walk(context.__apiSchema);
  return pairs;
}

function lineNumberAt(source, index) {
  return source.slice(0, index).split('\n').length;
}

function parseImplementedPairs(sourceDir) {
  const files = fs
    .readdirSync(sourceDir)
    .filter((name) => name.endsWith('.php'))
    .sort()
    .map((name) => path.join(sourceDir, name));

  const pairs = new Map();
  const invalidMethods = [];

  // Capture Request::Request("<path>", ..., "<method>");
  const requestCallRegex = /Request::Request\(\s*(['"])(.*?)\1([\s\S]*?)\)\s*;/g;

  files.forEach((filePath) => {
    const source = fs.readFileSync(filePath, 'utf8');
    let match;
    while ((match = requestCallRegex.exec(source)) !== null) {
      const fullCall = match[0];
      const rawPath = match[2];
      const line = lineNumberAt(source, match.index);

      let method = 'GET';
      const explicitMethodMatch = fullCall.match(/,\s*(['"])([A-Za-z]+)\1\s*\)\s*;$/s);
      if (explicitMethodMatch) {
        const explicit = explicitMethodMatch[2];
        if (!VALID_METHODS.has(explicit)) {
          invalidMethods.push({
            file: path.relative(process.cwd(), filePath),
            line,
            method: explicit,
            path: rawPath,
          });
          continue;
        }
        method = explicit;
      }

      const normalizedPath = normalizePathTemplate(rawPath);
      const key = `${method} ${normalizedPath}`;
      if (!pairs.has(key)) {
        pairs.set(key, []);
      }
      pairs.get(key).push({
        file: path.relative(process.cwd(), filePath),
        line,
        method,
        path: rawPath,
      });
    }
  });

  return { pairs, invalidMethods };
}

function printMismatches(mismatches, implemented) {
  mismatches.forEach((key) => {
    const refs = implemented.get(key) || [];
    refs.forEach((ref) => {
      process.stderr.write(
        `${ref.file}:${ref.line} ${ref.method} ${ref.path} -> normalized ${key}\n`
      );
    });
  });
}

async function main() {
  const apiDocSource = await fetchText(API_DOC_URL);
  const officialPairs = parseOfficialPairs(apiDocSource);
  const { pairs: implementedPairs, invalidMethods } = parseImplementedPairs(SRC_DIR);

  const implementedPairKeys = [...implementedPairs.keys()];
  const mismatches = implementedPairKeys.filter((key) => !officialPairs.has(key)).sort();
  const missing = [...officialPairs].filter((key) => !implementedPairs.has(key)).sort();

  process.stdout.write(`official_pairs=${officialPairs.size}\n`);
  process.stdout.write(`implemented_pairs=${implementedPairKeys.length}\n`);
  process.stdout.write(`mismatches=${mismatches.length}\n`);
  process.stdout.write(`missing_pairs=${missing.length}\n`);
  process.stdout.write(`invalid_method_literals=${invalidMethods.length}\n`);

  if (invalidMethods.length) {
    process.stderr.write('\nInvalid HTTP method literals:\n');
    invalidMethods.forEach((item) => {
      process.stderr.write(`${item.file}:${item.line} ${item.method} ${item.path}\n`);
    });
  }

  if (mismatches.length) {
    process.stderr.write('\nImplemented routes not matched in official apidoc:\n');
    printMismatches(mismatches, implementedPairs);
  }

  if (invalidMethods.length || mismatches.length) {
    process.exit(1);
  }
}

main().catch((error) => {
  process.stderr.write(`${error.message}\n`);
  process.exit(1);
});

