<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../model/ProductoModel.php';

// Validar id
if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    header('Location: listado.php?error=id_invalido');
    exit;
}

$id = (int) $_GET['id'];

try {
    $pdo = getPDO();

    // (Opcional) comprobar que existe antes
    $producto = productos_find($pdo, $id);
    if (!$producto) {
        header('Location: listado.php?error=no_existe');
        exit;
    }

    $ok = productos_delete($pdo, $id);

    if ($ok) {
        header('Location: listado.php?ok=borrado');
        exit;
    }

    header('Location: listado.php?error=db');
    exit;

} catch (Exception $e) {
    header('Location: listado.php?error=db');
    exit;
}
