<?php
require_once "USER/Admin.php";
    $objUserAdmin = new UserAdmin();

    $inicial = $_POST['inicial'];

    if (($inicial!=NULL)) {
        echo json_encode($objUserAdmin->listarAnimePorIninical("$inicial"));
    }else{
        echo json_encode($objUserAdmin->listarAnimePorIninical("A"));
    }
?>