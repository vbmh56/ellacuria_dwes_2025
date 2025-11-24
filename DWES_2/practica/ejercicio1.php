<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Clientes</title>
</head>
<body style="font-family:sans-serif; margin:2rem auto; max-width:600px">
    <h1>Registro de Clientes</h1>

    <form id="formClientes" action="" method="post">    
        <fieldset>
            <legend>Cliente 1</legend>
            <p>
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre"/>
            </p>
            <p>
                <label for="telefono">Teléfono</label>
                <input type="text" id="telefono" name="telefono"/>
            </p>                
        </fieldset>
        <p>
            <button type="submit" name="enviar">Registrar</button>
        </p>
    </form>
</body>
</html>

<?php
    if (isset($_POST['enviar']))
    {
        $nombre = trim($_POST['nombre'] ?? '');
        $telefono = trim($_POST['telefono'] ?? '');

        if ($nombre === '' || $telefono === '')
        {
            echo "<p style='color:red'>Debes introducir un nombre y un teléfono</p>";
        }
        else
        {
            echo "<h2>Cliente Registrado</h2>";
            echo "<p><strong>Nombre:</strong> " . $nombre . "</p>";
            echo "<p><strong>Telefono:</strong> " . $telefono . "</p>";

        }    
    }

?>

