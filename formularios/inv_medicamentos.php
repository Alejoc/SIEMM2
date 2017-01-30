<form action="<?php echo PROGRAMA.'?&opcion=89';?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">

	<article>
		<h4 id="th-estilot">Registro de inventario Medicamentos</h4>
		<section class="panel-body text-center">
			<section class="panel-body text-center"><!--section de eps-->
	      <article class="col-xs-4 text-center">
	        <label for="">Nombre Bodega:</label>
	        <input type="text" name="nompac" class="form-control text-center" value="<?php echo $fila["nom_bodega"];?>" <?php echo $atributo1;?>/>
					<input type="hidden" name="idb" value="<?php echo $fila["id_bodega"];?>">
	      </article>
	      <article class="col-xs-3">
	        <label for="">Tipo bodega:</label>
	        <input type="text" name="identificacion" class="form-control text-center" value="<?php echo $fila["tipo_bodega"];?>"<?php echo $atributo1;?>/>
	      </article>
	      <article class="col-xs-7">
	        <label for="">Sede a la que pertenece la bodega:</label>
	        <input type="text" name="edad" class="form-control text-center" value="<?php echo $fila["nom_sedes"];?>"<?php echo $atributo1;?>/>
	      </article>
	    </section>
		</section>
	<section class="panel-body"> <!--evolucion to-->
			<article class="col-xs-3">
				<label for="">Codigo ATC:</label>
				<input type="text" name="cod_atc" value="" class="form-control" <?php echo $atributo2;?>>
			</article>
			<article class="col-xs-7">
				<label for="">Descripcion ATC</label>
				<input type="text" name="descrip_atc" value="" class="form-control">
			</article>
			<article class="col-xs-5">
				<label for="">Principio Activo:</label>
				<textarea class="form-control" name="prin_activo" rows="3"  required ></textarea>
			</article>
			<article class="col-xs-3">
				<label for="">Concentracion:</label>
				<input type="text" name="concentracion" value="" class="form-control">
			</article>
			<article class="col-xs-3">
				<label for="">Presentacion:</label>
				<select class="form-control" name="presentacion">
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
		</section>
		<section class="panel-body">
			<article class="col-xs-3">
				<label for="">Clasificacion POS/NO POS:</label>
				<select class="form-control" name="clas_pos">
					<option value=""></option>
					<option value="POS">POS</option>
					<option value="NO POS">NO POS</option>
				</select>
			</article>
			<article class="col-xs-3">
				<label for="">Clasificacion Controlado:</label>
				<select class="form-control" name="clas_controlado">
					<option value=""></option>
					<option value="SI">SI</option>
					<option value="NO">NO</option>
				</select>
			</article>
			<article class="col-xs-3">
				<label for="">Clasificacion Psiquiatrico:</label>
				<select class="form-control" name="clas_psiquiatrico">
					<option value=""></option>
					<option value="SI">SI</option>
					<option value="NO">NO</option>
				</select>
			</article>
			<article class="col-xs-3">
				<label for="">Clasificacion Regulado:</label>
				<select class="form-control" name="clas_regulado">
					<option value=""></option>
					<option value="SI">SI</option>
					<option value="NO">NO</option>
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
				<input type="text" class="form-control" name="reg_invima" value="">
			</article>
			<article class="col-xs-3">
				<label for="">Laboratorio:</label>
				<select class="form-control" name="laboratorio" required="">
					<option value=""></option>
					<option value="	ECAR	Laboratorios Ecar S.A.	">	ECAR	 | 	Laboratorios Ecar S.A.	</option>
					<option value="ELI LILLY	Eli Lilly Interamerica Inc.	">	ELI LILLY	 | 	Eli Lilly Interamerica Inc.	</option>
					<option value="ELIMERA	Dermacare S.A.	">	ELIMERA	 | 	Dermacare S.A.	</option>
					<option value="ESCOVAR	Laboratorios Escovar S.A.S.	">	ESCOVAR	 | 	Laboratorios Escovar S.A.S.	</option>
					<option value="ETYC	Laboratorios Etyc LTDA	">	ETYC	 | 	Laboratorios Etyc LTDA	</option>
					<option value="EURODRUG	Eurodrug Laboratories	">	EURODRUG	 | 	Eurodrug Laboratories	</option>
					<option value="EUROETIKA	Euroetika LTDA	">	EUROETIKA	 | 	Euroetika LTDA	</option>
					<option value="F N ESTUPEFAC.	Fondo Nacional de Estupefacientes	">	F N ESTUPEFAC.	 | 	Fondo Nacional de Estupefacientes	</option>
					<option value="FAES FARMA	Faes Farma S.A.S.	">	FAES FARMA	 | 	Faes Farma S.A.S.	</option>
					<option value="FARMA COLOMBIA	Farma de Colombia S.A.	">	FARMA COLOMBIA	 | 	Farma de Colombia S.A.	</option>
					<option value="FARMASER	Farmaser S.A.	">	FARMASER	 | 	Farmaser S.A.	</option>
					<option value="FINLAY	Laboratorios Finlay de Colombia S.A.	">	FINLAY	 | 	Laboratorios Finlay de Colombia S.A.	</option>
					<option value="GALENO QUIMICA	Galeno Qui­mica S.A.	">	GALENO QUIMICA	 | 	Galeno Qui­mica S.A.	</option>
					<option value="GARDEN HOUSE	Laboratorios Garden House Colombia S.A.S.	">	GARDEN HOUSE	 | 	Laboratorios Garden House Colombia S.A.S.	</option>
					<option value="GARMISCH	Garmisch Pharmaceutical S.A.	">	GARMISCH	 | 	Garmisch Pharmaceutical S.A.	</option>
					<option value="GENFAR	Genfar S.A.	">	GENFAR	 | 	Genfar S.A.	</option>
					<option value="GIMED	Global International Medicine S.A.S.	">	GIMED	 | 	Global International Medicine S.A.S.	</option>
					<option value="GLAXOSMITHKLINE	GlaxoSmithKline Colombia S.A.	">	GLAXOSMITHKLINE	 | 	GlaxoSmithKline Colombia S.A.	</option>
					<option value="GRUINFACOL	Gruinfacol S.A.	">	GRUINFACOL	 | 	Gruinfacol S.A.	</option>
					<option value="GRiNENTHAL	Gri¼nenthal Colombiana S.A.	">	GRiNENTHAL	 | 	Gri¼nenthal Colombiana S.A.	</option>
					<option value="GRUPO LACTALIS		">	GRUPO LACTALIS	 | 		</option>
					<option value="GRUPO UNIPHARM	Laboratorios UNI S.A.	">	GRUPO UNIPHARM	 | 	Laboratorios UNI S.A.	</option>
					<option value="GYNOPHARM		">	GYNOPHARM	 | 		</option>
					<option value="HB HUMAN BIOSC	HB Human BioScience S.A.S.	">	HB HUMAN BIOSC	 | 	HB Human BioScience S.A.S.	</option>
					<option value="HUMAX	Humax Pharmaceutical S.A.	">	HUMAX	 | 	Humax Pharmaceutical S.A.	</option>
					<option value="INCOBRA	Laboratorios Incobra S.A.	">	INCOBRA	 | 	Laboratorios Incobra S.A.	</option>
					<option value="INMUNOSYN		">	INMUNOSYN	 | 		</option>
					<option value="IPEF	Internacional Perfumeri­a y Esp.Farmaceuticas S.A.S	">	IPEF	 | 	Internacional Perfumeri­a y Esp.Farmaceuticas S.A.S	</option>
					<option value="ISDIN	Isdin Colombia S.A.S.	">	ISDIN	 | 	Isdin Colombia S.A.S.	</option>
					<option value="ISIS PHARMA SAS		">	ISIS PHARMA SAS	 | 		</option>
					<option value="JANSSEN-CILAG	Janssen-Cilag S.A.	">	JANSSEN-CILAG	 | 	Janssen-Cilag S.A.	</option>
					<option value="JGB	JGB S.A.	">	JGB	 | 	JGB S.A.	</option>
					<option value="JULEPS	Juleps Pharma Ltda. Laboratorios	">	JULEPS	 | 	Juleps Pharma Ltda. Laboratorios	</option>
					<option value="KEVIPHARMA	Kevipharma Laboratorio Farmaceutico LTDA.	">	KEVIPHARMA	 | 	Kevipharma Laboratorio Farmaceutico LTDA.	</option>
					<option value="LA SANTE	Laboratorios La Sante S.A.	">	LA SANTE	 | 	Laboratorios La Sante S.A.	</option>
					<option value="LABINCO	Laboratorio Internacional de Colombia S.A.S.	">	LABINCO	 | 	Laboratorio Internacional de Colombia S.A.S.	</option>
					<option value="LACICO	Laboratorio Cienti­fico Colombiano S.A.	">	LACICO	 | 	Laboratorio Cienti­fico Colombiano S.A.	</option>
					<option value="LAFONT	Laboratorios Lafont de Colombia Ltda.	">	LAFONT	 | 	Laboratorios Lafont de Colombia Ltda.	</option>
					<option value="LAFRANCOL		">	LAFRANCOL	 | 		</option>
					<option value="LEGRAND	Laboratorios Legrand S.A.	">	LEGRAND	 | 	Laboratorios Legrand S.A.	</option>
					<option value="LICOL	Laboratorios Licol S.A.S.	">	LICOL	 | 	Laboratorios Licol S.A.S.	</option>
					<option value="LILLY		">	LILLY	 | 		</option>
					<option value="LUGOVA	Lugova S.A.	">	LUGOVA	 | 	Lugova S.A.	</option>
					<option value="LUNDBECK	Lundbeck Colombia SAS	">	LUNDBECK	 | 	Lundbeck Colombia SAS	</option>
					<option value="MAH	Mah Colombia S.A.S.	">	MAH	 | 	Mah Colombia S.A.S.	</option>
					<option value="MEAD JOHNSON	Mead Johnson Nutrition Colombia Ltda.	">	MEAD JOHNSON	 | 	Mead Johnson Nutrition Colombia Ltda.	</option>
					<option value="MEDIVELIUS	Medivelius farmaceutica S.A.	">	MEDIVELIUS	 | 	Medivelius farmaceutica S.A.	</option>
					<option value="MERCK S.A.	Merck KGaA Alemania	">	MERCK S.A.	 | 	Merck KGaA Alemania	</option>
					<option value="MEREY	Laboratorio Merey Ltda.	">	MEREY	 | 	Laboratorio Merey Ltda.	</option>
					<option value="MINERALIN	Laboratorios Mineralin S.A.S.	">	MINERALIN	 | 	Laboratorios Mineralin S.A.S.	</option>
					<option value="MK	Tecnoqui­micas S.A.	">	MK	 | 	Tecnoqui­micas S.A.	</option>
					<option value="MK FEMME		">	MK FEMME	 | 		</option>
					<option value="MK VISION		">	MK VISION	 | 		</option>
					<option value="MSD	Merck Sharp & Dohme Colombia S.A.S.	">	MSD	 | 	Merck Sharp & Dohme Colombia S.A.S.	</option>
					<option value="MUNDIPHARMA	Mundipharma Colombia SAS	">	MUNDIPHARMA	 | 	Mundipharma Colombia SAS	</option>
					<option value="NATURAL FRESHLY	Lab. Natural Freshly, Infabo S.A.	">	NATURAL FRESHLY	 | 	Lab. Natural Freshly, Infabo S.A.	</option>
					<option value="NESTLE	Nestle de Colombia S.A.	">	NESTLE	 | 	Nestle de Colombia S.A.	</option>
					<option value="NEVOX FARMA	Nevox Farma, S.A.	">	NEVOX FARMA	 | 	Nevox Farma, S.A.	</option>
					<option value="NOVAMED	Novamed S.A.	">	NOVAMED	 | 	Novamed S.A.	</option>
					<option value="NOVARTIS	Novartis de Colombia S.A.	">	NOVARTIS	 | 	Novartis de Colombia S.A.	</option>
					<option value="NOVARTIS OPHT.	Novartis de Colombia S.A.	">	NOVARTIS OPHT.	 | 	Novartis de Colombia S.A.	</option>
					<option value="NOVO NORDISK	Novo Nordisk Colombia S.A.S.	">	NOVO NORDISK	 | 	Novo Nordisk Colombia S.A.S.	</option>
					<option value="OMRON	Represander S.A.	">	OMRON	 | 	Represander S.A.	</option>
					<option value="OPHARM	Opharm Ltda.	">	OPHARM	 | 	Opharm Ltda.	</option>
					<option value="PARMALAT	Parmalat Colombia Ltda.	">	PARMALAT	 | 	Parmalat Colombia Ltda.	</option>
					<option value="PFIZER	Pfizer S.A.S.	">	PFIZER	 | 	Pfizer S.A.S.	</option>
					<option value="PISA	Pisa Farmaceutica de Colombia S.A.	">	PISA	 | 	Pisa Farmaceutica de Colombia S.A.	</option>
					<option value="PROBYALA	Laboratorios Probyala	">	PROBYALA	 | 	Laboratorios Probyala	</option>
					<option value="PROCAPS	Procaps S.A.	">	PROCAPS	 | 	Procaps S.A.	</option>
					<option value="PROFMA	Profma E.U.	">	PROFMA	 | 	Profma E.U.	</option>
					<option value="PRONABELL	Laboratorios Pronabell S.A.S.	">	PRONABELL	 | 	Laboratorios Pronabell S.A.S.	</option>
					<option value="QUIDECA	Quideca S.A.	">	QUIDECA	 | 	Quideca S.A.	</option>
					<option value="QUIFARMACOS	Quifarmacos Laboratorios de Colombia S.A.	">	QUIFARMACOS	 | 	Quifarmacos Laboratorios de Colombia S.A.	</option>
					<option value="QUIRUMEDICAS	Quirumedicas Ltda.	">	QUIRUMEDICAS	 | 	Quirumedicas Ltda.	</option>
					<option value="RANDE	Laboratorios Rande SAS	">	RANDE	 | 	Laboratorios Rande SAS	</option>
					<option value="RECIPE	Laboratorios Bussie S.A.	">	RECIPE	 | 	Laboratorios Bussie S.A.	</option>
					<option value="ROBBIN	Laboratorios Robbin S.A.S.	">	ROBBIN	 | 	Laboratorios Robbin S.A.S.	</option>
					<option value="ROCHE	Productos Roche S.A.	">	ROCHE	 | 	Productos Roche S.A.	</option>
					<option value="ROEMMERS	Scandinavia Pharma Ltda.	">	ROEMMERS	 | 	Scandinavia Pharma Ltda.	</option>
					<option value="ROPSOHN	Ropsohn Therapeutics Ltda.	">	ROPSOHN	 | 	Ropsohn Therapeutics Ltda.	</option>
					<option value="SANOFI AVENTIS	Lab. Sanofi-Aventis de Colombia S.A.	">	SANOFI AVENTIS	 | 	Lab. Sanofi-Aventis de Colombia S.A.	</option>
					<option value="SANOFI-PASTEUR	Lab. Sanofi-Pasteur S.A.	">	SANOFI-PASTEUR	 | 	Lab. Sanofi-Pasteur S.A.	</option>
					<option value="SERES	Laboratorios Seres S.A.S.	">	SERES	 | 	Laboratorios Seres S.A.S.	</option>
					<option value="SHIRE COLOMBIA	Shire Colombia S.A.S.	">	SHIRE COLOMBIA	 | 	Shire Colombia S.A.S.	</option>
					<option value="SICFA		">	SICFA	 | 		</option>
					<option value="SICMAFARMA	Sicmafarma S.A.S.	">	SICMAFARMA	 | 	Sicmafarma S.A.S.	</option>
					<option value="SIEGFRIED	Laboratorios Siegfried S.A.S.	">	SIEGFRIED	 | 	Laboratorios Siegfried S.A.S.	</option>
					<option value="SISCOL FARMA	Isis Pharma Deramtologie S.A.S.	">	SISCOL FARMA	 | 	Isis Pharma Deramtologie S.A.S.	</option>
					<option value="SUNDOWN NAT.	Li­nea de Vitaminas Sundown Naturales	">	SUNDOWN NAT.	 | 	Li­nea de Vitaminas Sundown Naturales	</option>
					<option value="SYNTHESIS		">	SYNTHESIS	 | 		</option>
					<option value="TAKEDA	Takeda S.A.S.	">	TAKEDA	 | 	Takeda S.A.S.	</option>
					<option value="TECNOFARMA	Union de Vertices de Tecnofarma S.A.	">	TECNOFARMA	 | 	Union de Vertices de Tecnofarma S.A.	</option>
					<option value="TECNOQUIMICAS	Tecnoqui­micas S.A.	">	TECNOQUIMICAS	 | 	Tecnoqui­micas S.A.	</option>
					<option value="UNIPHARM		">	UNIPHARM	 | 		</option>
					<option value="VICTUS	Victus Inc.	">	VICTUS	 | 	Victus Inc.	</option>
					<option value="VITALIS	Vitalis S.A.C.I.	">	VITALIS	 | 	Vitalis S.A.C.I.	</option>
					<option value="ZAMBON	Zambon Colombia S.A.	">	ZAMBON	 | 	Zambon Colombia S.A.	</option>
				</select>
			</article>
			<article class="col-xs-3">
				<label for="">CUM:</label>
				<input type="text" class="form-control" name="cum" value="">
			</article>
			<article class="col-xs-2">
				<label for="">Precio compra:</label>
				<input type="text" class="form-control" name="precio_compra" value="0">
			</article>
			<article class="col-xs-2">
				<label for="">Cantidad total:</label>
				<input type="number" class="form-control" name="cantidad_total" value="0">
			</article>
			<article class="col-xs-2">
				<label for="">Cantidad X fraccion:</label>
				<input type="number" class="form-control" name="cantidad_fraccion" value="0">
			</article>
			<article class="col-xs-3">
				<label for="">Tipo de Fraccion:</label>
				<select class="form-control" name="tipo_unidad_f">
					<option value=""></option>
					<option value="Gotas">Gotas</option>
					<option value="PUFF">PUFF</option>
					<option value="No aplica">No aplica</option>
				</select>
			</article>
			<article class="col-xs-3">
				<label for="">Codigo de barras:</label>
				<input type="text" name="cod_barras" class="form-control" value="">
			</article>
			<article class="col-xs-3">
				<label for="">Semaforizacion:</label>
				<select class="form-control" name="semaforo" required="">
					<option value=""></option>
					<option value="Verde">Verde</option>
					<option value="Amarillo">Amarillo</option>
					<option value="Rojo">Rojo</option>
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
