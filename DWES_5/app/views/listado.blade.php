@extends('layout')

@section('title', 'Listado de productos')

@section('content')
  <h2 class="mb-4">Listado de productos</h2>

  @if (empty($productos))
    <div class="alert alert-warning">
      No hay productos disponibles.
    </div>
  @else
    <div class="row">
      @foreach ($productos as $producto)
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body d-flex flex-column">
              
              <h5 class="card-title">
                {{ $producto->getNombre() }}
              </h5>

              <p class="card-text mb-1">
                <strong>Precio sin IVA:</strong>
                {{ number_format($producto->getPvp(), 2) }} €
              </p>

              <p class="card-text mb-3">
                <strong>Precio con IVA:</strong>
                {{ number_format($producto->getPvpIVA(), 2) }} €
              </p>

              <div class="mt-auto">
                <a href="detalle.php?id={{ $producto->getId() }}"
                   class="btn btn-outline-primary btn-sm">
                  Ver detalle
                </a>

                <a href="index.php?add={{ $producto->getId() }}"
                   class="btn btn-success btn-sm">
                  Añadir al carrito
                </a>
              </div>

            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif
@endsection
