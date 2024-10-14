<html>
    <head>
        <title>Ejercicio 4</title>
    </head>
    <body>
        <p>Calculo de numero de vocales de la frase </p>

        <?php

            $vocales = ["a", "e", "i", "o", "u"];

            $cadena = "Hola que tal estas";
            echo $cadena, "<br>";

            $contadorVocales = 0;

            for ($i = 0; $i < strlen($cadena); $i++){
                foreach ($vocales as $vocal){
                    if ($cadena[$i] === $vocal){
                        $contadorVocales++;
                    }
                }
            }

            echo "Tienes ", $contadorVocales, " vocales";

        ?>

    </body>
</html>