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
        $this->Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

        // Set font
        $this->SetFont('helvetica', 'B', 12);
        // Title
        $this->Cell(0, 15, 'Reporte Epicrisis', 0, false, 'C', 0, '', 0, false, 'M', 'M');

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
  		$this->Cell(18,6, $row['edad'],1,0,'C');
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
  		$this->Ln(10);
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
  		$this->Ln(4);
      $this->Cell(190,6, utf8_encode('Historia Clinica de ingreso'),1,0,'C',1);
      $this->Ln();
  		$this->Cell(190,6,'Anamnesis',1,0,'C',1);
  		$this->Ln();
  		$this->Cell(25,6,'F. Registro:',1,0,'C',1);
  		$this->Cell(24,6, utf8_encode($row['freg_hchosp']),1,0,'C');
  		$this->Cell(25,6,'H. Registro:',1,0,'C',1);
  		$this->Cell(24,6, utf8_encode($row['hreg_hchosp']),1,0,'C');
  		$this->Ln();
  		$this->Cell(80,6,utf8_encode('Motivo Consulta:'),1,0,'C',1);
  		$this->Ln(8);
  		$this->multicell(190,5, utf8_encode($row['motivo_consulta']),0,'L');
  		$this->Cell(80,6,utf8_encode('Enfermedad Actual:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5, utf8_encode($row['enfer_actual']),0,'L');
  		$this->Cell(80,6,utf8_encode('Historia Personal:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5, utf8_encode($row['his_personal']),00,'J');
  		$this->Cell(80,6,utf8_encode('Historia Familiar:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5,  utf8_encode($row['his_familiar']),00,'J');
  		$this->Cell(80,6,utf8_encode('Personalidad Premorbida:'),1,0,'C',1);
  		$this->Ln(8);
  		$this->multicell(190,5,  utf8_encode($row['perso_premorbida']),0,'J');
  		$this->Cell(190,6,'Antecedentes Personales',1,0,'C',1);
  		$this->Ln();
  		$this->Cell(80,6,utf8_encode('Antecedentes Alergicos:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(100,5,  utf8_encode($row['ant_alergicos']),0,'J');
  		$this->Cell(80,6,utf8_encode('Antecedentes Patologicos:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5,  utf8_encode($row['ant_patologico']),0,'J');
  		$this->Cell(80,6,utf8_encode('Antecedentes Quirurgicos:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5,  utf8_encode($row['ant_quirurgico']),0,'J');
  		$this->Cell(80,6,utf8_encode('Antecedentes Toxicologicos:'),1,0,'C',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5,  utf8_encode($row['ant_toxicologico']),0,'J');
  		$this->Cell(80,6,utf8_encode('Antecedentes Farmacologicos:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5,  utf8_encode($row['ant_farmaco']),0,'J');
  		$this->Cell(80,6,utf8_encode('Antecedentes Gineco-obstetricos:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5,  utf8_encode($row['ant_gineco']),0,'J');
  		$this->Cell(80,6,utf8_encode('Antecedentes Psiquiatricos:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5,  utf8_encode($row['ant_psiquiatrico']),0,'J');
  		$this->Cell(80,6,utf8_encode('Antecedentes Hospitalarios:'),1,0,'C',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5,  utf8_encode($row['ant_hospitalario']),0,'J');
  		$this->Cell(80,6,utf8_encode('Antecedentes Traumatologico:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5,  utf8_encode($row['ant_traumatologico']),0,'J');
  		$this->Cell(80,6,utf8_encode('Otros Antecedentes:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5,  utf8_encode($row['otros_ant']),0,'J');
  		$this->Ln(4);
  		$this->Cell(190,6,utf8_encode('Examen Fisico'),1,0,'C',1);
  		$this->Ln();
  		$this->Cell(30,6,'TAS(mm/Hg):',1,0,'C',1);
  		$this->Cell(10,6, utf8_encode($row['tas']),1,0,'C');
  		$this->Cell(30,6,'TAD(mm/Hg):',1,0,'C',1);
  		$this->Cell(10,6, utf8_encode($row['tad']),1,0,'C');
  		$this->Cell(30,6,'TAM(mm/Hg):',1,0,'C',1);
  		$this->Cell(26,6, utf8_encode($row['tam']),1,0,'C');
  		$this->Cell(20,6,'FR(x min):',1,0,'C',1);
  		$this->Cell(7,6, utf8_encode($row['fr']),1,0,'C');
  		$this->Cell(20,6,'FC(x min):',1,0,'C',1);
  		$this->Cell(7,6, utf8_encode($row['fc']),1,0,'C');
  		$this->Ln();
  		$this->Cell(30,6,'SpO2(satO2):',1,0,'C',1);
  		$this->Cell(10,6, utf8_encode($row['so']),1,0,'C');
  		$this->Cell(30,6,'Peso(Kg):',1,0,'C',1);
  		$this->Cell(10,6, utf8_encode($row['peso']),1,0,'C');
  		$this->Cell(30,6,utf8_encode('Temp(Co):'),1,0,'C',1);
  		$this->Cell(10,6, utf8_encode($row['temperatura']),1,0,'C');
  		$this->Cell(25,6,'Talla(mts):',1,0,'C',1);
  		$this->Cell(10,6, utf8_encode($row['talla']),1,0,'C');
  		$this->Cell(20,6,'IMC:',1,0,'C',1);
  		$this->Cell(10,6, utf8_encode($row['imc']),1,0,'C');
  		$this->Ln(10);
  		$this->Cell(190,6,utf8_encode('Exploracion General y regional'),1,0,'C',1);
  		$this->Ln();
  		$this->Cell(80,6,utf8_encode('Estado General:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5, utf8_encode($row['estado_general']),0,'J');
  		$this->Cell(80,6,utf8_encode('Cabeza y Cuello:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5, utf8_encode($row['cabcuello']),0,'J');
  		$this->Cell(80,6,utf8_encode('Torax:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5, utf8_encode($row['torax']),0,'J');
  		$this->Cell(80,6,utf8_encode('Abdomen:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5, utf8_encode($row['abdomen']),0,'J');
  		$this->Cell(80,6,utf8_encode('Genitourinario:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5, utf8_encode($row['genitourinario']),0,'J');
  		$this->Cell(80,6,utf8_encode('Extremidades:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5, utf8_encode($row['ext']),0,'J');
  		$this->Cell(80,6,utf8_encode('Neurologico:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5, utf8_encode($row['neurologico']),0,'J');
  		$this->Ln(4);
  		$this->Cell(80,6,utf8_encode('Examen Mental:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5, utf8_encode($row['examen_mental']),0,'J');
  		$this->Ln(10);
  		$this->Cell(80,6,utf8_encode('Analisis y Diagnostico:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5, utf8_encode($row['analisis']),0,'L');
  		$this->Ln(4);
  		$this->Cell(40,6,utf8_encode('Finalidad de consulta:'),1,0,'L',1);
  		$this->MultiCell(80,5, utf8_encode($row['finalidad']),0,'L');
      $this->Ln(8);
      $this->Cell(40,6,utf8_encode('Causa Externa:'),1,0,'L',1);
      $this->MultiCell(80,5, utf8_encode($row['causa_externa']),0,'L');
  		$this->Ln();
  		$this->Cell(80,6,utf8_encode('Plan tratamiento:'),1,0,'L',1);
  		$this->Ln(8);
  		$this->MultiCell(190,5, utf8_encode($row['plantratamiento']),0,'L');
  		$this->Ln();
		}
    foreach($data as $row) {
      $this->Cell(190,6, utf8_encode('Evolucion final (Nota Epicrisis)'),1,0,'C',1);
      $this->Ln();
      $this->multiCell(180, 6, $row[freg_epicrisis].' | '.$row[hreg_epicrisis].' Profesional:'.utf8_encode($row[nombre]).' Identificacion:'.$row[doc].' RM:'.$row[rm_profesional].' '.utf8_encode($row[especialidad]), 1, 'J');
      $this->Ln();
      $this->Cell(80,6,'Subjetivo:',1,0,'L',1);
      $this->Ln();
      $this->MultiCell(190,5, utf8_encode($row['subjetivo_epicrisis']),0,'L');
      $this->Cell(80,6,'Objetivo:',1,0,'L',1);
      $this->Ln();
  		$this->MultiCell(190,5, utf8_encode($row['objetivo_epicrisis']),0,'L');
      $this->Cell(80,6,'Analisis:',1,0,'L',1);
      $this->Ln();
      $this->MultiCell(190,5, utf8_encode($row['analisis_epicrisis']),0,'L');
      $this->Cell(80,6,'Plan tratamiento:',1,0,'L',1);
      $this->Ln();
      $this->MultiCell(190,5, utf8_encode($row['plant_epicrisis']),0,'L');
      $this->Ln();
      $this->Cell(80,6,utf8_encode('Codigo CIE10:'),1,0,'L',1);
  		$this->Ln();
      $this->MultiCell(190,5, utf8_encode($row['cdxp_epi']),0,'L');
      $this->Ln();
      $this->Cell(80,6,utf8_encode('Descripcion del diagnostico:'),1,0,'L',1);
  		$this->Ln();
      $this->MultiCell(190,5, utf8_encode($row['ddxp_epi']),0,'L');
      $this->Ln();
      $this->Cell(80,6,utf8_encode('Codigo CIE10:'),1,0,'L',1);
  		$this->Ln();
      $this->multicell(60,0,$this->image($row['firma'] , $this->GetX(), $this->GetY(),60,20),0,'J');
  		$this->Ln(20);
    }
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


$sql="SELECT p.tdoc_pac, doc_pac, nom1, nom2, ape1, ape2, fnacimiento, edad, uedad, dir_pac, tel_pac, email_pac, estadocivil, genero, rh,
a.id_adm_hosp, id_sedes_ips, fingreso_hosp, hingreso_hosp, tipo_usuario, tipo_afiliacion, ocupacion, dep_residencia, mun_residencia, zona_residencia, via_ingreso, tipo_servicio, fegreso_hosp, hegreso_hosp, estado_salida, via_salida,
h.freg_hchosp, hreg_hchosp, motivo_consulta, enfer_actual, his_personal, his_familiar, perso_premorbida, ant_alergicos, ant_patologico, ant_quirurgico, ant_toxicologico, ant_farmaco, ant_gineco, ant_psiquiatrico, ant_hospitalario, ant_traumatologico, ant_familiar, otros_ant, estado_general, tad, tas, tam, fr, fc, so, peso, talla, temperatura, imc, cabcuello, torax, ext, abdomen, neurologico, genitourinario, examen_mental, analisis, finalidad, causa_externa, plantratamiento,  estado_hchosp ,
e.id_epicrisis,
e.id_user, freg_epicrisis, hreg_epicrisis, subjetivo_epicrisis, objetivo_epicrisis, analisis_epicrisis, plant_epicrisis,cdxp_epi,ddxp_epi,tdxp_epi,
u.cuenta,u.nombre,u.doc,u.rm_profesional,u.especialidad,u.firma
from pacientes p LEFT JOIN adm_hospitalario a on p.id_paciente=a.id_paciente
                 LEFT JOIN hc_hospitalario h on h.id_adm_hosp=a.id_adm_hosp
                 LEFT JOIN epicrisis e on h.id_hchosp=e.id_hchosp
                 LEFT JOIN user u ON e.id_user=u.id_user
WHERE a.id_adm_hosp=".$_GET["idadmhosp"];
$rs = mysql_query($sql);
if (mysql_num_rows($rs)>0){
    while($rw = mysql_fetch_array($rs)){
        $data[] = $rw;
    }
}

// print colored table
$pdf->ColoredTable($header, $data);

// ---------------------------------------------------------
$nombre=$_GET["nom"];
// close and output PDF document
$pdf->Output($nombre.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
