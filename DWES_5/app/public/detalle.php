<?php
declare(strict_types=1);

require __DIR__ . '/_init.php';

use App\Datos;

// Obtener id del producto
$id = (int) ($_GET['id'] ?? 0);

// Acción: añadir producto al carrito
if (isset($_GET['add'])) {
    $producto = Datos::findProductoById($id);

    if ($producto !== null) {
        $carrito->addProducto($producto);
        $_SESSION['carrito'] = $carrito;
    }

    header('Location: detalle.php?id=' . $id);
    exit;
}

// Buscar producto
$producto = Datos::findProductoById($id);

// Renderizar vista (aunque no exista el producto)
echo $blade->render('detalle', [
    'producto' => $producto,
    'carrito'  => $carrito,
]);
