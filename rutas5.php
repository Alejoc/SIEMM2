<div align="center"><h2> Administración de Rutas</h2></div>
<?php
$subtitulo="";
	if(isset($_POST["operacion"])){	//nivel3
		if($_POST["aceptar"]!="Descartar"){
			//print_r($_FILES);
			$fotoE="";$fotoA1="";$fotoA2="";
			if (isset($_FILES["logo"])){
				if (is_uploaded_file($_FILES["logo"]["tmp_name"])){

					$cfoto=explode(".",$_FILES["logo"]["name"]);
					$archivo=$_POST["doc_cliente"].".".$cfoto[count($cfoto)-1];

					if(move_uploaded_file($_FILES["logo"]["tmp_name"],WEB.FOTOS.$archivo)){
						$fotoE=",logo='".FOTOS.$archivo."'";
						$fotoA1=",logo";
						$fotoA2=",'".FOTOS.$archivo."'";
						}
				}
			}

			switch ($_POST["operacion"]) {
			case 'E':
				$sql="UPDATE rutas SET id_sedes_ips='".$_POST["idsedes"]."',nom_ruta='".$_POST["nomruta"]."',origen='".$_POST["origen"]."',destino='".$_POST["destino"]."',horarios='".$_POST["horarios"]."',costo_dia_ruta='".$_POST["costo"]."',estado_ruta='".$_POST["estado_ruta"]."' WHERE id_rutas='".$_POST["idruta"]."'";
				$subtitulo="Actualizado";
			break;
			case 'X':
				$sql="DELETE FROM rutas WHERE id_ruta=".$_POST["idruta"];
				$subtitulo="Eliminado";
			break;
			case 'A':
				$sql="INSERT INTO rutas (id_sedes_ips,nom_ruta,origen,destino,horarios,costo_dia_ruta,estado_ruta ) VALUES
				('".$_POST["idsedes"]."','".$_POST["nomruta"]."','".$_POST["origen"]."','".$_POST["destino"]."','".$_POST["horarios"]."','".$_POST["costo"]."','".$_POST["estado_ruta"]."')";
				$subtitulo="Adicionado";
			break;
		}
		//echo $sql;
		if ($bd1->consulta($sql)){
			$subtitulo="El registro fue $subtitulo con exito!";
			if($_POST["operacion"]=="X"){
			if(is_file($fila["logo"])){
				unlink($fila["logo"]);
			}
			}
		}else{
			$subtitulo="El registro NO fue $subtitulo !!! .";
		}
	}
}

