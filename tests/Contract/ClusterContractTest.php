<?php

namespace ProxmoxContractTests;

function register_cluster_contract_tests()
{
    run_test('Cluster::BackupInfo maps to GET /cluster/backup-info', function () {
        reset_request_client();
        $cluster = new \Proxmox\Cluster();
        $result = $cluster->BackupInfo();
        assert_call($result, 'GET', '/cluster/backup-info', null);
    });

    run_test('Cluster::bulkActionGuestMigrate maps to POST /cluster/bulk-action/guest/migrate', function () {
        reset_request_client();
        $cluster = new \Proxmox\Cluster();
        $payload = array('vms' => '100,101', 'target' => 'node-b');
        $result = $cluster->bulkActionGuestMigrate($payload);
        assert_call($result, 'POST', '/cluster/bulk-action/guest/migrate', $payload);
    });

    run_test('Cluster::HaRules forwards GET params', function () {
        reset_request_client();
        $cluster = new \Proxmox\Cluster();
        $result = $cluster->HaRules('vm:100', 'affinity');
        assert_call(
            $result,
            'GET',
            '/cluster/ha/rules',
            array('resource' => 'vm:100', 'type' => 'affinity')
        );
    });

    run_test('Cluster::setCephFlag maps to PUT /cluster/ceph/flags/{flag}', function () {
        reset_request_client();
        $cluster = new \Proxmox\Cluster();
        $payload = array('value' => false);
        $result = $cluster->setCephFlag('noout', $payload);
        assert_call($result, 'PUT', '/cluster/ceph/flags/noout', $payload);
    });

    run_test('Cluster::createAcmePlugin maps to POST /cluster/acme/plugins', function () {
        reset_request_client();
        $cluster = new \Proxmox\Cluster();
        $payload = array('id' => 'dns-api', 'type' => 'dns');
        $result = $cluster->createAcmePlugin($payload);
        assert_call($result, 'POST', '/cluster/acme/plugins', $payload);
    });

    run_test('Cluster::notificationEndpointSmtpName maps to GET /cluster/notifications/endpoints/smtp/{name}', function () {
        reset_request_client();
        $cluster = new \Proxmox\Cluster();
        $result = $cluster->notificationEndpointSmtpName('smtp-main');
        assert_call($result, 'GET', '/cluster/notifications/endpoints/smtp/smtp-main', null);
    });

    run_test('Cluster::createMappingPci maps to POST /cluster/mapping/pci', function () {
        reset_request_client();
        $cluster = new \Proxmox\Cluster();
        $payload = array('id' => 'gpu-map', 'map' => 'node-a=0000:01:00.0');
        $result = $cluster->createMappingPci($payload);
        assert_call($result, 'POST', '/cluster/mapping/pci', $payload);
    });

    run_test('Cluster::sdnControllers forwards query params', function () {
        reset_request_client();
        $cluster = new \Proxmox\Cluster();
        $result = $cluster->sdnControllers(true, true, 'evpn');
        assert_call(
            $result,
            'GET',
            '/cluster/sdn/controllers',
            array('pending' => true, 'running' => true, 'type' => 'evpn')
        );
    });

    run_test('Cluster::createSdnVnetFirewallRule maps to POST /cluster/sdn/vnets/{vnet}/firewall/rules', function () {
        reset_request_client();
        $cluster = new \Proxmox\Cluster();
        $payload = array('type' => 'in', 'action' => 'ACCEPT');
        $result = $cluster->createSdnVnetFirewallRule('blue-net', $payload);
        assert_call($result, 'POST', '/cluster/sdn/vnets/blue-net/firewall/rules', $payload);
    });

    run_test('Cluster::sdnFabricNodesFabricId forwards query params', function () {
        reset_request_client();
        $cluster = new \Proxmox\Cluster();
        $result = $cluster->sdnFabricNodesFabricId('fabric-a', true, true);
        assert_call(
            $result,
            'GET',
            '/cluster/sdn/fabrics/node/fabric-a',
            array('pending' => true, 'running' => true)
        );
    });

    run_test('Cluster::sdnRollback maps to POST /cluster/sdn/rollback', function () {
        reset_request_client();
        $cluster = new \Proxmox\Cluster();
        $payload = array('release-lock' => 1);
        $result = $cluster->sdnRollback($payload);
        assert_call($result, 'POST', '/cluster/sdn/rollback', $payload);
    });
}

