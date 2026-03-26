<?php

require_once __DIR__ . '/../vendor/autoload.php';

$url = "http://localhost/DWES_6/servidorSoap/servicio.wsdl";

try {
    $server = new SoapServer($url);
    $server->setClass('Clases\\Operaciones');
    $server->handle();
} catch (SoapFault $f) {
    die("Error en server: " . $f->getMessage());
}