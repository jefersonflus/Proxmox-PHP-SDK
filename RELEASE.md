# Release and Versioning Policy

This project follows Semantic Versioning (`MAJOR.MINOR.PATCH`).

## Versioning Rules

- `MAJOR`: breaking API changes in the SDK public surface (method name/signature removal, behavior incompatibility).
- `MINOR`: new endpoints/methods added in a backward-compatible way.
- `PATCH`: bug fixes, docs-only fixes, CI/tests/build improvements with no public API break.

## Branch and Tag Strategy

- Main branch: `master`.
- Release tags: `vMAJOR.MINOR.PATCH` (example: `v1.4.0`).
- Each release must include release notes summarizing:
  - Added endpoints
  - Fixed route/method mismatches
  - Compatibility or migration notes

## Pre-release Quality Gates

Run all checks before creating a tag:

```bash
composer lint
composer test
composer validate:apidoc
```

## Release Process

1. Confirm `master` is green in CI.
2. Update version and release notes.
3. Create and push tag:

```bash
git tag vX.Y.Z
git push origin vX.Y.Z
```

4. Publish release notes in GitHub Releases.

