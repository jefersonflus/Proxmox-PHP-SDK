<?php

/**
 * ProxmoxVE PHP API
 *
 * @copyright 2017 Saleh <Saleh7@protonmail.ch>
 * @license http://opensource.org/licenses/MIT The MIT License.
 */

namespace Proxmox;

// /api2/json/version
class Version
{
  /**
    * API version details.
    * GET /api2/json/version
  */
  public function getVersion()
  {
      return Request::Request("/version");
  }
}
