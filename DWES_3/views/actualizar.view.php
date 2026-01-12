
<h5 class="page-title text-center text-dark mb-4">Actualizar Producto</h5>

<?php include __DIR__ . '/partials/errors.php'; ?>

<div class="card card-dark shadow-lg mx-auto" style="max-width: 900px;">
  <div class="card-body p-4">

    <form method="post" action="crear.php">
      <div class="row g-3">

        <div class="col-md-6">
          <label class="form-label text-light">Nombre</label>
          <input 
            type="text" 
            name="nombre" 
            class="form-control" 
            placeholder="Nombre" 
            required
            value="<?= htmlspecialchars($old['nombre'] ?? '') ?>">
        </div>

        <div class="col-md-6">
          <label class="form-label text-light">Nombre Corto</label>
          <input 
            type="text" 
            name="nombre_corto" 
            class="form-control" 
            placeholder="Nombre Corto" 
            required
            value="<?= htmlspecialchars($old['nombre_corto'] ?? '') ?>">
        </div>

        <div class="col-md-6">
          <label class="form-label text-light">Precio (€)</label>
          <input 
            type="number" 
            name="pvp" 
            class="form-control" 
            placeholder="Precio (€)" 
            step="0.01" 
            min="0" 
            required
            value="<?= htmlspecialchars($old['pvp'] ?? '') ?>">
        </div>

        <div class="col-md-6">
          <label class="form-label text-light">Familia</label>
          <select name="familia" class="form-select" required>
            <option value="">-- Selecciona una familia --</option>
                <?php foreach ($familias as $familia): ?>
                    <option 
                        value="<?= htmlspecialchars($familia['cod']) ?>">
                        <?= (($old['familia'] ?? '') === $familia['cod']) ? 'selected' : '' ?>
                        <?= htmlspecialchars($familia['nombre']) ?>
                    </option>
                <?php endforeach; ?>
          </select>
        </div>
    
        <div class="col-12">
          <label class="form-label text-light">Descripción</label>
          <textarea name="descripcion" class="form-control" rows="8" placeholder="Descripción">
            <?= htmlspecialchars($old['descripcion'] ?? '') ?>
          </textarea>
        </div>

        <div class="col-12 d-flex gap-2 mt-2">
          <button type="submit" class="btn btn-primary">Actualizar</button>          
          <a href="listado.php" class="btn btn-detail">Volver</a>
        </div>

      </div>
    </form>

  </div>
</div>
