<h2>Administracion de Genericos (Dispositivos medicos e insumos)</h2>
<?php
$subtitulo="";
	if(isset($_POST["operacion"])){	//nivel3
		if($_POST["aceptar"]!="Descartar"){
			//print_r($_FILES);
			$fotoE="";$fotoA1="";$fotoA2="";
			if (isset($_FILES["logo"])){
				if (is_uploaded_file($_FILES["logo"]["tmp_name"])){

					$cfoto=explode(".",$_FILES["logo"]["name"]);
					$archivo=$_POST["doc_ips"].".".$cfoto[count($cfoto)-1];

					if(move_uploaded_file($_FILES["logo"]["tmp_name"],LOG.LOGOS.$archivo)){
						$fotoE=",logo='".LOGOS.$archivo."'";
						$fotoA1=",logoips";
						$fotoA2=",'".LOGOS.$archivo."'";
						}
				}
			}
			switch ($_POST["operacion"]) {
			case 'E':
				$sql="UPDATE pro_insumos SET nom_insumo='".$_POST["nom_insumo"]."',cantidad_t='".$_POST["cantidad_t"]."' WHERE id_nom_insumos=".$_POST["id_nom_insumos"];
				$subtitulo1="El Generico";
				$subtitulo="Actualizado";
			break;

			case 'A':
				$f=date('Y-m-d H:m');
				$sql="INSERT INTO pro_insumos (id_user, id_bodega, fcreacion, nom_insumo, cantidad_t, estado_pro_insumo) VALUES
				('".$_SESSION["AUT"]["id_user"]."','".$_POST["id_bodega"]."','$f','".$_POST["nom_insumo"]."','".$_POST["cantidad_t"]."','Activo')";
				$subtitulo1="El Generico";
				$subtitulo="Adicionada";
			break;
			case 'INVINS':

			$fv=$_POST['fvencimiento'];
			$fecha=$fv;
			$segundos= strtotime($fecha) - strtotime('now');
			$diferencia_dias=intval($segundos/60/60/24);

			if ($diferencia_dias>'365') {
				$semaforo='verde';
				$f=date('Y-m-d H:m');
				$sql="INSERT INTO subpro_insumos( id_pro_insumo, id_user, id_proveedor, fcreacion, nom_insumo, fabricante, cod_barras, ffabricacion, fvencimiento, lote, reg_invima, clasi_riesgo, clasi_tipo, cantidad_t, precio_compra, factura, estado_pro_insumo) values
				('".$_POST["idb"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["id_proveedor"]."','$f','".$_POST["nom_insumo"]."','".$_POST["fabricante"]."','".$_POST["cod_barras"]."','".$_POST["ffabricacion"]."','".$_POST["fvencimiento"]."','".$_POST["lote"]."','".$_POST["reg_invima"]."','".$_POST["clasi_riesgo"]."','".$_POST["clasi_tipo"]."','".$_POST["cantidad_t"]."','".$_POST["precio_compra"]."','".$_POST["factura"]."','Activo')";
				$subtitulo1="El dispositivo medico";
				$subtitulo="Adicionado";
				$t=$_POST['nombog'];
			}
			if ($diferencia_dias >= '183' && $diferencia_dias <= '365') {
				$semaforo='Amarillo';
				$f=date('Y-m-d H:m');
				$sql="INSERT INTO subpro_insumos( id_pro_insumo, id_user, id_proveedor, fcreacion, nom_insumo, fabricante, cod_barras, ffabricacion, fvencimiento, lote, reg_invima, clasi_riesgo, clasi_tipo, cantidad_t, precio_compra, factura, estado_pro_insumo) values
				('".$_POST["idb"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["id_proveedor"]."','$f','".$_POST["nom_insumo"]."','".$_POST["fabricante"]."','".$_POST["cod_barras"]."','".$_POST["ffabricacion"]."','".$_POST["fvencimiento"]."','".$_POST["lote"]."','".$_POST["reg_invima"]."','".$_POST["clasi_riesgo"]."','".$_POST["clasi_tipo"]."','".$_POST["cantidad_t"]."','".$_POST["precio_compra"]."','".$_POST["factura"]."','Activo')";
				$subtitulo1="El dispositivo medico";
				$subtitulo="Adicionado";
				$t=$_POST['nombog'];
			}
			if ($diferencia_dias < '183') {
				$semaforo='Rojo';
				$f=date('Y-m-d H:m');
				$sql="INSERT INTO subpro_insumos( id_pro_insumo, id_user, id_proveedor, fcreacion, nom_insumo, fabricante, cod_barras, ffabricacion, fvencimiento, lote, reg_invima, clasi_riesgo, clasi_tipo, cantidad_t, precio_compra, factura, estado_pro_insumo) values
				('".$_POST["idb"]."','".$_SESSION["AUT"]["id_user"]."','".$_POST["id_proveedor"]."','$f','".$_POST["nom_insumo"]."','".$_POST["fabricante"]."','".$_POST["cod_barras"]."','".$_POST["ffabricacion"]."','".$_POST["fvencimiento"]."','".$_POST["lote"]."','".$_POST["reg_invima"]."','".$_POST["clasi_riesgo"]."','".$_POST["clasi_tipo"]."','".$_POST["cantidad_t"]."','".$_POST["precio_compra"]."','".$_POST["factura"]."','Activo')";
				$subtitulo1="El dispositivo medico";
				$subtitulo="Adicionado";
				$t=$_POST['nombog'];
			}
			break;

		}
echo $sql;
		if ($bd1->consulta($sql)){
			$subtitulo="$subtitulo1 fue  $subtitulo con exito al inventario de $t.";
			$check='si';
			if($_POST["operacion"]=="X"){
			if(is_file($fila["logo"])){
				unlink($fila["logo"]);
			}
			}
		}else{
			$subtitulo="$subtitulo1 NO fue  $subtitulo con exito al inventario de $t.";
			$check='no';
		}
	}
}

