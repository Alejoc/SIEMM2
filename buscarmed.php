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
          source : 'busmed.php'
        });
        $('#buscar1').autocomplete({
          source : 'busmed.php'
        });
        $('#buscar2').autocomplete({
          source : 'busmed.php'
        });
        $('#buscar3').autocomplete({
          source : 'busmed.php'
        });
        $('#buscar4').autocomplete({
          source : 'busmed.php'
        });
      });
    </script>
  </head>
  <body>

      <section class="panel-body">
        <article class="col-xs-3">
          <label for="">Seleccione Medicamento:</label>
          <textarea name="producto1" class="form-control" rows="3" id="buscar"></textarea>
        </article>
        <article class="col-xs-2">
          <label for="">Via administracion:</label>
          <select class="col-xs-2 form-control"  name="via1">
            <option value=""></option>
            <option value="Via oral">Via oral</option>
            <option value="Via intravenosa">Via intravenosa</option>
            <option value="Via Intramuscular">Via Intramuscular</option>
            <option value="Via Cutanea">Via Cutanea</option>
            <option value="Via subcutanea">Via subcutanea</option>
            <option value="Via Sublingual">Via Sublingual</option>
            <option value="Via Rectal">Via Rectal</option>
          </select>
        </article>
        <article class="col-xs-2">
          <label for="">Frecuencia:</label>
          <select class="col-xs-2 form-control"  name="frecuencia">
            <option value=""></option>
            <option value="24 horas">24 horas</option>
            <option value="12 horas">12 horas</option>
            <option value="8 horas">8 horas</option>
            <option value="6 horas">6 horas</option>
            <option value="4 horas">4 horas</option>
            <option value="2 horas">2 horas</option>
            <option value="Unica">Unica</option>
          </select>
        </article>
        <article class="col-xs-1">
          <label for="">Dosis</label>
          <input type="number" name="d1_1" class="form-control" value="0">
        </article>
        <article class="col-xs-1">
          <label for="">Dosis</label>
          <input type="number" name="d2_1" class="form-control" value="0">
        </article>
        <article class="col-xs-1">
          <label for="">Dosis</label>
          <input type="number" name="d3_1" class="form-control" value="0">
        </article>
        <article class="col-xs-1">
          <label for="">Dosis</label>
          <input type="number" name="d4_1" class="form-control" value="0">
        </article>
        <article class="col-md-6">
          <label for="">Oservacion Medicamento:</label>
          <textarea name="obs_1" class="form-control" rows="3" ></textarea>
        </article>
      </section>

  <div class="botonhc">
      <a data-toggle="collapse" class="ac"  data-target="#med1" > Medicamento 2<span class="fa fa-plus"></span></a>
  </div>
  <section class="collapse" id="med1">
    <section class="panel-body">
      <article class="col-xs-3">
        <label for="">Seleccione Medicamento:</label>
        <textarea name="producto2" class="form-control" rows="3" id="buscar1" ></textarea>
      </article>
      <article class="col-xs-2">
        <label for="">Via administracion:</label>
        <select class="col-xs-2 form-control"  name="via2">
          <option value=""></option>
          <option value="Via oral">Via oral</option>
          <option value="Via intravenosa">Via intravenosa</option>
          <option value="Via Intramuscular">Via Intramuscular</option>
          <option value="Via Cutanea">Via Cutanea</option>
          <option value="Via subcutanea">Via subcutanea</option>
          <option value="Via Sublingual">Via Sublingual</option>
          <option value="Via Rectal">Via Rectal</option>
        </select>
      </article>
      <article class="col-xs-2">
        <label for="">Frecuencia:</label>
        <select class="col-xs-2 form-control"  name="frecuencia2">
          <option value=""></option>
          <option value="24 horas">24 horas</option>
          <option value="12 horas">12 horas</option>
          <option value="8 horas">8 horas</option>
          <option value="6 horas">6 horas</option>
          <option value="4 horas">4 horas</option>
          <option value="2 horas">2 horas</option>
          <option value="Unica">Unica</option>
        </select>
      </article>
      <article class="col-xs-1">
        <label for="">Dosis</label>
        <input type="number" name="d1_2" class="form-control" value="0">
      </article>
      <article class="col-xs-1">
        <label for="">Dosis</label>
        <input type="number" name="d2_2" class="form-control" value="0">
      </article>
      <article class="col-xs-1">
        <label for="">Dosis</label>
        <input type="number" name="d3_2" class="form-control" value="0">
      </article>
      <article class="col-xs-1">
        <label for="">Dosis</label>
        <input type="number" name="d4_2" class="form-control" value="0">
      </article>
      <article class="col-xs-3">
        <label for="">Oservacion Medicamento:</label>
        <textarea name="obs_2" class="form-control" rows="3" ></textarea>
      </article>
    </section>
  </section>
  <div class="botonhc">
      <a data-toggle="collapse" class="ac"  data-target="#med3" > Medicamento 3<span class="fa fa-plus"></span></a>
  </div>
  <section class="collapse" id="med3">
    <section class="panel-body">
      <article class="col-xs-3">
        <label for="">Seleccione Medicamento:</label>
        <textarea name="producto3" class="form-control" rows="3"  id="buscar2" ></textarea>
      </article>
      <article class="col-xs-2">
        <label for="">Via administracion:</label>
        <select class="col-xs-2 form-control"  name="via3">
          <option value=""></option>
          <option value="Via oral">Via oral</option>
          <option value="Via intravenosa">Via intravenosa</option>
          <option value="Via Intramuscular">Via Intramuscular</option>
          <option value="Via Cutanea">Via Cutanea</option>
          <option value="Via subcutanea">Via subcutanea</option>
          <option value="Via Sublingual">Via Sublingual</option>
          <option value="Via Rectal">Via Rectal</option>
        </select>
      </article>
      <article class="col-xs-2">
        <label for="">Frecuencia:</label>
        <select class="col-xs-2 form-control"  name="frecuencia3">
          <option value=""></option>
          <option value="24 horas">24 horas</option>
          <option value="12 horas">12 horas</option>
          <option value="8 horas">8 horas</option>
          <option value="6 horas">6 horas</option>
          <option value="4 horas">4 horas</option>
          <option value="2 horas">2 horas</option>
          <option value="Unica">Unica</option>
        </select>
      </article>
      <article class="col-xs-1">
        <label for="">Dosis</label>
        <input type="number" name="d1_3" class="form-control" value="0">
      </article>
      <article class="col-xs-1">
        <label for="">Dosis</label>
        <input type="number" name="d2_3" class="form-control" value="0">
      </article>
      <article class="col-xs-1">
        <label for="">Dosis</label>
        <input type="number" name="d3_3" class="form-control" value="0">
      </article>
      <article class="col-xs-1">
        <label for="">Dosis</label>
        <input type="number" name="d4_3" class="form-control" value="0">
      </article>
      <article class="col-xs-3">
        <label for="">Oservacion Medicamento:</label>
        <textarea name="obs_3" class="form-control" rows="3" ></textarea>
      </article>
    </section>
  </section>
  <div class="botonhc">
      <a data-toggle="collapse" class="ac"  data-target="#med45" > Medicamento 4<span class="fa fa-plus"></span></a>
  </div>
  <section class="collapse" id="med45">
    <section class="panel-body">
      <article class="col-xs-3">
        <label for="">Seleccione Medicamento:</label>
        <textarea name="producto4" class="form-control" rows="3" id="buscar3" ></textarea>
      </article>
      <article class="col-xs-2">
        <label for="">Via administracion:</label>
        <select class="col-xs-2 form-control"  name="via4">
          <option value=""></option>
          <option value="Via oral">Via oral</option>
          <option value="Via intravenosa">Via intravenosa</option>
          <option value="Via Intramuscular">Via Intramuscular</option>
          <option value="Via Cutanea">Via Cutanea</option>
          <option value="Via subcutanea">Via subcutanea</option>
          <option value="Via Sublingual">Via Sublingual</option>
          <option value="Via Rectal">Via Rectal</option>
        </select>
      </article>
      <article class="col-xs-2">
        <label for="">Frecuencia:</label>
        <select class="col-xs-2 form-control"  name="frecuencia4">
          <option value=""></option>
          <option value="24 horas">24 horas</option>
          <option value="12 horas">12 horas</option>
          <option value="8 horas">8 horas</option>
          <option value="6 horas">6 horas</option>
          <option value="4 horas">4 horas</option>
          <option value="2 horas">2 horas</option>
          <option value="Unica">Unica</option>
        </select>
      </article>
      <article class="col-xs-1">
        <label for="">Dosis</label>
        <input type="number" name="d1_4" class="form-control" value="0">
      </article>
      <article class="col-xs-1">
        <label for="">Dosis</label>
        <input type="number" name="d2_4" class="form-control" value="0">
      </article>
      <article class="col-xs-1">
        <label for="">Dosis</label>
        <input type="number" name="d3_4" class="form-control" value="0">
      </article>
      <article class="col-xs-1">
        <label for="">Dosis</label>
        <input type="number" name="d4_4" class="form-control" value="0">
      </article>
      <article class="col-xs-3">
        <label for="">Oservacion Medicamento:</label>
        <textarea name="obs_4" class="form-control" rows="3" ></textarea>
      </article>
    </section>
  </section>
  <div class="botonhc">
      <a data-toggle="collapse" class="ac"  data-target="#med5" > Medicamento 5<span class="fa fa-plus"></span></a>
  </div>
  <section class="collapse" id="med5">
    <section class="panel-body">
      <article class="col-xs-3">
        <label for="">Seleccione Medicamento:</label>
        <textarea name="producto5" class="form-control" rows="3"  id="buscar4"></textarea>
      </article>
      <article class="col-xs-2">
        <label for="">Via administracion:</label>
        <select class="col-xs-2 form-control"  name="via5">
          <option value=""></option>
          <option value="Via oral">Via oral</option>
          <option value="Via intravenosa">Via intravenosa</option>
          <option value="Via Intramuscular">Via Intramuscular</option>
          <option value="Via Cutanea">Via Cutanea</option>
          <option value="Via subcutanea">Via subcutanea</option>
          <option value="Via Sublingual">Via Sublingual</option>
          <option value="Via Rectal">Via Rectal</option>
        </select>
      </article>
      <article class="col-xs-2">
        <label for="">Frecuencia:</label>
        <select class="col-xs-2 form-control"  name="frecuencia5">
          <option value=""></option>
          <option value="24 horas">24 horas</option>
          <option value="12 horas">12 horas</option>
          <option value="8 horas">8 horas</option>
          <option value="6 horas">6 horas</option>
          <option value="4 horas">4 horas</option>
          <option value="2 horas">2 horas</option>
          <option value="Unica">Unica</option>
        </select>
      </article>
      <article class="col-xs-1">
        <label for="">Dosis</label>
        <input type="number" name="d1_5" class="form-control" value="0">
      </article>
      <article class="col-xs-1">
        <label for="">Dosis</label>
        <input type="number" name="d2_5" class="form-control" value="0">
      </article>
      <article class="col-xs-1">
        <label for="">Dosis</label>
        <input type="number" name="d3_5" class="form-control" value="0">
      </article>
      <article class="col-xs-1">
        <label for="">Dosis</label>
        <input type="number" name="d4_5" class="form-control" value="0">
      </article>
      <article class="col-xs-3">
        <label for="">Oservacion Medicamento:</label>
        <textarea name="obs_5" class="form-control" rows="3" ></textarea>
      </article>
    </section>
  </section>
  </body>
</html>
