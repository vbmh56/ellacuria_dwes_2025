<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formularios</title>
</head>
<body style="background: gainsboro">
    <fieldset style="width:40%; margin:auto">
        <legend style="font-weight: bold">Datos</legend>

        <form id="form1" action="procesa.php" method="POST">
            <p>
                Nombre:&nbsp;
                <input type="text" name="nombre" placeholder="Nombre" required>
            </p>

            <fieldset style="width:50%">
                <legend style="font-weight: bold">Elige Módulos</legend>
                <p>
                    <input type="checkbox" name="modulo[]" value="DWESE">
                    &nbsp;Desarrollo Web en Entorno Servidor.
                </p>
                <p>
                    <input type="checkbox" name="modulo[]" value="DWEC">
                    &nbsp;Desarrollo Web en Entorno Cliente.
                </p>
            </fieldset>

            <div style="text-align: center; margin-top: 5px">
                <input type="submit" value="Enviar" name="enviar">
                &nbsp;&nbsp;
                <input type="reset" value="Limpiar">
            </div>
        </form>
    </fieldset>
</body>
</html>
