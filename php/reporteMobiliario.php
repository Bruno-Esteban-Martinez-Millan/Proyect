<?php 
	require_once ( "../fpdf/fpdf.php" );
	require_once ( "mobiliario.php" );
	$pdf = new  FPDF ();
	$obj = new  Mobiliario ();
	$res = $obj -> consulta ();
	$pdf -> AddPage ();
	$pdf -> Image ( "../img/iconoreporte.png.png" , 5 , 5 , 15 , 15 );
	$pdf -> SetFont ( 'Arial' , 'B' , 20 );
	$pdf -> Cell ( 200 , 20 , "Reporte de Mobiliario" , 0 , 0 , "C" );
	$pdf -> Ln ( 30 );
	$pdf -> SetFont ( 'Arial' , 'B' , 10 );
	$ancho = 30 ;
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "Nombre" ), 1 , 0 , "C" );
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "Descripción" ), 1 , 0 , "C" );
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "Cantidad" ), 1 , 0 , "C" );
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "Nic" ), 1 , 0 , "C" );
	$pdf -> Cell ( $ancho , 10 , utf8_decode ( "Tipo" ), 1 , 0 , "C" );
	$pdf -> Ln ( 10 );
	$pdf -> SetFont ( 'Arial' , '' , 10 );
	while ( $fila = $res -> fetch_assoc ()) {
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "nombre" ]), 1 , 0 , "C" );
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "descripcion" ]), 1 , 0 , "C" );
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "cantidad" ]), 1 , 0 , "C" );
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "nic" ]), 1 , 0 , "C" );
		$pdf -> Cell ( $ancho , 10 , utf8_decode ( $fila [ "tipo" ]), 1 , 0 , "C" );
		$pdf -> Ln ( 10 );
	}
	$pdf -> Output();
 ?>
