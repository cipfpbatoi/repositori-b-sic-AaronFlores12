<html>
    <head>
        <title>Ejercicio 3</title>
    </head>
    <body>
        <p>Mediana de un array de 5 numeros</p>

        <?php

            $numeros = [1,2,3,4,5];
            $sumaNumeros = 0;
            $medianaContador = 0;

            echo "Numeros: ";


            foreach ($numeros as $numero){
                echo $numero, " ";
                $sumaNumeros += $numero;
                $medianaContador++;
            }

            $calculoMediana = $sumaNumeros / $medianaContador;

            echo "<br>", "La mediana de los numeros es: ", $calculoMediana;

        ?>

    </body>
</html>