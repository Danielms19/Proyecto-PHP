<!DOCTYPE html>
<html lang="en">
<head>
 <!-- Titulo de la web -->
  <title>Grusotec</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Boostratp -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <!-- Css de los campos de la web-->
  <style>
  body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
  }
  p {font-size: 18px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
      background-color: #303841; /* Green */
      color: #ffffff;
  }
  .bg-2 { 
      background-color: #259f6c; /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 { 
      background-color: #ffffff; /* White */
      color: #555555;
  }
  .bg-4 { 
      background-color: #1e6b7f; /* Black Gray */
      color: #fff;
  }
  .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
  }
  .navbar {
      padding-top: 15px;
      padding-bottom: 15px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 12px;
      letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
      color: #1abc9c !important;
  }
  </style>

</head>
<body>
<!-- Navbar de la web -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Grusotec</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <!-- Direcciones del navbar-->
        <li><a href="#inicio">Inicio</a></li>
        <li><a href="#servicios">Servicios</a></li>
        <li><a href="./products.php">Carrito</a></li>
        <li><a href="#team">Team</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Inicio-->
<section id="inicio">
<div class="container-fluid bg-1 text-center">
  <h1 class="margin">GRUSOTEC</h1>
  <h1 class="margin">(EMPRESA TECNOLOGICA)</h1>
  <!-- Imagen -->
  <img src="imagenes/cartera.png" class="img-responsive" style="display:inline" alt="Bird" width="100" height="100">
</div>
</section>

<!-- Servicios-->
<section id="servicios">
<div class="container-fluid bg-3 text-center">    
  <h3 >NUESTROS SERVICIOS</h3>
  <h5>Servicios altamente profesionales.</h5><br>
  <div class="row">
    <!-- Separando en columnas-->
    <div class="col-sm-3">
      <!-- Imagen -->
    <img src="imagenes/responsive.png" class="img-responsive" style="display:inline" alt="Bird" width="100" height="100">
      <p>DESARROLLO WEB/ MOVIL</p>
    </div>
    <div class="col-sm-3"> 
      <img src="imagenes/nube.png" class="img-responsive" style="display:inline" alt="Bird" width="100" height="100">
      <p>CABLEADO ESTRUCTURADO</p>
    </div>
    <div class="col-sm-3"> 
      <img src="imagenes/servidor.png" class="img-responsive" style="display:inline" alt="Bird" width="100" height="100">
      <p>HELP DESK EMPRESARIAL</p>
    </div>
    <div class="col-sm-3"> 
      <img src="imagenes/diseño.png" class="img-responsive" style="display:inline" alt="Bird" width="100" height="100">
      <p>DISEÑO Y MARKETING PUBLICITARIO</p>
    </div>
    <div class="col-sm-3">
    <img src="imagenes/cctv.png" class="img-responsive" style="display:inline" alt="Bird" width="100" height="100">
      <p>CAMÁRAS DE SEGURIDAD</p>
    </div>
    <div class="col-sm-3"> 
      <img src="imagenes/transferir.png" class="img-responsive" style="display:inline" alt="Bird" width="100" height="100">
      <p>INFRAESTRUCTURA TECNOLOGÍCA</p>
    </div>
    <div class="col-sm-3"> 
      <img src="imagenes/conferencias.png" class="img-responsive" style="display:inline" alt="Bird" width="100" height="100">
      <p>CAPACITACIONES INFORMATICAS</p>
    </div>
    <div class="col-sm-3"> 
      <img src="imagenes/graduacion.png" class="img-responsive" style="display:inline" alt="Bird" width="100" height=" 100">
      <p>ASESORAMIENTO Y DESARROLLO DE TESIS</p>
  </div>
</div>
</div>
</section>

<!-- Carrito -->
<section id="carrito">
<div class="container-fluid bg-2 text-center">
  <h3 >SOLICITE NUESTROS SERVICIOS</h3>
  <p>Los mejores servicios la encuentras en nuestra empresa.</p>
  <!-- Enlace a los servicios -->
  <a href="./products.php" class="btn btn-default btn-lg">
    <!-- Icono -->
    <span class="glyphicon glyphicon-search"></span> CARRITO</a>
</div>
</section>

<!-- Team -->
<section id="team">
<div class="container-fluid bg-3 text-center">    
  <h3>EQUIPO DE TRABAJO</h3>
  <h5>Staff de Profesionales.</h5><br>
  <div class="row">
    <!-- Separando columnas -->
    <div class="col-sm-4">
    <img src="imagenes/chico1.png" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="150" height="150">
      <p>Daniel Mendoza Santos</p>
    </div>
    <div class="col-sm-4"> 
      <img src="imagenes/chico2.png" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="150" height="150">
      <p>Cieza Palma Charlie</p> 
    </div>
    <div class="col-sm-4"> 
      <img src="imagenes/chico3.png" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="150" height="150">
      <p>Jeffrey Vega Maslucan</p>
    </div>
  </div>
</div>
</section>
<!-- Pie de pagina -->
<footer class="container-fluid bg-4 text-center">
  <p>© Todo los derechos son reservados.</p> 
</footer>

</body>
</html>