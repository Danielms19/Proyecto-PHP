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

<script type="text/javascript">
function validar(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
    patron =/[A-Za-z\s]/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}

function validar2(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
    patron =/\d/; // 4
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}
</script>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                         <h1 class="box-title">Servicios <button style="margin-left: 5px;" class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar Servicios</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                   <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                           <th>ACCIÒN</th>
                            <th>N° SERVICIO</th>
                            <th>Tipo Servicio</th>               
                            <th>DESCRIPCIÒN</th>
                            <th>PRECIO</th>
                            <th>FECHA</th>
                            </thead>
                          <tbody>                            
                          </tbody>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST" enctype="multipart/form-data">

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Servicio:</label>
                            <input type="hidden" name="id" id="id" >
                            <select name="nombre" id="nombre" class="form-control" required autocomplete="off">
                              <option disable hidden value="">Seleccione una opcion aqui</option>
                              <option value="Help Desk Empresarial">Help Desk Empresarial</option>
                              <option value="Diseño y Marketing Publicitario" >Diseño y Marketing Publicitario</option>
                               <option value="Desarrollo Web/Movil">Desarrollo Web/Movil</option>
                              <option value="Cableado Estructurado" >Cableado Estructurado</option>
                               <option value="Camaras de Seguridad">Camaras de Seguridad</option>
                              <option value="Infraestructura Tecnologica">Infraestructura Tecnologica</option>
                               <option value="Capacitaciones Informaticas">Capacitaciones Informaticas</option>
                              <option value="Asesoramiento y Desarrollo de Tesis">Asesoramiento y Desarrollo de Tesis</option>
                            </select>                  
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripciòn:</label>
                            <textarea class="form-control" placeholder="Ingrese su informacion" rows="3" name="descripcion" id="descripcion" required autocomplete="off" onkeypress="return validar(event)"> </textarea>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Costo:</label>
                            <input type="text" class="form-control" name="precio" id="precio" maxlength="50" placeholder="S/. " required autocomplete="off" onkeypress="return validar2(event)">
                          </div>
                          
<!--                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                             <label>Agregar una Imagen</label>
                             <input type="file" class="form-control-file" name="imagen" id="imagen" required autocomplete="off">
                          </div>-->

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
 <script type="text/javascript" src="scripts/incidencia.js"></script>
<?php  

}

ob_end_flush();
?>