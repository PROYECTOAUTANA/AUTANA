<?php 
/**
* controlador de trabajos
*/
require_once "app/modelo/trabajo.php";
require_once "app/modelo/trabajoFase.php";
require_once "app/modelo/trabajoLinea.php";
require_once "app/modelo/usuarioTrabajo.php";
require_once "app/modelo/rolModulo.php";

class Controlador_Trabajo{
	
	private $obj_trabajo;
	private $obj_trabajo_linea;
	private $obj_trabajo_fase;
	private $obj_usuario_trabajo;
	private $obj_rol_modulo;

	public function __construct()
	{
		$this->obj_trabajo = new Modelo_Trabajo();
		$this->obj_trabajo_fase = new Modelo_Trabajo_Fase();
		$this->obj_trabajo_linea = new Modelo_Trabajo_Linea();	
		$this->obj_usuario_trabajo = new Modelo_Usuario_Trabajo();	
		$this->obj_rol_modulo = new Modelo_Rol_Mod();		
	}

	public function registrar_trabajo(){
		session_start();
		$permiso = $this->obj_rol_modulo->verificar_permiso($_SESSION['id'],"insertar datos");

		if ($permiso) {
			$this->obj_trabajo->set_titulo($_POST['titulo']);
			$this->obj_trabajo->set_proceso($_POST['proceso']);
			$this->obj_trabajo->set_fecha_presentacion($_POST['fecha_pp']);
			$this->obj_trabajo->set_mension($_POST['mension']);
			$this->obj_trabajo->set_resumen($_POST['resumen']);

			$registro = $this->obj_trabajo->insertar();
			

			if (!$registro) {
				echo '<script>alert("Ya existe un trabajo con ese titulo en la base de datos")</script>';
				echo '<script>window.location.href = "?controller=front&action=trabajos";</script>';
			}else{

				$ultimo_trabajo = $this->obj_trabajo->obtener_ultimo_trabajo();
				$id_trabajo = $ultimo_trabajo->ultimo;

				$this->obj_trabajo_fase->set_fk_fase($_POST['fase']);
				$this->obj_trabajo_fase->set_fk_trabajo($id_trabajo);
				$this->obj_trabajo_fase->relacionar_fase();

				$this->obj_trabajo_linea->set_fk_linea($_POST['linea']);
				$this->obj_trabajo_linea->set_fk_trabajo($id_trabajo);
				$this->obj_trabajo_linea->relacionar_linea();

				echo '<script>alert("registrado con exito");</script>';
				echo '<script>window.location.href = "?controller=front&action=detalles_trabajo&id_trabajo='.$id_trabajo.'";</script>';
			}
		}else{
				echo '<script>alert("no posee permisos para realizar esta operacion!");</script>';
				echo '<script>window.location.href = "?controller=front&action=trabajos";</script>';
		}		
	}

	public function editar_trabajo(){

			$id_trabajo = $_POST['id_trabajo'];
			$titulo = $_POST['titulo'];
			$proceso = $_POST['proceso'];
			$fecha_pp = $_POST['fecha_pp'];
			$mension = $_POST['mension'];
			$resumen = $_POST['resumen'];

			$this->obj_trabajo->set_id($id_trabajo);
			$this->obj_trabajo->set_titulo($titulo);
			$this->obj_trabajo->set_proceso($proceso);
			$this->obj_trabajo->set_mension($mension);
			$this->obj_trabajo->set_resumen($resumen);

			$actualizar = $this->obj_trabajo->actualizar();

			if (!$actualizar) {
				echo '<script>alert("error en la operacion... no se pudieron actualizar los datos");</script>';
				echo '<script>window.location.href = "?controller=front&action=detalles_trabajo&id_trabajo='.$id_trabajo.'";</script>';
			}else{
				echo '<script>alert("operacion exitosa datos actualizados...");</script>';
				echo '<script>window.location.href = "?controller=front&action=detalles_trabajo&id_trabajo='.$id_trabajo.'";</script>';
			}
	}

	public function buscar_trabajo(){

			$filtro = $_POST['filtro'];

			$resultado = $this->obj_trabajo->buscar($filtro);
			
			if(!$resultado){
				echo 'No hay sugerencias para: <b>'.$filtro."</b>...";
			}else{

				$cantidad = count($resultado);
				echo '<br>'.$cantidad.'  Sugerencia(s) encontrada(s) para: <b>'.$filtro.'</b><br />';
				require_once "app/vista/resultado-busqueda-trabajo.php";
			} 
	}

	public function eliminar_trabajo(){
		session_start();
		$permiso = $this->obj_rol_modulo->verificar_permiso($_SESSION['id'],"eliminar datos");

		if ($permiso) {
			$id_trabajo = $_GET['id_trabajo'];
			$this->obj_trabajo->set_id($id_trabajo);
			$eliminar = $this->obj_trabajo->eliminar();		
			header("location: ?controller=front&action=trabajos");	

			if (!$eliminar) {
				echo '<script>alert("error en la operacion ... no se pudo eliminar este trabajo");</script>';
				echo '<script>window.location.href = "?controller=front&action=trabajos";</script>';
			}else{
				header("location: ?controller=front&action=detalles_trabajo&id_trabajo=$id_trabajo");
			}		
		}else{
				echo '<script>alert("no posee permisos para realizar esta operacion!");</script>';
				echo '<script>window.location.href = "?controller=front&action=trabajos";</script>';
		}		
	}

