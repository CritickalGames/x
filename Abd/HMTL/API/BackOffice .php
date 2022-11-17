<?php

require_once "Require.php";

class Backoffice{

    function agruparPor(string $tabla, array $valores){
        $objAnime = new ControladorAnime();
        switch (strtolower($tabla)) {
            case "anime":
                $by = "groupAnimeBy".$valores[0];
                return ($objAnime->{$by}($valores[1]));
                break;
            case "estado":
                echo "i es igual a 1";
                break;
            case "estado":
                echo "i es igual a 2";
                break;
        }
    }

    function buscar(string $tabla, array $valores){
        $objAnime = new ControladorAnime();
        switch (strtolower($tabla)) {
            case "anime":
                $by = "buscarAnimeByName";
                return ($objAnime->{$by}($valores[0]));
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
                $objAnime->borrarAnime(
                        $valores[0], 
                        $valores[1]);
                break;
            case "estado":
                echo "i es igual a 1";
                break;
            case "estado":
                echo "i es igual a 2";
                break;
        }
    }

    function contar(string $tabla){
        $objAnime = new ControladorAnime();
        switch (strtolower($tabla)) {
            case "anime":
                return $objAnime->contarAnime();
                break;
            case "estado":
                echo "i es igual a 1";
                break;
            case "estado":
                echo "i es igual a 2";
                break;
        }
        
    }

    function conseguir(string $tabla, array $valores){
        $objAnime = new ControladorAnime();
        switch (strtolower($tabla)) {
            case "anime":
                $by = "getAnimeBy".$valores[0];
                return ($objAnime->{$by}(
                        $valores[1], 
                        $valores[2]));
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
                $by = "editarAnime";
                $objAnime->{$by}(
                        $valores[0], 
                        $valores[1],
                        $valores[2]);
                break;
            case "estado":
                echo "i es igual a 1";
                break;
            case "estado":
                echo "i es igual a 2";
                break;
        }
    }

    function listar(string $tabla, array $valores){
        $objAnime = new ControladorAnime();
        switch (strtolower($tabla)) {
            case "anime":
                $by = "listarAnimeBy".$valores[0];
                return ($objAnime->{$by}($valores[1]));
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
                return($objAnime->setAnime($valores[0], $valores[1], $valores[2]));
                break;
            case "estado":
                echo "i es igual a 1";
                break;
            case "estado":
                echo "i es igual a 2";
                break;
        }
    }

    

    

    








    function mostrarPrimerosX(string $tabla, int $ultimos, array $valores){
        $objAnime = new ControladorAnime();
        switch (strtolower($tabla)) {
            case "anime":
                $by = "listarAnime".$valores[0];
                $contar = "contarAnime".$valores[0];
                return ($objAnime->{$by}($valores[1])[$ultimos-1]);
                break;
            case "estado":
                echo "i es igual a 1";
                break;
            case "estado":
                echo "i es igual a 2";
                break;
        }
        
    }

    function mostrarUltimosX(string $tabla, int $ultimos, array $valores){
        $objAnime = new ControladorAnime();
        switch (strtolower($tabla)) {
            case "anime":
                $by = "listarAnime".$valores[0];
                $contar = "contarAnime".$valores[0];
                return ($objAnime->{$by}($valores[1])[$objAnime->{$contar}($valores[1])-$ultimos]);
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

