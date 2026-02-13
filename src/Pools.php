<?php

/**
 * ProxmoxVE PHP API
 *
 * @copyright 2017 Saleh <Saleh7@protonmail.ch>
 * @license http://opensource.org/licenses/MIT The MIT License.
 */

namespace Proxmox;

// /api2/json/pools
class Pools
{
  /**
    * Read system log
    * GET /api2/json/pools
  */
  public function Pools()
  {
      return Request::Request("/pools");
  }
  /**
    * Read system log
    * GET /api2/json/pools/{poolid}
    * @param string   $poolid
  */
  public function getPool($poolid)
  {
      return Request::Request("/pools/$poolid");
  }
  /**
   * Update pool data.
   * PUT /api2/json/pools or /api2/json/pools/{poolid}
   * Backward compatible:
   * - UpdatePool($data)
   * - UpdatePool($poolid, $data)
   */
  public function UpdatePool($poolid_or_data = null, $data = array())
  {
    if (is_array($poolid_or_data)) {
      return Request::Request("/pools", $poolid_or_data, "PUT");
    }
    if (!empty($poolid_or_data)) {
      return Request::Request("/pools/$poolid_or_data", $data, "PUT");
    }
    return Request::Request("/pools", $data, "PUT");
  }
  /**
   * Update pool data by id.
   * PUT /api2/json/pools/{poolid}
   * @param string   $poolid
   * @param array    $data
   */
  public function UpdatePoolById($poolid, $data = array())
  {
    return Request::Request("/pools/$poolid", $data, "PUT");
  }
  /**
   * Read system log
   * GET /api2/json/pools/{poolid}
   * @param string   $poolid
   */
  public function CreatePool($data = array())
  {
    return Request::Request("/pools", $data, "POST");
  }
  /**
    * Read system log
    * GET /api2/json/pools/{poolid}
    * @param string   $poolid
  */
  public function DeletePool($poolid)
  {
      return Request::Request("/pools/$poolid",null,"DELETE");
  }
  /**
    * Delete pools.
    * DELETE /api2/json/pools
    * @param array    $data
  */
  public function DeletePools($data = array())
  {
      return Request::Request("/pools", $data, "DELETE");
  }
}
