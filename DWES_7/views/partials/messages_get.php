<?php
// views/partials/messages_get.php

$mensajes_error = [
    'id_invalido' => 'El ID recibido no es válido.',
    'no_existe'   => 'El registro solicitado no existe.',
    'db'          => 'Ha ocurrido un error con la base de datos.'
];

$mensajes_ok = [
    'creado'      => 'Producto creado correctamente.',
    'actualizado' => 'Producto actualizado correctamente.',
    'borrado'     => 'Producto borrado correctamente.'
];

$error_key = $_GET['error'] ?? null;
$ok_key    = $_GET['ok'] ?? null;
?>

<?php if ($error_key && isset($mensajes_error[$error_key])): ?>
  <div class="alert alert-danger">
    <?= htmlspecialchars($mensajes_error[$error_key]) ?>
  </div>
<?php endif; ?>

<?php if ($ok_key && isset($mensajes_ok[$ok_key])): ?>
  <div class="alert alert-success">
    <?= htmlspecialchars($mensajes_ok[$ok_key]) ?>
  </div>
<?php endif; ?>
