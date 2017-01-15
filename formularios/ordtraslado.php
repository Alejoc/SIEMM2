<form action="<?php echo PROGRAMA.'?&opcion=29';?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
	<section class="panel-body">
	  <?php
	    include("consulta_paciente.php");
	  ?>
	</section>
		<?php include("consulta_rapida.php");?>
		<section class="panel-body"> <!--Anamnesis-->
				<article class="col-xs-3">
					<input type="hidden" name="freg" value="<?php echo $date ;?>" class="form-control" <?php echo $atributo1?> >
					<input type="hidden" name="hreg" value="<?php echo $date1 ;?>" class="form-control" <?php echo $atributo1?>>
				</article>
		</section>
		<section class="panel-body"> <!--Anamnesis-->
				<article class="col-xs-3">
					<label for="">Fecha de Programacion:</label>
					<input type="date" name="fprog" value="<?php echo $date ;?>" class="form-control" <?php echo $atributo2?> >
				</article>
				<article class="col-xs-2">
					<label for="">Hora de Programacion:</label>
					<input type="time" name="hprog" value="<?php echo $date1 ;?>" class="form-control" <?php echo $atributo2?>>
				</article>
		</section>
		<section class="panel-body">
			<article class="col-xs-3">
				<label for="">Seleccione Sede de Origen:</label>
				<select name="sedes" class="form-control" <?php echo atributo3; ?>>
					<?php
					$sql="SELECT id_sedes_ips,nom_sedes from sedes_ips where estado_sedes= 'Activo' ORDER BY id_sedes_ips ASC";
					if($tabla=$bd1->sub_tuplas($sql)){
						foreach ($tabla as $fila2) {
							if ($fila["id_sedes_ips"]==$fila2["id_sedes_ips"]){
								$sw=' selected="selected"';
							}else{
								$sw="";
							}
						echo '<option value="'.$fila2["id_sedes_ips"].'"'.$sw.'>'.$fila2["nom_sedes"].'</option>';
						}
					}
					?>
			</select>
			</article>
		</section>
		<section class="panel-body">
			<article class="col-xs-10">
				<label for="">Observacion de transporte:</label>
				<textarea class="form-control" name="mediots" rows="5" id="comment" ></textarea>
			</article>
			<article class="col-xs-10">
				<label for="">Observaciones del traslado:</label>
				<textarea class="form-control" name="obs_envio" rows="5" id="comment" ></textarea>
			</article>

		</section>

	<div class="row text-center">
	  	<input type="submit" class="btn btn-primary" name="aceptar" Value="<?php echo $boton; ?>" />
		<input type="hidden" class="btn btn-primary" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
		<input type="hidden" class="btn btn-primary" name="operacion" Value="<?php echo $_GET["mante"];?>"/>
	</div>
  </section>
</form>
