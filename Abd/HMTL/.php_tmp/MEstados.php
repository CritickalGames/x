<?php 

require_once "MConexion.php";


class ModeloEstados extends ModeloConexion
{
    public function set($nombre, $Temporada, $Capitulo, $Estados)
    {
        $sql = "INSERT INTO Estados (nombre, Temporada, Capitulo, Estado) 
            VALUES ('$nombre', '$Temporada', '$Capitulo', '$Estados')";
        $this->sentencia($sql);
    }
///////////////////Borrar
    public function borrar($nombre, $Temporada){
        $sql = "DELETE FROM Estados WHERE nombre='$nombre', Temporada='$Temporada' ";
        $this->sentencia($sql);
    }
///////////////////Search
    public function buscar($Name){
        $sql="SELECT * FROM Estados WHERE nombre LIKE '%$Name%'";
        return $this->get($sql);
    }
///////////////////Edit
    public function editarCapitulo($nombre, $Temporada, $ATR){
        $sql = "UPDATE Estados 
        SET capitulo='$ATR' 
        WHERE nombre='$nombre' AND Temporada='$Temporada' ";
        $this->sentencia($sql);
    }

    public function editarEstado($nombre, $Temporada, $ATR){
        $sql = "UPDATE Estados
        SET estado='$ATR' 
        WHERE nombre='$nombre' AND Temporada='$Temporada'";
        $this->sentencia($sql);
    }
///////////////////Get
    public function getByNombre($nombre){
        $sql="SELECT * from Estados where nombre='$nombre'";
        return $this->get($sql);
    }
///////////////////Group
    public function groupForTemporadaByNombre($nombre){
        $sql="SELECT nombre, max(temporada) AS temporada, max(capitulo) AS capitulo, estado from Estados
            WHERE nombre LIKE '$nombre%' 
            GROUP BY nombre";
        return $this->get($sql);
    }
    public function groupForTemporadaByATRNombre(){
        $sql="SELECT nombre, max(temporada) AS temporada, max(capitulo) AS capitulo, estado from Estados
            GROUP BY nombre";
        return $this->get($sql);
    }
    public function groupForTemporadaByInicial($nombre){
        $sql="SELECT nombre, max(temporada) AS temporada, max(capitulo) AS capitulo, estado from Estados
            WHERE nombre LIKE '$nombre%' 
            GROUP BY nombre;";
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