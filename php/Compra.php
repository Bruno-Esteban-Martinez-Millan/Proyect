<?php

require_once("conexion.php");

class Compra extends Conexion{


	public function alta($fecha,$total,$tipo_pago){
      $this->sentencia = "INSERT INTO compra VALUES (null,'$fecha','$total','$tipo_pago',1)";
      $this->ejecutarSentencia();



	}

	public function consulta(){
		$this->sentencia="SELECT *FROM compra";
		return $this->obtenerSentencia();
	}

	public function eliminar($id){
		$this->sentencia = "DELETE FROM compra WHERE IDcompra = $id";
		$this->ejecutarSentencia();
	}

		public function nombres(){
		$this->sentencia = "SELECT fecha FROM compra;";
		$res = $this->obtenerSentencia();
		$nombres = "";
		while($fila = $res->fetch_assoc()){
			$nombres = $nombres."'".$fila["fecha"]."',";
		}
		return $nombres;
	}

	public function cantidades(){
		$this->sentencia = "SELECT total FROM compra;";
		$res = $this->obtenerSentencia();
		$cantidades = "";
		while($fila = $res->fetch_assoc()){
			$cantidades = $cantidades.$fila["total"].",";
		}
		return $cantidades;
	}
}

?>