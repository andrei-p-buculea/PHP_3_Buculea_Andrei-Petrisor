<?php
require_once "config.php";
//Stabilire conexiune cu serverul MySQL

$conexiune=mysqli_connect(DB_HOST,DB_USER,DB_PASS);

if(!$conexiune)
{
    die('Eroare conexiune MySQL: '.mysqli_connect_error());

}

mysqli_select_db($conexiune,DB_NAME) or die("Eroare la selectarea bazei de date ".mysqli_error($conexiune));
?>