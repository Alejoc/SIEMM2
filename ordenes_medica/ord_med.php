<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <script src="/js/j2.js"></script>
  <script src="/js/j1.js"></script>
  <script type="text/javascript">
$(function() {
            $("#codigo").autocomplete({
                source: "ordenes_medica/queryom.php",
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
      <input id="codigo" class="form-control" name="codom" placeholder="Busqueda de procedimientos medicos">
      <input id="descripcion" class="form-control" name="descriom" readonly>
    </article>
  </div>
</body>
</html>
