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


function inicializarGuiones($palabra)
{
    $guiones = [];
    for ($i = 0; $i < strlen($palabra); $i++) {
        $guiones[$i] = "_";
    }
    return $guiones;
}

function comprobarAciertos(){
    
}


function reiniciarJuego()
{
    unset($_SESSION['palabra']);
    unset($_SESSION['guiones']);
    unset($_SESSION['letrasAdivinadas']);
    unset($_SESSION['intentos']);
}
