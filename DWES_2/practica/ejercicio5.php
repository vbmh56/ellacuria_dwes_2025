<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesamiento de Array con Funciones Modernas</title>
</head>
<body>

    <h1>Array Personas - Nº total de registros</h1>
    <?php 
        $personas = ['Paco Pérez', 'Juan López', 'Mateus Asato', 'Anastasia Sainz'];        
    
        echo "El número total de personas es: " . count($personas);
        
    ?>
    <h1>Nombres en Mayúsculas - Array map + función flecha</h1>
    <?php 
        $personasUpperCase = array_map(fn($persona) => strtoupper($persona), $personas);
        foreach($personasUpperCase as $persona):            
    ?>
        <p><?php echo $persona;?></p>
    <?php endforeach; ?>
    <h1>Nombres que Empiezan por A - Array filter + función flecha</h1>
    <?php 
        $empiezanPorA = array_filter($personas, fn($persona) => strtoupper($persona[0]) === 'A');
        foreach($empiezanPorA as $personaEmpiezaPorA)
        {
            echo "<p>" . $personaEmpiezaPorA . "</p>";
        }
    ?>
</body>
</html>