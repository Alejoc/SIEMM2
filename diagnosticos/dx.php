<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <script src="/js/j2.js"></script>
  <script src="/js/j1.js"></script>
  <script type="text/javascript">
$(function() {
            $("#codigo").autocomplete({
                source: "diagnosticos/querydx.php",
                minLength: 1,
                select: function(event, ui) {
					event.preventDefault();
          $('#codigo').val(ui.item.codigo);
					$('#descripcion').val(ui.item.descripcion);
			     }
            });
		});
</script>

</head>
<body>
  <div class="col-lg-12">
    <article class="col-xs-9">
      <input id="codigo" class="form-control" name="cdxp" placeholder="Digite Código Dx Principal  para Busqueda">
      <input id="descripcion" class="form-control" name="descridxp" readonly>
      </article>
    <article class="col-xs-3">
      <select class="col-xs-3 form-control" name="tdxp" required="">
        <option value=""></option>
        <option value="Impresion diagnostica">Impresion diagnostica</option>
        <option value="Confirmado nuevo">Confirmado nuevo</option>
        <option value="Confirmado repetido">Confirmado repetido</option>
      </select>
    </article>

</div>
</body>
</html>
