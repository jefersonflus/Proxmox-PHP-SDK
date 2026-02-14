<?php

namespace ProxmoxContractTests;

function register_nodes_contract_tests()
{
    run_test('Nodes::Capabilities maps to GET /nodes/{node}/capabilities', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->Capabilities('node-a');
        assert_call($result, 'GET', '/nodes/node-a/capabilities', null);
    });

    run_test('Nodes::capabilitiesQemuMigration maps to GET /nodes/{node}/capabilities/qemu/migration', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->capabilitiesQemuMigration('node-a');
        assert_call($result, 'GET', '/nodes/node-a/capabilities/qemu/migration', null);
    });

    run_test('Nodes::createCephMds maps to POST /nodes/{node}/ceph/mds/{name}', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('hotstandby' => 1);
        $result = $nodes->createCephMds('node-a', 'mds1', $payload);
        assert_call($result, 'POST', '/nodes/node-a/ceph/mds/mds1', $payload);
    });

    run_test('Nodes::CephConfigValue forwards query params', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('config-keys' => 'mon_allow_pool_delete');
        $result = $nodes->CephConfigValue('node-a', $payload);
        assert_call($result, 'GET', '/nodes/node-a/ceph/cfg/value', $payload);
    });

    run_test('Nodes::qemuAgentExecStatus maps to GET /nodes/{node}/qemu/{vmid}/agent/exec-status', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('pid' => 12);
        $result = $nodes->qemuAgentExecStatus('node-a', 100, $payload);
        assert_call($result, 'GET', '/nodes/node-a/qemu/100/agent/exec-status', $payload);
    });

    run_test('Nodes::qemuAgentShutdown maps to POST /nodes/{node}/qemu/{vmid}/agent/shutdown', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('timeout' => 30);
        $result = $nodes->qemuAgentShutdown('node-a', 100, $payload);
        assert_call($result, 'POST', '/nodes/node-a/qemu/100/agent/shutdown', $payload);
    });

    run_test('Nodes::scanPbs maps to GET /nodes/{node}/scan/pbs', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('server' => 'pbs.example.local');
        $result = $nodes->scanPbs('node-a', $payload);
        assert_call($result, 'GET', '/nodes/node-a/scan/pbs', $payload);
    });

    run_test('Nodes::storageRRD maps to GET /nodes/{node}/storage/{storage}/rrd with params', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->storageRRD('node-a', 'local', 'cpu', 'hour', 'AVERAGE');
        assert_call(
            $result,
            'GET',
            '/nodes/node-a/storage/local/rrd',
            array('ds' => 'cpu', 'timeframe' => 'hour', 'cf' => 'AVERAGE')
        );
    });

    run_test('Nodes::storageUpload legacy signature keeps backward compatibility', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->storageUpload('node-a', array('storage' => 'local', 'content' => 'iso'));
        assert_call(
            $result,
            'POST',
            '/nodes/node-a/storage/local/upload',
            array('content' => 'iso')
        );
    });

    run_test('Nodes::storageRRD throws when storage is missing', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $thrown = false;

        try {
            $nodes->storageRRD('node-a');
        } catch (\Proxmox\ProxmoxException $exception) {
            $thrown = true;
        }

        assert_true($thrown, 'Expected ProxmoxException when storage is missing.');
    });

    run_test('Nodes::Node maps to GET /nodes/{node}', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->Node('node-a');
        assert_call($result, 'GET', '/nodes/node-a', null);
    });

    run_test('Nodes::nodeStatus maps to GET /nodes/{node}/status', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->nodeStatus('node-a');
        assert_call($result, 'GET', '/nodes/node-a/status', null);
    });

    run_test('Nodes::nodeConfig maps to GET /nodes/{node}/config', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->nodeConfig('node-a');
        assert_call($result, 'GET', '/nodes/node-a/config', null);
    });

    run_test('Nodes::updateNodeConfig maps to PUT /nodes/{node}/config', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('description' => 'Node A');
        $result = $nodes->updateNodeConfig('node-a', $payload);
        assert_call($result, 'PUT', '/nodes/node-a/config', $payload);
    });

    run_test('Nodes::AptVersions maps to GET /nodes/{node}/apt/versions', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->AptVersions('node-a');
        assert_call($result, 'GET', '/nodes/node-a/apt/versions', null);
    });

    run_test('Nodes::updateNetwork maps to PUT /nodes/{node}/network', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('digest' => 'abcd1234');
        $result = $nodes->updateNetwork('node-a', $payload);
        assert_call($result, 'PUT', '/nodes/node-a/network', $payload);
    });

    run_test('Nodes::Hosts maps to GET /nodes/{node}/hosts', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->Hosts('node-a');
        assert_call($result, 'GET', '/nodes/node-a/hosts', null);
    });

    run_test('Nodes::createHosts maps to POST /nodes/{node}/hosts', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('data' => '127.0.0.1 localhost');
        $result = $nodes->createHosts('node-a', $payload);
        assert_call($result, 'POST', '/nodes/node-a/hosts', $payload);
    });

    run_test('Nodes::Journal maps to GET /nodes/{node}/journal', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('limit' => 25);
        $result = $nodes->Journal('node-a', $payload);
        assert_call($result, 'GET', '/nodes/node-a/journal', $payload);
    });

    run_test('Nodes::vzdumpDefaults maps to GET /nodes/{node}/vzdump/defaults', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->vzdumpDefaults('node-a');
        assert_call($result, 'GET', '/nodes/node-a/vzdump/defaults', null);
    });
}
