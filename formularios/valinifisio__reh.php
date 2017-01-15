<form action="<?php echo PROGRAMA.'?&opcion=49';?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
	<section class="panel-body">
		<?php
			include("consulta_paciente.php");
		?>
	</section>
		<article>
			<h4 id="th-estilot">Datos de Evolución Fisioterapia</h4>
			<section class="panel-body"> <!--Anamnesis-->
				<div class="botonhc">
						<a data-toggle="collapse" class="ac" data-target="#sintactico" >TONO MUSCULAR</a>
						<span class="glyphicon glyphicon-arrow-down"></span>
						<span class="badge">OK</span>
				</div>
				<section class="collapse" id="sintactico">
					<article class="col-xs-10">
						<table class="table table-bordered">
							<tr>
								<label for="">(Escala de Aswerth Modificada para hipertonia):</label>
							</tr>
							<tr>
								<td>
									<strong>0</strong>
								</td>
								<td>
									No hay cambios en la respuesta del músculo en los movimientos de flexión o extensión.
								</td>
								<td>
									<input type="radio" class="radio" name="tmuscular1"
										<?php if (isset($tmuscular1) && $tmuscular1=="0") echo "checked";?>
										value="0">
								</td>
							</tr>
							<tr>
								<td>
									<strong>1</strong>
								</td>
								<td>
									Ligero aumento en la respuesta del músculo al movimiento (flexión o extensión) visible con la palpación o relajación, o solo mínima resistencia al final del arco del movimiento.
								</td>
								<td>
									<input type="radio" class="radio" name="tmuscular1"
										<?php if (isset($tmuscular1) && $tmuscular1=="1") echo "checked";?>
										value="1">
								</td>
							</tr>
							<tr>
								<td>
									<strong>1+</strong>
								</td>
								<td>
									Ligero aumento en la resistencia del músculo al movimiento en flexión o extensión seguido de una mínima resistencia en todo el resto del arco de movimiento (menos de la mitad).
								</td>
								<td>
									<input type="radio" class="radio" name="tmuscular1"
										<?php if (isset($tmuscular1) && $tmuscular1=="1+") echo "checked";?>
										value="1+">
								</td>
							</tr>

							<tr>
								<td>
									<strong>2</strong>
								</td>
								<td>
									Notable incremento en la resistencia del músculo durante la mayor parte del arco de movimiento articular, pero la articulación se mueve fácilmente.
								</td>
								<td>
									<input type="radio" class="radio" name="tmuscular1"
										<?php if (isset($tmuscular1) && $tmuscular1=="2") echo "checked";?>
										value="2">
								</td>
							</tr>
							<tr>
								<td>
									<strong>3</strong>
								</td>
								<td>
									Marcado incremento en la resistencia del músculo; el movimiento pasivo es difícil en la flexión o extensión.
								</td>
								<td>
									<input type="radio" class="radio" name="tmuscular1"
										<?php if (isset($tmuscular1) && $tmuscular1=="3") echo "checked";?>
										value="3">
								</td>
							</tr>
							<tr>
								<td>
									<strong>4</strong>
								</td>
								<td>
									Las partes afectadas están rígidas en flexión o extensión cuando se mueven pasivamente
								</td>
								<td>
									<input type="radio" class="radio" name="tmuscular1"
										<?php if (isset($tmuscular1) && $tmuscular1=="4") echo "checked";?>
										value="4">
								</td>
							</tr>
						</table>
					</article>
					<article class="col-xs-10">
						<table class="table table-bordered">
							<tr>
								<label for="">Campbell clasificación para hipotonia:</label>
							</tr>
							<tr>
								<td>
									<strong>0</strong>
								</td>
								<td>
									Normal
								</td>
								<td>
									<p>
										Activo: rápido e inmediato ajuste postural durante el movimiento, habilidad para usar los
	músculos de patrones sinérgico recíprocos para la estabilidad y la movilidad dependiendo
	de la tarea
	Pasivo: las partes de cuerpo se resisten al movimiento
	Momentáneamente se mantiene una nueva postura cuando es colocado en el espacio ,
	puede seguir cambios de movimientos por le examinador
									</p>
								</td>
								<td>
									<input type="radio" class="radio" name="tmuscular2"
										<?php if (isset($tmuscular2) && $tmuscular2=="0") echo "checked";?>
										value="0">
								</td>
							</tr>
							<tr>
								<td>
									<strong>-1</strong>
								</td>
								<td>
									Hipotonía leve
								</td>
								<td>
									<p>
										Activo: interfiere con las contracciones de la musculatura axial, retraso en el inicio del
movimiento contra gravedad, reducida la velocidad de ajuste a los cambios posturales.
Pasivo: arco de resistencia a los cambios articulares, completo arco de movimiento pasivo,
hiperlaxitud limitada a manos, tobillos y pies
									</p>
								</td>
								<td>
									<input type="radio" class="radio" name="tmuscular2"
										<?php if (isset($tmuscular2) && $tmuscular2=="-1") echo "checked";?>
										value="-1">
								</td>
							</tr>
							<tr>
								<td>
									<strong>-2</strong>
								</td>
								<td>
									Hipotonía moderada
								</td>
								<td>
									<p>
										Activo: el tono muscular esta disminuido principalmente en los músculos axiales y
