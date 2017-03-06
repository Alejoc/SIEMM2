<?php
include('config/class.Conexion.php');

class Ajax {

  public $buscador;

  public function Buscar($a){
    $db = new Conexion();

    $sql = $db->query("Select * from pro_medicametos where prin_activo like '%$a%'  LIMIT 0,20");

    while ($array = $db->recorrer($sql)) {
      $resultado[] = $array['prin_activo'].' '.$array['concentracion'].' '.$array['presentacion'];

    }
    return $resultado;
  }
}

$busqueda = new Ajax();
echo json_encode($busqueda->Buscar($_GET['term']));

 ?>
