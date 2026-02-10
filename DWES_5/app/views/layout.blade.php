{{-- app/views/layout.blade.php --}}
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Catálogo')</title>

  <!-- Bootstrap 5.3 (CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../style.css" rel="stylesheet">
</head>
<body>
    <header class="container py-3">
        <h1>Catálogo de productos</h1>
            <nav class="mb-3">
                <a href="index.php">Listado</a> |
                <a href="carrito.php">Carrito ({{ count($carrito) }})</a>
            </nav>
        <hr>
  </header>
  <main class="container py-5">        
     @yield('content')        
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


