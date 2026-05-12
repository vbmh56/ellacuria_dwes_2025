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

    // Si es POST → validar y actualizar
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Recoger datos del formulario
        $old['nombre'] = trim($_POST['nombre'] ?? '');
        $old['nombre_corto'] = trim($_POST['nombre_corto'] ?? '');
        $old['descripcion'] = trim($_POST['descripcion'] ?? '');
        $old['pvp'] = trim($_POST['pvp'] ?? '');
        $old['familia'] = trim($_POST['familia'] ?? '');

        // Validación mínima (FP)
        if ($old['nombre'] === '') {
            $errores[] = "El nombre es obligatorio.";
        }

        if ($old['nombre_corto'] === '') {
            $errores[] = "El nombre corto es obligatorio.";
        }

        if ($old['pvp'] === '' || !is_numeric($old['pvp']) || (float)$old['pvp'] < 0) {
            $errores[] = "El precio no es válido.";
        }

        if ($old['familia'] === '') {
            $errores[] = "Debes seleccionar una familia.";
        }

        // Validar que la familia existe
        $codsFamilia = array_column($familias, 'cod');
        if ($old['familia'] !== '' && !in_array($old['familia'], $codsFamilia, true)) {
            $errores[] = "La familia seleccionada no es válida.";
        }

        // Actualizar si no hay errores
        if (empty($errores)) {
            $ok = productos_update($pdo, $id, [
                'nombre' => $old['nombre'],
                'nombre_corto' => $old['nombre_corto'],
                'descripcion' => $old['descripcion'],
                'pvp' => (float) $old['pvp'],
                'familia' => $old['familia']
            ]);

            if ($ok) {
                // PRG: Post / Redirect / Get
                header('Location: listado.php?ok=actualizado');
                exit;
            } else {
                $errores[] = "No se pudo actualizar el producto.";
            }
        }
    }

} catch (Exception $e) {
    die("Error en la conexión: " . $e->getMessage());
}

// Cargar vista
$view  = __DIR__ . '/../views/producto/actualizar.view.php';

require_once __DIR__ . '/../views/layout.php';
