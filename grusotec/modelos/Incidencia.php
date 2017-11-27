<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";


//Creamos la clase SERVICIO
Class Servicio
{
    
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	//Implementamos un método para insertar registros
	public function insertar($nombre, $descripcion, $precio)
	{
            //Realizamos la consulta a la tabla carrito
		$sql="INSERT INTO servicio (nombre, descripcion, precio, fecha_reg)
		VALUES ('$nombre','$descripcion','$precio', now())";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($tipo_servicio, $observacion, $precio)
	{
            //Realizamos la consulta a la tabla serviciopara realizar actualizar un servicio
		$sql="UPDATE servicio SET empresa='$empresa', tipo_servicio='$tipo_servicio', estado='$estado', observacion='$observacion', area='$area' WHERE idincidencia='$idincidencia'";
		return ejecutarConsulta($sql);
	}

    //Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id)
	{
            //Realizamos la consulta a la tabla servicio para listar servicio
		$sql="SELECT * FROM servicio WHERE id='$id'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listare()
	{
            //Realizamos la consulta a la tabla servicio para listar servicio
		$sql="SELECT * FROM servicio ORDER BY precio ASC";
		return ejecutarConsulta($sql);		
	}

        //Implementar un método para eliminar los registros
	public function eliminar($id)
	{
            //Realizamos la consulta a la tabla servicio para eliminar un SERVICIO
		$sql="DELETE FROM servicio WHERE id='$id'";
		return ejecutarConsulta($sql);
	}
	
}

?>