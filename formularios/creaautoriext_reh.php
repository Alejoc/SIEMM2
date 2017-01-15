<form action="<?php echo PROGRAMA;?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
	<section class="panel-body">
	  <?php
	    include("consulta_paciente.php");
	  ?>
	</section>
		<article>
			<h4 id="th-estilot">Creación de Autorización</h4>
		</article>
<section class="panel panel-body">
	<article class="col-xs-5">
		<label for="">Fecha inicial de Autorización</label>
		<input type="date" class="form-control" name="finicial" value="">
	</article>
	<article class="col-xs-5">
		<label for="">Fecha final de Autorización</label>
		<input type="date" class="form-control" name="ffinal" value="">
	</article>
		<article class="col-xs-5">
			<label for="">Numero de autorización:</label>
			<input type="text" class="form-control" name="numautori" value="">
		</article>
		<article class="col-xs-5">
			<label for="">Clase Usuario:</label>
			<select name="cusuario" class="form-control" <?php echo atributo3; ?>>
				<?php
				$sql="SELECT id_cusuario,nomclaseusuario from clase_usuario ORDER BY id_cusuario ASC";
				if($tabla=$bd1->sub_tuplas($sql)){
					foreach ($tabla as $fila2) {
						if ($fila["nomclaseusuario"]==$fila2["nomclaseusuario"]){
							$sw=' selected="selected"';
						}else{
							$sw="";
						}
					echo '<option value="'.$fila2["nomclaseusuario"].'"'.$sw.'>'.$fila2["nomclaseusuario"].'</option>';
					}
				}
				?>
		</select>
		</article>
		<article class="col-xs-5">
			<label for="">Zona que proviene:</label>
			<select name="zeps" class="form-control" <?php echo atributo3; ?>>
				<?php
				$sql="SELECT id_zonaeps,nomzonaeps from zona_eps ORDER BY id_zonaeps ASC";
				if($tabla=$bd1->sub_tuplas($sql)){
					foreach ($tabla as $fila2) {
						if ($fila["nomzonaeps"]==$fila2["nomzonaeps"]){
							$sw=' selected="selected"';
						}else{
							$sw="";
						}
					echo '<option value="'.$fila2["nomzonaeps"].'"'.$sw.'>'.$fila2["nomzonaeps"].'</option>';
					}
				}
				?>
		</select>
		</article>
		<article class="col-xs-12">
			<label for="">Diagnostico autorización:</label>
			<?php include("diagnosticos/dx.php");?>
		</article>
</section>
<section class="panel panel-footer">
	<div class="row text-center">
	  	<input type="submit" class="btn btn-primary" name="aceptar" Value="<?php echo $boton; ?>" />

		<input type="hidden" class="btn btn-primary" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
		<input type="hidden" class="btn btn-primary" name="operacion" Value="<?php echo $_GET["mante"];?>"/>
	</div>
  </section>
</form>
