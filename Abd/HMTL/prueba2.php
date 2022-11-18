<?php
include("prueba.php");
    echo $valor;
    echo "<br>";
    $obj;

    $obj = new habitaciones();
    $obj2 = new hab();

    $obj->comprobarReserva();

    echo "<br>";
    $obj->solicitarReserva();
    echo "<br>";
    $obj2->comprobarReserva();
?>