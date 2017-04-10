<form action="<?php echo PROGRAMA.'?&opcion='.$return;?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
  <section class="panel-body">
    <?php
      include("consulta_paciente.php");
    ?>
  </section>
<section class="panel-body">

  <article>
		<h4 id="th-estilot">Registro plan trimestral de <?php echo $terapia ;?> en <?php echo $servicio ;?></h4>
		<?php  include("consulta_rapidaDEM.php");?>
  <section class="panel-body">
    <article class="col-xs-3">
      <label for="">Fecha de registro:</label>
      <input type="text" name="freg" value="<?php echo $date ;?>" class="form-control" <?php echo $atributo1;?> >
    </article>
    <?php
    $sql="SELECT a.tdoc_pac,a.doc_pac,nom1,nom2,ape1,ape2,edad,fnacimiento,dir_pac,tel_pac,rh,email_pac,genero,lateralidad,religion,fotopac,
    b.id_adm_hosp,b.id_eps ideps,fingreso_hosp,hingreso_hosp,fegreso_hosp,hegreso_hosp,
    j.nom_eps,
    h.nom_sedes,
    i.descripuedad,
    max(id_ptgen_dem) id,max(freg_ptgen_dem) fecha, m.fvence_ptgen_dem, max(obj_general_dem) objetivo, m.estado_ptgen_dem
    from pacientes a inner join adm_hospitalario b on a.id_paciente=b.id_paciente
                      inner join eps j on (j.id_eps=b.id_eps)
                      inner join sedes_ips h on (h.id_sedes_ips=b.id_sedes_ips)
                      left join uedad i on (i.coduedad=a.uedad)
                      left join plan_general_dem m on (m.id_adm_hosp=b.id_adm_hosp)
    where b.id_adm_hosp ='".$_GET["idadmhosp"]."' and m.estado_ptgen_dem='Realizada'" ;
    if ($tabla=$bd1->sub_tuplas($sql)){
  		//echo $sql;
  		foreach ($tabla as $fila ) {
        echo'<article class="col-xs-12">
          <label for="">Objetivo General: </label>
          <input type="text" name="" value="'.$fila["id"].'">
          <input type="text" name="" value="'.$fila["fecha"].'">
          <textarea class="form-control" name="obgen" rows="5" id="comment" '.$atributo1.'>'.$fila["objetivo"].'</textarea>
        </article>';
  		}
  	}
     ?>
    <article class="col-xs-3">
      <label for="">Modulo:</label>
      <select class="form-control" name="" required="">
        <option value=""></option>
        <option value="Afecto">Afecto</option>
        <option value="Cognitivo">Cognitivo</option>
        <option value="Biologico">Biologico</option>
        <option value="Sociofamiliar">Sociofamiliar</option>
      </select>
    </article>
    <article class="col-xs-10">
      <label for="" >Objetivo Especifico: </label>
      <textarea class="form-control" name="obespec" rows="5" id="comment" ></textarea>
    </article>

    <article class="col-xs-5">
      <label for="">Actividades 1: </label>
      <textarea class="form-control" name="actividad1" rows="5" id="comment"></textarea>
    </article>
    <article class="col-xs-5">
      <label for="">Actividades 2: </label>
      <textarea class="form-control" name="actividad2" rows="5" id="comment"></textarea>
    </article>
  </section>
  <div class="row text-center">
	  <input type="submit" class="btn btn-primary" name="aceptar" Value="<?php echo $boton; ?>" />
		<input type="hidden" class="btn btn-primary" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
		<input type="hidden" class="btn btn-primary" name="operacion" Value="<?php echo $_GET["mante"];?>"/>
	</div>
</section>
</form>
