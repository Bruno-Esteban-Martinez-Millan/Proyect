<?php 
	require_once("Cliente.php");
	$obj = new Cliente();
 ?>
<section id="principal">
	<div>
	<a href="?sec=repcli"><input type="button" value="Generar reporte"></a>
</div>
	<form action="" method="post">
		Nombre(s): <input type="text" name="Nombre2"> <br>
		    Dirección: <input type="text" name="direccion2"> <br>
		     Telefono: <input type="text" name="Telefenoo2"> <br>
		      Correo: <input type="text" name="Correo2"> <br>
		        Apellido paterno: <input type="text" name="appaterno2"> <br>
		    Apellido materno: <input type="text" name="apmaterno2"> <br>
		    Sexo: <input type="text" name="Sexo2"> <br>
		   
		    Fecha de nacimiento: <input type="date" name="fechai2"> <br>
		 
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
			$Nombres2= $_POST["Nombre1"];
			$Direccion2 = $_POST["direccion2"];
			$Telefono2 = $_POST["Telefonoo2"];
			$Correo2= $_POST["Correo2"];
			$ApellidoPaterno2 = $_POST["appaterno2"];
			$ApellidoMaterno2 = $_POST["apmaterno2"];
			$Sexo2= $_POST["Sexo2"];
			$FechaDN = $_POST["fechai2"];
			
			
			
			$obj->alta($Nombres2, $Direccion2, $Telefono2, $Correo2, $ApellidoPaterno2, $ApellidoMaterno2, $Sexo2, $FechaDN);
			header("Location: ?sec=cli&i=1 ");
		}


		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Nombre</th>
			<th>Apellido paterno</th>
			<th>Apellido materno</th>
			<th>Direccion</th>
			<th>Telefono</th>
			<th>Correo</th>
			<th>Sexo</th>
			<th>Fecha de nacimiento</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["nombre"]."</td>";
				echo "<td>".$fila["apepaterno"]."</td>";
			    echo "<td>".$fila["apematerno"]."</td>";
				echo "<td>".$fila["direccion"]."</td>";
			    echo "<td>".$fila["telefono"]."</td>";
			    echo "<td>".$fila["correo"]."</td>";
			    echo "<td>".$fila["sexo"]."</td>";
				echo "<td>".$fila["fenacimiento"]."</td>";
			  

		?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDcliente']; ?>" name="id">
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
			header("Location: ?sec=cli&e=1");
		}

	 ?>
</section>