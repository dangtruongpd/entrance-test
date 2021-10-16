<?php

session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

require_once('./vendor/autoload.php');
require_once('./functions.php');

$ctrl = 'User';

if (isset($_GET['ctrl'])) {
    $ctrl = $_GET['ctrl'];
}

$ctrlClass = "App\\Controllers\\" . ucfirst(strtolower($ctrl)) . "Controller";

if (!class_exists($ctrlClass)) {
    return require_once('./views/404.php');
}

$app = new $ctrlClass();
