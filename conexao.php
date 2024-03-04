<?php

$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'localhost_sumario';
$conn = mysqli_connect($host, $user, $password, $db_name);


define('HOST', 'localhost');

define('USER', 'root');

define('PASS', '');

define('DBNAME', 'localhost_sumario');


$connx = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);
