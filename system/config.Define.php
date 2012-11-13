<?php

// Parametros de servidor
define('DB_HOST',"localhost");
define('DB_PORT',"5432");
define('DB_NAME',"pink-marker");
define('DB_USER',"postgres");
define('DB_PASS',"123456");

//Parametros de reporte
ini_set('error_reporting', E_ALL);

// Parametros de acceso

// define el separador de directorios del sistema
define('DS', DIRECTORY_SEPARATOR);

// establece el directorio del sistema y la carpeta donde es almacena
define('WEB_ROOT', realpath('..').DS.'pink-marker');

// establece el directorio del codigo fuente
define('SYSTEM', WEB_ROOT.DS.'system'.DS);

// establece el directorio las plantillas
define('TEMPLATE', SYSTEM.'view'.DS);

// establece la direccion de acceso al sitio
define('URL', 'http://localhost/pink-marker/index.php?');