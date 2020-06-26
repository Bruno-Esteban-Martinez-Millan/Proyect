<?php
require_once("conexion.php");
class Materiaprima extends Conexion{

	public function alta($nombre,$tipo,$descripcion,$precio,$stock,$existencias){
		$this->sentencia = "INSERT INTO materiaprima VALUES (null,'$nombre','$tipo','$descripcion','$precio','$sto-ck','$existencias')";
		$this->ejecutarSentencia();
	}
	public function consulta(){
		$this->sentencia = "SELECT * FROM materiaprima";
		return $this->obtenerSentencia();
	}
	public function eliminar($id){
		$this->sentencia = "DELETE FROM materiaprima WHERE ID = $id";
		$this->ejecutarSentencia();
	}
		public function nombres(){
		$this->sentencia = "SELECT Nombre FROM materiaprima;";
		$res = $this->obtenerSentencia();
		$nombres = "";
		while($fila = $res->fetch_assoc()){
			$nombres = $nombres."'".$fila["Nombre"]."',";
		}
		return $nombres;
	}

	public function cantidades(){
		$this->sentencia = "SELECT Existencias FROM materiaprima;";
		$res = $this->obtenerSentencia();
		$cantidades = "";
		while($fila = $res->fetch_assoc()){
			$cantidades = $cantidades.$fila["Existencias"].",";
		}
		return $cantidades;
	}

}

?>