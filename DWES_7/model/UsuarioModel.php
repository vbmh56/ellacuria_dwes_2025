<?php
// model/UsuarioModel.php

/**
 * Devuelve un usuario por nombre o null si no existe.
 */
function usuarios_find_by_usuario(PDO $pdo, string $usuario): ?array
{
    $sql = "SELECT id, usuario, password
            FROM usuarios
            WHERE usuario = ?
            LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$usuario]);

    $usuarioEncontrado = $stmt->fetch(PDO::FETCH_ASSOC);

    return $usuarioEncontrado ?: null;
}

/**
 * Valida credenciales y devuelve el usuario si son correctas.
 */
function usuarios_validar_login(PDO $pdo, string $usuario, string $password): ?array
{
    $usuarioEncontrado = usuarios_find_by_usuario($pdo, $usuario);

    if (!$usuarioEncontrado) {
        return null;
    }

    if (!password_verify($password, $usuarioEncontrado['password'])) {
        return null;
    }

    unset($usuarioEncontrado['password']);

    return $usuarioEncontrado;
}
