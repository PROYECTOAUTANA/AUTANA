function habilitar(value)

		{

			if(value==1 || value==false)

			{

				// deshabilitamos
				document.getElementById("departamento").disabled=true;
				document.getElementById("categoria_actual").disabled=true;
				document.getElementById("usuario").disabled=false;
				document.getElementById("clave").disabled=false;
				document.getElementById("rclave").disabled=false;

				

			}else if(value==2 || value==false){

				// deshabilitamos
				document.getElementById("departamento").disabled=true;
				document.getElementById("categoria_actual").disabled=true;
				document.getElementById("usuario").disabled=false;
				document.getElementById("clave").disabled=false;
				document.getElementById("rclave").disabled=false;
				

			}else if(value==3 || value==false)

			{

				// habilitamos
				document.getElementById("departamento").disabled=false;
				document.getElementById("categoria_actual").disabled=false;
				document.getElementById("usuario").disabled=true;
				document.getElementById("clave").disabled=true;
				document.getElementById("rclave").disabled=true;

			}else if(value==4 || value==false){

				// habilitamos
				document.getElementById("departamento").disabled=false;
				document.getElementById("categoria_actual").disabled=false;
				document.getElementById("usuario").disabled=true;
				document.getElementById("clave").disabled=true;
				document.getElementById("rclave").disabled=true;

			}
		}


