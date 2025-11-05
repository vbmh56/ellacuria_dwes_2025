<?php
if (isset($_POST['agenda'])) //si hemos enviado agenda rellenamos el array
    $agenda = $_POST['agenda'];
else  // si no, creamos  $agenda como un array vacío
    $agenda = array();
?>
<!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 2 : Características del Lenguaje PHP -->
<!-- Solución a la tarea -->
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea Unidad2</title>
    <style type="text/css">
        label {
            display: inline-block;
            width: 140px;
            height: 20px;
        }

        form input {
            height: 20px;
        }

        .agenda {
            background: rgba(0, 0, 0, 0);
            border: none;
            outline: none;
            color: blue;
            font-weight: bold;
            margin-right: 2px;
        }
    </style>
</head>

<body style="background:#FA8072">
<?php
if (isset($_POST['enviar'])) {
    //Se recomienda trim() de las cadenas (limpiar de espacios en blanco al principio y al fin)
    $nombre = trim($_POST['nombre']);
    $telefono = trim($_POST['telefono']);
    if (strlen($nombre) == 0) {
        echo "<p style='color:white; font-weight:bold;'>El Nombre es 0bligatorio!!!</p>";
    } else {
        $nombre = ucwords($nombre); //Ponemos en mayúsculas la primera letra de cada palabra.
        $agenda[$nombre] = $telefono;
        if (strlen($telefono) == 0) unset($agenda[$nombre]);
    }
}
if (isset($_GET['limpiar']) && count($agenda) > 0) {
    unset($agenda);
    $agenda = array();
}

?>
<!-- Mostramos los contactos de la agenda -->
<h3 style="text-align:center;">Agenda</h3>
<?php
if (count($agenda) != 0) {
    echo "<fieldset style='width:40%; margin:auto; padding:15px;margin-bottom: 10px'>";
    echo "<legend>Datos Agenda</legend>";

    foreach ($agenda as $n => $t) {
        echo "<input type='text' value='$n' size='18px' disabled class='agenda'>";
        echo "<input type='text' value='$t' size='12px' disabled class='agenda'><br>";

    }
    echo "</ul>";
    echo "</fieldset>";
}
?>

<!-- Creamos el formulario de introducción de un nuevo contacto -->

<fieldset style="width:40%; margin:auto; padding:15px;">
    <legend>Nuevo Contacto</legend>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <!-- Metemos los contactos ya existentes ocultos en el formulario -->
        <?php
        foreach ($agenda as $k => $v) {
            echo "<input type='hidden' name=\"agenda[$k]\" value='$v'>";
        }
        ?>
        <input type="hidden" name="action" value="nuevo"/>
        <label style="font-weight: bold; color:blue;">Nombre:</label>
        <input type="text" name="nombre" maxlength="18" required><br/>
        <label style="font-weight: bold; color:blue;">Teléfono:</label>
        <input type="text" name="telefono"><br><br>
        <input type="submit" value="Añadir Contacto" style="margin-right:3px; height:28px; color:blue" name='enviar'/>
        <input type="reset" value="Limpiar Campos" style="height:28px; color:green"/>

    </form>
</fieldset>
<?php
if (count($agenda) > 0) {
    echo <<<TEXTO
        <fieldset style="width:40%; margin:auto; padding:15px; margin-top: 10px"><legend>Vaciar Agenda</legend>
        <a href="{$_SERVER['PHP_SELF']}?limpiar=1" style="text-decoration: none">
        <button style="height: 28px; color:red">Vaciar</button></a>
        </fieldset>
        TEXTO;
}
?>

</body>
</html>