<?php
require_once("conexion.php")
class Pedido extends Conexion{

	public function alta($fecha,$idcliente,$precio,$cantidad,$direccion,$idproducto){
		$this->sentencia = "INSERT INTO pedido VALUES (null,'$fecha','$idcliente','$precio','$cantidad','$direccion','$idproducto')";
		$this->ejecutarSentencia();
	}
	public function consulta(){
		$this->sentencia = "SELECT * FROM pedido";
		return $this->obtenerSentencia();
	}
}

?>