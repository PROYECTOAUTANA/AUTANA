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

    $("#incluirdocente").modal("hide"); 
    $("#nuevo_trabajo").modal("show"); 

    var radio=$("input:radio").val();
    var vinculo=$("#vinculo").val();


    var MaxInputs       = 6; //Número Maximo de Campos si pongo uno me lee 2 porque empieza en 0
    var contenedor       = $("#ponmeloaqui"); //ID del contenedor
//var x = número de campos existentes en el contenedor
    var x = $("#ponmeloaqui div").length+1;
    var Count = x-1; //para el seguimiento de los campos

        if(x <= MaxInputs) //max input box allowed
        {
            Count++;
            //agregar campo
            $(contenedor).append('<div class="form-group"><label for="">'+vinculo+' :</label><input type="text" readonly class="form-control" name="docente[]" id="docente'+ Count +'" value="'+radio+' - '+vinculo+'" /></div>');
            x++; //text box increment
        }else if (x >= MaxInputs) {

        	alert("la cantidad maxima de docentes a registrar es de 2 por trabajo");
        }

}

 function registrartrabajo(){
    var url  = "?controller=trabajo&action=registrar_trabajo"; 

            $.ajax({
            type: "post",
            url: url,
            data : {docente:docente}, 
              success: function(result) {

                $("#respuesta").html(result);
              
            }   
          })
    
}

function mostrarincluirdocente(){

	$("#incluirdocente").modal("show");
	$("#nuevo_trabajo").modal("hide");


}

