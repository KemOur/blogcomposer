<?php
require __DIR__ . "/../vendor/autoload.php";

use Noodlehaus\Config;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();
$faker = Faker\Factory::create('fr_FR');
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$config =  new Config(__DIR__ . "/../config/database.php");
/*
echo $config->get('database.dbname');
die();
*/
require __DIR__ . "/../app/router.php"; ?>
