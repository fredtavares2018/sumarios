<?php

$host = 'localhost';
$user = 'root';
$password = 'Dbpr0gr@d';
$db_name = 'escolama_emf2023';
$conn = mysqli_connect($host, $user, $password, $db_name);


define('HOST', 'localhost');

define('USER', 'root');

define('PASS', 'Dbpr0gr@d');

define('DBNAME', 'escolama_emf2023');


$connx = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);