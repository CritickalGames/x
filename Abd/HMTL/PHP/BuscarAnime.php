<?php
require_once "USER/Admin.php";
    $objUserAdmin = new UserAdmin();
    $nombre = $_POST['nombre'];
    if (($nombre!=NULL)) {
        var_dump ($objUserAdmin->buscarAnime($nombre));
    }else{
        echo "Nombre: $nombre <br>";
    }
?>