<?php 

require_once "MConexion.php";


class ModeloAnime extends ModeloConexion
{
    public function set($NAME)
    {
        $sql = "INSERT INTO anime (nombre) 
            VALUES ('$NAME')";
        $this->sentencia($sql);
    }
///////////////////Borrar
    public function borrar($NAME){
        $sql = "DELETE FROM anime WHERE nombre='$NAME'";
        $this->sentencia($sql);
    }
///////////////////Search
    public function buscarPorNombre($Name){
        $sql="SELECT * FROM anime WHERE nombre LIKE '$Name%'";
        return $this->get($sql);
    }
    public function buscarPorAll($Name){
        $sql="SELECT * FROM anime WHERE nombre LIKE '%$Name%'";
        return $this->get($sql);
    }
///////////////////Edit

///////////////////Get
    public function getByInicial($Inicial){
        $sql="SELECT * FROM anime WHERE nombre LIKE '$Inicial%'";
        return $this->get($sql);
    }
    public function getByNombre($Nombre){
        $sql="SELECT * FROM anime WHERE nombre = '$Nombre'";
        return $this->get($sql);
    }
///////////////////////////////
    public function get_ALL(){
        $sql="SELECT * FROM anime";
        return $this->get($sql);
    }

    public function get_ALL_Where(string $where){
        $sql="SELECT * FROM anime WHERE $where";
        return $this->get($sql);
    }

    public function contar(){
        $sql="SELECT * FROM anime";
        return $this->count($sql);
    }

    public function contarWhere(string $where){
        $sql="SELECT * FROM anime WHERE $where";
        return $this->count($sql);
    }
}

?>