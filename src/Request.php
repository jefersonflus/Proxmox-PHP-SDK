<?php

/**
 * ProxmoxVE PHP API
 *
 * @copyright 2017 Saleh <Saleh7@protonmail.ch>
 * @license http://opensource.org/licenses/MIT The MIT License.
 */

namespace Proxmox;

use \Curl\Curl;

class Request {
  protected static $hostname;
  protected static $username;
  protected static $password;
  protected static $token_name = false;
  protected static $token_value = false;
  protected static $realm;
  protected static $port;
  public static $ticket;
  protected static $Client;
  
  /**
   * Proxmox Api client
   * @param array $configure   hostname, username, password, realm, port
   */
  public static function Login(array $configure, $verifySSL = false, $verifyHost = false) {
    $check = false;
    
    if (empty($configure['password'])) {
      if (empty($configure['token_name']) || empty($configure['token_value'])) {
        $check = true;
      } else {
        self::$token_name = $configure['token_name'];
        self::$token_value = $configure['token_value'];
      }
    } else {
      self::$password = $configure['password'];
    }
    
    self::$hostname     = !empty($configure['hostname'])      ? $configure['hostname']    : $check = true;
    self::$username     = !empty($configure['username'])      ? $configure['username']    : $check = true;
    self::$realm        = !empty($configure['realm'])         ? $configure['realm']       : 'pam'; // pam - pve - ..
    self::$port         = !empty($configure['port'])          ? $configure['port']        : 8006;
    
    if ($check) {
      throw new ProxmoxException(
        'Require in array [hostname], [username], [password] or [token_name] and [token_value], [realm], [port]'
      );
    }
    self::ticket($verifySSL, $verifyHost);
  }
  /**
   * Create or verify authentication ticket.
   * POST /api2/json/access/ticket
   */
  protected static function ticket($verifySSL, $verifyHost) {
    self::$Client = new Curl();
    self::$Client->setOpts([
      CURLOPT_SSL_VERIFYPEER => $verifySSL,
      CURLOPT_SSL_VERIFYHOST => $verifyHost
    ]);
    
    if (self::$token_name && self::$token_value) {
      self::$Client->setHeader('Authorization', sprintf(
        'PVEAPIToken=%s!%s=%s',
        self::$username . '@' . self::$realm,
        self::$token_name,
        self::$token_value
      ));
    } else {
      $data = [
        'username'  => self::$username,
        'password'  => self::$password,
        'realm'     => self::$realm,
      ];
      $response = self::$Client->post("https://" . self::$hostname . ":" . self::$port . "/api2/json/access/ticket", $data);
      if (!$response) {
        throw new ProxmoxException('Request params empty');
      }

      // set header
      self::$Client->setHeader('CSRFPreventionToken', $response->data->CSRFPreventionToken);
      // set cookie
      self::$Client->setCookie('PVEAuthCookie', $response->data->ticket);

      // Armazenar o ticket
      self::$ticket = $response->data->ticket;
    }
    self::$username = '';
    self::$password = '';
    self::$token_name = '';
    self::$token_value = '';
    self::$realm = '';
    return true;
  }

  /**
   * Request
   * @param string $path
   * @param array $params
   * @param string $method
   */
  public static function Request($path, array $params = null, $method = "GET") {
    if (substr($path, 0, 1) != '/') {
      $path = '/' . $path;
    }
    $api = "https://" . self::$hostname . ":" . self::$port . "/api2/json" . $path;
    switch ($method) {
      case "GET":
        return self::$Client->get($api, $params);
        break;
      case "PUT":
        if (self::shouldSendJsonBody($params)) {
          self::$Client->setHeader('Content-Type', 'application/json');
          $response = self::$Client->put($api, json_encode($params));
          self::$Client->removeHeader('Content-Type');
          return $response;
        }
        return self::$Client->put($api, $params);
        break;
      case "POST":
        if (self::shouldSendJsonBody($params)) {
          self::$Client->setHeader('Content-Type', 'application/json');
          $response = self::$Client->post($api, json_encode($params));
          self::$Client->removeHeader('Content-Type');
          return $response;
        }
        return self::$Client->post($api, $params);
        break;
      case "DELETE":
        self::$Client->removeHeader('Content-Length');
        return self::$Client->delete($api, $params);
        break;
      default:
        throw new ProxmoxException('HTTP Request method not allowed.');
    }
  }

  /**
   * Send JSON body when payload contains nested values that cannot be represented
   * as regular x-www-form-urlencoded key/value pairs.
   *
   * @param array|null $params
   * @return bool
   */
  protected static function shouldSendJsonBody($params) {
    if (!is_array($params) || empty($params)) {
      return false;
    }

    if (self::containsUploadValue($params)) {
      return false;
    }

    foreach ($params as $value) {
      if (is_array($value) || is_object($value)) {
        return true;
      }
    }

    return false;
  }

  /**
   * Detect file upload values to avoid forcing JSON on multipart-like requests.
   *
   * @param mixed $value
   * @return bool
   */
  protected static function containsUploadValue($value) {
    if ($value instanceof \CURLFile) {
      return true;
    }

    if (is_object($value) && get_class($value) === 'CURLStringFile') {
      return true;
    }

    if (is_array($value)) {
      foreach ($value as $item) {
        if (self::containsUploadValue($item)) {
          return true;
        }
      }
    }

    return false;
  }
}