if (isset($_GET["mante"])){					///nivel 2
	switch ($_GET["mante"]) {
		case 'E':
			$sql="SELECT b.id_bodega,nom_bodega,
      s.nom_sedes,
      p.id_pro_insumos,nom_insumo,cantidad_t
      from bodega b inner join sedes_ips s on b.id_sedes_ips=s.id_sedes_ips
      inner join pro_insumos p on p.id_bodega=b.id_bodega
      where  p.id_pro_insumos='".$_GET['idproins']."' and b.id_bodega='".$_GET['idbog']."'";
			$color="green";
			$boton="Actualizar Generico";
			$atributo1=' readonly="readonly"';
			$atributo2='readonly="readonly"';
			$atributo3='';
			$date=date('Y-m-d');
			$date1=date('H:i');
			$form1='formularios/agr_generico_ins.php';
			$subtitulo='Edicion del Generico';
			break;

			case 'A':
			$sql="SELECT b.id_bodega, fcreacion, nom_bodega,tipo_bodega,s.nom_sedes  FROM bodega b left join sedes_ips s on b.id_sedes_ips=s.id_sedes_ips where id_bodega=".$_GET["idbog"];
			$color="yellow";
			$boton="Crear Generico";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$date=date();
			$date=date('Y-m-d');
			$date1=date('H:i');
			$form1='formularios/agr_generico_ins.php';
			$subtitulo='Creacion de Generico';
			break;

				case 'INVINS':
					$sql="SELECT b.id_bodega,nom_bodega,tipo_bodega,
		      s.nom_sedes,
		      p.id_pro_insumos,nom_insumo,cantidad_t
		      from bodega b inner join sedes_ips s on b.id_sedes_ips=s.id_sedes_ips
		      inner join pro_insumos p on p.id_bodega=b.id_bodega
		      where  p.id_pro_insumos='".$_GET['idproins']."' and b.id_bodega='".$_GET['idbog']."'";
					$color="green";
					$boton="Agregar item a inventario";
					$atributo1=' readonly="readonly"';
					$atributo2='';
					$atributo3='';
					$date=date('Y-m-d');
					$date1=date('H:i');
					$form1='formularios/inv_insumos.php';
					$subtitulo='Creacion de inventario en producto generico';
				break;
		}

		if($sql!=""){
			if (!$fila=$bd1->sub_fila($sql)){

				$fila=array("id_bodega"=>"", "fcreacion"=>"", "nom_bodega"=>"","tipo_bodega"=>"","nom_sedes"=>"","id_pro_insumos"=>"","nom_insumos"=>"","cantidad_t"=>"");

			}
		}else{
				$fila=array("id_bodega"=>"", "fcreacion"=>"", "nom_bodega"=>"","tipo_bodega"=>"","nom_sedes"=>"","id_pro_insumos"=>"","nom_insumos"=>"","cantidad_t"=>"");
			}

		?>
<script src = "js/sha3.js"></script>
		<script>
			function validar(){
				if (document.forms[0].nom_insumo.value == ""){
					alert("Se requiere el nombre del generico");
					document.forms[0].nom_insumo.focus();				// Ubicar el cursor
					return(false);
				}
				if (document.forms[0].cantidad_t.value == ""){
					alert("Se requiere cantidad inicial");
					document.forms[0].cantidad_t.focus();				// Ubicar el cursor
					return(false);
				}
			}
		</script>
		<div class="alert alert-info animated bounceInRight">
			<?php echo $subtitulo;?>
		</div>
		<?php include($form1);?>
<?php
}else{
	if ($check=='si') {
		echo '<div class="alert alert-success animated bounceInRight">';
		echo $subtitulo;
		echo '</div>';
	}else {
		echo '<div class="alert alert-danger animated bounceInRight">';
		echo $subtitulo;
		echo '</div>';
	}// nivel 1?>
	<div class="panel-default">
	<div class="panel-body">
		<section class="panel-body">
			<?php
				include("consulta_rapida1.php");
			?>
		</section>
		<section class="panel panel-body">
			<form >
				<?php $bog=$_GET['idbog'] ;?>
				<article class="col-md-5 col-xs-5	">
					<label>Filtro:</label><br>
					<input type="text" class="form-control" name="nom" placeholder="Digite nombre del insumo o dispositivo medico">
		    </article>
				<article class="col-md-5 col-xs-5	">
				<label>Selecccionar Bodega:</label><br>
				<select name="idbog" class="form-control" <?php echo atributo3; ?>>
					<?php
					$sql="SELECT id_bodega,nom_bodega from bodega where estado_bodega='Activo' ORDER BY nom_bodega ASC";
					if($tabla=$bd1->sub_tuplas($sql)){
						foreach ($tabla as $fila2) {
							if ($fila["id_bodega"]==$fila2["id_bodega"]){
								$sw=' selected="selected"';
							}else{
								$sw="";
							}
						echo '<option value="'.$fila2["id_bodega"].'"'.$sw.'>'.$fila2["nom_bodega"].'</option>';
						}
					}
					?>
				</select>
		    </article>

				<div>
					<input type="submit" name="buscar" class="btn btn-primary" value="Consultar">
					<input type="hidden" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
				</div>
			</form>
		</section>
		<table class="table table-responsive">
			<tr>
				<th id="th-estilo4">Editar Generico</th>
				<th id="th-estilo1">ID</th>
				<th id="th-estilo1">NOMBRE GENERICO DM</th>
				<th id="th-estilo2">CANTIDAD</th>
				<th id="th-estilo3">BODEGA A QUE PERTENECE</th>
				<th id="th-estilo3">SEDE DE LA BODEGA</th>
				<th id="th-estilo4">Agregar inventario</th>

			</tr>

			<?php

		if (isset($_REQUEST["nom"])){
			$doc=$_REQUEST["nom"];
			$sql="SELECT b.id_bodega,nom_bodega,
      s.id_sedes_ips,nom_sedes,
      p.id_pro_insumos,nom_insumo,cantidad_t
      from bodega b inner join sedes_ips s on b.id_sedes_ips=s.id_sedes_ips
      inner join pro_insumos p on p.id_bodega=b.id_bodega
      where  p.nom_insumo LIKE '%".$doc."%' and b.id_bodega='".$_GET['idbog']."'";

			if ($tabla=$bd1->sub_tuplas($sql)){

				foreach ($tabla as $fila ) {
//echo $sql;
					echo"<tr >	\n";
					echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=E&idbog='.$fila["id_bodega"].'&idproins='.$fila["id_pro_insumos"].'"><button type="button" class="btn btn-primary sombra_movil " ><span class="fa fa-pencil"></span></button></a></th>';
					echo'<td class="text-center">'.$fila["id_pro_insumos"].'</td>';
					echo'<td class="text-center">'.$fila["nom_insumo"].'</td>';
					echo'<td class="text-center">'.$fila["cantidad_t"].'</td>';
					echo'<td class="text-center">'.$fila["nom_bodega"].'</td>';
					echo'<td class="text-center">'.$fila["nom_sedes"].'</td>';
					echo'<th class="text-center" ><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=INVINS&idbog='.$fila["id_bodega"].'&idproins='.$fila["id_pro_insumos"].'&ids='.$fila["id_sedes_ips"].'"><button type="button" class="btn btn-warning sombra_movil " ><span class="fa fa-plus"></span></button></a></th>';

					echo "</tr>\n";
				}
			}
		}
			?>
			<tr>
				<th colspan="11" class="text-center"><a href="<?php echo PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=A&idbog='.$_REQUEST["idbog"].''?>" align="center" ><button type="button" class="btn btn-primary" >Generar Generico</button></a></th>
			</tr>
		</table>

		</div>
		</div>

			<?php
		}
		?>