proximales, interfiere con la cantidad de tiempo en la que mantienen una postura
Pasivo: muy poca resistencia al movimiento impuesto por el examinador, se encuentra
menos resistencia en el movimiento impuesto por el examinador, se encuentra menos
resistencia en el movimiento alrededor de las articulaciones proximales, hiperlaxitud en las
rodillas y tobillos.
									</p>
								</td>
								<td>
									<input type="radio" class="radio" name="tmuscular2"
										<?php if (isset($tmuscular2) && $tmuscular2=="-2") echo "checked";?>
										value="-2">
								</td>
							</tr>
							<tr>
								<td>
									<strong>-3</strong>
								</td>
								<td>
									Hipotonía Severa
								</td>
								<td>
									<p>
										Activo: inhabilidad para resistir gravedad falta de contracción de las articulaciones
proximales para la estabilidad y aparente debilidad.
Pasivo: ninguna resistencia al movimiento impuesto por el examinador, completo o
excesivo rango de movimiento, hiperlaxitud
									</p>
								</td>
								<td>
									<input type="radio" class="radio" name="tmuscular2"
										<?php if (isset($tmuscular2) && $tmuscular2=="-3") echo "checked";?>
										value="-3">
								</td>
							</tr>
						</table>
					</article>
				</section>
			</section>
			<section class="panel-body"> <!--Anamnesis-->
				<div class="botonhc">
						<a data-toggle="collapse" class="ac" data-target="#cc" >COMPROMISO CORPORAL Y ACTIVIDAD MOTORA</a>
						<span class="glyphicon glyphicon-arrow-down"></span>
						<span class="badge">OK</span>
				</div>
				<section class="collapse" id="cc">
					<article class="col-xs-3">
						<label for="">Compromiso corporal</label>
						<select class="form-control" name="avd_alimen1">
							<option value="Cuadriplejia">Cuadriplejia</option>
							<option value="Diplejia">Diplejia</option>
							<option value="Paraplejia">Paraplejia</option>
							<option value="Hemiplejia">Hemiplejia</option>
							<option value="Monoplejia">Monoplejia</option>
						</select>
					</article>
					<article class="col-xs-6">
						<label for="">Actividad Motora Voluntaria:</label>
						<textarea class="form-control" name="amv" rows="5" id="comment" ></textarea>
					</article>
				</section>
			</section>
			<section class="panel-body"> <!--Anamnesis-->
				<div class="botonhc">
						<a data-toggle="collapse" class="ac" data-target="#actref1" >ACTIVIDAD REFLEJA (Bertha Boath y Karel Bobath)</a>
						<span class="glyphicon glyphicon-arrow-down"></span>
						<span class="badge">OK</span>
				</div>
				<section class="collapse" id="actref1">
					<article class="col-xs-12">
						<table class="table table-bordered">
							<tr>
								<h2>Nivel: Medular</h2>
							</tr>
							<tr>
								<td><strong>REFLEJO</strong></td>
								<td><strong>SE INTEGRA</strong></td>
								<td><strong>ESTIMULO</strong></td>
								<td><strong>RESPUESTA</strong></td>
								<td><strong>CLASIFICACIÓN</strong></td>
							</tr>
							<tr>
								<td><strong>Moro</strong></td>
								<td><strong>6 meses</strong></td>
								<td><p>En supino se da fuerte golpe sobre la superficie o semi sentado se deja caer unos grados</p></td>
								<td><p>Abd, extensión de MMSS con RE, seguido con Add y RI con llanto</p></td>
								<td>
									<select class="form-control" name="act_refleja1">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr>
							<tr>
								<td><strong>Prensión
Palmar</strong></td>
								<td><strong>4 – 6 meses</strong></td>
								<td><p>Se realiza estimulo táctil
(presión) sobre la cabeza de
los metacarpianos con el
dedo índice</p></td>
								<td><p>Aumento de tono flexor de
mano hasta empuñarla</p></td>
								<td>
									<select class="form-control" name="act_refleja2">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr><tr>
								<td><strong>Prensión
Plantar</strong></td>
								<td><strong>9 meses</strong></td>
								<td><p>MMII en extensión se realiza
presión en la cabeza de
MTT con el dedo índice</p></td>
								<td><p>Aumento de tono flexor en
pie hasta conseguir agarre</p></td>
								<td>
									<select class="form-control" name="act_refleja3">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr><tr>
								<td><strong>Galant</strong></td>
								<td><strong2 meses</strong></td>
								<td><p>Niño en prono sobre las
piernas se realiza estímulo a
nivel paravertebral de forma
cefalocaudal</p></td>
								<td><p>Incurvación del tronco
hacia el lado estimulado</p></td>
								<td>
									<select class="form-control" name="act_refleja4">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr><tr>
								<td><strong>Bipedestación Primaria</strong></td>
								<td><strong>2 meses</strong></td>
								<td><p>Se toma el niño por debajo de las axilas en posición vertical se aproximan MMII hacia superficie dura</p></td>
								<td><p>Enderezamiento
con
extensión
progresiva,
semeja posición erecta</p></td>
								<td>
									<select class="form-control" name="act_refleja5">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr><tr>
								<td><strong>Marcha
Automática</strong></td>
								<td><strong>2 meses</strong></td>
								<td><p>Posición vertical sujeto por
el tronco se comienza a
desplazar
lateralmente
centro de gravedad con
inclinación de tronco</p></td>
								<td><p>Inicia
