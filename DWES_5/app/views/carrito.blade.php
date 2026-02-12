@extends('layout')

@section('title', 'Carrito de la compra')

@section('content')
  <h2 class="mb-4">Carrito de la compra</h2>

  @if (count($carrito) === 0)
    <div class="alert alert-info">
      El carrito está vacío.
    </div>

    <a href="index.php" class="btn btn-secondary">
      Volver al listado
    </a>
  @else
    <div class="table-responsive">
      <table class="table table-bordered align-middle">
        <thead class="table-light">
          <tr>
            <th>Producto</th>
            <th class="text-end">Precio con IVA (€)</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($productos as $producto)
            <tr>
              <td>{{ $producto->getNombre() }}</td>
              <td class="text-end">
                {{ number_format($producto->getPvpIVA(), 2) }}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <p class="mt-3">
      <strong>Número de productos:</strong>
      {{ count($carrito) }}
    </p>

    <p>
      <strong>Total:</strong>
      {{ number_format($total, 2) }} €
    </p>

    <a href="index.php" class="btn btn-primary">
      Volver al listado
    </a>
  @endif
@endsection
