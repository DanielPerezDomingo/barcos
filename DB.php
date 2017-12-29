<?php

$mysqli=new mysqli("localhost", "root", "-*/987<zx", "barcos");

function partida_actual($mysqli, $jugador)
{
    $sql="select * from partidas where Jugador=? and finalizada =0;" ;
    $query=$mysqli->prepare($sql);
    $query->bind_param("s", $jugador);
    $query->execute();
    $result=$query->get_result();
    $myrow=$result->fetch_assoc();
    return $myrow;
}

function crear_partida($mysqli, $jugador, $tablero)
{
    $sql= "INSERT INTO partidas (Jugador,Tablero) values (?,?);";
    $query=$mysqli->prepare($sql);
    $query->bind_param("si", $jugador, $tablero);
    $query->execute();
    return partida_actual($mysqli, $jugador);

}
?>