<?php $title = "My blog"; ?>
<?php
require __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

require __DIR__ . "/../app/router.php"; ?>
<?php require __DIR__ . "/../views/layouts/header.php"; ?>
<?php require __DIR__ . "/../views/articles/index.php"; ?>
