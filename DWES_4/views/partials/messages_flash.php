<?php
// views/partials/messages_flash.php

$mensajes_error = [
    'no_data' => 'Debes guardar primero las preferencias.'
];

$mensajes_ok = [
    'preferences_saved' => 'Preferencias guardadas correctamente.',
    'preferences_deleted' => 'Preferencias borradas correctamente.'
];

$error_key = $_SESSION['flash_error'] ?? null;
$ok_key    = $_SESSION['flash_ok'] ?? null;
?>

<?php if ($error_key && isset($mensajes_error[$error_key])): ?>
  <div class="alert alert-danger">
    <?= htmlspecialchars($mensajes_error[$error_key]) ?>
  </div>
  <?php unset($_SESSION['flash_error']); ?>
<?php endif; ?>

<?php if ($ok_key && isset($mensajes_ok[$ok_key])): ?>
  <div class="alert alert-success">
    <?= htmlspecialchars($mensajes_ok[$ok_key]) ?>
  </div>
   <?php unset($_SESSION['flash_ok']); ?>
<?php endif; ?>
