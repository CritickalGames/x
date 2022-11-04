<?php

require_once "Require.php";

class Admin{

    function listar(string $tabla){
        $objAnime = new ControladorAnime();
        switch (strtolower($tabla)) {
            case "anime":
                var_dump ($objAnime->listar()[count($objAnime->listar())-1]);
                break;
            case "estado":
                echo "i es igual a 1";
                break;
            case "estado":
                echo "i es igual a 2";
                break;
        }
        
    }

    function subir(string $tabla, array $valores){
        $objAnime = new ControladorAnime();
        switch (strtolower($tabla)) {
            case "anime":
                $objAnime->setAnime($valores[0], $valores[1], $valores[2] );
                break;
            case "estado":
                echo "i es igual a 1";
                break;
            case "estado":
                echo "i es igual a 2";
                break;
        }
    }

    function borrar(string $tabla, array $valores){
        $objAnime = new ControladorAnime();
        switch (strtolower($tabla)) {
            case "anime":
                $objAnime->borrarAnime($valores[0], $valores[1]);
                break;
            case "estado":
                echo "i es igual a 1";
                break;
            case "estado":
                echo "i es igual a 2";
                break;
        }
    }

    function editar(string $tabla, array $valores){
        $objAnime = new ControladorAnime();
        switch (strtolower($tabla)) {
            case "anime":
                $objAnime->editarAnime($valores[0], $valores[1], $valores[2]);
                break;
            case "estado":
                echo "i es igual a 1";
                break;
            case "estado":
                echo "i es igual a 2";
                break;
        }
    }

}
/*
$obj = new Admin ();

$obj->listar("ANIME");echo "<br>";
$obj->subir("ANIME", ["z","2","1"]);
$obj->editar("ANIME", ["z","2","EDITADO"]);
$obj->listar("ANIME");echo "<br>";
$obj->borrar("ANIME", ["z","2"]);
$obj->listar("ANIME");


//$obj->{$strMetodo}();
/**
 
 */
?>

