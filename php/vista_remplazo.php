<?php 
	require_once("remplazo.php");
	$obj = new Remplazo();
 ?>
<section id="principal">

	<form action="" method="post">
	
		Fecha: <input type="date" name="fecha"> <br>
		Costo: <input type="text" name="costo"> <br>
		Descripción: <input type="text" name="descripcion"> <br>
		
		<input type="submit" value="Agregar Usuario" name="alta">
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
			$costo = $_POST["costo"];
			$descripcion = $_POST["descripcion"];
			$obj->alta($idmobiliario,$fecha,$costo,$descripcion);
			header("Location: ?sec=remp&i=1 ");
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
		
			<th>Fecha</th>
			<th>Costo</th>
			<th>Descripcion</th>
				<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
			
				echo "<td>".$fila["fecha"]."</td>";
				echo "<td>".$fila["costo"]."</td>";
				echo "<td>".$fila["descripcion"]."</td>";
				
						?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDremplazo']; ?>" name="id">
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
			header("Location: ?sec=remp&e=1");
		}

	 ?>
</section>