<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav " id="barra">
    <li class="dropdown">
      <button class="btn btn-success dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Censo Clinicas <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a  data-toggle="modal" data-target="#censobta" type="button" ><span class="fa fa-search"> Censo Diario Bogota</span></a></li>
        <li><a  data-toggle="modal" data-target="#censofaca" type="button" ><span class="fa fa-search"> Censo Diario Facatativa</span></a></li>
      </ul>
    </li>
  </ul>
  <ul class="nav navbar-nav " id="barra">
    <li class="dropdown">
      <button class="btn btn-success dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Censo Hospital dia <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a  data-toggle="modal" data-target="#censobtahd" type="button" ><span class="fa fa-search"> Censo Diario Hospital dia</span></a></li>
      </ul>
    </li>
  </ul>
  <section >   <!--  search for clinica de bogota in down-->
      <section>
        <section class="modal fade" id="censobta" role="dialog">
          <section class="modal-dialog modal-lg" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title alert-success" >Censo Diario Clinica Hospital dia</h3>
              </div>
              <div class="modal-body">
                <table class="table table-bordered">
                  <tr>
                    <td class="text-center"><strong>Identificacion</strong></td>
                    <td class="text-center"><strong>Nombre completo</strong></td>
                    <td class="text-center"><strong>Edad</strong></td>
                    <td class="text-center"><strong>Genero</strong></td>
                    <td class="text-center"><strong>Dias de estancia</strong></td>
                    <td class="text-center"><strong>Fecha ingreso</strong></td>
                    <td class="text-center"><strong>EPS</strong></td>
                    <td class="text-center"><strong>Diagnostico / Impresion diagnostica</strong></td>
                  </tr>
                  <?php

                  $sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,fotopac,
                  b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,zona_residencia,nivel,tipo_servicio,resp_admhosp,
                  c.descripestadoc,
                  d.descriafiliado,
                  e.descritusuario,
                  f.descriocu,
                  i.descripuedad,
                  j.nom_eps,
                  k.clasificacion_dx,dxp,ddxp

                  from pacientes a inner join adm_hospitalario b on a.id_paciente=b.id_paciente
                        left join estado_civil c on (c.codestadoc = a.estadocivil)
                        inner join tusuario e on (e.codtusuario=b.tipo_usuario)
                        inner join tafiliado d on (d.codafiliado=b.tipo_afiliacion)
                        inner join ocupacion f on (f.codocu=b.ocupacion)
                        inner join uedad i on (i.coduedad=a.uedad)
                        left join eps j on (j.id_eps=b.id_eps)
                        left join hc_hospitalario k on (k.id_adm_hosp=b.id_adm_hosp)


                  where b.id_sedes_ips ='8' and b.estado_adm_hosp='Activo' and tipo_servicio='Hospitalario' order by a.edad ASC";
                    //echo $sql;
                  if ($tabla=$bd1->sub_tuplas($sql)){

                    //echo $sql;
                    foreach ($tabla as $fila ) {
                      $fecha=$fila["fingreso_hosp"];
                      $segundos= strtotime('now') - strtotime($fecha);
                      $diferencia_dias=intval($segundos/60/60/24);
                      echo"<tr >\n";
                      echo'<td class="text-center success"><strong><span class="fa fa-user-md"></span> '.$fila["tdoc_pac"].' : '.$fila["doc_pac"].' </strong></td>';
                      echo'<td class="text-left info"> '.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
                      echo'<td class="text-left info"> '.$fila["edad"].'</td>';
                      echo'<td class="text-left info"> '.$fila["genero"].'</td>';
                      echo'<td class="text-left info"> '.$diferencia_dias.'</td>';
                      echo'<td class="text-left info"> '.$fila["fingreso_hosp"].'</td>';
                      echo'<td class="text-left info"> '.$fila["nom_eps"].'</td>';
                      echo'<td class="text-left info"> '.$fila["dxp"].' | '.$fila["ddxp"].'</td>';
                      echo '</tr>';
                    }
                            $sql1="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,fotopac,
                            b.id_adm_hosp, count(b.id_adm_hosp) cuantas,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,zona_residencia,nivel,tipo_servicio,resp_admhosp,
                            c.descripestadoc,
                            d.descriafiliado,
                            e.descritusuario,
                            f.descriocu,
                            g.descripdep,
                            h.descrimuni,
                            i.descripuedad,
                            j.nom_eps,
                            k.clasificacion_dx,dxp,ddxp
                            from pacientes a inner join adm_hospitalario b on a.id_paciente=b.id_paciente
                                  left join estado_civil c on (c.codestadoc = a.estadocivil)
                                  inner join tusuario e on (e.codtusuario=b.tipo_usuario)
                                  inner join tafiliado d on (d.codafiliado=b.tipo_afiliacion)
                                  inner join ocupacion f on (f.codocu=b.ocupacion)
                                  inner join uedad i on (i.coduedad=a.uedad)
                                  left join eps j on (j.id_eps=b.id_eps)
                                  left join hc_hospitalario k on (k.id_adm_hosp=b.id_adm_hosp)

                            where b.id_sedes_ips ='8' and b.estado_adm_hosp='Activo' and tipo_servicio='Hospitalario' and a.genero='Masculino'";
                            if ($tabla=$bd1->sub_tuplas($sql1)){

                                  foreach ($tabla as $fila1 ) {

                                    echo"<tr> \n";
                                    echo'<td class="text-center alert-success">Total Pacientes Masculinos: </td>';
                                    echo'<td class="text-center">'.$fila1["cuantas"].'</td>';
                                    echo "</tr>\n";

                                  }
                                }
                  }

                  ?>
                </table>
              </div>

            </div>
          </section>
        </section>
      </section>
  </section>

  <section >   <!--  search for clinica de facatativa in down-->
      <section>
        <section class="modal fade" id="censofaca" role="dialog">
          <section class="modal-dialog modal-lg" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title alert-success" >Censo Diario Clinica Facatativa</h3>
              </div>
              <div class="modal-body">
                <table class="table table-bordered">
                  <tr>
                    <td class="text-center"><strong>Identificacion</strong></td>
                    <td class="text-center"><strong>Nombre completo</strong></td>
                    <td class="text-center"><strong>Edad</strong></td>
                    <td class="text-center"><strong>Genero</strong></td>
                    <td class="text-center"><strong>Dias de estancia</strong></td>
                    <td class="text-center"><strong>Fecha ingreso</strong></td>
                    <td class="text-center"><strong>EPS</strong></td>
                    <td class="text-center"><strong>Diagnostico / Impresion diagnostica</strong></td>
                  </tr>
                  <?php

                  $sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,fotopac,
                  b.id_adm_hosp,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,zona_residencia,nivel,tipo_servicio,resp_admhosp,
                  c.descripestadoc,
                  d.descriafiliado,
                  e.descritusuario,
                  f.descriocu,
                  i.descripuedad,
                  j.nom_eps,
                  k.clasificacion_dx,dxp,ddxp

                  from pacientes a inner join adm_hospitalario b on a.id_paciente=b.id_paciente
                        left join estado_civil c on (c.codestadoc = a.estadocivil)
                        inner join tusuario e on (e.codtusuario=b.tipo_usuario)
                        inner join tafiliado d on (d.codafiliado=b.tipo_afiliacion)
                        inner join ocupacion f on (f.codocu=b.ocupacion)
                        inner join uedad i on (i.coduedad=a.uedad)
                        left join eps j on (j.id_eps=b.id_eps)
                        left join hc_hospitalario k on (k.id_adm_hosp=b.id_adm_hosp)


                  where b.id_sedes_ips ='2' and b.estado_adm_hosp='Activo' and tipo_servicio='Hospitalario' order by a.edad ASC";
                    //echo $sql;
                  if ($tabla=$bd1->sub_tuplas($sql)){

                    //echo $sql;
                    foreach ($tabla as $fila ) {
                      $fecha=$fila["fingreso_hosp"];
                      $segundos= strtotime('now') - strtotime($fecha);
                      $diferencia_dias=intval($segundos/60/60/24);
                      echo"<tr >\n";
                      echo'<td class="text-center success"><strong><span class="fa fa-user-md"></span> '.$fila["tdoc_pac"].' : '.$fila["doc_pac"].' </strong></td>';
                      echo'<td class="text-left info"> '.$fila["nom1"].' '.$fila["nom2"].' '.$fila["ape1"].' '.$fila["ape2"].'</td>';
                      echo'<td class="text-left info"> '.$fila["edad"].'</td>';
                      echo'<td class="text-left info"> '.$fila["genero"].'</td>';
                      echo'<td class="text-left info"> '.$diferencia_dias.'</td>';
                      echo'<td class="text-left info"> '.$fila["fingreso_hosp"].'</td>';
                      echo'<td class="text-left info"> '.$fila["nom_eps"].'</td>';
                      echo'<td class="text-left info"> '.$fila["dxp"].' | '.$fila["ddxp"].'</td>';
                      echo '</tr>';
                    }
                    $sql1="Select  count(id_adm_hosp) cuantas from adm_hospitalario where  id_sedes_ips ='2' and estado_adm_hosp='Activo' and tipo_servicio='Hospitalario'";
                    if ($tabla=$bd1->sub_tuplas($sql1)){

                          foreach ($tabla as $fila1 ) {

                            echo"<tr> \n";
                            echo'<td class="text-center alert-info">Total Pacientes: </td>';
                            echo'<td class="text-center">'.$fila1["cuantas"].'</td>';
                            echo "</tr>\n";

                          }
                        }
                        $sql1="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,fotopac,
                        b.id_adm_hosp, count(b.id_adm_hosp) cuantas,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,zona_residencia,nivel,tipo_servicio,resp_admhosp,
                        c.descripestadoc,
                        d.descriafiliado,
                        e.descritusuario,
                        f.descriocu,
                        i.descripuedad,
                        j.nom_eps,
                        k.clasificacion_dx,dxp,ddxp
                        from pacientes a inner join adm_hospitalario b on a.id_paciente=b.id_paciente
                              left join estado_civil c on (c.codestadoc = a.estadocivil)
                              inner join tusuario e on (e.codtusuario=b.tipo_usuario)
                              inner join tafiliado d on (d.codafiliado=b.tipo_afiliacion)
                              inner join ocupacion f on (f.codocu=b.ocupacion)
                              inner join uedad i on (i.coduedad=a.uedad)
                              left join eps j on (j.id_eps=b.id_eps)
                              left join hc_hospitalario k on (k.id_adm_hosp=b.id_adm_hosp)

                        where b.id_sedes_ips ='2' and b.estado_adm_hosp='Activo' and tipo_servicio='Hospitalario' and a.genero='Femenino'";
                        if ($tabla=$bd1->sub_tuplas($sql1)){

                              foreach ($tabla as $fila1 ) {

                                echo"<tr> \n";
                                echo'<td class="text-center alert-danger">Total Pacientes Femeninos: </td>';
                                echo'<td class="text-center">'.$fila1["cuantas"].'</td>';
                                echo "</tr>\n";

                              }
                            }
                            $sql1="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,fotopac,
                            b.id_adm_hosp, count(b.id_adm_hosp) cuantas,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,zona_residencia,nivel,tipo_servicio,resp_admhosp,
                            c.descripestadoc,
                            d.descriafiliado,
                            e.descritusuario,
                            f.descriocu,
                            i.descripuedad,
                            j.nom_eps,
                            k.clasificacion_dx,dxp,ddxp
                            from pacientes a inner join adm_hospitalario b on a.id_paciente=b.id_paciente
                                  left join estado_civil c on (c.codestadoc = a.estadocivil)
                                  inner join tusuario e on (e.codtusuario=b.tipo_usuario)
                                  inner join tafiliado d on (d.codafiliado=b.tipo_afiliacion)
                                  inner join ocupacion f on (f.codocu=b.ocupacion)
                                  inner join uedad i on (i.coduedad=a.uedad)
                                  left join eps j on (j.id_eps=b.id_eps)
                                  left join hc_hospitalario k on (k.id_adm_hosp=b.id_adm_hosp)

                            where b.id_sedes_ips ='2' and b.estado_adm_hosp='Activo' and tipo_servicio='Hospitalario' and a.genero='Masculino'";
                            if ($tabla=$bd1->sub_tuplas($sql1)){

                                  foreach ($tabla as $fila1 ) {

                                    echo"<tr> \n";
                                    echo'<td class="text-center alert-success">Total Pacientes Masculinos: </td>';
                                    echo'<td class="text-center">'.$fila1["cuantas"].'</td>';
                                    echo "</tr>\n";

                                  }
                                }
                  }

                  ?>
                </table>
              </div>

            </div>
          </section>
        </section>
      </section>
  </section>
