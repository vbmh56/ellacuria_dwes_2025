<?php
session_start();

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../model/UsuarioModel.php';

if (isset($_SESSION['usuario_id'])) {
    header('Location: listado.php');
    exit;
}

$errores = [];
$usuario = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($usuario === '') {
        $errores[] = 'El usuario es obligatorio.';
    }

    if ($password === '') {
        $errores[] = 'La contrasena es obligatoria.';
    }

    if (empty($errores)) {
        try {
            $pdo = getPDO();
            $usuarioValidado = usuarios_validar_login($pdo, $usuario, $password);

            if ($usuarioValidado) {
                session_regenerate_id(true);
                $_SESSION['usuario_id'] = $usuarioValidado['id'];
                $_SESSION['usuario'] = $usuarioValidado['usuario'];

                header('Location: listado.php');
                exit;
            }

            $errores[] = 'Usuario o contrasena incorrectos.';
        } catch (Exception $e) {
            $errores[] = 'Error en la conexion: ' . $e->getMessage();
        }
    }
}

$view = __DIR__ . '/../views/usuario/login.view.php';

require_once __DIR__ . '/../views/layout.php';
