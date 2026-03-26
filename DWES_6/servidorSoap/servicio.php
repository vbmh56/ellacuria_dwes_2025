<?php

require_once __DIR__ . '/../vendor/autoload.php';

$uri = 'http://localhost/DWES_6/servidorSoap';
$parametros = ['uri' => $uri];

try {
    $server = new SoapServer(null, $parametros);
    $server->setClass('Clases\\Operaciones');
    $server->handle();
} catch (SoapFault $f) {
    die("Error en server: " . $f->getMessage());
}