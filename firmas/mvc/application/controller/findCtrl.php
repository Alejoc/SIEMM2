<?php
/**
 * Controlador para la pagina de busqueda por AJAX
 */
class findCtrl
{
    /** Constructor de clase */
    public function __construct() { } 
    
    /**
     * Metodo para procesar la solicitud ajax y retornar el resultado
     * @param $carrera
     * @param $cantidad
     * @return Texto plano o codigo HTML
     */
    public function process( $carrera='' , $cantidad=1 )
    {
        sleep( 2 );   
        //instancia a modelo de busqueda
        $find = new find();
        //obtiene registros
        $tsArray = $find->getRegistros( $carrera, $cantidad );
        //si existen registros
        if( $tsArray != null )
        {          
            if( is_file( 'application/view/themes/'.__THEME__.'/modules/table.php' ) )
            {
                //crea tabla de salida
                ob_start();
                    include 'application/view/themes/'.__THEME__.'/modules/table.php';
                $table = ob_get_clean();                
                return $table;
            }
            else
            {
                return 'Error: No existe archivo [modules/table.php]';
            }                     
        }
        else{ return 'No existen registros'; }
    }
    
}//--> fin clase
?>
