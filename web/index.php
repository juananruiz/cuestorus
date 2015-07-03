<?php

// Atención aquí no sirve para nada e influye en el rendimiento (poco pero influye)
// ini_set('display_errors', 1);

require_once __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../src/app.php';
require __DIR__ . '/../app/config/dev.php';
require __DIR__ . '/../src/routes.php';
$app->run();
