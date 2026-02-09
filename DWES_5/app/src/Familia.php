<?php
namespace App;

class Familia {
    private string $codigo;
    private string $nombre;

    public function __construct($codigo, $nombre)
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
    }

    public function getCodigo(): string {
        return $this->codigo;
    }

    public function getNombre(): string {
        return $this->nombre;
    }
}

