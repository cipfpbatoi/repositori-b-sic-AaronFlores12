<html>
    <head>
        <title>Tabla de numeros pares</title>
    </head>
    <body>
        <h1>Impresion de numeros pares del 1 al 20</h1>

        <?php
            $a = 0;

            for ($i = 0; $i < 21; $i++) {
                if ($i % 2 == 0){
                    echo $i ,"<br>";
                }
            }

            while ($a <= 20){
                if ($a % 2 == 0){
                    echo $a ,"<br>";
                }
                $a++;
            }

        ?>
    </body>
</html>