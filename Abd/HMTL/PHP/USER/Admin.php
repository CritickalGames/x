<?php
require_once "Require.php";

class UserAdmin{

    function agruparAnimePorInicial(string $inicial){
        $obj = new Backoffice ();
        return $obj->agruparPor("ANIME", ["Inicial", "IdAnime = '$inicial'"]);
    }    

    function agruparAnimePorInicialPrimer($Primeros){
        $obj = new Backoffice ();
        $array = [];
        for ($elNumeroX=1; $elNumeroX <= $Primeros; $elNumeroX++) { 
            array_push ($array,($obj->agruparPor("ANIME", ["InicialPrimer", "IdAnime = '$inicial'"])));
        }
        return $array;
    }

    function borrarAnime(string $inicial, string $id){
        $obj = new Backoffice ();
        return $obj->borrar("ANIME", [$inicial, $id]);
    }

    function buscarAnime(string $name){
        $obj = new Backoffice ();
        return $obj->buscar("ANIME", $name);
    }

    function contarAnime(){
        $obj = new Backoffice ();
        return $obj->contar("ANIME");
    }

    function conseguirAnimeById(string $inicial, string $ID){
        $obj = new Backoffice ();
        return $obj->conseguir("ANIME",["Id", $inicial, $ID]);
    }

    function conseguirAnimeByInicial(string $inicial){
        $obj = new Backoffice ();
        return $obj->conseguir("ANIME",["Inicial", $inicial]);
    }

    function editarAnime(string $inicial, string $ID, string $nombre){
        $obj = new Backoffice ();
        return $obj->editar("ANIME",[$inicial, $ID, $nombre]);
    }
    
    function mostrarPrimerosXAnime(int $Primeros){
        $obj = new Backoffice ();
        $array = [];
        for ($elNumeroX=1; $elNumeroX <= $Primeros; $elNumeroX++) { 
            array_push($array, $obj->mostrarPrimerosX("ANIME", $elNumeroX));
        }
        return $array;
    }

    function mostrarUltimosXAnime(int $ultimos){
        $obj = new Backoffice ();
        $array = [];
        for ($elNumeroX=$ultimos; $elNumeroX > 0 ; $elNumeroX--) { 
            array_push($array,$obj->mostrarUltimosX("ANIME", $elNumeroX));
        }
        return $array;
    }

    function mostrarPrimerosXAnimeWhere(int $Primeros, string $where){
        $obj = new Backoffice ();
        $array = [];
        for ($elNumeroX=1; $elNumeroX <= $Primeros; $elNumeroX++) { 
            array_push($array, $obj->mostrarPrimerosX("ANIME", $elNumeroX, ["Where", $where]));
        }
        return $array;
    }

    function mostrarUltimosXAnimeWhere(int $ultimos, string $where){
        $obj = new Backoffice ();
        $array = [];
        for ($elNumeroX=$ultimos; $elNumeroX > 0 ; $elNumeroX--) { 
            array_push($array,$obj->mostrarUltimosX("ANIME", $elNumeroX, ["Where", $where]));
        }
        return $array;
    }

    function listarAnime(){
        $obj = new Backoffice ();
        return $obj->listar("ANIME");
    }

    function listarAnimePorIninical(string $inicial){
        $obj = new Backoffice ();
        return $obj->listar("ANIME", ["Where", "IdAnime='$inicial'"]);
    }

    function subirAnime(string $inicial, string $id, string $nombre){
        $obj = new Backoffice ();
        
        $obj->subir("ANIME", ["$inicial","$id","$nombre"]);
    }
}

?>