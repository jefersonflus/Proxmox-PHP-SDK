<?php

/**
 * ProxmoxVE PHP API
 *
 * @copyright 2017 Saleh <Saleh7@protonmail.ch>
 * @license http://opensource.org/licenses/MIT The MIT License.
 */

namespace Proxmox;

// /api2/json/nodes
class Nodes
{
  /**
    * Cluster node index.
    * GET /api2/json/nodes
  */
  public function listNodes()
  {
      return Request::Request("/nodes");
  }
  /**
    * Read node status.
    * GET /api2/json/nodes/{node}
    * @param string   $node     The cluster node name.
  */
  public function Node($node)
  {
      return Request::Request("/nodes/$node");
  }
  /**
    * Read node status.
    * GET /api2/json/nodes/{node}/status
    * @param string   $node     The cluster node name.
  */
  public function nodeStatus($node)
  {
      return Request::Request("/nodes/$node/status");
  }
  /**
    * Read node configuration.
    * GET /api2/json/nodes/{node}/config
    * @param string   $node     The cluster node name.
  */
  public function nodeConfig($node)
  {
      return Request::Request("/nodes/$node/config");
  }
  /**
    * Set node configuration.
    * PUT /api2/json/nodes/{node}/config
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function updateNodeConfig($node, $data = array())
  {
      return Request::Request("/nodes/$node/config", $data, "PUT");
  }
  /**
    * Node capabilities index.
    * GET /api2/json/nodes/{node}/capabilities
    * @param string   $node     The cluster node name.
  */
  public function Capabilities($node)
  {
      return Request::Request("/nodes/$node/capabilities");
  }
  /**
    * QEMU capabilities index.
    * GET /api2/json/nodes/{node}/capabilities/qemu
    * @param string   $node     The cluster node name.
  */
  public function capabilitiesQemu($node)
  {
      return Request::Request("/nodes/$node/capabilities/qemu");
  }
  /**
    * Get QEMU CPU capabilities.
    * GET /api2/json/nodes/{node}/capabilities/qemu/cpu
    * @param string   $node     The cluster node name.
  */
  public function capabilitiesQemuCpu($node)
  {
      return Request::Request("/nodes/$node/capabilities/qemu/cpu");
  }
  /**
    * Get QEMU CPU flags capabilities.
    * GET /api2/json/nodes/{node}/capabilities/qemu/cpu-flags
    * @param string   $node     The cluster node name.
  */
  public function capabilitiesQemuCpuFlags($node)
  {
      return Request::Request("/nodes/$node/capabilities/qemu/cpu-flags");
  }
  /**
    * Get QEMU machine type capabilities.
    * GET /api2/json/nodes/{node}/capabilities/qemu/machines
    * @param string   $node     The cluster node name.
  */
  public function capabilitiesQemuMachines($node)
  {
      return Request::Request("/nodes/$node/capabilities/qemu/machines");
  }
  /**
    * Get QEMU migration capabilities.
    * GET /api2/json/nodes/{node}/capabilities/qemu/migration
    * @param string   $node     The cluster node name.
  */
  public function capabilitiesQemuMigration($node)
  {
      return Request::Request("/nodes/$node/capabilities/qemu/migration");
  }
  /**
    * Directory index for apt (Advanced Package Tool).
    * GET /api2/json/nodes/{node}/apt
    * @param string   $node     The cluster node name.
  */
  public function Apt($node)
  {
      return Request::Request("/nodes/$node/apt");
  }
  /**
    * Get package versions known to this node.
    * GET /api2/json/nodes/{node}/apt/versions
    * @param string   $node     The cluster node name.
  */
  public function AptVersions($node)
  {
      return Request::Request("/nodes/$node/apt/versions");
  }
  /**
    * List configured APT repositories.
    * GET /api2/json/nodes/{node}/apt/repositories
    * @param string   $node     The cluster node name.
  */
  public function aptRepositories($node)
  {
      return Request::Request("/nodes/$node/apt/repositories");
  }
  /**
    * Add APT repository.
    * POST /api2/json/nodes/{node}/apt/repositories
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createAptRepository($node, $data = array())
  {
      return Request::Request("/nodes/$node/apt/repositories", $data, "POST");
  }
  /**
    * Update APT repositories configuration.
    * PUT /api2/json/nodes/{node}/apt/repositories
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function updateAptRepositories($node, $data = array())
  {
      return Request::Request("/nodes/$node/apt/repositories", $data, "PUT");
  }
  /**
    * Directory index for apt (Advanced Package Tool).
    * GET /api2/json/nodes/{node}/apt
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function updateApt($node, $data = array())
  {
      return Request::Request("/nodes/$node/apt/update", $data, "POST");
  }
  /**
    * Get package changelogs.
    * GET /api2/json/nodes/{node}/apt/changelog
    * @param string   $node     The cluster node name.
    * @param string   $name     Package name.
  */
  public function AptChangelog($node, $name = null)
  {
      $optional['name'] = !empty($name) ? $name : null;
      return Request::Request("/nodes/$node/apt/changelog", $optional);
  }
  /**
    * List available updates.
    * GET /api2/json/nodes/{node}/apt/update
    * @param string   $node     The cluster node name.
  */
  public function AptUpdate($node)
  {
      return Request::Request("/nodes/$node/apt/update");
  }
  /**
    * This is used to resynchronize the package index files from their sources (apt-get update).
    * POST /api2/json/nodes/{node}/apt/update
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createAptUpdate($node, $data = array())
  {
      return Request::Request("/nodes/$node/apt/update", $data, "POST");
  }
  /**
    * List node certificates.
    * GET /api2/json/nodes/{node}/certificates
    * @param string   $node     The cluster node name.
  */
  public function Certificates($node)
  {
      return Request::Request("/nodes/$node/certificates");
  }
  /**
    * Get certificate information.
    * GET /api2/json/nodes/{node}/certificates/info
    * @param string   $node     The cluster node name.
  */
  public function certificatesInfo($node)
  {
      return Request::Request("/nodes/$node/certificates/info");
  }
  /**
    * List ACME certificate configuration.
    * GET /api2/json/nodes/{node}/certificates/acme
    * @param string   $node     The cluster node name.
  */
  public function certificatesAcme($node)
  {
      return Request::Request("/nodes/$node/certificates/acme");
  }
  /**
    * Order/renew ACME certificate.
    * POST /api2/json/nodes/{node}/certificates/acme/certificate
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createCertificatesAcmeCertificate($node, $data = array())
  {
      return Request::Request("/nodes/$node/certificates/acme/certificate", $data, "POST");
  }
  /**
    * Update ACME certificate settings.
    * PUT /api2/json/nodes/{node}/certificates/acme/certificate
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function updateCertificatesAcmeCertificate($node, $data = array())
  {
      return Request::Request("/nodes/$node/certificates/acme/certificate", $data, "PUT");
  }
  /**
    * Remove ACME certificate.
    * DELETE /api2/json/nodes/{node}/certificates/acme/certificate
    * @param string   $node     The cluster node name.
  */
  public function deleteCertificatesAcmeCertificate($node)
  {
      return Request::Request("/nodes/$node/certificates/acme/certificate", null, "DELETE");
  }
  /**
    * Upload custom certificate.
    * POST /api2/json/nodes/{node}/certificates/custom
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createCertificatesCustom($node, $data = array())
  {
      return Request::Request("/nodes/$node/certificates/custom", $data, "POST");
  }
  /**
    * Remove custom certificate.
    * DELETE /api2/json/nodes/{node}/certificates/custom
    * @param string   $node     The cluster node name.
  */
  public function deleteCertificatesCustom($node)
  {
      return Request::Request("/nodes/$node/certificates/custom", null, "DELETE");
  }
  /**
    * Directory index.
    * GET /api2/json/nodes/{node}/ceph
    * @param string   $node     The cluster node name.
  */
  public function Ceph($node)
  {
      return Request::Request("/nodes/$node/ceph");
  }
  /**
    * Get all ceph flags (cluster scope).
    * GET /api2/json/cluster/ceph/flags
    * @param string   $node     The cluster node name.
  */
  public function CephFlags($node)
  {
      return Request::Request("/cluster/ceph/flags");
  }
  /**
    * Set a ceph flag (cluster scope).
    * PUT /api2/json/cluster/ceph/flags/{flag}
    * @param string   $node     The cluster node name.
    * @param enum     $flag     The ceph flag to set/unset
    * @param array    $data
  */
  public function setCephFlags($node, $flag, $data = array())
  {
      if (!array_key_exists('value', $data)) {
          $data['value'] = true;
      }
      return Request::Request("/cluster/ceph/flags/$flag", $data, "PUT");
  }
  /**
    * Unset a ceph flag (cluster scope).
    * PUT /api2/json/cluster/ceph/flags/{flag}
    * @param string   $node     The cluster node name.
    * @param enum     $flag     The ceph flag to set/unset
  */
  public function unsetCephFlags($node, $flag)
  {
      return Request::Request("/cluster/ceph/flags/$flag", ['value' => false], "PUT");
  }
  /**
    * Get Ceph manager list.
    * GET /api2/json/nodes/{node}/ceph/mgr
    * @param string   $node     The cluster node name.
  */
  public function CephMgr($node)
  {
      return Request::Request("/nodes/$node/ceph/mgr");
  }
  /**
    * Create Ceph Manager
    * POST /api2/json/nodes/{node}/ceph/mgr
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createCephMgr($node, $data = array())
  {
      $id = !empty($data['id']) ? $data['id'] : $node;
      return Request::Request("/nodes/$node/ceph/mgr/$id", $data, "POST");
  }
  /**
    * Destroy Ceph Manager.
    * DELETE /api2/json/nodes/{node}/ceph/mgr/{id}
    * @param string   $node     The cluster node name.
    * @param string   $id       The ID of the manager
  */
  public function destroyCephMgr($node, $id)
  {
      return Request::Request("/nodes/$node/ceph/mgr/$id", null, "DELETE");
  }
  /**
    * Get Ceph monitor list.
    * GET /api2/json/nodes/{node}/ceph/mon
    * @param string   $node     The cluster node name.
  */
  public function CephMon($node)
  {
      return Request::Request("/nodes/$node/ceph/mon");
  }
  /**
    * Create Ceph Monitor and Manager
    * POST /api2/json/nodes/{node}/ceph/mon
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createCephMon($node, $data = array())
  {
      $monid = !empty($data['monid']) ? $data['monid'] : $node;
      return Request::Request("/nodes/$node/ceph/mon/$monid", $data, "POST");
  }
  /**
    * Destroy Ceph Monitor and Manager.
    * DELETE /api2/json/nodes/{node}/ceph/mon/{monid}
    * @param string   $node     The cluster node name.
    * @param string   $monid    Monitor ID
  */
  public function destroyCephMon($node, $monid)
  {
      return Request::Request("/nodes/$node/ceph/mon/$monid", null, "DELETE");
  }
  /**
    * Get Ceph metadata server list.
    * GET /api2/json/nodes/{node}/ceph/mds
    * @param string   $node     The cluster node name.
  */
  public function CephMds($node)
  {
      return Request::Request("/nodes/$node/ceph/mds");
  }
  /**
    * Create Ceph metadata server.
    * POST /api2/json/nodes/{node}/ceph/mds/{name}
    * @param string   $node     The cluster node name.
    * @param string   $name     Metadata server ID.
    * @param array    $data
  */
  public function createCephMds($node, $name, $data = array())
  {
      return Request::Request("/nodes/$node/ceph/mds/$name", $data, "POST");
  }
  /**
    * Destroy Ceph metadata server.
    * DELETE /api2/json/nodes/{node}/ceph/mds/{name}
    * @param string   $node     The cluster node name.
    * @param string   $name     Metadata server ID.
  */
  public function destroyCephMds($node, $name)
  {
      return Request::Request("/nodes/$node/ceph/mds/$name", null, "DELETE");
  }
  /**
    * Get Ceph filesystem list.
    * GET /api2/json/nodes/{node}/ceph/fs
    * @param string   $node     The cluster node name.
  */
  public function CephFs($node)
  {
      return Request::Request("/nodes/$node/ceph/fs");
  }
  /**
    * Create Ceph filesystem.
    * POST /api2/json/nodes/{node}/ceph/fs/{name}
    * @param string   $node     The cluster node name.
    * @param string   $name     Filesystem name.
    * @param array    $data
  */
  public function createCephFs($node, $name, $data = array())
  {
      return Request::Request("/nodes/$node/ceph/fs/$name", $data, "POST");
  }
  /**
    * Get Ceph osd list/tree.
    * GET /api2/json/nodes/{node}/ceph/osd
    * @param string   $node     The cluster node name.
  */
  public function CephOsd($node)
  {
      return Request::Request("/nodes/$node/ceph/osd");
  }
  /**
    * Create OSD
    * POST /api2/json/nodes/{node}/ceph/osd
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createCephOsd($node, $data = array())
  {
      return Request::Request("/nodes/$node/ceph/osd", $data, "POST");
  }
  /**
    * Destroy OSD
    * DELETE /api2/json/nodes/{node}/ceph/osd/{osdid}
    * @param string   $node     The cluster node name.
    * @param string   $osdid    OSD ID
  */
  public function destroyCephOsd($node, $osdid)
  {
      return Request::Request("/nodes/$node/ceph/osd/$osdid", null, "DELETE");
  }
  /**
    * Read Ceph OSD configuration.
    * GET /api2/json/nodes/{node}/ceph/osd/{osdid}
    * @param string   $node     The cluster node name.
    * @param string   $osdid    OSD ID.
  */
  public function CephOsdId($node, $osdid)
  {
      return Request::Request("/nodes/$node/ceph/osd/$osdid");
  }
  /**
    * Read Ceph OSD metadata.
    * GET /api2/json/nodes/{node}/ceph/osd/{osdid}/metadata
    * @param string   $node     The cluster node name.
    * @param string   $osdid    OSD ID.
  */
  public function CephOsdMetadata($node, $osdid)
  {
      return Request::Request("/nodes/$node/ceph/osd/$osdid/metadata");
  }
  /**
    * Read Ceph OSD logical volume info.
    * GET /api2/json/nodes/{node}/ceph/osd/{osdid}/lv-info
    * @param string   $node     The cluster node name.
    * @param string   $osdid    OSD ID.
  */
  public function CephOsdLvInfo($node, $osdid)
  {
      return Request::Request("/nodes/$node/ceph/osd/$osdid/lv-info");
  }
  /**
    * Trigger Ceph OSD scrub.
    * POST /api2/json/nodes/{node}/ceph/osd/{osdid}/scrub
    * @param string   $node     The cluster node name.
    * @param string   $osdid    OSD ID.
    * @param array    $data
  */
  public function CephOsdScrub($node, $osdid, $data = array())
  {
      return Request::Request("/nodes/$node/ceph/osd/$osdid/scrub", $data, "POST");
  }
  /**
    * ceph osd in
    * POST /api2/json/nodes/{node}/ceph/osd/{osdid}/in
    * @param string   $node     The cluster node name.
    * @param string   $osdid    OSD ID
    * @param array    $data
  */
  public function CephOsdIn($node, $osdid, $data = array())
  {
      return Request::Request("/nodes/$node/ceph/osd/$osdid/in", $data, "POST");
  }
  /**
    * ceph osd out
    * POST /api2/json/nodes/{node}/ceph/osd/{osdid}/out
    * @param string   $node     The cluster node name.
    * @param string   $osdid    OSD ID
    * @param array    $data
  */
  public function CephOsdOut($node, $osdid, $data = array())
  {
      return Request::Request("/nodes/$node/ceph/osd/$osdid/out", $data, "POST");
  }
  /**
    * List all pools.
    * GET /api2/json/nodes/{node}/ceph/pool
    * @param string   $node     The cluster node name.
  */
  public function getCephPools($node)
  {
      return Request::Request("/nodes/$node/ceph/pool");
  }
  /**
    * Create POOL
    * POST /api2/json/nodes/{node}/ceph/pool
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createCephPool($node, $data = array())
  {
      return Request::Request("/nodes/$node/ceph/pool", $data, "POST");
  }
  /**
    * Destroy POOL
    * DELETE /api2/json/nodes/{node}/ceph/pool/{name}
    * @param string   $node     The cluster node name.
    * @param string   $name
    * @param array    $data
  */
  public function destroyCephPool($node, $name = null, $data = array())
  {
      if (empty($name) && !empty($data['name'])) {
          $name = $data['name'];
      }
      if (empty($name)) {
          throw new ProxmoxException('Parameter [name] is required to delete ceph pool.');
      }
      return Request::Request("/nodes/$node/ceph/pool/$name", $data, "DELETE");
  }
  /**
    * Read Ceph pool details.
    * GET /api2/json/nodes/{node}/ceph/pool/{name}
    * @param string   $node     The cluster node name.
    * @param string   $name     Pool name.
  */
  public function CephPool($node, $name)
  {
      return Request::Request("/nodes/$node/ceph/pool/$name");
  }
  /**
    * Update Ceph pool.
    * PUT /api2/json/nodes/{node}/ceph/pool/{name}
    * @param string   $node     The cluster node name.
    * @param string   $name     Pool name.
    * @param array    $data
  */
  public function updateCephPool($node, $name, $data = array())
  {
      return Request::Request("/nodes/$node/ceph/pool/$name", $data, "PUT");
  }
  /**
    * Read Ceph pool status.
    * GET /api2/json/nodes/{node}/ceph/pool/{name}/status
    * @param string   $node     The cluster node name.
    * @param string   $name     Pool name.
  */
  public function CephPoolStatus($node, $name)
  {
      return Request::Request("/nodes/$node/ceph/pool/$name/status");
  }
  /**
    * Get Ceph configuration.
    * GET /api2/json/nodes/{node}/ceph/cfg
    * @param string   $node     The cluster node name.
  */
  public function CephConfig($node)
  {
      return Request::Request("/nodes/$node/ceph/cfg");
  }
  /**
    * Read Ceph config from monitor key/value database.
    * GET /api2/json/nodes/{node}/ceph/cfg/db
    * @param string   $node     The cluster node name.
  */
  public function CephConfigDb($node)
  {
      return Request::Request("/nodes/$node/ceph/cfg/db");
  }
  /**
    * Read Ceph config from raw ceph.conf.
    * GET /api2/json/nodes/{node}/ceph/cfg/raw
    * @param string   $node     The cluster node name.
  */
  public function CephConfigRaw($node)
  {
      return Request::Request("/nodes/$node/ceph/cfg/raw");
  }
  /**
    * Read Ceph config values.
    * GET /api2/json/nodes/{node}/ceph/cfg/value
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function CephConfigValue($node, $data = array())
  {
      return Request::Request("/nodes/$node/ceph/cfg/value", $data);
  }
  /**
    * Read Ceph command safety status.
    * GET /api2/json/nodes/{node}/ceph/cmd-safety
    * @param string   $node     The cluster node name.
  */
  public function CephCmdSafety($node)
  {
      return Request::Request("/nodes/$node/ceph/cmd-safety");
  }
  /**
    * Get OSD crush map
    * GET /api2/json/nodes/{node}/ceph/crush
    * @param string   $node     The cluster node name.
  */
  public function CephCrush($node)
  {
      return Request::Request("/nodes/$node/ceph/crush");
  }
  /**
    * List local disks.
    * GET /api2/json/nodes/{node}/disks/list
    * @param string   $node     The cluster node name.
  */
  public function CephDisks($node)
  {
      return Request::Request("/nodes/$node/disks/list");
  }
  /**
    * Create initial ceph default configuration and setup symlinks.
    * POST /api2/json/nodes/{node}/ceph/init
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createCephInit($node, $data = array())
  {
      return Request::Request("/nodes/$node/ceph/init", $data, "POST");
  }
  /**
    * Restart Ceph services.
    * POST /api2/json/nodes/{node}/ceph/restart
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function CephRestart($node, $data = array())
  {
      return Request::Request("/nodes/$node/ceph/restart", $data, "POST");
  }
  /**
    * Read ceph log
    * GET /api2/json/nodes/{node}/ceph/log
    * @param string   $node     The cluster node name.
    * @param integer  $limit
    * @param integer  $start
  */
  public function CephLog($node, $limit = null, $start = null)
  {
      $optional['limit'] = !empty($limit) ? $limit : 50;
      $optional['start'] = !empty($start) ? $start : 0;
      return Request::Request("/nodes/$node/ceph/log", $optional);
  }
  /**
    * List ceph rules.
    * GET /api2/json/nodes/{node}/ceph/rules
    * @param string   $node     The cluster node name.
  */
  public function CephRules($node)
  {
      return Request::Request("/nodes/$node/ceph/rules");
  }
  /**
    * Start ceph services.
    * POST /api2/json/nodes/{node}/ceph/start
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function CephStart($node, $data = array())
  {
      return Request::Request("/nodes/$node/ceph/start", $data, "POST");
  }
  /**
    * Stop ceph services.
    * POST /api2/json/nodes/{node}/ceph/stop
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function CephStop($node, $data = array())
  {
      return Request::Request("/nodes/$node/ceph/stop", $data, "POST");
  }
  /**
    * Get ceph status.
    * GET /api2/json/nodes/{node}/ceph/status
    * @param string   $node     The cluster node name.
  */
  public function CephStatus($node)
  {
      return Request::Request("/nodes/$node/ceph/status");
  }
  /**
    * Node index.
    * GET /api2/json/nodes/{node}/disks
    * @param string   $node     The cluster node name.
  */
  public function getDisks($node)
  {
      return Request::Request("/nodes/$node/disks");
  }
  /**
    * Initialize Disk with GPT
    * POST /api2/json/nodes/{node}/disks/initgpt
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function Disk($node, $data = array())
  {
      return Request::Request("/nodes/$node/disks/initgpt", $data, "POST");
  }
  /**
    * List local disks.
    * GET /api2/json/nodes/{node}/disks/list
    * @param string   $node     The cluster node name.
  */
  public function disksList($node)
  {
      return Request::Request("/nodes/$node/disks/list");
  }
  /**
    * Get SMART Health of a disk.
    * GET /api2/json/nodes/{node}/disks/smart
    * @param string   $node     The cluster node name.
    * @param string   $disk     Block device name
  */
  public function disksSmart($node, $disk = null)
  {
      $optional['disk'] = !empty($disk) ? $disk : null;
      return Request::Request("/nodes/$node/disks/smart", $optional);
  }
  /**
    * List available devices for directory storage creation.
    * GET /api2/json/nodes/{node}/disks/directory
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function disksDirectory($node, $data = array())
  {
      return Request::Request("/nodes/$node/disks/directory", $data);
  }
  /**
    * Create a directory storage on a mounted filesystem.
    * POST /api2/json/nodes/{node}/disks/directory
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createDisksDirectory($node, $data = array())
  {
      return Request::Request("/nodes/$node/disks/directory", $data, 'POST');
  }
  /**
    * Remove directory storage.
    * DELETE /api2/json/nodes/{node}/disks/directory/{name}
    * @param string   $node     The cluster node name.
    * @param string   $name
  */
  public function deleteDisksDirectoryName($node, $name)
  {
      return Request::Request("/nodes/$node/disks/directory/$name", null, 'DELETE');
  }
  /**
    * List available devices for LVM storage creation.
    * GET /api2/json/nodes/{node}/disks/lvm
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function disksLvm($node, $data = array())
  {
      return Request::Request("/nodes/$node/disks/lvm", $data);
  }
  /**
    * Create an LVM storage.
    * POST /api2/json/nodes/{node}/disks/lvm
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createDisksLvm($node, $data = array())
  {
      return Request::Request("/nodes/$node/disks/lvm", $data, 'POST');
  }
  /**
    * Remove an LVM storage.
    * DELETE /api2/json/nodes/{node}/disks/lvm/{name}
    * @param string   $node     The cluster node name.
    * @param string   $name
  */
  public function deleteDisksLvmName($node, $name)
  {
      return Request::Request("/nodes/$node/disks/lvm/$name", null, 'DELETE');
  }
  /**
    * List available devices for LVM-thin storage creation.
    * GET /api2/json/nodes/{node}/disks/lvmthin
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function disksLvmthin($node, $data = array())
  {
      return Request::Request("/nodes/$node/disks/lvmthin", $data);
  }
  /**
    * Create an LVM-thin storage.
    * POST /api2/json/nodes/{node}/disks/lvmthin
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createDisksLvmthin($node, $data = array())
  {
      return Request::Request("/nodes/$node/disks/lvmthin", $data, 'POST');
  }
  /**
    * Remove an LVM-thin storage.
    * DELETE /api2/json/nodes/{node}/disks/lvmthin/{name}
    * @param string   $node     The cluster node name.
    * @param string   $name
  */
  public function deleteDisksLvmthinName($node, $name)
  {
      return Request::Request("/nodes/$node/disks/lvmthin/$name", null, 'DELETE');
  }
  /**
    * Get list of available devices and pools for ZFS creation.
    * GET /api2/json/nodes/{node}/disks/zfs
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function disksZfs($node, $data = array())
  {
      return Request::Request("/nodes/$node/disks/zfs", $data);
  }
  /**
    * Get single ZFS pool information.
    * GET /api2/json/nodes/{node}/disks/zfs/{name}
    * @param string   $node     The cluster node name.
    * @param string   $name
    * @param array    $data
  */
  public function disksZfsName($node, $name, $data = array())
  {
      return Request::Request("/nodes/$node/disks/zfs/$name", $data);
  }
  /**
    * Create a ZFS storage.
    * POST /api2/json/nodes/{node}/disks/zfs
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createDisksZfs($node, $data = array())
  {
      return Request::Request("/nodes/$node/disks/zfs", $data, 'POST');
  }
  /**
    * Remove a ZFS storage.
    * DELETE /api2/json/nodes/{node}/disks/zfs/{name}
    * @param string   $node     The cluster node name.
    * @param string   $name
  */
  public function deleteDisksZfsName($node, $name)
  {
      return Request::Request("/nodes/$node/disks/zfs/$name", null, 'DELETE');
  }
  /**
    * Wipe a disk.
    * PUT /api2/json/nodes/{node}/disks/wipedisk
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function disksWipedisk($node, $data = array())
  {
      return Request::Request("/nodes/$node/disks/wipedisk", $data, 'PUT');
  }
  /**
    * Directory index.
    * GET /api2/json/nodes/{node}/firewall
    * @param string   $node     The cluster node name.
  */
  public function Firewall($node)
  {
      return Request::Request("/nodes/$node/firewall");
  }
  /**
    * List rules.
    * GET /api2/json/nodes/{node}/firewall/rules
    * @param string   $node     The cluster node name.
  */
  public function firewallRules($node)
  {
      return Request::Request("/nodes/$node/firewall/rules");
  }
  /**
    * Create new rule
    * POST /api2/json/nodes/{node}/firewall/rules
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createFirewallRule($node, $data = array())
  {
      return Request::Request("/nodes/$node/firewall/rules", $data, "POST");
  }
  /**
    * Get single rule data.
    * GET /api2/json/nodes/{node}/firewall/rules/{pos}
    * @param string   $node     The cluster node name.
    * @param integer  $pos      Update rule at position <pos>.
  */
  public function firewallRulesPos($node, $pos)
  {
      return Request::Request("/nodes/$node/firewall/rules/$pos");
  }
  /**
    * Modify rule data.
    * PUT /api2/json/nodes/{node}/firewall/rules/{pos}
    * @param string   $node     The cluster node name.
    * @param integer  $pos      Update rule at position <pos>.
    * @param array    $data
  */
  public function setFirewallRulePos($node, $pos, $data = array())
  {
      return Request::Request("/nodes/$node/firewall/rules/$pos", $data, "PUT");
  }
  /**
    * Delete rule.
    * DELETE /api2/json/nodes/{node}/firewall/rules/{pos}
    * @param string   $node     The cluster node name.
    * @param integer  $pos      Update rule at position <pos>.
  */
  public function deleteFirewallRulePos($node, $pos)
  {
      return Request::Request("/nodes/$node/firewall/rules/$pos", null, 'DELETE');
  }
  /**
    * Read firewall log
    * GET /api2/json/nodes/{node}/firewall/log
    * @param string   $node     The cluster node name.
  */
  public function firewallRulesLog($node)
  {
      return Request::Request("/nodes/$node/firewall/log");
  }
  /**
    * Get host firewall options.
    * GET /api2/json/nodes/{node}/firewall/options
    * @param string   $node     The cluster node name.
  */
  public function firewallRulesOptions($node)
  {
      return Request::Request("/nodes/$node/firewall/options");
  }
  /**
    * Set Firewall options.
    * PUT /api2/json/nodes/{node}/firewall/options
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function setFirewallRuleOptions($node, $data = array())
  {
      return Request::Request("/nodes/$node/firewall/options", $data, "PUT");
  }
  /**
    * LXC container index (per node).
    * GET /api2/json/nodes/{node}/lxc
    * @param string   $node     The cluster node name.
  */
  public function Lxc($node)
  {
      return Request::Request("/nodes/$node/lxc");
  }
  /**
    * Create or restore a container.
    * POST /api2/json/nodes/{node}/lxc
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createLxc($node, $data = array())
  {
      return Request::Request("/nodes/$node/lxc", $data, "POST");
  }
  /**
    * Directory index
    * GET /api2/json/nodes/{node}/lxc/{vmid}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function LxcVmid($node, $vmid)
  {
      return Request::Request("/nodes/$node/lxc/$vmid");
  }
  /**
    * Destroy the container (also delete all uses files).
    * DELETE /api2/json/nodes/{node}/lxc/{vmid}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function deleteLxc($node, $vmid)
  {
      return Request::Request("/nodes/$node/lxc/$vmid", null,"DELETE");
  }
  /**
    * Directory index.
    * GET /api2/json/nodes/{node}/lxc/{vmid}/firewall/aliases
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function lxcFirewall($node, $vmid)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall");
  }
  /**
    * List aliases
    * GET /api2/json/nodes/{node}/lxc/{vmid}/firewall/aliases
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function lxcFirewallAliases($node, $vmid)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/aliases");
  }
  /**
    * Create IP or Network Alias
    * POST /api2/json/nodes/{node}/lxc/{vmid}/firewall/aliases
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function createLxcFirewallAliase($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/aliases", $data, 'POST');
  }
  /**
    * Read alias.
    * GET /api2/json/nodes/{node}/lxc/{vmid}/firewall/aliases/{name}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param string   $name     Alias name.
  */
  public function lxcFirewallAliasesName($node, $vmid, $name)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/aliases/$name");
  }
  /**
    * Update IP or Network alias
    * PUT /api2/json/nodes/{node}/lxc/{vmid}/firewall/aliases/{name}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param string   $name     Alias name.
    * @param array    $data
  */
  public function updateLxcFirewallAliaseName($node, $vmid, $name, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/aliases/$name", $data, 'PUT');
  }
  /**
    * Remove IP or Network alias.
    * DELETE /api2/json/nodes/{node}/lxc/{vmid}/firewall/aliases/{name}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param string   $name     Alias name.
  */
  public function deleteLxcFirewallAliaseName($node, $vmid, $name)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/aliases/$name", null, 'DELETE');
  }
  /**
    * List IPSets
    * GET /api2/json/nodes/{node}/lxc/{vmid}/firewall/ipset
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function lxcFirewallIpset($node, $vmid)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/ipset");
  }
  /**
    * Create new IPSet
    * POST /api2/json/nodes/{node}/lxc/{vmid}/firewall/ipset
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function createLxcFirewallIpset($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/ipset", $data, "POST");
  }
  /**
    * List IPSet content
    * GET /api2/json/nodes/{node}/lxc/{vmid}/firewall/ipset/{name}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param string   $name     IP set name.
  */
  public function lxcFirewallIpsetName($node, $vmid, $name)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/ipset/$name");
  }
  /**
    * Add IP or Network to IPSet.
    * POST /api2/json/nodes/{node}/lxc/{vmid}/firewall/ipset/{name}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param string   $name     IP set name.
    * @param array    $data
  */
  public function addLxcFirewallIpsetName($node, $vmid, $name, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/ipset/$name", $data, 'POST');
  }
  /**
    * Delete IPSet
    * DELETE /api2/json/nodes/{node}/lxc/{vmid}/firewall/ipset/{name}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param string   $name     IP set name.
  */
  public function deleteLxcFirewallIpsetName($node, $vmid, $name)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/ipset/$name", null, 'DELETE');
  }
  /**
    * Read IP or Network settings from IPSet.
    * GET /api2/json/nodes/{node}/lxc/{vmid}/firewall/ipset/{name}/{cidr}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param string   $name     IP set name.
    * @param string   $cidr     Network/IP specification in CIDR format.
  */
  public function lxcFirewallIpsetNameCidr($node, $vmid, $name, $cidr)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/ipset/$name/$cidr");
  }
  /**
    * Update IP or Network settings
    * PUT /api2/json/nodes/{node}/lxc/{vmid}/firewall/ipset/{name}/{cidr}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param string   $name     IP set name.
    * @param string   $cidr     Network/IP specification in CIDR format.
    * @param array    $data
  */
  public function updateLxcFirewallIpsetNameCidr($node, $vmid, $name, $cidr, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/ipset/$name/$cidr", $data, 'PUT');
  }
  /**
    * Remove IP or Network settings
    * DELETE /api2/json/nodes/{node}/lxc/{vmid}/firewall/ipset/{name}/{cidr}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param string   $name     IP set name.
    * @param string   $cidr     Network/IP specification in CIDR format.
  */
  public function deleteLxcFirewallIpsetNameCidr($node, $vmid, $name, $cidr)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/ipset/$name/$cidr", null, 'DELETE');
  }
  /**
    * List rules.
    * GET /api2/json/nodes/{node}/lxc/{vmid}/firewall/rules
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function lxcFirewallRules($node, $vmid)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/rules");
  }
  /**
    * Create new rule.
    * POST /api2/json/nodes/{node}/lxc/{vmid}/firewall/rules
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function createLxcFirewallRules($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/rules", $data, 'POST');
  }
  /**
    * Get single rule data.
    * GET /api2/json/nodes/{node}/lxc/{vmid}/firewall/rules/{pos}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function lxcFirewallRulesPos($node, $vmid, $pos)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/rules/$pos");
  }
  /**
    * Modify rule data.
    * PUT /api2/json/nodes/{node}/lxc/{vmid}/firewall/rules/{pos}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function setLxcFirewallRulesPos($node, $vmid, $pos, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/rules/$pos", $data, "PUT");
  }
  /**
    * Delete rule.
    * DELETE /api2/json/nodes/{node}/lxc/{vmid}/firewall/rules/{pos}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function deleteLxcFirewallRulesPos($node, $vmid, $pos)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/rules/$pos", null, "DELETE");
  }
  /**
    * Read firewall log
    * GET /api2/json/nodes/{node}/lxc/{vmid}/firewall/log
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param integer  $limit
    * @param integer  $start
  */
  public function lxcFirewallLog($node, $vmid, $limit = null, $start = null)
  {
      $optional['limit'] = !empty($limit) ? $limit : 50;
      $optional['start'] = !empty($start) ? $start : 0;
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/log", $optional);
  }
  /**
    * Get VM firewall options.
    * GET /api2/json/nodes/{node}/lxc/{vmid}/firewall/options
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function lxcFirewallOptions($node, $vmid)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/options");
  }
  /**
    * Set Firewall options.
    * PUT /api2/json/nodes/{node}/lxc/{vmid}/firewall/options
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function setLxcFirewallOptions($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/options", $data, 'PUT');
  }
  /**
    * Lists possible IPSet/Alias reference which are allowed in source/dest properties.
    * GET /api2/json/nodes/{node}/lxc/{vmid}/firewall/refs
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function lxcFirewallRefs($node, $vmid)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/firewall/refs");
  }
  /**
    * List all snapshots.
    * GET /api2/json/nodes/{node}/lxc/{vmid}/snapshot
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function lxcSnapshot($node, $vmid)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/snapshot");
  }
  /**
    * Snapshot a container.
    * POST /api2/json/nodes/{node}/lxc/{vmid}/snapshot
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function createLxcSnapshot($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/snapshot", $data, 'POST');
  }
  /**
    * List all snapshots.
    * GET /api2/json/nodes/{node}/lxc/{vmid}/snapshot/{snapname}
    * @param string   $node         The cluster node name.
    * @param integer  $vmid         The (unique) ID of the VM.
    * @param string   $snapname     The name of the snapshot.
  */
  public function lxcSnapname($node, $vmid, $snapname)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/snapshot/$snapname");
  }
  /**
    * Delete a LXC snapshot.
    * DELETE /api2/json/nodes/{node}/lxc/{vmid}/snapshot/{snapname}
    * @param string   $node         The cluster node name.
    * @param integer  $vmid         The (unique) ID of the VM.
    * @param string   $snapname     The name of the snapshot.
  */
  public function deleteLxcSnapshot($node, $vmid, $snapname)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/snapshot/$snapname", null, 'DELETE');
  }
  /**
    * Get snapshot configuration
    * GET /api2/json/nodes/{node}/lxc/{vmid}/snapshot/{snapname}/config
    * @param string   $node         The cluster node name.
    * @param integer  $vmid         The (unique) ID of the VM.
    * @param string   $snapname     The name of the snapshot.
  */
  public function lxcSnapnameConfig($node, $vmid, $snapname)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/snapshot/$snapname/config");
  }
  /**
    * Update snapshot metadata.
    * PUT /api2/json/nodes/{node}/lxc/{vmid}/snapshot/{snapname}/config
    * @param string   $node         The cluster node name.
    * @param integer  $vmid         The (unique) ID of the VM.
    * @param string   $snapname     The name of the snapshot.
    * @param array    $data
  */
  public function lxcSnapshotConfig($node, $vmid, $snapname, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/snapshot/$snapname/config", $data, 'PUT');
  }
  /**
    * Rollback LXC state to specified snapshot.
    * POST /api2/json/nodes/{node}/lxc/{vmid}/snapshot/{snapname}/rollback
    * @param string   $node         The cluster node name.
    * @param integer  $vmid         The (unique) ID of the VM.
    * @param string   $snapname    The name of the snapshot.
    * @param array    $data
  */
  public function lxcSnapshotRollback($node, $vmid, $snapname, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/snapshot/$snapname/rollback", $data, 'POST');
  }
  /**
    * Directory index
    * GET /api2/json/nodes/{node}/lxc/{vmid}/status
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function lxcStatus($node, $vmid)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/status");
  }
  /**
    * Get virtual machine status.
    * GET /api2/json/nodes/{node}/lxc/{vmid}/status/current
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function lxcCurrent($node, $vmid)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/status/current");
  }
  /**
    * Resume the container.
    * POST /api2/json/nodes/{node}/lxc/{vmid}/status/resume
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function lxcResume($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/status/resume", $data, 'POST');
  }
  /**
    * Shutdown the container. This will trigger a clean shutdown of the container, see lxc-stop(1) for details.
    * POST /api2/json/nodes/{node}/lxc/{vmid}/status/shutdown
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function lxcShutdown($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/status/shutdown", $data, 'POST');
  }
  /**
    * Start the container.
    * POST /api2/json/nodes/{node}/lxc/{vmid}/status/start
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function lxcStart($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/status/start", $data, 'POST');
  }
  /**
    * Stop the container. This will abruptly stop all processes running in the container.
    * POST /api2/json/nodes/{node}/lxc/{vmid}/status/stop
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function lxcStop($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/status/stop", $data, 'POST');
  }
  /**
    * Suspend the container.
    * POST /api2/json/nodes/{node}/lxc/{vmid}/status/suspend
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
    public function lxcReboot($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/status/reboot", $data, 'POST');
  }
    /**
    * Reboot the container.
    * POST /api2/json/nodes/{node}/lxc/{vmid}/status/reboot
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function lxcSuspend($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/status/suspend", $data, 'POST');
  }
  /**
    * Create a container clone/copy
    * POST /api2/json/nodes/{node}/lxc/{vmid}/clone
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function lxcClone($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/clone", $data, 'POST');
  }
  /**
    * Get container configuration.
    * GET /api2/json/nodes/{node}/lxc/{vmid}/config
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function lxcConfig($node, $vmid)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/config");
  }
  /**
    * Set container options.
    * PUT /api2/json/nodes/{node}/lxc/{vmid}/config
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function setLxcConfig($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/config", $data, 'PUT');
  }
  /**
    * Read network interfaces.
    * GET /api2/json/nodes/{node}/lxc/{vmid}/interfaces
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function lxcInterfaces($node, $vmid)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/interfaces");
  }
  /**
    * Get container configuration, including pending changes.
    * GET /api2/json/nodes/{node}/lxc/{vmid}/pending
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function lxcPending($node, $vmid)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/pending");
  }
  /**
    * Check if feature for virtual machine is available.
    * GET /api2/json/nodes/{node}/lxc/{vmid}/feature
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function lxcFeature($node, $vmid)
  {
      return Request::Request("/nodes/$node/lxc/$vmid/feature");
  }
  /**
    * Get preconditions for migration.
    * GET /api2/json/nodes/{node}/lxc/{vmid}/migrate
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function lxcMigrateInfo($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/migrate", $data);
  }
  /**
    * Migrate the container to another node. Creates a new migration task.
    * POST /api2/json/nodes/{node}/lxc/{vmid}/migrate
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function lxcMigrate($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/migrate", $data, 'POST');
  }
  /**
    * Move a rootfs-/mp-volume to a different storage or volume.
    * POST /api2/json/nodes/{node}/lxc/{vmid}/move_volume
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function lxcMoveVolume($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/move_volume", $data, 'POST');
  }
  /**
    * Open a web socket for data transfer by mtunnel.
    * GET /api2/json/nodes/{node}/lxc/{vmid}/mtunnelwebsocket
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function lxcMtunnelwebsocket($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/mtunnelwebsocket", $data);
  }
  /**
    * Migration tunnel endpoint for LXC containers.
    * POST /api2/json/nodes/{node}/lxc/{vmid}/mtunnel
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function lxcMtunnel($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/mtunnel", $data, 'POST');
  }
  /**
    * Migrate container to a remote cluster.
    * POST /api2/json/nodes/{node}/lxc/{vmid}/remote_migrate
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function lxcRemoteMigrate($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/remote_migrate", $data, 'POST');
  }
  /**
    * Creates a TCP terminal proxy.
    * POST /api2/json/nodes/{node}/lxc/{vmid}/termproxy
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function lxcTermproxy($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/termproxy", $data, 'POST');
  }
  /**
    * Resize a container mount point.
    * PUT /api2/json/nodes/{node}/lxc/{vmid}/resize
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function lxcResize($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/resize", $data, 'PUT');
  }
  /**
    * Read VM RRD statistics (returns PNG)
    * GET /api2/json/nodes/{node}/lxc/{vmid}/rrd
    * @param string   $node         The cluster node name.
    * @param integer  $vmid         The (unique) ID of the VM.
    * @param string   $ds           The list of datasources you want to display.
    * @param enum     $timeframe    Specify the time frame you are interested in.
  */
  public function lxcRrd($node, $vmid, $ds = null, $timeframe = null)
  {
      $optional['ds'] = !empty($ds) ? $ds : null;
      $optional['timeframe'] = !empty($timeframe) ? $timeframe : null;
      return Request::Request("/nodes/$node/lxc/$vmid/rrd", $optional);
  }
  /**
    * Read VM RRD statistics
    * GET /api2/json/nodes/{node}/lxc/{vmid}/rrddata
    * @param string   $node         The cluster node name.
    * @param integer  $vmid         The (unique) ID of the VM.
    * @param enum     $timeframe    Specify the time frame you are interested in.
  */
  public function lxcRrddata($node, $vmid, $timeframe = null)
  {
      $optional['timeframe'] = !empty($timeframe) ? $timeframe : null;
      return Request::Request("/nodes/$node/lxc/$vmid/rrddata", $optional);
  }
  /**
    * Returns a SPICE configuration to connect to the CT.
    * POST /api2/json/nodes/{node}/lxc/{vmid}/spiceproxy
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function lxcSpiceproxy($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/spiceproxy", $data, 'POST');
  }
  /**
    * Create a Template.
    * POST /api2/json/nodes/{node}/lxc/{vmid}/template
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function createLxcTemplate($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/template", $data, 'POST');
  }
  /**
    * Creates a TCP VNC proxy connections.
    * POST /api2/json/nodes/{node}/lxc/{vmid}/vncproxy
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function createLxcVncproxy($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/lxc/$vmid/vncproxy", $data, 'POST');
  }
  /**
    * Opens a weksocket for VNC traffic.
    * GET /api2/json/nodes/{node}/lxc/{vmid}/vncwebsocket
    * @param string   $node       The cluster node name.
    * @param integer  $vmid       The (unique) ID of the VM.
    * @param integer  $port       Port number returned by previous vncproxy call.
    * @param string   $vncticket  Ticket from previous call to vncproxy.
  */
  public function lxcVncwebsocket($node, $vmid, $port = null, $vncticket = null)
  {
      $optional['port'] = !empty($port) ? $port : null;
      $optional['vncticket'] = !empty($vncticket) ? $vncticket : null;
      return Request::Request("/nodes/$node/lxc/$vmid/vncwebsocket", $optional);
  }
  /**
    * get List available networks
    * GET /api2/json/nodes/{node}/network
    * @param string   $node       The cluster node name.
    * @param enum     $type       Only list specific interface types.
  */
  public function Network($node, $type = null)
  {
      $optional['type'] = !empty($type) ? $type : null;
      return Request::Request("/nodes/$node/network", $optional);
  }
  /**
    * Create network device configuration
    * POST /api2/json/nodes/{node}/network
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createNetwork($node, $data = array())
  {
      return Request::Request("/nodes/$node/network", $data, 'POST');
  }
  /**
    * Apply pending network changes.
    * PUT /api2/json/nodes/{node}/network
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function updateNetwork($node, $data = array())
  {
      return Request::Request("/nodes/$node/network", $data, 'PUT');
  }
  /**
    * Revert network configuration changes.
    * DELETE /api2/json/nodes/{node}/network
    * @param string   $node     The cluster node name.
  */
  public function revertNetwork($node)
  {
      return Request::Request("/nodes/$node/network", null, 'DELETE');
  }
  /**
    * Network interface name.
    * GET /api2/json/nodes/{node}/network/{iface}
    * @param string   $node     The cluster node name.
    * @param string   $iface
  */
  public function networkIface($node, $iface)
  {
      return Request::Request("/nodes/$node/network/$iface");
  }
  /**
    * Update network device configuration
    * PUT /api2/json/nodes/{node}/network/{iface}
    * @param string   $node     The cluster node name.
    * @param string   $iface
    * @param array    $data
  */
  public function updateNetworkIface($node, $iface, $data = array())
  {
      return Request::Request("/nodes/$node/network/$iface", $data, 'PUT');
  }
  /**
    * Delete network device configuration
    * DELETE /api2/json/nodes/{node}/network/{iface}
    * @param string   $node     The cluster node name.
    * @param string   $iface
  */
  public function deleteNetworkIface($node, $iface)
  {
      return Request::Request("/nodes/$node/network/$iface", null, 'DELETE');
  }
  /**
    * Virtual machine index (per node).
    * GET /api2/json/nodes/{node}/qemu
    * @param string   $node     The cluster node name.
  */
  public function Qemu($node)
  {
      return Request::Request("/nodes/$node/qemu");
  }
  /**
    * Create or restore a virtual machine.
    * POST /api2/json/nodes/{node}/qemu
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createQemu($node, $data = array())
  {
      return Request::Request("/nodes/$node/qemu", $data, "POST");
  }
  /**
    * Directory index
    * GET /api2/json/nodes/{node}/qemu/{vmid}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function QemuVmid($node, $vmid)
  {
      return Request::Request("/nodes/$node/qemu/$vmid");
  }
  /**
    * Destroy the vm (also delete all used/owned volumes)
    * DELETE /api2/json/nodes/{node}/qemu/{vmid}
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function deleteQemu($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid", $data, "DELETE");
  }
  /**
    * Directory index.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/firewall/aliases
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
  */
  public function qemuFirewall($node, $vmid)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall");
  }
  /**
    * List aliases
    * GET /api2/json/nodes/{node}/qemu/{vmid}/firewall/aliases
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
  */
  public function qemuFirewallAliases($node, $vmid)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/aliases");
  }
  /**
    * Create IP or Network Alias
    * POST /api2/json/nodes/{node}/qemu/{vmid}/firewall/aliases
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function createQemuFirewallAliase($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/aliases", $data, 'POST');
  }
  /**
    * Read alias.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/firewall/aliases/{name}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param string   $name     Alias name.
  */
  public function qemuFirewallAliasesName($node, $vmid, $name)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/aliases/$name");
  }
  /**
    * Update IP or Network alias
    * PUT /api2/json/nodes/{node}/qemu/{vmid}/firewall/aliases/{name}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param string   $name     Alias name.
    * @param array    $data
  */
  public function updateQemuFirewallAliaseName($node, $vmid, $name, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/aliases/$name", $data, 'PUT');
  }
  /**
    * Remove IP or Network alias.
    * DELETE /api2/json/nodes/{node}/qemu/{vmid}/firewall/aliases/{name}
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param string   $name    Alias name.
  */
  public function deleteQemuFirewallAliaseName($node, $vmid, $name)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/aliases/$name", null, 'DELETE');
  }
  /**
    * List IPSets
    * GET /api2/json/nodes/{node}/qemu/{vmid}/firewall/ipset
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function qemuFirewallIpset($node, $vmid)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/ipset");
  }
  /**
    * Create new IPSet
    * POST /api2/json/nodes/{node}/qemu/{vmid}/firewall/ipset
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function createQemuFirewallIpset($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/ipset", $data, "POST");
  }
  /**
    * List IPSet content
    * GET /api2/json/nodes/{node}/qemu/{vmid}/firewall/ipset/{name}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param string   $name     IP set name.
  */
  public function qemuFirewallIpsetName($node, $vmid, $name)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/ipset/$name");
  }
  /**
    * Add IP or Network to IPSet.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/firewall/ipset/{name}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param string   $name     IP set name.
    * @param array    $data
  */
  public function addQemuFirewallIpsetName($node, $vmid, $name, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/ipset/$name", $data, 'POST');
  }
  /**
    * Delete IPSet
    * DELETE /api2/json/nodes/{node}/qemu/{vmid}/firewall/ipset/{name}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param string   $name     IP set name.
  */
  public function deleteQemuFirewallIpsetName($node, $vmid, $name)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/ipset/$name", null, 'DELETE');
  }
  /**
    * Read IP or Network settings from IPSet.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/firewall/ipset/{name}/{cidr}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param string   $name     IP set name.
    * @param string   $cidr     Network/IP specification in CIDR format.
  */
  public function qemuFirewallIpsetNameCidr($node, $vmid, $name, $cidr)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/ipset/$name/$cidr");
  }
  /**
    * Update IP or Network settings
    * PUT /api2/json/nodes/{node}/qemu/{vmid}/firewall/ipset/{name}/{cidr}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param string   $name     IP set name.
    * @param string   $cidr     Network/IP specification in CIDR format.
    * @param array    $data
  */
  public function updateQemuFirewallIpsetNameCidr($node, $vmid, $name, $cidr, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/ipset/$name/$cidr", $data, 'PUT');
  }
  /**
    * Remove IP or Network settings
    * DELETE /api2/json/nodes/{node}/qemu/{vmid}/firewall/ipset/{name}/{cidr}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param string   $name     IP set name.
    * @param string   $cidr     Network/IP specification in CIDR format.
  */
  public function deleteQemuFirewallIpsetNameCidr($node, $vmid, $name, $cidr)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/ipset/$name/$cidr", null, 'DELETE');
  }
  /**
    * List rules.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/firewall/rules
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function qemuFirewallRules($node, $vmid)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/rules");
  }
  /**
    * Create new rule.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/firewall/rules
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function createQemuFirewallRules($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/rules", $data, 'POST');
  }
  /**
    * Get single rule data.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/firewall/rules/{pos}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function qemuFirewallRulesPos($node, $vmid, $pos)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/rules/$pos");
  }
  /**
    * Modify rule data.
    * PUT /api2/json/nodes/{node}/qemu/{vmid}/firewall/rules/{pos}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function updateQemuFirewallRulesPos($node, $vmid, $pos, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/rules/$pos", $data, "PUT");
  }
  /**
    * Delete rule.
    * DELETE /api2/json/nodes/{node}/qemu/{vmid}/firewall/rules/{pos}
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function deleteQemuFirewallRulesPos($node, $vmid, $pos)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/rules/$pos", null, "DELETE");
  }
  /**
    * Read firewall log
    * GET /api2/json/nodes/{node}/qemu/{vmid}/firewall/log
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param integer  $limit
    * @param integer  $start
  */
  public function qemuFirewallLog($node, $vmid, $limit = null, $start = null)
  {
      $optional['limit'] = !empty($limit) ? $limit : 50;
      $optional['start'] = !empty($start) ? $start : 0;
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/log", $optional);
  }
  /**
    * Get VM firewall options.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/firewall/options
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function qemuFirewallOptions($node, $vmid)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/options");
  }
  /**
    * Set Firewall options.
    * PUT /api2/json/nodes/{node}/qemu/{vmid}/firewall/options
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function setQemuFirewallOptions($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/options", $data, 'PUT');
  }
  /**
    * Lists possible IPSet/Alias reference which are allowed in source/dest properties.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/firewall/refs
    * @param string   $node    The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function qemuFirewallRefs($node, $vmid)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/firewall/refs");
  }
  /**
    * List all snapshots.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/snapshot
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function qemuSnapshot($node, $vmid)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/snapshot");
  }
  /**
    * Snapshot a VM.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/snapshot
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function createQemuSnapshot($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/snapshot", $data, 'POST');
  }
  /**
    * List all snapshots.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/snapshot/{snapname}
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param string   snapname The name of the snapshot.
  */
  public function qemuSnapname($node, $vmid, $snapname)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/snapshot/$snapname");
  }
  /**
    * Delete a VM snapshot.
    * DELETE /api2/json/nodes/{node}/qemu/{vmid}/snapshot/{snapname}
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param string   snapname The name of the snapshot.
  */
  public function deleteQemuSnapshot($node, $vmid, $snapname)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/snapshot/$snapname", null, 'DELETE');
  }
  /**
    * Get snapshot configuration
    * GET /api2/json/nodes/{node}/qemu/{vmid}/snapshot/{snapname}/config
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param string   snapname The name of the snapshot.
  */
  public function qemuSnapnameConfig($node, $vmid, $snapname)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/snapshot/$snapname/config");
  }
  /**
    * Update snapshot metadata.
    * PUT /api2/json/nodes/{node}/qemu/{vmid}/snapshot/{snapname}/config
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param string   snapname The name of the snapshot.
    * @param array    $data
  */
  public function updateQemuSnapshotConfig($node, $vmid, $snapname, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/snapshot/$snapname/config", $data, 'PUT');
  }
  /**
    * Rollback VM state to specified snapshot.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/snapshot/{snapname}/rollback
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param string   snapname The name of the snapshot.
    * @param array    $data
  */
  public function QemuSnapshotRollback($node, $vmid, $snapname, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/snapshot/$snapname/rollback", $data, 'POST');
  }
  /**
    * Directory index
    * GET /api2/json/nodes/{node}/qemu/{vmid}/status
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
  */
  public function qemuStatus($node, $vmid)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/status");
  }
  /**
    * Get virtual machine status.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/status/current
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
  */
  public function qemuCurrent($node, $vmid)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/status/current");
  }
  /**
    * Resume the virtual machine.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/status/resume
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuResume($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/status/resume", $data, 'POST');
  }
  /**
    * Reset the virtual machine.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/status/reset
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuReset($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/status/reset", $data, 'POST');
  }
  /**
    * Shutdown virtual machine. This is similar to pressing the power button on a physical machine.This will send an ACPI event for the guest OS, which should then proceed to a clean shutdown.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/status/shutdown
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuShutdown($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/status/shutdown", $data, 'POST');
  }
  /**
    * Start the virtual machine.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/status/start
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuStart($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/status/start", $data, 'POST');
  }
  /**
    * Stop virtual machine. The qemu process will exit immediately. Thisis akin to pulling the power plug of a running computer and may damage the VM data
    * POST /api2/json/nodes/{node}/qemu/{vmid}/status/stop
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuStop($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/status/stop", $data, 'POST');
  }
  /**
    * Reboot virtual machine.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/status/reboot
    * @param string   $node     The cluster node name.
    * @param integer  $vmid     The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuReboot($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/status/reboot", $data, 'POST');
  }
  /**
    * Suspend the  virtual machine.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/status/suspend
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuSuspend($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/status/suspend", $data, 'POST');
  }
  /**
    * Execute Qemu Guest Agent commands.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/agent
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgent($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent", $data, 'POST');
  }
  /**
    * Read Qemu Guest Agent command index.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/agent
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentIndex($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent", $data);
  }
  /**
    * Execute command via Qemu Guest Agent.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/agent/exec
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentExec($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/exec", $data, 'POST');
  }
  /**
    * Read command status from Qemu Guest Agent exec.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/agent/exec-status
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentExecStatus($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/exec-status", $data);
  }
  /**
    * Read file content via Qemu Guest Agent.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/agent/file-read
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentFileRead($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/file-read", $data);
  }
  /**
    * Write file content via Qemu Guest Agent.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/agent/file-write
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentFileWrite($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/file-write", $data, 'POST');
  }
  /**
    * Freeze guest filesystem.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/agent/fsfreeze-freeze
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentFsfreezeFreeze($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/fsfreeze-freeze", $data, 'POST');
  }
  /**
    * Read guest filesystem freeze status.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/agent/fsfreeze-status
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentFsfreezeStatus($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/fsfreeze-status", $data, 'POST');
  }
  /**
    * Thaw guest filesystem.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/agent/fsfreeze-thaw
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentFsfreezeThaw($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/fsfreeze-thaw", $data, 'POST');
  }
  /**
    * Trigger guest fstrim.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/agent/fstrim
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentFstrim($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/fstrim", $data, 'POST');
  }
  /**
    * Read guest filesystem information.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/agent/get-fsinfo
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentGetFsinfo($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/get-fsinfo", $data);
  }
  /**
    * Read guest host name.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/agent/get-host-name
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentGetHostName($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/get-host-name", $data);
  }
  /**
    * Read guest memory block info.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/agent/get-memory-block-info
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentGetMemoryBlockInfo($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/get-memory-block-info", $data);
  }
  /**
    * Read guest memory blocks.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/agent/get-memory-blocks
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentGetMemoryBlocks($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/get-memory-blocks", $data);
  }
  /**
    * Read guest OS info.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/agent/get-osinfo
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentGetOsinfo($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/get-osinfo", $data);
  }
  /**
    * Read guest time.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/agent/get-time
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentGetTime($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/get-time", $data);
  }
  /**
    * Read guest timezone.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/agent/get-timezone
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentGetTimezone($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/get-timezone", $data);
  }
  /**
    * Read guest users.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/agent/get-users
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentGetUsers($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/get-users", $data);
  }
  /**
    * Read guest vCPU info.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/agent/get-vcpus
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentGetVcpus($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/get-vcpus", $data);
  }
  /**
    * Read guest agent info.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/agent/info
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentInfo($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/info", $data);
  }
  /**
    * Read guest network interfaces.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/agent/network-get-interfaces
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentNetworkGetInterfaces($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/network-get-interfaces", $data);
  }
  /**
    * Ping Qemu Guest Agent.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/agent/ping
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentPing($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/ping", $data, 'POST');
  }
  /**
    * Shutdown via Qemu Guest Agent.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/agent/shutdown
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentShutdown($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/shutdown", $data, 'POST');
  }
  /**
    * Suspend to disk via Qemu Guest Agent.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/agent/suspend-disk
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentSuspendDisk($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/suspend-disk", $data, 'POST');
  }
  /**
    * Suspend hybrid via Qemu Guest Agent.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/agent/suspend-hybrid
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentSuspendHybrid($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/suspend-hybrid", $data, 'POST');
  }
  /**
    * Suspend to RAM via Qemu Guest Agent.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/agent/suspend-ram
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentSuspendRam($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/suspend-ram", $data, 'POST');
  }
  /**
    * Change user password via Qemu Guest Agent.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/agent/set-user-password
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuAgentSetUserPassword($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/agent/set-user-password", $data, 'POST');
  }
  /**
    * Create a copy of virtual machine/template
    * POST /api2/json/nodes/{node}/qemu/{vmid}/clone
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuClone($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/clone", $data, 'POST');
  }
  /**
    * Generate cloud-init configuration.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/cloudinit
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuCloudinit($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/cloudinit", $data);
  }
  /**
    * Get automatically generated cloud-init config.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/cloudinit/dump
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuCloudinitDump($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/cloudinit/dump", $data);
  }
  /**
    * Regenerate and set cloud-init drive.
    * PUT /api2/json/nodes/{node}/qemu/{vmid}/cloudinit
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function setQemuCloudinit($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/cloudinit", $data, 'PUT');
  }
  /**
    * Get current virtual machine configuration. This does not include pending configuration changes (see 'pending' API).
    * GET /api2/json/nodes/{node}/qemu/{vmid}/config
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
  */
  public function qemuConfig($node, $vmid)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/config");
  }
  /**
    * Set virtual machine options (asynchrounous API).
    * POST /api2/json/nodes/{node}/qemu/{vmid}/config
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function createQemuConfig($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/config", $data, 'POST');
  }
  /**
    * Set virtual machine options (synchrounous API) - You should consider using the POST method instead for any actions involving hotplug or storage allocation.
    * PUT /api2/json/nodes/{node}/qemu/{vmid}/config
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function setQemuConfig($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/config", $data, 'PUT');
  }
  /**
    * Check if feature for virtual machine is available.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/feature
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
  */
  public function qemuFeature($node, $vmid)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/feature");
  }
  /**
    * Get VM state from QEMU dbus.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/dbus-vmstate
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuDbusVmstate($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/dbus-vmstate", $data, 'POST');
  }
  /**
    * Get preconditions for migration.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/migrate
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuMigrateInfo($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/migrate", $data);
  }
  /**
    * Migrate virtual machine. Creates a new migration task.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/migrate
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuMigrate($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/migrate", $data, 'POST');
  }
  /**
    * Execute Qemu monitor commands.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/monitor
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuMonitor($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/monitor", $data, 'POST');
  }
  /**
    * Move volume to different storage.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/move_disk
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuMoveDisk($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/move_disk", $data, 'POST');
  }
  /**
    * Open a web socket for data transfer by mtunnel.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/mtunnelwebsocket
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuMtunnelwebsocket($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/mtunnelwebsocket", $data);
  }
  /**
    * Migration tunnel endpoint for QEMU guests.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/mtunnel
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuMtunnel($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/mtunnel", $data, 'POST');
  }
  /**
    * Migrate virtual machine to a remote cluster.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/remote_migrate
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuRemoteMigrate($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/remote_migrate", $data, 'POST');
  }
  /**
    * Get virtual machine configuration, including pending changes.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/pending
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
  */
  public function qemuPending($node, $vmid)
  {
      return Request::Request("/nodes/$node/qemu/$vmid/pending");
  }
  /**
    * Extend volume size.
    * PUT /api2/json/nodes/{node}/qemu/{vmid}/resize
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuResize($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/resize", $data, 'PUT');
  }
  /**
    * Read VM RRD statistics (returns PNG)
    * GET /api2/json/nodes/{node}/qemu/{vmid}/rrd
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param string   $ds      The list of datasources you want to display.
    * @param enum     $timeframe   Specify the time frame you are interested in.
  */
  public function qemuRrd($node, $vmid, $ds = null, $timeframe = null)
  {
      $optional['ds'] = !empty($ds) ? $ds : null;
      $optional['timeframe'] = !empty($timeframe) ? $timeframe : null;
      return Request::Request("/nodes/$node/qemu/$vmid/rrd", $optional);
  }
  /**
    * Read VM RRD statistics
    * GET /api2/json/nodes/{node}/qemu/{vmid}/rrddata
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param enum     $timeframe   Specify the time frame you are interested in.
  */
  public function qemuRrddata($node, $vmid, $timeframe = null)
  {
      $optional['timeframe'] = !empty($timeframe) ? $timeframe : null;
      return Request::Request("/nodes/$node/qemu/$vmid/rrddata", $optional);
  }
  /**
    * Send key event to virtual machine.
    * PUT /api2/json/nodes/{node}/qemu/{vmid}/sendkey
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuSendkey($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/sendkey", $data, 'PUT');
  }
  /**
    * Returns a SPICE configuration to connect to the CT.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/spiceproxy
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuSpiceproxy($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/spiceproxy", $data, 'POST');
  }
  /**
    * Creates a TCP terminal proxy.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/termproxy
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuTermproxy($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/termproxy", $data, 'POST');
  }
  /**
    * Create a Template.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/template
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function createQemuTemplate($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/template", $data, 'POST');
  }
  /**
    * Unlink/delete disk images.
    * PUT /api2/json/nodes/{node}/qemu/{vmid}/unlink
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function qemuUnlink($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/unlink", $data, 'PUT');
  }
  /**
    * Creates a TCP VNC proxy connections.
    * POST /api2/json/nodes/{node}/qemu/{vmid}/vncproxy
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param array    $data
  */
  public function createQemuVncproxy($node, $vmid, $data = array())
  {
      return Request::Request("/nodes/$node/qemu/$vmid/vncproxy", $data, 'POST');
  }
  /**
    * Opens a weksocket for VNC traffic.
    * GET /api2/json/nodes/{node}/qemu/{vmid}/vncwebsocket
    * @param string   $node    The cluster node name.
    * @param integer  $vmid    The (unique) ID of the VM.
    * @param integer  $port    Port number returned by previous vncproxy call.
    * @param string   $vncticket  Ticket from previous call to vncproxy.
  */
  public function qemuVncwebsocket($node, $vmid, $port = null, $vncticket = null)
  {
      $optional['port'] = !empty($port) ? $port : null;
      $optional['vncticket'] = !empty($vncticket) ? $vncticket : null;
      return Request::Request("/nodes/$node/qemu/$vmid/vncwebsocket", $optional);
  }
  /**
    * List HA resources.
    * GET /api2/json/nodes/{node}/replication
    * @param string   $node    The cluster node name.
  */
  public function Replication($node)
  {
      return Request::Request("/nodes/$node/replication");
  }
  /**
    * Read replication job configuration.
    * GET /api2/json/nodes/{node}/replication/{id}
    * @param string   $node    The cluster node name.
    * @param string   $id      Replication Job ID. The ID is composed of a Guest ID and a job number, separated by a hyphen, i.e. '<GUEST>-<JOBNUM>'.
  */
  public function replicationId($node, $id)
  {
      return Request::Request("/nodes/$node/replication/$id");
  }
  /**
    * Read replication job log.
    * GET /api2/json/nodes/{node}/replication/{id}/log
    * @param string   $node    The cluster node name.
    * @param string   $id      Replication Job ID. The ID is composed of a Guest ID and a job number, separated by a hyphen, i.e. '<GUEST>-<JOBNUM>'.
  */
  public function replicationLog($node, $id)
  {
      return Request::Request("/nodes/$node/replication/$id/log");
  }
  /**
    * Schedule replication job to start as soon as possible.
    * POST /api2/json/nodes/{node}/replication/{id}/schedule_now
    * @param string   $node    The cluster node name.
    * @param string   $id      Replication Job ID. The ID is composed of a Guest ID and a job number, separated by a hyphen, i.e. '<GUEST>-<JOBNUM>'.
    * @param array    $data
  */
  public function replicationScheduleNow($node, $id, $data = array())
  {
      return Request::Request("/nodes/$node/replication/$id/schedule_now", $data, 'POST');
  }
  /**
    * Get replication job status.
    * GET /api2/json/nodes/{node}/replication/{id}/status
    * @param string   $node    The cluster node name.
    * @param string   $id      Replication Job ID. The ID is composed of a Guest ID and a job number, separated by a hyphen, i.e. '<GUEST>-<JOBNUM>'.
  */
  public function replicationStatus($node, $id)
  {
      return Request::Request("/nodes/$node/replication/$id/status");
  }
  /**
    * Index of available scan methods
    * GET /api2/json/nodes/{node}/scan
    * @param string   $node    The cluster node name.
  */
  public function Scan($node)
  {
      return Request::Request("/nodes/$node/scan");
  }
  /**
    * GlusterFS scan endpoint was removed from recent Proxmox versions.
    * @param string   $node    The cluster node name.
  */
  public function scanGlusterfs($node)
  {
      throw new ProxmoxException('Endpoint /nodes/{node}/scan/glusterfs is not available in current Proxmox API.');
  }
  /**
    * Scan NFS server export list.
    * GET /api2/json/nodes/{node}/scan/nfs
    * @param string   $node    The cluster node name.
    * @param array    $data
  */
  public function scanNfs($node, $data = array())
  {
      return Request::Request("/nodes/$node/scan/nfs", $data);
  }
  /**
    * Scan CIFS server share list.
    * GET /api2/json/nodes/{node}/scan/cifs
    * @param string   $node    The cluster node name.
    * @param array    $data
  */
  public function scanCifs($node, $data = array())
  {
      return Request::Request("/nodes/$node/scan/cifs", $data);
  }
  /**
    * Scan Proxmox Backup Server namespaces/datastores.
    * GET /api2/json/nodes/{node}/scan/pbs
    * @param string   $node    The cluster node name.
    * @param array    $data
  */
  public function scanPbs($node, $data = array())
  {
      return Request::Request("/nodes/$node/scan/pbs", $data);
  }
  /**
    * Scan remote iSCSI server.
    * GET /api2/json/nodes/{node}/scan/iscsi
    * @param string   $node    The cluster node name.
    * @param array    $data
  */
  public function scanIscsi($node, $data = array())
  {
      return Request::Request("/nodes/$node/scan/iscsi", $data);
  }
  /**
    * List local LVM volume groups.
    * GET /api2/json/nodes/{node}/scan/lvm
    * @param string   $node    The cluster node name.
    * @param array    $data
  */
  public function scanLvm($node, $data = array())
  {
      return Request::Request("/nodes/$node/scan/lvm", $data);
  }
  /**
    * List local LVM Thin Pools.
    * GET /api2/json/nodes/{node}/scan/lvmthin
    * @param string   $node    The cluster node name.
    * @param array    $data
  */
  public function scanLvmthin($node, $data = array())
  {
      return Request::Request("/nodes/$node/scan/lvmthin", $data);
  }
  /**
    * List local USB devices.
    * GET /api2/json/nodes/{node}/hardware/usb
    * @param string   $node    The cluster node name.
    * @param array    $data
  */
  public function scanUsb($node, $data = array())
  {
      return Request::Request("/nodes/$node/hardware/usb", $data);
  }
  /**
    * Scan zfs pool list on local node.
    * GET /api2/json/nodes/{node}/scan/zfs
    * @param string   $node    The cluster node name.
    * @param array    $data
  */
  public function scanZfs($node, $data = array())
  {
      return Request::Request("/nodes/$node/scan/zfs", $data);
  }
  /**
    * SDN index.
    * GET /api2/json/nodes/{node}/sdn
    * @param string   $node    The cluster node name.
    * @param array    $data
  */
  public function sdn($node, $data = array())
  {
      return Request::Request("/nodes/$node/sdn", $data);
  }
  /**
    * Read SDN fabric information.
    * GET /api2/json/nodes/{node}/sdn/fabrics/{fabric}
    * @param string   $node    The cluster node name.
    * @param string   $fabric
    * @param array    $data
  */
  public function sdnFabricsFabric($node, $fabric, $data = array())
  {
      return Request::Request("/nodes/$node/sdn/fabrics/$fabric", $data);
  }
  /**
    * List fabric interfaces.
    * GET /api2/json/nodes/{node}/sdn/fabrics/{fabric}/interfaces
    * @param string   $node    The cluster node name.
    * @param string   $fabric
    * @param array    $data
  */
  public function sdnFabricsFabricInterfaces($node, $fabric, $data = array())
  {
      return Request::Request("/nodes/$node/sdn/fabrics/$fabric/interfaces", $data);
  }
  /**
    * List fabric neighbors.
    * GET /api2/json/nodes/{node}/sdn/fabrics/{fabric}/neighbors
    * @param string   $node    The cluster node name.
    * @param string   $fabric
    * @param array    $data
  */
  public function sdnFabricsFabricNeighbors($node, $fabric, $data = array())
  {
      return Request::Request("/nodes/$node/sdn/fabrics/$fabric/neighbors", $data);
  }
  /**
    * List fabric routes.
    * GET /api2/json/nodes/{node}/sdn/fabrics/{fabric}/routes
    * @param string   $node    The cluster node name.
    * @param string   $fabric
    * @param array    $data
  */
  public function sdnFabricsFabricRoutes($node, $fabric, $data = array())
  {
      return Request::Request("/nodes/$node/sdn/fabrics/$fabric/routes", $data);
  }
  /**
    * Read SDN VNet information.
    * GET /api2/json/nodes/{node}/sdn/vnets/{vnet}
    * @param string   $node    The cluster node name.
    * @param string   $vnet
    * @param array    $data
  */
  public function sdnVnetsVnet($node, $vnet, $data = array())
  {
      return Request::Request("/nodes/$node/sdn/vnets/$vnet", $data);
  }
  /**
    * Read SDN VNet mac-vrf information.
    * GET /api2/json/nodes/{node}/sdn/vnets/{vnet}/mac-vrf
    * @param string   $node    The cluster node name.
    * @param string   $vnet
    * @param array    $data
  */
  public function sdnVnetsVnetMacVrf($node, $vnet, $data = array())
  {
      return Request::Request("/nodes/$node/sdn/vnets/$vnet/mac-vrf", $data);
  }
  /**
    * List SDN zones.
    * GET /api2/json/nodes/{node}/sdn/zones
    * @param string   $node    The cluster node name.
    * @param array    $data
  */
  public function sdnZones($node, $data = array())
  {
      return Request::Request("/nodes/$node/sdn/zones", $data);
  }
  /**
    * Read SDN zone information.
    * GET /api2/json/nodes/{node}/sdn/zones/{zone}
    * @param string   $node    The cluster node name.
    * @param string   $zone
    * @param array    $data
  */
  public function sdnZonesZone($node, $zone, $data = array())
  {
      return Request::Request("/nodes/$node/sdn/zones/$zone", $data);
  }
  /**
    * List SDN zone bridges.
    * GET /api2/json/nodes/{node}/sdn/zones/{zone}/bridges
    * @param string   $node    The cluster node name.
    * @param string   $zone
    * @param array    $data
  */
  public function sdnZonesZoneBridges($node, $zone, $data = array())
  {
      return Request::Request("/nodes/$node/sdn/zones/$zone/bridges", $data);
  }
  /**
    * List SDN zone content.
    * GET /api2/json/nodes/{node}/sdn/zones/{zone}/content
    * @param string   $node    The cluster node name.
    * @param string   $zone
    * @param array    $data
  */
  public function sdnZonesZoneContent($node, $zone, $data = array())
  {
      return Request::Request("/nodes/$node/sdn/zones/$zone/content", $data);
  }
  /**
    * Read SDN zone ip-vrf details.
    * GET /api2/json/nodes/{node}/sdn/zones/{zone}/ip-vrf
    * @param string   $node    The cluster node name.
    * @param string   $zone
    * @param array    $data
  */
  public function sdnZonesZoneIpVrf($node, $zone, $data = array())
  {
      return Request::Request("/nodes/$node/sdn/zones/$zone/ip-vrf", $data);
  }
  /**
    * Hardware index.
    * GET /api2/json/nodes/{node}/hardware
    * @param string   $node    The cluster node name.
    * @param array    $data
  */
  public function hardware($node, $data = array())
  {
      return Request::Request("/nodes/$node/hardware", $data);
  }
  /**
    * List PCI devices.
    * GET /api2/json/nodes/{node}/hardware/pci
    * @param string   $node    The cluster node name.
    * @param array    $data
  */
  public function hardwarePci($node, $data = array())
  {
      return Request::Request("/nodes/$node/hardware/pci", $data);
  }
  /**
    * Get single PCI device details.
    * GET /api2/json/nodes/{node}/hardware/pci/{pciid}
    * @param string   $node    The cluster node name.
    * @param string   $pciid
    * @param array    $data
  */
  public function hardwarePciPciid($node, $pciid, $data = array())
  {
      return Request::Request("/nodes/$node/hardware/pci/$pciid", $data);
  }
  /**
    * List mediated devices for a PCI device.
    * GET /api2/json/nodes/{node}/hardware/pci/{pciid}/mdev
    * @param string   $node    The cluster node name.
    * @param string   $pciid
    * @param array    $data
  */
  public function hardwarePciPciidMdev($node, $pciid, $data = array())
  {
      return Request::Request("/nodes/$node/hardware/pci/$pciid/mdev", $data);
  }
  /**
    * Query metadata for an URL.
    * GET /api2/json/nodes/{node}/query-url-metadata
    * @param string   $node    The cluster node name.
    * @param array    $data
  */
  public function queryUrlMetadata($node, $data = array())
  {
      return Request::Request("/nodes/$node/query-url-metadata", $data);
  }
  /**
    * Query OCI repository tags.
    * GET /api2/json/nodes/{node}/query-oci-repo-tags
    * @param string   $node    The cluster node name.
    * @param array    $data
  */
  public function queryOciRepoTags($node, $data = array())
  {
      return Request::Request("/nodes/$node/query-oci-repo-tags", $data);
  }
  /**
    * Service list.
    * GET /api2/json/nodes/{node}/services
    * @param string   $node    The cluster node name.
  */
  public function Services($node)
  {
      return Request::Request("/nodes/$node/services");
  }
  /**
    * Service list.
    * GET /api2/json/nodes/{node}/services/{service}/reload
    * @param string   $node     The cluster node name.
    * @param enum     $service  Service ID
  */
  public function listService($node, $service)
  {
      return Request::Request("/nodes/$node/services/$service");
  }
  /**
    * Reload service.
    * POST /api2/json/nodes/{node}/services/{service}/reload
    * @param string   $node     The cluster node name.
    * @param enum     $service  Service ID
    * @param array    $data
  */
  public function servicesReload($node, $service, $data = array())
  {
      return Request::Request("/nodes/$node/services/$service/reload", $data, 'POST');
  }
  /**
    * Restart service.
    * POST /api2/json/nodes/{node}/services/{service}/restart
    * @param string   $node     The cluster node name.
    * @param enum     $service  Service ID
    * @param array    $data
  */
  public function servicesRestart($node, $service, $data = array())
  {
      return Request::Request("/nodes/$node/services/$service/restart", $data, 'POST');
  }
  /**
    * Start service.
    * POST /api2/json/nodes/{node}/services/{service}/start
    * @param string   $node     The cluster node name.
    * @param enum     $service  Service ID
    * @param array    $data
  */
  public function servicesStart($node, $service, $data = array())
  {
      return Request::Request("/nodes/$node/services/$service/start", $data, 'POST');
  }
  /**
    * Stop service.
    * POST /api2/json/nodes/{node}/services/{service}/stop
    * @param string   $node     The cluster node name.
    * @param enum     $service  Service ID
    * @param array    $data
  */
  public function servicesStop($node, $service, $data = array())
  {
      return Request::Request("/nodes/$node/services/$service/stop", $data, 'POST');
  }
  /**
    * Read service properties
    * GET /api2/json/nodes/{node}/services
    * @param string   $node     The cluster node name.
    * @param enum     $service  Service ID
  */
  public function servicesState($node, $service)
  {
      return Request::Request("/nodes/$node/services/$service/state");
  }
  /**
    * Get status for all datastores.
    * GET /api2/json/nodes/{node}/storage
    * @param string   $node     The cluster node name.
    * @param string   $content  Only list stores which support this content type.
    * @param string   $storage  Only list status for specified storage
    * @param string   $target   If target is different to 'node', we only lists shared storages which content is accessible on this 'node' and the specified 'target' node.
    * @param boolean  $enabled  Only list stores which are enabled (not disabled in config).
  */
  public function Storage($node, $content = null, $storage = null, $target = null, $enabled = null)
  {
      $optional['content']  = !empty($content) ? $content : null;
      $optional['storage']  = !empty($storage) ? $storage : null;
      $optional['target']   = !empty($target) ? $target : null;
      $optional['enabled']  = !empty($enabled) ? $enabled : null;
      return Request::Request("/nodes/$node/storage", $optional);
  }
  /**
    * Get status datastores.
    * GET /api2/json/nodes/{node}/storage/{storage}
    * @param string   $node     The cluster node name.
    * @param string   $storage  The storage identifier.
  */
  public function getStorage($node, $storage)
  {
      return Request::Request("/nodes/$node/storage/$storage");
  }
  /**
    * List storage content.
    * GET /api2/json/nodes/{node}/storage/{storage}/content
    * @param string   $node     The cluster node name.
    * @param string   $storage  The storage identifier.
  */
  public function listStorageContent($node, $storage)
  {
      return Request::Request("/nodes/$node/storage/$storage/content");
  }
  /**
    * Get import metadata from source storage.
    * GET /api2/json/nodes/{node}/storage/{storage}/import-metadata
    * @param string   $node     The cluster node name.
    * @param string   $storage  The storage identifier.
    * @param array    $data
  */
  public function storageImportMetadata($node, $storage, $data = array())
  {
      return Request::Request("/nodes/$node/storage/$storage/import-metadata", $data);
  }
  /**
    * Download content from an URL to a storage.
    * POST /api2/json/nodes/{node}/storage/{storage}/download-url
    * @param string   $node     The cluster node name.
    * @param string   $storage  The storage identifier.
    * @param array    $data
  */
  public function storageDownloadUrl($node, $storage, $data = array())
  {
      return Request::Request("/nodes/$node/storage/$storage/download-url", $data, 'POST');
  }
  /**
    * Pull container image from OCI registry to storage.
    * POST /api2/json/nodes/{node}/storage/{storage}/oci-registry-pull
    * @param string   $node     The cluster node name.
    * @param string   $storage  The storage identifier.
    * @param array    $data
  */
  public function storageOciRegistryPull($node, $storage, $data = array())
  {
      return Request::Request("/nodes/$node/storage/$storage/oci-registry-pull", $data, 'POST');
  }
  /**
    * Get backup prune information for a storage.
    * GET /api2/json/nodes/{node}/storage/{storage}/prunebackups
    * @param string   $node     The cluster node name.
    * @param string   $storage  The storage identifier.
    * @param array    $data
  */
  public function storagePrunebackups($node, $storage, $data = array())
  {
      return Request::Request("/nodes/$node/storage/$storage/prunebackups", $data);
  }
  /**
    * Prune backups for a storage.
    * DELETE /api2/json/nodes/{node}/storage/{storage}/prunebackups
    * @param string   $node     The cluster node name.
    * @param string   $storage  The storage identifier.
    * @param array    $data
  */
  public function deleteStoragePrunebackups($node, $storage, $data = array())
  {
      return Request::Request("/nodes/$node/storage/$storage/prunebackups", $data, 'DELETE');
  }
  /**
    * List files/folders from a backup for file restore.
    * GET /api2/json/nodes/{node}/storage/{storage}/file-restore/list
    * @param string   $node     The cluster node name.
    * @param string   $storage  The storage identifier.
    * @param array    $data
  */
  public function storageFileRestoreList($node, $storage, $data = array())
  {
      return Request::Request("/nodes/$node/storage/$storage/file-restore/list", $data);
  }
  /**
    * Download restored files from backup file-restore.
    * GET /api2/json/nodes/{node}/storage/{storage}/file-restore/download
    * @param string   $node     The cluster node name.
    * @param string   $storage  The storage identifier.
    * @param array    $data
  */
  public function storageFileRestoreDownload($node, $storage, $data = array())
  {
      return Request::Request("/nodes/$node/storage/$storage/file-restore/download", $data);
  }
  /**
    * Allocate disk images.
    * POST /api2/json/nodes/{node}/storage/{storage}/content
    * @param string   $node     The cluster node name.
    * @param string   $storage  The storage identifier.
    * @param array    $data
  */
  public function storageContent($node, $storage, $data = array())
  {
      return Request::Request("/nodes/$node/storage/$storage/content", $data, "POST");
  }
  /**
    * GET volume attributes
    * GET /api2/json/nodes/{node}/storage/{storage}/content/{volume}
    * @param string   $node     The cluster node name.
    * @param string   $storage  The storage identifier.
  */
  public function storageContentVolume($node, $storage, $volume)
  {
      return Request::Request("/nodes/$node/storage/$storage/content/$volume");
  }
  /**
    * Update volume attributes.
    * PUT /api2/json/nodes/{node}/storage/{storage}/content/{volume}
    * @param string   $node     The cluster node name.
    * @param string   $storage  The storage identifier.
    * @param string   $volume
    * @param array    $data
  */
  public function setStorageContentVolume($node, $storage, $volume, $data = array())
  {
      return Request::Request("/nodes/$node/storage/$storage/content/$volume", $data, 'PUT');
  }
  /**
    * Copy a volume. This is experimental code - do not use.
    * POST /api2/json/nodes/{node}/storage/{storage}/content/{volume}
    * @param string   $node     The cluster node name.
    * @param string   $storage  The storage identifier.
    * @param array    $data
  */
  public function copyStorageContentVolume($node, $storage, $volume, $data = array())
  {
      return Request::Request("/nodes/$node/storage/$storage/content/$volume", $data, "POST");
  }
  /**
    * Delete volume
    * DELETE /api2/json/nodes/{node}/storage/{storage}/content/{volume}
    * @param string   $node     The cluster node name.
    * @param string   $storage  The storage identifier.
  */
  public function deleteStorageContentVolume($node, $storage, $volume)
  {
      return Request::Request("/nodes/$node/storage/$storage/content/$volume", null, "DELETE");
  }
  /**
    * Read storage RRD statistics (returns PNG)
    * GET /api2/json/nodes/{node}/storage/{storage}/rrd
    * @param string   $node     The cluster node name.
    * @param string   $storage  The storage identifier.
    * @param string   $ds       The list of datasources you want to display.
    * @param string   $timeframe The time frame.
    * @param string   $cf       Consolidation function.
  */
  public function storageRRD($node, $storage = null, $ds = null, $timeframe = null, $cf = null)
  {
      if (empty($storage)) {
          throw new ProxmoxException('Parameter [storage] is required.');
      }
      $optional['ds'] = !empty($ds) ? $ds : null;
      $optional['timeframe'] = !empty($timeframe) ? $timeframe : null;
      $optional['cf'] = !empty($cf) ? $cf : null;
      return Request::Request("/nodes/$node/storage/$storage/rrd", $optional);
  }
  /**
    * Read storage RRD statistics.
    * GET /api2/json/nodes/{node}/storage/{storage}/rrddata
    * @param string   $node     The cluster node name.
    * @param string   $storage  The storage identifier.
    * @param string   $timeframe The time frame.
    * @param string   $cf       Consolidation function.
  */
  public function storageRRDdata($node, $storage = null, $timeframe = null, $cf = null)
  {
      if (empty($storage)) {
          throw new ProxmoxException('Parameter [storage] is required.');
      }
      $optional['timeframe'] = !empty($timeframe) ? $timeframe : null;
      $optional['cf'] = !empty($cf) ? $cf : null;
      return Request::Request("/nodes/$node/storage/$storage/rrddata", $optional);
  }
  /**
    * Read storage status.
    * GET /api2/json/nodes/{node}/storage/{storage}/status
    * @param string   $node     The cluster node name.
    * @param string   $storage  The storage identifier.
  */
  public function storageStatus($node, $storage = null)
  {
      if (empty($storage)) {
          throw new ProxmoxException('Parameter [storage] is required.');
      }
      return Request::Request("/nodes/$node/storage/$storage/status");
  }
  /**
    * Upload templates and ISO images.
    * POST /api2/json/nodes/{node}/storage/{storage}/upload
    * @param string   $node     The cluster node name.
    * @param string   $storage  The storage identifier.
    * @param array    $data
  */
  public function storageUpload($node, $storage = null, $data = array())
  {
      if (is_array($storage)) {
          // Backward compatibility for legacy calls using storage in $data['storage'].
          $data = $storage;
          $storage = !empty($data['storage']) ? $data['storage'] : null;
          unset($data['storage']);
      }
      if (empty($storage)) {
          throw new ProxmoxException('Parameter [storage] is required.');
      }
      return Request::Request("/nodes/$node/storage/$storage/upload", $data, "POST");
  }
  /**
    * Read task list for one node (finished tasks).
    * GET /api2/json/nodes/{node}/tasks
    * @param string   $node     The cluster node name.
    * @param boolean  $errors
    * @param integer  $limit
    * @param integer  $vmid     Only list tasks for this VM.
    * @param integer  $start
  */
  public function Tasks($node, $errors = null, $limit = null, $vmid = null, $start = null)
  {
      $optional['errors']  = !empty($errors) ? $errors : false;
      $optional['limit']   = !empty($limit) ? $limit : null;
      $optional['vmid']    = !empty($vmid) ? $vmid : null;
      $optional['start']   = !empty($start) ? $start : null;
      return Request::Request("/nodes/$node/tasks", $optional);
  }
  /**
    * Read task upid
    * GET /api2/json/nodes/{node}/tasks/{upid}
    * @param string   $node     The cluster node name.
    * @param string   $upid
  */
  public function tasksUpid($node, $upid)
  {
      return Request::Request("/nodes/$node/tasks/$upid");
  }
  /**
    * Stop a task.
    * DELETE /api2/json/nodes/{node}/tasks/{upid}
    * @param string   $node     The cluster node name.
    * @param string   $upid
  */
  public function tasksStop($node, $upid)
  {
      return Request::Request("/nodes/$node/tasks/$upid", null, "DELETE");
  }
  /**
    * Read task log.
    * GET /api2/json/nodes/{node}/tasks/{upid}/log
    * @param string   $node     The cluster node name.
    * @param string   $upid
    * @param integer  $limit
    * @param integer  $start
  */
  public function tasksLog($node, $upid, $limit = null, $start = null)
  {
      $optional['limit']   = !empty($limit) ? $limit : null;
      $optional['start']   = !empty($start) ? $start : null;
      return Request::Request("/nodes/$node/tasks/$upid/log", $optional);
  }
  /**
    * Read task status.
    * GET /api2/json/nodes/{node}/tasks/{upid}/status
    * @param string   $node     The cluster node name.
    * @param string   $upid
  */
  public function tasksStatus($node, $upid)
  {
      return Request::Request("/nodes/$node/tasks/$upid/status");
  }
  /**
    * Create backup.
    * POST /api2/json/nodes/{node}/vzdump
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createVzdump($node, $data = array())
  {
      return Request::Request("/nodes/$node/vzdump", $data, "POST");
  }
  /**
    * Get default vzdump backup job options.
    * GET /api2/json/nodes/{node}/vzdump/defaults
    * @param string   $node     The cluster node name.
  */
  public function vzdumpDefaults($node)
  {
      return Request::Request("/nodes/$node/vzdump/defaults");
  }
  /**
    * Extract configuration from vzdump backup archive
    * GET /api2/json/nodes/{node}/vzdump/extractconfig
    * @param string   $node     The cluster node name.
  */
  public function VzdumpExtractConfig($node)
  {
      return Request::Request("/nodes/$node/vzdump/extractconfig");
  }
  /**
    * Get list of appliances.
    * GET /api2/json/nodes/{node}/aplinfo
    * @param string   $node     The cluster node name.
  */
  public function Aplinfo($node)
  {
      return Request::Request("/nodes/$node/aplinfo");
  }
  /**
    * Download appliance templates.
    * POST /api2/json/nodes/{node}/aplinfo
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function downloadTemplate($node, $data = array())
  {
      return Request::Request("/nodes/$node/aplinfo", $data, "POST");
  }
  /**
    * Get list of appliances.
    * GET /api2/json/nodes/{node}/dns
    * @param string   $node     The cluster node name.
  */
  public function Dns($node)
  {
      return Request::Request("/nodes/$node/dns");
  }
  /**
    * Write DNS settings.
    * PUT /api2/json/nodes/{node}/dns
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function setDns($node, $data = array())
  {
      return Request::Request("/nodes/$node/dns", $data, "PUT");
  }
  /**
    * Execute multiple commands in order
    * POST /api2/json/nodes/{node}/execute
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function Execute($node, $data = array())
  {
      return Request::Request("/nodes/$node/execute", $data, "POST");
  }
  /**
    * Migrate all VMs and Containers
    * POST /api2/json/nodes/{node}/migrateall
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function MigrateAll($node, $data = array())
  {
      return Request::Request("/nodes/$node/migrateall", $data, "POST");
  }
  /**
    * Read tap/vm network device interface counters
    * GET /api2/json/nodes/{node}/netstat
    * @param string   $node     The cluster node name.
  */
  public function Netstat($node)
  {
      return Request::Request("/nodes/$node/netstat");
  }
  /**
    * Gather various systems information about a node
    * GET /api2/json/nodes/{node}/report
    * @param string   $node     The cluster node name.
  */
  public function Report($node)
  {
      return Request::Request("/nodes/$node/report");
  }
  /**
    * Get host entries managed for this node.
    * GET /api2/json/nodes/{node}/hosts
    * @param string   $node     The cluster node name.
  */
  public function Hosts($node)
  {
      return Request::Request("/nodes/$node/hosts");
  }
  /**
    * Create or update host entries managed for this node.
    * POST /api2/json/nodes/{node}/hosts
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createHosts($node, $data = array())
  {
      return Request::Request("/nodes/$node/hosts", $data, "POST");
  }
  /**
    * Read node systemd journal.
    * GET /api2/json/nodes/{node}/journal
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function Journal($node, $data = array())
  {
      return Request::Request("/nodes/$node/journal", $data);
  }
  /**
    * Read node RRD statistics (returns PNG)
    * GET /api2/json/nodes/{node}/rrd
    * @param string   $node         The cluster node name.
    * @param string   $ds           The list of datasources you want to display.
    * @param enum     $timeframe    Specify the time frame you are interested in.
  */
  public function Rrd($node, $ds = null, $timeframe = null)
  {
      $optional['ds'] = !empty($ds) ? $ds : null;
      $optional['timeframe'] = !empty($timeframe) ? $timeframe : null;
      return Request::Request("/nodes/$node/rrd", $optional);
  }
  /**
    * Read node RRD statistics
    * GET /api2/json/nodes/{node}/rrddata
    * @param string   $node         The cluster node name.
    * @param enum     $timeframe    Specify the time frame you are interested in.
  */
  public function Rrddata($node, $timeframe = null)
  {
      $optional['timeframe'] = !empty($timeframe) ? $timeframe : null;
      return Request::Request("/nodes/$node/rrddata", $optional);
  }
  /**
    * Creates a SPICE shell
    * POST /api2/json/nodes/{node}/spiceshell
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function SpiceShell($node, $data = array())
  {
      return Request::Request("/nodes/$node/spiceshell", $data, "POST");
  }
  /**
    * Start all VMs and containers (when onboot=1)
    * POST /api2/json/nodes/{node}/startall
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function StartAll($node, $data = array())
  {
      return Request::Request("/nodes/$node/startall", $data, "POST");
  }
  /**
    * Suspend all VMs and containers.
    * POST /api2/json/nodes/{node}/suspendall
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function SuspendAll($node, $data = array())
  {
      return Request::Request("/nodes/$node/suspendall", $data, "POST");
  }
  /**
    * Trigger Wake-on-LAN packet.
    * POST /api2/json/nodes/{node}/wakeonlan
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function WakeOnLan($node, $data = array())
  {
      return Request::Request("/nodes/$node/wakeonlan", $data, "POST");
  }
  /**
    * Creates a TCP terminal proxy.
    * POST /api2/json/nodes/{node}/termproxy
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function Termproxy($node, $data = array())
  {
      return Request::Request("/nodes/$node/termproxy", $data, "POST");
  }
  /**
    * Reboot or shutdown a node
    * POST /api2/json/nodes/{node}/status
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function Reboot($node, $data = array())
  {
      return Request::Request("/nodes/$node/status", $data, "POST");
  }
  /**
    * Stop all VMs and Containers.
    * POST /api2/json/nodes/{node}/stopall
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function StopAll($node, $data = array())
  {
      return Request::Request("/nodes/$node/stopall", $data, "POST");
  }
  /**
    * Read subscription info.
    * GET /api2/json/nodes/{node}/subscription
    * @param string   $node     The cluster node name.
  */
  public function Subscription($node)
  {
      return Request::Request("/nodes/$node/subscription");
  }
  /**
    * Update subscription info.
    * POST /api2/json/nodes/{node}/subscription
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function updateSubscription($node, $data = array())
  {
      return Request::Request("/nodes/$node/subscription", $data, "POST");
  }
  /**
    * Set subscription key.
    * PUT /api2/json/nodes/{node}/subscription
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function setSubscription($node, $data = array())
  {
      return Request::Request("/nodes/$node/subscription", $data, "PUT");
  }
  /**
    * Delete subscription key.
    * DELETE /api2/json/nodes/{node}/subscription
    * @param string   $node     The cluster node name.
  */
  public function deleteSubscription($node)
  {
      return Request::Request("/nodes/$node/subscription", null, "DELETE");
  }
  /**
    * Read system log
    * GET /api2/json/nodes/{node}/syslog
    * @param string   $node     The cluster node name.
    * @param integer  $limit
    * @param integer  $start
    * @param string   $since    Display all log since this date-time string.
    * @param string   $until    Display all log until this date-time string.
  */
  public function Syslog($node, $limit = null, $start = null, $since = null, $until = null)
  {
      $optional['limit'] = !empty($limit) ? $limit : 50;
      $optional['start'] = !empty($start) ? $start : null;
      $optional['since'] = !empty($since) ? $since : null;
      $optional['until'] = !empty($until) ? $until : null;
      return Request::Request("/nodes/$node/syslog", $optional);
  }
  /**
    * Read server time and time zone settings.
    * GET /api2/json/nodes/{node}/time
    * @param string   $node     The cluster node name.
  */
  public function Time($node)
  {
      return Request::Request("/nodes/$node/time");
  }
  /**
    * PUT time zone.
    * PUT /api2/json/nodes/{node}/time
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function setTime($node, $data = array())
  {
      return Request::Request("/nodes/$node/time", $data, "PUT");
  }
  /**
    * API version details
    * GET /api2/json/nodes/{node}/version
    * @param string   $node     The cluster node name.
  */
  public function Version($node)
  {
      return Request::Request("/nodes/$node/version");
  }
  /**
    * Creates a VNC Shell proxy.
    * POST /api2/json/nodes/{node}/vncshell
    * @param string   $node     The cluster node name.
    * @param array    $data
  */
  public function createVNCShell($node, $data = array())
  {
      return Request::Request("/nodes/$node/vncshell", $data, "POST");
  }
  /**
    * Opens a weksocket for VNC traffic.
    * GET /api2/json/nodes/{node}/vncwebsocket
    * @param string   $node       The cluster node name.
    * @param integer  $port       Port number returned by previous vncproxy call.
    * @param string   $vncticket  Ticket from previous call to vncproxy.
  */
  public function VNCWebSocket($node, $port = null, $vncticket = null)
  {
      $optional['port'] = !empty($port) ? $port : null;
      $optional['vncticket'] = !empty($vncticket) ? $vncticket : null;
      return Request::Request("/nodes/$node/vncwebsocket", $optional);
  }
}
