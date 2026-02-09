<?php
namespace App;

class Producto {

    const IVA = 21;

    private static int $numProductos = 0;

    private int $id;
    private string $nombre;
    private string $nombre_corto;
    private ?string $descripcion;
    private float $pvp;
    private string $familia; //código de la familia


    public function __construct(
            int $id,
            string $nombre,
            string $nombre_corto,
            ?string $descripcion,
            float $pvp,
            string $familia        
        ) {
        self::$numProductos++;

        $this->id = $id;
        $this->nombre = $nombre;
        $this->nombre_corto = $nombre_corto;
        $this->descripcion = $descripcion;
        $this->pvp = $pvp;
        $this->familia = $familia;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getNombreCorto(): string {
        return $this->nombre_corto;
    }

    public function getDescripcion(): ?string {
        return $this->descripcion;
    }

    public function getPvp(): float {
        return $this->pvp;
    }

    public function getPvpIVA(): float{
        return $this->pvp + ($this->pvp * (self::IVA / 100));
    }

    public function getFamilia(): string {
        return $this->familia;
    }

    public function getNumProductos(): int {
        return self::$numProductos;
    }
}
