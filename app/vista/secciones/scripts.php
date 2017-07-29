<link rel="stylesheet" href="src/css/bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="src/css/estilo.css"> 
<link rel="stylesheet" type="text/css" href="src/css/alert.css"> 
<link rel="stylesheet" type="text/css" href="src/css/jquery-ui-data.css"> 
<link rel="stylesheet" href="src/css/font-awesome.min.css"> 

<script src="src/js/jquery.js"></script> 
<script src="src/js/bootstrap.min.js"></script> 
<script src="src/js/fecha.js"></script> 
<script src="src/js/hora.js"></script> 
<script src="src/js/bootstrap-datepicker.min.js"></script> 
<script src="src/js/validar.js"></script> 
<script src="src/js/alert_personalizado.js"></script> 
<script src="src/js/numeros_letras.js"></script> 

<script type="text/javascript"> 

$( document ).ready(function() { 
	$("#fecha_pp").datepicker({ format: 'yyyy-mm-dd' });
	 $("#fecha_pp").on("change", function () { var fromdate = $(this).val(); }); 
}); 

</script>