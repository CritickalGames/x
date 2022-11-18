<?php
require_once "D:/xampp/htdocs/x/Abd/HMTL/PHP/USER/Admin.php";
    $objUserAdmin = new UserAdmin();

    //$inicial = $_POST['inicial'];
    $inicial = "";

    if (($inicial!=NULL)) {
        echo json_encode($objUserAdmin->listarAnimePorInicial("$inicial"));
    }else{
        echo json_encode($objUserAdmin->listarAnimePorInicial("A"));
    }
?>