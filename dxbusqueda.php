<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="css/jquery-ui.css" media="screen" title="no title" charset="utf-8">
    <script src="js/jquery-3.1.1.min.js" charset="utf-8"></script>
    <script src="js/jquery-ui.min.js" charset="utf-8"></script>
    <script type="text/javascript">
  $('document').ready(function() {
        $('#buscardx').autocomplete({
          source : 'busdx.php'
        });
        $('#buscardx1').autocomplete({
          source : 'busdx.php'
        });
        $('#buscardx2').autocomplete({
          source : 'busdx.php'
        });
        $('#buscardx3').autocomplete({
          source : 'busdx.php'
        });

      });
    </script>
  </head>
  <body>
<section class="panel-body">
      <table class="table table-bordered">
        <tr>
          <td class="text-center alert alert-danger"><strong>SELECCION DE DIAGNOSTICO</strong></td>
          <td class="text-center alert alert-danger"><strong>TIPO DIAGNOSTICO</strong></td>
        </tr>
        <tr>
            <td class="alert-info">
              <label for="">Diagnostico Principal</label>
              <input type="text" name="dx" class="form-control" value="" id="buscardx">
            </td>
            <td class="alert-info">
              <label for=""></label>
              <select class="form-control" name="tdx">
                <option value=""></option>
                <option value="Impresion Diagnostica">Impresion Diagnostica</option>
                <option value="Confirmado Nuevo">Confirmado Nuevo</option>
                <option value="Confirmado Repetido">Confirmado Repetido</option>
              </select>
            </td>
        </tr>
        <tr>
          <td class="alert-warning">
            <label for="">Diagnostico Relacionado 1</label>
            <input type="text" name="dx1" class="form-control" value="" id="buscardx1">
          </td>
          <td class="alert-warning">
            <select class="form-control" name="tdx1">
              <option value=""></option>
              <option value="Impresion Diagnostica">Impresion Diagnostica</option>
              <option value="Confirmado Nuevo">Confirmado Nuevo</option>
              <option value="Confirmado Repetido">Confirmado Repetido</option>
            </select>
          </td>
        </tr>
        <tr>
          <td class="alert-info">
            <label for="">Diagnostico Relacionado 2</label>
            <input type="text" name="dx2" class="form-control" value="" id="buscardx2">
          </td>
          <td class="alert-info">
            <select class="form-control" name="tdx2">
              <option value=""></option>
              <option value="Impresion Diagnostica">Impresion Diagnostica</option>
              <option value="Confirmado Nuevo">Confirmado Nuevo</option>
              <option value="Confirmado Repetido">Confirmado Repetido</option>
            </select>
          </td>
        </tr>
        <tr>
          <td class="alert-warning">
            <label for="">Diagnostico Relacionado 3</label>
            <input type="text" name="dx3" class="form-control" value="" id="buscardx3">
          </td>
          <td class="alert-warning">
            <select class="form-control" name="tdx3">
              <option value=""></option>
              <option value="Impresion Diagnostica">Impresion Diagnostica</option>
              <option value="Confirmado Nuevo">Confirmado Nuevo</option>
              <option value="Confirmado Repetido">Confirmado Repetido</option>
            </select>
          </td>
        </tr>
      </table>
  </section>
  </body>
</html>
