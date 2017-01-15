<form action="<?php echo PROGRAMA.'?&opcion=19';?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
<section class="panel-body">
	<?php
		include("consulta_paciente.php");
	?>
</section>
	<article>
		<h4 id="th-estilot">Datos de historia Clínica</h4>
	</article>

	<section class="panel-body"> <!--Anamnesis-->
		<div class="botonhc">
				<a data-toggle="collapse" class="ac" data-target="#anamnesis" >Anamnesis</a>
				<span class="glyphicon glyphicon-arrow-down"></span>
				<span class="badge">OK</span>
		</div>
		<section class="collapse" id="anamnesis">
			<article class="col-xs-3">
				<label for="">Fecha de registro:</label>
				<input type="text" name="freg" value="<?php echo $date ;?>" class="form-control" <?php echo $atributo1?> >
			</article>
			<article class="col-xs-3">
				<label for="">Hora de registro</label>
				<input type="text" name="hreg" value="<?php echo $date1 ;?>" class="form-control" <?php echo $atributo1?>>
			</article>
			<article class="col-xs-10">
				<label for="">Motivo de consulta:</label>
				<textarea class="form-control" name="motivoconsulta" rows="5" id="comment" required=""></textarea>
			</article>
			<article class="col-xs-10">
				<label for="" >Enfermedad Actual: <span class="fa fa-info-circle" data-toggle="popover" title="Circunstancias especiales del paciente en relación con su enfermedad" data-content=""></span></label>
				<textarea class="form-control" name="enferactual" rows="5" id="comment" required=""></textarea>
			</article>
			<article class="col-xs-5">
				<label >Historia Personal: <span class="fa fa-info-circle" data-toggle="popover" title="Embarazo, parto, lactancia y desarrollo psicomotor, niñez, adolecencia,adultez, senectud, personalidad previa, antecedentes legales" data-content=""></span></label>
				<textarea class="form-control" name="hpersonal" rows="6" id="comment" required=""></textarea>
			</article>
			<article class="col-xs-5">
				<label for="">Historia Familiar:</label>
				<textarea class="form-control" name="hfamiliar" rows="6" id="comment" required=""></textarea>
			</article>
			<article class="col-xs-10">
				<label for="">Personalidad Premorbida:</label>
				<textarea class="form-control" name="ppremorbida" rows="3" id="comment" required=""></textarea>
			</article>
		</section>
</section>
<section class="panel-body">
		<div class="botonhc">
			<a data-toggle="collapse" class="ac" data-target="#antpersonal" >Antecedentes Personales <span class="glyphicon glyphicon-arrow-down"></span> </a>
			<span class="badge">OK</span>
		</div>
		  <section id="antpersonal" class="collapse">
				<article class="col-xs-3">
			  	<label for="">Alergicos:</label>
					<button type="button" class="fa fa-plus btn-danger"  onclick="verTexto1()" ></button>
   				<button type="button" class="fa fa-minus btn-danger" onclick="ocultarTexto1()"></button>
			  	<textarea class="form-control" name="antalergico" rows="4" id="respuesta1" required=""></textarea>
			  </article>
				<article class="col-xs-3">
			  	<label for="">Psiquiatricos:</label>
					<button type="button" class="fa fa-plus btn-danger"  onclick="verTexto2()" ></button>
   				<button type="button" class="fa fa-minus btn-danger" onclick="ocultarTexto2()"></button>
			  	<textarea class="form-control" name="antpsiquiatrico" rows="4" id="respuesta2" required=""></textarea>
			  </article>
				<article class="col-xs-3">
					<label for="">Patologicos:</label>
					<button type="button" class="fa fa-plus btn-danger"  onclick="verTexto3()" ></button>
   				<button type="button" class="fa fa-minus btn-danger" onclick="ocultarTexto3()"></button>
					<textarea class="form-control" name="antpatologico" rows="4" id="respuesta3" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Quirurgicos:</label>
					<button type="button" class="fa fa-plus btn-danger"  onclick="verTexto4()" ></button>
   				<button type="button" class="fa fa-minus btn-danger" onclick="ocultarTexto4()"></button>
					<textarea class="form-control" name="antquirurgico" rows="4" id="respuesta4" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Toxicológicos:</label>
					<button type="button" class="fa fa-plus btn-danger"  onclick="verTexto5()" ></button>
   				<button type="button" class="fa fa-minus btn-danger" onclick="ocultarTexto5()"></button>
					<textarea class="form-control" name="anttoxicologicos" rows="4" id="respuesta5" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Farmacológicos:</label>
					<button type="button" class="fa fa-plus btn-danger"  onclick="verTexto6()" ></button>
   				<button type="button" class="fa fa-minus btn-danger" onclick="ocultarTexto6()"></button>
					<textarea class="form-control" name="antfarmacologico" rows="4" id="respuesta6" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Hospitalarios:</label>
					<button type="button" class="fa fa-plus btn-danger"  onclick="verTexto7()" ></button>
   				<button type="button" class="fa fa-minus btn-danger" onclick="ocultarTexto7()"></button>
					<textarea class="form-control" name="anthospitalario" rows="4" id="respuesta7" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Gineco-obstetricos:</label>
					<textarea class="form-control" name="antgineco" rows="4" id="respuesta" ></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Traumatologicos:</label>
					<button type="button" class="fa fa-plus btn-danger"  onclick="verTexto8()" ></button>
   				<button type="button" class="fa fa-minus btn-danger" onclick="ocultarTexto8()"></button>
					<textarea class="form-control" name="anttrauma" rows="4" id="respuesta8" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Familiares:</label>
					<button type="button" class="fa fa-plus btn-danger"  onclick="verTexto9()" ></button>
   				<button type="button" class="fa fa-minus btn-danger" onclick="ocultarTexto9()"></button>
					<textarea class="form-control" name="antfami" rows="4" id="respuesta9" required=""></textarea>
				</article>
				<article class="col-xs-6">
					<label for="">Otros Antecedentes:</label>
					<button type="button" class="fa fa-plus btn-danger"  onclick="verTexto10()" ></button>
   				<button type="button" class="fa fa-minus btn-danger" onclick="ocultarTexto10()"></button>
					<textarea class="form-control"  name="antotros" rows="4" id="respuesta10" required=""></textarea>
				</article>
		  </section>
