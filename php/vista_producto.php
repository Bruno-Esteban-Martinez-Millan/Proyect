<?php 
	require_once("producto.php");
	$obj = new Producto();
 ?>
<section id="principal">

<div>
   <a href="?sec=grafpro"><input type="button" value="Ver gráfico"></a>
</div>
<br>
<div>
	<a href="?sec=reppro"><input type="button" value="Generar reporte"></a>
</div>
	<form action="" method="post">
		Nombre: <input type="text" name="nombre"> <br>
		Descripcion: <input type="text" name="descripcion"> <br>
		Precio por venta: <input type="text" name="preciov"> <br>
		Costo: <input type="text" name="precioc"> <br>
		Cantidad: <input type="text" name="cantidad"> <br>
		Cantidad minima: <input type="text" name="cantmin"> <br>
		Cantidad maxima: <input type="text" name="cantmax"> <br>
		Categoria:
		<select name="categoria">
			<option value="1">A</option>
			<option value="2">B</option>
		</select> <br>
		<input type="submit" value="Agregar Producto" name="alta">
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
			$preciov = $_POST["preciov"];
			$precioc = $_POST["precioc"];
			$cantidad = $_POST["cantidad"];
			$cantmin = $_POST["cantmin"];
			$cantmax = $_POST["cantmax"];
			$categoria = $_POST["categoria"];
			
			$obj->alta($nombre,$descripcion,$preciov,$precioc,$cantidad,$cantmin,$cantmax,$categoria);
			header("Location: ?sec=pro&i=1 ");
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Precio por venta</th>
			<th>Costo</th>
			<th>Cantidad</th>
			<th>Cantidad minima</th>
			<th>Cantidad maxima</th>
			<th>Categoria</th>
					<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["nombre"]."</td>";
				echo "<td>".$fila["descripcion"]."</td>";
				echo "<td>".$fila["preciov"]."</td>";
				echo "<td>".$fila["precioc"]."</td>";
				echo "<td>".$fila["cantidad"]."</td>";
				echo "<td>".$fila["cantmin"]."</td>";
				echo "<td>".$fila["cantmax"]."</td>";
				if($fila["categoria"]==1){
					echo "<td>A</td>";
				}else{
					echo "<td>B</td>";
				}
		

					?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDproducto']; ?>" name="id">
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
			header("Location: ?sec=pro&e=1");
		}

	 ?>
</section>