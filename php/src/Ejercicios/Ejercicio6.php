<html>
    <head>
        <title>Ejercicio 6</title>
    </head>
    <body>
        <p>Uso del match</p>
    </body>
    <?php
    $nota = 8;

    $resultat = match (true) {
        $nota === 10 => 'Excel·lent' ,
        $nota >= 8 && $nota <= 9 => 'Molt be',
        $nota >= 5 && $nota <= 7 => 'Be' ,
        default => 'Insuficient' ,
    };

    echo $resultat;
    ?>
</html>