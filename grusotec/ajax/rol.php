<?php 

//Referenciamos al modelo
require_once "../modelos/Rol.php";

//Creamos la clase ROL 
$rol=new Rol();


//Declaramos las variables
$idrol = isset($_POST['idrol'])? limpiarCadena($_POST['idrol']):"";

//Creamos los casos 
switch ($_GET["op"]){
	
	case 'listar':
		$rspta=$rol->select();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
                            //Traemos los datos de la BD para rellenar la tabla
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->idrol.')"><i class="fa fa-pencil"></i></button>',
 				"1"=>$reg->nombre
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	case 'mostrar';
				$rspta=$rol->mostrar($idrol);
				//codificar el resultado utilizando json
				echo json_encode($rspta);
		break;

	case "selectRol":
		require_once "../modelos/Rol.php";
		$rol = new Rol();

		$rspta = $rol->select();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option disable hidden value="">Seleccione</option>';
					echo '<option value=' . $reg->idrol . '>' . $reg->nombre . '</option>';
				}
	break;

	case "selectPermisoList":
		require_once "../modelos/Rol.php";
		$rol = new Rol();

		$rspta = $rol->listar();

		//Obtener los permisos asignados al usuario
		$id=$_GET['id'];
		$marcados = $rol->listarmarcados($id);
		//Declaramos el array para almacenar todas las permisos marcadas
		$valores=array();

		//Almacenar las permisos asignados al usuario en el array
		while ($per = $marcados->fetch_object())
			{
				array_push($valores, $per->id_permiso_rel); //segun el id de la tabla detalle
			}

		//Mostramos la lista de permisos en la vista y si están o no marcadas
		while ($reg = $rspta->fetch_object())
				{	
					$sw=in_array($reg->idpermiso,$valores)?'checked':'';
					echo '<li><input type="checkbox" '.$sw.' class="flat-red" value="'.$reg->idpermiso.'"> <label style="margin-left: 5px;">'. $reg->nombre . '</label></li>';
				}
	break;

	
}
?>