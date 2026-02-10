<?php

namespace App;

class Datos
{
    public static function getProductos(): array
    {
        return [
            new Producto(1, "Portátil Ultrabook 14\"", "Ultrabook 14", 'Portátil ligero para desarrollo y uso diario', 899.00, 'hardware'),
            new Producto(2, 'Monitor 27\" 4K', 'Monitor 27 4K', 'Pantalla 27 pulgadas 4K IPS para diseño y programación', 379.00, 'perifericos'),
            new Producto(3, 'SSD NVMe 1TB', 'SSD 1TB', 'Almacenamiento rápido NVMe para proyectos y máquinas virtuales', 129.00, 'almacenamiento'),
            new Producto(4, 'Teclado Mecánico TKL', 'Teclado TKL', 'Teclado mecánico retroiluminado, switches azules', 89.90, 'perifericos'),
            new Producto(5, 'Ratón Inalámbrico', 'Ratón Inalámbrico', 'Ratón ergonómico con sensor de alta precisión', 49.50, 'perifericos'),
            new ProductoDigital(6, 'Curso Completo de Python', 'Curso Python', 'Curso online con ejercicios prácticos', 39.90, 'cursos', 1200),
            new ProductoDigital(7, 'Licencia IDE Pro', 'IDE Pro', 'Licencia anual para IDE profesional', 79.00, 'software', 5),
            new ProductoDigital(8, 'Ebook DevOps y CI/CD', 'Ebook DevOps', 'Guía práctica para pipelines y despliegues', 9.90, 'ebooks', 15),
        ];
    }

    public static function findProductoById(int $id): ?Producto
    {
        foreach (self::getProductos() as $p) {
            if ($p->getId() === $id) return $p;
        }
        return null;
    }
}