if (isset($_GET["mante"])){					///nivel 2
	switch ($_GET["mante"]) {
		case 'E':
			$sql="SELECT id_rutas,id_sedes_ips,nom_ruta,origen,destino,horarios,costo_dia_ruta,estado_ruta FROM  rutas where id_rutas=".$_GET["idruta"];
			$color="green";
			$boton="Actualizar";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$subtitulo='Edición de datos Ruta';
			break;
			case 'X':
			$sql="SELECT id_rutas,id_sedes_ips,nom_ruta,origen,destino,horarios,costo_dia_ruta,estado_ruta FROM  rutas where id_rutas=".$_GET["idruta"];
			$color="red";
			$boton="Eliminar";
			$atributo1=' readonly="readonly"';
			$atributo2=' readonly="readonly"';
			$atributo3=' disabled="disabled"';
			$subtitulo='Confirmación para eliminar de datos Ruta';
			break;
			case 'A':
			$sql="";
			$color="yellow";
			$boton="Crear";
			$atributo1=' readonly="readonly"';
			$atributo2='';
			$atributo3='';
			$subtitulo='Creación de Ruta';
			break;
		}

		if($sql!=""){
			if (!$fila=$bd1->sub_fila($sql)){
				$fila=array("id_rutas"=>"","id_sedes_ips"=>"","nom_ruta"=>"","origen"=>"","destino"=>"","horarios"=>"","costo_dia_ruta"=>"","estado_ruta"=>"");

			}
		}else{
				$fila=array("id_rutas"=>"","id_sedes_ips"=>"","nom_ruta"=>"","origen"=>"","destino"=>"","horarios"=>"","costo_dia_ruta"=>"","estado_ruta"=>"");
			}

		?>
<script src = "js/sha3.js"></script>
		<script>
			function validar(){
				if (document.forms[0].nom_cliente.value == ""){
					alert("Se requiere el nombre del cliente!");
					document.forms[0].nom_cliente.focus();				// Ubicar el cursor
					return(false);
				}
			}
		</script>
<form action="<?php echo PROGRAMA;?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
  <section class="panel panel-default">
	<article>
		<h3 id="th-estilo2"><?php echo $subtitulo;?></h3>
	</article>
	<div class="panel panel-body">
	  <article class="col-xs-1">
	  	<label  for="">ID:</label>
	  	<input type="text"  name="idruta" class="form-control" value="<?php echo $fila["id_rutas"];?>"<?php echo $atributo1;?>/>
	  </article>
	  <article class="col-xs-3">
			<label>Sede de Ruta:</label><br>
			<select name="idsedes" class="form-control" <?php echo atributo3; ?>>
				<?php
				$sql="SELECT id_sedes_ips,nom_sedes from sedes_ips ORDER BY id_sedes_ips ASC";
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
		<article class="col-xs-2">
	  	<label  for="">Nombre Ruta:</label>
	  	<input type="text"  name="nomruta" class="form-control" value="<?php echo $fila["nom_ruta"];?>"<?php echo $atributo2;?>/>
	  </article>
	  <article class="col-xs-3">
	  	<label for="">Origen:</label>
	  	<input type="text"  name="origen" class="form-control" value="<?php echo $fila["origen"];?>"<?php echo $atributo2;?>/>
	  </article>
	  <article class="col-xs-3">
		 <label for="">Destino:</label>
	   <input type="text"  name="destino" class="form-control" value="<?php echo $fila["destino"];?>"<?php echo $atributo2;?>/>
	  </article>
		<article class="col-xs-5">
	  	<label for="">Horarios:</label>
	  	<textarea name="horarios" class="form-control" value=""<?php echo $atributo2;?>><?php echo $fila["horarios"];?></textarea>
	  </article>
		<article class="col-xs-2">
		 <label for="">Costo Ruta X día:</label>
		 <input type="text"  name="costo" class="form-control" value="<?php echo $fila["costo_dia_ruta"];?>"<?php echo $atributo2;?>/>
		</article>
	  <article class="col-xs-2">
	  	<label for="">Estado:</label>
	  	<select name="estado_ruta" class="form-control"  <?php echo atributo3; ?>>
	  		<option value="Activa">Activa</option>
	  		<option value="Inactiva">Inactiva</option>
	  	</select>
	  </article>
	</div>
	<div class="row text-center">
	  	<input type="submit" class="btn btn-primary" name="aceptar" Value="<?php echo $boton; ?>" />
		<input type="reset" class="btn btn-primary" Value="Reestablecer"/>
		<input type="submit" class="btn btn-primary" name="aceptar" Value="Descartar"/>
		<input type="hidden" class="btn btn-primary" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
		<input type="hidden" class="btn btn-primary" name="operacion" Value="<?php echo $_GET["mante"];?>"/>
	</div>
  </section>
</form>

<?php
}else{
	echo $subtitulo;
// nivel 1?>
<div class="panel panel-default">
<div class="panel-body">
<table class="table table-responsive">
	<tr>
		<th colspan="2" id="th-estilo1"></th>
		<th id="th-estilo2">ID</th>
		<th id="th-estilo2">SEDE IPS</th>
		<th id="th-estilo2">NOMBRE RUTA</th>
		<th id="th-estilo2">ORIGEN</th>
		<th id="th-estilo2">DESTINO</th>
		<th id="th-estilo2">HORARIOS</th>
		<th id="th-estilo2">ESTADO</th>
		<th id="th-estilo2">ROUTE MAP</th>
	</tr>

	<?php
	$sql="SELECT r.id_rutas,nom_ruta,origen,destino,horarios,estado_ruta,t.nom_sedes FROM rutas r LEFT JOIN sedes_ips t on r.id_sedes_ips=t.id_sedes_ips where r.estado_ruta='Activa' ORDER BY r.id_rutas ASC";

if ($tabla=$bd1->sub_tuplas($sql)){
	foreach ($tabla as $fila ) {
		echo"<tr>\n";
		echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=E&idruta='.$fila["id_rutas"].'"><button type="button" class="btn btn-primary" ><span class="fa fa-pencil"></span></button></a></th>';
		echo'<th class="text-center"><a href="'.PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=X&idruta='.$fila["id_rutas"].'"><button type="button" class="btn btn-primary" ><span class="fa fa-trash"></span></button></a></th>';
		echo'<td class="text-right">'.$fila["id_ruta"].'</td>';
		echo'<td class="text-left">'.$fila["nom_sedes"].'</td>';
		echo'<td class="text-left">'.$fila["nom_ruta"].'</td>';
		echo'<td class="text-left">'.$fila["origen"].'</td>';
		echo'<td class="text-left">'.$fila["destino"].'</td>';
		echo'<td class="text-left">'.$fila["horarios"].'</td>';
		echo'<td class="text-center">'.$fila["estado_ruta"].'</td>';
		echo'<th class="text-center"><a href="loc_ruta.php?origen='.$fila["origen"].'&destino='.$fila["destino"].'"><button type="button" class="btn btn-primary" >Ver ruta</button></a></th>';
		echo "</tr>\n";
	}
}
	?>
	<tr>
		<th colspan="10" class="text-center"><a href="<?php echo PROGRAMA.'?opcion='.$_REQUEST["opcion"].'&mante=A'?>" align="center" ><button type="button" class="btn btn-primary" >Adicionar Ruta</button>
		</a></th>
	</tr>
</table>
</div>
</div>
	<?php
}
?>