marcha
caracterizada por buena
coordinación
y
ritmo
regular talón al piso
seguido de dorsiflexion</p></td>
								<td>
									<select class="form-control" name="act_refleja6">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr><tr>
								<td><strong>Retiro en Flexión</strong></td>
								<td><strong>2 meses</strong></td>
								<td><p>Supino cabeza línea media MMII en extensión, estimulo táctil (pellizco) sobre cabeza de MTT</p></td>
								<td><p>Retiro del miembro donde se realiza el estímulo con flexión de cadera, rodilla y dorsiflexion de pie</p></td>
								<td>
									<select class="form-control" name="act_refleja7">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr><tr>
								<td><strong>Empuje extensor</strong></td>
								<td><strong>2 meses</strong></td>
								<td><p>Supino se fleja pierna y se empuja hacia arriba</p></td>
								<td><p>Extensión de cadera y rodilla, Add, RI, dorsiflexión</p></td>
								<td>
									<select class="form-control" name="act_refleja8">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr><tr>
								<td><strong>Búsqueda</strong></td>
								<td><strong>2 meses</strong></td>
								<td><p>Roce en comisura labial</p></td>
								<td><p>Giro de la cabeza hacia el lado estimulado desvía la comisura al mismo lado</p></td>
								<td>
									<select class="form-control" name="act_refleja9">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr><tr>
								<td><strong>Extensión Cruzada</strong></td>
								<td><strong>2 meses</strong></td>
								<td><p>Supino cabeza en línea media, extensión de MMII estimulo táctil en región superior interna del muslo</p></td>
								<td><p>1. Flexión y Abd de
cadera
2. Extensión, Add,
RI de miembro
estimulado</p></td>
								<td>
									<select class="form-control" name="act_refleja10">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr><tr>
								<td><strong>Succión</strong></td>
								<td><strong>6 meses</strong></td>
								<td><p>Supino estimulo con el dedo
del terapeuta o biberón
dentro de la boca</p></td>
								<td><p>Movimientos rítmicos y
fuertes de succión</p></td>
								<td>
									<select class="form-control" name="act_refleja11">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr><tr>
								<td><strong>Babinsky</strong></td>
								<td><strong>18 meses</strong></td>
								<td><p>Supino se estimula el borde
externo de la planta del pie
de talón a dedos</p></td>
								<td><p>1.
2.
3.
Extensión
del
grueso artejo
Extensión dedos
en abanico
Flexión
de
cadera y rodilla</p></td>
								<td>
									<select class="form-control" name="act_refleja12">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr>
						</table>
					</article>
					<article class="col-xs-12">
						<table class="table table-bordered">
							<tr>
								<h2>Nivel: Tallo cerebral</h2>
							</tr>
							<tr>
								<td><strong>REFLEJO</strong></td>
								<td><strong>SE INTEGRA</strong></td>
								<td><strong>ESTIMULO</strong></td>
								<td><strong>RESPUESTA</strong></td>
								<td><strong>CLASIFICACIÓN</strong></td>
							</tr>
							<tr>
								<td><strong>Reacción positiva de Soporte</strong></td>
								<td><strong>8 meses</strong></td>
								<td><p>Posición vertical, planta del pie en contacto con la superficie</p></td>
								<td><p>Aumento de tono extensor hasta lograr rigidez de MMII y columna</p></td>
								<td>
									<select class="form-control" name="ntallocerebral1">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr>
							<tr>
								<td><strong>Reacción
negativa de
soporte</strong></td>
								<td><strong>6 meses</strong></td>
								<td><p>Posición vertical, talón en
contacto
con
una
superficie</p></td>
								<td><p>Aumento
de
tono
flexor hasta lograr la
flexión de MMII y cae</p></td>
								<td>
									<select class="form-control" name="ntallocerebral2">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr>
							<tr>
								<td><strong>Reflejo tónico laberíntico</strong></td>
								<td><strong>8 meses</strong></td>
								<td><p>Niño en supino rotación pasiva o activa del cuello</p></td>
								<td><p>El MS y MI lado facial se extienden, y el MS y MI de lado craneal se flexionan (esgrimista) tronco alineado</p></td>
								<td>
									<select class="form-control" name="ntallocerebral3">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr>
							<tr>
								<td><strong>Reflejo
tónico
cervical
asimétrico</strong></td>
								<td><strong>4 meses</strong></td>
								<td><p>Niño en prono y supino</p></td>
								<td><p>1. En
prono
aumenta el
tono flexor
2. En
supino
aumenta
tono
extensor</p></td>
								<td>
									<select class="form-control" name="ntallocerebral4">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr>
							<tr>
								<td><strong>Reflejo
tónico
cervical
simétrico</strong></td>
								<td><strong>4 meses</strong></td>
								<td><p>Niño en prono, flexión y
extensión de cuello</p></td>
								<td><p>1. A
