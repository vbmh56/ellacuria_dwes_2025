<?php if (!empty($errores)): ?>
  <div class="alert alert-danger">
    <ul class="mb-0">
      <?php foreach ($errores as $err): ?>
        <li><?= htmlspecialchars($err) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>
