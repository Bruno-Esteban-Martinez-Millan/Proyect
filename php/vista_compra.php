<?php 
	require_once("Compra.php");
	$obj = new Compra();
 ?>
<section id="principal">
<div>
   <a href="?sec=grafcomp"><input type="button" value="Ver gráfico"></a>
</div>
<div>
	<a href="?sec=repcomp"><input type="button" value="Generar reporte"></a>
</div>
	<form action="" method="post">
			Fecha: <input type="date" name="Fecha"> <br>
		    Total: <input type="text" name="Total1"> <br>
		    Tipo de pago: <input type="text" name="TotalP"> <br>
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
			$fecha = $_POST["Fecha"];
			$Total = $_POST["Total1"];
			$TipoPa = $_POST["TotalP"];
			
			
			$obj->alta($fecha,$Total,$TipoPa);
		header("Location: ?sec=com&i=1 ");
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
				echo "<td>".$fila["total"]."</td>";
			    echo "<td>".$fila["tipo_pago"]."</td>";
		
				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDcompra']; ?>" name="id">
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
			header("Location: ?sec=com&e=1");
		}

	 ?>
</section>