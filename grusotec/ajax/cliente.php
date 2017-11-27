<?php 
session_start(); 
require_once '../modelos/Cliente.php';

//Creamos la clase cliente
$cliente = new Cliente();

//Declaramos las variables 
$id = isset($_POST['id'])? limpiarCadena($_POST['id']):"";
$email = isset($_POST['email'])? limpiarCadena($_POST['email']):"";
$fecha = isset($_POST['fecha'])? limpiarCadena($_POST['fecha']):"";
$nombre = isset($_POST['nombre'])? limpiarCadena($_POST['nombre']):"";
$telefono = isset($_POST['telefono'])? limpiarCadena($_POST['telefono']):"";
$direccion = isset($_POST['direccion'])? limpiarCadena($_POST['direccion']):"";

//Creamos los casos 
switch ($_GET['op']) {
        
    //Creamos el caso listar CLIENTE
	case 'listar':
		$rspta=$cliente->listare();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
                            //Traemos los datos de la BD para rellenar la tabla
 				"0"=>' <button class="btn btn-danger" onclick="eliminar('.$reg->id.')"><i class="fa fa-trash"></i></button>',
 				"1"=>$reg->id,
 				"2"=>$reg->nombre,
 				"3"=>$reg->telefono,
                                "4"=>$reg->direccion,
 				"5"=>$reg->email,
 				"6"=>$reg->fecha

 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

        //Creamos el caso mostrar CLIENTE
	case 'mostrar':
		$rspta=$cliente->mostrar($id);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

    //Creamos el caso eliminar CLIENTE
	case 'eliminar':
		$rspta=$cliente->eliminar($id);
 		echo $rspta ? "CLIENTE eliminado" : "CLIENTE no se puede eliminar";
	break;
}
 ?>