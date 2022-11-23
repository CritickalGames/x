<?php 

require_once "MConexion.php";


class ModeloAnime extends ModeloConexion
{
    public function set($IDA,$IDN,$NAME)
    {
        $sql = "INSERT INTO anime (Inicial, Id, nombre) 
            VALUES ('$IDA','$IDN','$NAME')";
        $this->sentencia($sql);
    }
///////////////////Borrar
    public function borrar($Inicial, $ID){
        $sql = "DELETE FROM anime WHERE Inicial='$Inicial' AND Id=$ID ";
        $this->sentencia($sql);
    }
///////////////////Search
    public function buscar($Name){
        $sql="SELECT * FROM anime WHERE nombre LIKE '%$Name%'";
        return $this->get($sql);
    }
///////////////////Edit
    public function editar($Inicial, $ID, $name){
        $sql = "UPDATE anime 
        SET nombre='$name' 
        WHERE Inicial='$Inicial' AND Id=$ID";
        $this->sentencia($sql);
    }
///////////////////Get
    public function getByID($Inicial, $ID){
        $sql="SELECT * from anime where Inicial='$Inicial' AND Id = $ID";
        return $this->get($sql);
    }

    public function getByInicial($Inicial){
        $sql="SELECT * from anime where Inicial='$Inicial'";
        return $this->get($sql);
    }

    public function getByNombre($Nombre){
        $sql="SELECT * from anime where Nombre='$Nombre'";
        return $this->get($sql);
    }
///////////////////Group
    public function groupByInicial($Inicial){
        $sql = "SELECT Inicial, count(Inicial) FROM 'anime' WHERE Inicial='$Inicial' GROUP BY Inicial";
        return $this->get($sql) ;
    }
///////////////////////////////
    public function get_ALL(){
        $sql="SELECT * from anime";
        return $this->get($sql);
    }

    public function get_ALL_Where(string $where){
        $sql="SELECT * from anime WHERE $where";
        return $this->get($sql);
    }

    public function contar(){
        $sql="SELECT * from anime";
        return $this->count($sql);
    }

    public function contarWhere(string $where){
        $sql="SELECT * from anime WHERE $where";
        return $this->count($sql);
    }
}

?>