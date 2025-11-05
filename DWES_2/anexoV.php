<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio</title>
</head>
<body>
    <table align="center" border="1" cellpadding="2" cellspacing="2">
        <tbody style="background-color: grey; text-align: center; font-weight: bold">
            <tr>
                <td>Clave</td>
                <td>Valor</td>
            </tr>
        </tbody>
        <tbody>
        <?php
            foreach ($_SERVER as $clave => $valor) {
                echo "<tr>";
                echo "<td>$clave</td>";
                echo "<td>$valor</td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
</body>
</html>
