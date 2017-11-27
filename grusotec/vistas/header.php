<?php 
session_id();
require '../config/global.php';


 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Grusotec</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">

    <link rel="stylesheet" href="../public/css/all.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/logo.png">
    <link rel="shortcut icon" href="../public/img/logo.ico">

    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="../public/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" type="text/css" href="../public/css/component.css">
    <!-- <link rel="stylesheet" type="text/css" href="../public/css/normalize.css"> -->

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>G</b>rusotec</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Sistema</b> Grusotec</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../files/usuarios/staff.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../files/usuarios/staff.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_SESSION['rol']; ?>
                      <small><?php echo $_SESSION['nombre']; ?></small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
	                <div class="pull-left">
	                 
	                </div>
	                <div class="pull-right">
	                  <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat">Cerrar Sesión</a>
	                </div>
              	  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <div class="user-panel">
	        <div class="pull-left image">
	          <img src="../files/usuarios/staff.png" class="img-circle" alt="User Image">
	        </div>
	        <div class="pull-left info">
	          <p><?php echo $_SESSION['nombre']; ?></p>
	          <a><i class="fa fa-circle text-success"></i><?php echo $_SESSION['rol'] .' '.$_SESSION['idrol']?> </a>
	        </div>
      	  </div>
          <ul class="sidebar-menu">
            <li class="header"></li>
<!--            <li>
              <a href="dashboard.php">
                <i class="fa fa-tasks"></i> <span>Inicio</span>
              </a>
            </li>            -->
            <li>
              <a href="usuario.php">
                <i class="fa fa-unlock-alt"></i> <span>USUARIOS</span>
              </a>
            </li>
            <li>
              <a href="servicio_u1.php">
                <i class="fa fa-bars"></i> <span>SERVICIO</span>
              </a>
            </li>  
                        <li>
              <a href="cliente.php">
                <i class="fa fa-user"></i> <span>CLIENTES</span>
              </a>
            </li>
            <li>
              <a href="reporte.php">
                <i class="fa fa-bar-chart"></i> <span>REPORTES</span>
              </a>
            </li>       
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>