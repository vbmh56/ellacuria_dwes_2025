

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

    //4. ¿Es PHP Case Sensitive en sus comandos? haz una prueba que lo demuestre
    EchO "Imprime igual usando EchO";
    echo "\n";

    //5. Haz una función que modifique el valor de una variable global y saca el valor antiguo y el nuevo por pantalla
    $nombre = "Pedro";
    $old_value = $nombre;
    function cambia_nombre(){
        global $nombre;
        $nombre = "Paco";
    }
    cambia_nombre();
    echo "El antigüo valor era: $old_value \n";
    echo "El nuevo valor es: $nombre";
    echo "\n";

    //6. Declara dos variables numéricas y comprueba si ambas son enteros en una sola línea de código, sacando el resultado por pantalla
    $n1 = 4;
    $n2 = 5;
    $res = is_int($n1) && is_int($n2);    
    echo "¿Son $n1 y $n2 enteros? La respuesta es: ";
    var_dump($res);

    //7. Declara dos variables numéricas, súmale uno a una de ellas y asígna su valor a la otra antes de la suma en una sola línea.
    //   Muestra el resultado por pantalla
    $n1 = 5;
    $n2 = $n1++;
    echo "El valor de la variable inicial es $n1, y el valor asignado antes de la suma es $n2 \n";

    //8. Haz una función contador que sume uno a una variable y mantenga su valor en llamadas sucesivas. 
    // Muestra el resultado por pantalla de cada llamada
    function contador(){
        static $n1 = 0;
        echo "contador es $n1 \n";
        $n1++;
    }
    contador();
    contador();
    contador();


?>