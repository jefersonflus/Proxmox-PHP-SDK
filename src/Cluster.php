<?php

/**
 * ProxmoxVE PHP API
 *
 * @copyright 2017 Saleh <Saleh7@protonmail.ch>
 * @license http://opensource.org/licenses/MIT The MIT License.
 */

namespace Proxmox;

// /api2/json/cluster
class Cluster
{
  /**
    * Cluster index.
    * GET /api2/json/cluster
  */
  public function Cluster()
  {
      return Request::Request("/cluster");
  }
  /**
    * List vzdump backup schedule.
    * GET /api2/json/cluster/backup
  */
  public function ListBackup()
  {
      return Request::Request("/cluster/backup");
  }
  /**
    * Create new vzdump backup job.
    * POST /api2/json/cluster/backup
    * @param array    $data
  */
  public function createBackup($data = array())
  {
      return Request::Request("/cluster/backup", $data, 'POST');
  }
  /**
    * Read vzdump backup job definition.
    * GET /api2/json/cluster/backup/{id}
    * @param string   $id    The job ID.
  */
  public function BackupId($id)
  {
      return Request::Request("/cluster/backup/$id");
  }
  /**
    * Update vzdump backup job definition.
    * PUT /api2/json/cluster/backup/{id}
    * @param string   $id    The job ID.
    * @param array    $data
  */
  public function updateBackup($id, $data = array())
  {
      return Request::Request("/cluster/backup/$id", $data, 'PUT');
  }
  /**
    * Delete vzdump backup job definition.
    * DELETE /api2/json/cluster/backup/{id}
    * @param string   $id    The job ID.
  */
  public function deleteBackup($id)
  {
      return Request::Request("/cluster/backup/$id", null, 'DELETE');
  }
  /**
    * Get included volumes for a vzdump job.
    * GET /api2/json/cluster/backup/{id}/included_volumes
    * @param string   $id    The job ID.
  */
  public function backupIncludedVolumes($id)
  {
      return Request::Request("/cluster/backup/$id/included_volumes");
  }
  /**
    * List all backup snapshots included in backup jobs.
    * GET /api2/json/cluster/backup-info
  */
  public function BackupInfo()
  {
      return Request::Request("/cluster/backup-info");
  }
  /**
    * List guests not covered by backup jobs.
    * GET /api2/json/cluster/backup-info/not-backed-up
  */
  public function backupInfoNotBackedUp()
  {
      return Request::Request("/cluster/backup-info/not-backed-up");
  }
  /**
    * Cluster bulk action index.
    * GET /api2/json/cluster/bulk-action
  */
  public function BulkAction()
  {
      return Request::Request("/cluster/bulk-action");
  }
  /**
    * Cluster guest bulk action index.
    * GET /api2/json/cluster/bulk-action/guest
  */
  public function BulkActionGuest()
  {
      return Request::Request("/cluster/bulk-action/guest");
  }
  /**
    * Start multiple guests.
    * POST /api2/json/cluster/bulk-action/guest/start
    * @param array    $data
  */
  public function bulkActionGuestStart($data = array())
  {
      return Request::Request("/cluster/bulk-action/guest/start", $data, "POST");
  }
  /**
    * Shutdown multiple guests.
    * POST /api2/json/cluster/bulk-action/guest/shutdown
    * @param array    $data
  */
  public function bulkActionGuestShutdown($data = array())
  {
      return Request::Request("/cluster/bulk-action/guest/shutdown", $data, "POST");
  }
  /**
    * Suspend multiple guests.
    * POST /api2/json/cluster/bulk-action/guest/suspend
    * @param array    $data
  */
  public function bulkActionGuestSuspend($data = array())
  {
      return Request::Request("/cluster/bulk-action/guest/suspend", $data, "POST");
  }
  /**
    * Migrate multiple guests.
    * POST /api2/json/cluster/bulk-action/guest/migrate
    * @param array    $data
  */
  public function bulkActionGuestMigrate($data = array())
  {
      return Request::Request("/cluster/bulk-action/guest/migrate", $data, "POST");
  }
  /**
    * Read vzdump backup job definition.
    * GET /api2/json/cluster/config
  */
  public function Config()
  {
      return Request::Request("/cluster/config");
  }
  /**
    * Corosync node list.
    * GET /api2/json/cluster/config/nodes
  */
  public function listConfigNodes()
  {
      return Request::Request("/cluster/config/nodes");
  }
  /**
    * Get corosync totem protocol settings.
    * GET /api2/json/cluster/config/totem
  */
  public function configTotem()
  {
      return Request::Request("/cluster/config/totem");
  }
  /**
    * Directory index.
    * GET /api2/json/cluster/firewall
  */
  public function Firewall()
  {
      return Request::Request("/cluster/firewall");
  }
  /**
    * List aliases
    * GET /api2/json/cluster/firewall/aliases
  */
  public function firewallListAliases()
  {
      return Request::Request("/cluster/firewall/aliases");
  }
  /**
    * Create IP or Network Alias.
    * POST /api2/json/cluster/firewall/aliases
    * @param array    $data
  */
  public function createFirewallAliase($data = array())
  {
      return Request::Request("/cluster/firewall/aliases", $data, 'POST');
  }
  /**
    * Read alias.
    * GET /api2/json/cluster/firewall/aliases/{name}
    * @param string   $name    Alias name.
  */
  public function getFirewallAliasesName($name)
  {
      return Request::Request("/cluster/firewall/aliases/$name");
  }
  /**
    * Update IP or Network alias.
    * PUT /api2/json/cluster/firewall/aliases/{name}
    * @param string   $name    Alias name.
    * @param array    $data
  */
  public function updateFirewallAliase($name, $data = array())
  {
      return Request::Request("/cluster/firewall/aliases/$name", $data, 'PUT');
  }
  /**
    * Update IP or Network alias.
    * PUT /api2/json/cluster/firewall/aliases/{name}
    * @param string   $name    Alias name.
  */
  public function removeFirewallAliase($name)
  {
      return Request::Request("/cluster/firewall/aliases/$name", null, 'DELETE');
  }
  /**
    * List security groups.
    * GET /api2/json/cluster/firewall/groups
  */
  public function firewallListGroups()
  {
      return Request::Request("/cluster/firewall/groups");
  }
  /**
    * Create new security group.
    * POST /api2/json/cluster/firewall/groups
    * @param array    $data
  */
  public function createFirewallGroup($data = array())
  {
      return Request::Request("/cluster/firewall/groups", $data, 'POST');
  }
  /**
    * List rules
    * GET /api2/json/cluster/firewall/groups/{group}
    * @param string   $group    Security Group name.
  */
  public function firewallGroupsGroup($group)
  {
      return Request::Request("/cluster/firewall/groups/$group");
  }
  /**
    * Create new rule.
    * POST /api2/json/cluster/firewall/groups/{group}
    * @param string   $group    Security Group name.
    * @param array    $data
  */
  public function createRuleFirewallGroup($group, $data = array())
  {
      return Request::Request("/cluster/firewall/groups/$group", $data, 'POST');
  }
  /**
    * Delete security group.
    * PUT /api2/json/cluster/firewall/aliases/{name}
    * @param string   $group    Security Group name.
  */
  public function removeFirewallGroup($group)
  {
      return Request::Request("/cluster/firewall/groups/$group", null, 'DELETE');
  }
  /**
    * Get single rule data.
    * GET /api2/json/cluster/firewall/groups/{group}/{pos}
    * @param string   $group    Security Group name.
    * @param integer  $pos      Update rule at position <pos>.
  */
  public function firewallGroupsGroupPos($group, $pos)
  {
      return Request::Request("/cluster/firewall/groups/$group/$pos");
  }
  /**
    * Modify rule data
    * PUT /api2/json/cluster/firewall/groups/{group}/{pos}
    * @param string   $group    Security Group name.
    * @param integer  $pos      Update rule at position <pos>.
    * @param array    $data
  */
  public function setFirewallGroupPos($group, $pos, $data = array())
  {
      return Request::Request("/cluster/firewall/groups/$group/$pos", $data, 'PUT');
  }
  /**
    * Delete rule.
    * DELETE /api2/json/cluster/firewall/groups/{group}/{pos}
    * @param string   $group    Security Group name.
    * @param integer  $pos      Update rule at position <pos>.
  */
  public function removeFirewallGroupPos($group, $pos)
  {
      return Request::Request("/cluster/firewall/groups/$group/$pos", null, 'DELETE');
  }
  /**
    * List IPSets
    * GET /api2/json/cluster/firewall/ipset
  */
  public function firewallListIpset()
  {
      return Request::Request("/cluster/firewall/ipset");
  }
  /**
    * Create new IPSet
    * POST /api2/json/cluster/firewall/ipset
    * @param array    $data
  */
  public function createFirewallIpset($data = array())
  {
      return Request::Request("/cluster/firewall/ipset", $data, 'POST');
  }
  /**
    * List IPSet content
    * GET /api2/json/cluster/firewall/ipset/{name}
    * @param string   $name    IP set name.
  */
  public function firewallIpsetName($name)
  {
      return Request::Request("/cluster/firewall/ipset/$name");
  }
  /**
    * Add IP or Network to IPSet.
    * GET /api2/json/cluster/firewall/ipset/{name}
    * @param string   $name    IP set name.
    * @param array    $data
  */
  public function addFirewallIpsetName($name, $data = array())
  {
      return Request::Request("/cluster/firewall/ipset/$name", $data, 'POST');
  }
  /**
    * Delete IPSet
    * GET /api2/json/cluster/firewall/ipset/{name}
    * @param string   $name    IP set name.
  */
  public function deleteFirewallIpsetName($name)
  {
      return Request::Request("/cluster/firewall/ipset/$name", null, 'DELETE');
  }
  /**
    * List rules.
    * GET /api2/json/cluster/firewall/rules
  */
  public function firewallListRules()
  {
      return Request::Request("/cluster/firewall/rules");
  }
  /**
    * Create new rule.
    * GET /api2/json/cluster/firewall/rules
    * @param array    $data
  */
  public function createFirewallRules($data = array())
  {
      return Request::Request("/cluster/firewall/rules", $data, 'POST');
  }
  /**
    * Get single rule data.
    * GET /api2/json/cluster/firewall/rules/{pos}
    * @param integer  $pos      Update rule at position <pos>.
  */
  public function firewallRulesPos($pos)
  {
      return Request::Request("/cluster/firewall/rules/$pos");
  }
  /**
    * Modify rule data.
    * PUT /api2/json/cluster/firewall/rules/{pos}
    * @param integer  $pos      Update rule at position <pos>.
    * @param array    $data
  */
  public function setFirewallRulesPos($pos, $data = array())
  {
      return Request::Request("/cluster/firewall/rules/$pos", $data, 'PUT');
  }
  /**
    * Delete rule.
    * DELETE /api2/json/cluster/firewall/rules/{pos}
    * @param integer  $pos      Update rule at position <pos>.
  */
  public function deleteFirewallRulesPos($pos)
  {
      return Request::Request("/cluster/firewall/rules/$pos", null, 'DELETE');
  }
  /**
    * List available macros
    * GET /api2/json/cluster/firewall/macros
  */
  public function firewallListMacros()
  {
      return Request::Request("/cluster/firewall/macros");
  }
  /**
    * Get Firewall options.
    * GET /api2/json/cluster/firewall/options
  */
  public function firewallListOptions()
  {
      return Request::Request("/cluster/firewall/options");
  }
  /**
    * Set Firewall options.
    * PUT /api2/json/cluster/firewall/options
    * @param array    $data
  */
  public function setFirewallOptions($data = array())
  {
      return Request::Request("/cluster/firewall/options", $data, 'PUT');
  }
  /**
    * Lists possible IPSet/Alias reference which are allowed in source/dest properties.
    * GET /api2/json/cluster/firewall/refs
  */
  public function firewallListRefs()
  {
      return Request::Request("/cluster/firewall/refs");
  }
  /**
    * HA manager index.
    * GET /api2/json/cluster/ha
  */
  public function Ha()
  {
      return Request::Request("/cluster/ha");
  }
  /**
    * Get HA groups.
    * GET /api2/json/cluster/ha/groups
  */
  public function getHaGroups()
  {
      return Request::Request("/cluster/ha/groups");
  }
  /**
    * Read ha group configuration.
    * GET /api2/json/cluster/ha/groups/{group}
    * @param string   $group      The HA group identifier.
  */
  public function HaGroups($group)
  {
      return Request::Request("/cluster/ha/groups/$group");
  }
  /**
    * List HA resources.
    * GET /api2/json/cluster/ha/resources
  */
  public function HaResources()
  {
      return Request::Request("/cluster/ha/resources");
  }
  /**
    * Create HA group.
    * POST /api2/json/cluster/ha/groups
    * @param array    $data
  */
  public function createHaGroup($data = array())
  {
      return Request::Request("/cluster/ha/groups", $data, "POST");
  }
  /**
    * Update HA group.
    * PUT /api2/json/cluster/ha/groups/{group}
    * @param string   $group
    * @param array    $data
  */
  public function updateHaGroup($group, $data = array())
  {
      return Request::Request("/cluster/ha/groups/$group", $data, "PUT");
  }
  /**
    * Delete HA group.
    * DELETE /api2/json/cluster/ha/groups/{group}
    * @param string   $group
  */
  public function deleteHaGroup($group)
  {
      return Request::Request("/cluster/ha/groups/$group", null, "DELETE");
  }
  /**
    * Create HA resource.
    * POST /api2/json/cluster/ha/resources
    * @param array    $data
  */
  public function createHaResource($data = array())
  {
      return Request::Request("/cluster/ha/resources", $data, "POST");
  }
  /**
    * Read HA resource configuration.
    * GET /api2/json/cluster/ha/resources/{sid}
    * @param string   $sid
  */
  public function HaResource($sid)
  {
      return Request::Request("/cluster/ha/resources/$sid");
  }
  /**
    * Update HA resource configuration.
    * PUT /api2/json/cluster/ha/resources/{sid}
    * @param string   $sid
    * @param array    $data
  */
  public function updateHaResource($sid, $data = array())
  {
      return Request::Request("/cluster/ha/resources/$sid", $data, "PUT");
  }
  /**
    * Delete HA resource.
    * DELETE /api2/json/cluster/ha/resources/{sid}
    * @param string   $sid
    * @param array    $data
  */
  public function deleteHaResource($sid, $data = array())
  {
      return Request::Request("/cluster/ha/resources/$sid", $data, "DELETE");
  }
  /**
    * Migrate HA resource.
    * POST /api2/json/cluster/ha/resources/{sid}/migrate
    * @param string   $sid
    * @param array    $data
  */
  public function migrateHaResource($sid, $data = array())
  {
      return Request::Request("/cluster/ha/resources/$sid/migrate", $data, "POST");
  }
  /**
    * Relocate HA resource.
    * POST /api2/json/cluster/ha/resources/{sid}/relocate
    * @param string   $sid
    * @param array    $data
  */
  public function relocateHaResource($sid, $data = array())
  {
      return Request::Request("/cluster/ha/resources/$sid/relocate", $data, "POST");
  }
  /**
    * List HA rules.
    * GET /api2/json/cluster/ha/rules
    * @param string   $resource
    * @param string   $type
  */
  public function HaRules($resource = null, $type = null)
  {
      $optional['resource'] = !empty($resource) ? $resource : null;
      $optional['type'] = !empty($type) ? $type : null;
      return Request::Request("/cluster/ha/rules", $optional);
  }
  /**
    * Create HA rule.
    * POST /api2/json/cluster/ha/rules
    * @param array    $data
  */
  public function createHaRule($data = array())
  {
      return Request::Request("/cluster/ha/rules", $data, "POST");
  }
  /**
    * Read HA rule configuration.
    * GET /api2/json/cluster/ha/rules/{rule}
    * @param string   $rule
  */
  public function HaRule($rule)
  {
      return Request::Request("/cluster/ha/rules/$rule");
  }
  /**
    * Update HA rule configuration.
    * PUT /api2/json/cluster/ha/rules/{rule}
    * @param string   $rule
    * @param array    $data
  */
  public function updateHaRule($rule, $data = array())
  {
      return Request::Request("/cluster/ha/rules/$rule", $data, "PUT");
  }
  /**
    * Delete HA rule.
    * DELETE /api2/json/cluster/ha/rules/{rule}
    * @param string   $rule
  */
  public function deleteHaRule($rule)
  {
      return Request::Request("/cluster/ha/rules/$rule", null, "DELETE");
  }
  /**
    * Read HA manager status.
    * GET /api2/json/cluster/ha/status
  */
  public function HaStatus()
  {
      return Request::Request("/cluster/ha/status");
  }
  /**
    * Read current HA service state.
    * GET /api2/json/cluster/ha/status/current
  */
  public function HaStatusCurrent()
  {
      return Request::Request("/cluster/ha/status/current");
  }
  /**
    * Read HA manager internals.
    * GET /api2/json/cluster/ha/status/manager_status
  */
  public function HaStatusManagerStatus()
  {
      return Request::Request("/cluster/ha/status/manager_status");
  }
  /**
    * List HA resources.
    * GET /api2/json/cluster/ha/resources
  */
  public function Replication()
  {
      return Request::Request("/cluster/replication");
  }
  /**
    * Create a new replication job
    * POST /api2/json/cluster/ha/resources
    * @param array    $data
  */
  public function createReplication($data = array())
  {
      return Request::Request("/cluster/replication", $data, "POST");
  }
  /**
    * Read replication job configuration.
    * GET /api2/json/cluster/replication/{id}
    * @param string   $id     Replication Job ID. The ID is composed of a Guest ID and a job number, separated by a hyphen, i.e. '<GUEST>-<JOBNUM>'.
  */
  public function replicationId($id)
  {
      return Request::Request("/cluster/replication/$id");
  }
  /**
    * Update replication job configuration.
    * PUT /api2/json/cluster/replication/{id}
    * @param string   $id     Replication Job ID. The ID is composed of a Guest ID and a job number, separated by a hyphen, i.e. '<GUEST>-<JOBNUM>'.
    * @param array    $data
  */
  public function updateReplication($id, $data = array())
  {
      return Request::Request("/cluster/replication/$id", $data, "PUT");
  }
  /**
    * Mark replication job for removal.
    * DELETE /api2/json/cluster/replication/{id}
    * @param string   $id     Replication Job ID. The ID is composed of a Guest ID and a job number, separated by a hyphen, i.e. '<GUEST>-<JOBNUM>'.
  */
  public function deleteReplication($id)
  {
      return Request::Request("/cluster/replication/$id", null, "DELETE");
  }
  /**
    * Cluster Ceph index.
    * GET /api2/json/cluster/ceph
  */
  public function Ceph()
  {
      return Request::Request("/cluster/ceph");
  }
  /**
    * Read Ceph metadata.
    * GET /api2/json/cluster/ceph/metadata
    * @param string   $scope
  */
  public function CephMetadata($scope = null)
  {
      $optional['scope'] = !empty($scope) ? $scope : null;
      return Request::Request("/cluster/ceph/metadata", $optional);
  }
  /**
    * Read cluster Ceph status.
    * GET /api2/json/cluster/ceph/status
  */
  public function CephStatus()
  {
      return Request::Request("/cluster/ceph/status");
  }
  /**
    * Read all cluster Ceph flags.
    * GET /api2/json/cluster/ceph/flags
  */
  public function CephFlags()
  {
      return Request::Request("/cluster/ceph/flags");
  }
  /**
    * Set multiple cluster Ceph flags.
    * PUT /api2/json/cluster/ceph/flags
    * @param array    $data
  */
  public function setCephFlags($data = array())
  {
      return Request::Request("/cluster/ceph/flags", $data, "PUT");
  }
  /**
    * Read one Ceph flag.
    * GET /api2/json/cluster/ceph/flags/{flag}
    * @param string   $flag
  */
  public function CephFlag($flag)
  {
      return Request::Request("/cluster/ceph/flags/$flag");
  }
  /**
    * Set one Ceph flag.
    * PUT /api2/json/cluster/ceph/flags/{flag}
    * @param string   $flag
    * @param array    $data
  */
  public function setCephFlag($flag, $data = array())
  {
      if (!array_key_exists('value', $data)) {
          $data['value'] = true;
      }
      return Request::Request("/cluster/ceph/flags/$flag", $data, "PUT");
  }
  /**
    * Cluster jobs index.
    * GET /api2/json/cluster/jobs
  */
  public function Jobs()
  {
      return Request::Request("/cluster/jobs");
  }
  /**
    * Realm sync jobs index.
    * GET /api2/json/cluster/jobs/realm-sync
  */
  public function RealmSyncJobs()
  {
      return Request::Request("/cluster/jobs/realm-sync");
  }
  /**
    * Read realm sync job.
    * GET /api2/json/cluster/jobs/realm-sync/{id}
    * @param string   $id
  */
  public function RealmSyncJob($id)
  {
      return Request::Request("/cluster/jobs/realm-sync/$id");
  }
  /**
    * Create realm sync job.
    * POST /api2/json/cluster/jobs/realm-sync/{id}
    * @param string   $id
    * @param array    $data
  */
  public function createRealmSyncJob($id, $data = array())
  {
      return Request::Request("/cluster/jobs/realm-sync/$id", $data, "POST");
  }
  /**
    * Update realm sync job.
    * PUT /api2/json/cluster/jobs/realm-sync/{id}
    * @param string   $id
    * @param array    $data
  */
  public function updateRealmSyncJob($id, $data = array())
  {
      return Request::Request("/cluster/jobs/realm-sync/$id", $data, "PUT");
  }
  /**
    * Delete realm sync job.
    * DELETE /api2/json/cluster/jobs/realm-sync/{id}
    * @param string   $id
  */
  public function deleteRealmSyncJob($id)
  {
      return Request::Request("/cluster/jobs/realm-sync/$id", null, "DELETE");
  }
  /**
    * Analyze a schedule expression.
    * GET /api2/json/cluster/jobs/schedule-analyze
    * @param string   $schedule
    * @param string   $starttime
    * @param integer  $iterations
  */
  public function jobsScheduleAnalyze($schedule = null, $starttime = null, $iterations = null)
  {
      $optional['schedule'] = !empty($schedule) ? $schedule : null;
      $optional['starttime'] = !empty($starttime) ? $starttime : null;
      $optional['iterations'] = !empty($iterations) ? $iterations : null;
      return Request::Request("/cluster/jobs/schedule-analyze", $optional);
  }
  /**
    * Metrics configuration index.
    * GET /api2/json/cluster/metrics
  */
  public function Metrics()
  {
      return Request::Request("/cluster/metrics");
  }
  /**
    * Export metrics data.
    * GET /api2/json/cluster/metrics/export
    * @param array    $data
  */
  public function MetricsExport($data = array())
  {
      return Request::Request("/cluster/metrics/export", $data);
  }
  /**
    * Metrics server index.
    * GET /api2/json/cluster/metrics/server
  */
  public function MetricsServer()
  {
      return Request::Request("/cluster/metrics/server");
  }
  /**
    * Read metrics server configuration.
    * GET /api2/json/cluster/metrics/server/{id}
    * @param string   $id
  */
  public function MetricsServerId($id)
  {
      return Request::Request("/cluster/metrics/server/$id");
  }
  /**
    * Create metrics server configuration.
    * POST /api2/json/cluster/metrics/server/{id}
    * @param string   $id
    * @param array    $data
  */
  public function createMetricsServer($id, $data = array())
  {
      return Request::Request("/cluster/metrics/server/$id", $data, "POST");
  }
  /**
    * Update metrics server configuration.
    * PUT /api2/json/cluster/metrics/server/{id}
    * @param string   $id
    * @param array    $data
  */
  public function updateMetricsServer($id, $data = array())
  {
      return Request::Request("/cluster/metrics/server/$id", $data, "PUT");
  }
  /**
    * Delete metrics server configuration.
    * DELETE /api2/json/cluster/metrics/server/{id}
    * @param string   $id
  */
  public function deleteMetricsServer($id)
  {
      return Request::Request("/cluster/metrics/server/$id", null, "DELETE");
  }
  /**
    * Read cluster log
    * GET /api2/json/cluster/log
    * @param integer  $max     Maximum number of entries.
  */
  public function Log($max = null)
  {
      $optional['max'] = !empty($max) ? $max : null;
      return Request::Request("/cluster/log", $optional);
  }
  /**
    * Get next free VMID. If you pass an VMID it will raise an error if the ID is already used.
    * GET /api2/json/cluster/nextid
    * @param integer  $vmid     The (unique) ID of the VM.
  */
  public function nextVmid($vmid = null)
  {
      $optional['vmid'] = !empty($vmid) ? $vmid : null;
      return Request::Request("/cluster/nextid", $optional);
  }
  /**
    * Get datacenter options.
    * GET /api2/json/cluster/options
  */
  public function Options()
  {
      return Request::Request("/cluster/options");
  }
  /**
    * Set datacenter options.
    * PUT /api2/json/cluster/options
    * @param array    $data
  */
  public function setOptions($data = array())
  {
      return Request::Request("/cluster/options", $data, "PUT");
  }
  /**
    * Resources index (cluster wide).
    * GET /api2/json/cluster/resources
    * @param enum     $type    vm | storage | node
  */
  public function Resources($type = null)
  {
      $optional['type'] = !empty($type) ? $type : null;
      return Request::Request("/cluster/resources", $optional);
  }
  /**
    * Get cluster status informations.
    * GET /api2/json/cluster/status
  */
  public function Status()
  {
      return Request::Request("/cluster/status");
  }
  /**
    * List recent tasks (cluster wide).
    * GET /api2/json/cluster/tasks
  */
  public function Tasks()
  {
      return Request::Request("/cluster/tasks");
  }
}
