<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Ultimate PHP – Registro múltiple de clientes</title>
</head>
<body style="font-family:sans-serif; margin:2rem auto; max-width:700px">

<h1>Registro de varios clientes</h1>
<p>Introduce los datos de hasta tres clientes.</p>

<?php
if (isset($_POST['registrar'])) {
    $clientes = $_POST['clientes'] ?? [];

    echo '<h2>Clientes registrados:</h2>';
    echo '<ul>';

    foreach ($clientes as $c) {
        $nombre   = trim($c['nombre'] ?? '');
        $telefono = trim($c['telefono'] ?? '');

        if ($nombre !== '' && $telefono !== '') {
            echo '<li><strong>' . $nombre . '</strong> — ' . $telefono . '</li>';
        }
    }

    echo '</ul>';
}
?>

<form method="post" action="">
    <?php for ($i = 0; $i < 3; $i++): ?>
        <fieldset style="margin-bottom: 1em;">
            <legend>Cliente <?= $i + 1 ?></legend>
            <p>
                <label>Nombre:<br>
                    <input type="text" name="clientes[<?= $i ?>][nombre]" required>
                </label>
            </p>
            <p>
                <label>Teléfono:<br>
                    <input type="text" name="clientes[<?= $i ?>][telefono]" required>
                </label>
            </p>
        </fieldset>
    <?php endfor; ?>

    <p><button type="submit" name="registrar">Registrar clientes</button></p>
</form>

</body>
</html>
