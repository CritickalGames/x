<?php
require_once "../USER/Admin.php";
    $objUserAdmin = new UserAdmin();

    $nombre = strtoupper($_POST['nombre']);


    if (($nombre!=NULL)) {
        $objUserAdmin->borrarAnime($nombre);
    }else{
        echo "Inicial: $nombre <br>";
    }
?>