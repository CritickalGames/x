<?php 

require_once "MConexion.php";


class ModeloAnime extends ModeloConexion
{
    public function set($IDA,$IDN,$NAME)
    {
        $sql = "INSERT INTO anime (idAnime, idNumero, nombre) 
        VALUES ('$IDA','$IDN','$NAME')";
        $this->sentencia($sql);
    }

    public function getByID($Inicial, $ID){
        $sql="SELECT * from anime where idAnime='$Inicial' AND IdNumero = $ID";
        return $this->get($sql);
    }

    public function get_ALL(){
        $sql="SELECT * from anime";
        return $this->get($sql);
    }
    public function countAnime(){
        $sql="SELECT * from anime";
        return $this->count($sql);
    }

    public function buscar($Name){
        $sql="SELECT * FROM `anime` WHERE nombre LIKE '%$Name%'";
        return $this->get($sql);
    }

    public function borrar($Inicial, $ID){
        $sql = "DELETE FROM `anime` WHERE `IdAnime`='$Inicial' AND `IdNumero`=$ID";
        $this->sentencia($sql);
    }

    public function editar($Inicial, $ID, $name){
        $sql = "UPDATE `anime` 
        SET `nombre`='$name' 
        WHERE IdAnime='$Inicial' AND IdNumero=$ID";
        $this->sentencia($sql);
    }

}

?>