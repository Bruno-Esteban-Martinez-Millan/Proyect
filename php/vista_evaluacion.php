<?php 
	require_once("Evaluacion.php");
	$obj = new Evaluacion();
 ?>
<section id="principal">

	<form action="" method="post">
			Tipo: <input type="text" name="tipo2"> <br>
		    Pregunta1: <input type="text" name="pregunta1"> <br>
		    Pregunta2: <input type="text" name="pregunta2"> <br>
		    Pregunta3: <input type="text" name="pregunta3"> <br>
		    Pregunta4: <input type="text" name="pregunta4"> <br>
		    Pregunta5: <input type="text" name="pregunta5"> <br>
		    Pregunta6: <input type="text" name="pregunta6"> <br>
		    Pregunta7: <input type="text" name="pregunta7"> <br>
		    Pregunta8: <input type="text" name="pregunta8"> <br>
		    Pregunta9: <input type="text" name="pregunta9"> <br>
		    Pregunta10: <input type="text" name="pregunta10"> <br>
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
			$Tipo2= $_POST["tipo2"];
			$Preg1 = $_POST["pregunta1"];
			$Preg2 = $_POST["pregunta2"];
			$Preg3= $_POST["pregunta3"];
			$Preg4 = $_POST["pregunta4"];
			$Preg5 = $_POST["pregunta5"];
			$Preg6= $_POST["pregunta6"];
			$Preg7 = $_POST["pregunta7"];
			$Preg8 = $_POST["pregunta8"];
			$Preg9 = $_POST["pregunta9"];
			$Preg10 = $_POST["pregunta10"];
			
			
			
			$obj->alta($Tipo2,$Preg1,$Preg2, $Preg3, $Preg4, $Preg5, $Preg6, $Preg7, $Preg8, $Preg9, $Preg10);
			header("Location: ?sec=eva&i=1 ");
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Tipo</th>
			<th>Pregunta 1</th>
			<th>Pregunta 2</th>
			<th>Pregunta 3</th>
			<th>Pregunta 4</th>
			<th>Pregunta 5</th>
			<th>Pregunta 6</th>
			<th>Pregunta 7</th>
			<th>Pregunta 8</th>
			<th>Pregunta 9</th>
			<th>Pregunta 10</th>
			<th>Eliminar</th>
			
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["tipo"]."</td>";
				echo "<td>".$fila["pregunta1"]."</td>";
			    echo "<td>".$fila["pregunta2"]."</td>";
			    echo "<td>".$fila["pregunta3"]."</td>";
			    echo "<td>".$fila["pregunta4"]."</td>";
			    echo "<td>".$fila["pregunta5"]."</td>";
				echo "<td>".$fila["pregunta6"]."</td>";
			    echo "<td>".$fila["pregunta7"]."</td>";
			    echo "<td>".$fila["pregunta8"]."</td>";
			    echo "<td>".$fila["pregunta9"]."</td>";
			    echo "<td>".$fila["pregunta10"]."</td>";
		
				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDevaluacion']; ?>" name="id">
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
			header("Location: ?sec=eva&e=1");
		}

	 ?>
</section>