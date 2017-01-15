<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript">
$(function() {
            $("#codigo").autocomplete({
                source: "ordenes_medica/queryodambu7.php",
                minLength: 2,
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
    <article class="col-xs-12">
      <input id="codigo" class="form-control" name="codcups7" placeholder="Digite procedimiento">
      <input id="descripcion" class="form-control" name="desccups7" readonly>
    </article>
  </div>
</body>
</html>
