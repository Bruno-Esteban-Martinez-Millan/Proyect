<?php

require_once("conexion.php");

class Mantenimiento extends Conexion{


	public function alta($fecha_man,$area,$costo_man){
      $this->sentencia = "INSERT INTO mantenimiento VALUES (null,'$fecha_man','$area',1,'$costo_man',1)";
      $this->ejecutarSentencia();



	}

	public function consulta(){
		$this->sentencia="SELECT *FROM mantenimiento";
		return $this->obtenerSentencia();
	}

	public function eliminar($id){
		$this->sentencia = "DELETE FROM mantenimiento WHERE IDmantenimiento = $id";
		
		$this->ejecutarSentencia();
	}
}

?>