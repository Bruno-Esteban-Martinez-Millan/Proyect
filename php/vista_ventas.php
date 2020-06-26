<?php 
	require_once("venta.php");
	$obj = new Venta();
 ?>
<section id="principal">
<div>
   <a href="?sec=grafvent"><input type="button" value="Ver gráfico"></a>
</div>
<div>
	<a href="?sec=repvent"><input type="button" value="Generar reporte"></a>
</div>
	<form action="" method="post">
	Fecha: <input type="date" name="Fecha1"> <br>
		Total: <input type="text" name="total1"> <br>
		Tipo de pago: <input type="text" name="totalpag"> <br>
		
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
	$Fechap = $_POST["Fecha1"];
			$Total1 = $_POST["total1"];
			$TotaldePag1 = $_POST["totalpag"];
			$obj->alta($Fechap,$Total1,$TotaldePag1);
			header("Location: ?sec=vent&i=1 ");
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
		
			<th>Fecha</th>
			<th>Total</th>
			<th>Tipo de pago</th>
				<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["fecha"]."</td>";
				echo "<td>".$fila["Total"]."</td>";
				echo "<td>".$fila["tipo_pago"]."</td>";
				
						?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDVenta']; ?>" name="id">
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
			header("Location: ?sec=vent&e=1");
		}

	 ?>
</section>