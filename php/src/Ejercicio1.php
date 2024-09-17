<html>
    <head>
        <title>
            Tabla de numeros
        </title>
    </head>
    <body>
        <h1>Operaciones varias</h1>
        <?php

        $a = 10;
        $b = 5;

        function suma($a, $b){
            return $a + $b;
        }

        function resta($a, $b){
            if ($a > $b){
                return $a - $b;
            } else {
                return $b - $a;
            }
        }

        function multiplicacion($a, $b){
            return $a * $b;
        }

        function division($a, $b){
            if ($a > $b){
                return $a / $b;
            } else {
                return $b / $a;
            }
        }

        
        ?>
        
        <style>
            table, th, td {
            border:1px solid black;
            }
        </style>

        <table>
            <tr>
                <th>Operacion</th>
                <th>Resultado</th>
            </tr>
            <tr>
                <td><? echo "Suma de $a + $b"; ?></td>
                <td><? echo suma($a, $b); ?></td>
            </tr>
            <tr>
                <td><? echo "Resta entre $a + $b"; ?></td>
                <td><? echo resta($a, $b); ?></td>
            </tr>
            <tr>
                <td><? echo "Multiplicacion de $a + $b"; ?></td>
                <td><? echo multiplicacion($a, $b); ?></td>
            </tr>
            <tr>
                <td><? echo "Division de $a + $b"; ?></td>
                <td><? echo division($a, $b); ?></td>
            </tr>
        </table>
    </body>
</html>