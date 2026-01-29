<?php
// app/config/db.php

function getPDO(): PDO {
    $host = 'localhost';
    $db   = 'proyecto';
    $user = 'gestor';
    $pass = 'secreto';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // errores claros
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // arrays asociativos
        PDO::ATTR_EMULATE_PREPARES   => false,                  // prepares reales
    ];

    return new PDO($dsn, $user, $pass, $options);
}
