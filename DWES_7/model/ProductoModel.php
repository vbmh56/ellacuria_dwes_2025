<?php
// model/ProductoModel.php

/**
 * Devuelve todos los productos (listado)
 */
function productos_all(PDO $pdo): array
{
    $sql = "SELECT id, nombre
            FROM productos
            ORDER BY id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Devuelve un producto por id o null si no existe
 */
function productos_find(PDO $pdo, int $id): ?array
{
    $sql = "SELECT *
            FROM productos
            WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    return $producto ?: null;
}

/**
 * Inserta un nuevo producto
 */
function productos_insert(PDO $pdo, array $data): bool
{
    $sql = "INSERT INTO productos
            (nombre, nombre_corto, descripcion, pvp, familia)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    return $stmt->execute([
        $data['nombre'],
        $data['nombre_corto'],
        $data['descripcion'],
        $data['pvp'],
        $data['familia']
    ]);
}

/**
 * Actualiza un producto existente
 */
function productos_update(PDO $pdo, int $id, array $data): bool
{
    $sql = "UPDATE productos
            SET nombre = ?,
                nombre_corto = ?,
                descripcion = ?,
                pvp = ?,
                familia = ?
            WHERE id = ?";

    $stmt = $pdo->prepare($sql);

    return $stmt->execute([
        $data['nombre'],
        $data['nombre_corto'],
        $data['descripcion'],
        $data['pvp'],
        $data['familia'],
        $id
    ]);
}

/**
 * Borra un producto por id
 */
function productos_delete(PDO $pdo, int $id): bool
{
    $sql = "DELETE FROM productos WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}
