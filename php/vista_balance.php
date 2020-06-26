<?php 
	require_once("Balance.php");
	$obj = new Balance();
 ?>
<section id="principal">

	<form action="" method="post">
		Fecha inicial: <input type="date" name="FechaI"> <br>
		Fecha final: <input type="date" name="FechaFin"> <br>
		Total: <input type="text" name="Total"> <br>
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
			$fechai = $_POST["FechaI"];
			$fechaf = $_POST["FechaFin"];
			$Total = $_POST["Total"];
			
			
			$obj->alta($fechai,$fechaf,$Total);
			header("Location: ?sec=bal&i=1 ");
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Fecha de inicio</th>
			<th>Hora final</th>
			<th>Total</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["fechainicio"]."</td>";
				echo "<td>".$fila["fechafin"]."</td>";
			    echo "<td>".$fila["total"]."</td>";
			
				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDbalance']; ?>" name="id">
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
			header("Location: ?sec=bal&e=1");
		}

	 ?>
</section>