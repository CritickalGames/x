<?php
require_once "../USER/Admin.php";
    $objUserAdmin = new UserAdmin();

    $inicial = $_POST['inicial'];
    //$inicial = "";

    if (($inicial!=NULL)) {
        echo json_encode($objUserAdmin->listarAnimePorInicial("$inicial"));
    }else{
        echo json_encode($objUserAdmin->listarAnimePorInicial("A"));
    }
?>