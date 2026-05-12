<?php
// model/VotoModel.php

/**
 * Devuelve el resumen de votos de todos los productos.
 */
function votos_resumen_listado(PDO $pdo, int $usuarioId): array
{
    $sql = "SELECT
                p.id AS producto_id,
                COUNT(v.id) AS total_votos,
                AVG(v.valoracion) AS media,
                MAX(CASE WHEN vu.id IS NULL THEN 0 ELSE 1 END) AS ha_votado
            FROM productos p
            LEFT JOIN votos v ON v.producto_id = p.id
            LEFT JOIN votos vu
                ON vu.producto_id = p.id
                AND vu.usuario_id = ?
            GROUP BY p.id
            ORDER BY p.id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$usuarioId]);

    $resumen = [];

    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $fila) {
        $productoId = (int) $fila['producto_id'];
        $resumen[$productoId] = normalizar_resumen_votos($fila);
    }

    return $resumen;
}

/**
 * Devuelve el resumen de votos de un producto o null si no existe.
 */
function votos_resumen_producto(PDO $pdo, int $productoId, int $usuarioId): ?array
{
    $sql = "SELECT
                p.id AS producto_id,
                COUNT(v.id) AS total_votos,
                AVG(v.valoracion) AS media,
                MAX(CASE WHEN vu.id IS NULL THEN 0 ELSE 1 END) AS ha_votado
            FROM productos p
            LEFT JOIN votos v ON v.producto_id = p.id
            LEFT JOIN votos vu
                ON vu.producto_id = p.id
                AND vu.usuario_id = ?
            WHERE p.id = ?
            GROUP BY p.id
            LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$usuarioId, $productoId]);

    $fila = $stmt->fetch(PDO::FETCH_ASSOC);

    return $fila ? normalizar_resumen_votos($fila) : null;
}

/**
 * Inserta una votacion para un producto.
 */
function votos_insertar(PDO $pdo, int $usuarioId, int $productoId, int $valoracion): bool
{
    $sql = "INSERT INTO votos (usuario_id, producto_id, valoracion)
            VALUES (?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    return $stmt->execute([$usuarioId, $productoId, $valoracion]);
}

/**
 * Normaliza los tipos devueltos por PDO para usarlos en JSON y vistas.
 */
function normalizar_resumen_votos(array $fila): array
{
    return [
        'producto_id' => (int) $fila['producto_id'],
        'total_votos' => (int) $fila['total_votos'],
        'media' => $fila['media'] !== null ? round((float) $fila['media'], 1) : null,
        'ha_votado' => (bool) $fila['ha_votado'],
    ];
}
