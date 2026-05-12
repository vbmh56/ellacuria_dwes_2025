<?php
session_start();

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../model/VotoModel.php';

$usuarioId = obtener_usuario_actual_id();

try {
    $pdo = getPDO();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        manejar_get($pdo, $usuarioId);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        manejar_post($pdo, $usuarioId);
    }

    responder_json([
        'ok' => false,
        'error' => 'Metodo no permitido',
    ], 405);
} catch (PDOException $e) {
    manejar_error_pdo($e);
} catch (Exception $e) {
    responder_json([
        'ok' => false,
        'error' => 'Error interno',
    ], 500);
}

function obtener_usuario_actual_id(): int
{
    if (!isset($_SESSION['usuario_id'])) {
        responder_json([
            'ok' => false,
            'error' => 'No autenticado',
        ], 401);
    }

    return (int) $_SESSION['usuario_id'];
}

function manejar_get(PDO $pdo, int $usuarioId): void
{
    $productoId = filter_input(INPUT_GET, 'producto_id', FILTER_VALIDATE_INT);

    if ($productoId) {
        $resumen = votos_resumen_producto($pdo, $productoId, $usuarioId);

        if (!$resumen) {
            responder_json([
                'ok' => false,
                'error' => 'Producto no encontrado',
            ], 404);
        }

        responder_json([
            'ok' => true,
            'valoracion' => $resumen,
        ]);
    }

    responder_json([
        'ok' => true,
        'valoraciones' => votos_resumen_listado($pdo, $usuarioId),
    ]);
}

function manejar_post(PDO $pdo, int $usuarioId): void
{
    $productoId = filter_input(INPUT_POST, 'producto_id', FILTER_VALIDATE_INT);
    $valoracion = filter_input(INPUT_POST, 'valoracion', FILTER_VALIDATE_INT);

    if (!$productoId) {
        responder_json([
            'ok' => false,
            'error' => 'Producto no valido',
        ], 400);
    }

    if (!$valoracion || $valoracion < 1 || $valoracion > 5) {
        responder_json([
            'ok' => false,
            'error' => 'Valoracion no valida',
        ], 400);
    }

    votos_insertar($pdo, $usuarioId, $productoId, $valoracion);
    $resumen = votos_resumen_producto($pdo, $productoId, $usuarioId);

    responder_json([
        'ok' => true,
        'valoracion' => $resumen,
    ]);
}

function manejar_error_pdo(PDOException $e): void
{
    if ($e->getCode() === '23000') {
        responder_json([
            'ok' => false,
            'error' => 'Ya has votado este producto',
        ], 409);
    }

    responder_json([
        'ok' => false,
        'error' => 'Error de base de datos',
    ], 500);
}

function responder_json(array $data, int $status = 200): void
{
    http_response_code($status);
    echo json_encode($data);
    exit;
}
