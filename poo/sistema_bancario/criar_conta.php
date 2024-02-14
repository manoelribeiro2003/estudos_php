<?php
include("./conta.php");
include('./conexao_2.php');

$conn = new Conexao();
$conta = new Conta($_POST['agencia'], $_POST['conta'], 0, $_POST['senha']);

$sql = "INSERT INTO contas (agencia, conta, saldo, senha) VALUES ('" . $conta->getAgencia() . "', '" . $conta->getConta() . "', '" . $conta->getSaldo() . "', '" . $conta->getSenha() . "')";

$conexao = $conn->criarConexao();

mysqli_query($conexao, $sql);