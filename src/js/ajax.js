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

function agregardocente(){
          $("#cedula2").show()
                            $("#agregar").hide()
                          }