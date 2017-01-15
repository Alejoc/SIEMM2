<?php
//============================================================+
// File name   : example_011.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 011 for TCPDF class
//               Colored Table (very simple table)
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Colored Table
 * @author Nicola Asuni
 * @since 2008-03-04
 */
 mysql_connect("localhost","root","515t3m45");
 mysql_select_db("emmanuelips");
// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');

// extend TCPF with custom functions
class MYPDF extends TCPDF {
	public function Header() {
        // Logo
        $image_file = 'images/Clinica Emmanue Finall.png';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 12);
        // Title
        $this->Cell(0, 15, 'Reporte Historia Clinica', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }
	// Load table data from file
	public function LoadData($file) {
		// Read file lines
		$lines = file($file);
		$data = array();
		foreach($lines as $line) {
			$data[] = explode(';', chop($line));
		}
	}


	// Colored table
	public function ColoredTable($header,$data,$data1) {
		// Colors, line width and bold font
		$this->SetFillColor(255, 0, 0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128, 0, 0);
		$this->SetLineWidth(0.3);
		$this->SetFont('', 'B');
		// Header
		$w = array(40, 35, 40, 45);
		$num_headers = count($header);
		for($i = 0; $i < $num_headers; ++$i) {
			$this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
		}
		$this->Ln();
		// Color and font restoration
		$this->SetFillColor(224, 235, 255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Data
		$fill = 0;
		foreach($data as $row) {
      $this->Cell(190,6,'Datos del Paciente',1,0,'C',1);
  		$this->Ln();
     		$this->Cell(40,6,'Nombre Paciente:',1,0,'C',1);
  		$this->Cell(150,6, utf8_encode($row['nom1']." ".$row['nom2']." ".$row['ape1']." ".$row['ape2']),1,0,'C');
     		$this->Ln();
      		$this->Cell(26,6,utf8_encode('Identificacion:'),1,0,'C',1);
  		$this->Cell(60,6, utf8_encode($row['tdoc_pac']).": ".($row['doc_pac']),1,0,'L');
  		$this->Cell(27,6,'Fecha Nac:',1,0,'C',1);
  		$this->Cell(25,6, utf8_encode($row['fnacimiento']),1,0,'C');
  		$this->Cell(12,6,'Edad:',1,0,'C',1);
  		$this->Cell(18,6, utf8_encode($row['edad']),1,0,'C');
  		$this->Cell(12,6,'RH:',1,0,'C',1);
  		$this->Cell(10,6, utf8_encode($row['rh']),1,0,'C');
  		$this->Ln();
  		$this->Cell(20,6,'Genero:',1,0,'C',1);
  		$this->Cell(11,6, utf8_encode($row['genero']),1,0,'C');
  		$this->Cell(25,6,utf8_encode('Direccion:'),1,0,'C',1);
  		$this->Cell(80,6, utf8_encode($row['dir_pac']),1,0,'C');
  		$this->Ln();
  		$this->Cell(25,6,utf8_encode('Telofono:'),1,0,'C',1);
  		$this->Cell(60,6, utf8_encode($row['tel_pac']),1,0,'C');
  		$this->Ln(9);
  		$this->Cell(190,6, utf8_encode('Datos del Admision'),1,0,'C',1);
  		$this->Ln();
  		$this->Cell(12,6,'ID:',1,0,'C',1);
  		$this->Cell(10,6, utf8_encode($row['id_adm_hosp']),1,0,'C');
  		$this->Cell(25,6,'F. Ingreso:',1,0,'C',1);
  		$this->Cell(24,6, utf8_encode($row['fingreso_hosp']),1,0,'C');
  		$this->Cell(25,6,'H. ingreso:',1,0,'C',1);
  		$this->Cell(24,6, utf8_encode($row['hingreso_hosp']),1,0,'C');
  		$this->Cell(40,6,'Tipo Usuario:',1,0,'C',1);
  		$this->Cell(30,6, utf8_encode($row['tipo_usuario']),1,0,'C');
  		$this->Ln();
  		$this->Cell(30,6,utf8_encode('Tipo Afiliacion:'),1,0,'C',1);
  		$this->Cell(30,6, utf8_encode($row['tipo_afiliacion']),1,0,'C');
      $this->Cell(30,6,utf8_encode('Tipo Servicio:'),1,0,'C',1);
  		$this->Cell(40,6, utf8_encode($row['tipo_servicio']),1,0,'C');
      $this->Cell(30,6,utf8_encode('EPS:'),1,0,'C',1);
  		$this->Cell(30,6, utf8_encode($row['nom_eps']),1,0,'C');
  		$this->Ln(10);
			$this->multiCell(180, 6, $row[freg_evomed].' | '.$row[hreg_evomed].' Profesional:  '.utf8_encode($row[nombre]).' Identificacion:'.$row[doc].' RM:'.$row[rm_profesional].' '.utf8_encode($row[especialidad]), 1, 'J');
			$this->multicell(180, 6, utf8_encode($row[35].''.$row[36]), 0, 'J');
      $this->Ln();
      $this->multicell(180, 6, utf8_encode($row[37].''.$row[38]), 0, 'J');
			$this->multicell(60,0,$this->image($row['firma'] , $this->GetX(), $this->GetY(),60,20),0,'J');
      $this->Ln(20);
			$fill=!$fill;
		}

		$this->Cell(array_sum($w), 0, '', 'T');
	}
}




// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);


// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 9);

// add a page
$pdf->AddPage();

$sql=" SELECT p.tdoc_pac, doc_pac, nom1, nom2, ape1, ape2, fnacimiento, edad, uedad, dir_pac, tel_pac, email_pac, estadocivil, genero, rh,a.id_adm_hosp, id_sedes_ips, fingreso_hosp, hingreso_hosp, tipo_usuario, tipo_afiliacion, ocupacion, dep_residencia, mun_residencia, zona_residencia, via_ingreso, tipo_servicio, fegreso_hosp, hegreso_hosp, estado_salida, via_salida,e.id_adm_hosp,freg_evomed,hreg_evomed,max(id_evomed),max(objetivo),max(subjetivo),max(analisis_evomed),max(plan_tratamiento),u.cuenta,nombre,doc,rm_profesional,especialidad,firma,o.nom_eps FROM pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente LEFT JOIN evolucion_medica e on e.id_adm_hosp=a.id_adm_hosp lEFT JOIN user u  on e.id_user=u.id_user LEFT JOIN eps o on o.id_eps=a.id_eps where e.id_adm_hosp='".$_GET["idadmhosp"]."' group by e.id_adm_hosp,e.freg_evomed,e.hreg_evomed order by 1,2,3" ;
$rs = mysql_query($sql);
if (mysql_num_rows($rs)>0){
    while($rw = mysql_fetch_array($rs)){
        $data[] = $rw;
    }
}

$sql1="SELECT SELECT p.tdoc_pac, doc_pac, nom1, nom2, ape1, ape2, fnacimiento, edad, uedad, dir_pac, tel_pac, email_pac, estadocivil, genero, rh,a.id_adm_hosp, id_sedes_ips, fingreso_hosp, hingreso_hosp, tipo_usuario, tipo_afiliacion, ocupacion, dep_residencia, mun_residencia, zona_residencia, via_ingreso, tipo_servicio, fegreso_hosp, hegreso_hosp, estado_salida, via_salida,e.freg_evo_psico,hreg_evo_psico,tipo_sesion,estado_psico,obj_sesion,actividades,resultado,obs_evo_psico,resp_evo_psico,u.cuenta,nombre,doc,rm_profesional,especialidad,firma FROM evo_psicologia e LEFT JOIN user u on e.id_user=u.id_user WHERE e.id_adm_hosp='".$_GET["idadmhosp"]."' order by freg_evo_psico, hreg_evo_psico ASC" ;
$rs1 = mysql_query($sql1);
if (mysql_num_rows($rs1)>0){
    while($rw1 = mysql_fetch_array($rs1)){
        $data1[] = $rw1;
    }
}

// print colored table
$pdf->ColoredTable($header, $data);

// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('example_011.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
