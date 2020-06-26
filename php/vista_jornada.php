<?php 
	require_once("Jornada.php");
	$obj = new Jornada();
 ?>
<section id="principal">

	<form action="" method="post">
		Horas trabajadas: <input type="number" name="horas2"> <br>
		Días trabajados: <input type="number" name="Dtra"> <br>
		Pago por hora: <input type="text" name="PH"> <br>
		Horas extra: <input type="number" name="HE"> <br>
		Bonos: <input type="text" name="bonos"> <br>
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
			$hot = $_POST["horas2"];
			$dtra = $_POST["Dtra"];
			$pagoh = $_POST["PH"];
			$horase  = $_POST["HE"];
			$bonos = $_POST["bonos"];
		
			
			$obj->alta($hot,$dtra,$pagoh,$horase,$bonos);
			header("Location: ?sec=jor&i=1 ");
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Horas trabajadas</th>
			<th>Días trabajdos</th>
			<th>Pago por hora</th>
			<th>Horas extra</th>
			<th>Bonos</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["hrs_trabajadas"]."</td>";
				echo "<td>".$fila["dias_trabajados"]."</td>";
				echo "<td>".$fila["pago_hora"]."</td>";
			    echo "<td>".$fila["horas_extra"]."</td>";
			    echo "<td>".$fila["bonos"]."</td>";
		
					?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDjornada']; ?>" name="id">
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
			header("Location: ?sec=jor&e=1");
		}

	 ?>
</section>
