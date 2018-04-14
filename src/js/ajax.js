
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
