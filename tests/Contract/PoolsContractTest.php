<?php

namespace ProxmoxContractTests;

function register_pools_contract_tests()
{
    run_test('Pools::Pools maps to GET /pools', function () {
        reset_request_client();
        $pools = new \Proxmox\Pools();
        $result = $pools->Pools();
        assert_call($result, 'GET', '/pools', null);
    });

    run_test('Pools::UpdatePool legacy array signature maps to PUT /pools', function () {
        reset_request_client();
        $pools = new \Proxmox\Pools();
        $payload = array('comment' => 'legacy');
        $result = $pools->UpdatePool($payload);
        assert_call($result, 'PUT', '/pools', $payload);
    });

    run_test('Pools::UpdatePool by id maps to PUT /pools/{poolid}', function () {
        reset_request_client();
        $pools = new \Proxmox\Pools();
        $payload = array('comment' => 'updated');
        $result = $pools->UpdatePool('pool-a', $payload);
        assert_call($result, 'PUT', '/pools/pool-a', $payload);
    });

    run_test('Pools::UpdatePoolById maps to PUT /pools/{poolid}', function () {
        reset_request_client();
        $pools = new \Proxmox\Pools();
        $payload = array('comment' => 'by-id');
        $result = $pools->UpdatePoolById('pool-b', $payload);
        assert_call($result, 'PUT', '/pools/pool-b', $payload);
    });

    run_test('Pools::DeletePools maps to DELETE /pools', function () {
        reset_request_client();
        $pools = new \Proxmox\Pools();
        $payload = array('poolid' => 'pool-b');
        $result = $pools->DeletePools($payload);
        assert_call($result, 'DELETE', '/pools', $payload);
    });
}