la
extensión
del cuello,
extiende
MMSS
y
flexiona
MMII
2. A la flexión
del cuello,
flexión
de
MMSS
y
extensión
de MMII</p></td>
								<td>
									<select class="form-control" name="ntallocerebral5">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr>
						</table>
					</article>
					<article class="col-xs-12">
						<table class="table table-bordered">
							<tr>
								<h2>Nivel: Mesencefalo</h2>
							</tr>
							<tr>
								<td><strong>REFLEJO</strong></td>
								<td><strong>SE INTEGRA</strong></td>
								<td><strong>ESTIMULO</strong></td>
								<td><strong>RESPUESTA</strong></td>
								<td><strong>CLASIFICACIÓN</strong></td>
							</tr>
							<tr>
								<td><strong>Reacción de enderezamiento laberintico sobre la cabeza</strong></td>
								<td><strong>Persiste	</strong></td>
								<td><p>Posición vertical libre con ojos vendados, se desplaza en todas las direcciones, la cabeza se adelanta o atrasa con relación al tronco</p></td>
								<td><p>La cabeza busca siempre la posición inicial</p></td>
								<td>
									<select class="form-control" name="nmesencefalo1">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr>
							<tr>
								<td><strong>Reacción
enderezamiento
cuerpo
del
sobre
la
cabeza</strong></td>
								<td><strong>Persiste	</strong></td>
								<td><p>Ligera rotación del
cuerpo</p></td>
								<td><p>La cabeza sigue el
movimiento, orienta la
cabeza con relación al
cuerpo</p></td>
								<td>
									<select class="form-control" name="nmesencefalo2">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr><tr>
								<td><strong>Reacción
de
enderezamiento
del
cuerpo
sobre el cuerpo</strong></td>
								<td><strong>5 años	</strong></td>
								<td><p>Supino, cabeza en
línea media, flexionar
una pierna rotarla a
nivel de la cadera y
cruzarla al lado opuesto</p></td>
								<td><p>El
niño
rotara
segmentariamente
primero el tronco,
cintura escapular y
cabeza</p></td>
								<td>
									<select class="form-control" name="nmesencefalo3">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr><tr>
								<td><strong>Reacción
de
enderezamiento
cervical</strong></td>
								<td><strong>5 años	</strong></td>
								<td><p>Flexión y rotación del
cuello</p></td>
								<td><p>Se
rota
segmentariamente en
dirección a la rotación
de la cabeza, hombros
tronco y pelvis</p></td>
								<td>
									<select class="form-control" name="nmesencefalo4">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr><tr>
								<td><strong>Reacción
anfibia</strong></td>
								<td><strong>2 años y medio	</strong></td>
								<td><p>Se suspende el niño en
prono paralelo al piso</p></td>
								<td><p>Ajuste postural:
Al 5 mes levanta
cabeza y columna
cervical
Al 9 mes extiende
tronco hasta pelvis y
MMII
Al año involucra MMII
y MMSS y Queda
como un “avión”</p></td>
								<td>
									<select class="form-control" name="nmesencefalo5">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr><tr>
								<td><strong>Reacciones
protectoras</strong></td>
								<td><strong>Persisten
Ant: 6 m
Lat: 8 m
Post: 10 m	</strong></td>
								<td><p>Sacar el centro de
gravedad del polígono
de sustentación en las
diferentes posiciones</p></td>
								<td><p>1. Extensión
de MMSS
2. Soporte de
peso
en
MMSS
(paracaídas)</p></td>
								<td>
									<select class="form-control" name="nmesencefalo6">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr>
						</table>
					</article>
					<article class="col-xs-12">
						<table class="table table-bordered">
							<tr>
								<h2>Nivel: Mesencefalo</h2>
							</tr>
							<tr>
								<td><strong>REFLEJO</strong></td>
								<td><strong>SE INTEGRA</strong></td>
								<td><strong>ESTIMULO</strong></td>
								<td><strong>RESPUESTA</strong></td>
								<td><strong>CLASIFICACIÓN</strong></td>
							</tr>
							<tr>
								<td><strong>Reacciones Equilibrio</strong></td>
								<td><strong>Persiste	</strong></td>
								<td><p>Mover el centro de
gravedad dentro del
polígono
de
sustentación en las
diferentes posiciones</p></td>
								<td><p>Ajuste
