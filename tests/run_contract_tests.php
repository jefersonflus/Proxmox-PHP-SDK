<?php

namespace ProxmoxContractTests;

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/Contract/AccessContractTest.php';
require_once __DIR__ . '/Contract/ClusterContractTest.php';
require_once __DIR__ . '/Contract/NodesContractTest.php';
require_once __DIR__ . '/Contract/PoolsContractTest.php';
require_once __DIR__ . '/Contract/StorageContractTest.php';

register_access_contract_tests();
register_cluster_contract_tests();
register_nodes_contract_tests();
register_pools_contract_tests();
register_storage_contract_tests();

finish_contract_suite();