	public function quitar_docente(){

			$id_usuario = $_GET['id_usuario'];
			$id_trabajo = $_GET['id_trabajo'];
			$vinculo = $_GET['vinculo'];
			$this->obj_usuario_trabajo->set_fk_usuario($id_usuario);
			$this->obj_usuario_trabajo->set_vinculo($vinculo);
			$eliminar_relacion = $this->obj_usuario_trabajo->eliminar_relacion();	

			header("location: ?controller=front&action=detalles_trabajo&id_trabajo=$id_trabajo");
	}

	public function asignar_fase(){

			$id_trabajo = $_POST['id_trabajo'];
			$id_fase = $_POST['fase'];

			$this->obj_trabajo_fase->set_fk_trabajo($id_trabajo);
			$this->obj_trabajo_fase->set_fk_fase($id_fase);
			$asignar_fase = $this->obj_trabajo_fase->relacionar_fase();		
			if ($asignar_fase) {
				header("location: ?controller=front&action=detalles_trabajo&id_trabajo=$id_trabajo");
			}
	}

	public function asignar_linea(){

			$id_trabajo = $_POST['id_trabajo'];
			$id_linea = $_POST['linea'];

			$this->obj_trabajo_linea->set_fk_trabajo($id_trabajo);
			$this->obj_trabajo_linea->set_fk_linea($id_linea);
			$asignar_linea = $this->obj_trabajo_linea->relacionar_linea();		
			if ($asignar_linea) {
				header("location: ?controller=front&action=detalles_trabajo&id_trabajo=$id_trabajo");
			}	
	}

	public function cambio_de_fase(){

			$id_trabajo = $_POST['id_trabajo'];
			$id_fase = $_POST['fase'];

			$this->obj_trabajo_fase->set_fk_trabajo($id_trabajo);
			$this->obj_trabajo_fase->set_fk_fase($id_fase);
			$actualizar = $this->obj_trabajo_fase->actualizar_fase();	
	
			if ($actualizar) {
				echo '<script>alert("operacion exitosa fase actual.. actualizada");</script>';
				echo '<script>window.location.href = "?controller=front&action=detalles_trabajo&id_trabajo='.$id_trabajo.'";</script>';
			}		
	}

	public function cambio_de_linea(){

			$id_trabajo = $_POST['id_trabajo'];
			$id_linea = $_POST['linea'];

			$this->obj_trabajo_linea->set_fk_trabajo($id_trabajo);
			$this->obj_trabajo_linea->set_fk_linea($id_linea);
			$actualizar = $this->obj_trabajo_linea->actualizar_linea();

			if ($actualizar) {
				echo '<script>alert("correcto.. operacion exitosa linea de investigacion actual actualizada");</script>';
				echo '<script>window.location.href = "?controller=front&action=detalles_trabajo&id_trabajo='.$id_trabajo.'";</script>';
			}			
	}

	public function asignar_usuario(){

			$id_trabajo = $_POST['id_trabajo'];
			$id_usuario = $_POST['usuario'];
			$vinculo = $_POST['vinculo'];
			$this->obj_usuario_trabajo->set_fk_trabajo($id_trabajo);
			$this->obj_usuario_trabajo->set_fk_usuario($id_usuario);
			$this->obj_usuario_trabajo->set_vinculo($vinculo);
			
				//si el vinculo del usuario que se desea asignar es igual a autor
				if ($vinculo == "autor") {
					//consultar si este usuario es autor en algun otro trabajo  
					//de esta forma evitamos que espere ascender en varios trabajos
					
					$resultado = $this->obj_usuario_trabajo->consultar_usuario_vinculo();
					//si el usuario no es autor en otos trabajos lo vinculamos con este trabajo
					if (!$resultado) {
						$this->obj_usuario_trabajo->relacionar_usuario();	

						echo '<script>alert("operacion realizada con exito, usuario asignado al trabajo");</script>';
						echo '<script>window.location.href = "?controller=front&action=detalles_trabajo&id_trabajo='.$id_trabajo.'";</script>';
					}else{
						//si el autor si es autor en otros trabajos y esta esperando ascender 
						//no le permitimos vincularlo con este trabajo
						echo '<script>alert("este usuario posee almenos un trabajo como AUTOR sin aprobar aun");</script>';
						echo '<script>window.location.href = "?controller=front&action=detalles_trabajo&id_trabajo='.$id_trabajo.'";</script>';
					}
						//si el vinculo que se desea para este autor es de un tutor o un jurado hara esto
				}else{
					
					$consultar_vinculo =  $this->obj_usuario_trabajo->consultar_usuario_vinculo();

					if ($consultar_vinculo) {
						echo '<script>alert("ya este usuario utiliza ese vinculo ingresado en este trabajo...");</script>';
						echo '<script>window.location.href = "?controller=front&action=detalles_trabajo&id_trabajo='.$id_trabajo.'";</script>';
					}else{
						$this->obj_usuario_trabajo->relacionar_usuario();	
						echo '<script>alert("usuario asignado con exito al trabajo");</script>';
						echo '<script>window.location.href = "?controller=front&action=detalles_trabajo&id_trabajo='.$id_trabajo.'";</script>';
					}

					
					
				}
	}
}
?>