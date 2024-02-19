<?php
include("./conta.php");
include('./conexao_2.php');

$conn = new Conexao();
$conta = new Conta();

$result = $conta->criarConta($_POST['agencia'], $_POST['conta'], 0, $_POST['senha'], $conn);

echo $result;