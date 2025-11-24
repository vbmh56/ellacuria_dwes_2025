<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parámetros en GET</title>
</head>
<body>
    <?php 
        $nombre = $_GET['nombre'] ?? '';
        $edad = $_GET['edad'] ?? '';        

        if ($nombre !== '' &&  ($edad !== '' && is_numeric($edad)) )
            echo "<p>Hola " . $nombre . ". Tienes " . $edad . "años.</p>";
        if ($nombre == '')
            echo "<p style='color:red'>Falta el nombre</p>";
        if ($edad == '')
            echo "<p style='color:red'>Falta la edad o no es numérica</p>";
    ?>    
    <hr>
    <h2>Enlaces de prueba</h2>
    <ul>
        <li><a href="?nombre=Laura&edad=25">?nombre=Laura&edad=25</a></li>
        <li><a href="?nombre=Carlos&edad=40">?nombre=Carlos&edad=40</a></li>
        <li><a href="?nombre=Ana">?nombre=Ana</a> (falta edad)</li>
        <li><a href="?edad=18">?edad=18</a> (falta nombre)</li>
        <li><a href="?nombre=Pepe&edad=abc">?nombre=Pepe&edad=abc</a> (edad no numérica)</li>
    </ul>
</body>
</html>