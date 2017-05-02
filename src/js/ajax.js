/**
**ARCHIVO ajax.js nos manejara toda la logica del cliente para hacer multiples consultas 
**/
//VARIABLES GLOBALES
var idTrabajoGlobal;
//BUSCAR UN USUARIO
function buscar1(){
	var n=document.getElementById('bus').value
	var url  = "?controller=usuario&action=buscar";

	$.ajax({
		type: "post",
		url: url,
		data:{n:n},
		success:function(resultado){
		$("#tabla").hide();
		$("#resultado").html(resultado);
		}		
	})
}

//BUSCAR UN TRABAJO
function buscar2(){

	var filtro=document.getElementById('bus').value;
	var url  = "?controller=trabajo&action=buscar";
	
	$.ajax({
		type: "post",
		url: url,
		data:{filtro},
		success:function(resultado){
		$(".outer_div").html(resultado);
		}		
	})
}
//VALIDA SI EL CORREO EXISTE
function validar(){

	var c=document.getElementById('email').value;
	var url  = "?controller=usuario&action=validar_correo";	

	$.ajax({
		type: "post",
		url: url,
		data:{c},
		success:function(resultado){
		$('#email').val("");
		$("#result").html(resultado);
		}		
	})
}
//LOGIN
function log(){

	var usuario=document.getElementById('user').value
	var password=document.getElementById('password').value
	var url  = "?controller=usuario&action=login";
	var datos = {u:usuario,p:password};

	$.ajax({
		type: "post",
		url: url,
		data : datos,  
		success:function(result){


			if (result.estado == true) {
				window.location.href = '?controller=front&action=inicio';
			}else{
				var usuario=document.getElementById('user').value=""
				var password=document.getElementById('password').value=""
				$("#resultados").html(result.mensaje)
			}
		}			
	})
}
//REGISTRA EL TRABAJO
function registrarTrabajo(){
 	var titulo=$("#titulo").val()
 	var proceso=$("#proceso").val()
 	var fecha_pp=$("#fecha_pp").val()
 	var linea=document.getElementById('linea_t').value
 	var fase=document.getElementById('fase_t').value

    var url  = "?controller=trabajo&action=registrar_trabajo"; 
    var datos = {"titulo":titulo,"proceso":proceso,"fecha_pp":fecha_pp,"linea":linea,"fase":fase};
    $.ajax({
        type: "post",
        url: url,
        data : datos, 
        success:function(result){

		if (result.estado === true) {
			   window.location.href = '?controller=front&action=detalles_trabajo&id_trabajo='+result.id;   
	    	}else{
	    		alert("error");
	    	}
		
		} 
    })
}

//REGISTRA EL USUARIO
function registrarUsuario(){
 	var cedula=$("#cedula").val()
 	var nombre=$("#nombre").val()
 	var apellido=$("#apellido").val()
 	var sexo=$("#sexo").val()
 	var telefono=$("#telefono").val()
	var correo=$("#correo").val()
 	var direccion=$("#direccion").val()
 	var categoria_actual=$("#categoria_actual").val()
 	var usuario=$("#usuario").val()
 	var clave=$("#clave").val()
 	var rol=$("#rol").val()
 	var departamento=$("#departamento").val()

    var url  = "?controller=usuario&action=registrar_usuario"; 
    var datos = {cedula,nombre,apellido,sexo,telefono,correo,direccion,categoria_actual,usuario,clave,rol,departamento};
    $.ajax({
        type: "post",
        url: url,
        data : datos, 
        success:function(result){

			if (result.estado === true) {

			$("#resultadoregistrarusuario").html("Listo...");
	        	$("#cedula").val("")
				$("#nombre").val("")
				$("#apellido").val("")
				$("#sexo").val("")
				$("#telefono").val("")
				$("#correo").val("")
				$("#direccion").val("")
				$("#categoria_actual").val("")
				$("#usuario").val("")
				$("#clave").val("")
				$("#rol").val()
				$("#departamento").val()
				$("#resultadoregistrarusuario").html("Listo...");
				window.location.href = '?controller=front&action=detalles_usuario&id_usuario='+result.id;
			    	
	    	}else{
	    		$("#resultadoregistrarusuario").html(result.mensaje);
	    	}
		} 
    })
}

//CONSULTA SI EL DOCENTE EXISTE PARA AGREGARLO AL TRABAJO
function consultardocente(){

	var docente=document.getElementById('docentet').value
  	var url  = "?controller=usuario&action=buscar_docente"; 

    $.ajax({
       	type: "post",
        url: url,
        data : {docente:docente}, 
        success: function(result) {
            $("#docentelist").html(result);  
        }   
   	}) 
}
//INCLUYE EL DOCENTE AL TRABAJO
function incluirdocente(){

	var id_trabajo=$("#id_trabajo").val();
	var vinculo=$("#vinculo").val();
 	var id_docente=document.getElementById("radio").value
    var url  = "?controller=usuarioTrabajo&action=vincular_usuario"; 

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
					$("#radio").val("")
					$("#docentet").val("")
					window.location.href = '?controller=front&action=detalles_trabajo&id_trabajo='+id_trabajo;

				}else if (result.estado === false) {
					$("#respuestadocentes").html(result.mensajeoperacion);
				}
			})
    
}
function cambiarFase(){

	var id_trabajo2=$("#id_trabajo2").val();
	var id_fase2=$("#id_fase2").val();
    var url  = "?controller=trabajoFase&action=cambiar_fase"; 

    var datos = {id_trabajo:id_trabajo2,id_fase:id_fase2};
	    	$.ajax({
				type: "post",
				url: url,
				data:datos,
				success:function(resultado){
					$("#respuestacambiarfase").html(resultado.mensajeoperacion);
					 window.location.href = '?controller=front&action=detalles_trabajo&id_trabajo='+id_trabajo2;   

				}		
			})
    
}
