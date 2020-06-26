<?php 
	require_once("mobiliario.php");
	$obj = new Mobiliario();
 ?>
<section id="principal">
	<div>
	<a href="?sec=repmob"><input type="button" value="Generar reporte"></a>
</div>

	<form action="" method="post">
		Nombre: <input type="text" name="nombre"> <br>
		Descripción: <input type="text" name="descripcion"> <br>
		Cantidad: <input type="text" name="cantidad"> <br>
		Nic: <input type="text" name="nic"> <br>
		Tipo:
		<select name="tipo">
			<option value="1">Oficina</option>
			<option value="2">Hogar</option>
		</select> <br>
		
		
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
			$nombre = $_POST["nombre"];
			$descripcion = $_POST["descripcion"];
			$cantidad = $_POST["cantidad"];
			$nic = $_POST["nic"];
			$tipo = $_POST["tipo"];
			$obj->alta($nombre,$descripcion,$cantidad,$nic,$tipo);
				header("Location: ?sec=mob&i=1 ");
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Cantidad</th>
			<th>Nic</th>
			<th>Tipo</th>
			<th>Eliminar</th>
			

			
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["nombre"]."</td>";
				echo "<td>".$fila["descripcion"]."</td>";
				echo "<td>".$fila["cantidad"]."</td>";
				echo "<td>".$fila["nic"]."</td>";
				if($fila["tipo"]==1){
					echo "<td>Oficina</td>";
				}else{
					echo "<td>Hogar</td>";
				}
		
					?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDmobiliario']; ?>" name="id">
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
			header("Location: ?sec=mob&e=1");
		}

	 ?>
</section>