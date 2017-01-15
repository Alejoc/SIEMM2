<?php
require_once "database.php";
/**
 * Modelo para busquedas
 */
class find extends database 
{
    
    /**
     * Metodo para realizar una consulta a la base de datos
     * para obtener registro de alumnos segun parametros de entrada
     * @param $carrera Ej. Odontologia
     * @param $limit   Cantidad de registros Ej. LIMIT 100
     * @return Array asociativo
     */
    public function getRegistros( $carrera=NULL, $limit=12 )
    {
        $this->conectar(); 
        $query = $this->consulta("SELECT * FROM universitario 
            WHERE carrera='".mysql_real_escape_string($carrera)."' ORDER BY rand() LIMIT  ".mysql_real_escape_string($limit).";");
        $this->desconectar();
        if($this->numero_de_filas( $query ) > 0) // existe -> datos correctos
        {		
            //se llenan los datos en un array
            while ( $tsArray = $this->fetch_assoc( $query ) ) 
		$data[] = $tsArray;			
            return $data;
        }
        else
        {	
            return null;
        }        
    }    
}
?>
