<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'login';

$conn = mysqli_connect($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die('Erro de conexao'.$conn->connect_error);
}

?>