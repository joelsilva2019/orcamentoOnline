<?php
include_once 'Environment.php';

define("BASE_URL", "http://localhost/orçamentoOnline/");

global $config;
$config = array();
if(ENVIRONMENT == "development"){    
    $config['dbName'] = "orcamentoOnline";
    $config['dbHost'] = "127.0.0.1";
    $config['dbUser'] = "root";
    $config['dbPass'] = "";  
} else {
    $config['dbName'] = "orcamentoOnline";
    $config['dbHost'] = "127.0.0.1";
    $config['dbUser'] = "root";
    $config['dbPass'] = ""; 
}
