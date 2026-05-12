<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../model/FamiliaModel.php';
require_once __DIR__ . '/../model/ProductoModel.php';

$errores = [];
$old = [
    'nombre' => '',
    'nombre_corto' => '',
    'pvp' => '',
    'familia' => '',
    'descripcion' => ''
];

try {
    $pdo = getPDO();

    // Siempre cargamos familias (para pintar el <select> tanto en GET como en POST con errores)
    $familias = familias_all($pdo);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // 1) Recoger datos (y guardar "old" para repintar el formulario si falla)
        $old['nombre'] = trim($_POST['nombre'] ?? '');
        $old['nombre_corto'] = trim($_POST['nombre_corto'] ?? '');
        $old['pvp'] = trim($_POST['pvp'] ?? '');
        $old['familia'] = trim($_POST['familia'] ?? '');
        $old['descripcion'] = trim($_POST['descripcion'] ?? '');

        // 2) Validación mínima (FP)
        if ($old['nombre'] === '') $errores[] = "El nombre es obligatorio.";
        if ($old['nombre_corto'] === '') $errores[] = "El nombre corto es obligatorio.";
        if ($old['pvp'] === '' || !is_numeric($old['pvp']) || (float)$old['pvp'] < 0) $errores[] = "El precio no es válido.";
        if ($old['familia'] === '') $errores[] = "Debes seleccionar una familia.";

        // Validar que la familia existe (evita values inventados)
        $codsFamilia = array_column($familias, 'cod');
        if ($old['familia'] !== '' && !in_array($old['familia'], $codsFamilia, true)) {
            $errores[] = "La familia seleccionada no es válida.";
        }

        // 3) Insertar si todo ok
        if (empty($errores)) {
            $ok = productos_insert($pdo, [
                'nombre' => $old['nombre'],
                'nombre_corto' => $old['nombre_corto'],
                'descripcion' => $old['descripcion'],
                'pvp' => (float)$old['pvp'],
                'familia' => $old['familia'],
            ]);

            if ($ok) {
                // Redireccionar al listado
                header('Location: listado.php');
                exit;
            } else {
                $errores[] = "No se pudo insertar el producto.";
            }
        }
    }

} catch (Exception $e) {
    die("Error en la conexión: " . $e->getMessage());
}


// Definir la vista que contendrá el HTML
$view = __DIR__ . '/../views/producto/crear.view.php';

// Incluir el layout
require_once __DIR__ . '/../views/layout.php';