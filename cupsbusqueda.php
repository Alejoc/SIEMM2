<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="css/jquery-ui.css" media="screen" title="no title" charset="utf-8">
    <script src="js/jquery-3.1.1.min.js" charset="utf-8"></script>
    <script src="js/jquery-ui.min.js" charset="utf-8"></script>
    <script type="text/javascript">
  $('document').ready(function() {
        $('#buscar').autocomplete({
          source : 'buscups.php'
        });
        $('#buscar1').autocomplete({
          source : 'buscups.php'
        });
        $('#buscar2').autocomplete({
          source : 'buscups.php'
        });
        $('#buscar3').autocomplete({
          source : 'buscups.php'
        });
        $('#buscar4').autocomplete({
          source : 'buscups.php'
        });
        $('#buscar5').autocomplete({
          source : 'buscups.php'
        });
        $('#buscar6').autocomplete({
          source : 'buscups.php'
        });
        $('#buscar7').autocomplete({
          source : 'buscups.php'
        });
        $('#buscar8').autocomplete({
          source : 'buscups.php'
        });
      });
    </script>
  </head>
  <body>

      <table class="table table-bordered">
        <tr>
          <td class="text-center alert alert-danger"><strong>SELECCION DE PROCEDIMIENTO</strong></td>
          <td class="text-center alert alert-danger"><strong>OBSERVACIONES</strong></td>
        </tr>
        <tr>
            <td class="alert-info">
              <label for="">1.</label>
              <input type="text" name="cups" class="form-control" value="" id="buscar">
            </td>
            <td class="alert-info">
              <textarea name="obs_proc" rows="2" class="form-control"></textarea>
            </td>
        </tr>
        <tr>
          <td class="alert-warning">
            <label for="">2.</label>
            <input type="text" name="cups1" class="form-control" value="" id="buscar1">
          </td>
          <td class="alert-warning">
            <textarea name="obs_proc1" rows="2" class="form-control"></textarea>
          </td>
        </tr>
        <tr>
          <td class="alert-info">
            <label for="">3.</label>
            <input type="text" name="cups2" class="form-control" value="" id="buscar2">
          </td>
          <td class="alert-info">
            <textarea name="obs_proc2" rows="2" class="form-control"></textarea>
          </td>
        </tr>
        <tr>
          <td class="alert-warning">
            <label for="">4.</label>
            <input type="text" name="cups3" class="form-control" value="" id="buscar3">
          </td>
          <td class="alert-warning">
            <textarea name="obs_proc3" rows="2" class="form-control"></textarea>
          </td>
        </tr>
        <tr>
          <td  class="alert-info">
            <label for="">5.</label>
            <input type="text" name="cups4" class="form-control" value="" id="buscar4">
          </td>
          <td class="alert-info">
            <textarea name="obs_proc4" rows="2" class="form-control"></textarea>
          </td>
        </tr>
        <tr>
          <td class="alert-warning">
            <label for="">6.</label>
            <input type="text" name="cups5" class="form-control" value="" id="buscar5">
          </td>
          <td class="alert-warning">
            <textarea name="obs_proc5" rows="2" class="form-control"></textarea>
          </td>
        </tr>
        <tr>
          <td class="alert-info">
            <label for="">7.</label>
            <input type="text" name="cups6" class="form-control" value="" id="buscar6">
          </td>
          <td class="alert-info">
            <textarea name="obs_proc6" rows="2" class="form-control"></textarea>
          </td>
        </tr>
        <tr>
          <td class="alert-warning">
            <label for="">8.</label>
            <input type="text" name="cups7" class="form-control" value="" id="buscar7">
          </td>
          <td class="alert-warning">
            <textarea name="obs_proc7" rows="2" class="form-control"></textarea>
          </td>
        </tr>

      </table>
      </section>
  </body>
</html>
