<?php

namespace App;
use Countable;

class Carrito implements Countable
{
    private array $productos = [];

    public function addProducto(Producto $producto): void {
        $this->productos[] = $producto;
    }

    public function count(): int {
        return count($this->productos);
    }

    public function getProductos(): array {
        return $this->productos;
    }

    public function getTotal(): float {
        $total = 0;
        foreach ($this->productos as $producto) {
            $total += $producto->getPvpIVA();
        }
        return $total;
    }
}
