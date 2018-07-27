<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'blog';

$link = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno()) {

	exit('Falha de conexão ao banco de dados! Erro' . mysqli_connect_error());
}

$ip = $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER['HTTP_USER_AGENT'];
$date = date('Y-m-d H:m:s');

$query = "insert into log (IP, Browser, created_at) values ('".$ip."','".$browser."', '".$date."')";

$result = mysqli_query($link, $query);

if ($result) {
	echo 'Log Salvo!';
}


