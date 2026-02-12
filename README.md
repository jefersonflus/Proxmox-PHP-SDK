![ProxmoxVE_PHP_API](https://upload.wikimedia.org/wikipedia/en/thumb/2/25/Proxmox-VE-logo.svg/600px-Proxmox-VE-logo.svg.png)

# ProxmoxVE PHP API

## Table of Contents
- [ProxmoxVE PHP API](#proxmoxve-php-api)
  - [Table of Contents](#table-of-contents)
  - [Installation](#installation)
  - [Usage](#usage)
    - [Quick Usage](#quick-usage)
    - [Use API Token](#use-api-token)
    - [Example](#example)
    - [Create LXC container](#create-lxc-container)
    - [Delete LXC container](#delete-lxc-container)
    - [Create VM](#create-vm)
    - [Delete VM](#delete-vm)
  - [Request](#request)
  - [Access](#access)
  - [Domains](#domains)
  - [Groups](#groups)
  - [Roles](#roles)
  - [Users](#users)
  - [Cluster](#cluster)
  - [Backup](#backup)
  - [Config](#config)
  - [Firewall](#firewall)
  - [HA](#ha)
  - [Replication](#replication)
  - [Pools](#pools)
  - [Storage](#storage)
  - [Nodes](#nodes)
  - [Apt](#apt)
  - [Ceph](#ceph)
  - [Disks](#disks)
  - [Nodes Firewall](#nodes-firewall)
  - [Lxc](#lxc)
  - [Network](#network)
  - [Qemu](#qemu)
  - [Nodes Replication](#nodes-replication)
  - [Scan](#scan)
  - [Service](#service)
  - [Nodes Storage](#nodes-storage)
  - [Tasks](#tasks)
  - [Vzdump](#vzdump)


## Installation
To install ProxmoxVE_PHP_API, simply:

```bash
composer require jefersonflus/proxmox-ve_php_api @dev
```

## Usage

`Request` exposes static methods. `Access`, `Cluster`, `Nodes`, `Pools`, and `Storage` expose instance methods.

### Quick Usage

```php
require __DIR__ . '/vendor/autoload.php'; // Autoload files using Composer autoload
use Proxmox\Request;

$configure = [
    'hostname' => '0.0.0.0',
    'username' => 'root',
    'password' => 'password'
];
Request::Login($configure); // Login ..

// Request($path, array $params = null, $method="GET")
print_r( Request::Request('/nodes', null, 'GET') ); // List Nodes
```

### Use API Token
```php
require __DIR__ . '/vendor/autoload.php'; // Autoload files using Composer autoload
use Proxmox\Request;
use Proxmox\Nodes;

$configure = [
    'hostname' => '0.0.0.0',
    'username' => 'root',
    'token_name' => 'apitoken',
    'token_value' => '00000000-0000-0000-0000-000000000000'
];
Request::Login($configure); // Login ..
$nodes = new Nodes();
print_r( $nodes->listNodes() ); // List Nodes
```

### Example
```php
require __DIR__ . '/vendor/autoload.php'; // Autoload files using Composer autoload
use Proxmox\Request;
use Proxmox\Access;
use Proxmox\Cluster;
use Proxmox\Nodes;
use Proxmox\Pools;
use Proxmox\Storage;

$configure = [
    'hostname' => '0.0.0.0',
    'username' => 'root',
    'password' => 'password',
];
Request::Login($configure); // Login ..
$access = new Access();
$cluster = new Cluster();
$nodes = new Nodes();
$pools = new Pools();
$storage = new Storage();

print_r( $nodes->listNodes() ); // List Nodes
```

### Create LXC container

```php
require __DIR__ . '/vendor/autoload.php'; // Autoload files using Composer autoload
use Proxmox\Request;
use Proxmox\Cluster;
use Proxmox\Nodes;

$configure = [
  'hostname' => '0.0.0.0',
  'username' => 'root',
  'password' => 'password',
];
Request::Login($configure); // Login ..
$cluster = new Cluster();
$nodes = new Nodes();

# Create container
$nextId = $cluster->nextVmid(); // get next vmid
$create = [
  'vmid'        => $nextId->data,
  'cores'       => 1,
  'hostname'    => 'testApi',
  'rootfs'      => 'local:8',
  'memory'      => 512,
  'swap'        => 512,
  'ostemplate'  => 'local:vztmpl/ubuntu-16.04-standard_16.04-1_amd64.tar.gz',
  'net0'        => 'bridge=vmbr0,hwaddr=00:00:00:00:00:00,name=eth0,ip=0.0.0.0/32,gw=0.0.0.0'
];
# Get first node name.
$firstNode = $nodes->listNodes()->data[0]->node;
print_r( $nodes->createLxc($firstNode, $create) );
// print_r( $nodes->createLxc('Name_Nodes', $create) );

```

### Delete LXC container

```php
require __DIR__ . '/vendor/autoload.php'; // Autoload files using Composer autoload
use Proxmox\Request;
use Proxmox\Nodes;

$configure = [
  'hostname' => '0.0.0.0',
  'username' => 'root',
  'password' => 'password',
];
Request::Login($configure); // Login ..
$nodes = new Nodes();

# Get first node name.
$firstNode = $nodes->listNodes()->data[0]->node;
# Delete container
$vmid = 106;
print_r( $nodes->deleteLxc($firstNode, $vmid) );
// print_r( $nodes->deleteLxc('Name_Nodes', $vmid) );
```

### Create VM

```php
require __DIR__ . '/vendor/autoload.php'; // Autoload files using Composer autoload
use Proxmox\Request;
use Proxmox\Cluster;
use Proxmox\Nodes;

$configure = [
  'hostname' => '0.0.0.0',
  'username' => 'root',
  'password' => 'password',
];
Request::Login($configure); // Login ..
$cluster = new Cluster();
$nodes = new Nodes();

# Create VM
$nextId = $cluster->nextVmid(); // get next vmid
$create = [
  'vmid'        => $nextId->data,
  'cores'       => 1,
  'name'        => 'testApi',
  'scsi0'       => 'local:32,format=qcow2'
];
# Get first node name.
$firstNode = $nodes->listNodes()->data[0]->node;
print_r( $nodes->createQemu($firstNode, $create) );
// print_r( $nodes->createQemu('Name_Nodes', $create) );
```

### Delete VM

```php
require __DIR__ . '/vendor/autoload.php'; // Autoload files using Composer autoload
use Proxmox\Request;
use Proxmox\Nodes;

$configure = [
  'hostname' => '0.0.0.0',
  'username' => 'root',
  'password' => 'password',
];
Request::Login($configure); // Login ..
$nodes = new Nodes();

# Get first node name.
$firstNode = $nodes->listNodes()->data[0]->node;
# Delete VM
$vmid = 104;
print_r( $nodes->deleteQemu($firstNode, $vmid) );
// print_r( $nodes->deleteQemu('Name_Nodes', $vmid) );
```
## Request

```php
Request::Login(array $configure, $verifySSL = false, $verifyHost = false)
Request::Request($path, array $params = null, $method="GET")
```

For the method list below, assume these instances:

```php
use Proxmox\Access;
use Proxmox\Cluster;
use Proxmox\Nodes;
use Proxmox\Pools;
use Proxmox\Storage;

$access = new Access();
$cluster = new Cluster();
$nodes = new Nodes();
$pools = new Pools();
$storage = new Storage();
```

## Access

```php
$access->Access()
$access->Acl()
$access->updateAcl($data = array())
$access->createTicket($data = array())
```

## Domains

```php
$access->Domains()
$access->addDomain($data = array())
$access->domainsRealm($realm)
$access->updateDomain($realm, $data = array())
$access->deleteDomain($realm)
```

## Groups

```php
$access->Groups()
$access->createGroup($data = array())
$access->GroupId($groupid)
$access->updateGroup($groupid, $data = array())
$access->deleteGroup($groupid)
```

## Roles

```php
$access->Roles()
$access->createRole($data = array())
$access->RoleId($roleid)
$access->updateRole($roleid, $data = array())
$access->deleteRole($roleid)
```

## Users

```php
$access->Users()
$access->createUser($data = array())
$access->getUser($userid)
$access->updateUser($userid, $data = array())
$access->deleteUser($userid)
$access->changeUserPassword($data = array())
```

## Cluster

```php
$cluster->Cluster()
$cluster->Log($max = null)
$cluster->nextVmid($vmid = null)
$cluster->Options()
$cluster->setOptions($data = array())
$cluster->Resources($type = null)
$cluster->Status()
$cluster->Tasks()
```

## Backup

```php
$cluster->ListBackup()
$cluster->createBackup($data = array())
$cluster->BackupId($id)
$cluster->updateBackup($id, $data = array())
$cluster->deleteBackup($id)
```

## Config

```php
$cluster->Config()
$cluster->listConfigNodes()
$cluster->configTotem()
```

## Firewall

```php
$cluster->Firewall()
$cluster->firewallListAliases()
$cluster->createFirewallAliase($data = array())
$cluster->getFirewallAliasesName($name)
$cluster->updateFirewallAliase($name, $data = array())
$cluster->removeFirewallAliase($name)
$cluster->firewallListGroups()
$cluster->createFirewallGroup($data = array())
$cluster->firewallGroupsGroup($group)
$cluster->createRuleFirewallGroup($group, $data = array())
$cluster->removeFirewallGroup($group)
$cluster->firewallGroupsGroupPos($group, $pos)
$cluster->setFirewallGroupPos($group, $pos, $data = array())
$cluster->removeFirewallGroupPos($group, $pos)
$cluster->firewallListIpset()
$cluster->createFirewallIpset($data = array())
$cluster->firewallIpsetName($name)
$cluster->addFirewallIpsetName($name, $data = array())
$cluster->deleteFirewallIpsetName($name)
$cluster->firewallListRules()
$cluster->createFirewallRules($data = array())
$cluster->firewallRulesPos($pos)
$cluster->setFirewallRulesPos($pos, $data = array())
$cluster->deleteFirewallRulesPos($pos)
$cluster->firewallListMacros()
$cluster->firewallListOptions()
$cluster->setFirewallOptions($data = array())
$cluster->firewallListRefs()
```

## HA

```php
$cluster->getHaGroups()
$cluster->HaGroups($group)
$cluster->HaResources()
```

## Replication

```php
$cluster->Replication()
$cluster->createReplication($data = array())
$cluster->replicationId($id)
$cluster->updateReplication($id, $data = array())
$cluster->deleteReplication($id)
```

## Pools

```php
$pools->Pools()
$pools->getPool($poolid)
$pools->UpdatePool($data = array())
$pools->CreatePool($data = array())
$pools->DeletePool($poolid)
```

## Storage

```php
$storage->Storage($type = null)
$storage->createStorage($data = array())
$storage->getStorage($storage)
$storage->updateStorage($storage, $data = array())
$storage->deleteStorage($storage)
```

## Nodes

```php
$nodes->listNodes()
$nodes->Aplinfo($node)
$nodes->downloadTemplate($node, $data = array())
$nodes->Dns($node)
$nodes->setDns($node, $data = array())
$nodes->Execute($node, $data = array())
$nodes->MigrateAll($node, $data = array())
$nodes->Netstat($node)
$nodes->Report($node)
$nodes->Rrd($node, $ds = null, $timeframe = null)
$nodes->Rrddata($node, $timeframe = null)
$nodes->SpiceShell($node, $data = array())
$nodes->StartAll($node, $data = array())
$nodes->Reboot($node, $data = array())
$nodes->StopAll($node, $data = array())
$nodes->Subscription($node)
$nodes->updateSubscription($node, $data = array())
$nodes->setSubscription($node, $data = array())
$nodes->Syslog($node, $limit = null, $start = null, $since = null, $until = null)
$nodes->Time($node)
$nodes->setTime($node, $data = array())
$nodes->Version($node)
$nodes->createVNCShell($node, $data = array())
$nodes->VNCWebSocket($node, $port = null, $vncticket = null)
```

## Apt

```php
$nodes->Apt($node)
$nodes->updateApt($node, $data = array())
$nodes->AptChangelog($node, $name = null)
$nodes->AptUpdate($node)
$nodes->createAptUpdate($node, $data = array())
```

## Ceph

```php
$nodes->Ceph($node)
$nodes->CephFlags($node)
$nodes->setCephFlags($node, $flag, $data = array())
$nodes->unsetCephFlags($node, $flag)
$nodes->createCephMgr($node, $data = array())
$nodes->destroyCephMgr($node, $id)
$nodes->CephMon($node)
$nodes->createCephMon($node, $data = array())
$nodes->destroyCephMon($node, $monid)
$nodes->CephOsd($node)
$nodes->createCephOsd($node, $data = array())
$nodes->destroyCephOsd($node, $osdid)
$nodes->CephOsdIn($node, $osdid, $data = array())
$nodes->CephOsdOut($node, $osdid, $data = array())
$nodes->getCephPools($node)
$nodes->createCephPool($node, $data = array())
$nodes->destroyCephPool($node)
$nodes->CephConfig($node)
$nodes->CephCrush($node)
$nodes->CephDisks($node)
$nodes->createCephInit($node, $data = array())
$nodes->CephLog($node, $limit = null, $start = null)
$nodes->CephRules($node)
$nodes->CephStart($node, $data = array())
$nodes->CephStop($node, $data = array())
$nodes->CephStatus($node)
```

## Disks

```php
$nodes->getDisks($node)
$nodes->Disk($node, $data = array())
$nodes->disksList($node)
$nodes->disksSmart($node, $disk = null)
```

## Nodes Firewall

```php
$nodes->Firewall($node)
$nodes->firewallRules($node)
$nodes->createFirewallRule($node, $data = array())
$nodes->firewallRulesPos($node, $pos)
$nodes->setFirewallRulePos($node, $pos, $data = array())
$nodes->deleteFirewallRulePos($node, $pos)
$nodes->firewallRulesLog($node)
$nodes->firewallRulesOptions($node)
$nodes->setFirewallRuleOptions($node, $data = array())
```

## Lxc

```php
$nodes->Lxc($node)
$nodes->createLxc($node, $data = array())
$nodes->LxcVmid($node, $vmid)
$nodes->deleteLxc($node, $vmid)
$nodes->lxcFirewall($node, $vmid)
$nodes->lxcFirewallAliases($node, $vmid)
$nodes->createLxcFirewallAliase($node, $vmid, $data = array())
$nodes->lxcFirewallAliasesName($node, $vmid, $name)
$nodes->updateLxcFirewallAliaseName($node, $vmid, $name, $data = array())
$nodes->deleteLxcFirewallAliaseName($node, $vmid, $name)
$nodes->lxcFirewallIpset($node, $vmid)
$nodes->createLxcFirewallIpset($node, $vmid, $data = array())
$nodes->lxcFirewallIpsetName($node, $vmid, $name)
$nodes->addLxcFirewallIpsetName($node, $vmid, $name, $data = array())
$nodes->deleteLxcFirewallIpsetName($node, $vmid, $name)
$nodes->lxcFirewallIpsetNameCidr($node, $vmid, $name, $cidr)
$nodes->updateLxcFirewallIpsetNameCidr($node, $vmid, $name, $cidr, $data = array())
$nodes->deleteLxcFirewallIpsetNameCidr($node, $vmid, $name, $cidr)
$nodes->lxcFirewallRules($node, $vmid)
$nodes->createLxcFirewallRules($node, $vmid, $data = array())
$nodes->lxcFirewallRulesPos($node, $vmid, $pos)
$nodes->setLxcFirewallRulesPos($node, $vmid, $pos, $data = array())
$nodes->deleteLxcFirewallRulesPos($node, $vmid, $pos)
$nodes->lxcFirewallLog($node, $vmid, $limit = null, $start = null)
$nodes->lxcFirewallOptions($node, $vmid)
$nodes->setLxcFirewallOptions($node, $vmid, $data = array())
$nodes->lxcSnapshot($node, $vmid)
$nodes->createLxcSnapshot($node, $vmid, $data = array())
$nodes->lxcSnapname($node, $vmid, $snapname)
$nodes->deleteLxcSnapshot($node, $vmid, $snapname)
$nodes->lxcSnapnameConfig($node, $vmid, $snapname)
$nodes->lxcSnapshotConfig($node, $vmid, $snapname, $data = array())
$nodes->lxcSnapshotRollback($node, $vmid, $snapname, $data = array())
$nodes->lxcStatus($node, $vmid)
$nodes->lxcCurrent($node, $vmid)
$nodes->lxcResume($node, $vmid, $data = array())
$nodes->lxcShutdown($node, $vmid, $data = array())
$nodes->lxcStart($node, $vmid, $data = array())
$nodes->lxcStop($node, $vmid, $data = array())
$nodes->lxcReboot($node, $vmid, $data = array())
$nodes->lxcSuspend($node, $vmid, $data = array())
$nodes->lxcClone($node, $vmid, $data = array())
$nodes->lxcConfig($node, $vmid)
$nodes->setLxcConfig($node, $vmid, $data = array())
$nodes->lxcFeature($node, $vmid)
$nodes->lxcMigrate($node, $vmid, $data = array())
$nodes->lxcResize($node, $vmid, $data = array())
$nodes->lxcRrd($node, $vmid, $ds = null, $timeframe = null)
$nodes->lxcRrddata($node, $vmid, $timeframe = null)
$nodes->lxcSpiceproxy($node, $vmid, $data = array())
$nodes->createLxcTemplate($node, $vmid, $data = array())
$nodes->createLxcVncproxy($node, $vmid, $data = array())
$nodes->lxcVncwebsocket($node, $vmid, $port = null, $vncticket = null)
```

## Network

```php
$nodes->Network($node, $type = null)
$nodes->createNetwork($node, $data = array())
$nodes->revertNetwork($node)
$nodes->networkIface($node, $iface)
$nodes->updateNetworkIface($node, $iface, $data = array())
$nodes->deleteNetworkIface($node, $iface)
```

## Qemu

```php
$nodes->Qemu($node)
$nodes->createQemu($node, $data = array())
$nodes->QemuVmid($node, $vmid)
$nodes->deleteQemu($node, $vmid, $data = array())
$nodes->qemuFirewall($node, $vmid)
$nodes->qemuFirewallAliases($node, $vmid)
$nodes->createQemuFirewallAliase($node, $vmid, $data = array())
$nodes->qemuFirewallAliasesName($node, $vmid, $name)
$nodes->updateQemuFirewallAliaseName($node, $vmid, $name, $data = array())
$nodes->deleteQemuFirewallAliaseName($node, $vmid, $name)
$nodes->qemuFirewallIpset($node, $vmid)
$nodes->createQemuFirewallIpset($node, $vmid, $data = array())
$nodes->qemuFirewallIpsetName($node, $vmid, $name)
$nodes->addQemuFirewallIpsetName($node, $vmid, $name, $data = array())
$nodes->deleteQemuFirewallIpsetName($node, $vmid, $name)
$nodes->qemuFirewallIpsetNameCidr($node, $vmid, $name, $cidr)
$nodes->updateQemuFirewallIpsetNameCidr($node, $vmid, $name, $cidr, $data = array())
$nodes->deleteQemuFirewallIpsetNameCidr($node, $vmid, $name, $cidr)
$nodes->qemuFirewallRules($node, $vmid)
$nodes->createQemuFirewallRules($node, $vmid, $data = array())
$nodes->qemuFirewallRulesPos($node, $vmid, $pos)
$nodes->updateQemuFirewallRulesPos($node, $vmid, $pos, $data = array())
$nodes->deleteQemuFirewallRulesPos($node, $vmid, $pos)
$nodes->qemuFirewallLog($node, $vmid, $limit = null, $start = null)
$nodes->qemuFirewallOptions($node, $vmid)
$nodes->setQemuFirewallOptions($node, $vmid, $data = array())
$nodes->qemuFirewallRefs($node, $vmid)
$nodes->qemuSnapshot($node, $vmid)
$nodes->createQemuSnapshot($node, $vmid, $data = array())
$nodes->qemuSnapname($node, $vmid, $snapname)
$nodes->deleteQemuSnapshot($node, $vmid, $snapname)
$nodes->qemuSnapnameConfig($node, $vmid, $snapname)
$nodes->updateQemuSnapshotConfig($node, $vmid, $snapname, $data = array())
$nodes->QemuSnapshotRollback($node, $vmid, $snapname, $data = array())
$nodes->qemuStatus($node, $vmid)
$nodes->qemuCurrent($node, $vmid)
$nodes->qemuResume($node, $vmid, $data = array())
$nodes->qemuReset($node, $vmid, $data = array())
$nodes->qemuShutdown($node, $vmid, $data = array())
$nodes->qemuStart($node, $vmid, $data = array())
$nodes->qemuStop($node, $vmid, $data = array())
$nodes->qemuReboot($node, $vmid, $data = array())
$nodes->qemuSuspend($node, $vmid, $data = array())
$nodes->qemuAgent($node, $vmid, $data = array())
$nodes->qemuAgentExec($node, $vmid, $data = array())
$nodes->qemuAgentSetUserPassword($node, $vmid, $data = array())
$nodes->qemuClone($node, $vmid, $data = array())
$nodes->qemuConfig($node, $vmid)
$nodes->createQemuConfig($node, $vmid, $data = array())
$nodes->setQemuConfig($node, $vmid, $data = array())
$nodes->qemuFeature($node, $vmid)
$nodes->qemuMigrate($node, $vmid, $data = array())
$nodes->qemuMonitor($node, $vmid, $data = array())
$nodes->qemuMoveDisk($node, $vmid, $data = array())
$nodes->qemuPending($node, $vmid)
$nodes->qemuResize($node, $vmid, $data = array())
$nodes->qemuRrd($node, $vmid, $ds = null, $timeframe = null)
$nodes->qemuRrddata($node, $vmid, $timeframe = null)
$nodes->qemuSendkey($node, $vmid, $data = array())
$nodes->qemuSpiceproxy($node, $vmid, $data = array())
$nodes->createQemuTemplate($node, $vmid, $data = array())
$nodes->qemuUnlink($node, $vmid, $data = array())
$nodes->createQemuVncproxy($node, $vmid, $data = array())
$nodes->qemuVncwebsocket($node, $vmid, $port = null, $vncticket = null)
```

## Nodes Replication

```php
$nodes->Replication($node)
$nodes->replicationId($node, $id)
$nodes->replicationLog($node, $id)
$nodes->replicationScheduleNow($node, $id, $data = array())
$nodes->replicationStatus($node, $id)
```

## Scan

```php
$nodes->Scan($node)
$nodes->scanGlusterfs($node)
$nodes->scanIscsi($node)
$nodes->scanLvm($node)
$nodes->scanLvmthin($node)
$nodes->scanUsb($node)
$nodes->scanZfs($node)
```

## Service

```php
$nodes->Services($node)
$nodes->listService($node, $service)
$nodes->servicesReload($node, $service, $data = array())
$nodes->servicesRestart($node, $service, $data = array())
$nodes->servicesStart($node, $service, $data = array())
$nodes->servicesStop($node, $service, $data = array())
$nodes->servicesState($node, $service)
```

## Nodes Storage

```php
$nodes->Storage($node, $content = null, $storage = null, $target = null, $enabled = null)
$nodes->getStorage($node, $storage)
$nodes->listStorageContent($node, $storage)
$nodes->storageContent($node, $storage, $data = array())
$nodes->storageContentVolume($node, $storage, $volume)
$nodes->copyStorageContentVolume($node, $storage, $volume, $data = array())
$nodes->deleteStorageContentVolume($node, $storage, $volume)
$nodes->storageRRD($node)
$nodes->storageRRDdata($node)
$nodes->storageStatus($node)
$nodes->storageUpload($node, $data = array())
```

## Tasks

```php
$nodes->Tasks($node, $errors = null, $limit = null, $vmid = null, $start = null)
$nodes->tasksUpid($node, $upid)
$nodes->tasksStop($node, $upid)
$nodes->tasksLog($node, $upid, $limit = null, $start = null)
$nodes->tasksStatus($node, $upid)
```

## Vzdump

```php
$nodes->createVzdump($node, $data = array())
$nodes->VzdumpExtractConfig($node)
```
