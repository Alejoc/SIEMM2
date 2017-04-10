<script src="js2/jquery.js" charset="utf-8"></script>
<script src="js2/jqueryui.js" charset="utf-8"></script>
<script>
	$( function() {
		$( "#tabs" ).tabs();
	} );
</script>
<form action="<?php echo PROGRAMA.'?opcion=62';?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">

	<section class="panel-header">
	  <?php
	    include("consulta_paciente.php");
	  ?>
	</section>

		<div id="tabs" class="panel panel-default">
			<ul>
		    <li><a href="#tabs-1">Anamnesis</a></li>
		    <li><a href="#tabs-2">Antecedentes Personales</a></li>
		    <li><a href="#tabs-3">Valoracion Fisioterapeutica</a></li>
				<li><a href="#tabs-4">Diagnostico Fisioterapeutico</a></li>
				<li><a href="#tabs-5">Pronostico y objetivo</a></li>
				<li><a href="#tabs-6">Plan de intervencion</a></li>
		  </ul>
			<div id="tabs-1" class="panel-body">
				<article class="col-xs-3">
					<label for="">Fecha de registro:</label>
					<input type="text" name="freg" value="<?php echo $date ;?>" class="form-control" <?php echo $atributo1;?>>
					<input type="hidden" name="fecha" value="<?php echo $date1;?>">
				</article>
				<article class="col-xs-3">
					<label for="">Hora de registro</label>
					<input type="time" name="hreg" value="<?php echo $date1 ;?>" class="form-control">
				</article>
				<article class="col-xs-10">
					<label for="">Motivo Consulta:</label>
					<textarea class="form-control" name="motivo_consulta" rows="5" id="comment" required ></textarea>
				</article>
			</div>
			<div id="tabs-2" class="panel-body">
				<article class="col-xs-10">
					<label for="">PATOLOGICOS:</label>
					<textarea class="form-control" name="ant_patologico" rows="5" id="comment" required ></textarea>
				</article>
				<article class="col-xs-10">
					<label for="">TRAUMATICOS:</label>
					<textarea class="form-control" name="ant_traumaticos" rows="5" id="comment" required ></textarea>
				</article>
				<article class="col-xs-10">
					<label for="">TOXICOALERGICOS:</label>
					<textarea class="form-control" name="ant_toxicologico" rows="5" id="comment" required ></textarea>
				</article>
				<article class="col-xs-10">
					<label for="">QUIRURGICOS:</label>
					<textarea class="form-control" name="ant_quirurgico" rows="5" id="comment" required ></textarea>
				</article>
				<article class="col-xs-10">
					<label for="">FARMACOLOGICOS:</label>
					<textarea class="form-control" name="ant_farmacologico" rows="5" id="comment" required ></textarea>
				</article>
				<article class="col-xs-10">
					<label for="">OCUPACIONALES:</label>
					<textarea class="form-control" name="ant_ocupacional" rows="5" id="comment" required ></textarea>
				</article>
				<article class="col-xs-10">
					<label for="">FAMILIARES:</label>
					<textarea class="form-control" name="ant_familiar" rows="5" id="comment" required ></textarea>
				</article>
				<article class="col-xs-10">
					<label for="">APOYOS DIAGNOSTICOS:</label>
					<textarea class="form-control" name="apoyo_dx" rows="5" id="comment" required ></textarea>
				</article>
			</div>
			<div id="tabs-3" class="panel-body">
				<article class="col-xs-10">
					<label for="">Dolor:</label>
					<textarea class="form-control" name="dolor" rows="5" id="comment" required ></textarea>
				</article>
				<article class="col-xs-10">
					<label for="">Piel y Faneras:</label>
					<textarea class="form-control" name="pf" rows="5" id="comment" required ></textarea>
				</article>
				<article class="col-xs-10">
					<label for="">Sensibilidad:</label>
					<textarea class="form-control" name="sencibilidad" rows="5" id="comment" required ></textarea>
				</article>
				<article class="col-xs-10">
					<label for="">Función Osteomuscular:</label>
					<textarea class="form-control" name="fosteomuscular" rows="5" id="comment" required ></textarea>
				</article>
				<article class="col-xs-10">
					<label for="">Postura:</label>
					<textarea class="form-control" name="postura" rows="5" id="comment" required ></textarea>
				</article>
				<article class="col-xs-10">
					<label for="">Marcha:</label>
					<textarea class="form-control" name="marcha" rows="5" id="comment" required ></textarea>
				</article>
			</div>
			<div id="tabs-4" class="panel-body">
				<label for="">DIAGNOSTICO FISIOTERAPEUTICO:</label>
				<textarea class="form-control" name="dx_fisioterapeutico" rows="5" id="comment" required ></textarea>
			</div>
			<div id="tabs-5" class="panel-body">
				<article class="col-xs-10">
					<label for="">PRONOSTICO FISIOTERAPEUTICO:</label>
					<textarea class="form-control" name="pron_fisioterapeutico" rows="5" id="comment" required ></textarea>
				</article>
				<article class="col-xs-10">
					<label for="">OBJETIVO TERAPEUTICO:</label>
					<textarea class="form-control" name="obj_terapeutico" rows="5" id="comment" required ></textarea>
				</article>
			</div>
			<div id="tabs-6"  class="panel-body">
				<article class="col-xs-10">
					<label for="">PLAN DE INTERVENCION:</label>
					<textarea class="form-control" name="plan_intervencion" rows="5" id="comment" required ></textarea>
				</article>
				<div class="col-md-12 text-center">
				  <input type="submit" class="btn btn-primary" name="aceptar" Value="<?php echo $boton; ?>" />
					<input type="hidden" class="btn btn-primary" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
					<input type="hidden" class="btn btn-primary" name="operacion" Value="<?php echo $_GET["mante"];?>"/>
				</div>
			</div>
		</div>
</form>
