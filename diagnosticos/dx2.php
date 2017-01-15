<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript">
$(function() {
            $("#codigo2").autocomplete({
                source: "diagnosticos/querydx2.php",
                minLength: 2,
                select: function(event, ui) {
					event.preventDefault();
          $('#codigo2').val(ui.item.codigo2);
					$('#descripcion2').val(ui.item.descripcion2);
			     }
            });
		});
</script>

</head>
<body>

  <div class="col-lg-12">
    <article class="col-xs-9">
      <input id="codigo2" class="form-control" name="cdx2" placeholder="Digite Código Dx Relacionado 2 para Busqueda">
      <input id="descripcion2" class="form-control" name="descridx2" readonly>
    </article>
    <article class="col-xs-3">
      <select class="col-xs-3 form-control" name="tdx2" >
        <option value=""></option>
        <option value="Impresion diagnostica">Impresion diagnostica</option>
        <option value="Confirmado nuevo">Confirmado nuevo</option>
        <option value="Confirmado repetido">Confirmado repetido</option>
      </select>
    </article>

  </div>
</body>
</html>
