<?php 
/**
* controlador de reportes
*/
require_once "app/modelo/trabajo.php";
require_once "app/modelo/usuario.php";
require_once "app/modelo/usuarioTrabajo.php";
require_once "app/modelo/trabajoLinea.php";
require_once "app/modelo/trabajoFase.php";
require_once 'libs/mpdf/mpdf.php';
class Controlador_Reporte
{
	
	private $obj_trabajo;
	private $obj_usuario;
	private $obj_mpdf;
	private $obj_usuario_trabajo;
	private $obj_trabajo_fase;
	private $obj_trabajo_linea;

	public function __construct()
	{
		
		/*
		$mpdf = new mPDF('',    // mode - default ''
		 '',    // format - A4, for example, default ''
		 0,     // font size - default 0
		 '',    // default font family
		 15,    // margin_left
		 15,    // margin right
		 16,     // margin top
		 16,    // margin bottom
		 9,     // margin header
		 9,     // margin footer
		 'L');  // L - landscape, P - portrait
		*/
		 
		$this->obj_mpdf=new mPDF('c','A4','','',10,10,32,32,10,10); 
		$this->obj_trabajo = new Modelo_Trabajo();
		$this->obj_usuario = new Modelo_Usuario();	
		$this->obj_usuario_trabajo = new Modelo_Usuario_Trabajo();
		$this->obj_trabajo_fase = new Modelo_Trabajo_Fase();
		$this->obj_trabajo_linea = new Modelo_Trabajo_Linea();		
	}


	public function ver_estatus_trabajo(){
		/*CONSULTAMOS A LA BASE DE DATOS*/
		$id_trabajo = $_GET['id_trabajo'];
		$this->obj_trabajo->set_id($id_trabajo);
		$trabajo_datos = $this->obj_trabajo->consultar($id_trabajo);
		
		if (!$trabajo_datos) {
			$html = "No hay datos para mostrar sobre este usuario...";
		}else{

		$this->obj_trabajo_fase->set_fk_trabajo($id_trabajo);
		$trabajo_fase = $this->obj_trabajo_fase->consultar_trabajo();
			
		$this->obj_trabajo_linea->set_fk_trabajo($id_trabajo);
		$trabajo_linea = $this->obj_trabajo_linea->consultar_trabajo();

		/* CON ob_start() OBTENEMOS LO QUE ESTA EN EL ARCHIVO reporte_trabajos.php */
		$this->obj_mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins
		$header = file_get_contents('app/vista/reportes/sections/cabecera.php');
		$headerE = file_get_contents('app/vista/reportes/sections/cabecera.php');
		$footer = file_get_contents('app/vista/reportes/sections/footer.php');
		$footerE = file_get_contents('app/vista/reportes/sections/footer.php');
		$this->obj_mpdf->SetHTMLHeader($header);
		$this->obj_mpdf->SetHTMLHeader($headerE,'E');
		$this->obj_mpdf->SetHTMLFooter($footer);
		$this->obj_mpdf->SetHTMLFooter($footerE,'E');
		ob_start();
		require_once 'app/vista/reportes/estatus_trabajo.php';
		$html = ob_get_clean();
		}
		
		$this->obj_mpdf->WriteHTML($html);
		$prefijo = rand();
		$nombre = $prefijo."_estatus_autana.pdf";
		$this->obj_mpdf->Output($nombre,'D');
		exit;
	}

	public function reporte_de_trabajos_pdf(){
		/*CONSULTAMOS A LA BASE DE DATOS*/
		$datos_trabajo = $this->obj_trabajo->reportar_trabajos();
		/* CON ob_start() OBTENEMOS LO QUE ESTA EN EL ARCHIVO reporte_trabajos.php */
		$this->obj_mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins
		$header = file_get_contents('app/vista/reportes/sections/cabecera.php');
		$headerE = file_get_contents('app/vista/reportes/sections/cabecera.php');
		$footer = file_get_contents('app/vista/reportes/sections/footer.php');
		$footerE = file_get_contents('app/vista/reportes/sections/footer.php');
		$this->obj_mpdf->SetHTMLHeader($header);
		$this->obj_mpdf->SetHTMLHeader($headerE,'E');
		$this->obj_mpdf->SetHTMLFooter($footer);
		$this->obj_mpdf->SetHTMLFooter($footerE,'E');
		ob_start();
		require_once 'app/vista/reportes/reporte_trabajos.php';
		$html = ob_get_clean();
		$prefijo = rand();
		$nombre = $prefijo."_reporte_trabajos.pdf";
		$this->obj_mpdf->WriteHTML($html);
		$this->obj_mpdf->Output($nombre,'D');
		exit;
	}

	public function reporte_de_usuarios_pdf(){
		/*CONSULTAMOS A LA BASE DE DATOS*/
		$datos_usuario = $this->obj_usuario->reportar_usuarios();
		/* CON ob_start() OBTENEMOS LO QUE ESTA EN EL ARCHIVO reporte_trabajos.php */
		$this->obj_mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins
		$header = file_get_contents('app/vista/reportes/sections/cabecera.php');
		$headerE = file_get_contents('app/vista/reportes/sections/cabecera.php');
		$footer = file_get_contents('app/vista/reportes/sections/footer.php');
		$footerE = file_get_contents('app/vista/reportes/sections/footer.php');
		$this->obj_mpdf->SetHTMLHeader($header);
		$this->obj_mpdf->SetHTMLHeader($headerE,'E');
		$this->obj_mpdf->SetHTMLFooter($footer);
		$this->obj_mpdf->SetHTMLFooter($footerE,'E');
		ob_start();
		require_once 'app/vista/reportes/reporte_usuarios.php';
		$html = ob_get_clean();
		$prefijo = rand();
		$nombre = $prefijo."_reporte_usuarios.pdf";
		$this->obj_mpdf->WriteHTML($html);
		$this->obj_mpdf->Output($nombre,'D');
		exit;
	}
}
 ?>