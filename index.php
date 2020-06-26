<!DOCTYPE html>
<html lang = "es">
<head>
	<meta charset="utf-8">
      <link rel="stylesheet" href="css/Universal.css">
	<title></title>
</head>
<body>

			<nav >
				<ul>
					
                       
                        <a href="?sec=usu"><li>Usuarios</li></a>
					
						<a href="?sec=asi"><li>Asistencias</li></a>
					
						<a href="?sec=bal"><li>Balances</li></a>

						<a href="?sec=cli"><li>Clientes</li></a>

						<a href="?sec=com"><li>Compras</li></a>

						<a href="?sec=det"><li>Datalles de compra</li></a>

						<a href="?sec=dev"><li>Devoluciones</li></a>

						<a href="?sec=emp"><li>Empleados</li></a>

						<a href="?sec=eva"><li>Evaluaciones</li></a>

						<a href="?sec=jor"><li>Jornadas</li></a>

						<a href="?sec=man"><li>Mantenimiento</li></a>

						<a href="?sec=mat"><li>Materia prima</li></a>

						<a href="?sec=mob"><li>Mobiliario</li></a>

						<a href="?sec=pag"><li>Pagos</li></a>

						<a href="?sec=ped"><li>Pedidos</li></a>

						<a href="?sec=pro"><li>Productos</li></a>

						<a href="?sec=prov"><li>Proveedores</li></a>

						<a href="?sec=proy"><li>Proyectos</li></a>

					    <a href="?sec=acti"><li>Actividades</li></a>

						<a href="?sec=vent"><li>Ventas</li></a>

                        <a href="?sec=remp"><li>Remplazo</li></a>

					

				</ul>
			</nav>

<?php
if(isset($_GET["sec"])){
    $sec = $_GET["sec"];
    switch ($sec) {

        case 'usu':
                require_once("php/vista_usuario.php");
            break;

        case 'asi':
    			require_once("php/vista_asistencia.php");
    		break;

    		case 'bal':
    			require_once("php/vista_balance.php");
    		break;

    		case 'cli':
    			require_once("php/vista_cliente.php");
    		break;

    		case 'com':
    			require_once("php/vista_compra.php");
    		break;

    		case 'det':
    			require_once("php/vista_detCompra.php");
    		break;


    		case 'dev':
    			require_once("php/vista_devoluciones.php");
    		break;


    		case 'emp':
    			require_once("php/vista_empleado.php");
    		break;

    		case 'eva':
    			require_once("php/vista_evaluacion.php");
    		break;

    		case 'jor':
    			require_once("php/vista_jornada.php");
    		break;

    		case 'man':
    			require_once("php/vista_mantenimiento.php");
    		break;

    		case 'mat':
    			require_once("php/vista_materiaprima.php");
    		break;

    		case 'mob':
    			require_once("php/vista_mobiliario.php");
    		break;

    		case 'pag':
    			require_once("php/vista_pago.php");
    		break;

    		case 'ped':
    			require_once("php/vista_pedido.php");
    		break;

    		case 'pro':
    			require_once("php/vista_producto.php");
    		break;



    		case 'prov':
    		require_once("php/vista_proveedor.php");
    		break;

    		case 'proy':
    			require_once("php/vista_proyecto.php");
    		break;

    		
    		case 'acti':
    			require_once("php/vista_actividad.php");
    		break;
    	
            case 'vent':
                require_once("php/vista_ventas.php");
            break;

              case 'remp':
                require_once("php/vista_remplazo.php");
            break;
        
              case 'grafpro':
              require_once("php/graficaProducto.php");
              break; 

                case 'grafvent':
              require_once("php/graficaVentas.php");
              break; 
            
             case 'grafcomp':
              require_once("php/graficaCompras.php");
              break; 
              
               case 'grafmatp':
              require_once("php/graficaMateriaPrima.php");
              break; 

              case 'reppro':
                  header("Location: php/reporteProducto.php");
                  break;
             case 'repcli':
                  header("Location: php/reporteCliente.php");
                  break;
             case 'repcomp':
                  header("Location: php/reporteCompra.php");
                  break;
             case 'repemp':
                  header("Location: php/reporteEmpleado.php");
                  break;
             case 'repmatpri':
                  header("Location: php/reporteMateriaprima.php");
                  break;
             case 'repmob':
                  header("Location: php/reporteMobiliario.php");
                  break;
             case 'repprov':
                  header("Location: php/reporteProveedor.php");
                  break;
             case 'repvent':
                  header("Location: php/reporteVenta.php");
                  break;                              
                 
                 
    }
}

?>

</body>
</html>