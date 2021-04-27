<?php
/* Detalii de conectare la baza de date */
define('DB_HOST', 'localhost');
define('DB_NAME', 'db_informatica');
define('DB_USER', 'informaticauser');
define('DB_PASS', 'changeit');

/* SE REPORTEAZA TOATE ERORILE IN AFARA DE CELE DE TIP NOTICE SI DEPRECATED */
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
?>