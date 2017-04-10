<?php
$bd="mysql";
//$bd="postgresql";
switch ($bd) {
	case 'mysql':
		define("IP_SERVER","localhost" );
		define("USER_DB", "root");
		define("PASSWORD_DB","515t3m45" );
		define("DB", "emmanuelips");
		define("PORT", "3306");
		define("DRIVER", "mysqli.class.php");
		break;
	case 'postgresql':
		define("IP_SERVER","127.0.0.1" );
		define("USER_DB", "postgres");
		define("PASSWORD_DB","2491770" );
		define("DB", "vacaciones");
		define("PORT", "5432");
		define("DRIVER", "posgresql.class.php");
		break;
}

define("VERSION", 5);
define("LOGINI","login".VERSION. ".php");
define("PROGRAMA","aplicacion"  .VERSION.  ".php");
define("PROGRAMA2","adm_hosp"  .VERSION.  ".php");
define("SOFTWARE","SIEMM");
define("EMPRESA","Centro de rehabilitación y habilitación Emmanuel IPS  - Año 2016");
define("AUTOR","Edgar Alberto Malagón Gaitán - &copy;");
define("WEB","/var/www/html/");               ///opt/lampp/htdocs/nombre correspondiente/        /var/www/html/
define("FOTOS","fotos/");
define("DOCPAC","docpaciente/");
define("FIR","/var/www/html/");               ///opt/lampp/htdocs/nombre correspondiente/        /var/www/html/
define("FIRMAS","firmas/");
define("LOG","/var/www/html/");               ///opt/lampp/htdocs/nombre correspondiente/        /var/www/html/
define("LOGOS","logos/");
define("FCON","/var/www/html/");               ///opt/lampp/htdocs/nombre correspondiente/        /var/www/html/
define("CONDUCTOR","fconductor/");
define("IVEHI","/var/www/html/");               ///opt/lampp/htdocs/nombre correspondiente/        /var/www/html/
define("VEHICULOS","ivehiculos/");
define("PLANILLA","planillas/");
define("PACIENTES","fotopaciente/");
define("PQ","/var/www/html/");
define("PQRS","pqrssoportes/");
define("SOPORTE","soportesPESV/");
define("CLAVE5","123");


require_once(DRIVER);

define("CODEC", "utf8");
?>
