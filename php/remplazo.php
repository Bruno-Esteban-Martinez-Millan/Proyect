<?php
require_once("conexion.php")
class Remplazo extends Conexion{

	public function alta($idmobiliario,$fecha,$costo,$descripcion){
		$this->sentencia = "INSERT INTO remplazo VALUES (null,'$idmobiliario','$fecha','$costo','$descripcion')";
		$this->ejecutarSentencia();
	}
	public function consulta(){
		$this->sentencia = "SELECT * FROM remplazo";
		return $this->obtenerSentencia();
	}
}

?>