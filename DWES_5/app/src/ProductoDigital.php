<?php

namespace App;

class ProductoDigital extends Producto implements IRenderizable {

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

	public function renderCard(): string {
		// Implementation of renderCard method
        return "<div>
                    <h3>{$this->getNombre()}</h3>
                    <p>Tamaño: {$this->sizeInMB}</p>
                </div>";
	}

    public function getSizeInMB(): int {
        return $this->sizeInMB;
    }

}