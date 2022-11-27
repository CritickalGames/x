<?php
require_once "../USER/Admin.php";
    $obj = new UserAdmin();

    
    //$nombre = "z";
    //$temporada = 1;
    //$capitulo = 1;
    //$estado = "ver";

    $nombre = $_POST['nombre'];
    $temporada = $_POST['temporada'];
    $capitulo = $_POST['capitulo'];
    $estado = $_POST['estado'];

    if (($nombre!= NULL)&&($temporada!= NULL)) {
        if ($capitulo=="0") {
            $estado="ver";
        }elseif (intval($capitulo)>0) {
            $estado="vie";
        }elseif(intval($capitulo)<0){
            $estado="mov";
        }
        if (($obj->getEstadosByNombre($nombre, $temporada))) {
            echo "echo";
            ($obj->editarEstadosCapitulo($nombre, $temporada, $capitulo));
            ($obj->editarEstadosEstado($nombre, $temporada, $estado));
        }else {
            $obj->subirEstados($nombre, $temporada, $capitulo, $estado);
        }
    }else{
        echo "Algo salió mal";
    }
?>