<div class="botonhc"id="th-estilo1">
    <a data-toggle="collapse" class="ac" data-target="#datpac" >Datos del Paciente</a> <span class="glyphicon glyphicon-arrow-down"></span>
</div>
  <section class="collapse" id="datpac">
    <section class="panel-body"><!--section de eps-->
      <article class="col-xs-4 text-center">
        <label for="">Nombre Completo:</label>
        <input type="text" name="nompac" class="form-control text-center" value="<?php echo $fila["nom1"];?> <?php echo $fila["nom2"];?> <?php echo $fila["ape1"];?> <?php echo $fila["ape2"];?>"<?php echo $atributo3;?>/>
      </article>
      <article class="col-xs-3">
        <label for="">Identificación:</label>
        <input type="text" name="identificacion" class="form-control text-center" value="<?php echo $fila["tdoc_pac"];?> <?php echo $fila["doc_pac"];?>"<?php echo $atributo3;?>/>
      </article>
      <article class="col-xs-5">
        <label for="">Edad:</label>
        <input type="text" name="edad" class="form-control text-center" value="<?php echo $fila["edad"];?> <?php echo $fila["descripuedad"];?> Fecha nacimiento: <?php echo $fila["fnacimiento"];?>"<?php echo $atributo3;?>/>
      </article>
      <article class="col-xs-4">
        <label for="">Genero:</label>
        <input type="text" name="nompac" class="form-control text-center" value="<?php echo $fila["genero"];?>" <?php echo $atributo3;?>/>
      </article>
      <article class="col-xs-3">
        <label for="">Rh:</label>
        <input type="text" name="nompac" class="form-control text-center" value="<?php echo $fila["rh"];?>" <?php echo $atributo3;?>/>
      </article>
      <article class="col-xs-5">
        <label for="">Email:</label>
        <input type="text" name="nompac" class="form-control text-center" value="<?php echo $fila["email_pac"];?>" <?php echo $atributo3;?>/>
      </article>
      <article class="col-xs-5">
        <label for="">Dirección:</label>
        <input type="text" name="nompac" class="form-control text-center" value="<?php echo $fila["dir_pac"];?>" <?php echo $atributo3;?>/>
      </article>
      <article class="col-xs-3">
        <label for="">Teléfono:</label>
        <input type="text" name="nompac" class="form-control text-center" value="<?php echo $fila["tel_pac"];?>" <?php echo $atributo3;?>/>
      </article>
      <article class="col-xs-3">
        <label for="">Estado Civil:</label>
        <input type="text" name="nompac" class="form-control text-center" value="<?php echo $fila["descripestadoc"];?>" <?php echo $atributo3;?>/>
      </article>
      <article class="col-xs-3">
        <label for="">Lateralidad:</label>
        <input type="text" name="nompac" class="form-control text-center" value="<?php echo $fila["lateralidad"];?>"<?php echo $atributo3;?>/>
      </article>
      <article class="col-xs-3">
        <label for="">Religión:</label>
        <input type="text" name="nompac" class="form-control text-center" value="<?php echo $fila["religion"];?>"<?php echo $atributo3;?>/>
      </article>
      <article class="col-xs-2">
        <label  for="">ID:</label>
        <input type="text"  name="idadmhosp" class="form-control" value="<?php echo $fila["id_adm_hosp"];?>"<?php echo $atributo2;?>/>
      </article>
      <article class="col-xs-3">
        <label for="">Fecha y Hora Ingreso:</label>
        <input type="text" name="fhingreso" class="form-control" value="<?php echo $fila["fingreso_hosp"];?>  <?php echo $fila["hingreso_hosp"];?>"<?php echo $atributo2?>/>
      </article>
      <article class="col-xs-4">
        <label for="">EPS:</label>
        <input type="text" name="fhingreso" class="form-control" value="<?php echo $fila["nom_eps"];?>"<?php echo $atributo2?>/>
      </article>
      
    </section>
  </section>
