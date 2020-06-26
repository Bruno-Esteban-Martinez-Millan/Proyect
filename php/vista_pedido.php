<?php 
	require_once("pedido.php");
	$obj = new Pedido();
 ?>
<section id="principal">

	<form action="" method="post">
		Fecha: <input type="date" name="fecha"> <br>
		
		Precio: <input type="text" name="precio"> <br>
		Cantidad: <input type="text" name="cantidad"> <br>
		Direccion: <input type="text" name="direccion"> <br>
		
		
		<input type="submit" value="Agregar Pedido" name="alta">
					<?php
  if (isset($_GET["e"])){
echo "<h2>Elimnado correctamente</h2>";
  }
  if (isset($_GET["i"])){
 echo "<h2> Agregado correctamente</h2>";
  }
?>
	</form>
	<?php 
		if(isset($_POST["alta"])){
			$fecha = $_POST["fecha"];
		
			$precio = $_POST["precio"];
			$cantidad = $_POST["cantidad"];
			$direccion = $_POST["direccion"];
			
			
			$obj->alta($fecha,$precio,$cantidad,$direccion);
		header("Location: ?sec=ped&i=1 ");
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Fecha</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th>Dirección</th>
				<th>Eliminar</th>
			
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["fecha"]."</td>";
			
				echo "<td>".$fila["precio"]."</td>";
				echo "<td>".$fila["cantidad"]."</td>";
				echo "<td>".$fila["direccion"]."</td>";
	

					?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDpedido']; ?>" name="id">
					<input type="submit" value="Eliminar" name="eliminar">
				</form>
				</td>
				<?php
				echo "</tr>";
			}
		 ?>
	</table>
<?php 
		if(isset($_POST["eliminar"])){
			$id = $_POST["id"];
			$obj->eliminar($id);
			header("Location: ?sec=ped&e=1");
		}

	 ?>
</section>