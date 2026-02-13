<?php

namespace Curl;

class Curl
{
    public $headers = array();
    public $cookies = array();
    public $lastRequest = null;

    public function setOpts($options)
    {
        return $this;
    }

    public function setHeader($name, $value)
    {
        $this->headers[$name] = $value;
        return $this;
    }

    public function setCookie($name, $value)
    {
        $this->cookies[$name] = $value;
        return $this;
    }

    public function removeHeader($name)
    {
        unset($this->headers[$name]);
        return $this;
    }

    public function get($url, $params = null)
    {
        return $this->respond('GET', $url, $params);
    }

    public function put($url, $params = null)
    {
        return $this->respond('PUT', $url, $params);
    }

    public function post($url, $params = null)
    {
        return $this->respond('POST', $url, $params);
    }

    public function delete($url, $params = null)
    {
        return $this->respond('DELETE', $url, $params);
    }

    private function respond($method, $url, $params)
    {
        $this->lastRequest = (object) array(
            'method' => $method,
            'url' => $url,
            'params' => $params,
        );

        return $this->lastRequest;
    }
}

namespace ProxmoxContractTests;

require_once __DIR__ . '/../src/ProxmoxException.php';
require_once __DIR__ . '/../src/Request.php';
require_once __DIR__ . '/../src/Access.php';
require_once __DIR__ . '/../src/Cluster.php';
require_once __DIR__ . '/../src/Nodes.php';
require_once __DIR__ . '/../src/Pools.php';
require_once __DIR__ . '/../src/Storage.php';
require_once __DIR__ . '/../src/Version.php';

$GLOBALS['__contract_tests_total'] = 0;
$GLOBALS['__contract_tests_failures'] = array();

function reset_request_client()
{
    $client = new \Curl\Curl();
    $reflection = new \ReflectionClass('\Proxmox\Request');

    $defaults = array(
        'hostname' => 'proxmox.test',
        'username' => '',
        'password' => '',
        'token_name' => '',
        'token_value' => '',
        'realm' => 'pam',
        'port' => 8006,
        'ticket' => null,
        'Client' => $client,
    );

    foreach ($defaults as $propertyName => $value) {
        if (!$reflection->hasProperty($propertyName)) {
            continue;
        }
        $property = $reflection->getProperty($propertyName);
        if (!$property->isPublic()) {
            $property->setAccessible(true);
        }
        $property->setValue(null, $value);
    }

    return $client;
}

function assert_true($condition, $message)
{
    if (!$condition) {
        throw new \Exception($message);
    }
}

function assert_same($expected, $actual, $message)
{
    if ($expected != $actual) {
        $expectedDump = var_export($expected, true);
        $actualDump = var_export($actual, true);
        throw new \Exception($message . "\nExpected: " . $expectedDump . "\nActual:   " . $actualDump);
    }
}

function assert_call($response, $method, $path, $params = null, $checkParams = true)
{
    assert_true(is_object($response), 'Expected response object from fake Curl client.');
    assert_same($method, $response->method, 'Unexpected HTTP method.');

    $prefix = 'https://proxmox.test:8006/api2/json';
    assert_true(strpos($response->url, $prefix) === 0, 'Unexpected request URL prefix: ' . $response->url);
    $actualPath = substr($response->url, strlen($prefix));
    assert_same($path, $actualPath, 'Unexpected request path.');

    if ($checkParams) {
        assert_same($params, $response->params, 'Unexpected request params.');
    }
}

function run_test($name, $callback)
{
    $GLOBALS['__contract_tests_total']++;
    try {
        $callback();
        print "[PASS] " . $name . PHP_EOL;
    } catch (\Throwable $error) {
        $GLOBALS['__contract_tests_failures'][] = array(
            'name' => $name,
            'message' => $error->getMessage(),
        );
        print "[FAIL] " . $name . PHP_EOL;
    }
}

function finish_contract_suite()
{
    $total = $GLOBALS['__contract_tests_total'];
    $failures = $GLOBALS['__contract_tests_failures'];
    $failedCount = count($failures);
    $passedCount = $total - $failedCount;

    print PHP_EOL;
    print "Total: " . $total . " | Passed: " . $passedCount . " | Failed: " . $failedCount . PHP_EOL;

    if ($failedCount > 0) {
        print PHP_EOL . "Failure details:" . PHP_EOL;
        foreach ($failures as $failure) {
            print "- " . $failure['name'] . PHP_EOL;
            print "  " . str_replace(PHP_EOL, PHP_EOL . "  ", $failure['message']) . PHP_EOL;
        }
        exit(1);
    }
}

