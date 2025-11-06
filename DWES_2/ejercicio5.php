<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Tarea 5 – Procesamiento de arrays con funciones modernas</title>
</head>
<body style="font-family:sans-serif; max-width:800px; margin:2rem auto;">

<h1>Procesamiento de arrays con funciones modernas</h1>

<?php
// Array base
$personas = ["María López", "Juan Pérez", "Laura Gómez", "Ana Ruiz", "Pedro Gálvez"];

// Número total de elementos
echo "<p>Total de personas: <b>" . count($personas) . "</b></p>";

// Transformación con array_map y función flecha (uso de mb_strtoupper para acentos)
$mayusculas = array_map(fn($nombre) => mb_strtoupper($nombre, 'UTF-8'), $personas);

echo "<h2>Nombres en mayúsculas (array_map + función flecha)</h2>";
echo "<ul>";
foreach ($mayusculas as $p) {
    echo "<li>$p</li>";
}
echo "</ul>";

// Filtrado con array_filter y función flecha
$empiezanPorA = array_filter($personas, fn($n) => mb_strtoupper($n[0], 'UTF-8') === 'A');

echo "<h2>Nombres que comienzan por A (array_filter + función flecha)</h2>";
if (count($empiezanPorA) > 0) {
    echo "<ul>";
    foreach ($empiezanPorA as $p) {
        echo "<li>$p</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No hay nombres que comiencen por A.</p>";
}

// Ejemplo adicional: añadir texto con map
$conMensaje = array_map(fn($n) => "Cliente registrado: $n", $personas);

echo "<h2>Transformación con texto añadido</h2>";
echo "<ul>";
foreach ($conMensaje as $p) {
    echo "<li>$p</li>";
}
echo "</ul>";
?>

</body>
</html>
