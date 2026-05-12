<?php
// Incluir la configuración de base de datos
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../model/ProductoModel.php';

try {
    // Obtener conexión PDO
    $pdo = getPDO();
    
    // Consultar productos
    $productos = productos_all($pdo);
    
} catch (Exception $e) {
    die("Error en la conexión: " . $e->getMessage());
}

// Definir la vista que contendrá el HTML
$view = __DIR__ . '/../views/producto/listado.view.php';

// Incluir el layout
require_once __DIR__ . '/../views/layout.php';