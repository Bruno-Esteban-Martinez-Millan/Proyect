<?php

require_once("conexion.php");

class Usuario extends Conexion{


	public function alta($nombre,$tipo,$password){
      $this->sentencia = "INSERT INTO usuario VALUES (null,'$nombre','$tipo','$password')";
      $this->ejecutarSentencia();
      
	}
}

?>