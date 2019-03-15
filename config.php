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

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("LojaNova")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("LojaNova")->setRelease("1.0.0");

\PagSeguro\Configuration\Configure::setEnvironment('sandbox');
// \PagSeguro\Configuration\Configure::setEnvironment('production');//
\PagSeguro\Configuration\Configure::setAccountCredentials('igor01silveira@gmail.com', 'C2FFA0D898124BEC99EEA6535AB6B081');
\PagSeguro\Configuration\Configure::setCharset('UTF-8');
\PagSeguro\Configuration\Configure::setLog(true, 'pagseguro.log');