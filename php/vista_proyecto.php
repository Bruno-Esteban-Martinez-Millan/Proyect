<?php 
	require_once("proyecto.php");
	$obj = new Proyecto();
 ?>
<section id="principal">

	<form action="" method="post">
		Nombre del producto: <input type="text" name="nombre_pro"> <br>
		Tipo de producto: <input type="text" name="tipo_pro"> <br>
		
		Fecha inicio: <input type="date" name="fecha_in"> <br>
		Fecha fin: <input type="date" name="fecha_fin"> <br>
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
			$nombre_pro = $_POST["nombre_pro"];
			$tipo_pro = $_POST["tipo_pro"];
		
			$fecha_in = $_POST["fecha_in"];
			$fecha_fin = $_POST["fecha_fin"];
			$descripcion = $_POST["descripcion"];
			
			
			$obj->alta($nombre_pro,$tipo_pro,$idempleado,$fecha_in,$fecha_fin,$descripcion);
					header("Location: ?sec=proy&i=1 ");
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Nombre del proyecto</th>
			<th>Tipo de proyecto</th>
			
			<th>Fecha inicio</th>
			<th>Fecha fin</th>
			<th>Descripcion</th>
				<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["nombre_pro"]."</td>";
				echo "<td>".$fila["tipo_pro"]."</td>";
				
				echo "<td>".$fila["fecha_in"]."</td>";
				echo "<td>".$fila["fecha_fin"]."</td>";
				echo "<td>".$fila["descripcion"]."</td>";
		
						?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDproyecto']; ?>" name="id">
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
			header("Location: ?sec=proy&e=1");
		}

	 ?>
</section>