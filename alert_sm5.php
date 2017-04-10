<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <hgroup>
      <h2>Alertas asistenciales</h2>
      <h3 class="alert alert-danger">Hopitalario</h3>
  </hgroup>
  <ul class="nav navbar-nav " id="barra">
    <li  id="barra">
      <button class="btn btn-primary animated jello " data-toggle="modal" data-target="#hcfalta" type="button" > Historia ingreso
        <span class="badge">
            <?php
            $sql="SELECT d.doc_pac,d.nom1,' ',d.nom2,' ',d.ape1,' ',d.ape2 paciente ,count(c.id_adm_hosp) cuantas,c.fingreso_hosp,c.fegreso_hosp,c.tipo_servicio,if(c.id_sedes_ips=2,'Faca','Bogota')  sede
                  FROM adm_hospitalario c,pacientes d where c.fingreso_hosp > '2017-01-01' and c.tipo_servicio = 'Hospitalario'
                                                                                           and c.id_sedes_ips in (2,8)
                                                                                           and d.id_paciente = c.id_paciente
                                                                                           and not exists (select 1 from hc_hospitalario  b where b.id_adm_hosp = c.id_adm_hosp)
                  ORDER by 2";
          if ($tabla=$bd1->sub_tuplas($sql)){
            foreach ($tabla as $fila ) {
            echo $fila["cuantas"];
            }
          }
          ?>
          </span>
        </button>
      </li>
    </ul>

  <ul class="nav navbar-nav " id="barra">
    <li  id="barra">
      <button class="btn btn-primary animated jello " data-toggle="modal" data-target="#evomedfalta" type="button" ><i class=""></i>Evoluciones Psiquiatria
        <span class="badge">
            <?php
            $sql="SELECT d.doc_pac,d.nom1,' ',d.nom2,' ',d.ape1,' ',d.ape2 paciente ,
                            count(a.id_adm_hosp) cuantas,
                            c.fingreso_hosp,c.fegreso_hosp,a.fecha,a.mes,c.tipo_servicio,
                            IF(id_sedes_ips = 2,'Facatativa','Bogota') sede
                  FROM calendario a,adm_hospitalario c,pacientes d
                  WHERE c.tipo_servicio = 'Hospitalario' and a.año = 2017 and a.mes > 3
                                                         and c.id_sedes_ips in (2,8)
                                                         and c.id_adm_hosp = a.id_adm_hosp
                                                         and a.fecha > c.fingreso_hosp and a.fecha <= IFNULL(c.fegreso_hosp,(CURRENT_DATE-1))
                                                         and d.id_paciente = c.id_paciente
                                                         and not exists (select 1 from evolucion_medica  b where b.id_adm_hosp = a.id_adm_hosp
                                                         and b.freg_evomed = a.fecha)  order by 9";
          if ($tabla=$bd1->sub_tuplas($sql)){
            foreach ($tabla as $fila ) {
              echo $fila["cuantas"];
            }
          }
          ?>
          </span>
        </button>
      </li>
    </ul>
    <ul class="nav navbar-nav " id="barra">
      <li  id="barra">
        <button class="btn btn-primary animated jello " data-toggle="modal" data-target="#evopsicofalta" type="button" > Evoluciones Psicologia
          <span class="badge">
              <?php
              $sql="SELECT d.doc_pac ,d.nom1,' ',d.nom2,' ',d.ape1,' ',d.ape2 paciente,count(a.id_adm_hosp) cuantas,c.fingreso_hosp,c.fegreso_hosp,a.fecha,a.mes,if(c.id_sedes_ips=2,'Faca','Bogota')  sede
                    FROM calendario a,adm_hospitalario c,pacientes d
                    WHERE c.tipo_servicio = 'Hospitalario' and a.año = 2017
                    and a.mes > 3

