<?php

require "../../CONTROLADORES/CAnime.php";

    $obj= new ControladorAnime();

    $obj->setAnime("Z","3","123");
    $obj->borrarAnime("Z","3");
    var_dump($obj->buscarByName("2"));
    //echo "<br>";
    $obj->editarAnime("Z","3","PRUEBA EDITADA");
    var_dump ($obj->listar()[count($obj->listar())-1]);

    echo $obj->countAnime();

?>