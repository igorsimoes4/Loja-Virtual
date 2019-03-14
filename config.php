<?php
require 'environment.php';

global $config;

$config = array();

if(ENVIRONMENT == 'development') {
	// HOSPEDAGEM SERVIDOR LOCAL
	define("BASE_URL", "http://127.0.0.1/loja_nova/");
	$config['dbname'] = 'loja_nova';
	$config['host'] = '127.0.0.1';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	// HOSPEDAGEM SERVIDOR EXTERNO
	define("BASE_URL", "http://meusite.com.br/");
	$config['dbname'] = 'mvc';
	$config['host'] = '127.0.0.1';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}

$config['default_lang'] = 'pt-br';
$config['cep_origin'] = '90020110';

global $db;
try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}