<?php

require_once("conexion.php");

class Mantenimiento extends Conexion{


	public function alta($fecha_man,$area,$costo_man){
      $this->sentencia = "INSERT INTO mantenimiento VALUES (null,'$fecha_man','$area',null,'$costo_man',null)";
      $this->ejecutarSentencia();



	}

	public function consulta(){
		$this->sentencia="SELECT *FROM mantenimiento";
		return $this->obtenerSentencia();
	}
}

?>