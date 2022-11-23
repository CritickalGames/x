<?php

require_once "RModelos.php";

class ControladorAnime extends ModeloAnime
{

    public function setAnime($IDA,$IDN,$NAME){
        $IDA = strtoupper($IDA);
        $this->set($IDA,$IDN,$NAME);
    }
///////////////////Borrar
    public function borrarAnime($inicial, $ID){
        $inicial = strtoupper($inicial);
        $this->borrar($inicial, $ID);
    }
///////////////////Search
    public function buscarAnimeByName($Name){
        return $this->buscar($Name);
    }
///////////////////Edit
    public function editarAnime($inicial, $ID, $name){
        $inicial = strtoupper($inicial);
        $this->editar($inicial, $ID, $name);
    }
///////////////////Get
    public function getAnimeById($Inicial, $ID){
        $Inicial = strtoupper($Inicial);
        return $this->getByID($Inicial, $ID);
    }

    public function getAnimeByInicial($Inicial){
        $Inicial = strtoupper($Inicial);
        return $this->getByInicial($Inicial);
    }
///////////////////Group
    public function groupAnimeByInicial(string $Valor){
        return $this->groupByInicial($Valor);
    }
///////////////////Listar
    public function listarAnimeByAll(){
        return $this->get_All();
    }

    public function listarAnimeByInicial($Inicial){
        return $this->getByInicial($Inicial);
    }

    public function listarAnimeWhere(string $where){
        return $this->get_All_Where($where);
    }
///////////////////////////////
    public function contarAnime(){
        return $this->contar();
    }

    public function contarAnimeWhere(string $where){
        return $this->contarWhere($where);
    }
}
?>