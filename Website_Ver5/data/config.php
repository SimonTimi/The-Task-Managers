<?php

$host = "localhost";
$username = "admin"; //cian user
//$username = "root"; //simon user
$password = "oilydog123"; // cian password
//$password = "H00d135!"; // simon password
$DBname = "gaming_store"; 
$dsn = "mysql:host=$host;dbname=$DBname";
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

//also this is my login and i dont know if it will work for you if you try connect on your own pc/laptop after i send you the sql file
//you will probably have to put your own login credentials (phpmyadmin > user accounts) to access the db ^^ i think idk just in case

?>