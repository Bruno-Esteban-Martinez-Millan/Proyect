<?php 
	require_once ( "../fpdf/fpdf.php" );
	require_once ( "proveedor.php" );
	$pdf = new  FPDF ();
	$obj = new  Proveedor ();
	$res = $obj -> consulta ();
	$pdf -> AddPage ();
	$pdf -> Image ( "../img/iconoreporte.png.png" , 5 , 5 , 15 , 15 );
	$pdf -> SetFont ( 'Arial' , 'B' , 20 );
	$pdf -> Cell ( 200 , 20 , "Reporte de Proveedores" , 0 , 0 , "C" );
	$pdf -> Ln ( 30 );
	$pdf -> SetFont ( 'Arial' , 'B' , 10 );
	$ancho = 30 ;
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "Nombre" ), 1 , 0 , "C" );
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "Telefono" ), 1 , 0 , "C" );
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "Dirección" ), 1 , 0 , "C" );
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "Correo" ), 1 , 0 , "C" );
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "RFC" ), 1 , 0 , "C" );
	$pdf -> Ln ( 10 );
	$pdf -> SetFont ( 'Arial' , '' , 10 );
	while ( $fila = $res -> fetch_assoc ()) {
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "nombre" ]), 1 , 0 , "C" );
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "telefono" ]), 1 , 0 , "C" );
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "direccion" ]), 1 , 0 , "C" );
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "correo" ]), 1 , 0 , "C" );
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "rfc" ]), 1 , 0 , "C" );
		$pdf -> Ln ( 10 );
	}
	$pdf -> Output();
 ?>
