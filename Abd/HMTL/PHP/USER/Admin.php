<?php
require_once "RAPIs.php";

class UserAdmin{
////////ANIME/////////////////////////////////////////
///////////////////Borrar
    function borrarAnime(string $nombre){
        $obj = new Backoffice ();
        return $obj->borrar("ANIME", [$nombre]);
    }
///////////////////Search
    function buscarAnime(string $name){
        $obj = new Backoffice ();
        return $obj->buscar("ANIME", [$name]);
    }
///////////////////Edit
     function editarAnime(string $nombre ){
        $obj = new Backoffice ();
        return $obj->editar("ANIME",[$nombre]);
    }
///////////////////Get
    function conseguirAnimeById(string $nombre){
        $obj = new Backoffice ();
        return $obj->conseguir("ANIME",["Id", $nombre]);
    }

    function conseguirAnimeBynombre(string $nombre){
        $obj = new Backoffice ();
        return $obj->conseguir("ANIME",["nombre", $nombre]);
    }
///////////////////Group
    function agruparAnimePorNombre(string $nombre){
        $obj = new Backoffice ();
        return $obj->agruparPor("ANIME", ["nombre", "nombre = '$nombre'"]);
    }   
///////////////////Listar
    function listarAnime(){
        $obj = new Backoffice ();
        return $obj->listar("ANIME", ["All", "ALL"]);
    }
    function listarAnimePorInicial(string $nombre){
        $obj = new Backoffice ();
        return $obj->listar("ANIME", ["inicial", $nombre]);
    }

    function subirAnime(string $nombre ){
        $obj = new Backoffice ();
        
        $obj->subir("ANIME", ["$nombre"]);
    }
/////////////////////////
    function contarAnime(){
        $obj = new Backoffice ();
        return $obj->contar("ANIME");
    }
}
/*
/////////ESTADOS//////////////////////////
///////////////////Borrar
    function borrarAnime(string $nombre){
        $obj = new Backoffice ();
        return $obj->borrar("ANIME", [$nombre]);
    }
///////////////////Search
    function buscarAnime(string $name){
        $obj = new Backoffice ();
        return $obj->buscar("ANIME", [$name]);
    }
///////////////////Edit
///////////////////Get
    function conseguirAnimeByNombre(string $nombre){
        $obj = new Backoffice ();
        return $obj->conseguir("ANIME",["nombre", $nombre]);
    }
///////////////////Group
    function agruparAnimePorNombre(string $nombre){
        $obj = new Backoffice ();
        return $obj->agruparPor("ANIME", ["nombre", "IdAnime = '$nombre'"]);
    }   
///////////////////Listar
    function listarAnime(){
        $obj = new Backoffice ();
        return $obj->listar("ANIME", ["All", "ALL"]);
    }

    function listarAnimePorNombre(string $nombre){
        $obj = new Backoffice ();
        return $obj->listar("ANIME", ["nombre", $nombre]);
    }

    function subirAnime(string $nombre ){
        $obj = new Backoffice ();
        
        $obj->subir("ANIME", ["$nombre"]);
    }
/////////////////////////
    function contarAnime(){
        $obj = new Backoffice ();
        return $obj->contar("ANIME");
    }

?>
*/