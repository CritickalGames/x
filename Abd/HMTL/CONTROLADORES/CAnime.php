<?php

require_once "Require.php";

class ControladorAnime extends ModeloAnime
{

    public function listar(){
        return $this->get_All();
    }
    public function contar(){
        return $this->countAnime();
    }

    public function getById($Inicial, $ID){
        $Inicial = strtoupper($Inicial);
        return $this->get($Inicial, $ID);
    }
        
    public function buscarByName($Name){
        return $this->buscar('%$Name%');
    }


    public function setAnime($IDA,$IDN,$NAME){
        $IDA = strtoupper($IDA);
        $this->set($IDA,$IDN,$NAME);
    }

    public function borrarAnime($inicial, $ID){
        $inicial = strtoupper($inicial);
        $this->borrar($inicial, $ID);
    }

    public function editarAnime($inicial, $ID, $name){
        $inicial = strtoupper($inicial);
        $this->editar($inicial, $ID, $name);
    }

}
?>