<form action="<?php echo PROGRAMA.'?&opcion=29';?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
	<section class="panel-body">
	  <?php
	    include("consulta_paciente.php");
	  ?>
	</section>
		<article>
			<h4 id="th-estilot">Datos de Evolucion Trabajo social</h4>
		<?php include("consulta_rapida.php");?>
		<section class="panel-body"> <!--Anamnesis-->
				<article class="col-xs-3">
					<label for="">Fecha de registro:</label>
					<input type="text" name="freg_ts" value="<?php echo $date ;?>" class="form-control" <?php echo $atributo1?> >
				</article>
				<article class="col-xs-3">
					<label for="">Hora de registro</label>
					<input type="text" name="hreg_ts" value="<?php echo $date1 ;?>" class="form-control" <?php echo $atributo1?>>
				</article>
				<article class="col-xs-10">
					<label for="">Evolucion Trabajo Social:</label>
					<textarea class="form-control" name="evolucion_ts" rows="5" id="comment" ></textarea>
				</article>
		</section>

	<div class="row text-center">
	  	<input type="submit" class="btn btn-primary" name="aceptar" Value="<?php echo $boton; ?>" />
		<input type="hidden" class="btn btn-primary" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
		<input type="hidden" class="btn btn-primary" name="operacion" Value="<?php echo $_GET["mante"];?>"/>
	</div>
  </section>
</form>
