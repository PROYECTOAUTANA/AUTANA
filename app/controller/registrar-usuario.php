<?php 

require_once "app/model/usuario.php";
			$obj_usuario = new Usuario();

			$id_usuario = rand();
			$id_categoria = rand();
			$id_departamento = rand();
			$id_usu_dep = rand();
			$id_rol = rand();
			$id_usu_rol = rand();

			$cedula = $_POST['cedula'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$sexo = $_POST['sexo'];
			$edad = $_POST['edad'];
			$telefono = $_POST['telefono'];
			$correo = $_POST['correo'];
			$direccion = $_POST['direccion'];
			$tipo = $_POST['tipo'];

			if ($tipo == 1 OR $tipo == 2) {

				$usuario = $_POST['usuario'];
				$clave = md5($_POST['clave']);
				$categoria = "ninguna";
				$result0 = $obj_usuario->registrar_categoria($id_categoria,$categoria);
				$result1 = $obj_usuario->registrar_usuario($id_usuario,$cedula,$nombre,$apellido,$sexo,$edad,$telefono,$correo,$direccion,$usuario,$clave,$tipo,$id_categoria);
				
				require_once "app/model/departamento.php";
				$departamento = "sin departamento";
				$obj_departamento = new Departamento();
				$result2 = $obj_departamento->registrar_departamento($id_departamento,$departamento);
				
				require_once "app/model/usuario-departamento.php";
				$obj_usuario_departamento = new Usuario_Departamento();
				$result3 = $obj_usuario_departamento->registrar_usuario_departamento($id_usu_dep,$id_usuario,$id_departamento);


				require_once "app/model/rol.php";
				$rol = "usuario del sistema";
				$obj_rol = new Rol();
				$result4 = $obj_rol->registrar_rol($id_rol,$rol);
				
				require_once "app/model/usuario-rol.php";
				$obj_usuario_rol = new Usuario_Rol();
				$result5 = $obj_usuario_rol->registrar_usuario_rol($id_usu_rol,$id_usuario,$id_rol);

				if ($result0 && $result1 && $result2 && $result3 && $result4 && $result5) {
					header("location: gestionar-usuarios");
				}else{
					echo "ERORR!";
				}

			}elseif ($tipo == 3 OR $tipo == 4) {
				
				$usuario = $cedula;
				$clave = md5($cedula);
				$categoria = $_POST['categoria_actual'];
				$result2 = $obj_usuario->registrar_categoria($id_categoria,$categoria);
				$result3 = $obj_usuario->registrar_usuario($id_usuario,$cedula,$nombre,$apellido,$sexo,$edad,$telefono,$correo,$direccion,$usuario,$clave,$tipo,$id_categoria);

				require_once "app/model/departamento.php";
				$departamento = $_POST['departamento'];
				$obj_departamento = new Departamento();
				$result4 = $obj_departamento->registrar_departamento($id_departamento,$departamento);
				
				require_once "app/model/usuario-departamento.php";
				$obj_usuario_departamento = new Usuario_Departamento();
				$result5 = $obj_usuario_departamento->registrar_usuario_departamento($id_usu_dep,$id_usuario,$id_departamento);

				require_once "app/model/rol.php";
				$rol = "usuario docente o jurado";
				$obj_rol = new Rol();
				$result6 = $obj_rol->registrar_rol($id_rol,$rol);
				
				require_once "app/model/usuario-rol.php";
				$obj_usuario_rol = new Usuario_Rol();
				$result7 = $obj_usuario_rol->registrar_usuario_rol($id_usu_rol,$id_usuario,$id_rol);

				if ($result2 && $result3 && $result4 && $result5 && $result6 && $result7) {

					header("location: gestionar-usuarios");
				
				}else{
				
					echo "ERORR!";
				}
			}	

?>