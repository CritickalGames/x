<?php
require_once "../USER/Admin.php";
    $objUserAdmin = new UserAdmin();

    $inicial = strtoupper($_POST['IdIBORRAR']);
    $id = $_POST['IdNBORRAR'];


    if (($inicial!=NULL)&&($id!=NULL)) {
            $subido=$objUserAdmin->conseguirAnimeById($inicial, $id);
            var_dump($subido[0]);
        $objUserAdmin->borrarAnime($inicial, $id);
    }else{
        echo "Inicial: $inicial <br>";
        echo "ID: $id <br>";
    }
?>