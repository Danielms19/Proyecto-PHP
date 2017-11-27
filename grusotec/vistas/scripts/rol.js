var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();




	//Cargamos los permisos en la lista de checkbox
	$.post("../ajax/rol.php?op=selectPermisoList&id=", function(r){
	            $("#idpermiso").html(r);
	});
}


//Función limpiar
function limpiar()
{
	$("#idrol").val("");
	$("#nombre").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
	//limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").hide();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();

	mostrarform(false);

	$.post("../ajax/rol.php?op=selectPermisoList&id=", function(r){
	            $("#idpermiso").html(r);
	});
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
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/rol.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 8,//Paginación
	    "order": [[ 0, "asc" ]]//Ordenar (columna,orden)
	}).DataTable();
}

function mostrar(idrol)
{
	$.post("../ajax/rol.php?op=mostrar",{idrol : idrol}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		//lado derecho son variabls de la bd
		$("#nombre").val(data.nombre);
		$("#idrol").val(data.idrol);

 	});

 	$.post("../ajax/rol.php?op=selectPermisoList&id="+idrol, function(r){
	            $("#idpermiso").html(r);
	});
}

init();