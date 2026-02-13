<?php

/**
 * ProxmoxVE PHP API
 *
 * @copyright 2017 Saleh <Saleh7@protonmail.ch>
 * @license http://opensource.org/licenses/MIT The MIT License.
 */

namespace Proxmox;

// /api2/json/access
class Access
{
  /**
    * Directory index.
    * GET /api2/json/access
  */
  public function Access()
  {
      return Request::Request("/access");
  }
  /**
    * Authentication domain index
    * GET /api2/json/access/domains
  */
  public function Domains()
  {
      return Request::Request("/access/domains");
  }
  /**
    * Add an authentication server.
    * POST /api2/json/access/domains
    * @param array    $data
  */
  public function addDomain($data = array())
  {
      return Request::Request("/access/domains", $data, 'POST');
  }
  /**
    * Authentication domain index
    * GET /api2/json/access/domains/{realm}
    * @param string   $realm   Authentication domain ID
  */
  public function domainsRealm($realm)
  {
      return Request::Request("/access/domains/$realm");
  }
  /**
    * Update authentication server settings.
    * PUT /api2/json/access/domains/{realm}
    * @param string   $realm   Authentication domain ID
    * @param array    $data
  */
  public function updateDomain($realm, $data = array())
  {
      return Request::Request("/access/domains/$realm", $data, 'PUT');
  }
  /**
    * Delete an authentication server
    * DELETE /api2/json/access/domains/{realm}
    * @param string   $realm   Authentication domain ID
  */
  public function deleteDomain($realm)
  {
      return Request::Request("/access/domains/$realm", null, 'DELETE');
  }
  /**
    * Get groups
    * GET /api2/json/access/groups
  */
  public function Groups()
  {
      return Request::Request("/access/groups");
  }
  /**
    * Create new group.
    * POST /api2/json/access/groups
    * @param array    $data
  */
  public function createGroup($data = array())
  {
      return Request::Request("/access/groups", $data, 'POST');
  }
  /**
    * Get group configuration
    * GET /api2/json/access/groups/{groupid}
    * @param string   $groupid
  */
  public function GroupId($groupid)
  {
      return Request::Request("/access/groups/$groupid");
  }
  /**
    * Update group data.
    * PUT /api2/json/access/groups/{groupid}
    * @param string   $groupid
    * @param array    $data
  */
  public function updateGroup($groupid, $data = array())
  {
      return Request::Request("/access/groups/$groupid", $data, 'PUT');
  }
  /**
    * Delete group.
    * DELETE /api2/json/access/groups/{groupid}
    * @param string   $groupid
  */
  public function deleteGroup($groupid)
  {
      return Request::Request("/access/groups/$groupid", null, 'DELETE');
  }
  /**
    * Get roles
    * GET /api2/json/access/roles
  */
  public function Roles()
  {
      return Request::Request("/access/roles");
  }
  /**
    * Create new role.
    * POST /api2/json/access/roles
    * @param array    $data
  */
  public function createRole($data = array())
  {
      return Request::Request("/access/roles", $data, 'POST');
  }
  /**
    * Get role configuration
    * GET /api2/json/access/roles/{roleid}
    * @param string   $roleid
  */
  public function RoleId($roleid)
  {
      return Request::Request("/access/roles/$roleid");
  }
  /**
    * Get role configuration
    * PUT /api2/json/access/roles/{roleid}
    * @param string   $roleid
    * @param array    $data
  */
  public function updateRole($roleid, $data = array())
  {
      return Request::Request("/access/roles/$roleid", $data, 'PUT');
  }
  /**
    * Delete role.
    * DELETE /api2/json/access/roles/{roleid}
    * @param string   $roleid
  */
  public function deleteRole($roleid)
  {
      return Request::Request("/access/roles/$roleid", null, 'DELETE');
  }
  /**
    * Get users
    * GET /api2/json/access/users
  */
  public function Users()
  {
      return Request::Request("/access/users");
  }
  /**
    * Create new user.
    * POST /api2/json/access/users
    * @param array    $data
  */
  public function createUser($data = array())
  {
      return Request::Request("/access/users", $data, 'POST');
  }
  /**
    * Get user configuration
    * GET /api2/json/access/users/{userid}
    * @param string   $userid
  */
  public function getUser($userid)
  {
      return Request::Request("/access/users/$userid");
  }
  /**
    * Update user configuration.
    * PUT /api2/json/access/users/{userid}
    * @param string   $userid
    * @param array    $data
  */
  public function updateUser($userid, $data = array())
  {
      return Request::Request("/access/users/$userid", $data, 'PUT');
  }
  /**
    * Delete user.
    * DELETE /api2/json/access/users/{userid}
    * @param string   $userid
  */
  public function deleteUser($userid)
  {
      return Request::Request("/access/users/$userid", null, 'DELETE');
  }
  /**
    * Change user password.
    * PUT /api2/json/access/password
    * @param array    $data
  */
  public function changeUserPassword($data = array())
  {
      return Request::Request("/access/password", $data, 'PUT');
  }
  /**
    * Get Access Control List (ACLs).
    * GET /api2/json/access/acl
  */
  public function Acl()
  {
      return Request::Request("/access/acl");
  }
  /**
    * Update Access Control List (add or remove permissions).
    * PUT /api2/json/access/acl
    * @param array    $data
  */
  public function updateAcl($data = array())
  {
      return Request::Request("/access/acl", $data, 'PUT');
  }
  /**
    * Retrieve user API tokens.
    * GET /api2/json/access/users/{userid}/token
    * @param string   $userid
  */
  public function userTokens($userid)
  {
      return Request::Request("/access/users/$userid/token");
  }
  /**
    * Read user API token.
    * GET /api2/json/access/users/{userid}/token/{tokenid}
    * @param string   $userid
    * @param string   $tokenid
  */
  public function userToken($userid, $tokenid)
  {
      return Request::Request("/access/users/$userid/token/$tokenid");
  }
  /**
    * Create user API token.
    * POST /api2/json/access/users/{userid}/token/{tokenid}
    * @param string   $userid
    * @param string   $tokenid
    * @param array    $data
  */
  public function createUserToken($userid, $tokenid, $data = array())
  {
      return Request::Request("/access/users/$userid/token/$tokenid", $data, 'POST');
  }
  /**
    * Update user API token.
    * PUT /api2/json/access/users/{userid}/token/{tokenid}
    * @param string   $userid
    * @param string   $tokenid
    * @param array    $data
  */
  public function updateUserToken($userid, $tokenid, $data = array())
  {
      return Request::Request("/access/users/$userid/token/$tokenid", $data, 'PUT');
  }
  /**
    * Delete user API token.
    * DELETE /api2/json/access/users/{userid}/token/{tokenid}
    * @param string   $userid
    * @param string   $tokenid
  */
  public function deleteUserToken($userid, $tokenid)
  {
      return Request::Request("/access/users/$userid/token/$tokenid", null, 'DELETE');
  }
  /**
    * List user TFA entries.
    * GET /api2/json/access/users/{userid}/tfa
    * @param string   $userid
  */
  public function userTfaEntries($userid)
  {
      return Request::Request("/access/users/$userid/tfa");
  }
  /**
    * Unlock user TFA.
    * PUT /api2/json/access/users/{userid}/unlock-tfa
    * @param string   $userid
    * @param array    $data
  */
  public function unlockUserTfa($userid, $data = array())
  {
      return Request::Request("/access/users/$userid/unlock-tfa", $data, 'PUT');
  }
  /**
    * List TFA users.
    * GET /api2/json/access/tfa
  */
  public function Tfa()
  {
      return Request::Request("/access/tfa");
  }
  /**
    * Read TFA configuration for user.
    * GET /api2/json/access/tfa/{userid}
    * @param string   $userid
  */
  public function TfaUser($userid)
  {
      return Request::Request("/access/tfa/$userid");
  }
  /**
    * Add TFA entry for user.
    * POST /api2/json/access/tfa/{userid}
    * @param string   $userid
    * @param array    $data
  */
  public function createTfaUser($userid, $data = array())
  {
      return Request::Request("/access/tfa/$userid", $data, 'POST');
  }
  /**
    * Read TFA entry for user.
    * GET /api2/json/access/tfa/{userid}/{id}
    * @param string   $userid
    * @param string   $id
  */
  public function TfaUserId($userid, $id)
  {
      return Request::Request("/access/tfa/$userid/$id");
  }
  /**
    * Update TFA entry for user.
    * PUT /api2/json/access/tfa/{userid}/{id}
    * @param string   $userid
    * @param string   $id
    * @param array    $data
  */
  public function updateTfaUserId($userid, $id, $data = array())
  {
      return Request::Request("/access/tfa/$userid/$id", $data, 'PUT');
  }
  /**
    * Delete TFA entry for user.
    * DELETE /api2/json/access/tfa/{userid}/{id}
    * @param string   $userid
    * @param string   $id
  */
  public function deleteTfaUserId($userid, $id)
  {
      return Request::Request("/access/tfa/$userid/$id", null, 'DELETE');
  }
  /**
    * Read effective permissions.
    * GET /api2/json/access/permissions
    * @param array    $data
  */
  public function Permissions($data = array())
  {
      return Request::Request("/access/permissions", $data);
  }
  /**
    * Read authentication ticket data.
    * GET /api2/json/access/ticket
    * @param array    $data
  */
  public function Ticket($data = array())
  {
      return Request::Request("/access/ticket", $data);
  }
  /**
    * Create or verify authentication ticket.
    * POST /api2/json/access/ticket
    * @param array    $data
  */
  public function createTicket($data = array())
  {
      return Request::Request("/access/ticket", $data, 'POST');
  }
}
