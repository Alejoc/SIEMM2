
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav " id="barra">
      <li class="dropdown">
        <button class="btn btn-success dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Medicos <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a  data-toggle="modal" data-target="#hc" type="button" ><span class="fa fa-search"> HC</span></a></li>
          <li><a data-toggle="modal" data-target="#evoluciones" type="button" ><span class="fa fa-search">Evoluciones </span></a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav " id="barra">
      <li class="dropdown">
        <button class="btn btn-success dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Enfermería <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a  data-toggle="modal" data-target="#busnotas" type="button" ><span class="fa fa-search"> Notas enfermería</span></a></li>
          <li><a  data-toggle="modal" data-target="#signos" type="button" ><span class="fa fa-search"> Signos Vitales</span></a></li>
          <li><a  data-toggle="modal" data-target="#liquidos" type="button" ><span class="fa fa-search"> Liquidos</span></a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav" id="barra">
      <li class="dropdown">
        <button class="btn btn-success dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Psicológia <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a  data-toggle="modal" data-target="#vipsico" type="button" ><span class="fa fa-search"> Valoración inicial</span></a></li>
          <li><a  data-toggle="modal" data-target="#evopsico" type="button" ><span class="fa fa-search"> Evoluciones</span></a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav" id="barra">
      <li class="dropdown">
        <button class="btn btn-success dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Terapia Ocupacional <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a  data-toggle="modal" data-target="#vinicialto" type="button" ><span class="fa fa-search"> Valoración inicial</span></a></li>
          <li><a  data-toggle="modal" data-target="#evoto" type="button" ><span class="fa fa-search"> Evoluciones</span></a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav" id="barra">
      <li class="dropdown">
        <button class="btn btn-success dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Trabajo Social <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a  data-toggle="modal" data-target="#valinits" type="button" ><span class="fa fa-search"> Valoración inicial</span></a></li>
          <li><a  data-toggle="modal" data-target="#evots" type="button" ><span class="fa fa-search"> Evoluciones</span></a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav" id="barra">
      <li class="dropdown">
        <button class="btn btn-success dropdown-toggle margen1" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Nutrición <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a  data-toggle="modal" data-target="#valininutri" type="button" ><span class="fa fa-search"> Valoración inicial</span></a></li>
          <li><a  data-toggle="modal" data-target="#evonutri" type="button" ><span class="fa fa-search"> Evoluciones</span></a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav" id="barra">
      <li class="dropdown">
        <button class="btn btn-danger dropdown-toggle margen1 animated shake" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Alertas y/o ordenes verbales <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a  data-toggle="modal" data-target="#ordverbal" type="button" ><span class="fa fa-search"> Ordenes Verbales</span></a></li>
        </ul>
      </li>
    </ul>
  </div>
