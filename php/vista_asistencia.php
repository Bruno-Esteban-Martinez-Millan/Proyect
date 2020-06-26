<?php 
	require_once("Asistencia.php");
	$obj = new Asistencia();
 ?>
<section id="principal">

	<form action="" method="post">
		Fecha: <input type="date" name="Fecha"> <br>
		Hora: <input type="time" name="Hora"> <br>
		<input type="submit" value="Agregar asistencia" name="alta">

		<br>
		<?php 
		if(isset($_GET["e"])){
			echo "<h2>Asistencia eliminada</h2>";
		}
		if(isset($_GET["i"])){
			echo "<h2>Asistencia agregada</h2>";
		}

		 ?>
		
	</form>
	<?php 
		if(isset($_POST["alta"])){
			$fecha = $_POST["Fecha"];
			$hora = $_POST["Hora"];
			
			
			$obj->alta($fecha,$hora);
		header("Location: ?sec=asi&i=1 ");
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Fecha</th>
			<th>Hora</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["Fecha"]."</td>";
				echo "<td>".$fila["Hora"]."</td>";
			
		?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDasistencia']; ?>" name="id">
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
			header("Location: ?sec=asi&e=1");
		}

	 ?>
</section>