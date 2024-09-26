<html>
    <head>
        <title>Ejercicio 5</title>
    </head>
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
    <body>
        <p>Tablas de multiplicar</p>

        <?php
            $tablas = [
                "uno" => 1,
                "dos" => 2,
                "tres" => 3,
                "cuatro" => 4,
                "cinco" => 5
            ];

            foreach ($tablas as $clave => $valor) {
                echo "<h3>Tabla del $clave</h3>";
                echo "<table>";
                for ($i = 1; $i <= 10; $i++) {
                    echo "<tr>";
                    echo "<td>" . $valor . " x " . $i . "</td>";
                    echo "<td>" . ($valor * $i) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        ?>

    </body>
</html>
