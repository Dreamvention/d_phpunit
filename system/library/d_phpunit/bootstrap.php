<?php

$includeIfExists = function ($file) {
    return file_exists($file) ? include $file : false;
};

require_once(__DIR__.'/OpenCartTest.php');

if ((!$loader = $includeIfExists(__DIR__.'/vendor/autoload.php'))) {
    echo 'You must set up the project dependencies using `composer install`'.PHP_EOL.
        'See https://getcomposer.org/download/ for instructions on installing Composer'.PHP_EOL;
    exit(1);
}

if (file_exists($file = __DIR__.'./.env') || file_exists($file = __DIR__.'/../../../.env')) {
    $dotenv = new \Dotenv\Dotenv(dirname($file));
    $dotenv->load();
    define('VERSION',$_SERVER['VERSION']);
}
//define('VERSION', '3.0.2.0');
$_SERVER['OC_ROOT'] = '../../../';