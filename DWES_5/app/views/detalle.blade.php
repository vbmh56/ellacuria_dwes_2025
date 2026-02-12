@extends('layout')

@section('title', 'Detalle del producto')

@section('content')
  <h2 class="mb-4">Detalle del producto</h2>

  @if ($producto === null)
    <div class="alert alert-danger">
      El producto no existe o no se ha encontrado.
    </div>

    <a href="index.php" class="btn btn-secondary">
      Volver al listado
    </a>
  @else
    <div class="card">
      <div class="card-body">

        <h4 class="card-title mb-3">
          {{ $producto->getNombre() }}
        </h4>

        <p class="card-text">
          <strong>Precio sin IVA:</strong>
          {{ number_format($producto->getPrecio(), 2) }} €
        </p>

        <p class="card-text">
          <strong>Precio con IVA:</strong>
          {{ number_format($producto->getPvpIVA(), 2) }} €
        </p>

        @if ($producto instanceof \App\IDescargable)
          <p class="card-text">
            <strong>Tamaño:</strong>
            {{ $producto->getSizeInMB() }} MB
          </p>
        @endif

        <div class="mt-4">
          <a href="detalle.php?id={{ $producto->getId() }}&add={{ $producto->getId() }}"
             class="btn btn-success">
            Añadir al carrito
          </a>

          <a href="index.php" class="btn btn-outline-secondary">
            Volver al listado
          </a>
        </div>

      </div>
    </div>
  @endif
@endsection
