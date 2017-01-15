<?php
/**
 * Modelo para la base de datos
 */
class database {
   private $conexion;

    /**
    * Conexion a la base de datos
    */
    public function conectar()
    {
        if(!isset($this->conexion))
        {
            $this->conexion = (mysql_connect("localhost","USUARIO","PASSWORD")) or die(mysql_error());
            mysql_select_db("dbTest",$this->conexion) or die(mysql_error());		  
        }
    }
    
    /**
     * Metodo para cerrar una conexion a la base de datos
     */
    public function desconectar()
    {
        mysql_close();
    }

    /**
     * Metodo para obtener la cantidad de registros que se obtiene de una consulta     
     * @param $result 
     */
    function numero_de_filas($result){
        if(!is_resource($result)) return false;
            return mysql_num_rows($result);
    }

    /**
     * Devuelve un array asociativo que corresponde a la fila recuperada 
     * y mueve el puntero de datos interno hacia adelante
     */
    function fetch_assoc($result){
        if(!is_resource($result)) return false;
            return mysql_fetch_assoc($result);
    }
        
    /**
     * Metodo para realizar una consulta
     * @param $sql Consulta SQL Ej. 'SELECT * FROM tabla'
     */
    public function consulta( $sql )
    {
        $resultado = mysql_query($sql,$this->conexion);
        if( !$resultado ){
            echo 'MySQL Error: ' . mysql_error();
            exit;
        }
        return $resultado; 
    }
    
}

?>
