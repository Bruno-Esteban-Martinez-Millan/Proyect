<?php 
	require_once("proveedor.php");
	$obj = new Proveedor();
 ?>
<section id="principal">
	<div>
	<a href="?sec=repprov"><input type="button" value="Generar reporte"></a>
</div>

	<form action="" method="post">
		Nombre: <input type="text" name="nombre"> <br>
		Telefono: <input type="text" name="telefono"> <br>
		Dirección: <input type="text" name="direccion"> <br>
		Correo: <input type="text" name="correo"> <br>
		RFC: <input type="text" name="rfc"> <br>
		<input type="submit" value="Agregar Proveedor" name="alta">
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
			$telefono = $_POST["telefono"];
			$direccion = $_POST["direccion"];
			$correo = $_POST["correo"];
			$rfc = $_POST["rfc"];
			$obj->alta($nombre,$telefono,$direccion,$correo,$rfc);
				header("Location: ?sec=prov&i=1 ");
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Nombre</th>
			<th>Telefono</th>
			<th>Direccion</th>
			<th>Correo</th>
			<th>RFC</th>
				<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["nombre"]."</td>";
				echo "<td>".$fila["telefono"]."</td>";
				echo "<td>".$fila["direccion"]."</td>";
				echo "<td>".$fila["correo"]."</td>";
				echo "<td>".$fila["rfc"]."</td>";
	

					?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDproveedor']; ?>" name="id">
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
			header("Location: ?sec=prov&e=1");
		}

	 ?>
</section>