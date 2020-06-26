<?php 
	require_once("materiaprima.php");
	$obj = new Materiaprima();
 ?>
<section id="principal">
<div>
   <a href="?sec=grafmatp"><input type="button" value="Ver gráfico"></a>
</div>
<div>
	<a href="?sec=repmatpri"><input type="button" value="Generar reporte"></a>
</div>
	<form action="" method="post">
		Nombre: <input type="text" name="nombre1"> <br>
		Tipo:
		<select name="tipo1">
			<option value="1">A</option>
			<option value="2">B</option>
		</select> <br>
		Descripción: <input type="text" name="descripcion1"> <br>
		Precio: <input type="text" name="precio1"> <br>
		Stock: <input type="text" name="stock1"> <br>
		Existencias: <input type="text" name="existencias1"> <br>
		<input type="submit" value="Agregar" name="alta">


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
			$nombre = $_POST["nombre1"];
			$tipo = $_POST["tipo1"];
			$descripcion = $_POST["descripcion1"];
			$precio = $_POST["precio1"];
			$stock = $_POST["stock1"];
			$existencias = $_POST["existencias1"];
			
			$obj->alta($nombre,$tipo,$descripcion,$precio,$stock,$existencias);
		header("Location: ?sec=mat&i=1 ");
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Nombre</th>
			<th>Tipo</th>
			<th>Descripción</th>
			<th>Precio</th>
			<th>Stock</th>
			<th>Existencias</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["Nombre"]."</td>";
				if($fila["Tipo"]==1){
					echo "<td>A</td>";
				}else{
					echo "<td>B</td>";
				}
				echo "<td>".$fila["Descripcion"]."</td>";
				echo "<td>".$fila["Precio"]."</td>";
				echo "<td>".$fila["Stock"]."</td>";
				echo "<td>".$fila["Existencias"]."</td>";
			

		?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['ID']; ?>" name="id">
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
			header("Location: ?sec=mat&e=1");
		}

	 ?>
</section>