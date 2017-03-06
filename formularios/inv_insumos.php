<form action="<?php echo PROGRAMA.'?&opcion=89';?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">

	<article>
		<h4 id="th-estilot">Registro de inventario Insumos y/o dispositivos medicos</h4>
		<section class="panel-body text-center">
			<section class="panel-body text-center"><!--section de eps-->
	      <article class="col-xs-3 text-center">
	        <label for="">Nombre Bodega:</label>
	        <input type="text" name="nombog" class="form-control text-center" value="<?php echo $fila["nom_bodega"];?>" <?php echo $atributo1;?>/>
					<input type="hidden" name="idb" value="<?php echo $fila["id_pro_insumos"];?>">
	      </article>
	      <article class="col-xs-2">
	        <label for="">Tipo bodega:</label>
	        <input type="text" name="identificacion" class="form-control text-center" value="<?php echo $fila["tipo_bodega"];?>"<?php echo $atributo1;?>/>
	      </article>
	      <article class="col-xs-3">
	        <label for="">Sede de la bodega:</label>
	        <input type="text" name="edad" class="form-control text-center" value="<?php echo $fila["nom_sedes"];?>"<?php echo $atributo1;?>/>
					<input type="hidden" name="ids" value="<?php echo $fila["id_sedes_ips"];?>">
	      </article>
				<article class="col-xs-3">
	        <label for="">Nombre del generico:</label>
	        <input type="text" name="nomgenerico" class="form-control text-center" value="<?php echo $fila["nom_insumo"];?>"<?php echo $atributo1;?>/>
	      </article>
				<article class="col-xs-6 col-md-6">
					<label for="">Seleccione proveedor:</label>
					<select name="id_proveedor" class="form-control" <?php echo atributo3; ?>>
						<option value=""></option>
						<?php
						$s=$_POST['ids'];
						$sql="SELECT id_proveedor,razon_social,di_proveedor from proveedores where estado_proveedor='Activo' and id_sedes_ips='".$_GET['ids']."' ORDER BY razon_social ASC";
						if($tabla=$bd1->sub_tuplas($sql)){
							foreach ($tabla as $fila2) {
								if ($fila["id_proveedor"]==$fila2["id_proveedor"]){
									$sw=' selected="selected"';
								}else{
									$sw="";
								}
							echo '<option value="'.$fila2["id_proveedor"].'"'.$sw.'>'.$fila2["razon_social"].' | '.$fila2["di_proveedor"].'</option>';
							}
						}
						?>
					</select>
				</article>
				<article class="col-xs-2 col-md-2">
					<label for="">Numero de factura:</label>
					<input type="text" name="factura" class="form-control" value="" required="">
				</article>
				<article class="col-xs-2">
					<label for="">Precio compra:</label>
					<input type="text" class="form-control" name="precio_compra" value="0" required="">
				</article>
				<article class="col-xs-2">
					<label for="">Cantidad total:</label>
					<input type="number" class="form-control" name="cantidad_t" value="0" required="">
				</article>
	    </section>
		</section>
	<section class="panel-body"> <!--evolucion to-->
			<article class="col-xs-3">
				<label for="">Nombre Insumo:</label>
				<input type="text" name="nom_insumo" value="" class="form-control" <?php echo $atributo2;?> required="">
			</article>
			<article class="col-xs-6 col-md-3">
				<label for="">Seleccione Fabricante:</label>
				<select name="fabricante" class="form-control" <?php echo atributo3; ?>>
					<option value=""></option>
					<?php
					$s=$_POST['ids'];
					$sql="SELECT id_fab,nom_fab from fabricante ORDER BY nom_fab ASC";
					if($tabla=$bd1->sub_tuplas($sql)){
						foreach ($tabla as $fila2) {
							if ($fila["id_fab"]==$fila2["id_fab"]){
								$sw=' selected="selected"';
							}else{
								$sw="";
							}
						echo '<option value="'.$fila2["id_fab"].'"'.$sw.'>'.$fila2["nom_fab"].'</option>';
						}
					}
					?>
				</select>
			</article>
			<article class="col-xs-6 col-md-3">
				<label for="">Codigo de barras:</label>
				<input type="text" name="cod_barras" value="" class="form-control" required="">
			</article>
			<article class="col-xs-3">
				<label for="">Clasificacion de riesgo:</label>
				<select class="form-control" name="clasi_riesgo" required="">
					<option value=""></option>
					<option value="I">Riesgo Bajo</option>
					<option value="IIa">Riesgo Moderado</option>
					<option value="IIb">Riesgo Alto </option>
					<option value="III">Riesgo Muy Alto</option>
					<option value="Ninguno">Ninguno</option>
				</select>
			</article>
		</section>
		<section class="panel-body">
			<article class="col-xs-2">
				<label for="">Fecha de fabricacion:</label>
				<input type="date" class="form-control" name="ffabricacion" value="">
			</article>
			<article class="col-xs-2">
				<label for="">Fecha de vencimiento:</label>
				<input type="date" class="form-control" name="fvencimiento" value="">
			</article>
			<article class="col-xs-3">
				<label for="">Lote:</label>
				<input type="text" class="form-control" name="lote" value="">
			</article>
			<article class="col-xs-3">
				<label for="">Registro INVIMA:</label>
				<input type="text" class="form-control" name="reg_invima" value="" required="">
			</article>
			<article class="col-xs-6 col-md-2">
				<label for="">Tipo de insumo:</label>
				<select class="form-control" name="clasi_tipo" required="">
					<option value=""></option>
					<option value="Insumo">Insumo</option>
					<option value="Dispositivo medico">Dispositivo medico</option>
				</select>
			</article>
		</section>
	<div class="row text-center">
	  <input type="submit" class="btn btn-primary" name="aceptar" Value="<?php echo $boton; ?>" />
		<input type="hidden" class="btn btn-primary" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
		<input type="hidden" class="btn btn-primary" name="operacion" Value="<?php echo $_GET["mante"];?>"/>
	</div>
  </section>
</form>
inv
