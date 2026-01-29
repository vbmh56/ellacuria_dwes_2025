<?php
// views/partials/messages_get.php

$mensajes_error = [
    'no_existe'   => 'Debes guardar primero las preferencias.'
];

$mensajes_ok = [
    'ok'      => 'Preferencias guardadas correctamente.'    
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
