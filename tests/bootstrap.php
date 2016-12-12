<?php

require dirname(__DIR__).'/vendor/autoload.php';

$log = new Monolog\Logger('tests');
$log->pushHandler(new Monolog\Handler\StreamHandler(fopen(dirname(__DIR__).'/tests.log', 'w')));

Embed\Embed::setLogger($log);
