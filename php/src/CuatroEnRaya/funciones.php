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
