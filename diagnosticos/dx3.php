<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript">
$(function() {
            $("#codigo3").autocomplete({
                source: "diagnosticos/querydx3.php",
                minLength: 2,
                select: function(event, ui) {
					event.preventDefault();
          $('#codigo3').val(ui.item.codigo3);
					$('#descripcion3').val(ui.item.descripcion3);
			     }
            });
		});
</script>

</head>
<body>
  <div class="col-lg-12">
    <article class="col-xs-9">
      <input id="codigo3" class="form-control" name="cdx3" placeholder="Digite Código Dx Relacionado 3 para Busqueda">
      <input id="descripcion3" class="form-control" name="descridx3" readonly>
      </article>
    <article class="col-xs-3">
      <select class="col-xs-3 form-control" name="tdx3" >
        <option value=""></option>
        <option value="Impresion diagnostica">Impresion diagnostica</option>
        <option value="Confirmado nuevo">Confirmado nuevo</option>
        <option value="Confirmado repetido">Confirmado repetido</option>
      </select>
    </article>
  </div>
</body>
</html>
