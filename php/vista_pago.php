<?php 
	require_once("pago.php");
	$obj = new Pago();
 ?>
<section id="principal">

	<form action="" method="post">
		
		Salario: <input type="text" name="salario"> <br>
		Fecha de deposito: <input type="date" name="fechap"> <br>
		Pago: <input type="text" name="pago2"> <br>
		Descripcion: <input type="text" name="descripcion1"> <br>
		
		<input type="submit" value="Agregar Pago" name="alta">
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
		
			$salario1 = $_POST["salario"];
			$Fechadep = $_POST["fechap"];
			$Pago2 = $_POST["pago2"];
			$Descripcion11 = $_POST["descripcion1"];
			
			$obj->alta($salario1,$Fechadep,$Pago2,$Descripcion11);
		header("Location: ?sec=pag&i=1 ");
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			
			<th>Salario</th>
			<th>Fecha de deposito</th>
			<th>Pago</th>
			<th>Descripcion</th>
				<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["sal"]."</td>";
				echo "<td>".$fila["fecha_dep"]."</td>";
				echo "<td>".$fila["met_pag"]."</td>";
				echo "<td>".$fila["des"]."</td>";
				
				
		

					?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDpago']; ?>" name="id">
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
			header("Location: ?sec=pag&e=1");
		}

	 ?>

</section>