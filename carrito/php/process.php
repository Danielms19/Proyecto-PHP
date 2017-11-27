<?php 
//Registraremos al cliente con los servicios seleccionados
session_start();
include "conection.php";
if(!empty($_POST)){
	//insertamos los datos del cliente
$q1 = $con->query("insert into carrito(nombre,telefono,direccion,email,pago,fecha) value(\"$_POST[nombre]\",\"$_POST[telefono]\",\"$_POST[direccion]\",\"$_POST[email]\",\"$_POST[pago]\",NOW())");
//insertamos los datos del cliente y los servicios seleccionados  en la tabla carrito_servicio
if($q1){
$cart_id = $con->insert_id;
foreach($_SESSION["carrito"] as $c){
	//insertamos los datos del cliente + servicios seleccionados
$q1 = $con->query("insert into carrito_servicio(servicio_id,cantidad,carrito_id) value($c[servicio_id],$c[cantidad],$cart_id)");
}
unset($_SESSION["carrito"]);
}
}
//Si todo salio bien nos muestra un mensaje
print "<script>alert('Venta procesada exitosamente');window.location='../products.php';</script>";
?>