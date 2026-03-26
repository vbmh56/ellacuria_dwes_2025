<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHP2WSDL\PHPClass2WSDL;

$class = "Clases\\Operaciones";
$uri = "http://localhost/DWES_6/servidorSoap/servicioW.php";

try {
    $wsdlGenerator = new PHPClass2WSDL($class, $uri);
    $wsdlGenerator->generateWSDL(true);
    $wsdlGenerator->save(__DIR__ . '/../servidorSoap/servicio.wsdl');

    echo "WSDL generado correctamente";
} catch (Exception $e) {
    die("Error al generar WSDL: " . $e->getMessage());
}