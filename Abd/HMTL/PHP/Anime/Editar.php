<?php
require_once "../USER/Admin.php";
    $objUserAdmin = new UserAdmin();

    $inicial = $_POST['inicial'];
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];



    if (($inicial!=NULL)&&($id!=NULL)&&($nombre!=NULL)) {
        $objUserAdmin->editarAnime($inicial, $id, $nombre);
    
    }else{
        echo "Inicial: $inicial <br>";
        echo "ID: $id <br>";
        echo "Nombre: $nombre <br>";
    }    
?>