and a.fecha not in ('2017-01-01','2017-01-07','2017-01-08','2017-01-09','2017-01-14','2017-01-15','2017-01-21',
'2017-01-22','2017-01-28','2017-01-29','2017-02-04','2017-02-05','2017-02-11','2017-02-12',
'2017-02-18','2017-02-19','2017-02-25','2017-02-26','2017-03-04','2017-03-05','2017-03-11',
'2017-03-12','2017-03-18','2017-03-19','2017-03-20','2017-03-25','2017-03-26','2017-04-01',
'2017-04-02','2017-04-08','2017-04-09','2017-04-13','2017-04-14','2017-04-15','2017-04-16',
'2017-04-22','2017-04-23','2017-04-29','2017-04-30','2017-05-01','2017-05-06','2017-05-07',
'2017-05-13','2017-05-14','2017-05-20','2017-05-21','2017-05-27','2017-05-28','2017-05-29',
'2017-06-03','2017-06-04','2017-06-10','2017-06-11','2017-06-17','2017-06-18','2017-06-19',
'2017-06-24','2017-06-25','2017-06-26','2017-07-01','2017-07-02','2017-07-03','2017-07-08',
'2017-07-09','2017-07-15','2017-07-16','2017-07-20','2017-07-22','2017-07-23','2017-07-29',
'2017-07-30','2017-08-05','2017-08-06','2017-08-12','2017-08-13','2017-08-19','2017-08-20',
'2017-08-21','2017-08-26','2017-08-27','2017-09-02','2017-09-03','2017-09-09','2017-09-10',
'2017-09-16','2017-09-17','2017-09-23','2017-09-24','2017-09-30','2017-10-01','2017-10-07',
'2017-10-08','2017-10-14','2017-10-15','2017-10-16','2017-10-21','2017-10-22','2017-10-28',
'2017-10-29','2017-11-04','2017-11-05','2017-11-06','2017-11-11','2017-11-12','2017-11-13',
'2017-11-18','2017-11-19','2017-11-25','2017-11-26','2017-12-02','2017-12-03','2017-12-08',
'2017-12-09','2017-12-10','2017-12-16','2017-12-17','2017-12-23','2017-12-24','2017-12-25',
'2017-12-30','2017-12-31')
and c.id_sedes_ips in (2,8)
and c.id_adm_hosp = a.id_adm_hosp
and a.fecha > c.fingreso_hosp and a.fecha <= IFNULL(c.fegreso_hosp,(CURRENT_DATE-1))
and d.id_paciente = c.id_paciente
and not exists (select 1 from evo_psicologia  b where b.id_adm_hosp = a.id_adm_hosp and b.freg_evo_psico = a.fecha)
order by 2";
            if ($tabla=$bd1->sub_tuplas($sql)){
              foreach ($tabla as $fila ) {
              echo $fila["cuantas"];
              }
            }
            ?>
            </span>
          </button>
        </li>
      </ul>
      <ul class="nav navbar-nav " id="barra">
        <li  id="barra">
          <button class="btn btn-primary animated jello " data-toggle="modal" data-target="#evotofalta" type="button" > Evoluciones TO
            <span class="badge">
              <?php
              $sql="SELECT d.doc_pac ,d.nom1,' ',d.nom2,' ',d.ape1,' ',d.ape2 paciente,count(a.id_adm_hosp) cuantas,c.fingreso_hosp,c.fegreso_hosp,a.fecha,a.mes,if(c.id_sedes_ips=2,'Faca','Bogota')  sede
                    FROM calendario a,adm_hospitalario c,pacientes d
                    WHERE c.tipo_servicio = 'Hospitalario' and a.año = 2017
                    and a.mes > 3

