<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Tarea 3 – Validación de varios registros de clientes</title>
</head>
<body style="font-family:sans-serif; margin:2rem auto; max-width:700px">

<h1>Registro múltiple de clientes con validación</h1>
<p>Introduce los datos de varios clientes. Se mostrarán los registros correctos y los que tengan errores.</p>

<?php
if (isset($_POST['registrar'])) {

    // Recogemos los datos enviados
    $clientes = $_POST['clientes'] ?? [];

    // Arrays para separar registros válidos y erróneos
    $validos = [];
    $errores = [];

    // Recorremos cada registro del array
    foreach ($clientes as $indice => $c) {

        $nombre   = trim($c['nombre'] ?? '');
        $telefono = trim($c['telefono'] ?? '');

        // Comprobamos los casos posibles
        if ($nombre === '' && $telefono === '') {
            $errores[] = "El cliente " . ($indice + 1) . " no tiene ningún dato.";
        } elseif ($nombre === '') {
            $errores[] = "Falta el nombre del cliente " . ($indice + 1) . ".";
        } elseif ($telefono === '') {
            $errores[] = "Falta el teléfono del cliente " . ($indice + 1) . ".";
        } else {
            $validos[$indice] = [$nombre, $telefono];
        }
    }

    // Mostramos resultados
    echo "<h2>Resultado del registro</h2>";

    if (count($validos) > 0) {
        echo "<h3>Clientes registrados correctamente:</h3>";
        echo "<ul>";
        foreach ($validos as $v) {
            echo "<li>Nombre: <b>$v[0]</b> — Teléfono: <b>$v[1]</b></li>";
        }
        echo "</ul>";
    }

    if (count($errores) > 0) {
        echo "<h3>Registros con errores:</h3>";
        echo "<ul style='color:red;'>";
        foreach ($errores as $e) {
            echo "<li>$e</li>";
        }
        echo "</ul>";
    }

    if (count($validos) === 0 && count($errores) === 0) {
        echo "<p>No se han enviado datos.</p>";
    }
}
?>

<form method="post" action="">
  <?php for ($i = 0; $i < 3; $i++): ?>
    <fieldset style="margin-bottom: 1em;">
      <legend>Cliente <?= $i + 1 ?></legend>
      <p>
        <label>Nombre:<br>
          <input type="text" name="clientes[<?= $i ?>][nombre]">
        </label>
      </p>
      <p>
        <label>Teléfono:<br>
          <input type="text" name="clientes[<?= $i ?>][telefono]">
        </label>
      </p>
    </fieldset>
  <?php endfor; ?>

  <p><button type="submit" name="registrar">Registrar clientes</button></p>
</form>

</body>
</html>
