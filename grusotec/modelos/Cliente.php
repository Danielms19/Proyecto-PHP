<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

//Creamos la clase CLIENTE
Class Cliente
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	
    //Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id)
	{
              //Realizamos la consulta a la tabla carrito
		$sql="SELECT * FROM carrito WHERE id='$id'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listare()
	{
            //Realizamos la consulta a la tabla carrito
		$sql="SELECT * FROM carrito ORDER BY nombre ASC";
		return ejecutarConsulta($sql);		
	}

        //Implementar un método para eliminar los registros
	public function eliminar($id)
	{
            //Realizamos la consulta a la tabla carrito para eliminar un cliente
		$sql="DELETE FROM carrito WHERE id='$id'";
		return ejecutarConsulta($sql);
	}
	
}

?>