<?php
include('./conta.php');
include('./conexao_2.php');

$conta = new Conta();
$conn = new Conexao();
$result = $conta->login($_POST['agencia'], $_POST['conta'], $_POST['senha'], $conn);
echo $result;












?>