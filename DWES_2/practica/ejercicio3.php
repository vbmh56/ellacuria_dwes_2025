<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Varios Clientes</title>
</head>
<body style="font-family:sans-serif; margin:2rem auto; max-width:600px">
    <h1>Registro de Varios Clientes</h1>

    <form id="formClientes" action="" method="post">            
        <?php 
            $nClientes = 3; 
            for ($i = 0; $i < $nClientes; $i++): 
        ?>
            <fieldset style="margin-top: 1rem;">
                <legend>Cliente <?= $i + 1 ?></legend>

                <p>
                    <label for="nombre_<?= $i ?>">Nombre</label>
                    <input 
                        type="text" 
                        id="nombre_<?= $i ?>" 
                        name="clientes[<?= $i ?>][nombre]"
                    />
                </p>

                <p>
                    <label for="telefono_<?= $i ?>">Teléfono</label>
                    <input 
                        type="text" 
                        id="telefono_<?= $i ?>" 
                        name="clientes[<?= $i ?>][telefono]"
                    />
                </p>
            </fieldset>
        <?php endfor; ?>
        <p>
            <button type="submit" name="enviar">Registrar</button>
        </p>
    </form>
</body>
</html>

<?php
    function printValidClient($i, $nombre, $telefono)
    {        
        $nombre = trim($nombre ?? '');
        $telefono = trim($telefono ?? '');
        
        echo "<h3>Cliente " . $i . "</h3>";       
        echo "<p><strong>Nombre:</strong> " . $nombre . "</p>";
        echo "<p><strong>Telefono:</strong> " . $telefono . "</p>";            
    }

    function printInvalidClient($i, $nombre, $telefono)
    {        
        $nombre = trim($nombre ?? '');
        $telefono = trim($telefono ?? '');
                     
        if($nombre === '')
        {
            echo "<p style='color:red'>El cliente ". $i + 1 ." no tiene un nombre</p>";            
        }
        if($telefono === '')
        {
            echo "<p style='color:red'>El cliente ". $i + 1 ." no tiene un teléfono</p>";         
        }
    }


    function isValidClient($client)
    {
        $nombre = trim($client['nombre'] ?? '');
        $telefono = trim($client['telefono'] ?? '');

        if ($nombre === '' || $telefono === '')
            return false;
        return true;
    }


    if (isset($_POST['enviar']))
    {        
        $clientes = $_POST['clientes'] ?? [];        

        echo "<h2 style='color:green'>Clientes Válidos</h2>";
        foreach($clientes as $i => $cliente)
        {
            if (isValidClient($cliente))
                printValidClient($i, $cliente['nombre'], $cliente['telefono']);
        } 
        
        echo "<h2 style='color:red'>Errores</h2>";
        foreach($clientes as $i => $cliente)
        {
            if (!isValidClient($cliente))
                printInvalidClient($i, $cliente['nombre'], $cliente['telefono']);
        }  
    }

?>

