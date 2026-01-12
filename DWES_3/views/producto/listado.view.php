<!-- Espera variable $productos -->
<!-- Redirige a detalle.php con id=producto[id] -->
<!-- Redirige a actualizar.php con id=producto[id] -->
<!-- Redirige a borrar.php con id=producto[id] -->

<h5 class="page-title text-center text-dark mb-4">Gestión de Productos</h5>

<?php include __DIR__ . '/../partials/messages_get.php'; ?>

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
            <th class="text-light" style="width: 90px;">Código</th>
            <th class="text-light">Nombre</th>
            <th class="text-light" style="width: 220px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($productos as $producto): ?>
            <tr>
              <td>
                <a class="btn btn-sm btn-detail"
                   href="detalle.php?id=<?= htmlspecialchars($producto['id']) ?>">
                  Detalle
                </a>
              </td>
              <td class="text-secondary"><?= htmlspecialchars($producto['id']) ?></td>
              <td class="text-light"><?= htmlspecialchars($producto['nombre']) ?></td>
              <td>
                <a class="btn btn-sm btn-update me-2"
                   href="actualizar.php?id=<?= htmlspecialchars($producto['id']) ?>">
                  Actualizar
                </a>
                <a class="btn btn-sm btn-delete"
                   href="borrar.php?id=<?= htmlspecialchars($producto['id']) ?>"
                   onclick="return confirm('¿Seguro que quieres borrar este producto?');">
                  Borrar
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
