<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Tarea 4 – Parámetros en la URL (GET)</title>
</head>
<body style="font-family:sans-serif; max-width:700px; margin:2rem auto;">

<h1>Saludo con parámetros GET</h1>

<?php
$hayNombre = isset($_GET['nombre']);
$hayEdad   = isset($_GET['edad']);

if ($hayNombre && $hayEdad) {
    $nombre = trim($_GET['nombre']);
    $edad   = trim($_GET['edad']);

    if ($nombre === '') {
        echo "<p style='color:red;'>El parámetro nombre está vacío.</p>";
    } elseif ($edad === '' || !is_numeric($edad)) {
        echo "<p style='color:red;'>El parámetro edad falta o no es numérico.</p>";
    } else {
        echo "<p>Hola $nombre, tienes $edad años.</p>";
    }
} else {
    if (!$hayNombre) echo "<p style='color:red;'>Falta el parámetro nombre.</p>";
    if (!$hayEdad)   echo "<p style='color:red;'>Falta el parámetro edad.</p>";
}
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
