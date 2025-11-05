<!doctype html>
<html lang="es">
<meta charset="utf-8">
<title>Registro de cliente</title>
<body style="font-family:sans-serif; margin:2rem auto; max-width:600px">

<h1>Ultimate PHP – Registro de clientes</h1>
<p>Introduce los datos del cliente</p>

<?php
// Comprobamos si el formulario se ha enviado
if (isset($_POST['enviar'])) {

    // Obtenemos los valores enviados
    $nombre   = trim($_POST['nombre'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');

    // Validación sencilla: ambos campos deben tener contenido
    if ($nombre === '' || $telefono === '') {
        echo '<p style="color:red;">Debes introducir un nombre y un teléfono.</p>';
    } else {
        echo '<h2>Cliente registrado:</h2>';
        echo '<p><strong>Nombre:</strong> ' . $nombre . '</p>';
        echo '<p><strong>Teléfono:</strong> ' . $telefono . '</p>';
    }
}
?>

<form method="post" action="" autocomplete="off">
    <p>
        <label>Nombre:<br>
            <input type="text" name="nombre" required>
        </label>
    </p>
    <p>
        <label>Teléfono:<br>
            <input type="text" name="telefono" required>
        </label>
    </p>
    <p>
        <button type="submit" name="enviar">Registrar</button>
    </p>
</form>

</body>
</html>
