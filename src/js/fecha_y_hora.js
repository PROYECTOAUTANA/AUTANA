function damelafecha(){

  var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
var f=new Date();
var fecha = document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
return fecha;//reloj
}

function hora(){
var fecha= new Date();
var horas= fecha.getHours();
var minutos = fecha.getMinutes();
var m = "AM";
if(horas==12) 
{ 
    m="M.D."; 
} 
if(horas==13) 
{ 
    horas="0"+1; 
    m="P.M."; 
} 
if(horas==14) 
{ 
    horas="0"+2; 
    m="P.M."; 
} 
if(horas==15) 
{ 
    horas="0"+3; 
    m="P.M."; 
} 
if(horas==16) 
{ 
    horas="0"+4; 
    m="P.M."; 
} 
if(horas==17) 
{ 
    horas="0"+5; 
    m="P.M."; 
} 
if(horas==18) 
{ 
    horas="0"+6; 
    m="P.M."; 
} 
if(horas==19) 
{ 
    horas="0"+7; 
    m="P.M."; 
} 
if(horas==20) 
{ 
    horas="0"+8; 
    m="P.M."; 
} 
if(horas==21) 
{ 
    horas="0"+9; 
    m="P.M."; 
} 
if(horas==22) 
{ 
    horas=10; 
    m="P.M."; 
} 
if(horas==23) 
{ 
    horas=11; 
    m="P.M."; 
} 
if((horas==0)||(horas==24)) 
{ 
    horas=12; 
    m="M.N"; 
}
if (minutos<10) {
  minutos = "0"+minutos;
}
document.getElementById('contenedor').innerHTML=''+horas+':'+minutos+' '+m;
setTimeout('hora()',1000);
}
