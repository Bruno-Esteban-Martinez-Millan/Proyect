<?php 
	require_once ( "../fpdf/fpdf.php" );
	require_once ( "Empleado.php" );
	$pdf = new  FPDF ();
	$obj = new  Empleado ();
	$res = $obj -> consulta ();
	$pdf -> AddPage ();
	$pdf -> Image ( "../img/iconoreporte.png.png" , 5 , 5 , 15 , 15 );
	$pdf -> SetFont ( 'Arial' , 'B' , 15 );
	$pdf -> Cell ( 200 , 20 , "Reporte de Empleados" , 0 , 0 , "C" );
	$pdf -> Ln ( 30 );
	$pdf -> SetFont ( 'Arial' , 'B' , 6 );
	$ancho = 15 ;
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "Nombre" ), 1 , 0 , "C" );
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "A. Paterno" ), 1 , 0 , "C" );
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "A. Materno" ), 1 , 0 , "C" );
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "Correo" ), 1 , 0 , "C" );
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "RFC" ), 1 , 0 , "C" );
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "Telefono" ), 1 , 0 , "C" );
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "Sexo" ), 1 , 0 , "C" );
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "Fecha de ingreso" ), 1 , 0 , "C" );
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "Cargo" ), 1 , 0 , "C" );
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "Salario" ), 1 , 0 , "C" );
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "Estado Civil" ), 1 , 0 , "C" );
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "NSS" ), 1 , 0 , "C" );

	$pdf -> Ln ( 10 );
	$pdf -> SetFont ( 'Arial' , '' , 6 );
	while ( $fila = $res -> fetch_assoc ()) {
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "nombre" ]), 1 , 0 , "C" );
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "appaterno" ]), 1 , 0 , "C" );
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "apmaterno" ]), 1 , 0 , "C" );
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "correo" ]), 1 , 0 , "C" );
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "rfc" ]), 1 , 0 , "C" );
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "telefono" ]), 1 , 0 , "C" );
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "sexo" ]), 1 , 0 , "C" );
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "fechadeingreso" ]), 1 , 0 , "C" );
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "cargo" ]), 1 , 0 , "C" );
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "salario" ]), 1 , 0 , "C" );
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "estadocivil" ]), 1 , 0 , "C" );
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "nss" ]), 1 , 0 , "C" );
		$pdf -> Ln ( 10 );
	}
	$pdf -> Output();
 ?>