</article>
<section >
    <section>
      <section class="modal fade" id="hc" role="dialog">
        <section class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" >Historia Clínica Ingreso</h4>
            </div>
            <div class="modal-body">
              <table class="table table-responsive">
                <tr>

                </tr>
                <?php
                if (isset($_REQUEST["idadmhosp"])){
                $id=$_REQUEST["idadmhosp"];
                $sql="SELECT a.id_adm_hosp,estado_adm_hosp,n.freg_hchosp,hreg_hchosp,motivo_consulta,enfer_actual,his_personal,his_familiar,perso_premorbida,ant_alergicos,ant_patologico,ant_quirurgico,ant_toxicologico,ant_farmaco,ant_gineco,ant_psiquiatrico,ant_hospitalario,ant_traumatologico,ant_familiar,otros_ant,estado_general,tad,tas,tam,fr,fc,so,peso,talla,temperatura,imc,cabcuello,torax,ext,abdomen,neurologico,genitourinario,examen_mental,analisis,finalidad,causa_externa,plantratamiento FROM adm_hospitalario a LEFT JOIN hc_hospitalario n on a.id_adm_hosp=n.id_adm_hosp where a.id_adm_hosp='".$id."'";

                if ($tabla=$bd1->sub_tuplas($sql)){
                  //echo $sql;
                  foreach ($tabla as $fila ) {


                    echo"<tr >\n";
                    echo'<td class="text-center success"><span class="fa fa-calendar"></span><strong> '.$fila["freg_hchosp"].'  '.$fila["hreg_hchosp"].' </strong></td>';
                    echo'<td class="text-center success" colspan="9"><span class="fa fa-user-md"> </span><strong>'.$fila["resp_hchosp"].' </strong></td>';
                    echo '</tr>';
                    echo"<tr >\n";
                    echo'<td colspan="10" class="text-center danger">ANAMNESIS</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo'<td colspan="5" class="text-center info">Motivo de Consulta</td>';
                    echo'<td colspan="5" class="text-center info" >Enfermedad Actual</td>';
                    echo"</tr>";
                    echo "<tr>";
                    echo'<td colspan="5" class="text-center">'.$fila["motivo_consulta"].'</td>';
                    echo'<td colspan="5" class="text-left">'.$fila["enfer_actual"].'</td>';
                    echo "</tr>\n";
                    echo '<tr>';
                    echo'<td colspan="5" class="text-center info">Historia Personal</td>';
                    echo'<td colspan="5" class="text-center info" >Historia Familiar</td>';
                    echo"</tr>";
                    echo "<tr>";
                    echo'<td colspan="5" class="text-center">'.$fila["his_personal"].'</td>';
                    echo'<td colspan="5" class="text-left">'.$fila["his_familiar"].'</td>';
                    echo "</tr>\n";
                    echo '<tr>';
                    echo'<td colspan="10" class="text-center info">Personalidad Premorbida</td>';
                    echo"</tr>";
                    echo "<tr>";
                    echo'<td colspan="10" class="text-center">'.$fila["perso_premorbida"].'</td>';
                    echo "</tr>\n";
                    echo"<tr >\n";
                    echo'<td colspan="10" class="text-center danger">ANTECEDENTES PERSONALES</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo'<td class="text-center info">Alergicos</td>';
                    echo'<td colspan="9" class="text-center">'.$fila["ant_alergicos"].'</td>';
                    echo"</tr>";
                    echo "<tr>";
                    echo'<td class="text-center info" >Psiquiatricos</td>';
                    echo'<td colspan="9" class="text-center">'.$fila["ant_psiquiatrico"].'</td>';
                    echo "</tr>\n";
                    echo "<tr>";
                    echo'<td class="text-center info" >Patológicos</td>';
                    echo'<td colspan="9" class="text-center">'.$fila["ant_patologico"].'</td>';
                    echo "</tr>\n";
                    echo "<tr>";
                    echo'<td class="text-center info" >Quirurgicos</td>';
                    echo'<td colspan="9" class="text-center">'.$fila["ant_quirurgico"].'</td>';
                    echo "</tr>\n";
                    echo "<tr>";
                    echo'<td class="text-center info" >Toxicológicos</td>';
                    echo'<td colspan="9" class="text-center">'.$fila["ant_toxicologico"].'</td>';
                    echo "</tr>\n";
                    echo "<tr>";
                    echo'<td class="text-center info" >Farmacológicos</td>';
                    echo'<td colspan="9" class="text-center">'.$fila["ant_farmaco"].'</td>';
                    echo "</tr>\n";
                    echo "<tr>";
                    echo'<td class="text-center info" >Hospitalarios</td>';
                    echo'<td colspan="9" class="text-center">'.$fila["ant_hospitalario"].'</td>';
                    echo "</tr>\n";
                    echo "<tr>";
                    echo'<td class="text-center info" >Gineco-Obstetricos</td>';
                    echo'<td colspan="9" class="text-center">'.$fila["ant_gineco"].'</td>';
                    echo "</tr>\n";
                    echo "<tr>";
                    echo'<td class="text-center info" >Traumatológicos</td>';
                    echo'<td colspan="9" class="text-center">'.$fila["ant_traumatologico"].'</td>';
                    echo "</tr>\n";
                    echo "<tr>";
                    echo'<td class="text-center info" >Familiares</td>';
                    echo'<td colspan="9" class="text-center">'.$fila["ant_familiar"].'</td>';
                    echo "</tr>\n";
                    echo "<tr>";
                    echo'<td class="text-center info" >Otros Antecedentes</td>';
                      echo'<td colspan="9" class="text-center">'.$fila["otros_ant"].'</td>';
                    echo "</tr>\n";
                    echo"<tr >\n";
                    echo'<td colspan="10" class="text-center danger">EXAMEN FÍSICO</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo'<td class="text-center info">TAS</td>';
                    echo'<td class="text-center info" >TAD</td>';
                    echo'<td class="text-center info" >TAM</td>';
                    echo'<td class="text-center info" >FC</td>';
                    echo'<td class="text-center info" >FR</td>';
                    echo'<td class="text-center info" >SAO2</td>';
                    echo'<td class="text-center info" >PESO</td>';
                    echo'<td class="text-center info" >TALLA</td>';
                    echo'<td class="text-center info" >TEMP</td>';
                    echo'<td class="text-center info" >IMC</td>';
                    echo"</tr>";
                    echo "<tr>";
                    echo'<td class="text-center info">'.$fila["tas"].'</td>';
                    echo'<td class="text-center info" >'.$fila["tad"].'</td>';
                    echo'<td class="text-center info" >'.$fila["tam"].'</td>';
                    echo'<td class="text-center info" >'.$fila["fc"].'</td>';
                    echo'<td class="text-center info" >'.$fila["fr"].'</td>';
                    echo'<td class="text-center info" >'.$fila["so"].'</td>';
                    echo'<td class="text-center info" >'.$fila["peso"].'</td>';
                    echo'<td class="text-center info" >'.$fila["talla"].'</td>';
                    echo'<td class="text-center info" >'.$fila["temperatura"].'</td>';
                    echo'<td class="text-center info" >'.$fila["imc"].'</td>';
                    echo "</tr>\n";
                    echo"<tr >\n";
                    echo'<td colspan="10" class="text-center danger">EXPLORACIÓN GENERAL Y REGIONAL</td>';
                    echo '</tr>';
                    echo "<tr>";
                    echo'<td class="text-center info" >Estado General</td>';
                    echo'<td colspan="9" class="text-center">'.$fila["estado_general"].'</td>';
                    echo "</tr>\n";
                    echo "<tr>";
                    echo'<td class="text-center info" >Cabeza y Cuello</td>';
                    echo'<td colspan="9" class="text-center">'.$fila["cabcuello"].'</td>';
                    echo "</tr>\n";
                    echo "<tr>";
                    echo'<td class="text-center info" >Torax</td>';
                    echo'<td colspan="9" class="text-center">'.$fila["torax"].'</td>';
                    echo "</tr>\n";
                    echo "<tr>";
                    echo'<td class="text-center info" >Abdomen</td>';
                    echo'<td colspan="9" class="text-center">'.$fila["abdomen"].'</td>';
                    echo "</tr>\n";
                    echo "<tr>";
                    echo'<td class="text-center info" >Genitourinario</td>';
                    echo'<td colspan="9" class="text-center">'.$fila["genitourinario"].'</td>';
                    echo "</tr>\n";
                    echo "<tr>";
                    echo'<td class="text-center info" >Extremidades</td>';
                    echo'<td colspan="9" class="text-center">'.$fila["ext"].'</td>';
                    echo "</tr>\n";
                    echo "<tr>";
                    echo'<td class="text-center info" >Neurologico</td>';
                    echo'<td colspan="9" class="text-center">'.$fila["neurologico"].'</td>';
                    echo "</tr>\n";
                    echo"<tr >\n";
                    echo'<td colspan="10" class="text-center danger">Examen Mental y Analisis</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo'<td colspan="5" class="text-center info">Examen Mental</td>';
                    echo'<td colspan="5" class="text-center info" >Analisis</td>';
                    echo"</tr>";
                    echo "<tr>";
                    echo'<td colspan="5" class="text-center">'.$fila["examen_mental"].'</td>';
                    echo'<td colspan="5" class="text-left">'.$fila["analisis"].'</td>';
                    echo "</tr>\n";
                    echo '<tr>';
                    echo'<td colspan="10" class="text-center info">Plan tratamiento</td>';
                    echo"</tr>";
                    echo "<tr>";
                    echo'<td colspan="10" class="text-left">'.$fila["plantratamiento"].'</td>';
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
<section>
  <article >
    <section class="modal fade" id="signos" role="dialog">
      <section class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" >Historico de Signos Vitales</h4>
          </div>
          <div class="modal-body">
            <table class="table table-bordered">
              <tr>

              </tr>
              <?php
              if (isset($_REQUEST["idadmhosp"])){
              $id=$_REQUEST["idadmhosp"];
              $sql="SELECT a.id_adm_hosp,estado_adm_hosp,n.freg_sv,hreg_sv,tas_s,tad_s,tm_s,fr_s,fc_s,temp_s,spo_s,resp_sv FROM adm_hospitalario a LEFT JOIN signos_vitales n on a.id_adm_hosp=n.id_adm_hosp where a.id_adm_hosp='".$id."' order by n.freg_sv DESC";

              if ($tabla=$bd1->sub_tuplas($sql)){
                //echo $sql;
                foreach ($tabla as $fila ) {

                  echo"<tr >\n";
                  echo'<td class="text-center danger"><span class="fa fa-calendar"></span> '.$fila["freg_sv"].'</td>';
                  echo'<td class="text-center info">TA Sistólica</td>';
                  echo'<td class="text-center info">TA Diastólica</td>';
                  echo'<td class="text-center info">TA Media</td>';
                  echo'<td class="text-center info" >FR</td>';
                  echo'<td class="text-center info">FC</td>';
                  echo'<td class="text-center info" >TEMP</td>';
                  echo'<td class="text-center info" >SpO</td>';
                  echo'<td class="text-center success"><span class="fa fa-user"></span> Responsable</td>';
                  echo"</tr>";
                  echo "<tr>";
                  echo'<td class="text-center">'.$fila["hreg_sv"].'</td>';
                  echo'<td class="text-center">'.$fila["tas_s"].'</td>';
                  echo'<td class="text-center">'.$fila["tad_s"].'</td>';
                  echo'<td class="text-center">'.$fila["tm_s"].'</td>';
                  echo'<td class="text-center">'.$fila["fr_s"].'</td>';
                  echo'<td class="text-center">'.$fila["fc_s"].'</td>';
                  echo'<td class="text-center">'.$fila["temp_s"].'</td>';
                  echo'<td class="text-center">'.$fila["spo_s"].'</td>';
                  echo'<td class="text-center">'.$fila["resp_sv"].'</td>';
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
  </article>
</section>
<section >
    <section>
      <section class="modal fade" id="evoluciones" role="dialog">
        <section class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" >Historico de Evoluciones medicas</h4>
            </div>
            <div class="modal-body">
              <table class="table table-bordered">
                <tr>

                </tr>
                <?php
                if (isset($_REQUEST["idadmhosp"])){
                $id=$_REQUEST["idadmhosp"];
                $sql="SELECT e.id_adm_hosp,freg_evomed,hreg_evomed,max(id_evomed),max(objetivo),max(subjetivo),max(analisis_evomed),max(plan_tratamiento),u.cuenta,nombre,doc,rm_profesional,especialidad,firma FROM evolucion_medica e LEFT JOIN user u on e.id_user=u.id_user  where e.id_adm_hosp='".$_GET["idadmhosp"]."' group by e.id_adm_hosp,e.freg_evomed,e.hreg_evomed,u.cuenta,nombre,doc,rm_profesional,especialidad,firma ORDER BY freg_evomed DESC";
                  //echo $sql;
                if ($tabla=$bd1->sub_tuplas($sql)){
                  //echo $sql;
                  foreach ($tabla as $fila ) {

                    echo"<tr >\n";
                    echo'<td class="text-center danger"><strong><span class="fa fa-calendar"></span> '.$fila["freg_evomed"].' '.$fila["hreg_evomed"].'</strong></td>';
                    echo'<td class="text-center success"><strong><span class="fa fa-user-md"></span> '.$fila["nombre"].' </strong></td>';
                    echo'<td class="text-center warning"><strong><span class="fa fa-medkit"></span> '.$fila["especialidad"].' </strong></td>';
                    echo '</tr>';
                    echo"<tr >\n";
                    echo'<td class="text-center info"><b>SUBJETIVO</b></td>';
                    echo'<td class="text-left">'.$fila["max(subjetivo)"].'</td>';
                    echo '</tr>';
                    echo"<tr >\n";
                    echo'<td class="text-center info" ><b>OBJETIVO</b></td>';
                    echo'<td class="text-left">'.$fila["max(objetivo)"].'</td>';
                    echo '</tr>';
                    echo"<tr >\n";
                    echo'<td class="text-center info"><b>ANALISIS</b></td>';
                    echo'<td class="text-left">'.$fila["max(analisis_evomed)"].'</td>';
                    echo '</tr>';
                    echo"<tr >\n";
                    echo'<td class="text-center info" ><b>PLAN TRATAMIENTO</b></td>';
                    echo'<td class="text-left">'.$fila["max(plan_tratamiento)"].'</td>';
                    echo '</tr>';
                    echo "<tr>";
                    echo'<td class="text-center"></td>';
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
<section >
    <section>
      <section class="modal fade" id="evopsico" role="dialog">
        <section class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" >Historico de Evoluciones Psicologia</h4>
            </div>
            <div class="modal-body">
              <table class="table table-bordered">
                <tr>

                </tr>
                <?php
                if (isset($_REQUEST["idadmhosp"])){
                $id=$_REQUEST["idadmhosp"];
                $sql="SELECT a.id_adm_hosp,estado_adm_hosp,n.freg_evo_psico,hreg_evo_psico,obj_sesion,actividades,resultado,obs_evo_psico,resp_evo_psico FROM adm_hospitalario a LEFT JOIN evo_psicologia n on a.id_adm_hosp=n.id_adm_hosp where a.id_adm_hosp='".$id."' order by n.freg_evo_psico DESC ";

                if ($tabla=$bd1->sub_tuplas($sql)){
                  //echo $sql;
                  foreach ($tabla as $fila ) {

                    echo"<tr >\n";
                    echo'<td class="text-center danger"><span class="fa fa-calendar"></span><strong> '.$fila["freg_evo_psico"].' '.$fila["hreg_evo_psico"].'</strong></td>';
                    echo'<td class="text-center danger"><span class="fa fa-user-md"></span><strong> '.$fila["resp_evo_psico"].'</strong></td>';
                    echo '</tr>';
                    echo"<tr >\n";
                    echo'<td class="text-center info"><strong>TIPO SESIÓN</strong></td>';
                    echo'<td class="text-left">'.$fila["tipo_sesion"].'</td>';
                    echo '</tr>';
                    echo"<tr >\n";
                    echo'<td class="text-center info" ><strong>OBJETIVO SESIÓN</strong></td>';
                    echo'<td class="text-left">'.$fila["obj_sesion"].'</td>';
                    echo '</tr>';
                    echo"<tr >\n";
                    echo'<td class="text-center info"><strong>ACTIVIDADES</strong></td>';
                    echo'<td class="text-left">'.$fila["actividades"].'</td>';
                    echo '</tr>';
                    echo"<tr >\n";
                    echo'<td class="text-center info" ><strong>RESULTADOS</strong></td>';
                    echo'<td class="text-left">'.$fila["resultado"].'</td>';
                    echo '</tr>';
                    echo"<tr >\n";
                    echo'<td class="text-center info" ><strong>OSERVACIONES</strong></td>';
                    echo'<td class="text-left">'.$fila["obs_evo_psico"].'</td>';
                    echo '</tr>';
                    echo"<tr >\n";

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
<section >
    <section>
      <section class="modal fade" id="vipsico" role="dialog">
        <section class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" >Valoración inicial Psicologia</h4>
            </div>
            <div class="modal-body">
              <table class="table table-bordered">
                <tr>

                </tr>
                <?php
                if (isset($_REQUEST["idadmhosp"])){
                $id=$_REQUEST["idadmhosp"];
                $sql="SELECT a.id_adm_hosp,estado_adm_hosp,n.id_valini_psico,freg_valini_psico,hreg_valini_hosp,motivo_hosp,conducta_personal,hipo_predisposicion,hipo_adquisicion,hipo_mantenimiento,estado_valini_psico,resp_valini_psico FROM adm_hospitalario a LEFT JOIN valini_psicologia n on a.id_adm_hosp=n.id_adm_hosp where a.id_adm_hosp='".$id."' order by n.freg_valini_psico DESC";

                if ($tabla=$bd1->sub_tuplas($sql)){
                  //echo $sql;
                  foreach ($tabla as $fila ) {

                    echo"<tr >\n";
                    echo'<td class="text-center danger"><span class="fa fa-calendar"></span> '.$fila["freg_valini_psico"].' '.$fila["hreg_valini_psico"].'</td>';
                    echo '</tr>';
                    echo"<tr >\n";
                    echo'<td class="text-center info">Motivo Hospitalización:</td>';
                    echo'<td class="text-left">'.$fila["motivo_hosp"].'</td>';
                    echo '</tr>';
                    echo"<tr >\n";
                    echo'<td class="text-center info" >Conducta Problema:</td>';
                    echo'<td class="text-left">'.$fila["conducta_personal"].'</td>';
                    echo '</tr>';
                    echo"<tr >\n";
                    echo'<td class="text-center info">Hipótesis de predisposición:</td>';
                    echo'<td class="text-left">'.$fila["hipo_predisposicion"].'</td>';
                    echo '</tr>';
                    echo"<tr >\n";
                    echo'<td class="text-center info" >Hipótesis de adquisición:</td>';
                    echo'<td class="text-left">'.$fila["hipo_adquisicion"].'</td>';
                    echo '</tr>';
                    echo"<tr >\n";
                    echo'<td class="text-center info" >Hipótesis de mantenimiento:</td>';
                    echo'<td class="text-left">'.$fila["hipo_mantenimiento"].'</td>';
                    echo '</tr>';
                    echo"<tr >\n";
                    echo'<td class="text-center success"><span class="fa fa-user"></span> Responsable</td>';
                    echo'<td class="text-center">'.$fila["resp_valini_psico"].'</td>';
                    echo"</tr>";
                    echo "<tr>";
                    echo'<td class="text-center"></td>';
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
<section >
  <section>
    <section class="modal fade" id="evoto" role="dialog">
      <section class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" >Historico de Evoluciones Terapia ocupacional</h4>
          </div>
          <div class="modal-body">
            <table class="table table-bordered">
              <tr>

              </tr>
              <?php
              if (isset($_REQUEST["idadmhosp"])){
              $id=$_REQUEST["idadmhosp"];
              $sql="SELECT e.id_adm_hosp,freg_evoto,hreg_evoto,evolucion_to,u.cuenta,nombre,doc,rm_profesional,especialidad,firma FROM evo_to e LEFT JOIN user u on e.id_user=u.id_user  where e.id_adm_hosp='".$_GET["idadmhosp"]."' order by freg_evoto DESC, hreg_evoto ASC";

              if ($tabla=$bd1->sub_tuplas($sql)){
                //echo $sql;
                foreach ($tabla as $fila ) {

                  echo"<tr >\n";
                  echo'<td class="text-center danger"><strong><span class="fa fa-calendar"></span> '.$fila["freg_evoto"].' '.$fila["hreg_evoto"].'</strong></td>';
                  echo'<td class="text-center success"><strong><span class="fa fa-user-md"></span> '.$fila["nombre"].' </strong></td>';
                  echo '</tr>';
                  echo"<tr >\n";
                  echo'<td class="text-center info"><b>EVOLUCION TERAPIA OCUPACIONAL</b></td>';
                  echo'<td class="text-left">'.$fila["evolucion_to"].'</td>';
                  echo '</tr>';
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
<section>
  <section class="modal fade" id="busnotas" role="dialog">
    <section class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" >Historico de Notas de Enfermería</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tr>

            </tr>
            <?php
            if (isset($_REQUEST["idadmhosp"])){
            $id=$_REQUEST["idadmhosp"];
            $sql="SELECT e.id_adm_hosp,freg_nota,hreg_nota,descripnota,u.cuenta,nombre,doc,rm_profesional,especialidad,firma FROM nota_enfermeria e LEFT JOIN user u on e.id_user=u.id_user  where e.id_adm_hosp='".$_GET["idadmhosp"]."' order by 2 DESC";

            if ($tabla=$bd1->sub_tuplas($sql)){
              //echo $sql;
              foreach ($tabla as $fila ) {
                echo"<tr >\n";
                echo'<td class="text-center danger"><strong><span class="fa fa-calendar"></span> '.$fila["freg_nota"].' '.$fila["hreg_nota"].'</strong></td>';
                echo'<td class="text-center success"><strong><span class="fa fa-user-md"></span> '.$fila["nombre"].' </strong></td>';
                echo'<td class="text-center warning"><strong><span class="fa fa-medkit"></span> '.$fila["especialidad"].' </strong></td>';
                echo '</tr>';
                echo"<tr >\n";
                echo'<td class="text-center info"><b>NOTA DE ENFERMERIA</b></td>';
                echo'<td class="text-left">'.$fila["descripnota"].'</td>';
                echo '</tr>';

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
<section>
  <section class="modal fade" id="evots" role="dialog">
    <section class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" >Historico de Evoluciones Trabajo social</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tr>

            </tr>
            <?php
            if (isset($_REQUEST["idadmhosp"])){
            $id=$_REQUEST["idadmhosp"];
            $sql="SELECT e.id_adm_hosp,freg_evots,hreg_evots,evolucion_ts,u.cuenta,nombre,doc,rm_profesional,especialidad,firma FROM evo_ts e LEFT JOIN user u on e.id_user=u.id_user  where e.id_adm_hosp='".$_GET["idadmhosp"]."' order by 2 DESC";

            if ($tabla=$bd1->sub_tuplas($sql)){
              //echo $sql;
              foreach ($tabla as $fila ) {
                echo"<tr >\n";
                echo'<td class="text-center danger"><strong><span class="fa fa-calendar"></span> '.$fila["freg_evots"].' '.$fila["hreg_evots"].'</strong></td>';
                echo'<td class="text-center success"><strong><span class="fa fa-user-md"></span> '.$fila["nombre"].' </strong></td>';
                echo'<td class="text-center warning"><strong><span class="fa fa-medkit"></span> '.$fila["especialidad"].' </strong></td>';
                echo '</tr>';
                echo"<tr >\n";
                echo'<td class="text-center info"><b>EVOLUCION TRABAJO SOCIAL</b></td>';
                echo'<td class="text-left">'.$fila["evolucion_ts"].'</td>';
                echo '</tr>';
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
<section>
  <section class="modal fade" id="valininutri" role="dialog">
    <section class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" >Valoración por Nutrición</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tr>

            </tr>
            <?php
            if (isset($_REQUEST["idadmhosp"])){
            $id=$_REQUEST["idadmhosp"];
            $sql="SELECT a.id_adm_hosp,estado_adm_hosp,n.freg_nutri,hreg_nutri,motivo_nutri,val_nutricional,dx_nutricional,plan_nutricional FROM adm_hospitalario a LEFT JOIN val_nutricion n on a.id_adm_hosp=n.id_adm_hosp where a.id_adm_hosp='".$id."' order by n.freg_nutri DESC";

            if ($tabla=$bd1->sub_tuplas($sql)){
              //echo $sql;
              foreach ($tabla as $fila ) {

                echo"<tr >\n";
                echo'<td class="text-center danger"><span class="fa fa-calendar"></span><strong> '.$fila["freg_nutri"].' '.$fila["hreg_nutri"].' </strong></td>';
                echo'<td class="text-center danger"><span class="fa fa-user-md">  </span><strong> '.$fila["resp_nutri"].' </strong></td>';
                echo '</tr>';
                echo"<tr >\n";
                echo'<td class="text-center info"><strong>Motivo Consulta:</strong></td>';
                echo'<td class="text-left">'.$fila["motivo_nutri"].'</td>';
                echo '</tr>';
                echo"<tr >\n";
                echo'<td class="text-center info" ><strong>Valoración nutricional:</strong></td>';
                echo'<td class="text-left">'.$fila["val_nutricional"].'</td>';
                echo '</tr>';
                echo"<tr >\n";
                echo'<td class="text-center info"><strong>Diagnostico nutricional:</strong></td>';
                echo'<td class="text-left">'.$fila["dx_nutricional"].'</td>';
                echo '</tr>';
                echo"<tr >\n";
                echo'<td class="text-center info"><strong>Plan nutricional:</strong></td>';
                echo'<td class="text-left">'.$fila["plan_nutricional"].'</td>';
                echo '</tr>';

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
<section>
  <section class="modal fade" id="evonutri" role="dialog">
    <section class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" >Historico de Evoluciones Nutricion</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tr>

            </tr>
            <?php
            if (isset($_REQUEST["idadmhosp"])){
            $id=$_REQUEST["idadmhosp"];
            $sql="SELECT e.id_adm_hosp,freg_nutrice_sm,hreg_nutrice_sm,evolucion_nutri,u.cuenta,nombre,doc,rm_profesional,especialidad,firma FROM evo_nutrism e LEFT JOIN user u on e.id_user=u.id_user  where e.id_adm_hosp='".$_GET["idadmhosp"]."' order by 2 DESC";

            if ($tabla=$bd1->sub_tuplas($sql)){
              //echo $sql;
              foreach ($tabla as $fila ) {
                echo"<tr >\n";
                echo'<td class="text-center danger"><strong><span class="fa fa-calendar"></span> '.$fila["freg_nutrice_sm"].' '.$fila["hreg_nutrice_sm"].'</strong></td>';
                echo'<td class="text-center success"><strong><span class="fa fa-user-md"></span> '.$fila["nombre"].' </strong></td>';
                echo'<td class="text-center warning"><strong><span class="fa fa-medkit"></span> '.$fila["especialidad"].' </strong></td>';
                echo '</tr>';
                echo"<tr >\n";
                echo'<td class="text-center info"><b>EVOLUCION NUTRICION</b></td>';
                echo'<td class="text-left">'.$fila["evolucion_nutri"].'</td>';
                echo '</tr>';

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
<section>
  <section class="modal fade" id="valininutri" role="dialog">
    <section class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" >Valoración por Nutrición</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tr>

            </tr>
            <?php
            if (isset($_REQUEST["idadmhosp"])){
            $id=$_REQUEST["idadmhosp"];
            $sql="SELECT a.id_adm_hosp,estado_adm_hosp,n.freg_nutri,hreg_nutri,motivo_nutri,val_nutricional,dx_nutricional,plan_nutricional FROM adm_hospitalario a LEFT JOIN val_nutricion n on a.id_adm_hosp=n.id_adm_hosp where a.id_adm_hosp='".$id."' order by n.freg_nutri DESC";

            if ($tabla=$bd1->sub_tuplas($sql)){
              //echo $sql;
              foreach ($tabla as $fila ) {

                echo"<tr >\n";
                echo'<td class="text-center danger"><span class="fa fa-calendar"></span><strong> '.$fila["freg_nutri"].' '.$fila["hreg_nutri"].' </strong></td>';
                echo'<td class="text-center danger"><span class="fa fa-user-md">  </span><strong> '.$fila["resp_nutri"].' </strong></td>';
                echo '</tr>';
                echo"<tr >\n";
                echo'<td class="text-center info"><strong>Motivo Consulta:</strong></td>';
                echo'<td class="text-left">'.$fila["motivo_nutri"].'</td>';
                echo '</tr>';
                echo"<tr >\n";
                echo'<td class="text-center info" ><strong>Valoración nutricional:</strong></td>';
                echo'<td class="text-left">'.$fila["val_nutricional"].'</td>';
                echo '</tr>';
                echo"<tr >\n";
                echo'<td class="text-center info"><strong>Diagnostico nutricional:</strong></td>';
                echo'<td class="text-left">'.$fila["dx_nutricional"].'</td>';
                echo '</tr>';
                echo"<tr >\n";
                echo'<td class="text-center info"><strong>Plan nutricional:</strong></td>';
                echo'<td class="text-left">'.$fila["plan_nutricional"].'</td>';
                echo '</tr>';

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
<section>
  <section class="modal fade" id="ordverbal" role="dialog">
    <section class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" >Ordenes verbales</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tr>

            </tr>
            <?php
            if (isset($_REQUEST["idadmhosp"])){
            $id=$_REQUEST["idadmhosp"];
            $sql="SELECT e.id_adm_hosp,freg_ord_verbal, hreg_ord_verbal, orden_verbal,u.cuenta,nombre,doc,rm_profesional,especialidad,firma FROM orden_verbal e LEFT JOIN user u on e.id_user=u.id_user  where e.id_adm_hosp='".$_GET["idadmhosp"]."' order by 2 DESC";

            if ($tabla=$bd1->sub_tuplas($sql)){
              //echo $sql;
              foreach ($tabla as $fila ) {
                echo"<tr >\n";
                echo'<td class="text-center danger"><strong><span class="fa fa-calendar"></span> '.$fila["freg_ord_verbal"].' '.$fila["hreg_ord_verbal"].'</strong></td>';
                echo'<td class="text-center success"><strong><span class="fa fa-user-md"></span> '.$fila["nombre"].' </strong></td>';
                echo'<td class="text-center warning"><strong><span class="fa fa-medkit"></span> '.$fila["especialidad"].' </strong></td>';
                echo '</tr>';
                echo"<tr >\n";
                echo'<td class="text-center info"><b>ORDEN VERBAL</b></td>';
                echo'<td class="text-left">'.$fila["orden_verbal"].'</td>';
                echo '</tr>';

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
