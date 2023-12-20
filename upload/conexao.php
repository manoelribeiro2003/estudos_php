<?php

$conn = new Mysqli('localhost', 'root', '', 'upload');

if ($conn->connect_error) {
    die('Erro ao conectar-se ao banco de dados, erro: '.$conn->connect_error);
}

?>