<?php
$host = "localhost";
$db   = "proyecto";
$user = "gestor";
$pass = "secreto";

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$conProyecto = new PDO($dsn, $user, $pass);
$conProyecto->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- css para usar Bootstrap -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          crossorigin="anonymous">
    <title>Ejercicio Tema 3 PDO</title>
</head>
<body style="background: antiquewhite">
<h3 class="text-center mt-2 font-weight-bold">Ejercicio Transacción con PDO</h3>
<div class="container mt-3">
    <?php
    // Definimos la variable para comprobar ejecución.
    $isOk = true;

    // Iniciamos la transacción
    $conProyecto->beginTransaction();

    $update = "UPDATE stocks 
               SET unidades = 1 
               WHERE producto = (SELECT id FROM productos WHERE nombre_corto = 'PAPYRE62GB')
                 AND tienda = 1";

    if (!$conProyecto->exec($update)) {
        $isOk = false;
    }

    $insert = "INSERT INTO stocks
               SELECT id, 2, 1 
               FROM productos 
               WHERE nombre_corto = 'PAPYRE62GB'"; 
    // equivalente a: INSERT INTO stocks VALUES(15, 2, 1) si el id fuera 15

    if (!$conProyecto->exec($insert)) {
        $isOk = false;
    }

    if ($isOk) {
        $conProyecto->commit();
        echo "<p class='text-primary font-weight-bold'>Los cambios se realizaron correctamente.</p>";
    } else {
        $conProyecto->rollBack();
        echo "<p class='text-danger font-weight-bold'>No se han podido realizar los cambios.</p>";
    }

    $conProyecto = null;
    ?>
</div>
</body>
</html>
