<form action="<?php echo PROGRAMA.'?&opcion=91';?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">

	<article>
		<h4 id="th-estilot">Registro de inventario Medicamentos</h4>
		<section class="panel-body text-center">
			<section class="panel-body text-center"><!--section de eps-->

				<article class="col-xs-3">
	        <label for="">Nombre del generico:</label>
	        <input type="text" name="nomgenerico" class="form-control text-center" value="<?php echo $fila["nom_pro_med"];?>"<?php echo $atributo1;?>/>
	      </article>
				<article class="col-xs-3 col-md-3">
					<label for="">Seleccione Bodega:</label>
					<select name="id_bodega" class="form-control" <?php echo atributo3; ?>>
						<option value=""></option>
						<?php
						$sql="SELECT id_bodega,id_sedes_ips,nom_bodega,tipo_bodega from bodega where estado_bodega='Activo'  ORDER BY tipo_farmacia ASC";
						if($tabla=$bd1->sub_tuplas($sql)){
							foreach ($tabla as $fila2) {
								if ($fila["id_bodega"]==$fila2["id_bodega"]){
									$sw=' selected="selected"';
								}else{
									$sw="";
								}
							echo '<option value="'.$fila2["id_bodega"].'"'.$sw.'>'.$fila2["nom_bodega"].' | '.$fila2["tipo_bodega"].'</option>';
							}
						}
						?>
					</select>
				</article>
				<article class="col-xs-6 col-md-4">
					<label for="">Seleccione proveedor:</label>
					<select name="id_proveedor" class="form-control" <?php echo atributo3; ?>>
						<option value=""></option>
						<?php
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
					<input type="text" name="num_factura" class="form-control" value="" required="">
				</article>
				<article class="col-xs-2">
					<label for="">Precio compra:</label>
					<input type="text" class="form-control" name="precio_compra" value="0" required="">
				</article>
				<article class="col-xs-2">
					<label for="">Cantidad total:</label>
					<input type="number" class="form-control" name="cantidad_total" value="0" required="">
				</article>
	    </section>
		</section>
	<section class="panel-body"> <!--evolucion to-->
			<article class="col-xs-3">
				<label for="">Codigo ATC:</label>
				<input type="text" name="cod_atc" value="" class="form-control" <?php echo $atributo3;?> required="">
			</article>
			<article class="col-xs-5">
				<label for="">Principio Activo:</label>
				<input type="text" name="prin_activo" class="form-control" value="">
			</article>
			<article class="col-md-2 col-xs-3">
				<label for="">Concentracion:</label>
				<input type="text" name="concentracion" value="" class="form-control" required="">
			</article>
			<article class="col-md-2 col-xs-3">
				<label for="">Presentacion:</label>
				<select class="form-control" name="presentacion" required="">
					<option value=""></option>
					<option value="Tableta">Tableta</option>
					<option value="Capsula">Capsula</option>
					<option value="Ampolla">Ampolla</option>
					<option value="Jarabe">Jarabe</option>
					<option value="grajeas">grajeas</option>
					<option value="Comprimidos">Comprimidos</option>
					<option value="Supositorio">Supositorio</option>
					<option value="Parche">Parche</option>
					<option value="Colirio">Colirio</option>
					<option value="Inhalador">Inhalador</option>
					<option value="Solucion oral">Solucion oral</option>
				</select>
			</article>
			<article class="col-md-2 col-xs-3">
				<label for="">Forma farmaceutica:</label>
				<select class="form-control" name="presentacion" required="">
					<option value=""></option>
					<option value="Liquida">Liquida</option>
					<option value="Solida">Solida</option>
					<option value="Semisolida">Semisolida</option>
					<option value="gaseosa">gaseosa</option>
				</select>
			</article>
			<article class="col-md-2 col-xs-1">
				<label for="">POS/NO POS:</label>
				<select class="form-control" name="clas_pos" required="">
					<option value=""></option>
					<option value="POS">POS</option>
					<option value="NO POS">NO POS</option>
				</select>
			</article>
			<article class="col-md-2 col-xs-1">
				<label for="">Controlado:</label>
				<select class="form-control" name="clas_controlado" required="">
					<option value=""></option>
					<option value="SI">SI</option>
					<option value="NO">NO</option>
				</select>
			</article>
			<article class="col-md-2 col-xs-1">
				<label for="">Psiquiatrico:</label>
				<select class="form-control" name="clas_psiquiatrico" required="">
					<option value=""></option>
					<option value="SI">SI</option>
					<option value="NO">NO</option>
				</select>
			</article>
		</section>
		<section class="panel-body">
			<article class="col-md-2 col-xs-2">
				<label for="">Fecha de fabricacion:</label>
				<input type="date" class="form-control" name="ffabricacion" value="" required="">
			</article>
			<article class="col-xs-2">
				<label for="">Fecha de vencimiento:</label>
				<input type="date" class="form-control" name="fvencimiento" value="" required="">
			</article>
			<article class="col-md-2 col-xs-3">
				<label for="">Lote:</label>
				<input type="text" class="form-control" name="lote" value="" required="">
			</article>
			<article class="col-md-2 col-xs-3">
				<label for="">Registro INVIMA:</label>
				<input type="text" class="form-control" name="reg_invima" value="" required="">
			</article>
			<article class="col-xs-4 col-md-4">
				<label for="">Seleccione Fabricante:</label>
				<select name="laboratorio" class="form-control" <?php echo atributo3; ?> required="">
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
			<article class="col-xs-3">
				<label for="">CUM:</label>
				<input type="text" class="form-control" name="cum" value="" required="">
			</article>
			<article class="col-xs-3">
				<label for="">Codigo de barras:</label>
				<input type="text" name="cod_barras" class="form-control" value="" required="">
			</article>

		</section>
	<div class="row text-center">
	  <input type="submit" class="btn btn-primary" name="aceptar" Value="<?php echo $boton; ?>" />
		<input type="hidden" class="btn btn-primary" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
		<input type="hidden" class="btn btn-primary" name="operacion" Value="<?php echo $_GET["mante"];?>"/>
	</div>
  </section>
</form>
