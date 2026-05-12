<header class="mb-4">
  <h1 class="page-title text-center text-dark mb-3">My Product App</h1>

  <?php if (isset($_SESSION['usuario'])): ?>
    <div class="d-flex justify-content-center align-items-center gap-3">
      <span class="text-dark">
        Usuario: <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong>
      </span>
      <a class="btn btn-sm btn-outline-dark" href="logout.php">Cerrar sesion</a>
    </div>
  <?php endif; ?>
</header>
