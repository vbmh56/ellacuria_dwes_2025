
<h5 class="page-title text-center text-dark mb-4">Preferencias del usuario</h5>

<?php include __DIR__ . '/../partials/errors.php'; ?>

<div class="card card-dark shadow-lg mx-auto" style="max-width: 520px;">
  <div class="card-body p-4">

    <?php include __DIR__ . '/../partials/messages_flash.php'; ?>

    <form method="post" action="preferencias.php">
      <div class="row g-3">

        <!-- Idioma -->
        <div class="col-12">
          <label class="form-label text-light">Idioma</label>
          <select name="idioma" class="form-select" required>
            <?php
              $idioma = $old['idioma'] ?? '';
            ?>
            <option value="">-- Selecciona un idioma --</option>
            <option value="ingles"  <?= ($idioma === 'ingles')  ? 'selected' : '' ?>>inglés</option>
            <option value="espanol" <?= ($idioma === 'espanol') ? 'selected' : '' ?>>español</option>
          </select>
        </div>

        <!-- Perfil público -->
        <div class="col-12">
          <label class="form-label text-light">Perfil público</label>
          <select name="perfil_publico" class="form-select" required>
            <?php
              $perfil = $old['perfil_publico'] ?? '';
            ?>
            <option value="">-- Selecciona una opción --</option>
            <option value="si" <?= ($perfil === 'si') ? 'selected' : '' ?>>sí</option>
            <option value="no" <?= ($perfil === 'no') ? 'selected' : '' ?>>no</option>
          </select>
        </div>

        <!-- Zona horaria -->
        <div class="col-12">
          <label class="form-label text-light">Zona horaria</label>
          <select name="zona_horaria" class="form-select" required>
            <?php
              $zona = $old['zona_horaria'] ?? '';
              $zonas = ['GMT-2','GMT-1','GMT','GMT+1','GMT+2'];
            ?>
            <option value="">-- Selecciona una zona horaria --</option>
            <?php foreach ($zonas as $z): ?>
              <option value="<?= htmlspecialchars($z) ?>" <?= ($zona === $z) ? 'selected' : '' ?>>
                <?= htmlspecialchars($z) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Botones -->
        <div class="col-12 d-flex justify-content-between align-items-center mt-4">
  
          <!-- Izquierda: Borrar -->
          <a href="borrar.php" class="btn btn-danger">
            Borrar
          </a>

          <!-- Derecha: Mostrar + Guardar -->
          <div class="d-flex gap-3">
            <a href="mostrar.php" class="btn btn-detail">
              Mostrar
            </a>
            <button type="submit" class="btn btn-primary">
              Guardar
            </button>
          </div>
        </div>
      </div>
    </form>

  </div>
</div>