</section>
<section class="panel-body">
			<div class="botonhc">
				<a data-toggle="collapse" class="ac" data-target="#efisico" >Examen Físico <span class="glyphicon glyphicon-arrow-down"></span> </a>
				<span class="badge">OK</span>
			</div>
			<section id="efisico" class="collapse">
<article class="col-xs-2">
					<label for="">TAS(mm/hg):</label>
					<input type="text" name="tas" value="" class="form-control">
				</article>
				<article class="col-xs-2">
					<label for="">TAD(mm/hg):</label>
					<input type="text" name="tad" value="" class="form-control">
				</article>

				<article class="col-xs-2">
					<label for="">FC(x min):</label>
					<input type="text" name="fc" value="" class="form-control">
				</article>
				<article class="col-xs-2">
					<label for="">FR(x min):</label>
					<input type="text" name="fr" value="" class="form-control">
				</article>
				<article class="col-xs-2">
					<label for="">SAO2:</label>
					<input type="text" name="sao2" value="" class="form-control">
				</article>
				<article class="col-xs-2">
					<label for="">Peso(Kg):</label>
					<input type="text" name="peso" value="" class="form-control">
				</article>
				<article class="col-xs-2">
					<label for="">Talla(mts): <span class="fa fa-pulse fa-comment-o" data-toggle="popover" title="El valor correspondiente a la talla del paciente debe ser diligenciado en metros Ej: 1.95" data-content=""></span></label>
					<input type="text" name="talla" value="" class="form-control">
				</article>
				<article class="col-xs-2">
					<label for="">Temp(°C):</label>
					<input type="text" name="temperatura" value="" class="form-control">
				</article>
<article class="col-xs-6 animated tada fuente_alerta_fijo">
					<label class="fuente_alerta_fijo" for="">Doctor(a) los datos que debe ingresar en estos campos deben ser numericos, en el campo de talla digite en metros Ejemplo: 1.95</label>

				</article>
			</section>
</section>
<section class="panel-body">
			<div class="botonhc">
				<a data-toggle="collapse" class="ac" data-target="#explogeneral" >Exploración general y regional<span class="glyphicon glyphicon-arrow-down"></span> </a>
				<span class="badge">OK</span>
			</div>
			<section id="explogeneral" class="collapse">
				<article class="col-xs-12">
					<label for="">Estado General:</label>
					<button type="button" class="fa fa-plus btn-danger"  onclick="verTexto11()" ></button>
   				<button type="button" class="fa fa-minus btn-danger" onclick="ocultarTexto11()"></button>
					<textarea class="form-control" name="estadogen" rows="3" id="respuesta11" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Cabeza y Cuello:</label>
					<button type="button" class="fa fa-plus btn-danger"  onclick="verTexto12()" ></button>
   				<button type="button" class="fa fa-minus btn-danger" onclick="ocultarTexto12()"></button>
					<textarea class="form-control" name="cabezacuello" rows="5" id="respuesta12" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Torax:</label>
					<button type="button" class="fa fa-plus btn-danger"  onclick="verTexto13()" ></button>
   				<button type="button" class="fa fa-minus btn-danger" onclick="ocultarTexto13()"></button>
					<textarea class="form-control" name="torax" rows="5" id="respuesta13" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Abdomen:</label>
					<button type="button" class="fa fa-plus btn-danger"  onclick="verTexto16()" ></button>
   				<button type="button" class="fa fa-minus btn-danger" onclick="ocultarTexto16()"></button>
					<textarea class="form-control" name="abdomen" rows="5" id="respuesta16" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Genitourinario:</label>
					<button type="button" class="fa fa-plus btn-danger"  onclick="verTexto17()" ></button>
   				<button type="button" class="fa fa-minus btn-danger" onclick="ocultarTexto17()"></button>
					<textarea class="form-control" name="genitourinario" rows="5" id="respuesta17" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Extremidades:</label>
					<button type="button" class="fa fa-plus btn-danger"  onclick="verTexto14()" ></button>
   				<button type="button" class="fa fa-minus btn-danger" onclick="ocultarTexto14()"></button>
					<textarea class="form-control" name="extsup" rows="5" id="respuesta14" required=""></textarea>
				</article>
				<article class="col-xs-3">
					<label for="">Neurologico:</label>
					<button type="button" class="fa fa-plus btn-danger"  onclick="verTexto15()" ></button>
					<button type="button" class="fa fa-minus btn-danger" onclick="ocultarTexto15()"></button>
					<textarea class="form-control" name="neurologico" rows="5" id="respuesta15" required=""></textarea>
				</article>

			</section>
