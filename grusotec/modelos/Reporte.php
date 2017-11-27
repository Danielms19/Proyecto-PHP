<?php

//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Reporte {

    //Implementamos nuestro constructor
    public function __construct() {
        
    }

    //Implementar un método para mostrar los datos de un registro a modificar
    public function mostrar() {
         $sql = "select 
cs.carrito_id,
c.nombre,
cs.cantidad,
s.nombre as servicio,
s.precio,
s.precio * cs.cantidad as total, 
c.pago,
c.fecha
from carrito_servicio cs 
inner join carrito c on cs.carrito_id=c.id
inner join servicio s on cs.servicio_id=s.id";
//        $sql = "SELECT * FROM v_reporte";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un método para listar los registros
    public function listare() {
        $sql = "select 
cs.carrito_id,
c.nombre,
cs.cantidad,
s.nombre as servicio,
s.precio,
s.precio * cs.cantidad as total, 
c.pago,
c.fecha
from carrito_servicio cs 
inner join carrito c on cs.carrito_id=c.id
inner join servicio s on cs.servicio_id=s.id";
//         $sql = "SELECT * FROM v_reporte";
        return ejecutarConsulta($sql);
    }
}

?>