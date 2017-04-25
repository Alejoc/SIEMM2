<form action="<?php echo PROGRAMA.'?&opcion='.$return;?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
  <section class="panel panel-default">
    <section class="panel-body">
      <article class="col-xs-1">
  	  	<label for="">ID:</label>
  	  	<input type="text"  name="idpaci" class="form-control" value="<?php echo $_GET["idpac"];?>"<?php echo $atributo1;?>/>
  	  </article>
  	  <article class="col-xs-3">
  	  	<label for="">Fecha Presentación:</label>
  	  	<input type="datetime" name="fpresentacion" class="form-control" value="<?php echo date('Y-m-d H:i:s');?>"<?php echo $atributo1;?>>
      </article>
      <article class="col-xs-2">
  	  	<label for="">Tipo paciente:</label>
  	    <select class="form-control" name="tipo_paciente" required="">
  	  	  <option value=""></option>
          <option value="Cronico">Cronico</option>
          <option value="PHD">PHD</option>
          <option value="Puntual">Puntual</option>
          <option value="Ninguno">Ninguno</option>
  	  	</select>
  	  </article>
  	  <article class="col-xs-3">
  	  	<label for="">IPS que ordena:</label>
  	  	<input type="text" value="" name="ips_ordena"  class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" <?php echo $atributo2;?>/>
  	  </article>
  	  <article class="col-xs-3">
  	  	<label for="">Medico que ordena:</label>
  	  	<input type="text" value="" name="medico_ordena"  class="form-control" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" <?php echo $atributo2;?>/>
  	  </article>
  	  <article class="col-xs-12">
    		<?php include('dxindv.php');?>
    	</article>
    </section>
    <div class="row text-center">
		  <input type="submit" class="btn btn-primary" name="aceptar" Value="<?php echo $boton; ?>" />
			<input type="hidden" class="btn btn-primary" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
			<input type="hidden" class="btn btn-primary" name="operacion" Value="<?php echo $_GET["mante"];?>"/>
		</div>
  </section>
</form>