and a.fecha not in ('2017-01-01','2017-01-07','2017-01-08','2017-01-09','2017-01-14','2017-01-15','2017-01-21',
'2017-01-22','2017-01-28','2017-01-29','2017-02-04','2017-02-05','2017-02-11','2017-02-12',
'2017-02-18','2017-02-19','2017-02-25','2017-02-26','2017-03-04','2017-03-05','2017-03-11',
'2017-03-12','2017-03-18','2017-03-19','2017-03-20','2017-03-25','2017-03-26','2017-04-01',
'2017-04-02','2017-04-08','2017-04-09','2017-04-13','2017-04-14','2017-04-15','2017-04-16',
'2017-04-22','2017-04-23','2017-04-29','2017-04-30','2017-05-01','2017-05-06','2017-05-07',
'2017-05-13','2017-05-14','2017-05-20','2017-05-21','2017-05-27','2017-05-28','2017-05-29',
'2017-06-03','2017-06-04','2017-06-10','2017-06-11','2017-06-17','2017-06-18','2017-06-19',
'2017-06-24','2017-06-25','2017-06-26','2017-07-01','2017-07-02','2017-07-03','2017-07-08',
'2017-07-09','2017-07-15','2017-07-16','2017-07-20','2017-07-22','2017-07-23','2017-07-29',
'2017-07-30','2017-08-05','2017-08-06','2017-08-12','2017-08-13','2017-08-19','2017-08-20',
'2017-08-21','2017-08-26','2017-08-27','2017-09-02','2017-09-03','2017-09-09','2017-09-10',
'2017-09-16','2017-09-17','2017-09-23','2017-09-24','2017-09-30','2017-10-01','2017-10-07',
'2017-10-08','2017-10-14','2017-10-15','2017-10-16','2017-10-21','2017-10-22','2017-10-28',
'2017-10-29','2017-11-04','2017-11-05','2017-11-06','2017-11-11','2017-11-12','2017-11-13',
'2017-11-18','2017-11-19','2017-11-25','2017-11-26','2017-12-02','2017-12-03','2017-12-08',
'2017-12-09','2017-12-10','2017-12-16','2017-12-17','2017-12-23','2017-12-24','2017-12-25',
'2017-12-30','2017-12-31')
and c.id_sedes_ips in (2,8)
and c.id_adm_hosp = a.id_adm_hosp
and a.fecha > c.fingreso_hosp and a.fecha <= IFNULL(c.fegreso_hosp,(CURRENT_DATE-1))
and d.id_paciente = c.id_paciente
and not exists (select 1 from evo_to  b where b.id_adm_hosp = a.id_adm_hosp and b.freg_evoto = a.fecha)
order by 2";
              if ($tabla=$bd1->sub_tuplas($sql)){
                foreach ($tabla as $fila ) {
                echo $fila["cuantas"];
                }
              }
              ?>
              </span>
            </button>
          </li>
        </ul>
        <ul class="nav navbar-nav " id="barra">
          <li  id="barra">
            <button class="btn btn-primary animated jello " data-toggle="modal" data-target="#evotsfalta" type="button" > Evoluciones TS
              <span class="badge">
                  <?php
                  $sql="";
                if ($tabla=$bd1->sub_tuplas($sql)){
                  foreach ($tabla as $fila ) {
                  //  echo $fila["cuantas"];
                  }
                }
                ?>
                </span>
              </button>
            </li>
          </ul>
          <ul class="nav navbar-nav " id="barra">
            <li  id="barra">
              <button class="btn btn-primary animated jello " data-toggle="modal" data-target="#evopsicofalta" type="button" > Evoluciones Nutricion
                <span class="badge">
                    <?php
                    $sql="";
                  if ($tabla=$bd1->sub_tuplas($sql)){
                    foreach ($tabla as $fila ) {
                    //  echo $fila["cuantas"];
                    }
                  }
                  ?>
                  </span>
                </button>
              </li>
            </ul>
          <ul class="nav navbar-nav " id="barra">
            <li  id="barra">
              <button class="btn btn-primary animated jello " data-toggle="modal" data-target="#notasfalta" type="button" > Notas Enfermeria
                <span class="badge">
                    <?php
                    $sql="select d.doc_pac,d.nom1,' ',d.nom2,' ',d.ape1,' ',d.ape2 paciente ,
                                    count(a.id_adm_hosp) cuantas,
                                    c.fingreso_hosp,c.fegreso_hosp,a.fecha,a.mes,c.tipo_servicio
                          from calendario a,adm_hospitalario c,pacientes d
                          where c.tipo_servicio = 'Hospitalario' and a.año = 2017 and a.mes > 3
                                                                 and c.id_sedes_ips in (2,8)
                                                                 and c.id_adm_hosp = a.id_adm_hosp
                                                                 and a.fecha > c.fingreso_hosp and a.fecha <= IFNULL(c.fegreso_hosp,(CURRENT_DATE-1))
                                                                 and d.id_paciente = c.id_paciente
                                                                 and not exists (select 1 from nota_enfermeria  b where b.id_adm_hosp = a.id_adm_hosp
                                                                 and b.freg_nota = a.fecha)  order by 9";
                  if ($tabla=$bd1->sub_tuplas($sql)){
                    foreach ($tabla as $fila ) {
                    echo $fila["cuantas"];
                    }
                  }
                  ?>
                  </span>
                </button>
              </li>
            </ul>
