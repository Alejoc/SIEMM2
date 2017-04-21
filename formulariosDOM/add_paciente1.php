<form action="<?php echo PROGRAMA.'?&opcion='.$return;?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
  <section class="panel panel-default">
  <section class="panel-heading">
    <h1>Presentacion del paciente en servicio domiciliario</h1>
  </section>
	<section class="panel-body">
	  <article class="col-xs-1">
	  	<label for="">ID:</label>
	  	<input type="text"  name="idpaci" class="form-control" value="<?php echo $fila["id_paciente"];?>"<?php echo $atributo2;?>/>
	  </article>
	  <article class="col-xs-3">
	  	<label for="">Tipo documento:</label>
	  	<select name="tdocpac" class="form-control" <?php echo atributo3; ?>>
				<?php
				$sql="SELECT tipo,descri_tipo from tdocumentos ORDER BY tipo DESC";
				if($tabla=$bd1->sub_tuplas($sql)){
					foreach ($tabla as $fila2) {
						if ($fila["tipo"]==$fila2["tipo"]){
							$sw=' selected="selected"';
						}else{
							$sw="";
						}
					echo '<option value="'.$fila2["tipo"].'"'.$sw.'>'.$fila2["descri_tipo"].'</option>';
					}
				}
				?>
		</select>
	  </article>
		<article class="col-xs-4">
	  	<label for="">Identificación Paciente:<span class="fa fa-info-circle" data-toggle="popover" title="Digite el número de identificación sin puntos" data-content=""></span></label>
	  	<input type="text" name="docpac" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" value="<?php echo $fila["doc_pac"];?>"<?php echo $atributo2;?>/>
	  </article>
	</section>
	<section class="panel-body">
		<article class="col-xs-3">
	  	<label for="">Primer Nombre:</label>
	  	<input type="text" value="<?php echo $fila["nom1"];?>" name="nom1" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="<?php echo $fila["num_interno"];?>"<?php echo $atributo2;?>/>
	  </article>
	  <article class="col-xs-3">
	  	<label for="">Segundo Nombre:</label>
	  	<input type="text" value="<?php echo $fila["nom2"];?>" name="nom2"  class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $fila["modelo"];?>"<?php echo $atributo2;?>/>
	  </article>
	  <article class="col-xs-3">
	  	<label for="">Primer Apellido:</label>
	  	<input type="text" value="<?php echo $fila["ape1"];?>" name="ape1"  class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $fila["capacidad_pasajeros"];?>"<?php echo $atributo2;?>/>
	  </article>
	  <article class="col-xs-3">
	  	<label for="">Segundo Apellido:</label>
	  	<input type="text" value="<?php echo $fila["ape2"];?>" name="ape2" class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  value="<?php echo $fila["num_interno"];?>"<?php echo $atributo2;?>/>
	  </article>
	</section>

	<div class="row text-center">
	  	<input type="submit" class="btn btn-primary" name="aceptar" Value="<?php echo $boton; ?>" />
		<input type="hidden" class="btn btn-primary" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
		<input type="hidden" class="btn btn-primary" name="operacion" Value="<?php echo $_GET["mante"];?>"/>
	</div>
  </section>
</form>
