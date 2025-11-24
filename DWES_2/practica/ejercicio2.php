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

        <!-- Mezcla HTML con instrucción echo. Propenso a errores. No se detectan fallos de sintaxis en HTML -->
        <?php
        /*
            $nClientes = 3;
            for($i=0; $i < $nClientes; $i++)
            {
                echo "<fieldset style='margin-top: 1rem;'>
                        <legend>Cliente " . ($i + 1) . "</legend>
                        <p>
                            <label for='nombre'>Nombre</label>
                            <input type='text' id='nombre' name='clientes[" . $i . "][nombre]'/>
                        </p>
                        <p>
                            <label for='telefono'>Teléfono</label>
                            <input type='text' id='telefono' name='clientes[" . $i . "][telefono]'/>
                        </p>                
                    </fieldset>";
            }
        */
        ?> 
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
    function print_client($i, $nombre, $telefono)
    {        
        $nombre = trim($nombre ?? '');
        $telefono = trim($telefono ?? '');
        $error = false;

        if($nombre === '')
        {
            echo "<p style='color:red'>El cliente ". $i + 1 ." no tiene un nombre</p>";
            $error = true;
        }
        if($telefono === '')
        {
            echo "<p style='color:red'>El cliente ". $i + 1 ." no tiene un teléfono</p>";
            $error = true;
        }
        if (!$error)
        {            
            echo "<p><strong>Nombre:</strong> " . $nombre . "</p>";
            echo "<p><strong>Telefono:</strong> " . $telefono . "</p>";
        }    
    }

    if (isset($_POST['enviar']))
    {
        echo "<h2>Clientes Registrados</h2>";
        $clientes = $_POST['clientes'] ?? [];        

        foreach($clientes as $i => $cliente)
        {
            print_client($i, $cliente['nombre'], $cliente['telefono']);
        }        
        
    }

?>

