<?php
require_once("conexion.php")
class Materiaprima extends Conexion{

	public function alta($nombre,$tipo,$descripcion,$precio,$stock,$existencias){
		$this->sentencia = "INSERT INTO materiaprima VALUES (null,'$nombre','$tipo','$descripcion','$precio','$stock','$existencias')";
		$this->ejecutarSentencia();
	}
	public function consulta(){
		$this->sentencia = "SELECT * FROM materiaprima";
		return $this->obtenerSentencia();
	}
}

?>