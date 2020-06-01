<?php
require_once("conexion.php")
class Pago extends Conexion{

	public function alta($idempleado,$sal,$fecha_dep,$met_pag,$des){
		$this->sentencia = "INSERT INTO pago VALUES (null,'$idempleado','$sal','$fecha_dep','$met_pag','$des')";
		$this->ejecutarSentencia();
	}
	public function consulta(){
		$this->sentencia = "SELECT * FROM pago";
		return $this->obtenerSentencia();
	}
}

?>