<?php
/* ===[ Configuracion ]=== */
define( __KEY__, 'oki doki' );//llave de seguridad o.O
define( __URL__, 'http://localhost/mvc/' ); #url del blog
define( __THEME__, 'sampleblog' ); //nombre del tema activo
define( __FULL_URL__, 'http://localhost/mvc/application/view/themes/'. __THEME__ .'/' ); #url del blog + ruta del theme

if( !is_dir( 'application/view/themes/'. __THEME__ .'/') )
{    
    die('Error Fatal: Theme no existe!!!'); 
}

/* ===[ archivos necesarios  ]=== */
require_once  "application/model/findModel.php";

/* ===[ manejo de variables  ]=== */
    if( $_POST )
    {
        if( isset( $_POST['ajax'] )  )
        {
            if( $_POST['ajax'] == 'find' )
            {
                include_once( "application/controller/findCtrl.php" );                    
                $find = new findCtrl();
                echo $find->process( $_POST['carrera'], $_POST['cantidad'] );
            }            
        }
    }
    else if( $_GET )
    { 
        if( isset( $_GET['load'] ) && isset( $_GET['id'] ) ) #carga de archivos
        {
            if( is_file( "application/controller/".$_GET['load']."Ctrl.php" ) )
            {
                include_once( "application/controller/".$_GET['load']."Ctrl.php" );        
                $page = new pageCtrl();
                $page->load( $_GET['id'] );
            }else { echo 'wtf!'; }
        }   
    }    
    else
    {
        include_once( "application/controller/homeCtrl.php" );
        $home = new homeCtrl();
        $home->load();    
    }
?>