</div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <hgroup>
      <h3 class="alert alert-danger">Consulta Externa SM</h3>
  </hgroup>
  <ul class="nav navbar-nav " id="barra">
    <li  id="barra">
      <button class="btn btn-primary animated jello " data-toggle="modal" data-target="#evopsicofalta" type="button" > Historia Clinica
        <span class="badge">
            <?php
            $sql="SELECT d.doc_pac,d.nom1,' ',d.nom2,' ',d.ape1,' ',d.ape2 paciente ,count(c.id_adm_hosp) cuantas,c.fingreso_hosp,c.fegreso_hosp,c.tipo_servicio,if(c.id_sedes_ips=2,'Faca','Bogota')  sede
                  FROM adm_hospitalario c,pacientes d where c.fingreso_hosp > '2017-01-01' and c.tipo_servicio = 'Consulta Externa SM'
                                                                                           and c.id_sedes_ips in (2,8)
                                                                                           and d.id_paciente = c.id_paciente
                                                                                           and not exists (select 1 from hcini_reh  b where b.id_adm_hosp = c.id_adm_hosp)
                                                                                           and not exists (select 1 from hc_hospitalario  f where f.id_adm_hosp = c.id_adm_hosp)
                  ORDER by 2";
          if ($tabla=$bd1->sub_tuplas($sql)){
            foreach ($tabla as $fila ) {
            echo $fila["cuantas"];
            }
          }
          ?>
          </span>
        </button>
      </li>
    </ul>
</div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <hgroup>
      <h3 class="alert alert-danger">Hospital dia</h3>
  </hgroup>
  <ul class="nav navbar-nav " id="barra">
    <li  id="barra">
      <button class="btn btn-primary animated jello " data-toggle="modal" data-target="#evopsicofalta" type="button" > Evoluciones Psiquiatria
          <span class="badge">
            <?php
            $sql="";
          if ($tabla=$bd1->sub_tuplas($sql)){
            foreach ($tabla as $fila ) {
            //  echo $fila["cuantas"];
            }
          }
          ?>
          </span>
        </button>
      </li>
    </ul>
</div>

<!--DETALLE DE CADA MODAL-->
<section class="modal fade" id="hcfalta" role="dialog">
	<section class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" >Notificaciones: Admisiones sin historia de ingreso</h4>
			</div>
			<div class="modal-body">
				<table class="table table-responsive lettermodal">
					<tr>
						<th id="th-estilo1">ID</th>
						<th id="th-estilo1">NOMBRE PACIENTE</th>
						<th id="th-estilo3">IDENTIFICACION</th>
						<th id="th-estilo1">FECHA INGRESO</th>
						<th id="th-estilo3">FECHA EGRESO</th>
						<th id="th-estilo3">TIPO SERVICIO</th>
					</tr>
					<?php
					$sql="SELECT d.doc_pac,d.nom1,' ',d.nom2,' ',d.ape1,' ',d.ape2 paciente ,c.id_adm_hosp,c.fingreso_hosp,c.fegreso_hosp,c.tipo_servicio,if(c.id_sedes_ips=2,'Facatativa','Bogota')  sede
                FROM adm_hospitalario c,pacientes d where c.fingreso_hosp > '2017-01-01' and c.tipo_servicio = 'Hospitalario'
                                                                                         and c.id_sedes_ips in (2,8)
                                                                                         and d.id_paciente = c.id_paciente
                                                                                         and not exists (select 1 from hc_hospitalario  b where b.id_adm_hosp = c.id_adm_hosp)
                ORDER by 2";
					if ($tabla=$bd1->sub_tuplas($sql)){
						//echo $sql;
						foreach ($tabla as $fila ) {
							echo"<tr >\n";
							echo'<td class="text-center danger">'.$fila["id_adm_hosp"].'</td>';
							echo'<td class="text-center danger">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
							echo'<td class="text-center danger">'.$fila["doc_pac"].'</td>';
							echo'<td class="text-center danger">'.$fila["fingreso_hosp"].'</td>';
							echo'<td class="text-center danger">'.$fila["fegreso_hosp"].'</td>';
							echo'<td class="text-center danger">'.$fila["tipo_servicio"].'</td>';
              echo'<td class="text-center danger">'.$fila["sede"].'</td>';
							echo "</tr>\n";
						}
					}
					?>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</section>
