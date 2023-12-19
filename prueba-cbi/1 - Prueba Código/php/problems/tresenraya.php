<?php

/*
    Vamos a crear un juego de tres en raya y necesitamos controlar el estado del
    tablero. Para ello, crearemos una función


    Supongamos que el tablero viene en la forma de un array de 3x3, en el que
    el valor es 0 si la casilla está vacía, 1 si es una X y 2 si es un O, tal
    que así:

    [[0,0,1],
     [0,1,2],
     [2,1,0]]


    Lo que queremos es que nuestra función devuelva -1 si el tablero no está
    resuelto, 1 si han ganado las X, 2 si han ganado las O y 0 en caso de
    empate



    Supondremos que el tablero que se pasa como entrada siempre es válido, dado
    que estamos dentro del contexto de nuestro juego

*/

function boardState(array $board) {

    if ($board[0][0]!= 0 && $board[0][0]== $board[1][1]&& $board[1][1]== $board[2][2]) {
	// var_dump($board[0][0]);
		return $board[0][0];
    }    

    if ($board[0][2]!= 0 && $board[0][2]== $board[1][1]&& $board[1][1]== $board[2][0]) {
        // var_dump($board[0][2]);
        return $board[0][2];
    }

    //Empate
    for ($i= 0; $i < 3;$i++) {
        for ($j= 0; $j < 3;$j++) {
            if ($board[$i][$j]!= 1 /*|| $board[$j][$i] != */) {
                return 1;
            }
        }
    }
    return 0;
}
    

    $board = [[0, 0, 1],
             [0, 1, 2],
             [2, 1, 0]];
    $res = boardState($board); 

    if ($res== -1) {
        echo "El juego no ha terminado.";
    } elseif ($res== 0) {
        echo "Empate";
    } elseif ($res== 1) {
        echo "Ganan las X";
    } elseif ($res== 2) {
        echo "Ganan las O";
    }

?>