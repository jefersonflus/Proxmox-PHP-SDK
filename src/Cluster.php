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
    * Generate new cluster configuration.
    * POST /api2/json/cluster/config
    * @param array    $data
  */
  public function createConfig($data = array())
  {
      return Request::Request("/cluster/config", $data, 'POST');
  }
  /**
    * Return cluster API compatibility version.
    * GET /api2/json/cluster/config/apiversion
  */
  public function configApiVersion()
  {
      return Request::Request("/cluster/config/apiversion");
  }
  /**
    * Returns cluster join information.
    * GET /api2/json/cluster/config/join
  */
  public function configJoin()
  {
      return Request::Request("/cluster/config/join");
  }
  /**
    * Join an existing cluster.
    * POST /api2/json/cluster/config/join
    * @param array    $data
  */
  public function createConfigJoin($data = array())
  {
      return Request::Request("/cluster/config/join", $data, 'POST');
  }
  /**
    * Get external quorum device status.
    * GET /api2/json/cluster/config/qdevice
  */
  public function configQdevice()
  {
      return Request::Request("/cluster/config/qdevice");
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
    * Add cluster node configuration entry.
    * POST /api2/json/cluster/config/nodes/{node}
    * @param string   $node
    * @param array    $data
  */
  public function createConfigNode($node, $data = array())
  {
      return Request::Request("/cluster/config/nodes/$node", $data, 'POST');
  }
  /**
    * Remove cluster node configuration entry.
    * DELETE /api2/json/cluster/config/nodes/{node}
    * @param string   $node
  */
  public function deleteConfigNode($node)
  {
      return Request::Request("/cluster/config/nodes/$node", null, 'DELETE');
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
    * ACME index.
    * GET /api2/json/cluster/acme
  */
  public function Acme()
  {
      return Request::Request("/cluster/acme");
  }
  /**
    * ACME account index.
    * GET /api2/json/cluster/acme/account
  */
  public function acmeAccount()
  {
      return Request::Request("/cluster/acme/account");
  }
  /**
    * Create ACME account.
    * POST /api2/json/cluster/acme/account
    * @param array    $data
  */
  public function createAcmeAccount($data = array())
  {
      return Request::Request("/cluster/acme/account", $data, "POST");
  }
  /**
    * Read ACME account.
    * GET /api2/json/cluster/acme/account/{name}
    * @param string   $name
  */
  public function acmeAccountName($name)
  {
      return Request::Request("/cluster/acme/account/$name");
  }
  /**
    * Update ACME account.
    * PUT /api2/json/cluster/acme/account/{name}
    * @param string   $name
    * @param array    $data
  */
  public function updateAcmeAccountName($name, $data = array())
  {
      return Request::Request("/cluster/acme/account/$name", $data, "PUT");
  }
  /**
    * Delete ACME account.
    * DELETE /api2/json/cluster/acme/account/{name}
    * @param string   $name
  */
  public function deleteAcmeAccountName($name)
  {
      return Request::Request("/cluster/acme/account/$name", null, "DELETE");
  }
  /**
    * Read ACME challenge schema.
    * GET /api2/json/cluster/acme/challenge-schema
  */
  public function acmeChallengeSchema()
  {
      return Request::Request("/cluster/acme/challenge-schema");
  }
  /**
    * Read ACME directories.
    * GET /api2/json/cluster/acme/directories
  */
  public function acmeDirectories()
  {
      return Request::Request("/cluster/acme/directories");
  }
  /**
    * Read ACME directory metadata.
    * GET /api2/json/cluster/acme/meta
    * @param string   $directory
  */
  public function acmeMeta($directory = null)
  {
      $optional['directory'] = !empty($directory) ? $directory : null;
      return Request::Request("/cluster/acme/meta", $optional);
  }
  /**
    * ACME plugin index.
    * GET /api2/json/cluster/acme/plugins
    * @param string   $type
  */
  public function acmePlugins($type = null)
  {
      $optional['type'] = !empty($type) ? $type : null;
      return Request::Request("/cluster/acme/plugins", $optional);
  }
  /**
    * Create ACME plugin.
    * POST /api2/json/cluster/acme/plugins
    * @param array    $data
  */
  public function createAcmePlugin($data = array())
  {
      return Request::Request("/cluster/acme/plugins", $data, "POST");
  }
  /**
    * Read ACME plugin.
    * GET /api2/json/cluster/acme/plugins/{id}
    * @param string   $id
  */
  public function acmePluginId($id)
  {
      return Request::Request("/cluster/acme/plugins/$id");
  }
  /**
    * Update ACME plugin.
    * PUT /api2/json/cluster/acme/plugins/{id}
    * @param string   $id
    * @param array    $data
  */
  public function updateAcmePluginId($id, $data = array())
  {
      return Request::Request("/cluster/acme/plugins/$id", $data, "PUT");
  }
  /**
    * Delete ACME plugin.
    * DELETE /api2/json/cluster/acme/plugins/{id}
    * @param string   $id
  */
  public function deleteAcmePluginId($id)
  {
      return Request::Request("/cluster/acme/plugins/$id", null, "DELETE");
  }
  /**
    * Read ACME terms of service URL.
    * GET /api2/json/cluster/acme/tos
    * @param string   $directory
  */
  public function acmeTos($directory = null)
  {
      $optional['directory'] = !empty($directory) ? $directory : null;
      return Request::Request("/cluster/acme/tos", $optional);
  }
  /**
    * Notifications index.
    * GET /api2/json/cluster/notifications
  */
  public function Notifications()
  {
      return Request::Request("/cluster/notifications");
  }
  /**
    * Read notification matcher fields.
    * GET /api2/json/cluster/notifications/matcher-fields
  */
  public function notificationMatcherFields()
  {
      return Request::Request("/cluster/notifications/matcher-fields");
  }
  /**
    * Read notification matcher field values.
    * GET /api2/json/cluster/notifications/matcher-field-values
  */
  public function notificationMatcherFieldValues()
  {
      return Request::Request("/cluster/notifications/matcher-field-values");
  }
  /**
    * Notification endpoints index.
    * GET /api2/json/cluster/notifications/endpoints
  */
  public function notificationEndpoints()
  {
      return Request::Request("/cluster/notifications/endpoints");
  }
  /**
    * Gotify endpoints index.
    * GET /api2/json/cluster/notifications/endpoints/gotify
  */
  public function notificationEndpointsGotify()
  {
      return Request::Request("/cluster/notifications/endpoints/gotify");
  }
  /**
    * Create Gotify endpoint.
    * POST /api2/json/cluster/notifications/endpoints/gotify
    * @param array    $data
  */
  public function createNotificationEndpointGotify($data = array())
  {
      return Request::Request("/cluster/notifications/endpoints/gotify", $data, "POST");
  }
  /**
    * Read Gotify endpoint.
    * GET /api2/json/cluster/notifications/endpoints/gotify/{name}
    * @param string   $name
  */
  public function notificationEndpointGotifyName($name)
  {
      return Request::Request("/cluster/notifications/endpoints/gotify/$name");
  }
  /**
    * Update Gotify endpoint.
    * PUT /api2/json/cluster/notifications/endpoints/gotify/{name}
    * @param string   $name
    * @param array    $data
  */
  public function updateNotificationEndpointGotifyName($name, $data = array())
  {
      return Request::Request("/cluster/notifications/endpoints/gotify/$name", $data, "PUT");
  }
  /**
    * Delete Gotify endpoint.
    * DELETE /api2/json/cluster/notifications/endpoints/gotify/{name}
    * @param string   $name
  */
  public function deleteNotificationEndpointGotifyName($name)
  {
      return Request::Request("/cluster/notifications/endpoints/gotify/$name", null, "DELETE");
  }
  /**
    * Sendmail endpoints index.
    * GET /api2/json/cluster/notifications/endpoints/sendmail
  */
  public function notificationEndpointsSendmail()
  {
      return Request::Request("/cluster/notifications/endpoints/sendmail");
  }
  /**
    * Create Sendmail endpoint.
    * POST /api2/json/cluster/notifications/endpoints/sendmail
    * @param array    $data
  */
  public function createNotificationEndpointSendmail($data = array())
  {
      return Request::Request("/cluster/notifications/endpoints/sendmail", $data, "POST");
  }
  /**
    * Read Sendmail endpoint.
    * GET /api2/json/cluster/notifications/endpoints/sendmail/{name}
    * @param string   $name
  */
  public function notificationEndpointSendmailName($name)
  {
      return Request::Request("/cluster/notifications/endpoints/sendmail/$name");
  }
  /**
    * Update Sendmail endpoint.
    * PUT /api2/json/cluster/notifications/endpoints/sendmail/{name}
    * @param string   $name
    * @param array    $data
  */
  public function updateNotificationEndpointSendmailName($name, $data = array())
  {
      return Request::Request("/cluster/notifications/endpoints/sendmail/$name", $data, "PUT");
  }
  /**
    * Delete Sendmail endpoint.
    * DELETE /api2/json/cluster/notifications/endpoints/sendmail/{name}
    * @param string   $name
  */
  public function deleteNotificationEndpointSendmailName($name)
  {
      return Request::Request("/cluster/notifications/endpoints/sendmail/$name", null, "DELETE");
  }
  /**
    * SMTP endpoints index.
    * GET /api2/json/cluster/notifications/endpoints/smtp
  */
  public function notificationEndpointsSmtp()
  {
      return Request::Request("/cluster/notifications/endpoints/smtp");
  }
  /**
    * Create SMTP endpoint.
    * POST /api2/json/cluster/notifications/endpoints/smtp
    * @param array    $data
  */
  public function createNotificationEndpointSmtp($data = array())
  {
      return Request::Request("/cluster/notifications/endpoints/smtp", $data, "POST");
  }
  /**
    * Read SMTP endpoint.
    * GET /api2/json/cluster/notifications/endpoints/smtp/{name}
    * @param string   $name
  */
  public function notificationEndpointSmtpName($name)
  {
      return Request::Request("/cluster/notifications/endpoints/smtp/$name");
  }
  /**
    * Update SMTP endpoint.
    * PUT /api2/json/cluster/notifications/endpoints/smtp/{name}
    * @param string   $name
    * @param array    $data
  */
  public function updateNotificationEndpointSmtpName($name, $data = array())
  {
      return Request::Request("/cluster/notifications/endpoints/smtp/$name", $data, "PUT");
  }
  /**
    * Delete SMTP endpoint.
    * DELETE /api2/json/cluster/notifications/endpoints/smtp/{name}
    * @param string   $name
  */
  public function deleteNotificationEndpointSmtpName($name)
  {
      return Request::Request("/cluster/notifications/endpoints/smtp/$name", null, "DELETE");
  }
  /**
    * Webhook endpoints index.
    * GET /api2/json/cluster/notifications/endpoints/webhook
  */
  public function notificationEndpointsWebhook()
  {
      return Request::Request("/cluster/notifications/endpoints/webhook");
  }
  /**
    * Create Webhook endpoint.
    * POST /api2/json/cluster/notifications/endpoints/webhook
    * @param array    $data
  */
  public function createNotificationEndpointWebhook($data = array())
  {
      return Request::Request("/cluster/notifications/endpoints/webhook", $data, "POST");
  }
  /**
    * Read Webhook endpoint.
    * GET /api2/json/cluster/notifications/endpoints/webhook/{name}
    * @param string   $name
  */
  public function notificationEndpointWebhookName($name)
  {
      return Request::Request("/cluster/notifications/endpoints/webhook/$name");
  }
  /**
    * Update Webhook endpoint.
    * PUT /api2/json/cluster/notifications/endpoints/webhook/{name}
    * @param string   $name
    * @param array    $data
  */
  public function updateNotificationEndpointWebhookName($name, $data = array())
  {
      return Request::Request("/cluster/notifications/endpoints/webhook/$name", $data, "PUT");
  }
  /**
    * Delete Webhook endpoint.
    * DELETE /api2/json/cluster/notifications/endpoints/webhook/{name}
    * @param string   $name
  */
  public function deleteNotificationEndpointWebhookName($name)
  {
      return Request::Request("/cluster/notifications/endpoints/webhook/$name", null, "DELETE");
  }
  /**
    * Notification targets index.
    * GET /api2/json/cluster/notifications/targets
  */
  public function notificationTargets()
  {
      return Request::Request("/cluster/notifications/targets");
  }
  /**
    * Send test notification to target.
    * POST /api2/json/cluster/notifications/targets/{name}/test
    * @param string   $name
    * @param array    $data
  */
  public function testNotificationTarget($name, $data = array())
  {
      return Request::Request("/cluster/notifications/targets/$name/test", $data, "POST");
  }
  /**
    * Notification matchers index.
    * GET /api2/json/cluster/notifications/matchers
  */
  public function notificationMatchers()
  {
      return Request::Request("/cluster/notifications/matchers");
  }
  /**
    * Create notification matcher.
    * POST /api2/json/cluster/notifications/matchers
    * @param array    $data
  */
  public function createNotificationMatcher($data = array())
  {
      return Request::Request("/cluster/notifications/matchers", $data, "POST");
  }
  /**
    * Read notification matcher.
    * GET /api2/json/cluster/notifications/matchers/{name}
    * @param string   $name
  */
  public function notificationMatcherName($name)
  {
      return Request::Request("/cluster/notifications/matchers/$name");
  }
  /**
    * Update notification matcher.
    * PUT /api2/json/cluster/notifications/matchers/{name}
    * @param string   $name
    * @param array    $data
  */
  public function updateNotificationMatcherName($name, $data = array())
  {
      return Request::Request("/cluster/notifications/matchers/$name", $data, "PUT");
  }
  /**
    * Delete notification matcher.
    * DELETE /api2/json/cluster/notifications/matchers/{name}
    * @param string   $name
  */
  public function deleteNotificationMatcherName($name)
  {
      return Request::Request("/cluster/notifications/matchers/$name", null, "DELETE");
  }
  /**
    * Hardware mapping index.
    * GET /api2/json/cluster/mapping
  */
  public function Mapping()
  {
      return Request::Request("/cluster/mapping");
  }
  /**
    * Directory mappings index.
    * GET /api2/json/cluster/mapping/dir
    * @param string   $check_node
  */
  public function mappingDir($check_node = null)
  {
      $optional['check-node'] = !empty($check_node) ? $check_node : null;
      return Request::Request("/cluster/mapping/dir", $optional);
  }
  /**
    * Create directory mapping.
    * POST /api2/json/cluster/mapping/dir
    * @param array    $data
  */
  public function createMappingDir($data = array())
  {
      return Request::Request("/cluster/mapping/dir", $data, "POST");
  }
  /**
    * Read directory mapping.
    * GET /api2/json/cluster/mapping/dir/{id}
    * @param string   $id
  */
  public function mappingDirId($id)
  {
      return Request::Request("/cluster/mapping/dir/$id");
  }
  /**
    * Update directory mapping.
    * PUT /api2/json/cluster/mapping/dir/{id}
    * @param string   $id
    * @param array    $data
  */
  public function updateMappingDirId($id, $data = array())
  {
      return Request::Request("/cluster/mapping/dir/$id", $data, "PUT");
  }
  /**
    * Delete directory mapping.
    * DELETE /api2/json/cluster/mapping/dir/{id}
    * @param string   $id
  */
  public function deleteMappingDirId($id)
  {
      return Request::Request("/cluster/mapping/dir/$id", null, "DELETE");
  }
  /**
    * PCI mappings index.
    * GET /api2/json/cluster/mapping/pci
    * @param string   $check_node
  */
  public function mappingPci($check_node = null)
  {
      $optional['check-node'] = !empty($check_node) ? $check_node : null;
      return Request::Request("/cluster/mapping/pci", $optional);
  }
  /**
    * Create PCI mapping.
    * POST /api2/json/cluster/mapping/pci
    * @param array    $data
  */
  public function createMappingPci($data = array())
  {
      return Request::Request("/cluster/mapping/pci", $data, "POST");
  }
  /**
    * Read PCI mapping.
    * GET /api2/json/cluster/mapping/pci/{id}
    * @param string   $id
  */
  public function mappingPciId($id)
  {
      return Request::Request("/cluster/mapping/pci/$id");
  }
  /**
    * Update PCI mapping.
    * PUT /api2/json/cluster/mapping/pci/{id}
    * @param string   $id
    * @param array    $data
  */
  public function updateMappingPciId($id, $data = array())
  {
      return Request::Request("/cluster/mapping/pci/$id", $data, "PUT");
  }
  /**
    * Delete PCI mapping.
    * DELETE /api2/json/cluster/mapping/pci/{id}
    * @param string   $id
  */
  public function deleteMappingPciId($id)
  {
      return Request::Request("/cluster/mapping/pci/$id", null, "DELETE");
  }
  /**
    * USB mappings index.
    * GET /api2/json/cluster/mapping/usb
    * @param string   $check_node
  */
  public function mappingUsb($check_node = null)
  {
      $optional['check-node'] = !empty($check_node) ? $check_node : null;
      return Request::Request("/cluster/mapping/usb", $optional);
  }
  /**
    * Create USB mapping.
    * POST /api2/json/cluster/mapping/usb
    * @param array    $data
  */
  public function createMappingUsb($data = array())
  {
      return Request::Request("/cluster/mapping/usb", $data, "POST");
  }
  /**
    * Read USB mapping.
    * GET /api2/json/cluster/mapping/usb/{id}
    * @param string   $id
  */
  public function mappingUsbId($id)
  {
      return Request::Request("/cluster/mapping/usb/$id");
  }
  /**
    * Update USB mapping.
    * PUT /api2/json/cluster/mapping/usb/{id}
    * @param string   $id
    * @param array    $data
  */
  public function updateMappingUsbId($id, $data = array())
  {
      return Request::Request("/cluster/mapping/usb/$id", $data, "PUT");
  }
  /**
    * Delete USB mapping.
    * DELETE /api2/json/cluster/mapping/usb/{id}
    * @param string   $id
  */
  public function deleteMappingUsbId($id)
  {
      return Request::Request("/cluster/mapping/usb/$id", null, "DELETE");
  }
  /**
    * SDN index.
    * GET /api2/json/cluster/sdn
  */
  public function Sdn()
  {
      return Request::Request("/cluster/sdn");
  }
  /**
    * Apply SDN pending configuration.
    * PUT /api2/json/cluster/sdn
    * @param array    $data
  */
  public function setSdn($data = array())
  {
      return Request::Request("/cluster/sdn", $data, "PUT");
  }
  /**
    * SDN controllers index.
    * GET /api2/json/cluster/sdn/controllers
    * @param boolean  $pending
    * @param boolean  $running
    * @param string   $type
  */
  public function sdnControllers($pending = null, $running = null, $type = null)
  {
      $optional['pending'] = !empty($pending) ? $pending : null;
      $optional['running'] = !empty($running) ? $running : null;
      $optional['type'] = !empty($type) ? $type : null;
      return Request::Request("/cluster/sdn/controllers", $optional);
  }
  /**
    * Create SDN controller.
    * POST /api2/json/cluster/sdn/controllers
    * @param array    $data
  */
  public function createSdnController($data = array())
  {
      return Request::Request("/cluster/sdn/controllers", $data, "POST");
  }
  /**
    * Read SDN controller.
    * GET /api2/json/cluster/sdn/controllers/{controller}
    * @param string   $controller
    * @param boolean  $pending
    * @param boolean  $running
  */
  public function sdnController($controller, $pending = null, $running = null)
  {
      $optional['pending'] = !empty($pending) ? $pending : null;
      $optional['running'] = !empty($running) ? $running : null;
      return Request::Request("/cluster/sdn/controllers/$controller", $optional);
  }
  /**
    * Update SDN controller.
    * PUT /api2/json/cluster/sdn/controllers/{controller}
    * @param string   $controller
    * @param array    $data
  */
  public function updateSdnController($controller, $data = array())
  {
      return Request::Request("/cluster/sdn/controllers/$controller", $data, "PUT");
  }
  /**
    * Delete SDN controller.
    * DELETE /api2/json/cluster/sdn/controllers/{controller}
    * @param string   $controller
    * @param array    $data
  */
  public function deleteSdnController($controller, $data = array())
  {
      return Request::Request("/cluster/sdn/controllers/$controller", $data, "DELETE");
  }
  /**
    * SDN zones index.
    * GET /api2/json/cluster/sdn/zones
    * @param boolean  $pending
    * @param boolean  $running
    * @param string   $type
  */
  public function sdnZones($pending = null, $running = null, $type = null)
  {
      $optional['pending'] = !empty($pending) ? $pending : null;
      $optional['running'] = !empty($running) ? $running : null;
      $optional['type'] = !empty($type) ? $type : null;
      return Request::Request("/cluster/sdn/zones", $optional);
  }
  /**
    * Create SDN zone.
    * POST /api2/json/cluster/sdn/zones
    * @param array    $data
  */
  public function createSdnZone($data = array())
  {
      return Request::Request("/cluster/sdn/zones", $data, "POST");
  }
  /**
    * Read SDN zone.
    * GET /api2/json/cluster/sdn/zones/{zone}
    * @param string   $zone
    * @param boolean  $pending
    * @param boolean  $running
  */
  public function sdnZone($zone, $pending = null, $running = null)
  {
      $optional['pending'] = !empty($pending) ? $pending : null;
      $optional['running'] = !empty($running) ? $running : null;
      return Request::Request("/cluster/sdn/zones/$zone", $optional);
  }
  /**
    * Update SDN zone.
    * PUT /api2/json/cluster/sdn/zones/{zone}
    * @param string   $zone
    * @param array    $data
  */
  public function updateSdnZone($zone, $data = array())
  {
      return Request::Request("/cluster/sdn/zones/$zone", $data, "PUT");
  }
  /**
    * Delete SDN zone.
    * DELETE /api2/json/cluster/sdn/zones/{zone}
    * @param string   $zone
    * @param array    $data
  */
  public function deleteSdnZone($zone, $data = array())
  {
      return Request::Request("/cluster/sdn/zones/$zone", $data, "DELETE");
  }
  /**
    * SDN vnets index.
    * GET /api2/json/cluster/sdn/vnets
    * @param boolean  $pending
    * @param boolean  $running
  */
  public function sdnVnets($pending = null, $running = null)
  {
      $optional['pending'] = !empty($pending) ? $pending : null;
      $optional['running'] = !empty($running) ? $running : null;
      return Request::Request("/cluster/sdn/vnets", $optional);
  }
  /**
    * Create SDN vnet.
    * POST /api2/json/cluster/sdn/vnets
    * @param array    $data
  */
  public function createSdnVnet($data = array())
  {
      return Request::Request("/cluster/sdn/vnets", $data, "POST");
  }
  /**
    * Read SDN vnet.
    * GET /api2/json/cluster/sdn/vnets/{vnet}
    * @param string   $vnet
    * @param boolean  $pending
    * @param boolean  $running
  */
  public function sdnVnet($vnet, $pending = null, $running = null)
  {
      $optional['pending'] = !empty($pending) ? $pending : null;
      $optional['running'] = !empty($running) ? $running : null;
      return Request::Request("/cluster/sdn/vnets/$vnet", $optional);
  }
  /**
    * Update SDN vnet.
    * PUT /api2/json/cluster/sdn/vnets/{vnet}
    * @param string   $vnet
    * @param array    $data
  */
  public function updateSdnVnet($vnet, $data = array())
  {
      return Request::Request("/cluster/sdn/vnets/$vnet", $data, "PUT");
  }
  /**
    * Delete SDN vnet.
    * DELETE /api2/json/cluster/sdn/vnets/{vnet}
    * @param string   $vnet
    * @param array    $data
  */
  public function deleteSdnVnet($vnet, $data = array())
  {
      return Request::Request("/cluster/sdn/vnets/$vnet", $data, "DELETE");
  }
  /**
    * SDN vnet firewall index.
    * GET /api2/json/cluster/sdn/vnets/{vnet}/firewall
    * @param string   $vnet
  */
  public function sdnVnetFirewall($vnet)
  {
      return Request::Request("/cluster/sdn/vnets/$vnet/firewall");
  }
  /**
    * SDN vnet firewall options.
    * GET /api2/json/cluster/sdn/vnets/{vnet}/firewall/options
    * @param string   $vnet
  */
  public function sdnVnetFirewallOptions($vnet)
  {
      return Request::Request("/cluster/sdn/vnets/$vnet/firewall/options");
  }
  /**
    * Update SDN vnet firewall options.
    * PUT /api2/json/cluster/sdn/vnets/{vnet}/firewall/options
    * @param string   $vnet
    * @param array    $data
  */
  public function updateSdnVnetFirewallOptions($vnet, $data = array())
  {
      return Request::Request("/cluster/sdn/vnets/$vnet/firewall/options", $data, "PUT");
  }
  /**
    * SDN vnet firewall rules index.
    * GET /api2/json/cluster/sdn/vnets/{vnet}/firewall/rules
    * @param string   $vnet
  */
  public function sdnVnetFirewallRules($vnet)
  {
      return Request::Request("/cluster/sdn/vnets/$vnet/firewall/rules");
  }
  /**
    * Create SDN vnet firewall rule.
    * POST /api2/json/cluster/sdn/vnets/{vnet}/firewall/rules
    * @param string   $vnet
    * @param array    $data
  */
  public function createSdnVnetFirewallRule($vnet, $data = array())
  {
      return Request::Request("/cluster/sdn/vnets/$vnet/firewall/rules", $data, "POST");
  }
  /**
    * Read SDN vnet firewall rule.
    * GET /api2/json/cluster/sdn/vnets/{vnet}/firewall/rules/{pos}
    * @param string   $vnet
    * @param integer  $pos
  */
  public function sdnVnetFirewallRulePos($vnet, $pos)
  {
      return Request::Request("/cluster/sdn/vnets/$vnet/firewall/rules/$pos");
  }
  /**
    * Update SDN vnet firewall rule.
    * PUT /api2/json/cluster/sdn/vnets/{vnet}/firewall/rules/{pos}
    * @param string   $vnet
    * @param integer  $pos
    * @param array    $data
  */
  public function updateSdnVnetFirewallRulePos($vnet, $pos, $data = array())
  {
      return Request::Request("/cluster/sdn/vnets/$vnet/firewall/rules/$pos", $data, "PUT");
  }
  /**
    * Delete SDN vnet firewall rule.
    * DELETE /api2/json/cluster/sdn/vnets/{vnet}/firewall/rules/{pos}
    * @param string   $vnet
    * @param integer  $pos
    * @param array    $data
  */
  public function deleteSdnVnetFirewallRulePos($vnet, $pos, $data = array())
  {
      return Request::Request("/cluster/sdn/vnets/$vnet/firewall/rules/$pos", $data, "DELETE");
  }
  /**
    * SDN vnet subnets index.
    * GET /api2/json/cluster/sdn/vnets/{vnet}/subnets
    * @param string   $vnet
    * @param boolean  $pending
    * @param boolean  $running
  */
  public function sdnVnetSubnets($vnet, $pending = null, $running = null)
  {
      $optional['pending'] = !empty($pending) ? $pending : null;
      $optional['running'] = !empty($running) ? $running : null;
      return Request::Request("/cluster/sdn/vnets/$vnet/subnets", $optional);
  }
  /**
    * Create SDN vnet subnet.
    * POST /api2/json/cluster/sdn/vnets/{vnet}/subnets
    * @param string   $vnet
    * @param array    $data
  */
  public function createSdnVnetSubnet($vnet, $data = array())
  {
      return Request::Request("/cluster/sdn/vnets/$vnet/subnets", $data, "POST");
  }
  /**
    * Read SDN vnet subnet.
    * GET /api2/json/cluster/sdn/vnets/{vnet}/subnets/{subnet}
    * @param string   $vnet
    * @param string   $subnet
    * @param boolean  $pending
    * @param boolean  $running
  */
  public function sdnVnetSubnet($vnet, $subnet, $pending = null, $running = null)
  {
      $optional['pending'] = !empty($pending) ? $pending : null;
      $optional['running'] = !empty($running) ? $running : null;
      return Request::Request("/cluster/sdn/vnets/$vnet/subnets/$subnet", $optional);
  }
  /**
    * Update SDN vnet subnet.
    * PUT /api2/json/cluster/sdn/vnets/{vnet}/subnets/{subnet}
    * @param string   $vnet
    * @param string   $subnet
    * @param array    $data
  */
  public function updateSdnVnetSubnet($vnet, $subnet, $data = array())
  {
      return Request::Request("/cluster/sdn/vnets/$vnet/subnets/$subnet", $data, "PUT");
  }
  /**
    * Delete SDN vnet subnet.
    * DELETE /api2/json/cluster/sdn/vnets/{vnet}/subnets/{subnet}
    * @param string   $vnet
    * @param string   $subnet
    * @param array    $data
  */
  public function deleteSdnVnetSubnet($vnet, $subnet, $data = array())
  {
      return Request::Request("/cluster/sdn/vnets/$vnet/subnets/$subnet", $data, "DELETE");
  }
  /**
    * Add SDN vnet IP.
    * POST /api2/json/cluster/sdn/vnets/{vnet}/ips
    * @param string   $vnet
    * @param array    $data
  */
  public function createSdnVnetIp($vnet, $data = array())
  {
      return Request::Request("/cluster/sdn/vnets/$vnet/ips", $data, "POST");
  }
  /**
    * Update SDN vnet IP.
    * PUT /api2/json/cluster/sdn/vnets/{vnet}/ips
    * @param string   $vnet
    * @param array    $data
  */
  public function updateSdnVnetIp($vnet, $data = array())
  {
      return Request::Request("/cluster/sdn/vnets/$vnet/ips", $data, "PUT");
  }
  /**
    * Delete SDN vnet IP.
    * DELETE /api2/json/cluster/sdn/vnets/{vnet}/ips
    * @param string   $vnet
    * @param array    $data
  */
  public function deleteSdnVnetIp($vnet, $data = array())
  {
      return Request::Request("/cluster/sdn/vnets/$vnet/ips", $data, "DELETE");
  }
  /**
    * SDN IPAMs index.
    * GET /api2/json/cluster/sdn/ipams
    * @param string   $type
  */
  public function sdnIpams($type = null)
  {
      $optional['type'] = !empty($type) ? $type : null;
      return Request::Request("/cluster/sdn/ipams", $optional);
  }
  /**
    * Create SDN IPAM.
    * POST /api2/json/cluster/sdn/ipams
    * @param array    $data
  */
  public function createSdnIpam($data = array())
  {
      return Request::Request("/cluster/sdn/ipams", $data, "POST");
  }
  /**
    * Read SDN IPAM.
    * GET /api2/json/cluster/sdn/ipams/{ipam}
    * @param string   $ipam
  */
  public function sdnIpam($ipam)
  {
      return Request::Request("/cluster/sdn/ipams/$ipam");
  }
  /**
    * Update SDN IPAM.
    * PUT /api2/json/cluster/sdn/ipams/{ipam}
    * @param string   $ipam
    * @param array    $data
  */
  public function updateSdnIpam($ipam, $data = array())
  {
      return Request::Request("/cluster/sdn/ipams/$ipam", $data, "PUT");
  }
  /**
    * Delete SDN IPAM.
    * DELETE /api2/json/cluster/sdn/ipams/{ipam}
    * @param string   $ipam
    * @param array    $data
  */
  public function deleteSdnIpam($ipam, $data = array())
  {
      return Request::Request("/cluster/sdn/ipams/$ipam", $data, "DELETE");
  }
  /**
    * Read SDN IPAM status.
    * GET /api2/json/cluster/sdn/ipams/{ipam}/status
    * @param string   $ipam
  */
  public function sdnIpamStatus($ipam)
  {
      return Request::Request("/cluster/sdn/ipams/$ipam/status");
  }
  /**
    * SDN DNS index.
    * GET /api2/json/cluster/sdn/dns
    * @param string   $type
  */
  public function sdnDns($type = null)
  {
      $optional['type'] = !empty($type) ? $type : null;
      return Request::Request("/cluster/sdn/dns", $optional);
  }
  /**
    * Create SDN DNS.
    * POST /api2/json/cluster/sdn/dns
    * @param array    $data
  */
  public function createSdnDns($data = array())
  {
      return Request::Request("/cluster/sdn/dns", $data, "POST");
  }
  /**
    * Read SDN DNS.
    * GET /api2/json/cluster/sdn/dns/{dns}
    * @param string   $dns
  */
  public function sdnDnsId($dns)
  {
      return Request::Request("/cluster/sdn/dns/$dns");
  }
  /**
    * Update SDN DNS.
    * PUT /api2/json/cluster/sdn/dns/{dns}
    * @param string   $dns
    * @param array    $data
  */
  public function updateSdnDnsId($dns, $data = array())
  {
      return Request::Request("/cluster/sdn/dns/$dns", $data, "PUT");
  }
  /**
    * Delete SDN DNS.
    * DELETE /api2/json/cluster/sdn/dns/{dns}
    * @param string   $dns
    * @param array    $data
  */
  public function deleteSdnDnsId($dns, $data = array())
  {
      return Request::Request("/cluster/sdn/dns/$dns", $data, "DELETE");
  }
  /**
    * SDN fabrics index.
    * GET /api2/json/cluster/sdn/fabrics
  */
  public function sdnFabrics()
  {
      return Request::Request("/cluster/sdn/fabrics");
  }
  /**
    * Read all SDN fabrics data.
    * GET /api2/json/cluster/sdn/fabrics/all
    * @param boolean  $pending
    * @param boolean  $running
  */
  public function sdnFabricsAll($pending = null, $running = null)
  {
      $optional['pending'] = !empty($pending) ? $pending : null;
      $optional['running'] = !empty($running) ? $running : null;
      return Request::Request("/cluster/sdn/fabrics/all", $optional);
  }
  /**
    * SDN fabric index.
    * GET /api2/json/cluster/sdn/fabrics/fabric
    * @param boolean  $pending
    * @param boolean  $running
  */
  public function sdnFabric($pending = null, $running = null)
  {
      $optional['pending'] = !empty($pending) ? $pending : null;
      $optional['running'] = !empty($running) ? $running : null;
      return Request::Request("/cluster/sdn/fabrics/fabric", $optional);
  }
  /**
    * Create SDN fabric.
    * POST /api2/json/cluster/sdn/fabrics/fabric
    * @param array    $data
  */
  public function createSdnFabric($data = array())
  {
      return Request::Request("/cluster/sdn/fabrics/fabric", $data, "POST");
  }
  /**
    * Read SDN fabric.
    * GET /api2/json/cluster/sdn/fabrics/fabric/{id}
    * @param string   $id
  */
  public function sdnFabricId($id)
  {
      return Request::Request("/cluster/sdn/fabrics/fabric/$id");
  }
  /**
    * Update SDN fabric.
    * PUT /api2/json/cluster/sdn/fabrics/fabric/{id}
    * @param string   $id
    * @param array    $data
  */
  public function updateSdnFabricId($id, $data = array())
  {
      return Request::Request("/cluster/sdn/fabrics/fabric/$id", $data, "PUT");
  }
  /**
    * Delete SDN fabric.
    * DELETE /api2/json/cluster/sdn/fabrics/fabric/{id}
    * @param string   $id
  */
  public function deleteSdnFabricId($id)
  {
      return Request::Request("/cluster/sdn/fabrics/fabric/$id", null, "DELETE");
  }
  /**
    * SDN fabric nodes index.
    * GET /api2/json/cluster/sdn/fabrics/node
    * @param boolean  $pending
    * @param boolean  $running
  */
  public function sdnFabricNodes($pending = null, $running = null)
  {
      $optional['pending'] = !empty($pending) ? $pending : null;
      $optional['running'] = !empty($running) ? $running : null;
      return Request::Request("/cluster/sdn/fabrics/node", $optional);
  }
  /**
    * Read SDN fabric node list by fabric id.
    * GET /api2/json/cluster/sdn/fabrics/node/{fabric_id}
    * @param string   $fabric_id
    * @param boolean  $pending
    * @param boolean  $running
  */
  public function sdnFabricNodesFabricId($fabric_id, $pending = null, $running = null)
  {
      $optional['pending'] = !empty($pending) ? $pending : null;
      $optional['running'] = !empty($running) ? $running : null;
      return Request::Request("/cluster/sdn/fabrics/node/$fabric_id", $optional);
  }
  /**
    * Create SDN fabric node.
    * POST /api2/json/cluster/sdn/fabrics/node/{fabric_id}
    * @param string   $fabric_id
    * @param array    $data
  */
  public function createSdnFabricNode($fabric_id, $data = array())
  {
      return Request::Request("/cluster/sdn/fabrics/node/$fabric_id", $data, "POST");
  }
  /**
    * Read SDN fabric node.
    * GET /api2/json/cluster/sdn/fabrics/node/{fabric_id}/{node_id}
    * @param string   $fabric_id
    * @param string   $node_id
  */
  public function sdnFabricNode($fabric_id, $node_id)
  {
      return Request::Request("/cluster/sdn/fabrics/node/$fabric_id/$node_id");
  }
  /**
    * Update SDN fabric node.
    * PUT /api2/json/cluster/sdn/fabrics/node/{fabric_id}/{node_id}
    * @param string   $fabric_id
    * @param string   $node_id
    * @param array    $data
  */
  public function updateSdnFabricNode($fabric_id, $node_id, $data = array())
  {
      return Request::Request("/cluster/sdn/fabrics/node/$fabric_id/$node_id", $data, "PUT");
  }
  /**
    * Delete SDN fabric node.
    * DELETE /api2/json/cluster/sdn/fabrics/node/{fabric_id}/{node_id}
    * @param string   $fabric_id
    * @param string   $node_id
  */
  public function deleteSdnFabricNode($fabric_id, $node_id)
  {
      return Request::Request("/cluster/sdn/fabrics/node/$fabric_id/$node_id", null, "DELETE");
  }
  /**
    * Acquire SDN lock.
    * POST /api2/json/cluster/sdn/lock
    * @param array    $data
  */
  public function createSdnLock($data = array())
  {
      return Request::Request("/cluster/sdn/lock", $data, "POST");
  }
  /**
    * Release SDN lock.
    * DELETE /api2/json/cluster/sdn/lock
    * @param array    $data
  */
  public function deleteSdnLock($data = array())
  {
      return Request::Request("/cluster/sdn/lock", $data, "DELETE");
  }
  /**
    * Rollback SDN pending configuration.
    * POST /api2/json/cluster/sdn/rollback
    * @param array    $data
  */
  public function sdnRollback($data = array())
  {
      return Request::Request("/cluster/sdn/rollback", $data, "POST");
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
