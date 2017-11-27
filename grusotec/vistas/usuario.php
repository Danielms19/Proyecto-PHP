<?php

//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.php");
}
else{

require 'header.php';

?>
<!--Contenido-->

<script type="text/javascript">
    //Permite validar los campos  para texto 
    //[A-Za-z\s] : para todos las le6tras mayusuclas y minusculas
function validar(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
    patron =/[A-Za-z\s]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}

//Permite validar los campos  para texto y caracter
//[A-Za-z0-9]: combina letras y numeros
function validar2(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
    patron =/[A-Za-z0-9]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}
</script>
      <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Usuarios <button style="margin-left: 5px;" class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar Usuario</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre Completo</th>
                            <th>Usuario</th>
                            <th>Area</th>
                            <th>Rol</th>
                            <th>Estado</th>
                          </thead>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre:</label>
                            <input type="hidden" name="idusuario" id="idusuario">
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required autocomplete="off" onkeypress="return validar(event)">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Apellido Materno:</label>
                            <input type="text" class="form-control" name="apaterno" id="apaterno" maxlength="50" placeholder="Ap. Materno" required autocomplete="off" onkeypress="return validar(event)">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Apellido Paterno:</label>
                            <input type="text" class="form-control" name="amaterno" id="amaterno" maxlength="50" placeholder="Ap. Paterno" required autocomplete="off" onkeypress="return validar(event)">
                          </div>
                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Email:</label>
                            <input type="text" class="form-control" name="email" id="email" maxlength="50" placeholder="Email" required autocomplete="off">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Ocupación:</label>
                            <input type="text" class="form-control" name="ocupacion" id="ocupacion" maxlength="50" placeholder="Ocupación" required autocomplete="off" onkeypress="return validar(event)">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Área:</label>
                            <input type="text" class="form-control" name="area" id="area" maxlength="50" placeholder="Área" required autocomplete="off" onkeypress="return validar(event)">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Usuario:</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" maxlength="50" placeholder="Usuario" required autocomplete="off" onkeypress="return validar2(event)">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Contraseña:</label>
                            <input type="password" class="form-control" name="password" id="password" maxlength="50" placeholder="Contraseña" required autocomplete="off" onkeypress="return validar2(event)">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                           <label>Rol del Usuario:</label>
                                   <select name="rol" id="rol" class="form-control" required="">
                                    
                            </select>
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: right; margin-top: 25px;">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->

  <?php 
  require 'footer.php';
  ?>

  <script type="text/javascript" src="scripts/usuario.js"></script>
<?php 

}

ob_end_flush();
 ?>