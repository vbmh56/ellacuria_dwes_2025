<?php
// views/partials/messages_get.php
// Mensajes de error y éxito basados en claves
// pasadas a través de variables $error_message y $ok_message.

$mensajes_error = [
    'no_data' => 'Debes guardar primero las preferencias.'
];

$mensajes_ok = [
    'preferences_saved' => 'Preferencias guardadas correctamente.'    
];

$error_key = $error_message ?? null;
$ok_key    = $ok_message ?? null;
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
