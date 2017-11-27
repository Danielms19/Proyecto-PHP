<?php
/*
* Este archio muestra los productos en una tabla.
*/
session_start();
include "php/conection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Carrito</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Grusotec</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Inicio</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Carrito</h1>
			<a href="./products.php" class="btn btn-default">Productos</a>
			<br><br>
<?php
/*
* Esta es la consula para obtener todos los productos de la base de datos.
*/
$products = $con->query("select * from servicio");
if(isset($_SESSION["carrito"]) && !empty($_SESSION["carrito"])):
?>
<h5>Los pagos de los servicios se efectuan con el Pago Contra Entrega, nos estaremos comunicando por E-mail o por telefono , gracias.</h5>
<table class="table table-bordered">
<thead>
	<th>Cantidad</th>
	<th>Servicio</th>
	<th>Descripcion</th>
	<th>Costo</th>
	<th>Total</th>
	<th></th>
</thead>
<?php 
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
foreach($_SESSION["carrito"] as $c):
$products = $con->query("select * from servicio where id=$c[servicio_id]");
$r = $products->fetch_object();
	?>
<tr>
<th><?php echo $c["cantidad"];?></th>
	<td><?php echo $r->nombre;?></td>
	<td><?php echo $r->descripcion;?></td>
	<td style="width:90px;" >S/. <?php echo $r->precio; ?></td>
	<td style="width:90px;" >S/. <?php echo $c["cantidad"]*$r->precio; ?></td>
	<td style="width:260px;">
	<?php
	$found = false;
	foreach ($_SESSION["carrito"] as $c) { if($c["servicio_id"]==$r->id){ $found=true; break; }}
	?>
		<a href="php/delfromcart.php?id=<?php echo $c["servicio_id"];?>" class="btn btn-danger">Eliminar</a>
	</td>
</tr>
<?php endforeach; ?>
</table>

<form class="form-horizontal" method="post" action="./php/process.php">
  <div class="form-group">
    <label for="inputNombre" class="col-sm-2 control-label">Nombre del cliente</label>
    <div class="col-sm-5">
        <input type="text" name="nombre" required class="form-control" id="inputEmail3" placeholder="Nombre del cliente">
    </div>
  </div>
   <div class="form-group">
    <label for="inputTelefono" class="col-sm-2 control-label">Telefono del cliente</label>
    <div class="col-sm-5">
        <input type="text" name="telefono" required class="form-control" id="inputTelefono" placeholder="Telefono del cliente">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email del cliente</label>
    <div class="col-sm-5">
        <input type="email" name="email" required class="form-control" id="inputEmail3" placeholder="Email del cliente">
    </div>
  </div>
   <div class="form-group">
    <label for="inputDireccion" class="col-sm-2 control-label">Direccion del cliente</label>
    <div class="col-sm-5">
        <input type="text" name="direccion" required class="form-control" id="inputDireccion" placeholder="Direccion del cliente">
    </div>
  </div>
   <div class="form-group">
    <label for="inputPago" class="col-sm-2 control-label">Tipo de Pago</label>
    <div class="col-sm-5">
        <select class="form-control" id="inputPago" name="pago">
            <option value="Pago Pago Contra Entrega">Pago Contra Entrega</option>
         </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Procesar </button>
    </div>
  </div>
</form>


<?php else:?>
	<p class="alert alert-warning">El carrito esta vacio.</p>
<?php endif;?>
<br><br><hr>
<p>© Todo los derechos son reservados.</p>
		</div>
	</div>
</div>
</body>
</html>