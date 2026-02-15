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

    run_test('Nodes::qemuCloudinit maps to GET /nodes/{node}/qemu/{vmid}/cloudinit', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('format' => 'yaml');
        $result = $nodes->qemuCloudinit('node-a', 100, $payload);
        assert_call($result, 'GET', '/nodes/node-a/qemu/100/cloudinit', $payload);
    });

    run_test('Nodes::qemuCloudinitDump maps to GET /nodes/{node}/qemu/{vmid}/cloudinit/dump', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('type' => 'network');
        $result = $nodes->qemuCloudinitDump('node-a', 100, $payload);
        assert_call($result, 'GET', '/nodes/node-a/qemu/100/cloudinit/dump', $payload);
    });

    run_test('Nodes::setQemuCloudinit maps to PUT /nodes/{node}/qemu/{vmid}/cloudinit', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('force' => 1);
        $result = $nodes->setQemuCloudinit('node-a', 100, $payload);
        assert_call($result, 'PUT', '/nodes/node-a/qemu/100/cloudinit', $payload);
    });

    run_test('Nodes::qemuMigrateInfo maps to GET /nodes/{node}/qemu/{vmid}/migrate', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('target' => 'node-b');
        $result = $nodes->qemuMigrateInfo('node-a', 100, $payload);
        assert_call($result, 'GET', '/nodes/node-a/qemu/100/migrate', $payload);
    });

    run_test('Nodes::qemuMtunnelwebsocket maps to GET /nodes/{node}/qemu/{vmid}/mtunnelwebsocket', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('ticket' => 'abc');
        $result = $nodes->qemuMtunnelwebsocket('node-a', 100, $payload);
        assert_call($result, 'GET', '/nodes/node-a/qemu/100/mtunnelwebsocket', $payload);
    });

    run_test('Nodes::qemuMtunnel maps to POST /nodes/{node}/qemu/{vmid}/mtunnel', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('migration_type' => 'secure');
        $result = $nodes->qemuMtunnel('node-a', 100, $payload);
        assert_call($result, 'POST', '/nodes/node-a/qemu/100/mtunnel', $payload);
    });

    run_test('Nodes::qemuRemoteMigrate maps to POST /nodes/{node}/qemu/{vmid}/remote_migrate', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('target-endpoint' => '10.0.0.2');
        $result = $nodes->qemuRemoteMigrate('node-a', 100, $payload);
        assert_call($result, 'POST', '/nodes/node-a/qemu/100/remote_migrate', $payload);
    });

    run_test('Nodes::qemuTermproxy maps to POST /nodes/{node}/qemu/{vmid}/termproxy', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('serial' => 'socket');
        $result = $nodes->qemuTermproxy('node-a', 100, $payload);
        assert_call($result, 'POST', '/nodes/node-a/qemu/100/termproxy', $payload);
    });

    run_test('Nodes::qemuDbusVmstate maps to POST /nodes/{node}/qemu/{vmid}/dbus-vmstate', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('timeout' => 10);
        $result = $nodes->qemuDbusVmstate('node-a', 100, $payload);
        assert_call($result, 'POST', '/nodes/node-a/qemu/100/dbus-vmstate', $payload);
    });

    run_test('Nodes::lxcInterfaces maps to GET /nodes/{node}/lxc/{vmid}/interfaces', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->lxcInterfaces('node-a', 101);
        assert_call($result, 'GET', '/nodes/node-a/lxc/101/interfaces', null);
    });

    run_test('Nodes::lxcPending maps to GET /nodes/{node}/lxc/{vmid}/pending', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->lxcPending('node-a', 101);
        assert_call($result, 'GET', '/nodes/node-a/lxc/101/pending', null);
    });

    run_test('Nodes::lxcMigrateInfo maps to GET /nodes/{node}/lxc/{vmid}/migrate', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('target' => 'node-b');
        $result = $nodes->lxcMigrateInfo('node-a', 101, $payload);
        assert_call($result, 'GET', '/nodes/node-a/lxc/101/migrate', $payload);
    });

    run_test('Nodes::lxcMtunnelwebsocket maps to GET /nodes/{node}/lxc/{vmid}/mtunnelwebsocket', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('ticket' => 'abc');
        $result = $nodes->lxcMtunnelwebsocket('node-a', 101, $payload);
        assert_call($result, 'GET', '/nodes/node-a/lxc/101/mtunnelwebsocket', $payload);
    });

    run_test('Nodes::lxcFirewallRefs maps to GET /nodes/{node}/lxc/{vmid}/firewall/refs', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->lxcFirewallRefs('node-a', 101);
        assert_call($result, 'GET', '/nodes/node-a/lxc/101/firewall/refs', null);
    });

    run_test('Nodes::lxcMoveVolume maps to POST /nodes/{node}/lxc/{vmid}/move_volume', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('volume' => 'rootfs', 'target-storage' => 'local-lvm');
        $result = $nodes->lxcMoveVolume('node-a', 101, $payload);
        assert_call($result, 'POST', '/nodes/node-a/lxc/101/move_volume', $payload);
    });

    run_test('Nodes::lxcMtunnel maps to POST /nodes/{node}/lxc/{vmid}/mtunnel', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('migration_type' => 'secure');
        $result = $nodes->lxcMtunnel('node-a', 101, $payload);
        assert_call($result, 'POST', '/nodes/node-a/lxc/101/mtunnel', $payload);
    });

    run_test('Nodes::lxcRemoteMigrate maps to POST /nodes/{node}/lxc/{vmid}/remote_migrate', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('target-endpoint' => '10.0.0.2');
        $result = $nodes->lxcRemoteMigrate('node-a', 101, $payload);
        assert_call($result, 'POST', '/nodes/node-a/lxc/101/remote_migrate', $payload);
    });

    run_test('Nodes::lxcTermproxy maps to POST /nodes/{node}/lxc/{vmid}/termproxy', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('serial' => 'tty');
        $result = $nodes->lxcTermproxy('node-a', 101, $payload);
        assert_call($result, 'POST', '/nodes/node-a/lxc/101/termproxy', $payload);
    });

    run_test('Nodes::disksDirectory maps to GET /nodes/{node}/disks/directory', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('usage-type' => 'images');
        $result = $nodes->disksDirectory('node-a', $payload);
        assert_call($result, 'GET', '/nodes/node-a/disks/directory', $payload);
    });

    run_test('Nodes::createDisksDirectory maps to POST /nodes/{node}/disks/directory', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('name' => 'dir-store', 'device' => '/dev/sdb');
        $result = $nodes->createDisksDirectory('node-a', $payload);
        assert_call($result, 'POST', '/nodes/node-a/disks/directory', $payload);
    });

    run_test('Nodes::deleteDisksDirectoryName maps to DELETE /nodes/{node}/disks/directory/{name}', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->deleteDisksDirectoryName('node-a', 'dir-store');
        assert_call($result, 'DELETE', '/nodes/node-a/disks/directory/dir-store', null);
    });

    run_test('Nodes::disksLvm maps to GET /nodes/{node}/disks/lvm', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('usage-type' => 'images');
        $result = $nodes->disksLvm('node-a', $payload);
        assert_call($result, 'GET', '/nodes/node-a/disks/lvm', $payload);
    });

    run_test('Nodes::createDisksLvm maps to POST /nodes/{node}/disks/lvm', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('name' => 'lvm-store', 'device' => '/dev/sdc');
        $result = $nodes->createDisksLvm('node-a', $payload);
        assert_call($result, 'POST', '/nodes/node-a/disks/lvm', $payload);
    });

    run_test('Nodes::deleteDisksLvmName maps to DELETE /nodes/{node}/disks/lvm/{name}', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->deleteDisksLvmName('node-a', 'lvm-store');
        assert_call($result, 'DELETE', '/nodes/node-a/disks/lvm/lvm-store', null);
    });

    run_test('Nodes::disksLvmthin maps to GET /nodes/{node}/disks/lvmthin', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('usage-type' => 'rootdir');
        $result = $nodes->disksLvmthin('node-a', $payload);
        assert_call($result, 'GET', '/nodes/node-a/disks/lvmthin', $payload);
    });

    run_test('Nodes::createDisksLvmthin maps to POST /nodes/{node}/disks/lvmthin', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('name' => 'thin-store', 'device' => '/dev/sdd');
        $result = $nodes->createDisksLvmthin('node-a', $payload);
        assert_call($result, 'POST', '/nodes/node-a/disks/lvmthin', $payload);
    });

    run_test('Nodes::deleteDisksLvmthinName maps to DELETE /nodes/{node}/disks/lvmthin/{name}', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->deleteDisksLvmthinName('node-a', 'thin-store');
        assert_call($result, 'DELETE', '/nodes/node-a/disks/lvmthin/thin-store', null);
    });

    run_test('Nodes::disksZfs maps to GET /nodes/{node}/disks/zfs', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('usage-type' => 'images');
        $result = $nodes->disksZfs('node-a', $payload);
        assert_call($result, 'GET', '/nodes/node-a/disks/zfs', $payload);
    });

    run_test('Nodes::disksZfsName maps to GET /nodes/{node}/disks/zfs/{name}', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('verbose' => 1);
        $result = $nodes->disksZfsName('node-a', 'tank', $payload);
        assert_call($result, 'GET', '/nodes/node-a/disks/zfs/tank', $payload);
    });

    run_test('Nodes::createDisksZfs maps to POST /nodes/{node}/disks/zfs', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('name' => 'tank', 'devices' => '/dev/sde');
        $result = $nodes->createDisksZfs('node-a', $payload);
        assert_call($result, 'POST', '/nodes/node-a/disks/zfs', $payload);
    });

    run_test('Nodes::deleteDisksZfsName maps to DELETE /nodes/{node}/disks/zfs/{name}', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->deleteDisksZfsName('node-a', 'tank');
        assert_call($result, 'DELETE', '/nodes/node-a/disks/zfs/tank', null);
    });

    run_test('Nodes::disksWipedisk maps to PUT /nodes/{node}/disks/wipedisk', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('disk' => '/dev/sdb', 'uuid' => 1);
        $result = $nodes->disksWipedisk('node-a', $payload);
        assert_call($result, 'PUT', '/nodes/node-a/disks/wipedisk', $payload);
    });

    run_test('Nodes::storageImportMetadata maps to GET /nodes/{node}/storage/{storage}/import-metadata', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('volume' => 'backup/vzdump-qemu-100.vma.zst');
        $result = $nodes->storageImportMetadata('node-a', 'local', $payload);
        assert_call($result, 'GET', '/nodes/node-a/storage/local/import-metadata', $payload);
    });

    run_test('Nodes::storageDownloadUrl maps to POST /nodes/{node}/storage/{storage}/download-url', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('url' => 'https://example.com/image.qcow2', 'content' => 'images');
        $result = $nodes->storageDownloadUrl('node-a', 'local', $payload);
        assert_call($result, 'POST', '/nodes/node-a/storage/local/download-url', $payload);
    });

    run_test('Nodes::storageOciRegistryPull maps to POST /nodes/{node}/storage/{storage}/oci-registry-pull', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('url' => 'docker.io/library/alpine', 'tag' => 'latest');
        $result = $nodes->storageOciRegistryPull('node-a', 'local', $payload);
        assert_call($result, 'POST', '/nodes/node-a/storage/local/oci-registry-pull', $payload);
    });

    run_test('Nodes::storagePrunebackups maps to GET /nodes/{node}/storage/{storage}/prunebackups', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('keep-last' => 3);
        $result = $nodes->storagePrunebackups('node-a', 'local', $payload);
        assert_call($result, 'GET', '/nodes/node-a/storage/local/prunebackups', $payload);
    });

    run_test('Nodes::deleteStoragePrunebackups maps to DELETE /nodes/{node}/storage/{storage}/prunebackups', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('dry-run' => 1);
        $result = $nodes->deleteStoragePrunebackups('node-a', 'local', $payload);
        assert_call($result, 'DELETE', '/nodes/node-a/storage/local/prunebackups', $payload);
    });

    run_test('Nodes::setStorageContentVolume maps to PUT /nodes/{node}/storage/{storage}/content/{volume}', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('notes' => 'updated');
        $result = $nodes->setStorageContentVolume('node-a', 'local', 'vm-100-disk-0', $payload);
        assert_call($result, 'PUT', '/nodes/node-a/storage/local/content/vm-100-disk-0', $payload);
    });

    run_test('Nodes::storageFileRestoreList maps to GET /nodes/{node}/storage/{storage}/file-restore/list', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('archive-name' => 'vzdump-lxc-101.tar.zst', 'filepath' => '/');
        $result = $nodes->storageFileRestoreList('node-a', 'local', $payload);
        assert_call($result, 'GET', '/nodes/node-a/storage/local/file-restore/list', $payload);
    });

    run_test('Nodes::storageFileRestoreDownload maps to GET /nodes/{node}/storage/{storage}/file-restore/download', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('archive-name' => 'vzdump-lxc-101.tar.zst', 'filepath' => '/etc/hosts');
        $result = $nodes->storageFileRestoreDownload('node-a', 'local', $payload);
        assert_call($result, 'GET', '/nodes/node-a/storage/local/file-restore/download', $payload);
    });

    run_test('Nodes::Certificates maps to GET /nodes/{node}/certificates', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->Certificates('node-a');
        assert_call($result, 'GET', '/nodes/node-a/certificates', null);
    });

    run_test('Nodes::certificatesInfo maps to GET /nodes/{node}/certificates/info', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->certificatesInfo('node-a');
        assert_call($result, 'GET', '/nodes/node-a/certificates/info', null);
    });

    run_test('Nodes::certificatesAcme maps to GET /nodes/{node}/certificates/acme', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->certificatesAcme('node-a');
        assert_call($result, 'GET', '/nodes/node-a/certificates/acme', null);
    });

    run_test('Nodes::createCertificatesAcmeCertificate maps to POST /nodes/{node}/certificates/acme/certificate', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('force' => 1);
        $result = $nodes->createCertificatesAcmeCertificate('node-a', $payload);
        assert_call($result, 'POST', '/nodes/node-a/certificates/acme/certificate', $payload);
    });

    run_test('Nodes::updateCertificatesAcmeCertificate maps to PUT /nodes/{node}/certificates/acme/certificate', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('restart' => 1);
        $result = $nodes->updateCertificatesAcmeCertificate('node-a', $payload);
        assert_call($result, 'PUT', '/nodes/node-a/certificates/acme/certificate', $payload);
    });

    run_test('Nodes::deleteCertificatesAcmeCertificate maps to DELETE /nodes/{node}/certificates/acme/certificate', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->deleteCertificatesAcmeCertificate('node-a');
        assert_call($result, 'DELETE', '/nodes/node-a/certificates/acme/certificate', null);
    });

    run_test('Nodes::createCertificatesCustom maps to POST /nodes/{node}/certificates/custom', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('certificates' => 'pem-data', 'key' => 'key-data');
        $result = $nodes->createCertificatesCustom('node-a', $payload);
        assert_call($result, 'POST', '/nodes/node-a/certificates/custom', $payload);
    });

    run_test('Nodes::deleteCertificatesCustom maps to DELETE /nodes/{node}/certificates/custom', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->deleteCertificatesCustom('node-a');
        assert_call($result, 'DELETE', '/nodes/node-a/certificates/custom', null);
    });

    run_test('Nodes::aptRepositories maps to GET /nodes/{node}/apt/repositories', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->aptRepositories('node-a');
        assert_call($result, 'GET', '/nodes/node-a/apt/repositories', null);
    });

    run_test('Nodes::createAptRepository maps to POST /nodes/{node}/apt/repositories', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('handle' => 'pve-no-subscription');
        $result = $nodes->createAptRepository('node-a', $payload);
        assert_call($result, 'POST', '/nodes/node-a/apt/repositories', $payload);
    });

    run_test('Nodes::updateAptRepositories maps to PUT /nodes/{node}/apt/repositories', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('digest' => 'abcd1234');
        $result = $nodes->updateAptRepositories('node-a', $payload);
        assert_call($result, 'PUT', '/nodes/node-a/apt/repositories', $payload);
    });

    run_test('Nodes::deleteSubscription maps to DELETE /nodes/{node}/subscription', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->deleteSubscription('node-a');
        assert_call($result, 'DELETE', '/nodes/node-a/subscription', null);
    });

    run_test('Nodes::sdn maps to GET /nodes/{node}/sdn', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->sdn('node-a');
        assert_call($result, 'GET', '/nodes/node-a/sdn', array());
    });

    run_test('Nodes::sdnFabricsFabric maps to GET /nodes/{node}/sdn/fabrics/{fabric}', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->sdnFabricsFabric('node-a', 'fabric-a');
        assert_call($result, 'GET', '/nodes/node-a/sdn/fabrics/fabric-a', array());
    });

    run_test('Nodes::sdnFabricsFabricInterfaces maps to GET /nodes/{node}/sdn/fabrics/{fabric}/interfaces', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->sdnFabricsFabricInterfaces('node-a', 'fabric-a');
        assert_call($result, 'GET', '/nodes/node-a/sdn/fabrics/fabric-a/interfaces', array());
    });

    run_test('Nodes::sdnFabricsFabricNeighbors maps to GET /nodes/{node}/sdn/fabrics/{fabric}/neighbors', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->sdnFabricsFabricNeighbors('node-a', 'fabric-a');
        assert_call($result, 'GET', '/nodes/node-a/sdn/fabrics/fabric-a/neighbors', array());
    });

    run_test('Nodes::sdnFabricsFabricRoutes maps to GET /nodes/{node}/sdn/fabrics/{fabric}/routes', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->sdnFabricsFabricRoutes('node-a', 'fabric-a');
        assert_call($result, 'GET', '/nodes/node-a/sdn/fabrics/fabric-a/routes', array());
    });

    run_test('Nodes::sdnVnetsVnet maps to GET /nodes/{node}/sdn/vnets/{vnet}', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->sdnVnetsVnet('node-a', 'blue-net');
        assert_call($result, 'GET', '/nodes/node-a/sdn/vnets/blue-net', array());
    });

    run_test('Nodes::sdnVnetsVnetMacVrf maps to GET /nodes/{node}/sdn/vnets/{vnet}/mac-vrf', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->sdnVnetsVnetMacVrf('node-a', 'blue-net');
        assert_call($result, 'GET', '/nodes/node-a/sdn/vnets/blue-net/mac-vrf', array());
    });

    run_test('Nodes::sdnZones maps to GET /nodes/{node}/sdn/zones', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->sdnZones('node-a');
        assert_call($result, 'GET', '/nodes/node-a/sdn/zones', array());
    });

    run_test('Nodes::sdnZonesZone maps to GET /nodes/{node}/sdn/zones/{zone}', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->sdnZonesZone('node-a', 'zone-a');
        assert_call($result, 'GET', '/nodes/node-a/sdn/zones/zone-a', array());
    });

    run_test('Nodes::sdnZonesZoneBridges maps to GET /nodes/{node}/sdn/zones/{zone}/bridges', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->sdnZonesZoneBridges('node-a', 'zone-a');
        assert_call($result, 'GET', '/nodes/node-a/sdn/zones/zone-a/bridges', array());
    });

    run_test('Nodes::sdnZonesZoneContent maps to GET /nodes/{node}/sdn/zones/{zone}/content', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->sdnZonesZoneContent('node-a', 'zone-a');
        assert_call($result, 'GET', '/nodes/node-a/sdn/zones/zone-a/content', array());
    });

    run_test('Nodes::sdnZonesZoneIpVrf maps to GET /nodes/{node}/sdn/zones/{zone}/ip-vrf', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->sdnZonesZoneIpVrf('node-a', 'zone-a');
        assert_call($result, 'GET', '/nodes/node-a/sdn/zones/zone-a/ip-vrf', array());
    });

    run_test('Nodes::hardware maps to GET /nodes/{node}/hardware', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->hardware('node-a');
        assert_call($result, 'GET', '/nodes/node-a/hardware', array());
    });

    run_test('Nodes::hardwarePci maps to GET /nodes/{node}/hardware/pci', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->hardwarePci('node-a');
        assert_call($result, 'GET', '/nodes/node-a/hardware/pci', array());
    });

    run_test('Nodes::hardwarePciPciid maps to GET /nodes/{node}/hardware/pci/{pciid}', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->hardwarePciPciid('node-a', '0000:01:00.0');
        assert_call($result, 'GET', '/nodes/node-a/hardware/pci/0000:01:00.0', array());
    });

    run_test('Nodes::hardwarePciPciidMdev maps to GET /nodes/{node}/hardware/pci/{pciid}/mdev', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $result = $nodes->hardwarePciPciidMdev('node-a', '0000:01:00.0');
        assert_call($result, 'GET', '/nodes/node-a/hardware/pci/0000:01:00.0/mdev', array());
    });

    run_test('Nodes::queryUrlMetadata maps to GET /nodes/{node}/query-url-metadata', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('url' => 'https://example.com/image.qcow2');
        $result = $nodes->queryUrlMetadata('node-a', $payload);
        assert_call($result, 'GET', '/nodes/node-a/query-url-metadata', $payload);
    });

    run_test('Nodes::queryOciRepoTags maps to GET /nodes/{node}/query-oci-repo-tags', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('repository' => 'docker.io/library/alpine');
        $result = $nodes->queryOciRepoTags('node-a', $payload);
        assert_call($result, 'GET', '/nodes/node-a/query-oci-repo-tags', $payload);
    });

    run_test('Nodes::Termproxy maps to POST /nodes/{node}/termproxy', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('cmd' => 'login');
        $result = $nodes->Termproxy('node-a', $payload);
        assert_call($result, 'POST', '/nodes/node-a/termproxy', $payload);
    });

    run_test('Nodes::SuspendAll maps to POST /nodes/{node}/suspendall', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('vms' => '100,101');
        $result = $nodes->SuspendAll('node-a', $payload);
        assert_call($result, 'POST', '/nodes/node-a/suspendall', $payload);
    });

    run_test('Nodes::WakeOnLan maps to POST /nodes/{node}/wakeonlan', function () {
        reset_request_client();
        $nodes = new \Proxmox\Nodes();
        $payload = array('mac' => 'AA:BB:CC:DD:EE:FF');
        $result = $nodes->WakeOnLan('node-a', $payload);
        assert_call($result, 'POST', '/nodes/node-a/wakeonlan', $payload);
    });
}