</section>
<section class="panel-body">
			<div class="botonhc">
				<a data-toggle="collapse" class="ac" data-target="#exmental" >Examen Mental y Analisis<span class="glyphicon glyphicon-arrow-down"></span> </a>
				<span class="badge">OK</span>
			</div>
			<section id="exmental" class="collapse">
				<article class="col-xs-10">
					<label for="">Examen Mental:</label>
					<textarea class="form-control" name="exmental" rows="5" id="comment" required=""></textarea>
				</article>
				<article class="col-xs-10">
					<label for="">Analisis y Diagnostico:</label>
					<textarea class="form-control" name="analisis" rows="5" id="comment" required=""></textarea>
				</article>
				<article class="col-xs-5">
					<label for="">Finalidad de la consulta: </label>
					<select name="finconsulta" class="form-control" <?php echo atributo3; ?>>
						<?php
						$sql="SELECT id_fconsulta,descripfconsulta from finalidad_consulta ORDER BY id_fconsulta ASC";
						if($tabla=$bd1->sub_tuplas($sql)){
							foreach ($tabla as $fila2) {
								if ($fila["descripfconsulta"]==$fila2["descripfconsulta"]){
									$sw=' selected="selected"';
								}else{
									$sw="";
								}
							echo '<option value="'.$fila2["descripfconsulta"].'"'.$sw.'>'.$fila2["descripfconsulta"].'</option>';
							}
						}
						?>
					</select>
				</article>
				<article class="col-xs-5">
					<label for="">Causa externa: </label>
					<select name="causaexterna" class="form-control" <?php echo atributo3; ?>>
						<?php
						$sql="SELECT id_cexterna,descricexterna from causa_externa ORDER BY id_cexterna ASC";
						if($tabla=$bd1->sub_tuplas($sql)){
							foreach ($tabla as $fila2) {
								if ($fila["descricexterna"]==$fila2["descricexterna"]){
									$sw=' selected="selected"';
								}else{
									$sw="";
								}
							echo '<option value="'.$fila2["descricexterna"].'"'.$sw.'>'.$fila2["descricexterna"].'</option>';
							}
						}
						?>
					</select>
				</article>
				<article class="col-xs-5">
					<label for="">Clasificación Diagnostica: </label>
					<select name="clasificacion_dx" class="form-control" <?php echo atributo3; ?> requie>
						<option value=""></option>
						<option value="Psiquiatria">Psiquiatria</option>
						<option value="Rhb. farmacodependencia">Rhb. farmacodependencia</option>
						<option value="Rhb. trastornos alimenticios">Rhb. trastornos alimenticios</option>
					</select>
				</article>
			</section>
</section>
<section class="panel-body">
		<div class="botonhc">
			<a data-toggle="collapse" class="ac" data-target="#dxingreso" >Diagnosticos Ingreso<span class="glyphicon glyphicon-arrow-down"></span> </a>
			<span class="badge text-left">OK</span>
		</div>
			<section id="dxingreso" class="collapse">
				<article class="col-xs-12">
					<label class="alert-success">Diagnostico Principal</label>
					<?php include("diagnosticos/dx.php");?>
				</article>
				<article class="col-xs-12">
					<label class="alert-Info">Diagnostico Relacionado 1</label>
					<?php include("diagnosticos/dx1.php");?>
				</article>
				<article class="col-xs-12">
					<label class="alert-Info">Diagnostico Relacionado 2</label>
					<?php include("diagnosticos/dx2.php");?>
				</article>
				<article class="col-xs-12">
					<label class="alert-Info">Diagnostico Relacionado 3</label>
					<?php include("diagnosticos/dx3.php");?>
				</article>
			</section>
	</section>
<section class="panel-body">
			<div class="botonhc">
				<a data-toggle="collapse" class="ac" data-target="#plant" >Plan Tratamiento<span class="glyphicon glyphicon-arrow-down"></span> </a>
				<span class="badge text-left">OK</span>
			</div>
			<section id="plant" class="collapse">
				<article class="col-xs-12">
					<label for="">Plan de tratamiento:</label>
					<textarea class="form-control" name="plant" rows="8" id="comment" required=""></textarea>
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
