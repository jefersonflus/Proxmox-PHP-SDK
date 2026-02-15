# Proxmox PHP SDK

SDK PHP para a API do Proxmox VE (`/api2/json`).

## Status Atual
Validação executada em **15/02/2026** contra o `apidoc.js` oficial do Proxmox:

- `official_pairs=646`
- `implemented_pairs=646`
- `missing_pairs=0`
- `mismatches=0`
- `invalid_method_literals=0`

Fonte oficial da API:
- https://pve.proxmox.com/pve-docs/api-viewer/index.html
- https://pve.proxmox.com/pve-docs/api-viewer/apidoc.js

## Instalação

```bash
composer require jefersonflus/proxmox-php-sdk @dev
```

## Requisitos

- PHP com suporte a cURL
- Dependência HTTP: `php-curl-class/php-curl-class`
- Node.js (apenas para `validate:apidoc`)

## Estrutura do SDK

Classes públicas disponíveis:

- `Proxmox\Request` (transporte/autenticação)
- `Proxmox\Access`
- `Proxmox\Cluster`
- `Proxmox\Nodes`
- `Proxmox\Pools`
- `Proxmox\Storage`
- `Proxmox\Version`

## Uso Rápido

### Autenticação com usuário/senha

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Proxmox\Request;
use Proxmox\Nodes;

$config = [
    'hostname' => '10.0.0.10',
    'username' => 'root',
    'password' => 'secret',
    'realm' => 'pam',
    'port' => 8006,
];

// Em produção, prefira true/true para validação TLS.
Request::Login($config, true, true);

$nodes = new Nodes();
print_r($nodes->listNodes());
```

### Autenticação com API Token

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Proxmox\Request;
use Proxmox\Nodes;

$config = [
    'hostname' => '10.0.0.10',
    'username' => 'root',
    'token_name' => 'api-token',
    'token_value' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
    'realm' => 'pam',
    'port' => 8006,
];

Request::Login($config, true, true);

$nodes = new Nodes();
print_r($nodes->nodeStatus('pve-node-01'));
```

### Requisição direta (baixo nível)

```php
<?php
use Proxmox\Request;

$response = Request::Request('/nodes', null, 'GET');
print_r($response);
```

## Exemplos de Operações

```php
<?php
use Proxmox\Access;
use Proxmox\Cluster;
use Proxmox\Nodes;
use Proxmox\Pools;
use Proxmox\Storage;
use Proxmox\Version;

$access = new Access();
$cluster = new Cluster();
$nodes = new Nodes();
$pools = new Pools();
$storage = new Storage();
$version = new Version();

print_r($version->getVersion());
print_r($cluster->Status());
print_r($nodes->queryUrlMetadata('pve-node-01', ['url' => 'https://example.com/image.qcow2']));
```

## Desenvolvimento

```bash
composer lint
composer test
composer validate:apidoc
```

## Qualidade e Testes

- `composer test` executa testes de contrato (`tests/Contract/*`) com cliente HTTP fake.
- `composer validate:apidoc` compara todas as rotas/métodos do SDK com o `apidoc.js` oficial.
- O SDK mantém validação de assinatura de método HTTP (`GET/POST/PUT/DELETE`) e detecção de mismatches.

## Versionamento e Releases

Política de versão e release em:

- `RELEASE.md`

## Licença

MIT (`LICENSE`).
