<?php

// configure your app for the production environment

date_default_timezone_set('Europe/Madrid');

// enable the debug mode
$app['debug'] = true;

// DoctrineServiceProvider opciones para la BD
$app['db.options'] = array(
    'driver' => 'pdo_mysql',
    'dbname' => 'encuestas',
    'host' => 'localhost',
    'user' => 'encuestador',
    'password' => 'secretitosenreunionsonfaltadeeducacion',
    'charset' => 'utf8',
    'driverOptions' => array(1002 => 'SET NAMES utf8'),
);