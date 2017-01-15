<?php
/**
 * Controlador 
 */
class homeCtrl {
    
    /** Constructor de clase */
    public function __construct() { } 
    
    /**
     * Metodo para cargar la vista
     */
    public function load()
    {        
        //obtiene contenido de la vista del home 
        if( is_file( 'application/view/themes/'. __THEME__ .'/modules/home.php' ) )
        {
            $content = file_get_contents( 'application/view/themes/'. __THEME__ .'/modules/home.php' );            
        }
        else
        {
            $content = 'Archivo home.php no existe';
            
        }      
        //si el archivo principal.php existe 
        if(is_readable( 'application/view/themes/'. __THEME__ .'/principal.php' ))
        {            
            include 'application/view/themes/'. __THEME__ .'/principal.php';                    
        }
        else
        {
            echo 'Error critico: archivo de theme [principal.php] no existe.';
        }        
    }
    
}//--> fin clase
?>