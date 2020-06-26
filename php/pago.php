<?php
require_once("conexion.php");
class Pago extends Conexion{

	public function alta($sal1,$fecha_dep1,$met_pag1,$des1){
		$this->sentencia = "INSERT INTO pago VALUES (null,1,'$sal1','$fecha_dep1','$met_pag1','$des1')";
		$this->ejecutarSentencia();
	}
	public function consulta(){
		$this->sentencia = "SELECT * FROM pago";
		return $this->obtenerSentencia();
	}
	public function eliminar($id){
		$this->sentencia = "DELETE FROM pago WHERE IDpago = $id";
		$this->ejecutarSentencia();
	}
}

?>