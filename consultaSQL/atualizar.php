<?php

include_once("conexao.php");

$sql = "";

if (isset($_POST['vender']) && $_POST['vender'] == 'vender') {
    $id = $_POST['id'];
    $quantidade = $_POST['quantidade'];
    $sql = "UPDATE produtos SET quantidade = '$quantidade' WHERE id = $id";
}elseif (isset($_POST['editar']) && $_POST['editar'] == 'editar') {
    $id = $_POST['id'];
    $produto = $_POST['produto'];
    $valor = $_POST['valor'];
    $quantidade = $_POST['quantidade'];
    $validade = $_POST['validade'];
    $sql = "UPDATE produtos SET produto = '$produto', valor = '$valor', quantidade = '$quantidade', validade = '$validade' WHERE id = $id";
}

mysqli_query($conn, $sql); //serve para executar o comando

session_start();
if (mysqli_affected_rows($conn)) {
    $_SESSION['atualizar'] = '1';
    header('Location:./gerenciarProdutos.php');
}else {
    $_SESSION['atualizar'] = '2';
    header('Location:./gerenciarProdutos.php');
}


        
?>