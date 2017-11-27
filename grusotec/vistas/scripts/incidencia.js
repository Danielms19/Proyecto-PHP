var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);


	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
}



//Función limpiar
function limpiar()
{
	$("#empresa").val("");
	$("#nombre").val("");
	$("#estado").val("");
	$("#observacion").val("");
	$("#area").val("");
	$("#idservicio").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();

		//ocultar al inicio el combobox area
		$("#area_total").hide();

		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();

		$("#estado").change(function(){
           var valor_estado = $('select[id=estado]').val();
           if (valor_estado=='DERIVADO') {
            $("#area_total").show();
           }
           else{
            $("#area_total").hide();
           }
      	});
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
//		            'copyHtml5',
		            'excelHtml5',
//		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/incidencia.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}

function mostrar(id)
{
	$.post("../ajax/incidencia.php?op=mostrar",{id : id}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		//lado derecho son variabls de la bd
		$("#empresa").val(data.empresa);
		$("#nombre").val(data.tipo_servicio);
		$("#estado").val(data.estado);

		var condicion_estado = $("#estado").val();
		if (condicion_estado=='DERIVADO') {
			$("#area_total").show();
			$("#area").val(data.area);
		}
		
		$("#observacion").val(data.observacion);
		$("#idincidencia").val(data.idincidencia);

 	});
}

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/incidencia.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}

//Función para eliminar registros
function eliminar(id)
{
	bootbox.confirm("¿Está Seguro de eliminar esta SERVICIO?", function(result){
		if(result)
        {
        	$.post("../ajax/incidencia.php?op=eliminar", {idservicio : id}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

init();