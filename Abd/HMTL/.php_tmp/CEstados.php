<?php

require_once "RModelos.php";

class ControladorEstados extends ModeloEstados
{

    public function setEstados($nombre, $temporada, $cap, $estado){
        $this->set($nombre, $temporada, $cap, $estado);
    }
///////////////////Borrar
    public function borrarEstados($nombre, $temporada){
        $this->borrar($nombre, $temporada);
    }
///////////////////Search
    public function buscarEstadosByName($Atributo){
        return $this->buscar($Atributo);
    }
///////////////////Edit
    public function editarEstadosEstado($nombre, $temporada, $ATR){
        $this->editarEstado($nombre, $temporada, $ATR);
    }
    public function editarEstadosCapitulo($nombre, $temporada, $ATR){
        $this->editarCapitulo($nombre, $temporada, $ATR);
    }
///////////////////Get
    public function getEstadosByNombre($nombre){
        return $this->getByNombre($nombre);
    }
///////////////////Group
    public function agruparForTemporadaByNombre($nombre){
        return $this->groupForTemporadaByNombre($nombre);
    }
    public function agruparForTemporadaByATRNombre(){
        return $this->groupForTemporadaByATRNombre();
    }
    public function agruparForTemporadaByInicial($nombre){
        return $this->groupForTemporadaByInicial($nombre);
    }
///////////////////Listar
    public function listarEstadosByAll(){
        return $this->get_All();
    }

    public function listarEstadosByNombre($Atributo){
        return $this->getByAtributo($Atributo);
    }

    public function listarEstadosWhere(string $where){
        return $this->get_All_Where($where);
    }
///////////////////////////////
    public function contarEstados(){
        return $this->contar();
    }

    public function contarEstadosWhere(string $where){
        return $this->contarWhere($where);
    }
}
//$obj = new ControladorEstados();

//$obj->editarEstadosCapitulo("z",1,3);

?>