<?php
declare(strict_types=1);

require __DIR__ . '/_init.php';

// Renderizar vista del carrito
echo $blade->render('carrito', [
    'productos' => $carrito->getProductos(),
    'total'     => $carrito->getTotal(),
    'carrito'   => $carrito,
]);
