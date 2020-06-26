<?php
require_once("conexion.php");
class Pedido extends Conexion{

	public function alta($fecha,$precio,$cantidad,$direccion){
		$this->sentencia = "INSERT INTO pedido VALUES (null,'$fecha',NULL,'$precio','$cantidad','$direccion',NULL)";
		$this->ejecutarSentencia();
	}
	public function consulta(){
		$this->sentencia = "SELECT * FROM pedido";
		return $this->obtenerSentencia();
	}
	
	public function eliminar($id){
		$this->sentencia = "DELETE FROM pedido WHERE IDpedido = $id";
		$this->ejecutarSentencia();
	}
}

?>