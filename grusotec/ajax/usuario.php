<?php 
session_start(); 
//Referenciamos al modelo
require_once '../modelos/Usuario.php';
require_once '../modelos/Rol.php';

//Creamos la clase USUARIO Y ROL 
$usuario = new Usuario();
$rol_obj = new Rol();

//Declaramos las variables 
$idusuario = isset($_POST['idusuario'])? limpiarCadena($_POST['idusuario']):"";
$nombre = isset($_POST['nombre'])? limpiarCadena($_POST['nombre']):"";
$apaterno = isset($_POST['apaterno'])? limpiarCadena($_POST['apaterno']):"";
$amaterno = isset($_POST['amaterno'])? limpiarCadena($_POST['amaterno']):"";
$email = isset($_POST['email'])? limpiarCadena($_POST['email']):"";
$ocupacion = isset($_POST['ocupacion'])? limpiarCadena($_POST['ocupacion']):"";
$area = isset($_POST['area'])? limpiarCadena($_POST['area']):"";
$login = isset($_POST['usuario'])? limpiarCadena($_POST['usuario']):"";
$clave = isset($_POST['password'])? limpiarCadena($_POST['password']):"";
$rol = isset($_POST['rol'])? limpiarCadena($_POST['rol']):"";

//Creamos los casos 
switch ($_GET['op']) {

    //Creamos el caso listar USUARIO
	case 'listar':
		$rspta=$usuario->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
                            //Traemos los datos de la BD para rellenar la tabla
 				"0"=>($reg->usuario_condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idusuario.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idusuario.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre_usuario.', '.$reg->apaterno.' '.$reg->amaterno,
 				"2"=>$reg->login,
 				"3"=>$reg->area,
 				"4"=>$reg->nombre_rol,
 				"5"=>($reg->usuario_condicion)?'<span class="label bg-green">Habilitado</span>':
 				'<span class="label bg-red">Desactivado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

        //Creamos el caso mostrar USUARIO
	case 'mostrar':
		$rspta=$usuario->mostrar($idusuario);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

    //Creamos el caso verificar USUARIO
	case 'verificar':
		$logina=$_POST['logina'];
	    $clavea=$_POST['clavea'];
		$rspta=$usuario->verificar($logina, $clavea);
		$fetch=$rspta->fetch_object();

		if (isset($fetch))
	    {
	        //Declaramos las variables de sesión
	        $_SESSION['idusuario']=$fetch->idusuario;
	        $_SESSION['nombre']=$fetch->nombre_usuario .' '. $fetch->apaterno;
	        $_SESSION['rol']=$fetch->nombre_rol;
	        $_SESSION['idrol']=$fetch->idrol;
	       	

	        //Obtenemos los permisos del usuario
	    	$marcados = $rol_obj->listarmarcados_sapia($_SESSION['idrol']);

	    	//Declaramos el array para almacenar todos los permisos marcados
			$valores=array();

			//Almacenamos los permisos marcados en el array
			while ($per = $marcados->fetch_object())
				{
					array_push($valores, $per->id_permiso_rel);
				}

			//Determinamos los accesos del usuario
			in_array(1,$valores)?$_SESSION['escritorio']=1:$_SESSION['escritorio']=0;


	    }
	    echo json_encode($fetch);
	break;
	
        //Creamos el caso salir SESSIÒN
	case 'salir':
	//Limpiamos las variables de sesión   
        session_unset();
        //Destruìmos la sesión
        session_destroy();
        //Redireccionamos al login
        header("Location: ../index.php");

	break;


     //Creamos el caso guardar y editar USUARIO
	case 'guardaryeditar':
		if (empty($idusuario)){
			$rspta=$usuario->insertar($nombre, $apaterno, $amaterno, $email, $ocupacion, $area, $login, $clave, $rol);
			echo $rspta ? "Usuario registrado correctamente" : "Usuario no se pudo registrar";
		}
		else {
			$rspta=$usuario->editar($idusuario, $nombre, $apaterno, $amaterno, $email, $ocupacion, $area, $login, $clave, $rol);
			echo $rspta ? "Usuario actualizado correctamente" : "Usuario no se pudo actualizar";
		}
	break;

         //Creamos el caso desactivar USUARIO
	case 'desactivar':
		$rspta=$usuario->desactivar($idusuario);
 		echo $rspta ? "Usuario Desactivado" : "Usuario no se puede desactivar";
	break;

     //Creamos el caso activar USUARIO
	case 'activar':
		$rspta=$usuario->activar($idusuario);
 		echo $rspta ? "Usuario activado" : "Usuario no se puede activar";
	break;

}
 ?>