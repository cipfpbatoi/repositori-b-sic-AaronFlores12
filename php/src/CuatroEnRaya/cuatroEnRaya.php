<html>

<head>
    <title>4EnRaya</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>4 En Ralla</h1>
    <?php
    include "funciones.php";

    $graella = inicialitzarGraella();

    if (isset($_POST['jugadorActual'])) {
        $jugadorActual = $_POST['jugadorActual'];
    } else {
        $jugadorActual = 1;
    }

    if (isset($_POST['columna'])) {
        $columna = $_POST['columna'];
        $graella = ferMoviment($graella, $columna, $jugadorActual);
        $jugadorActual = $jugadorActual == 1 ? 2 : 1;
    }

    pintarGraella($graella);

    echo "<h3>Le toca al jugador con ficha" . ($jugadorActual == 1 ? " Roja" : " Amarilla") . "</h3>";
    ?>

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


</body>

</html>