<h5 class="page-title text-center text-dark mb-4">Detalle Producto</h5>

<div class="card card-dark shadow-lg mx-auto" style="max-width: 900px;">
  <div class="card-body p-4">

    <div class="d-flex align-items-center justify-content-between mb-3">
      <h6 class="mb-0 text-light">
        <?= htmlspecialchars($old['nombre'] ?? 'Producto') ?>
      </h6>

      <span class="badge bg-secondary">
        Código: <?= htmlspecialchars($old['id'] ?? '') ?>
      </span>
    </div>

    <hr class="text-secondary">

    <div class="row g-3">
      <div class="col-md-6">
        <div class="text-secondary small">Nombre</div>
        <div class="text-light fw-semibold">
          <?= htmlspecialchars($old['nombre'] ?? '') ?>
        </div>
      </div>

      <div class="col-md-6">
        <div class="text-secondary small">Nombre corto</div>
        <div class="text-light fw-semibold">
          <?= htmlspecialchars($old['nombre_corto'] ?? '') ?>
        </div>
      </div>

      <div class="col-md-6">
        <div class="text-secondary small">Familia</div>
        <div class="text-light fw-semibold">
          <?= htmlspecialchars($old['familia_nombre'] ?? '—') ?>
          <?php if (!empty($old['familia'])): ?>
            <span class="text-secondary fw-normal">
              (<?= htmlspecialchars($old['familia']) ?>)
            </span>
          <?php endif; ?>
        </div>
      </div>

      <div class="col-md-6">
        <div class="text-secondary small">PVP (€)</div>
        <div class="text-light fw-semibold">
          <?= htmlspecialchars($old['pvp'] ?? '') ?>
        </div>
      </div>

      <div class="col-12">
        <div class="text-secondary small mb-1">Descripción</div>

        <div class="bg-dark border border-secondary rounded p-3 text-light" style="min-height: 120px;">
          <?php if (!empty($old['descripcion'])): ?>
            <?= nl2br(htmlspecialchars($old['descripcion'])) ?>
          <?php else: ?>
            <span class="text-secondary">Sin descripción.</span>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="mt-4 text-center">
      <a href="listado.php" class="btn btn-detail px-4">Volver</a>
    </div>

  </div>
</div>
