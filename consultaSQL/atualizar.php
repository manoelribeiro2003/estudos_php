<?php

include_once("conexao.php");

$id = $_POST['id'];
$produto = $_POST['produto'];
$valor = $_POST['valor'];
$quantidade = $_POST['quantidade'];
$validade = $_POST['validade'];

$sql = "UPDATE produtos SET produto = '$produto', valor = '$valor', quantidade = '$quantidade', validade = '$validade' WHERE id = $id";

mysqli_query($conn, $sql); //serve para executar o comando

if (mysqli_affected_rows($conn)) {
    // echo " <div style='color:green'>Produto atualizado!</div>
    //         id: $id <br>
    //         produto: $produto <br>
    //         valor: $valor <br>
    //         quantidade: $quantidade <br>
    //         validade: $validade <br>";
    // $_SESSION['result'] = '1';
    header('Location:./gerenciarProdutos.php');
}else {
    // echo("<div style='color:#cd8c00'>Nenhuma alteração realizada!</div>");
    // $_SESSION['result'] = '2';
    header('Location:./gerenciarProdutos.php');
}


        
?>