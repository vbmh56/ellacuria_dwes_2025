<?php

namespace App;

class ProductoDigital extends Producto implements IDescargable {

    private int $sizeInMB;

    public function __construct(
        int $id,
        string $nombre,
        string $nombre_corto,
        ?string $descripcion,
        float $pvp,
        string $familia,
        int $sizeInMB
    ) {
        parent::__construct($id, $nombre, $nombre_corto, $descripcion, $pvp, $familia);
        $this->sizeInMB = $sizeInMB;
    }	

    public function getSizeInMB(): int {
        return $this->sizeInMB;
    }

}