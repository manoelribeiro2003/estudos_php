<?php

include_once("conexao.php");

$sql = null;

$id = $_POST['id'];
$venda = $_POST['venda'];

$sql = "UPDATE produtos SET quantidade = quantidade-$venda WHERE id = $id";

mysqli_query($conn, $sql); //serve para executar o comando

session_start();
if (mysqli_affected_rows($conn)) {
    $_SESSION['atualizar'] = '1';
    header('Location:./gerenciarProdutos3.php');
}else {
    $_SESSION['atualizar'] = '2';
    header('Location:./gerenciarProdutos3.php');
}


        
?>