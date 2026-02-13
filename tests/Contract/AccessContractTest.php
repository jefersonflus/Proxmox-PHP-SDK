<?php

namespace ProxmoxContractTests;

function register_access_contract_tests()
{
    run_test('Access::Access maps to GET /access', function () {
        reset_request_client();
        $access = new \Proxmox\Access();
        $result = $access->Access();
        assert_call($result, 'GET', '/access', null);
    });

    run_test('Access::updateGroup maps to PUT /access/groups/{groupid}', function () {
        reset_request_client();
        $access = new \Proxmox\Access();
        $payload = array('comment' => 'admins');
        $result = $access->updateGroup('admins', $payload);
        assert_call($result, 'PUT', '/access/groups/admins', $payload);
    });

    run_test('Access::createUserToken maps to POST /access/users/{userid}/token/{tokenid}', function () {
        reset_request_client();
        $access = new \Proxmox\Access();
        $payload = array('expire' => 1735689600);
        $result = $access->createUserToken('root@pam', 'token-a', $payload);
        assert_call($result, 'POST', '/access/users/root@pam/token/token-a', $payload);
    });

    run_test('Access::Openid maps to GET /access/openid', function () {
        reset_request_client();
        $access = new \Proxmox\Access();
        $result = $access->Openid();
        assert_call($result, 'GET', '/access/openid', null);
    });

    run_test('Access::openidAuthUrl maps to POST /access/openid/auth-url', function () {
        reset_request_client();
        $access = new \Proxmox\Access();
        $payload = array(
            'realm' => 'oidc',
            'redirect-url' => 'https://client.example/callback',
        );
        $result = $access->openidAuthUrl($payload);
        assert_call($result, 'POST', '/access/openid/auth-url', $payload);
    });

    run_test('Access::openidLogin maps to POST /access/openid/login', function () {
        reset_request_client();
        $access = new \Proxmox\Access();
        $payload = array(
            'code' => 'auth-code',
            'state' => 'state-token',
            'redirect-url' => 'https://client.example/callback',
        );
        $result = $access->openidLogin($payload);
        assert_call($result, 'POST', '/access/openid/login', $payload);
    });
}

