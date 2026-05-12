<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../model/ProductoModel.php';
require_once __DIR__ . '/../model/FamiliaModel.php';

$errores = [];
$old = [
    'nombre' => '',
    'nombre_corto' => '',
    'descripcion' => '',
    'pvp' => '',
    'familia' => ''
];

// Validar ID (común a GET y POST)
if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    header('Location: listado.php?error=id_invalido');
    exit;
}

$id = (int) $_GET['id'];

try {
    $pdo = getPDO();

    // Cargar familias
    $familias = familias_all($pdo);

    // Obtener producto existente
    $producto = productos_find($pdo, $id);

    if (!$producto) {
        header('Location: listado.php?error=no_existe');
        exit;
    }

    // Inicializar $old con datos actuales (GET)
    $old = $producto;
    
    // Obtener nombre de familia a partir del código
    $old['familia_nombre'] = null;
    if (!empty($old['familia'])) {
        $old['familia_nombre'] = familia_nombre_por_cod($pdo, $old['familia']);
    }

} catch (Exception $e) {
    die("Error en la conexión: " . $e->getMessage());
}

// Cargar vista
$view  = __DIR__ . '/../views/producto/detalle.view.php';

require_once __DIR__ . '/../views/layout.php';
