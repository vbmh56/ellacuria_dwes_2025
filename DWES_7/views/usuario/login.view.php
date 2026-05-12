<div class="row justify-content-center">
  <div class="col-12 col-sm-10 col-md-7 col-lg-5">
    <div class="card shadow-lg">
      <div class="card-header bg-light">
        <h2 class="h4 mb-0">Login</h2>
      </div>

      <div class="card-body">
        <?php include __DIR__ . '/../partials/errors.php'; ?>

        <form method="post" action="login.php" novalidate>
          <div class="mb-3">
            <label class="form-label" for="usuario">Usuario</label>
            <input
              class="form-control"
              id="usuario"
              name="usuario"
              type="text"
              value="<?= htmlspecialchars($usuario) ?>"
              autocomplete="username"
              required
            >
          </div>

          <div class="mb-4">
            <label class="form-label" for="password">Contrasena</label>
            <input
              class="form-control"
              id="password"
              name="password"
              type="password"
              autocomplete="current-password"
              required
            >
          </div>

          <div class="d-flex justify-content-end">
            <button class="btn btn-primary px-4" type="submit">Entrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
