<?php
// Incluir la configuración de base de datos
require_once __DIR__ . '/../config/db.php';

try {
    // Obtener conexión PDO
    $pdo = getPDO();
    
    // Consultar productos
    $sql = "SELECT id, nombre FROM productos ORDER BY id";
    $stmt = $pdo->query($sql);
    $productos = $stmt->fetchAll();
    
} catch (Exception $e) {
    die("Error en la conexión: " . $e->getMessage());
}

// Definir la vista que contendrá el HTML
$view = __DIR__ . '/../views/listado.view.php';

// Incluir el layout
require_once __DIR__ . '/../views/layout.php';