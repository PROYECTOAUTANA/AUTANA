<?php 
/**
* controlador de reportes
*/
require_once "app/model/departamento.php";
require_once "app/model/usuario-departamento.php";
require_once "app/model/rol.php";
require_once "app/model/usuario-rol.php";
require_once "app/model/usuario.php";
require_once "app/model/trabajo.php";
require_once "app/model/fase.php";
require_once "app/model/linea.php";
require_once "app/model/usuario-trabajo.php";
require_once "app/model/trabajo-linea.php";
require_once "app/model/trabajo-fase.php";
require_once 'libs/mpdf/mpdf.php';
require_once 'libs/PHPExcel/Classes/PHPExcel.php';
class C_Reportes
{
	
	private $obj_usuario;
	private $obj_trabajo;
	private $obj_linea;
	private $obj_fase;
	private $obj_trabajo_linea;
	private $obj_trabajo_fase;
	private $obj_usuario_trabajo;
	private $obj_departamento;
	private $obj_usuario_departamento;
	private $obj_usuario_rol;
	private $obj_rol;
	private $obj_mpdf;
	private $obj_PHPExcel;

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
		$this->obj_PHPExcel = new PHPExcel();	
		$this->obj_trabajo = new Trabajo();	
		$this->obj_usuario = new Usuario();	
		$this->obj_linea = new Linea();	
		$this->obj_fase = new Fase();	
		$this->obj_trabajo_linea = new Trabajo_Linea();	
		$this->obj_trabajo_fase = new Trabajo_Fase();	
		$this->obj_usuario_trabajo = new Usuario_Trabajo();	
		$this->obj_departamento = new Departamento();
		$this->obj_rol = new Rol();	
		$this->obj_usuario_departamento = new Usuario_Departamento();
		$this->obj_usuario_rol = new Usuario_Rol();	
	}


	public function estatus(){
		/*CONSULTAMOS A LA BASE DE DATOS*/
		$id_trabajo = $_GET['id_trabajo'];
		$array_db = $this->obj_trabajo->consultar_trabajo($id_trabajo);
		/* CON ob_start() OBTENEMOS LO QUE ESTA EN EL ARCHIVO reporte_trabajos.php */
		$this->obj_mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins
		$header = file_get_contents('app/view/reportes/sections/cabecera.php');
		$headerE = file_get_contents('app/view/reportes/sections/cabecera.php');
		$footer = file_get_contents('app/view/reportes/sections/footer.php');
		$footerE = file_get_contents('app/view/reportes/sections/footer.php');
		$this->obj_mpdf->SetHTMLHeader($header);
		$this->obj_mpdf->SetHTMLHeader($headerE,'E');
		$this->obj_mpdf->SetHTMLFooter($footer);
		$this->obj_mpdf->SetHTMLFooter($footerE,'E');
		ob_start();
		require_once 'app/view/reportes/estatus_trabajo.php';
		$html = ob_get_clean();
		$this->obj_mpdf->WriteHTML($html);
		$prefijo = rand();
		$nombre = $prefijo."_estatus_autana.pdf";
		$this->obj_mpdf->Output($nombre,'D');
		exit;
	}

	public function trabajos_pdf(){
		/*CONSULTAMOS A LA BASE DE DATOS*/
		$array_db = $this->obj_trabajo->todos_los_trabajos();
		$db = $array_db['datos'];
		$dbc = $array_db['cantidad'];
		/* CON ob_start() OBTENEMOS LO QUE ESTA EN EL ARCHIVO reporte_trabajos.php */
		$this->obj_mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins
		$header = file_get_contents('app/view/reportes/sections/cabecera.php');
		$headerE = file_get_contents('app/view/reportes/sections/cabecera.php');
		$footer = file_get_contents('app/view/reportes/sections/footer.php');
		$footerE = file_get_contents('app/view/reportes/sections/footer.php');
		$this->obj_mpdf->SetHTMLHeader($header);
		$this->obj_mpdf->SetHTMLHeader($headerE,'E');
		$this->obj_mpdf->SetHTMLFooter($footer);
		$this->obj_mpdf->SetHTMLFooter($footerE,'E');
		ob_start();
		require_once 'app/view/reportes/reporte_trabajos.php';
		$html = ob_get_clean();
		$prefijo = rand();
		$nombre = $prefijo."_reporte_trabajos.pdf";
		$this->obj_mpdf->WriteHTML($html);
		$this->obj_mpdf->Output($nombre,'D');
		exit;
	}

	public function trabajos_excel(){

		$prefijo = rand();
		$nombre = $prefijo."_trabajos_autana.xls";
		$array_db = $this->obj_trabajo->todos_los_trabajos();
		$db = $array_db['datos'];
		// Set document properties
		$this->obj_PHPExcel->getProperties()->setCreator("SNFDU - UPTAEB")
		               ->setLastModifiedBy("Raquel Velazco")
		               ->setTitle("Office XLSX Test Document")
		               ->setSubject("Office XLSX Test Document")
		               ->setDescription("Reporte de trabajos de ascenso sitema autana , generado desde el sistema.");

		$this->obj_PHPExcel->getDefaultStyle()->getFont()->setName('Arial')
		                                          ->setSize(10); 
          
		$this->obj_PHPExcel->setActiveSheetIndex(0)
					->setCellValue('A2', 'REPORTE DE TRABAJOS REGISTRADOS')
					->mergeCells('A2:D2')
		            ->setCellValue('A4', 'ID')
		            ->setCellValue('B4', 'TITULO')
		            ->setCellValue('C4', 'DOCENTE ')
		            ->setCellValue('D4', 'FASE');

		$i = 6;
		foreach ($db as $row) {

		$this->obj_PHPExcel->setActiveSheetIndex(0)
		            ->setCellValue("A$i", $row['id_trabajo'])
		            ->setCellValue("B$i", $row['trabajo_titulo'])
		            ->setCellValue("C$i", $row['usuario_nombre'])
		            ->setCellValue("D$i", $row['fase_nombre']);
		$i++;
		}

		$this->obj_PHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$this->obj_PHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$this->obj_PHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$this->obj_PHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);

		$this->obj_PHPExcel->getActiveSheet()->setTitle('Informe de trabajos');
		$this->obj_PHPExcel->setActiveSheetIndex(0);

		 // Redirect output to a client’s web browser (Excel5)
		  header('Content-Type: application/vnd.ms-excel');
		  header('Content-Disposition: attachment;filename='.$nombre);
		  header('Cache-Control: max-age=0');
		  // If you're serving to IE 9, then the following may be needed
		  header('Cache-Control: max-age=1');

		  // If you're serving to IE over SSL, then the following may be needed
		  header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		  header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		  header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		  header ('Pragma: public'); // HTTP/1.0


		$objWriter = PHPExcel_IOFactory::createWriter($this->obj_PHPExcel, 'Excel5');
		$objWriter->save('php://output');

		exit;
	}		

	public function usuarios_pdf(){
		/*CONSULTAMOS A LA BASE DE DATOS*/
		$array_db = $this->obj_usuario->todos_los_usuarios();
		$db = $array_db['datos'];
		$dbc = $array_db['cantidad'];
		/* CON ob_start() OBTENEMOS LO QUE ESTA EN EL ARCHIVO reporte_trabajos.php */
		$this->obj_mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins
		$header = file_get_contents('app/view/reportes/sections/cabecera.php');
		$headerE = file_get_contents('app/view/reportes/sections/cabecera.php');
		$footer = file_get_contents('app/view/reportes/sections/footer.php');
		$footerE = file_get_contents('app/view/reportes/sections/footer.php');
		$this->obj_mpdf->SetHTMLHeader($header);
		$this->obj_mpdf->SetHTMLHeader($headerE,'E');
		$this->obj_mpdf->SetHTMLFooter($footer);
		$this->obj_mpdf->SetHTMLFooter($footerE,'E');
		ob_start();
		require_once 'app/view/reportes/reporte_usuarios.php';
		$html = ob_get_clean();
		$prefijo = rand();
		$nombre = $prefijo."_reporte_usuarios.pdf";
		$this->obj_mpdf->WriteHTML($html);
		$this->obj_mpdf->Output($nombre,'D');
		exit;
	}

	public function usuarios_excel(){

		$prefijo = rand();
		$nombre = $prefijo."_usuarios_autana.xls";
		$array_db = $this->obj_usuario->todos_los_usuarios();
		$db = $array_db['datos'];
		// Set document properties
		$this->obj_PHPExcel->getProperties()->setCreator("SNFDU - UPTAEB")
		               ->setLastModifiedBy("Raquel Velazco")
		               ->setTitle("Office XLSX Test Document")
		               ->setSubject("Office XLSX Test Document")
		               ->setDescription("Reporte de usuarios del sitema autana , generado desde el sistema.");

		$this->obj_PHPExcel->getDefaultStyle()->getFont()->setName('Arial')
		                                          ->setSize(10); 
          
		$this->obj_PHPExcel->setActiveSheetIndex(0)
					->setCellValue('A2', 'REPORTE DE USUARIOS REGISTRADOS')
					->mergeCells('A2:E2')
		            ->setCellValue('A4', 'CEDULA')
		            ->setCellValue('B4', 'NOMBRE')
		            ->setCellValue('C4', 'APELLIDO')
		            ->setCellValue('D4', 'CATEGORIA')
		            ->setCellValue('E4', 'ROL');

		$i = 6;
		foreach ($db as $row) {

		$this->obj_PHPExcel->setActiveSheetIndex(0)
		            ->setCellValue("A$i", $row['usuario_cedula'])
		            ->setCellValue("B$i", $row['usuario_nombre'])
		            ->setCellValue("C$i", $row['usuario_apellido'])
		            ->setCellValue("D$i", $row['categoria_nombre'])
		            ->setCellValue("E$i", $row['rol']);
		$i++;
		}

		$this->obj_PHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$this->obj_PHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$this->obj_PHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$this->obj_PHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$this->obj_PHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);

		$this->obj_PHPExcel->getActiveSheet()->setTitle('Informe de usuarios');
		$this->obj_PHPExcel->setActiveSheetIndex(0);

		 // Redirect output to a client’s web browser (Excel5)
		  header('Content-Type: application/vnd.ms-excel');
		  header('Content-Disposition: attachment;filename='.$nombre);
		  header('Cache-Control: max-age=0');
		  // If you're serving to IE 9, then the following may be needed
		  header('Cache-Control: max-age=1');

		  // If you're serving to IE over SSL, then the following may be needed
		  header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		  header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		  header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		  header ('Pragma: public'); // HTTP/1.0


		$objWriter = PHPExcel_IOFactory::createWriter($this->obj_PHPExcel, 'Excel5');
		$objWriter->save('php://output');

		exit;
	}		

}
 ?>