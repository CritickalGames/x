<?php 

require_once "MConexion.php";


class ModeloEstados extends ModeloConexion
{
    public function set($Inicial, $Id, $Temporada)
    {
        $sql = "INSERT INTO Estados (Inicial, Id, Temporada) 
            VALUES ('$Inicial, $Id, $Temporada')";
        $this->sentencia($sql);
    }
///////////////////Borrar
    public function borrar($Inicial, $Id, $Temporada){
        $sql = "DELETE FROM Estados WHERE Inicial='$Inicial', Id=$Id, Temporada='$Temporada' ";
        $this->sentencia($sql);
    }
///////////////////Search
    public function buscar($Name){
        $sql="SELECT * FROM Estados WHERE nombre LIKE '%$Name%'";
        return $this->get($sql);
    }
///////////////////Edit
    public function editarCapitulo($Inicial, $Id, $Temporada, $ATR){
        $sql = "UPDATE Estados 
        SET capitulo='$ATR' 
        WHERE Inicial='$Inicial', Id=$Id, Temporada='$Temporada' ";
        $this->sentencia($sql);
    }

    public function editarEstado($Inicial, $Id, $Temporada, $ATR){
        $sql = "UPDATE Estados 
        SET temporada='$ATR' 
        WHERE Inicial='$Inicial', Id=$Id, Temporada='$Temporada' ";
        $this->sentencia($sql);
    }

    public function editarOpinion($Inicial, $Id, $Temporada, $ATR){
        $sql = "UPDATE Estados 
        SET opinion='$ATR' 
        WHERE Inicial='$Inicial', Id=$Id, Temporada='$Temporada' ";
        $this->sentencia($sql);
    }
///////////////////Get
    public function getByID($Inicial, $Id, $Temporada){
        $sql="SELECT * from Estados where Inicial='$Inicial', Id=$Id, Temporada='$Temporada' ";
        return $this->get($sql);
    }
///////////////////////////////
    public function get_ALL(){
        $sql="SELECT * from Estados";
        return $this->get($sql);
    }

    public function get_ALL_Where(string $where){
        $sql="SELECT * from Estados WHERE $where";
        return $this->get($sql);
    }

    public function contar(){
        $sql="SELECT * from Estados";
        return $this->count($sql);
    }

    public function contarWhere(string $where){
        $sql="SELECT * from Estados WHERE $where";
        return $this->count($sql);
    }
}

?>