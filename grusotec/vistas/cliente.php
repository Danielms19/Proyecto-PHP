<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';

?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                         <h1 class="box-title">Cliente </h1>
<!--                         <button style="margin-left: 5px;" class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar Cliente</button>-->
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                   <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                           <th>ACCIÒN</th>
                            <th>N° DE CLIENTE</th>
                            <th>NOMBRE</th>               
                            <th>TELEFONO</th>
                            <th>DIRECCION</th>
                            <th>EMAIL</th>
                            <th>FECHA</th>
                            </thead>
                          <tbody>                            
                          </tbody>
                        </table>
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
 <script type="text/javascript" src="scripts/cliente.js"></script>
<?php  

}

ob_end_flush();
?>