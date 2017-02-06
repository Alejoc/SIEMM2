<form action="<?php echo PROGRAMA.'?&opcion=19';?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
<section class="panel-body">
	<?php
		include("consulta_paciente.php");
	?>
</section>
	<article>
		<h4 id="th-estilot">Datos de Evolución Medica</h4>
		<?php include("consulta_rapida.php");?>
	<section class="panel-body"> <!--Anamnesis-->
		<section class="panel-body">
			<article class="col-xs-3">
				<label for="">Fecha de registro:</label>
				<input type="text" name="freg" value="<?php echo $date ;?>" class="form-control" <?php echo $atributo1;?> >
				<input type="hidden" name="id" value="<?php $fila['id_adm_hosp'] ;?>" class="form-control" <?php echo $atributo1;?> >
			</article>
			<article class="col-xs-3">
				<label for="">Hora de registro</label>
				<input type="time" name="hreg" value="<?php echo $date1 ;?>" class="form-control" <?php echo $atributo1;?>>
			</article>
			<article class="col-xs-10">
				<label for="">Subjetivo: <span class="fa fa-info-circle" data-toggle="popover" title="Versión de la realidad proporcionada por el paciente" data-content=""></span></label>
				<textarea class="form-control" name="subjetivo" rows="5" id="comment"  required=""></textarea>
			</article>
			<article class="col-xs-10">
				<label for="" >Objetivo: <span class="fa fa-info-circle" data-toggle="popover" title="Realidad encontrada por el medico con relación al paciente" data-content=""></span></label>
				<textarea class="form-control" name="objetivo" rows="5" id="comment" required="" ></textarea>
			</article>
			<article class="col-xs-5">
				<label >Analisis: <span class="fa fa-info-circle" data-toggle="popover" title="Consolidado de la realidad del paciente" data-content=""></span></label>
				<textarea class="form-control" name="analisis" rows="6" id="comment"  required=""></textarea>
			</article>
			<article class="col-xs-5">
				<label for="">Plan tratramiento: <span class="fa fa-info-circle" data-toggle="popover" title="Definición de conducta y procedimientos a realizar en relación a la realidad del paciente" data-content=""></span></label>
				<textarea class="form-control" name="plantratamiento" rows="6" id="comment" required=""></textarea>
			</article>
				<article class="col-xs-3">
					<label for="">Remisión de síntomas</label>
					<select class="form-control" name="remision_sintomas" required="">
						<option value=""></option>
						<option value="SI">SI</option>
						<option value="NO">NO</option>
						<option value="PARCIAL">PARCIAL</option>
					</select>
				</article>
				<article class="col-xs-3">
					<label for="">Conciencia de enfermedad</label>
					<select class="form-control" name="conciencia_enfermedad" required="">
						<option value=""></option>
						<option value="SI">SI</option>
						<option value="NO">NO</option>
						<option value="PARCIAL">PARCIAL</option>
					</select>
				</article>
				<article class="col-xs-3">
					<label for="">Adherencia Terapeutica</label>
					<select class="form-control" name="adherencia_terapeutica" required="">
						<option value=""></option>
						<option value="SI">SI</option>
						<option value="NO">NO</option>
						<option value="PARCIAL">PARCIAL</option>
					</select>
				</article>
				<article class="col-xs-12">
					<h4 id="th-estilot">Selección de Diagnostico</h4>
				</article>
				<article class="col-xs-12">
					<label for="" class="alert-success">Diagnostico Principal</label>
					<?php include("diagnosticos/dx.php");?>
				</article>
				<article class="col-xs-12">
					<label for="" class="alert-Info">Diagnostico Principal</label>
					<?php include("diagnosticos/dx1.php");?>
				</article>
				<article class="col-xs-12">
					<label for="" class="alert-Info">Diagnostico Principal</label>
					<?php include("diagnosticos/dx2.php");?>
				</article>
		</section>
</section>
	<div class="row text-center">
	  <input type="submit" class="btn btn-primary" name="aceptar" Value="<?php echo $boton; ?>" />
		<input type="hidden" class="btn btn-primary" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
		<input type="hidden" class="btn btn-primary" name="operacion" Value="<?php echo $_GET["mante"];?>"/>
	</div>
  </section>
</form>
