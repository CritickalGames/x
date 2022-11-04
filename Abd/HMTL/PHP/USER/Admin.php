<?php
require_once "Require.php";

class UserAdmin{

    function subirAnime(string $inicial, string $id, string $nombre){
        $obj = new Admin ();
        
        $obj->subir("ANIME", ["$inicial","$id","$nombre"]);
        $obj->listar("ANIME");echo "<br>";


    }

}

?>