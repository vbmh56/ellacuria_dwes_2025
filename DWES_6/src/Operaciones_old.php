<?php

namespace Clases;

use PDO;

class Operaciones
{
    public function getPVP(int $codigo): float
    {
        $conexion = Conexion::getConexion();

        $sql = "SELECT pvp FROM productos WHERE id = :codigo";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([':codigo' => $codigo]);

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$fila) {
            return 0;
        }

        return (float) $fila['pvp'];
    }

    public function getStock(int $producto, int $tienda): int
    {
        $conexion = Conexion::getConexion();

        $sql = "SELECT unidades FROM stocks WHERE producto = :producto AND tienda = :tienda";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([
            ':producto' => $producto,
            ':tienda' => $tienda
        ]);

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$fila) {
            return 0;
        }

        return (int) $fila['unidades'];
    }

    public function getFamilias(): array
    {
        $conexion = Conexion::getConexion();

        $sql = "SELECT cod FROM familias";
        $stmt = $conexion->query($sql);

        $familias = [];

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $familias[] = $fila['cod'];
        }

        return $familias;
    }

    public function getProductosFamilia(string $codFamilia): array
    {
        $conexion = Conexion::getConexion();

        $sql = "SELECT id FROM productos WHERE familia = :familia";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([':familia' => $codFamilia]);

        $productos = [];

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $productos[] = $fila['id'];
        }

        return $productos;
    }
}