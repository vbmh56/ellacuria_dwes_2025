<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Gestión de Productos</title>

  <!-- Bootstrap 5.3 (CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../style.css" rel="stylesheet">
</head>

<body>
  <main class="container py-5">

    <?php include __DIR__ . '/partials/header.php'; ?>
    
     <?php
      // Aquí se inserta el contenido específico de cada página
      include $view;
      ?>
    
    <?php include __DIR__ . '/partials/footer.php'; ?>

  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
