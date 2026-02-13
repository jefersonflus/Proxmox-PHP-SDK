<?php

namespace ProxmoxContractTests;

function register_storage_contract_tests()
{
    run_test('Storage::Storage maps to GET /storage', function () {
        reset_request_client();
        $storage = new \Proxmox\Storage();
        $result = $storage->Storage('lvm');
        assert_call($result, 'GET', '/storage', array('type' => 'lvm'));
    });

    run_test('Storage::createStorage maps to POST /storage', function () {
        reset_request_client();
        $storage = new \Proxmox\Storage();
        $payload = array('storage' => 'nfs-a', 'type' => 'nfs');
        $result = $storage->createStorage($payload);
        assert_call($result, 'POST', '/storage', $payload);
    });

    run_test('Storage::updateStorage maps to PUT /storage/{storage}', function () {
        reset_request_client();
        $storage = new \Proxmox\Storage();
        $payload = array('disable' => 1);
        $result = $storage->updateStorage('local', $payload);
        assert_call($result, 'PUT', '/storage/local', $payload);
    });

    run_test('Storage::deleteStorage maps to DELETE /storage/{storage}', function () {
        reset_request_client();
        $storage = new \Proxmox\Storage();
        $result = $storage->deleteStorage('local');
        assert_call($result, 'DELETE', '/storage/local', null);
    });
}

