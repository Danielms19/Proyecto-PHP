<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";


//Creamos la clase USUARIO
Class Usuario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}


	//Implementamos un método para insertar registros
	public function insertar($nombre, $apaterno, $amaterno, $email, $ocupacion, $area, $login, $clave, $rol)
	{
		$sql="INSERT INTO usuario (nombre, apaterno, amaterno, email, ocupacion, area, login, clave, rol, condicion)
		VALUES ('$nombre','$apaterno','$amaterno','$email','$ocupacion','$area','$login', '$clave', '$rol', '1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idusuario,$nombre, $apaterno, $amaterno, $email, $ocupacion, $area, $login, $clave, $rol)
	{
		$sql="UPDATE usuario SET nombre='$nombre',apaterno='$apaterno',amaterno='$amaterno',email='$email',ocupacion='$ocupacion',area='$area',login='$login', clave='$clave', rol ='$rol' WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}


	//Función para verificar el acceso al sistema
	public function verificar($login,$clave)
    {
    	$sql="SELECT usuario.idusuario, usuario.nombre as nombre_usuario, usuario.apaterno , r.nombre as nombre_rol, usuario.login, usuario.clave, usuario.rol as idrol FROM usuario 
    	INNER JOIN rol r
		ON usuario.rol=r.idrol
		WHERE usuario.login='$login' AND usuario.clave='$clave' AND usuario.condicion='1'"; 
    	return ejecutarConsulta($sql);  
    }

    //Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idusuario)
	{
		$sql="SELECT * FROM usuario WHERE idusuario='$idusuario'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT *,rol.nombre as nombre_rol, usuario.nombre as nombre_usuario, usuario.condicion as usuario_condicion  FROM usuario
		INNER JOIN rol
		ON usuario.rol=rol.idrol";
		return ejecutarConsulta($sql);		
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idusuario)
	{
		$sql="UPDATE usuario SET condicion='0' WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idusuario)
	{
		$sql="UPDATE usuario SET condicion='1' WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}


	
	
}

?>