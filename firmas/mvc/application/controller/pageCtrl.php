<?php
/**
 * Controlador para las paginas estaticas
 */
class pageCtrl{

    /** Constructor de clase */
    public function __construct() { } 
    
    /**
     * Metodo para cargar la vista de pagina
     * @param $id identificador de pagina estatica
     * Ej. page1.php
     */
    public function load( $id = 1 )
    {        
        
        if( intval($id)!= 0 ) //archivo de pagina estatica de la forma "page1.html"
        {
            $p =  'application/view/themes/'. __THEME__ .'/page'.$id.'.html';            
            $php = false;    
        }
        else //pagina estatica de la forma "pageBuscador.php"
        {
            $p =  'application/view/themes/'. __THEME__ .'/page'.$id.'.php';        
            $php = true;
        }
        
        if( is_readable( $p ) && $php==false ) //verifica existencia y obtiene contenido
        {
            $content = file_get_contents($p); //obtiene contenido estatico de pagina
        }
        else if(is_readable ($p) && $php ==true ) //la pagina contiene etiquetas PHP 
        {
            ob_start();						
                include $p;
            $content = ob_get_clean();	
        }
        else // si pagina no existe avisa
        {
            $content = 'La pagina no existe o el archivo es ilegible';
        }
        
        include 'application/view/themes/'. __THEME__ .'/principal.php';
    }
    
}//--> fin clase
?>
