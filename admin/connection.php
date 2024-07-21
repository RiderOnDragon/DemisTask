<?php
$host = "localhost";
$userName = "root";
$password = "";
$DBName = "DB_Task";

$DB_Task = new PDO("mysql:host=$host; dbname=$DBName", $userName, $password);
?>