

<?php
    //Realiza los siguientes ejercicios. Haz que la salida por pantalla tenga un salto de línea entre los ejercicios

    //1. Saca por pantalla un string con una variable dentro
    $test = "This is a string";
    echo "La cadena es: $test";
    echo "\n";

    //2. Haz una suma de dos variables de tal manera que una de ellas cambie de tipo de forma implícita y saca el resultado por pantalla
    $n1 = 3;
    $n2 = 2.3;
    $res = $n1 + $n2;
    echo "El resultado es: $res";
    echo "\n";

    //3. Realiza el ejercicio anterior de nuevo, pero ahora evita con una conversión explícita que la variable cambie de tipo
    $n3 = 3;
    $n4 = 2.3;
    $res = $n3 + (int)$n4;
    echo "El resultado es: $res";
    echo "\n";


?>