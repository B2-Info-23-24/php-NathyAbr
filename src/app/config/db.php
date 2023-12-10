<?php

require_once __DIR__ . '/../config/config.php';

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

$config = new Configuration();
$connectionParams = array(
    'dbname' => DB_NAME,
    'user' => DB_USER,
    'password' => DB_PASSWORD,
    'host' => DB_HOST,
    'driver' => 'pdo_mysql',
);
$conn = DriverManager::getConnection($connectionParams, $config);
