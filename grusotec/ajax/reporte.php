<?php 
session_start(); 
require_once '../modelos/Reporte.php';

//Creamos la clase reporte
$reporte = new Reporte();

//Declaramos las variables 
$id = isset($_POST['id'])? limpiarCadena($_POST['id']):"";
$email = isset($_POST['email'])? limpiarCadena($_POST['email']):"";
$fecha = isset($_POST['fecha'])? limpiarCadena($_POST['fecha']):"";
$nombre = isset($_POST['nombre'])? limpiarCadena($_POST['nombre']):"";
$telefono = isset($_POST['telefono'])? limpiarCadena($_POST['telefono']):"";
$direccion = isset($_POST['direccion'])? limpiarCadena($_POST['direccion']):"";
$pago = isset($_POST['pago'])? limpiarCadena($_POST['pago']):"";

//Creamos los casos
switch ($_GET['op']) {
//Creamos el caso listar REPORTE
    case 'listar':
		$rspta=$reporte->listare();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(                  
                               //Traemos los datos de la BD para rellenar la tabla
 				"0"=>' <button class="btn btn-danger" onclick="eliminar('.$reg->carrito_id.')"><i class="fa fa-trash"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->cantidad,
 				"3"=>$reg->servicio,
                                "4"=>$reg->precio,
 				"5"=>$reg->total,
                                "6"=>$reg->pago,
 				"7"=>$reg->fecha,
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case 'mostrar':
		$rspta=$reporte->mostrar($id);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'eliminar':
		$rspta=$reporte->eliminar($id);
 		echo $rspta ? "REPORTE eliminado" : "REPORTE no se puede eliminar";
	break;
}
 ?>