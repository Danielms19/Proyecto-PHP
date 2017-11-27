<?php 
session_start(); 
//Referenciamos al modelo
require_once '../modelos/Incidencia.php';


//Creamos la clase servicio
$servicio = new Servicio();

//Declaramos las variables 
$idservicio = isset($_POST['idservicio'])? limpiarCadena($_POST['idservicio']):"";
$nombre = isset($_POST['nombre'])? limpiarCadena($_POST['nombre']):"";
$descripcion = isset($_POST['descripcion'])? limpiarCadena($_POST['descripcion']):"";
$precio = isset($_POST['precio'])? limpiarCadena($_POST['precio']):"";


//Creamos los casos 
switch ($_GET['op']) {
    
    //Creamos el caso listar SERVICIO
	case 'listar':
		$rspta=$servicio->listare();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
                            //Traemos los datos de la BD para rellenar la tabla
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="eliminar('.$reg->id.')"><i class="fa fa-trash"></i></button>',
 				"1"=>$reg->id,
 				"2"=>$reg->nombre,
 				"3"=>$reg->descripcion,
                                "4"=>$reg->precio,
 				"5"=>$reg->fecha_reg
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
        
        //Creamos el caso guardar y editar SERVICIO
	case 'mostrar':
		$rspta=$servicio->mostrar($id);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

    //Creamos el caso guardar y editar SERVICIO
	case 'guardaryeditar':
            
            $rspta=$servicio->insertar($nombre,$descripcion,$precio);
				echo $rspta ? "SERVICIO registrada correctamente" : "SERVICIO no se pudo registrar";
         
	break;

        //Creamos el caso eliminar SERVICIO
	case 'eliminar':
		$rspta=$servicio->eliminar($idservicio);
 		echo $rspta ? "SERVICIO eliminado" : "SERVICIO no se puede eliminar";
	break;
}
 ?>