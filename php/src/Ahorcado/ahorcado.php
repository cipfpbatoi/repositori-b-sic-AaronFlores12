<html>

<head>
    <title>Ahorcado</title>
    <style>
        .correcto {
            color: green;
        }

        .incorrecto {
            color: red;
        }
    </style>
</head>

<body>
    <h1>Ahorcado</h1>

    <?php
    include "funciones.php";

    $palabra = "buenas";
    $guiones = ["_", "_", "_", "_", "_", "_"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $letra = htmlspecialchars($_POST['letra']);

        if (comprobarLetra($palabra, $letra, $guiones)) {
            echo "<p class='correcto'>Letra correcta</p>";
        } else {
            echo "<p class='incorrecto'>Letra incorrecta</p>";
        }
    }
    ?>

    <p><?php imprimirGuiones($guiones); ?></p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <br>
        <label for="letra">Letra:</label>
        <input type="text" id="letra" name="letra" required><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>
