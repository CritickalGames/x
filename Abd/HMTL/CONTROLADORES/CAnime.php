<?php

require_once "Require.php";

class ControladorAnime extends ModeloAnime
{

    public function listarAnime(){
        return $this->get_All();
    }

    public function listarAnimeWhere(string $where){
        return $this->get_All_Where($where);
    }

    public function contarAnime(){
        return $this->contar();
    }

    public function contarAnimeWhere(string $where){
        return $this->contarWhere($where);
    }

    public function getAnimeById($Inicial, $ID){
        $Inicial = strtoupper($Inicial);
        return $this->getByID($Inicial, $ID);
    }

    public function getAnimeByInicial($Inicial){
        $Inicial = strtoupper($Inicial);
        return $this->getByInicial($Inicial);
    }
        
    public function buscarAnimeByName($Name){
        return $this->buscar($Name);
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

    public function groupAnimeByInicial(string $where){
        return $this->groupBy("IdAnime", $where);
    }
    public function groupAnimeByInicialPrimer($valor){
        return $this->groupBy("IdAnime", "1")[$valor-1];
    }

}
?>