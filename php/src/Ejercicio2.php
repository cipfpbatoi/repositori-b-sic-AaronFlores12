<html>
    <head>
        <title>Tabla de numeros pares</title>
    </head>
    <body>
        <h1>Impresion de numeros pares del 1 al 20</h1>
        <style>
        table {
            border: 1px solid black;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 5px 10px;
            text-align: center;
        }
    </style>
        <?php
            $a = 0;
            echo "Tabla con For";
            echo "<table>";
            for ($i = 0; $i < 21; $i++) {
                if ($i % 2 == 0){
                    echo "<td>",$i ,"</td>";
                }
            }
            echo "</table>";
            echo "<br>";

            echo "Tabla con While";
            echo "<table>";
            while ($a <= 20){
                if ($a % 2 == 0){
                    echo "<td>",$a ,"</td>";
                }
                $a++;
            }
            echo "</table>";
        ?>
    </body>
</html>