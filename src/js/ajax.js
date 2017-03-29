function nueva(f) {
  	var url  = "?controller=docente&action=buscar";
	var filtro = f.elements["filtro"].value;
//user = user.toUpperCase();
$.ajax({
	type: "post",
	url: url,
	data:{f:filtro},
	success:function(resultado){
	$("#mensaje1").html(resultado);
	}		
})
}