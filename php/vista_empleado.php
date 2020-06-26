<?php 
	require_once("Empleado.php");
	$obj = new Empleado();
 ?>
<section id="principal">
	<div>
	<a href="?sec=repemp"><input type="button" value="Generar reporte"></a>
</div>

	<form action="" method="post">
			Nombre(s): <input type="text" name="Nombre1"> <br>
		    Apellido paterno: <input type="text" name="appaterno1"> <br>
		    Apellido materno: <input type="text" name="apmaterno1"> <br>
		    Correo: <input type="text" name="Correo"> <br>
		    RFC: <input type="text" name="RFC1"> <br>
		    Telefono: <input type="text" name="Telefenoo"> <br>
		    Sexo: <input type="text" name="Sexo1"> <br>
		    Fecha de ingreso: <input type="date" name="fechai"> <br>
		    Cargo: <input type="text" name="Cargo1"> <br>
		    Salario: <input type="text" name="salario1"> <br>
		    Estado civil: <input type="text" name="EstadoC"> <br>
		    NSS: <input type="text" name="NSS1"> <br>
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
			$Nombres= $_POST["Nombre1"];
			$ApellidoPaterno = $_POST["appaterno1"];
			$ApellidoMaterno = $_POST["apmaterno1"];
			$Correo= $_POST["Correo"];
			$RFC = $_POST["RFC1"];
			$Telefono = $_POST["Telefonoo"];
			$Sexo= $_POST["Sexo1"];
			$FechaIn = $_POST["fechai"];
			$Cargo = $_POST["Cargo1"];
			$Salario= $_POST["salario1"];
			$EstadoCi = $_POST["EstadoC"];
			$NSS = $_POST["NSS1"];
			
			
			$obj->alta($Nombres,$ApellidoPaterno,$ApellidoMaterno, $Correo, $RFC, $Telefono, $Sexo, $FechaIn, $Cargo, $Salario, $EstadoCi, $NSS);
		header("Location: ?sec=emp&i=1 ");
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Nombre</th>
			<th>Apellido paterno</th>
			<th>Apellido materno</th>
			<th>Correo</th>
			<th>RFC</th>
			<th>Telefono</th>
			<th>Sexo</th>
			<th>Fecha de ingreso</th>
			<th>Cargo</th>
			<th>Salario</th>
			<th>Estado civil</th>
			<th>NSS</th>
					<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["nombre"]."</td>";
				echo "<td>".$fila["appaterno"]."</td>";
			    echo "<td>".$fila["apmaterno"]."</td>";
			    echo "<td>".$fila["correo"]."</td>";
			    echo "<td>".$fila["rfc"]."</td>";
			    echo "<td>".$fila["telefono"]."</td>";
				echo "<td>".$fila["sexo"]."</td>";
			    echo "<td>".$fila["fechadeingreso"]."</td>";
			    echo "<td>".$fila["cargo"]."</td>";
			    echo "<td>".$fila["salario"]."</td>";
			    echo "<td>".$fila["estadocivil"]."</td>";
			    echo "<td>".$fila["nss"]."</td>";
			

				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDempleado']; ?>" name="id">
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
			header("Location: ?sec=emp&e=1");
		}

	 ?>
</section>