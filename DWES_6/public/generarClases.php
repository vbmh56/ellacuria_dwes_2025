<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Wsdl2PhpGenerator\Config;
use Wsdl2PhpGenerator\Generator;

$wsdl = __DIR__ . '/../servidorSoap/servicio.wsdl';
$destino = __DIR__ . '/../src/Clases1';

try {
    if (!is_dir($destino)) {
        mkdir($destino, 0777, true);
    }

    $generator = new Generator();

    $config = new Config([
        'inputFile' => $wsdl,
        'outputDir' => $destino,
        'namespaceName' => 'Clases1'
    ]);

    $generator->generate($config);

    echo "Clases generadas correctamente en src/Clases1";
} catch (Throwable $e) {
    die("Error al generar clases: " . $e->getMessage());
}