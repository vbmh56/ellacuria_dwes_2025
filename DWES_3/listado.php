<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Gestión de Productos</title>

  <!-- Bootstrap 5.3 (CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>

<body>
  <main class="container py-5">

    <h1 class="page-title text-center text-dark mb-4">Gestión de Productos</h1>

    <div class="d-flex justify-content-start mb-3">
      <a href="crear.php" class="btn btn-success px-4">Crear</a>
    </div>

    <div class="card card-dark shadow-lg">
      <div class="card-body p-0">

        <div class="table-responsive">
          <table class="table table-striped table-darkish table-borderless mb-0 align-middle">
            <thead>
              <tr>
                <th class="text-light" style="width: 120px;">Detalle</th>
                <th class="text-light"style="width: 90px;">Código</th>
                <th class="text-light">Nombre</th>
                <th class="text-light" style="width: 220px;">Acciones</th>
              </tr>
            </thead>

            <tbody>
              <!-- FILA EJEMPLO -->
              <tr>
                <td>
                  <a class="btn btn-sm btn-detail" href="detalle.php?id=2">Detalle</a>
                </td>
                <td class="text-secondary">2</td>
                <td class="text-light">Acer AX3950 i5-650 4GB 1TB W7HP</td>
                <td>
                  <a class="btn btn-sm btn-update me-2" href="editar.php?id=2">Actualizar</a>
                  <a class="btn btn-sm btn-delete"
                     href="borrar.php?id=2"
                     onclick="return confirm('¿Seguro que quieres borrar este producto?');">
                    Borrar
                  </a>
                </td>
              </tr>

              <!-- DUPLICA / GENERA DESDE PHP -->
              <tr>
                <td><a class="btn btn-sm btn-detail" href="detalle.php?id=3">Detalle</a></td>
                <td class="text-secondary">3</td>
                <td class="text-light">Archos Clipper MP3 2GB negro</td>
                <td>
                  <a class="btn btn-sm btn-update me-2" href="editar.php?id=3">Actualizar</a>
                  <a class="btn btn-sm btn-delete" href="borrar.php?id=3"
                     onclick="return confirm('¿Seguro que quieres borrar este producto?');">Borrar</a>
                </td>
              </tr>

            </tbody>
          </table>
        </div>

      </div>
    </div>

  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
