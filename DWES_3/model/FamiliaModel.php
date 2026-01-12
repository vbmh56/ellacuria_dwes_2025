<?php
// model/FamiliaModel.php

/**
 * Devuelve todas las familias
 *
 * @param PDO $pdo
 * @return array
 */
function familias_all(PDO $pdo): array
{
    $sql = "SELECT cod, nombre
            FROM familias
            ORDER BY nombre";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Devuelve el nombre de una familia dado su código.
 * Si no existe, devuelve null.
 */
function familia_nombre_por_cod(PDO $pdo, string $cod): ?string
{
    $sql = "SELECT nombre
            FROM familias
            WHERE cod = ?
            LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$cod]);

    $nombre = $stmt->fetchColumn(); // devuelve string o false
    return ($nombre !== false) ? (string)$nombre : null;
}