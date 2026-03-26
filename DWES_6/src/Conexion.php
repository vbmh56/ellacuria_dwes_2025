<?php

namespace Clases;

use PDO;
use PDOException;

class Conexion
{
    private static ?PDO $conexion = null;

    public static function getConexion(): PDO
    {
        if (self::$conexion === null) {
            $dsn = "mysql:host=localhost;dbname=tarea6;charset=utf8mb4";

            try {
                self::$conexion = new PDO($dsn, "gestor", "secreto");
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        }

        return self::$conexion;
    }
}