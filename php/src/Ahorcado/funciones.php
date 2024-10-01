<?php

function imprimirGuiones($guiones)
{
    foreach ($guiones as $guion) {
        echo $guion . " ";
    }
}


function comprobarLetra($palabra, $letra, &$letrasAdivinadas)
{
    $acierto = false;
    for ($i = 0; $i < strlen($palabra); $i++) {
        if ($palabra[$i] === $letra) {
            $letrasAdivinadas[$i] = $letra;
            $acierto = true;
        }
    }
    return $acierto;
}

