<?php 
	require_once("Devoluciones.php");
	$obj = new Devoluciones();
 ?>
<section id="principal">

	<form action="" method="post">
			Fecha: <input type="date" name="Fecha1"> <br>
		    Cantidad: <input type="text" name="Cantidad1"> <br>
		    Descripcion: <input type="text" name="Descripcion1"> <br>
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
			$fecha1= $_POST["Fecha1"];
			$Cantidad1 = $_POST["Cantidad1"];
			$Descripcion = $_POST["Descripcion1"];
			
			
			$obj->alta($fecha1,$Cantidad1,$Descripcion);
		header("Location: ?sec=dev&i=1 ");
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Fecha</th>
			<th>Cantidad</th>
			<th>Descripción</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["fecha"]."</td>";
				echo "<td>".$fila["cantidad"]."</td>";
			    echo "<td>".$fila["descripcion"]."</td>";
			
				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDdevoluciones']; ?>" name="id">
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
			header("Location: ?sec=dev&e=1");
		}

	 ?>

</section>