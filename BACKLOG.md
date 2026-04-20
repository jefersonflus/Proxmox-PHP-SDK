# Backlog de Implementacao - Proxmox PHP SDK

## Convencoes
- Responsavel padrao por atualizacoes no repositorio: `Jeferson`.
- Toda nova atualizacao de codigo deve manter o responsavel como `Jeferson`.
- Referencia tecnica para cobertura de API: `https://pve.proxmox.com/pve-docs/api-viewer/apidoc.js`.
- Relatorios de apoio gerados localmente:
  - `analysis/implemented_api_mismatches.txt`
  - `analysis/missing_apis_official_vs_sdk.txt`

## P0 - Correcao de compatibilidade (critico)
| ID | Prioridade | Modulo | Tarefa | Criterio de aceite | Responsavel | Status |
|---|---|---|---|---|---|---|
| BK-001 | P0 | Storage | Corrigir metodo HTTP em `deleteStorage()` de `Delete` para `DELETE`. | `DELETE /storage/{storage}` funcionando e sem excecao de metodo invalido. | Jeferson | TODO |
| BK-002 | P0 | Access | Corrigir `updateGroup` para `PUT /access/groups/{groupid}`. | Metodo alinhado ao apidoc oficial. | Jeferson | TODO |
| BK-003 | P0 | Nodes/Ceph | Revisar e corrigir rotas Ceph desatualizadas (`pool/pools`, `cfg/config`, flags). | Nenhuma divergencia Ceph no relatorio de mismatch. | Jeferson | TODO |
| BK-004 | P0 | Nodes | Corrigir rotas com path inexistente em firewall, scan, storage e qemu-agent. | Todos os paths mapeados para endpoints oficiais atuais. | Jeferson | TODO |
| BK-005 | P0 | Qualidade | Criar smoke test para todos os metodos publicos alterados em P0. | Testes verdes e sem regressao de assinatura publica. | Jeferson | TODO |

## P1 - Cobertura rapida de alto impacto
| ID | Prioridade | Modulo | Tarefa | Criterio de aceite | Responsavel | Status |
|---|---|---|---|---|---|---|
| BK-006 | P1 | Core | Implementar `GET /version`. | Metodo publico disponivel e documentado. | Jeferson | TODO |
| BK-007 | P1 | Pools | Implementar `DELETE /pools`. | Operacao de exclusao de pools implementada. | Jeferson | TODO |
| BK-008 | P1 | Pools | Implementar `PUT /pools/{poolid}` conforme apidoc atual. | Atualizacao de pool por `poolid` implementada. | Jeferson | TODO |
| BK-009 | P1 | Access | Implementar `GET /access/permissions` e `GET /access/ticket`. | Endpoints acessiveis via classe `Access`. | Jeferson | TODO |
| BK-010 | P1 | Access | Implementar base de tokens de usuario (`/access/users/{userid}/token*`). | CRUD basico de token funcional. | Jeferson | TODO |
| BK-011 | P1 | Access | Implementar base de TFA (`/access/tfa*` e `unlock-tfa`). | Fluxo principal de TFA implementado. | Jeferson | TODO |

## P2 - Nodes core
| ID | Prioridade | Modulo | Tarefa | Criterio de aceite | Responsavel | Status |
|---|---|---|---|---|---|---|
| BK-012 | P2 | Nodes | Implementar `capabilities` (`/nodes/{node}/capabilities*`). | Endpoints de capacidades expostos em `Nodes`. | Jeferson | TODO |
| BK-013 | P2 | Nodes/Qemu | Atualizar rotas de qemu-agent para caminhos oficiais atuais. | Chamadas sem mismatch para qemu-agent. | Jeferson | TODO |
| BK-014 | P2 | Nodes/Storage | Implementar caminhos atuais de estatisticas/storage no escopo de `nodes`. | Rotas de `nodes storage` alinhadas ao apidoc. | Jeferson | TODO |
| BK-015 | P2 | Nodes/Scan | Atualizar endpoints de scan para paths atuais. | Rotas de scan sem divergencia no relatorio. | Jeferson | TODO |
| BK-016 | P2 | Nodes/Ceph | Completar cobertura de Ceph em nodes (mgr/mon/osd/pool/cfg). | Cobertura de Ceph em `nodes` sem mismatch. | Jeferson | TODO |

## P3 - Cluster funcional (primeira onda)
| ID | Prioridade | Modulo | Tarefa | Criterio de aceite | Responsavel | Status |
|---|---|---|---|---|---|---|
| BK-017 | P3 | Cluster | Implementar `backup-info` e `bulk-action/guest*`. | Operacoes de consulta e bulk action disponiveis. | Jeferson | TODO |
| BK-018 | P3 | Cluster | Implementar `jobs` e `jobs/realm-sync*`. | Endpoints de jobs expostos na classe `Cluster`. | Jeferson | TODO |
| BK-019 | P3 | Cluster | Implementar `metrics` e `metrics/server*`. | Endpoints de metricas funcionais. | Jeferson | TODO |
| BK-020 | P3 | Cluster/HA | Implementar blocos faltantes de HA (`rules`, `status`, `migrate/relocate`). | Endpoints HA principais cobertos. | Jeferson | TODO |
| BK-021 | P3 | Cluster/Ceph | Implementar endpoints cluster ceph (`/cluster/ceph*`). | Cobertura de ceph em `Cluster` com metodos dedicados. | Jeferson | TODO |

## P4 - Recursos avancados
| ID | Prioridade | Modulo | Tarefa | Criterio de aceite | Responsavel | Status |
|---|---|---|---|---|---|---|
| BK-022 | P4 | Access/OpenID | Implementar `/access/openid*`. | Fluxo OpenID basico disponivel no SDK. | Jeferson | TODO |
| BK-023 | P4 | Cluster/Notifications | Implementar `cluster/notifications*`. | Endpoints de notificacao completos e documentados. | Jeferson | TODO |
| BK-024 | P4 | Cluster/Mapping | Implementar `cluster/mapping/{dir,pci,usb}*`. | Endpoints de mapping cobertos. | Jeferson | TODO |
| BK-025 | P4 | Cluster/SDN | Implementar `cluster/sdn*` por blocos (controllers, zones, vnets, ipams). | Cobertura SDN por submodulo concluida. | Jeferson | TODO |
| BK-026 | P4 | Cluster/ACME | Implementar `cluster/acme*` (account/plugins/challenges). | Operacoes ACME principais implementadas. | Jeferson | TODO |

## P5 - Governanca tecnica e manutencao
| ID | Prioridade | Modulo | Tarefa | Criterio de aceite | Responsavel | Status |
|---|---|---|---|---|---|---|
| BK-027 | P5 | CI | Criar validacao automatica contra `apidoc.js` no pipeline. | Pipeline falha em caso de novo mismatch. | Jeferson | TODO |
| BK-028 | P5 | Testes | Criar suite de contrato por modulo (`Access`, `Cluster`, `Nodes`, `Pools`, `Storage`). | Cobertura de testes minima definida e verde. | Jeferson | TODO |
| BK-029 | P5 | Docs | Atualizar README por modulo ao final de cada onda (P0, P1, P2...). | README refletindo API real implementada. | Jeferson | TODO |
| BK-030 | P5 | Release | Definir regra de versionamento (`major/minor/patch`) para novas APIs. | Processo de release documentado. | Jeferson | TODO |

## Meta de cobertura
- Meta 1 (apos P1): reduzir mismatch para `0` e aumentar cobertura geral para `>=55%`.
- Meta 2 (apos P3): cobertura geral `>=70%`.
- Meta 3 (apos P4): cobertura geral `>=85%`.
