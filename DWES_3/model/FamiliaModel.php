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
