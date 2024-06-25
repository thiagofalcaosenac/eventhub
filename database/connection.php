<?php

$hostname = "localhost";
$user = "root";
$password = "senac";
$database = "eventhub";

$chave = "zXW3x14WYB"; // SELECT MD5 (CONCAT ('SENHADOUSUARIO', 'zXW3x14WYB')) AS md5_string;

$pdo = new PDO("mysql:host=$hostname;dbname=$database", $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>