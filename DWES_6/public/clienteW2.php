<?php

require_once __DIR__ . '/../src/Clases1/autoload.php';

use Clases1\ClasesOperacionesService;

try {
    $cliente = new ClasesOperacionesService();

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
    die("Error en clienteW2: " . $e->getMessage());
} catch (Exception $e) {
    die("Error general en clienteW2: " . $e->getMessage());
}