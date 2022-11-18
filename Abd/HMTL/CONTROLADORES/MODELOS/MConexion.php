<?php

class ModeloConexion
{

  public function conectar(){
    $server = 'localhost:3306';
    $usuario = 'root';
    $contraseña = '';
    $basededatos = 'anime';
    $conexion = new mysqli($server, $usuario, $contraseña, $basededatos);
    if($conexion->connect_error){
      die("conexion fallida" . $conexion->connect_error);
    }
    return $conexion;
  }

  public function consulta(string $sql){
    $conexion=$this->conectar();
    $result=mysqli_query($conexion,$sql);
    return [$conexion,$result];
  }

  public function sentencia(string $sql){
    $conexion=$this->consulta($sql)[0];
  }

  public function get(string $sql){
    $result=$this->consulta($sql)[1];
    if(mysqli_num_rows($result)>0){
      $row= $result -> fetch_all(MYSQLI_ASSOC);
      return $row;  
          
    }else{
      return $row=[mysqli_num_rows($result)];
    }
  }

  public function count(string $sql){
    $result=$this->consulta($sql)[1];
    return mysqli_num_rows($result);
  }

}


?>