</section>

  <section class="modal fade" id="evomedfalta" role="dialog">
  	<section class="modal-dialog modal-lg">
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal">&times;</button>
  				<h4 class="modal-title" >Notificaciones: Evoluciones medicas pendientes por realizar</h4>
  			</div>
  			<div class="modal-body">
  				<table class="table table-responsive lettermodal">
  					<tr>
  						<th id="th-estilo4">ID</th>
  						<th id="th-estilo1">NOMBRE PACIENTE</th>
  						<th id="th-estilo3">IDENTIFICACION</th>
  						<th id="th-estilo1">FECHA INGRESO</th>
  						<th id="th-estilo3">FECHA EGRESO</th>
  						<th id="th-estilo3">FECHA EVOLUCION FALTANTE</th>
  						<th id="th-estilo3">SEDE</th>
  					</tr>
  					<?php
  					$sql="select d.doc_pac,d.nom1,' ',d.nom2,' ',d.ape1,' ',d.ape2 paciente ,a.id_adm_hosp,c.fingreso_hosp,c.fegreso_hosp,a.fecha,a.mes,IF(id_sedes_ips = 2,'Facatativa','Bogota') sede
  								FROM calendario a,adm_hospitalario c,pacientes d
  								where c.tipo_servicio = 'Hospitalario' and a.año = 2017 and a.mes > 3
  																											 and c.id_sedes_ips in (2,8)
                                                         and c.id_adm_hosp = a.id_adm_hosp
                                                         and a.fecha > c.fingreso_hosp and a.fecha <= IFNULL(c.fegreso_hosp,(CURRENT_DATE-1))
                                                         and d.id_paciente = c.id_paciente
                                                         and not exists (select 1 from evolucion_medica  b
                    where b.id_adm_hosp = a.id_adm_hosp and b.freg_evomed = a.fecha)  order by 9";
  					if ($tabla=$bd1->sub_tuplas($sql)){
  						//echo $sql;
  						foreach ($tabla as $fila ) {
  							echo"<tr >\n";
  							echo'<td class="text-center warning">'.$fila["id_adm_hosp"].' </td>';
  							echo'<td class="text-center warning">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
  							echo'<td class="text-center warning">'.$fila["doc_pac"].'</td>';
  							echo'<td class="text-center warning">'.$fila["fingreso_hosp"].'</td>';
  							echo'<td class="text-center warning">'.$fila["fegreso_hosp"].'</td>';
  							echo'<td class="text-center warning">'.$fila["fecha"].'</td>';
  							echo'<td class="text-center warning">'.$fila["sede"].'</td>';
  							echo "</tr>\n";
  						}
  					}
  					?>
  				</table>
  			</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
  			</div>
  		</div>
  	</section>
  </section>
  <section class="modal fade" id="notasfalta" role="dialog">
  	<section class="modal-dialog modal-lg">
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal">&times;</button>
  				<h4 class="modal-title" >Notificaciones: Admisiones sin Notas de enfermeria</h4>
  			</div>
  			<div class="modal-body">
  				<table class="table table-responsive lettermodal">
  					<tr>
  						<th id="th-estilo4">ID</th>
  						<th id="th-estilo1">NOMBRE PACIENTE</th>
  						<th id="th-estilo3">IDENTIFICACION</th>
  						<th id="th-estilo1">FECHA INGRESO</th>
  						<th id="th-estilo3">FECHA EGRESO</th>
  						<th id="th-estilo3">FECHA NOTA FALTANTE</th>
              <th id="th-estilo3">SEDE</th>
  					</tr>
  					<?php
  					$sql="select d.doc_pac,d.nom1,' ',d.nom2,' ',d.ape1,' ',d.ape2 paciente ,
  										   a.id_adm_hosp,
  											 c.fingreso_hosp,c.fegreso_hosp,a.fecha,a.mes,
                         IF(id_sedes_ips = 2,'Facatativa','Bogota') sede
  								from calendario a,adm_hospitalario c,pacientes d
  								where c.tipo_servicio = 'Hospitalario' and a.año = 2017 and a.mes > 3
  																											 and c.id_sedes_ips in (2,8)
                                                         and c.id_adm_hosp = a.id_adm_hosp
                                                         and a.fecha > c.fingreso_hosp and a.fecha <= IFNULL(c.fegreso_hosp,(CURRENT_DATE-1))
                                                         and d.id_paciente = c.id_paciente
                                                         and not exists (select 1 from nota_enfermeria  b
                    where b.id_adm_hosp = a.id_adm_hosp and b.freg_nota = a.fecha)  order by 9";
  					if ($tabla=$bd1->sub_tuplas($sql)){
  						//echo $sql;
  						foreach ($tabla as $fila ) {
  							echo"<tr >\n";
  							echo'<td class="text-center warning">'.$fila["id_adm_hosp"].' </td>';
  							echo'<td class="text-center warning">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
  							echo'<td class="text-center warning">'.$fila["doc_pac"].'</td>';
  							echo'<td class="text-center warning">'.$fila["fingreso_hosp"].'</td>';
  							echo'<td class="text-center warning">'.$fila["fegreso_hosp"].'</td>';
  							echo'<td class="text-center warning">'.$fila["fecha"].'</td>';
                echo'<td class="text-center warning">'.$fila["sede"].'</td>';
  							echo "</tr>\n";
  						}
              $sql1="select d.doc_pac,d.nom1,' ',d.nom2,' ',d.ape1,' ',d.ape2 paciente ,
    										   count(a.id_adm_hosp) cuantas,
    											 c.fingreso_hosp,c.fegreso_hosp,a.fecha,a.mes,
                           IF(id_sedes_ips = 2,'Facatativa','Bogota') sede
    								from calendario a,adm_hospitalario c,pacientes d
    								where c.tipo_servicio = 'Hospitalario' and a.año = 2017 and a.mes > 3
    																											 and c.id_sedes_ips in (2,8)
                                                           and c.id_adm_hosp = a.id_adm_hosp
                                                           and a.fecha > c.fingreso_hosp and a.fecha <= IFNULL(c.fegreso_hosp,(CURRENT_DATE-1))
                                                           and d.id_paciente = c.id_paciente
                                                           and not exists (select 1 from nota_enfermeria  b
                      where b.id_adm_hosp = a.id_adm_hosp and b.freg_nota = a.fecha)  order by 9";
                      if ($tabla=$bd1->sub_tuplas($sql1)){

                  			foreach ($tabla as $fila1 ) {

                  				echo"<tr> \n";
                  				echo'<td class="text-center alert-info">Total:</td>';
                  				echo'<td class="text-center">'.$fila1["cuantas"].'</td>';
                  				echo "</tr>\n";

                  			}
                  		}
  					}

  					?>
  				</table>
  			</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
  			</div>
  		</div>
  	</section>
  </section>
  <section class="modal fade" id="evopsicofalta" role="dialog">
  	<section class="modal-dialog modal-lg">
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal">&times;</button>
  				<h4 class="modal-title" >Notificaciones: Admisiones sin Evoluciones de Psicologia</h4>
  			</div>
  			<div class="modal-body">
  				<table class="table table-responsive lettermodal">
  					<tr>
  						<th id="th-estilo4">ID</th>
  						<th id="th-estilo1">NOMBRE PACIENTE</th>
  						<th id="th-estilo3">IDENTIFICACION</th>
  						<th id="th-estilo1">FECHA INGRESO</th>
  						<th id="th-estilo3">FECHA EGRESO</th>
  						<th id="th-estilo3">FECHA EVOLUCION FALTANTE</th>
  					</tr>
  					<?php
  					$sql="SELECT d.doc_pac ,d.nom1,' ',d.nom2,' ',d.ape1,' ',d.ape2 paciente,a.id_adm_hosp,c.fingreso_hosp,c.fegreso_hosp,a.fecha,a.mes,if(c.id_sedes_ips=2,'Facatativa','Bogota')  sede
                  FROM calendario a,adm_hospitalario c,pacientes d
                  WHERE c.tipo_servicio = 'Hospitalario' and a.año = 2017
                  and a.mes > 3

