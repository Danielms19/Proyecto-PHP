<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";


//Creamos la clase ROL
Class Rol
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}


	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM rol where condicion=1";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM permiso WHERE condicion=1";
		return ejecutarConsulta($sql);		
	}


	//Listar Permisos marcadas
	public function listarmarcados($idrol)
	{
		$sql="SELECT * FROM rol_permiso WHERE id_rol_rel='$idrol'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idrol)
	{
		$sql="SELECT * FROM rol WHERE idrol='$idrol'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los permisos marcados
	public function listarmarcados_sapia($idrol)
	{
		$sql="SELECT * FROM rol_permiso WHERE id_rol_rel='$idrol'";
		return ejecutarConsulta($sql);
	}
}

?>