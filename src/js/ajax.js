//VARIABLES GLOBALES

var idTrabajoTmp;

//BUSCAR UN USUARIO
function buscar1(){


	var n=document.getElementById('bus').value
	var url  = "?controller=usuario&action=buscar";
	
//user = user.toUpperCase();
$.ajax({
	type: "post",
	url: url,
	data:{n:n},
	success:function(resultado){
	$("#tabla").hide();
	$("#resultado").html(resultado);
	}		
})
};

//BUSCAR UN TRABAJO

function buscar2(){


	var filtro=document.getElementById('bus').value;
	var url  = "?controller=trabajo&action=buscar";
	
//user = user.toUpperCase();
$.ajax({
	type: "post",
	url: url,
	data:{filtro},
	success:function(resultado){
	$("#tabla").hide();
	$("#resultado").html(resultado);
	}		
})
};


//CONSULTAR CEDULA
function consultacedula(){


	var cedula=document.getElementById('cedula').value
	var url  = "?controller=usuario&action=consultar_cedula";
	
//user = user.toUpperCase();
$.ajax({
	type: "post",
	url: url,
	data:{c:cedula},
	success:function(resultado){
	$("#resultado_cedula").html(resultado);
	}		
})
};


function validar(){


	var c=document.getElementById('email').value;
	var url  = "?controller=usuario&action=validar_correo";
	
//user = user.toUpperCase();
$.ajax({
	type: "post",
	url: url,
	data:{c},
	success:function(resultado){
	$('#email').val("");
	$("#result").html(resultado);
	}		
})
};

	function log(){

	var usuario=document.getElementById('user').value
	var password=document.getElementById('password').value
	var url  = "?controller=usuario&action=login";
	
$.ajax({
	type: "post",
	url: url,
	data : {u:usuario,p:password}, 
    success: function(result) {
    $('#user').val("");
    $('#password').val("");
	$("#resultados").html(result);
	}		
})
};

      function consultardocente(){

  
  var docente=document.getElementById('docentet').value

  //var cedula_j2=document.getElementById('cedula_j2').value
  var url  = "?controller=usuario&action=buscar_docente"; 

            $.ajax({
            type: "post",
            url: url,
            data : {docente:docente}, 
              success: function(result) {

                $("#docentelist").html(result);
              
            }   
          })

  
  
  
};


 function incluirdocente(){

	var id_trabajo=$("#id_trabajo").val();
 	var id_docente=document.getElementById("radio").value
 	var vinculo=document.getElementById("vinculo").value
    var url  = "?controller=trabajo&action=vincular_usuario"; 

    var datos = {"id_trabajo":id_trabajo,"id_docente":id_docente,"vinculo":vinculo};

            $.ajax({
            type: "post",
            url: url,
            data : datos, 
            beforeSend: function () {
                $("#botonincluirdocente").val("Procesando, espere por favor...");
            }  
          }).done(function(result){
			
			if (result.estado === true) {

				$("#botonincluirdocente").val(result.mensajeboton);
				$("#respuestadocentes").html(result.mensajeoperacion);
			}else if (result.estado === false) {
				$("#respuestadocentes").html(result.mensajeoperacion);
			}
	});
       

}

 function registrartrabajo(){
 	var titulo=$("#titulo").val();
 	var proceso=$("#proceso").val();
 	var fecha_pp=$("#fecha_pp").val();
 	var linea=$("#linea").val();
 	var categoria_ascenso=$("#categoria_ascenso").val();
 	var fase=$("#fase").val();
 	var observacion=$("#observacion").val();

    var url  = "?controller=trabajo&action=registrar_trabajo"; 
    var datos = {"titulo":titulo,"proceso":proceso,"fecha_pp":fecha_pp,"linea":linea,"categoria_ascenso":categoria_ascenso,"fase":fase,"observacion":observacion};
            $.ajax({
            type: "post",
            url: url,
            data : datos, 
            beforeSend: function () {
                 $("#botonregistrartrabajo").val("Procesando, espere por favor...");
            }  
          }).done(function(result){

	          	if (result.estado === true) {

	          		idTrabajoTmp = result.id
	          		$("#titulo").val("")
					$("#proceso").val("")
					$("#fecha_pp").val("")
					$("#linea").val("")
					$("#categoria_ascenso").val("")
					$("#fase").val("")
					$("#observacion").val("")
					$("#botonregistrartrabajo").val("Listo...");
	            	$("#incluirdocente").modal("show")
	            	$("#inputoculto").append('<input type="hidden" class="form-control" name="id_trabajo" id="id_trabajo" value="'+idTrabajoTmp+'" /></div>')
	            	$("#nuevo_trabajo").modal("hide")
	          	}
          	})
    
}