and a.fecha not in ('2017-01-01','2017-01-07','2017-01-08','2017-01-09','2017-01-14','2017-01-15','2017-01-21',
'2017-01-22','2017-01-28','2017-01-29','2017-02-04','2017-02-05','2017-02-11','2017-02-12',
'2017-02-18','2017-02-19','2017-02-25','2017-02-26','2017-03-04','2017-03-05','2017-03-11',
'2017-03-12','2017-03-18','2017-03-19','2017-03-20','2017-03-25','2017-03-26','2017-04-01',
'2017-04-02','2017-04-08','2017-04-09','2017-04-13','2017-04-14','2017-04-15','2017-04-16',
'2017-04-22','2017-04-23','2017-04-29','2017-04-30','2017-05-01','2017-05-06','2017-05-07',
'2017-05-13','2017-05-14','2017-05-20','2017-05-21','2017-05-27','2017-05-28','2017-05-29',
'2017-06-03','2017-06-04','2017-06-10','2017-06-11','2017-06-17','2017-06-18','2017-06-19',
'2017-06-24','2017-06-25','2017-06-26','2017-07-01','2017-07-02','2017-07-03','2017-07-08',
'2017-07-09','2017-07-15','2017-07-16','2017-07-20','2017-07-22','2017-07-23','2017-07-29',
'2017-07-30','2017-08-05','2017-08-06','2017-08-12','2017-08-13','2017-08-19','2017-08-20',
'2017-08-21','2017-08-26','2017-08-27','2017-09-02','2017-09-03','2017-09-09','2017-09-10',
'2017-09-16','2017-09-17','2017-09-23','2017-09-24','2017-09-30','2017-10-01','2017-10-07',
'2017-10-08','2017-10-14','2017-10-15','2017-10-16','2017-10-21','2017-10-22','2017-10-28',
'2017-10-29','2017-11-04','2017-11-05','2017-11-06','2017-11-11','2017-11-12','2017-11-13',
'2017-11-18','2017-11-19','2017-11-25','2017-11-26','2017-12-02','2017-12-03','2017-12-08',
'2017-12-09','2017-12-10','2017-12-16','2017-12-17','2017-12-23','2017-12-24','2017-12-25',
'2017-12-30','2017-12-31')
and c.id_sedes_ips in (2,8)
and c.id_adm_hosp = a.id_adm_hosp
and a.fecha > c.fingreso_hosp and a.fecha <= IFNULL(c.fegreso_hosp,(CURRENT_DATE-1))
and d.id_paciente = c.id_paciente
and not exists (select 1 from evo_psicologia  b where b.id_adm_hosp = a.id_adm_hosp and b.freg_evo_psico = a.fecha)
order by 2";
  					if ($tabla=$bd1->sub_tuplas($sql)){
  						//echo $sql;
  						foreach ($tabla as $fila ) {
  							echo"<tr >\n";
  							echo'<td class="text-center warning">'.$fila["id_adm_hosp"].' </td>';
  							echo'<td class="text-center warning">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
  							echo'<td class="text-center warning">'.$fila["doc_pac"].'</td>';
  							echo'<td class="text-center warning">'.$fila["fingreso_hosp"].'</td>';
  							echo'<td class="text-center warning">'.$fila["fegreso_hosp"].'</td>';
  							echo'<td class="text-center warning">'.$fila["fecha"].'</td>';
                echo'<td class="text-center warning">'.$fila["sede"].'</td>';
  							echo "</tr>\n";
  						}
  					}

  					?>
  				</table>
  			</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
  			</div>
  		</div>
  	</section>
  </section>
  <section class="modal fade" id="evotofalta" role="dialog">
    <section class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" >Notificaciones: Admisiones sin Evoluciones de Terapia Ocupacional</h4>
        </div>
        <div class="modal-body">
          <table class="table table-responsive lettermodal">
            <tr>
              <th id="th-estilo4">ID</th>
              <th id="th-estilo1">NOMBRE PACIENTE</th>
              <th id="th-estilo3">IDENTIFICACION</th>
              <th id="th-estilo1">FECHA INGRESO</th>
              <th id="th-estilo3">FECHA EGRESO</th>
              <th id="th-estilo3">FECHA EVOLUCION FALTANTE</th>
            </tr>
            <?php
            $sql="SELECT d.doc_pac ,d.nom1,' ',d.nom2,' ',d.ape1,' ',d.ape2 paciente,a.id_adm_hosp,c.fingreso_hosp,c.fegreso_hosp,a.fecha,a.mes,if(c.id_sedes_ips=2,'Facatativa','Bogota')  sede
                  FROM calendario a,adm_hospitalario c,pacientes d
                  WHERE c.tipo_servicio = 'Hospitalario' and a.año = 2017
                  and a.mes > 3

  and a.fecha not in ('2017-01-01','2017-01-07','2017-01-08','2017-01-09','2017-01-14','2017-01-15','2017-01-21',
  '2017-01-22','2017-01-28','2017-01-29','2017-02-04','2017-02-05','2017-02-11','2017-02-12',
  '2017-02-18','2017-02-19','2017-02-25','2017-02-26','2017-03-04','2017-03-05','2017-03-11',
  '2017-03-12','2017-03-18','2017-03-19','2017-03-20','2017-03-25','2017-03-26','2017-04-01',
  '2017-04-02','2017-04-08','2017-04-09','2017-04-13','2017-04-14','2017-04-15','2017-04-16',
  '2017-04-22','2017-04-23','2017-04-29','2017-04-30','2017-05-01','2017-05-06','2017-05-07',
  '2017-05-13','2017-05-14','2017-05-20','2017-05-21','2017-05-27','2017-05-28','2017-05-29',
  '2017-06-03','2017-06-04','2017-06-10','2017-06-11','2017-06-17','2017-06-18','2017-06-19',
  '2017-06-24','2017-06-25','2017-06-26','2017-07-01','2017-07-02','2017-07-03','2017-07-08',
  '2017-07-09','2017-07-15','2017-07-16','2017-07-20','2017-07-22','2017-07-23','2017-07-29',
  '2017-07-30','2017-08-05','2017-08-06','2017-08-12','2017-08-13','2017-08-19','2017-08-20',
  '2017-08-21','2017-08-26','2017-08-27','2017-09-02','2017-09-03','2017-09-09','2017-09-10',
  '2017-09-16','2017-09-17','2017-09-23','2017-09-24','2017-09-30','2017-10-01','2017-10-07',
  '2017-10-08','2017-10-14','2017-10-15','2017-10-16','2017-10-21','2017-10-22','2017-10-28',
  '2017-10-29','2017-11-04','2017-11-05','2017-11-06','2017-11-11','2017-11-12','2017-11-13',
  '2017-11-18','2017-11-19','2017-11-25','2017-11-26','2017-12-02','2017-12-03','2017-12-08',
  '2017-12-09','2017-12-10','2017-12-16','2017-12-17','2017-12-23','2017-12-24','2017-12-25',
  '2017-12-30','2017-12-31')
  and c.id_sedes_ips in (2,8)
  and c.id_adm_hosp = a.id_adm_hosp
  and a.fecha > c.fingreso_hosp and a.fecha <= IFNULL(c.fegreso_hosp,(CURRENT_DATE-1))
  and d.id_paciente = c.id_paciente
  and not exists (select 1 from evo_to  b where b.id_adm_hosp = a.id_adm_hosp and b.freg_evoto = a.fecha)
  order by 2";
            if ($tabla=$bd1->sub_tuplas($sql)){
              //echo $sql;
              foreach ($tabla as $fila ) {
                echo"<tr >\n";
                echo'<td class="text-center warning">'.$fila["id_adm_hosp"].' </td>';
                echo'<td class="text-center warning">'.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
                echo'<td class="text-center warning">'.$fila["doc_pac"].'</td>';
                echo'<td class="text-center warning">'.$fila["fingreso_hosp"].'</td>';
                echo'<td class="text-center warning">'.$fila["fegreso_hosp"].'</td>';
                echo'<td class="text-center warning">'.$fila["fecha"].'</td>';
                echo'<td class="text-center warning">'.$fila["sede"].'</td>';
                echo "</tr>\n";
              }
            }

            ?>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </section>
  </section>
