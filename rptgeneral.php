<?php

	require('config/conexion2.php');
	require('fpdf/fpdf.php');

	class PDF extends FPDF
	{



		function Header()
		{
      $this->Image('images/Clinica Emmanue Finall.png',10,8,20);

			header ('Content-type: application/pdf; charset=utf-8');
			$this->SetFont('Arial','B',15);
			$this->Cell(80);
			$this->Cell(80,10,utf8_encode('Reporte de Historia Clinica'),0,0,'C');
			$this->Ln(20);
		}
		function AjustaCelda($ancho, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true) {
		  $TamanoInicial = $this->FontSizePt;
		  $TamanoLetra = $this->FontSizePt;
		  $Decremento = 0.5;
		  while($this->GetStringWidth($txt) > $ancho)
		    $this->SetFontSize($TamanoLetra -= $Decremento);
		  $this->Cell($ancho, $h, $txt, $border, $ln, $align, $fill, $link, $scale, $force);
		  $this->SetFontSize($TamanoInicial);
		}

		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I',8);
			$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}

	}

	$query="SELECT p.tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fnacimiento,edad,uedad,dir_pac,tel_pac,estadocivil,genero,rh, a.id_adm_hosp,fingreso_hosp,hingreso_hosp, tipo_usuario,tipo_afiliacion,h.freg_hchosp,hreg_hchosp,motivo_consulta,enfer_actual,his_personal,his_familiar,perso_premorbida,ant_alergicos,ant_patologico,ant_quirurgico,ant_toxicologico,ant_farmaco,ant_gineco,ant_psiquiatrico,ant_hospitalario,ant_traumatologico,otros_ant,estado_general,tad,tas,tam,fr,fc,so,peso,talla,temperatura,imc,cabcuello,torax,ext,abdomen,neurologico,genitourinario,examen_mental,analisis,finalidad,causa_externa,plantratamiento,Resp_hchosp,especialidad FROM pacientes p LEFT JOIN adm_hospitalario a ON p.id_paciente=a.id_paciente LEFT JOIN hc_hospitalario h on a.id_adm_hosp=h.id_adm_hosp  WHERE a.id_adm_hosp=".$_GET["idadmhosp"];
	$resultado=$mysqli->query($query);

	$query1="SELECT e.id_adm_hosp,freg_evomed,hreg_evomed,max(id_evomed),max(objetivo),max(subjetivo),max(analisis_evomed),max(plan_tratamiento),u.cuenta,nombre,doc,rm_profesional,especialidad,firma FROM evolucion_medica e LEFT JOIN user u on e.id_user=u.id_user where e.id_adm_hosp='".$_GET["idadmhosp"]."' group by e.id_adm_hosp,e.freg_evomed,e.hreg_evomed order by freg_evomed DESC, hreg_evomed ASC";
	$resultado1=$mysqli->query($query1);


	$query2="SELECT p.tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fnacimiento,edad,uedad,dir_pac,tel_pac,estadocivil,genero,rh, a.id_adm_hosp,fingreso_hosp,hingreso_hosp, tipo_usuario,tipo_afiliacion,e.freg_evoto,hreg_evoto,evolucion_to,resp_evoto,u.cuenta,nombre,doc,rm_profesional,especialidad,firma FROM pacientes p LEFT JOIN adm_hospitalario a ON p.id_paciente=a.id_paciente LEFT JOIN evo_to e on a.id_adm_hosp=e.id_adm_hosp LEFT JOIN user u on e.id_user=u.id_user WHERE a.id_adm_hosp='".$_GET["idadmhosp"]."' order by freg_evoto DESC, hreg_evoto ASC";
	$resultado2=$mysqli->query($query2);

	$query3="SELECT p.tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fnacimiento,edad,uedad,dir_pac,tel_pac,estadocivil,genero,rh, a.id_adm_hosp,fingreso_hosp,hingreso_hosp, tipo_usuario,tipo_afiliacion,e.freg_evo_psico,hreg_evo_psico,tipo_sesion,estado_psico,obj_sesion,actividades,resultado,obs_evo_psico,resp_evo_psico,u.cuenta,nombre,doc,rm_profesional,especialidad,firma  FROM pacientes p LEFT JOIN adm_hospitalario a ON p.id_paciente=a.id_paciente LEFT JOIN evo_psicologia e on a.id_adm_hosp=e.id_adm_hosp LEFT JOIN user u on e.id_user=u.id_user WHERE a.id_adm_hosp='".$_GET["idadmhosp"]."' order by freg_evo_psico, hreg_evo_psico ASC";
	$resultado3=$mysqli->query($query3);

	$query4="SELECT p.tdoc_pac,doc_pac,nom1,nom2,ape1,ape2,fnacimiento,edad,uedad,dir_pac,tel_pac,estadocivil,genero,rh, a.id_adm_hosp,fingreso_hosp,hingreso_hosp, tipo_usuario,tipo_afiliacion,e.freg_nota,hreg_nota,descripnota,resp_nota,u.cuenta,nombre,doc,rm_profesional,especialidad,firma  FROM pacientes p LEFT JOIN adm_hospitalario a ON p.id_paciente=a.id_paciente LEFT JOIN nota_enfermeria e on a.id_adm_hosp=e.id_adm_hosp LEFT JOIN user u on e.id_user=u.id_user WHERE a.id_adm_hosp='".$_GET["idadmhosp"]."' order by freg_nota, hreg_nota ASC";
	$resultado4=$mysqli->query($query4);

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->Addpage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);

	$pdf->Ln();

	while($row = $resultado->fetch_assoc())
	{
		$pdf->SetFont('Arial','',12);
		$pdf->SetX(10);
		$pdf->Cell(190,6,'Datos del Paciente',1,0,'C',1);
		$pdf->Ln();
   		$pdf->Cell(40,6,'Nombre Paciente:',1,0,'C',1);
		$pdf->Cell(150,6, $row['nom1']." ".$row['nom2']." ".$row['ape1']." ".$row['ape2'],1,0,'C');
   		$pdf->Ln();
    		$pdf->Cell(26,6,utf8_encode('Identificacion:'),1,0,'C',1);
		$pdf->Cell(60,6, utf8_encode($row['tdoc_pac']).": ".($row['doc_pac']),1,0,'L');
		$pdf->Cell(27,6,'Fecha Nac:',1,0,'C',1);
		$pdf->Cell(25,6, utf8_encode($row['fnacimiento']),1,0,'C');
		$pdf->Cell(12,6,'Edad:',1,0,'C',1);
		$pdf->Cell(18,6, utf8_encode($row['edad'])." ".($row['uedad']),1,0,'C');
		$pdf->Cell(12,6,'RH:',1,0,'C',1);
		$pdf->Cell(10,6, utf8_encode($row['rh']),1,0,'C');
		$pdf->Ln();
		$pdf->Cell(20,6,'Genero:',1,0,'C',1);
		$pdf->Cell(11,6, utf8_encode($row['genero']),1,0,'C');
		$pdf->Cell(25,6,utf8_encode('Direccion:'),1,0,'C',1);
		$pdf->Cell(80,6, utf8_encode($row['dir_pac']),1,0,'C');
		$pdf->Ln();
		$pdf->Cell(25,6,utf8_encode('Telofono:'),1,0,'C',1);
		$pdf->Cell(60,6, utf8_encode($row['tel_pac']),1,0,'C');
		$pdf->Ln(10);
		$pdf->Cell(190,6, utf8_encode('Datos del Admision'),1,0,'C',1);
		$pdf->Ln();
		$pdf->Cell(12,6,'ID:',1,0,'C',1);
		$pdf->Cell(10,6, utf8_encode($row['id_adm_hosp']),1,0,'C');
		$pdf->Cell(25,6,'F. Ingreso:',1,0,'C',1);
		$pdf->Cell(24,6, utf8_encode($row['fingreso_hosp']),1,0,'C');
		$pdf->Cell(25,6,'H. ingreso:',1,0,'C',1);
		$pdf->Cell(24,6, utf8_encode($row['hingreso_hosp']),1,0,'C');
		$pdf->Cell(40,6,'Tipo Usuario:',1,0,'C',1);
		$pdf->Cell(30,6, utf8_encode($row['tipo_usuario']),1,0,'C');
		$pdf->Ln();
		$pdf->Cell(30,6,utf8_encode('Tipo Afiliacion:'),1,0,'C',1);
		$pdf->Cell(30,6, utf8_encode($row['tipo_afiliacion']),1,0,'C');
		$pdf->Ln(10);
		$pdf->Cell(190,6,'Anamnesis',1,0,'C',1);
		$pdf->Ln();
		$pdf->Cell(25,6,'F. Registro:',1,0,'C',1);
		$pdf->Cell(24,6, utf8_encode($row['freg_hchosp']),1,0,'C');
		$pdf->Cell(25,6,'H. Registro:',1,0,'C',1);
		$pdf->Cell(24,6, utf8_encode($row['hreg_hchosp']),1,0,'C');
		$pdf->Ln();
		$pdf->Cell(80,6,'Motivo Consulta:',1,0,'C',1);
		$pdf->Ln(8);
		$pdf->multicell(190,5, utf8_encode($row['motivo_consulta']),0,'J');
		$pdf->Cell(80,6,utf8_encode('Enfermedad Actual:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5,utf8_encode($row['enfer_actual']),0,'J');
		$pdf->Cell(80,6,utf8_encode('Historia Personal:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5,utf8_encode($row['his_personal']),00,'J');
		$pdf->Cell(80,6,utf8_encode('Historia Familiar:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['his_familiar']),00,'J');
		$pdf->Cell(80,6,utf8_encode('Personalidad Premorbida:'),1,0,'C',1);
		$pdf->Ln(8);
		$pdf->multicell(190,5, utf8_encode($row['perso_premorbida']),0,'J');
		$pdf->Cell(190,6,'Antecedentes Personales',1,0,'C',1);
		$pdf->Ln(10);
		$pdf->Cell(80,6,utf8_encode('Antecedentes Alergicos:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(100,5, utf8_encode($row['ant_alergicos']),0,'J');
		$pdf->Cell(80,6,utf8_encode('Antecedentes Patologicos:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['ant_patologico']),0,'J');
		$pdf->Cell(80,6,utf8_encode('Antecedentes Quirurgicos:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['ant_quirurgico']),0,'J');
		$pdf->Cell(80,6,utf8_encode('Antecedentes Toxicologicos:'),1,0,'C',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['ant_toxicologico']),0,'J');
		$pdf->Cell(80,6,utf8_encode('Antecedentes Farmacologicos:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['ant_farmaco']),0,'J');
		$pdf->Cell(80,6,utf8_encode('Antecedentes Gineco-obstetricos:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['ant_gineco']),0,'J');
		$pdf->Cell(80,6,utf8_encode('Antecedentes Psiquiatricos:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['ant_psiquiatrico']),0,'J');
		$pdf->Cell(80,6,utf8_encode('Antecedentes Hospitalarios:'),1,0,'C',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['ant_hospitalario']),0,'J');
		$pdf->Cell(80,6,utf8_encode('Antecedentes Traumatologico:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['ant_traumatologico']),0,'J');
		$pdf->Cell(80,6,utf8_encode('Otros Antecedentes:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['otros_ant']),0,'J');
		$pdf->Ln(10);
		$pdf->Cell(190,6,utf8_encode('Examen Fosico'),1,0,'C',1);
		$pdf->Ln(10);
		$pdf->Cell(30,6,'TAS(mm/Hg):',1,0,'C',1);
		$pdf->Cell(10,6, utf8_encode($row['tas']),1,0,'C');
		$pdf->Cell(30,6,'TAD(mm/Hg):',1,0,'C',1);
		$pdf->Cell(10,6, utf8_encode($row['tad']),1,0,'C');
		$pdf->Cell(30,6,'TAM(mm/Hg):',1,0,'C',1);
		$pdf->Cell(26,6, utf8_encode($row['tam']),1,0,'C');
		$pdf->Cell(20,6,'FR(x min):',1,0,'C',1);
		$pdf->Cell(7,6, utf8_encode($row['fr']),1,0,'C');
		$pdf->Cell(20,6,'FC(x min):',1,0,'C',1);
		$pdf->Cell(7,6, utf8_encode($row['fc']),1,0,'C');
		$pdf->Ln();
		$pdf->Cell(30,6,'SpO2(satO2):',1,0,'C',1);
		$pdf->Cell(10,6, utf8_encode($row['so']),1,0,'C');
		$pdf->Cell(30,6,'Peso(Kg):',1,0,'C',1);
		$pdf->Cell(10,6, utf8_encode($row['peso']),1,0,'C');
		$pdf->Cell(30,6,utf8_encode('Temp(Co):'),1,0,'C',1);
		$pdf->Cell(10,6, utf8_encode($row['temperatura']),1,0,'C');
		$pdf->Cell(25,6,'Talla(mts):',1,0,'C',1);
		$pdf->Cell(10,6, utf8_encode($row['talla']),1,0,'C');
		$pdf->Cell(20,6,'IMC:',1,0,'C',1);
		$pdf->Cell(10,6, utf8_encode($row['imc']),1,0,'C');
		$pdf->Ln(10);
		$pdf->Cell(190,6,utf8_encode('Exploracion General y regional'),1,0,'C',1);
		$pdf->Ln(10);
		$pdf->Cell(80,6,utf8_encode('Estado General:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['estado_general']),0,'J');
		$pdf->Cell(80,6,utf8_encode('Cabeza y Cuello:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['cabcuello']),0,'J');
		$pdf->Cell(80,6,utf8_encode('Torax:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['torax']),0,'J');
		$pdf->Cell(80,6,utf8_encode('Abdomen:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['abdomen']),0,'J');
		$pdf->Cell(80,6,utf8_encode('Genitourinario:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['genitourinario']),0,'J');
		$pdf->Cell(80,6,utf8_encode('Extremidades:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['ext']),0,'J');
		$pdf->Cell(80,6,utf8_encode('Neurologico:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['neurologico']),0,'J');
		$pdf->Ln(10);
		$pdf->Cell(80,6,utf8_encode('Examon Mental:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['examen_mental']),0,'J');
		$pdf->Ln(10);
		$pdf->Cell(80,6,utf8_encode('Analisis y Diagnostico:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['analisis']),0,'J');
		$pdf->Ln(10);
		$pdf->Cell(80,6,utf8_encode('Finalidad de consulta:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['finalidad']),0,'J');
		$pdf->Ln(10);
		$pdf->Cell(80,6,utf8_encode('Causa Externa:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['causa_externa']),0,'J');
		$pdf->Ln(10);
		$pdf->Cell(80,6,utf8_encode('Plan tratamiento:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['plantratamiento']),0,'J');
		$pdf->Ln(10);
		$pdf->Cell(80,6,utf8_encode('Medico Responsable:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row['Resp_hchosp']),0,'J');
		$pdf->MultiCell(190,5, utf8_encode($row['especialidad']),0,'J');
		$pdf->Ln(15);
  }



	while($row1 = $resultado1->fetch_assoc())
	{

		$pdf->Cell(100,6,utf8_encode('Evolucion Medica'),1,0,'C',1);
		$pdf->Ln();
		$pdf->Cell(190,6, utf8_encode($row1['freg_evomed'].' | '.$row1['hreg_evomed'].' '.$row1['nombre'].' '.$row1['especialidad'].' RM:'.$row1['rm_profesional']),1,0,'C');
		$pdf->Ln();
		$pdf->Cell(80,6,utf8_encode('Subjetivo:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row1['max(subjetivo)']),0,'J');
		$pdf->Ln();
		$pdf->Cell(80,6,utf8_encode('Objetivo:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row1['max(objetivo)']),0,'J');
		$pdf->Ln();
		$pdf->Cell(80,6,utf8_encode('Analisis:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row1['max(analisis_evomed)']),0,'J');
		$pdf->Cell(80,6,utf8_encode('Plan de tratamiento:'),1,0,'L',1);
		$pdf->Ln(8);
		$pdf->MultiCell(190,5, utf8_encode($row1['max(plan_tratamiento)']),0,'J');
		$pdf->Ln(8);
	}
	while($row2 = $resultado2->fetch_assoc())
	{
		$pdf->Cell(100,6,utf8_encode('Evolucion Terapia Ocupacional'),1,0,'C',1);
		$pdf->Ln();
		$pdf->Cell(190,6, $row2['freg_evoto'].' | '.$row2['hreg_evoto'].' '.$row2['nombre'].' '.$row2['especialidad'].' RM:'.$row2['rm_profesional'],1,0,'C');
		$pdf->Ln();
		$pdf->Cell(27,6,'evolucion:',1,0,'C',1);
		$pdf->Ln();
		$pdf->MultiCell(190,5, $row2['evolucion_to'],0,'J');
		$pdf->Ln();
	}
	while($row3 = $resultado3->fetch_assoc())
	{
		$pdf->Cell(100,6,utf8_encode('Evolucion Psicologoa'),1,0,'C',1);
		$pdf->Cell(14,6,'Fecha:',1,0,'C',1);
		$pdf->Cell(23,6, utf8_encode($row3['freg_evo_psico']),1,0,'C');
		$pdf->Cell(14,6,'Hora:',1,0,'C',1);
		$pdf->Cell(17,6, utf8_encode($row3['hreg_evo_psico']),1,0,'C');
		$pdf->Ln();
		$pdf->Cell(80,6,utf8_encode('Tipo sesion:'),1,0,'C',1);
		$pdf->Ln();
		$pdf->Cell(27,6,$row3['tipo_sesion'],1,0,'C',1);
		$pdf->Ln();
		$pdf->Cell(80,6,utf8_encode('Objetivo de la sesion:'),1,0,'C',1);
		$pdf->Ln();
		$pdf->MultiCell(190,5, $row3['estado_psico']." - ".$row3['obj_sesion'],0,'J');
		$pdf->Ln();
		$pdf->Cell(80,6,utf8_encode('Actividades:'),1,0,'C',1);
		$pdf->Ln();
		$pdf->MultiCell(190,5, $row3['actividades'],0,'J');
		$pdf->Ln();
		$pdf->Cell(80,6,utf8_encode('Resultado de la sesion:'),1,0,'C',1);
		$pdf->Ln();
		$pdf->MultiCell(190,5, $row3['resultado'],0,'J');
		$pdf->Ln();
		$pdf->Cell(80,6,utf8_encode('Observaciones:'),1,0,'C',1);
		$pdf->Ln();
		$pdf->MultiCell(190,5, $row3['obs_evo_psico'],0,'J');
		$pdf->Ln();
		$pdf->Cell(40,6,utf8_encode('Responsable:'),1,0,'C',1);
		$pdf->Cell(80,6,$row3['resp_evo_psico'],1,0,'C',1);
		$pdf->Ln(10);
	}

	while($row4 = $resultado4->fetch_assoc())
	{
		$pdf->Cell(100,6,utf8_encode('Notas de Enfermeroa'),1,0,'C',1);
		$pdf->Cell(14,6,'Fecha:',1,0,'C',1);
		$pdf->Cell(23,6, utf8_encode($row4['freg_nota']),1,0,'C');
		$pdf->Cell(14,6,'Hora:',1,0,'C',1);
		$pdf->Cell(17,6, utf8_encode($row4['hreg_nota']),1,0,'C');
		$pdf->Ln();
		$pdf->Cell(80,6,utf8_encode('Descripcion Nota:'),1,0,'C',1);
		$pdf->Ln();
		$pdf->MultiCell(190,5, $row4['descripnota'],0,'J');
		$pdf->Ln();
		$pdf->Cell(40,6,utf8_encode('Responsable:'),1,0,'C',1);
		$pdf->Cell(80,6,$row4['resp_nota'],1,0,'C',1);
		$pdf->Ln(10);
	}

	$pdf->Output();



?>
