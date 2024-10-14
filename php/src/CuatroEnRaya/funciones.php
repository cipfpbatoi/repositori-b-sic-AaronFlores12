<?php

function inicialitzarGraella()
{
    $graella = array();
    $filas = 6;
    $columnas = 7;
    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < $columnas; $j++) {
            $graella[$i][$j] = 0;
        }
    }
    return $graella;
}

function pintarGraella($graella)
{
    echo '<table>';
    foreach ($graella as $fila) {
        echo '<tr>';
        foreach ($fila as $celda) {
            if ($celda == 1) {
                echo '<td class="player1"></td>';
            } elseif ($celda == 2) {
                echo '<td class="player2"></td>';
            } else {
                echo '<td class="vacio"></td>';
            }
        }
        echo '</tr>';
    }
    echo '</table>';
}

function ferMoviment($graella, $columna, $jugadorActual)
{
    for ($filaActual = count($graella) - 1; $filaActual >= 0; $filaActual--) {
        if ($graella[$filaActual][$columna] == 0) {
            $graella[$filaActual][$columna] = $jugadorActual;
            return $graella;
        }
    }
    return $graella;
}

function comprovarVictoria($graella, $jugador) {
    $filas = count($graella); 
    $columnas = count($graella[0]); 

    for ($fila = 0; $fila < $filas; $fila++) {
        for ($col = 0; $col <= $columnas - 4; $col++) {
            if ($graella[$fila][$col] == $jugador && 
                $graella[$fila][$col + 1] == $jugador && 
                $graella[$fila][$col + 2] == $jugador && 
                $graella[$fila][$col + 3] == $jugador) {
                return true;
            }
        }
    }

    for ($col = 0; $col < $columnas; $col++) {
        for ($fila = 0; $fila <= $filas - 4; $fila++) {
            if ($graella[$fila][$col] == $jugador && 
                $graella[$fila + 1][$col] == $jugador && 
                $graella[$fila + 2][$col] == $jugador && 
                $graella[$fila + 3][$col] == $jugador) {
                return true;
            }
        }
    }

    for ($fila = 0; $fila <= $filas - 4; $fila++) {
        for ($col = 0; $col <= $columnas - 4; $col++) {
            if ($graella[$fila][$col] == $jugador && 
                $graella[$fila + 1][$col + 1] == $jugador && 
                $graella[$fila + 2][$col + 2] == $jugador && 
                $graella[$fila + 3][$col + 3] == $jugador) {
                return true;
            }
        }
    }

    for ($fila = 3; $fila < $filas; $fila++) {
        for ($col = 0; $col <= $columnas - 4; $col++) {
            if ($graella[$fila][$col] == $jugador && 
                $graella[$fila - 1][$col + 1] == $jugador && 
                $graella[$fila - 2][$col + 2] == $jugador && 
                $graella[$fila - 3][$col + 3] == $jugador) {
                return true;
            }
        }
    }

    return false;
}

function comprovarTaulerPle($graella) {
    foreach ($graella as $fila) {
        if (in_array(0, $fila)) {
            return false; 
        }
    }
    return true; 
}


function reiniciarJuego() {
    $_SESSION['graella'] = inicialitzarGraella();
    $_SESSION['jugadorActual'] = 1;
    $_SESSION['gameOver'] = false; 
}
