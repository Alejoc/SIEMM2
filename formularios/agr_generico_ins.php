<form action="<?php echo PROGRAMA.'?&opcion=91';?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
	<section class="panel panel-default">
		<section class="panel panel-body"> <!--Iformacion de bodega-->
      <article class="col-md-12 col-xs-12 alert-success">
        <label for="">INFORMACION DE BODEGA Y SEDES</label>
      </article>
			<article class="col-md-2 col-xs-1">
		  	<label  for="">ID:</label>
		  	<input type="text"  name="id_bodega" class="form-control" value="<?php echo $fila["id_bodega"];?>"<?php echo $atributo1;?>/>
		  </article>
			<article class="col-md-5 col-xs-3">
				<label class="text-center">Nombre de la bodega:</label><br>
				<input type="text" class="form-control text-center" name="nom_bodega" value="<?php echo $fila["nom_bodega"];?>"<?php echo $atributo1;?>/>
			</article>
			<article class="col-md-4 col-xs-4">
				<label>Nombre de la Sede:</label><br>
				<input type="text" name="" class="form-control" value="<?php echo $fila['nom_sedes'] ;?>" <?php echo $atributo1;?>>
			</article>
		</section>
    <section class="panel-body">
      <article class="col-md-10 col-xs-10 alert-success">
        <label for="">INFORMACION DEL GENERICO</label>
      </article>
      <article class="col-md-10 col-xs-10">
        <label for="">Nombre del dispositivo medico:</label>
        <input type="text" name="nom_insumo" class="form-control" id="campoUP" value="<?php echo $fila["nom_pro_med"];?>" required="" <?php echo $atributo3;?>>
				<input type="hidden" name="id_pro_insumos" class="form-control" id="campoUP" value="<?php echo $fila["id_pro_med"];?>" required="" <?php echo $atributo3;?>>
      </article>
      <article class="col-md-2 col-xs-2">
        <label for="">Cantidad:</label>
        <input type="number" name="cantidad_t" class="form-control" value="<?php echo $fila["cantidad_total"];?>" required="" <?php echo $atributo2;?>>
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
