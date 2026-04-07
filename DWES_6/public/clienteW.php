<?php

require_once __DIR__ . '/../vendor/autoload.php';

$wsdl = 'http://localhost/DWES_6/servidorSoap/servicio.wsdl';

try {
    $cliente = new SoapClient($wsdl, [
        'trace' => true
    ]);

    echo "<h3>getPVP</h3>";
    var_dump($cliente->getPVP(1));

    echo "<h3>getStock</h3>";
    var_dump($cliente->getStock(1, 1));

    echo "<h3>getFamilias</h3>";
    echo "<pre>";
    print_r($cliente->getFamilias());
    echo "</pre>";

    echo "<h3>getProductosFamilia</h3>";
    echo "<pre>";
    print_r($cliente->getProductosFamilia('CONSOL'));
    echo "</pre>";

} catch (SoapFault $e) {
    die("Error en clienteW: " . $e->getMessage());
}