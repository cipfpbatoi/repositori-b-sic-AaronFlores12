<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /index.php");
    exit();
}

include "funciones.php";


if (isset($_POST['reiniciar'])) {
    reiniciarJuego();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if (!isset($_SESSION['graella'])) {
    reiniciarJuego();
}

$graella = $_SESSION['graella'];
$jugadorActual = $_SESSION['jugadorActual'];

if (isset($_POST['columna']) && !$_SESSION['gameOver']) {
    $columna = $_POST['columna'];
    $graella = ferMoviment($graella, $columna, $jugadorActual);
    $_SESSION['graella'] = $graella; 

    if (comprovarVictoria($graella, $jugadorActual)) {
        echo "<p class='correcto'>¡El jugador " . ($jugadorActual == 1 ? "Roja" : "Amarilla") . " ha ganado!</p>";
        $_SESSION['gameOver'] = true;
    } elseif (comprovarTaulerPle($graella)) { 
        echo "<p class='correcto'>¡El tablero está lleno, empate!</p>";
        $_SESSION['gameOver'] = true;
    } else {
        $jugadorActual = $jugadorActual == 1 ? 2 : 1;
        $_SESSION['jugadorActual'] = $jugadorActual;
    }
}
?>

<html>
<head>
    <title>4EnRaya</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h1>4 En Ralla</h1>
    <p>Bienvenido, <?php echo $_SESSION['user']; ?>!</p>
    <h3>Le toca al jugador con ficha 
        <?php echo $jugadorActual == 1 ? "Roja" : "Amarilla"; ?>
    </h3>

    <?php pintarGraella($graella); ?>

    <?php if (!$_SESSION['gameOver']): ?>
    <form method="POST">
        <div class="columna-buttons">
            <button type="submit" name="columna" value="0">Col 1</button>
            <button type="submit" name="columna" value="1">Col 2</button>
            <button type="submit" name="columna" value="2">Col 3</button>
            <button type="submit" name="columna" value="3">Col 4</button>
            <button type="submit" name="columna" value="4">Col 5</button>
            <button type="submit" name="columna" value="5">Col 6</button>
            <button type="submit" name="columna" value="6">Col 7</button>
        </div>
        <input type="hidden" name="jugadorActual" value="<?php echo $jugadorActual; ?>">
    </form>
    <?php endif; ?>

    <form method="POST">
        <input type="submit" name="reiniciar" value="Reiniciar juego">
    </form>

    <form action="../logout.php">
        <input type="submit" value="Cerrar sesión">
    </form>

</body>
</html>