del
tono
muscular
para
mantener el equilibrio
en
las
diferentes
posiciones
Prono: 6m
Supino:7 m
Sedente: 8 m
Cuadrúpedo: 9 m
Rodillas: 12 m
Bípedo 18 m</p></td>
								<td>
									<select class="form-control" name="ncorteza">
									<option value="Presente">Presente</option>
									<option value="Ausente">Ausente</option>
									<option value="No aplica">No aplica</option>
								</select>
							</td>
							</tr>
						</table>
					</article>
				</section>
			</section>
			<section class="panel-body"> <!--Anamnesis-->
				<div class="botonhc">
						<a data-toggle="collapse" class="ac" data-target="#rp" >REACCIONES POSTULARES</a>
						<span class="glyphicon glyphicon-arrow-down"></span>
						<span class="badge">OK</span>
				</div>
				<section class="collapse" id="rp">
					<article class="col-xs-12">
						<table class="table table-bordered">
							<tr>
								<td><strong>REACCIONES</strong></td>
								<td><strong>SUPINO</strong></td>
								<td><strong>PRONO</strong></td>
								<td><strong>CUADRUPEDO</strong></td>
								<td><strong>SEDENTE</strong></td>
								<td><strong>RODILLAS</strong></td>
								<td><strong>BIPEDO</strong></td>
							</tr>
							<tr>
								<td><strong>Enderezamiento</strong></td>
								<td>
									<select class="form-control" name="endere_supino">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td>
								<td>
									<select class="form-control" name="endere_prono">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td><td>
									<select class="form-control" name="endere_cuadrupedo">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td><td>
									<select class="form-control" name="endere_sedente">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td><td>
									<select class="form-control" name="endere_rodillas">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td>
								<td>
									<select class="form-control" name="endere_bipedo">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><strong>Equilibrio</strong></td>
								<td>
									<select class="form-control" name="equilibrio_supino">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td>
								<td>
									<select class="form-control" name="equilibrio_prono">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td><td>
									<select class="form-control" name="equilibrio_cuadrupedo">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td><td>
									<select class="form-control" name="equilibrio_sedente">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td><td>
									<select class="form-control" name="equilibrio_rodillas">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td>
								<td>
									<select class="form-control" name="equilibrio_bipedo">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><strong>Protectivas Laterales</strong></td>
								<td>
									<select class="form-control" name="platerales_supino">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td>
								<td>
									<select class="form-control" name="platerales_prono">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td><td>
									<select class="form-control" name="platerales_cuadrupedo">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td><td>
									<select class="form-control" name="platerales_sedente">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td><td>
									<select class="form-control" name="platerales_rodillas">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td>
								<td>
									<select class="form-control" name="platerales_bipedo">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><strong>Protectivas Anteriores</strong></td>
								<td>
									<select class="form-control" name="panteriores_supino">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td>
								<td>
									<select class="form-control" name="panteriores_prono">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td><td>
									<select class="form-control" name="panteriores_cuadrupedo">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td><td>
									<select class="form-control" name="panteriores_sedente">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td><td>
									<select class="form-control" name="panteriores_rodillas">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td>
								<td>
									<select class="form-control" name="panteriores_bipedo">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><strong>Protectivas Posteriores</strong></td>
								<td>
									<select class="form-control" name="pposteriores_supino">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td>
								<td>
									<select class="form-control" name="pposteriores_prono">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td><td>
									<select class="form-control" name="pposteriores_cuadrupedo">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td><td>
									<select class="form-control" name="pposteriores_sedente">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td><td>
									<select class="form-control" name="pposteriores_rodillas">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td>
								<td>
									<select class="form-control" name="pposteriores_bipedo">
										<option value="SI">SI</option>
										<option value="NO">NO</option>
										<option value="No aplica">No aplica</option>
									</select>
								</td>
							</tr>
						</table>
					</article>
					<article class="col-xs-6">
						<label for="">Valoración Movilidad Articular:</label>
						<textarea class="form-control" name="vma" rows="5" id="comment" ></textarea>
					</article>
			 </section>
			</section>
			<section class="panel-body"> <!--Anamnesis-->
				<div class="botonhc">
						<a data-toggle="collapse" class="ac" data-target="#VME" >VALORACION MUSCULAR (Evaluación Pediatrica segun Daniels- Worthinghams)</a>
						<span class="glyphicon glyphicon-arrow-down"></span>
						<span class="badge">OK</span>
				</div>
				<section class="collapse" id="VME">
					<article class="col-xs-6">
						<label for="">Extensión del cuello:</label>
						<select class="form-control" name="vme1">
							<option value="5">Normal</option>
							<option value="4">Bien</option>
							<option value="3">Regular</option>
							<option value="2">Mal</option>
							<option value="1">Actividad Escasa</option>
							<option value="0">Nula</option>
						</select>
					</article>
					<article class="col-xs-6">
						<label for="">Flexión del cuello:</label>
						<select class="form-control" name="vme2">
							<option value="5">Normal</option>
							<option value="4">Bien</option>
							<option value="3">Regular</option>
							<option value="2">Mal</option>
							<option value="1">Actividad Escasa</option>
							<option value="0">Nula</option>
						</select>
					</article>
					<article class="col-xs-6">
						<label for="">Flexión del tronco:</label>
						<select class="form-control" name="vme3">
							<option value="5">Normal</option>
							<option value="4">Bien</option>
							<option value="3">Regular</option>
							<option value="2">Mal</option>
							<option value="1">Actividad Escasa</option>
							<option value="0">Nula</option>
						</select>
					</article>
					<article class="col-xs-6">
						<label for="">Rotación del tronco:</label>
						<select class="form-control" name="vme4">
							<option value="5">Normal</option>
							<option value="4">Bien</option>
							<option value="3">Regular</option>
							<option value="2">Mal</option>
							<option value="1">Actividad Escasa</option>
							<option value="0">Nula</option>
						</select>
					</article>
					<article class="col-xs-6">
						<label for="">Extensión del tronco:</label>
						<select class="form-control" name="vme5">
							<option value="5">Normal</option>
							<option value="4">Bien</option>
							<option value="3">Regular</option>
							<option value="2">Mal</option>
							<option value="1">Actividad Escasa</option>
							<option value="0">Nula</option>
						</select>
					</article>
					<div class="col-xs-12">

					</div>
					<div class="col-xs-12">

					</div>
					<article class="col-xs-7">
					<table class="table table-bordered">
					<tr>
						<td id="th-estilo4">MOVIMIENTO</td>
						<td id="th-estilo4">DERECHO</td>
						<td id="th-estilo4">IZQUIERDO</td>
					</tr>
					<tr>
						<td>Flexión de cadera y rodilla</td>
						<td>
							<select class="form-control" name="vme6d">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>
								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
						<td>
							<select class="form-control" name="vme6i">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>
								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Extensión de cadera y rodilla</td>
						<td>
							<select class="form-control" name="vme7d">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>
								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
						<td>
							<select class="form-control" name="vme7i">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>
								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Abducción de la cadera</td>
						<td>
							<select class="form-control" name="vme8d">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>
								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
						<td>
							<select class="form-control" name="vme8i">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>

								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Aducción de la cadera</td>
						<td>
							<select class="form-control" name="vme9d">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>
								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
						<td>
							<select class="form-control" name="vme9i">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>

								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Plantiflexion</td>
						<td>
							<select class="form-control" name="vme1011d">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>
								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
						<td>
							<select class="form-control" name="vme1011i">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>

								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Dorsiflexion</td>
						<td>
							<select class="form-control" name="vme11d">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>
								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
						<td>
							<select class="form-control" name="vme11i">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>

								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Aducción escapular y del hombro</td>
						<td>
							<select class="form-control" name="vme12d">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>
								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
						<td>
							<select class="form-control" name="vme12i">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>

								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Flexión del hombro</td>
						<td>
							<select class="form-control" name="vme13d">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>
								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
						<td>
							<select class="form-control" name="vme13i">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>

								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Extensión del hombro</td>
						<td>
							<select class="form-control" name="vme14d">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>
								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
						<td>
							<select class="form-control" name="vme14i">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>

								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Flexión del codo</td>
						<td>
							<select class="form-control" name="vme15d">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>
								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
						<td>
							<select class="form-control" name="vme15i">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>

								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Extensión del codo</td>
						<td>
							<select class="form-control" name="vme16d">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>
								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
						<td>
							<select class="form-control" name="vme16i">
								<option value="5">Normal</option>
								<option value="4">Bien</option>
								<option value="3">Regular</option>
								<option value="2">Mal</option>
								<option value="1">Actividad Escasa</option>
								<option value="0">Nula</option>
							</select>
						</td>
					</tr>
					</table>
					</article>
					<article class="col-xs-3">
						<table class="table table-bordered">
							<tr>
								<td id="th-estilo2">
									Puntuación numérica
								</td>
								<td id="th-estilo2">
									Puntuación Cuantitativa
								</td>
							</tr>
							<tr>
								<td>
									5
								</td>
								<td>
									Normal
								</td>
							</tr>
							<tr>
								<td>
									4
								</td>
								<td>
									Bien
								</td>
							</tr>
							<tr>
								<td>
									3
								</td>
								<td>
									Regular
								</td>
							</tr>
							<tr>
								<td>
									2
								</td>
								<td>
									Mal
								</td>
								<tr>
									<td>
										1
									</td>
									<td>
										Actividad escasa
									</td>
								</tr>
								<tr>
									<td>
										0
									</td>
									<td>
										Nula
									</td>
								</tr>
							</tr>
						</table>
					</article>
			</section>
		 </section>
		 <section class="panel-body"> <!--Anamnesis-->
		 	<div class="botonhc">
		 			<a data-toggle="collapse" class="ac" data-target="#r" >RETRACCIONES / MEDIDAS</a>
		 			<span class="glyphicon glyphicon-arrow-down"></span>
		 			<span class="badge">OK</span>
		 	</div>
		 	<section class="collapse" id="r">
				<article class="col-xs-10">
					<label for="">Retracciones y deformidades articulares</label>
					<textarea class="form-control" name="retracciones" rows="5" id="comment" ></textarea>
				</article>
				<article class="col-xs-4 " id="th-estilo3">
					<h3>Medidas Reales</h3>
					<article class="col-xs-3">
							<label for="">MSD</label>
							<input type="text" name="mr_msd" value="" class="form-control">
					</article>
					<article class="col-xs-3">
							<label for="">MSI</label>
							<input type="text" name="mr_msi" value="" class="form-control">
					</article>
					<article class="col-xs-3">
							<label for="">MID</label>
							<input type="text" name="mr_midsd" value="" class="form-control">
					</article>
					<article class="col-xs-3">
							<label for="">MII</label>
							<input type="text" name="mr_mii" value="" class="form-control">
					</article>
				</article>
				<article class="col-xs-4 " id="th-estilo2">
					<h3>Medidas Aparentes</h3>
					<article class="col-xs-3">
							<label for="">MSD</label>
							<input type="text" name="mr_msd" value="" class="form-control">
					</article>
					<article class="col-xs-3">
							<label for="">MSI</label>
							<input type="text" name="mr_msi" value="" class="form-control">
					</article>
					<article class="col-xs-3">
							<label for="">MID</label>
							<input type="text" name="mr_midsd" value="" class="form-control">
					</article>
					<article class="col-xs-3">
							<label for="">MII</label>
							<input type="text" name="mr_mii" value="" class="form-control">
					</article>
				</article>
				<article class="col-xs-4" id="th-estilo1">
					<h3>Medidas de Atrofia</h3>
					<article class="col-xs-3">
							<label for="">MSD</label>
							<input type="text" name="mr_msd" value="" class="form-control">
					</article>
					<article class="col-xs-3">
							<label for="">MSI</label>
							<input type="text" name="mr_msi" value="" class="form-control">
					</article>
					<article class="col-xs-3">
							<label for="">MID</label>
							<input type="text" name="mr_midsd" value="" class="form-control">
					</article>
					<article class="col-xs-3">
							<label for="">MII</label>
							<input type="text" name="mr_mii" value="" class="form-control">
					</article>
				</article>
			</section>
		 </section>
		 <section class="panel-body"> <!--Anamnesis-->
		 	<div class="botonhc">
		 			<a data-toggle="collapse" class="ac" data-target="#p" >Patrones Fundamentales (Mc Clenaghan / Gallohue)</a>
		 			<span class="glyphicon glyphicon-arrow-down"></span>
		 			<span class="badge">OK</span>
		 	</div>
		 	<section class="collapse" id="p">
				<article class="col-xs-12">
					<table class="table table-bordered">
						<tr>
							<td>
								ESTADIO
							</td>
							<td colspan="3">
								CARRERA
							</td>
						</tr>
						<tr>
							<td>

							</td>
							<td class="col-xs-4">
								<label for="">Movimientos de las piernas (vista lateral)</label>
							</td>
							<td class="col-xs-4">
								<label for="">Movimientos de las piernas (vista posterior)</label>
							</td>
							<td class="col-xs-4">
								<label for="">Movimientos de los brazos</label>
							</td>
						</tr>
						<tr>
							<td rowspan="5">
								INICIAL
							</td>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<div class="col-xs-7">
									<p>Piernas rígidas</p>
								</div>
							</TD>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<div class="col-xs-7">
									<p>Movimiento de rodilla balanceado hasta realizar la posición de apoyo</p>
								</div>
							</TD>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<div class="col-xs-7">
									<p>Balanceo de brazos rígido, con distintos grados de flexión a nivel del codo</p>
								</div>
							</TD>
						</tr>
						<tr>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<p>paso desigual</p>
							</TD>
							<TD>
							  <div class="col-xs-5">
							    <select class="form-control " name="">
							      <option value="Presente">Presente</option>
							      <option value="No presente">No presente</option>
							    </select>
							  </div>
							  <div class="col-xs-7">
							  	<p>El pie que realiza el paso tiende a la rotación externa de cadera</p>
							  </div>
							</TD>
							<TD>
							  <div class="col-xs-5">
							    <select class="form-control " name="">
							      <option value="Presente">Presente</option>
							      <option value="No presente">No presente</option>
							    </select>
							  </div>
								<div class="col-xs-7">
							  	<p>Angulo de balanceo corto</p>
								</div>
							</TD>
						</tr>
						<tr>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<div class="col-xs-7">
									<p>base de sustentación amplia</p>
								</div>
							</TD>
							<TD>
							  <div class="col-xs-5">
							    <select class="form-control " name="">
							      <option value="Presente">Presente</option>
							      <option value="No presente">No presente</option>
							    </select>
							  </div>
							  <div class="col-xs-7">
							  <p>Estabilidad corporal cuando se realiza el apoyo</p>
							  </div>
							</TD>
							<TD>
							  <div class="col-xs-5">
							    <select class="form-control " name="">
							      <option value="Presente">Presente</option>
							      <option value="No presente">No presente</option>
							    </select>
							  </div>
								<div class="col-xs-7">
									<p>Balanceo de brazos tiende hacer extendido</p>
								</div>

							</TD>
						</tr>
						<tr>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<p>sin momento claro de despegue del suelo</p>
							</TD>
							<td colspan="2">

							</td>
						</tr>
						<tr>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<p>Movimiento corto y limitado</p>
							</TD>
							<td colspan="2">

							</td>
						</tr>
						<tr>
							<td>

							</td>
							<td class="col-xs-4">
								<label for="">Movimientos de las piernas (vista lateral)</label>
							</td>
							<td class="col-xs-4">
								<label for="">Movimientos de las piernas (vista posterior)</label>
							</td>
							<td class="col-xs-4">
								<label for="">Movimientos de los brazos</label>
							</td>
						</tr>
						<tr>
							<td rowspan="4">
								ELEMENTAL
							</td>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<div class="col-xs-7">
									<p>El paso se alarga</p>
								</div>
							</TD>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<div class="col-xs-7">
									<p>El pie que se adelanta rota a lo largo de la línea media antes de hacer el contacto</p>
								</div>
							</TD>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<div class="col-xs-7">
									<p>Brazos recorren mayor distancia en forma vertical</p>
								</div>
							</TD>
						</tr>
						<tr>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<p>La pierna aumenta desplazamiento y velocidad</p>
							</TD>
							<TD>

							</TD>
							<TD>
							  <div class="col-xs-5">
							    <select class="form-control " name="">
							      <option value="Presente">Presente</option>
							      <option value="No presente">No presente</option>
							    </select>
							  </div>
								<div class="col-xs-7">
							  	<p>Movimiento horizontal limitado al aumentar el largo del paso</p>
								</div>
							</TD>
						</tr>
						<tr>
							<td>
								<div class="col-xs-5">
							    <select class="form-control " name="">
							      <option value="Presente">Presente</option>
							      <option value="No presente">No presente</option>
							    </select>
							  </div>
								<div class="col-xs-7">
							  	<p>Fase de despegue definida</p>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-xs-5">
							    <select class="form-control " name="">
							      <option value="Presente">Presente</option>
							      <option value="No presente">No presente</option>
							    </select>
							  </div>
								<div class="col-xs-7">
							  	<p>Mayor extensión en pierna de soporte al despegue del suelo</p>
								</div>
							</td>
						</tr>
						<tr>
							<td>

							</td>
							<td class="col-xs-4">
								<label for="">Movimientos de las piernas (vista lateral)</label>
							</td>
							<td class="col-xs-4">
								<label for="">Movimientos de las piernas (vista posterior)</label>
							</td>
							<td class="col-xs-4">
								<label for="">Movimientos de los brazos</label>
							</td>
						</tr>
						<tr>
							<td rowspan="4">
								MADURO
							</td>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<div class="col-xs-7">
									<p>Se evidencia altura en la rodilla al dirigirse hacia adelante</p>
								</div>
							</TD>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<div class="col-xs-7">
									<p>Rotación de rodilla y pie al volver hacia adelante</p>
								</div>
							</TD>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<div class="col-xs-7">
									<p>Balanceo de los brazos vertical en oposición a las piernas</p>
								</div>
							</TD>
						</tr>
						<tr>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<p>Pierna de apoyo se inclina levemente cuando la otra hace contacto con el suelo</p>
							</TD>
							<TD>
								<div class="col-xs-5">
							    <select class="form-control " name="">
							      <option value="Presente">Presente</option>
							      <option value="No presente">No presente</option>
							    </select>
							  </div>
								<div class="col-xs-7">
							  	<p>Aumento en el tamaño del paso</p>
								</div>
							</TD>
							<TD>
							  <div class="col-xs-5">
							    <select class="form-control " name="">
							      <option value="Presente">Presente</option>
							      <option value="No presente">No presente</option>
							    </select>
							  </div>
								<div class="col-xs-7">
							  	<p>Flexionados a la altura de los codos en ángulo recto</p>
								</div>
							</TD>
						</tr>
						<tr>
							<td>
								<div class="col-xs-5">
							    <select class="form-control " name="">
							      <option value="Presente">Presente</option>
							      <option value="No presente">No presente</option>
							    </select>
							  </div>
								<div class="col-xs-7">
							  	<p>Extensión rápida de cadera, rodilla y tobillo</p>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-xs-5">
							    <select class="form-control " name="">
							      <option value="Presente">Presente</option>
							      <option value="No presente">No presente</option>
							    </select>
							  </div>
								<div class="col-xs-7">
							  	<p>Largo del paso y duración del tiempo en suspensión se intensifican al máximo</p>
								</div>
							</td>
						</tr>
					</table>
				</article>

				<article class="col-xs-12">
					<table class="table table-bordered">
						<tr>
							<td>
								ESTADIO
							</td>
							<td colspan="3">
								SALTO
							</td>
						</tr>
						<tr>
							<td>

							</td>
							<td class="col-xs-4">
								<label for="">Movimientos de las piernas (vista lateral)</label>
							</td>
							<td class="col-xs-4">
								<label for="">Movimientos de las piernas (vista posterior)</label>
							</td>
							<td class="col-xs-4">
								<label for="">Movimientos de los brazos</label>
							</td>
						</tr>
						<tr>
							<td rowspan="5">
								INICIAL
							</td>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<div class="col-xs-7">
									<p>Piernas rígidas</p>
								</div>
							</TD>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<div class="col-xs-7">
									<p>Movimiento de rodilla balanceado hasta realizar la posición de apoyo</p>
								</div>
							</TD>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<div class="col-xs-7">
									<p>Balanceo de brazos rígido, con distintos grados de flexión a nivel del codo</p>
								</div>
							</TD>
						</tr>
						<tr>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<p>paso desigual</p>
							</TD>
							<TD>
							  <div class="col-xs-5">
							    <select class="form-control " name="">
							      <option value="Presente">Presente</option>
							      <option value="No presente">No presente</option>
							    </select>
							  </div>
							  <div class="col-xs-7">
							  	<p>El pie que realiza el paso tiende a la rotación externa de cadera</p>
							  </div>
							</TD>
							<TD>
							  <div class="col-xs-5">
							    <select class="form-control " name="">
							      <option value="Presente">Presente</option>
							      <option value="No presente">No presente</option>
							    </select>
							  </div>
								<div class="col-xs-7">
							  	<p>Angulo de balanceo corto</p>
								</div>
							</TD>
						</tr>
						<tr>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<div class="col-xs-7">
									<p>base de sustentación amplia</p>
								</div>
							</TD>
							<TD>
							  <div class="col-xs-5">
							    <select class="form-control " name="">
							      <option value="Presente">Presente</option>
							      <option value="No presente">No presente</option>
							    </select>
							  </div>
							  <div class="col-xs-7">
							  <p>Estabilidad corporal cuando se realiza el apoyo</p>
							  </div>
							</TD>
							<TD>
							  <div class="col-xs-5">
							    <select class="form-control " name="">
							      <option value="Presente">Presente</option>
							      <option value="No presente">No presente</option>
							    </select>
							  </div>
								<div class="col-xs-7">
									<p>Balanceo de brazos tiende hacer extendido</p>
								</div>

							</TD>
						</tr>
						<tr>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<p>sin momento claro de despegue del suelo</p>
							</TD>
							<td colspan="2">

							</td>
						</tr>
						<tr>
							<TD>
								<div class="col-xs-5">
									<select class="form-control " name="">
										<option value="Presente">Presente</option>
										<option value="No presente">No presente</option>
									</select>
								</div>
								<p>Movimiento corto y limitado</p>
							</TD>
							<td colspan="2">

							</td>
						</tr>
					</table>
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
