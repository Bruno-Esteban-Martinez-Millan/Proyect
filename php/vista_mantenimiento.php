<?php 
	require_once("Mantenimiento.php");
	$obj = new Mantenimiento();
 ?>
<section id="principal">

	<form action="" method="post">
		Fecha: <input type="date" name="fecha3"> <br>
		Area: <input type="text" name="area1"> <br>
		Costo: <input type="text" name="Costo1"> <br>
		<input type="submit" value="Agregar" name="alta">
		<br>
		<?php 
		if(isset($_GET["e"])){
			echo "<h2>Eliminado correctamente</h2>";
		}
		if(isset($_GET["i"])){
			echo "<h2>Agregado correctamente</h2>";
		}

		 ?>
	</form>
	<?php 
		if(isset($_POST["alta"])){
			$Fecha3 = $_POST["fecha3"];
			$Area1 = $_POST["area1"];
			$costo1 = $_POST["Costo1"];
		
			
			$obj->alta($Fecha3,$Area1,$costo1);
			header("Location: ?sec=man&i=1 ");
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Fecha</th>
			<th>Area</th>
			<th>Costo</th>
			<th>Eliminar</th>
			
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["fecha_man"]."</td>";
				echo "<td>".$fila["area"]."</td>";
				echo "<td>".$fila["costo_man"]."</td>";
				
					?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDmantenimiento']; ?>" name="id">
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
			header("Location: ?sec=man&e=1");
		}

	 ?>
</section>
