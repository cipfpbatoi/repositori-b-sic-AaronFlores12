<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /index.php");
    exit();
}

include "funciones.php";

if (!isset($_SESSION["palabra"])) {
    $_SESSION["palabra"] = "buenas";
    $_SESSION["guiones"] = inicializarGuiones($_SESSION["palabra"]);
    $_SESSION["letrasAdivinadas"] = [];
    $_SESSION["intentos"] = 6;
}

$palabra = $_SESSION["palabra"];
$guiones = $_SESSION["guiones"];
$letrasAdivinadas = $_SESSION["letrasAdivinadas"];
$intentos = $_SESSION["intentos"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['reiniciar'])) {
        reiniciarJuego();
        header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    }

    $letra = htmlspecialchars($_POST['letra']);

    if (comprobarLetra($palabra, $letra, $guiones)) {
        $_SESSION["guiones"] = $guiones;

        if (!in_array('_', $guiones)) {
            $_SESSION["mensaje"] = "¡Felicidades! Has adivinado la palabra: " . $palabra;
            reiniciarJuego();
            header("Location: " . $_SERVER["PHP_SELF"]);
            exit();
        }
    } else {
        $_SESSION["letrasAdivinadas"] = $letrasAdivinadas;
        $_SESSION["intentos"] = --$intentos;
    }

    if ($intentos == 0) {
        $_SESSION["mensaje"] = "Has perdido, la palabra era " . $palabra;
        reiniciarJuego();
        header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    }
}
?>

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

    <p>Bienvenido, <?php echo $_SESSION['user']; ?>!</p>

    <?php
    if (isset($_SESSION["mensaje"])) {
        echo "<p class='correcto'>" . $_SESSION["mensaje"] . "</p>";
        unset($_SESSION["mensaje"]); // Limpiar el mensaje después de mostrarlo
    }
    ?>

    <p><?php imprimirGuiones($guiones); ?></p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <br>
        <label for="letra">Letra:</label>
        <input type="text" id="letra" name="letra" required maxlength="1"><br><br>
        <input type="submit" value="Enviar">
    </form>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="submit" name="reiniciar" value="Reiniciar">
    </form>

    <form action="../logout.php">
        <input type="submit" value="Cerrar sesión">
    </form>
</body>

</html>