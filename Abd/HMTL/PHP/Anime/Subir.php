<?php
require_once "../USER/Admin.php";
    $objUserAdmin = new UserAdmin();

    
    $nombre = $_POST['nombre'];

    $objUserAdmin->subirAnime("$nombre");
?>