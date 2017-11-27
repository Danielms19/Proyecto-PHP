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
                         <h1 class="box-title">Reporte Cliente</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                   <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                           <th>ACCIÒN</th>
                            <th>CLIENTE</th>
                            <th>CANTIDAD</th>               
                            <th>SERVICIO</th>
                            <th>PRECIO</th>
                            <th>TOTAL</th>
                            <th>PAGO</th>
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
  <script type="text/javascript" src="scripts/reporte.js"></script>
<?php  

}

ob_end_flush();
?>