<?php

$produto = $_POST['produto'];
$valor = $_POST['valor'];
$quantidade = $_POST['quantidade'];
$validade = $_POST['validade'];

$conn = new MySqli('localhost', 'root', '', 'produtos_full');

$sql = "INSERT INTO `produtos`(`produto`, `valor`, `quantidade`, `validade`) VALUES ('$produto','$valor', '$quantidade', '$validade')";

if (!$conn->connect_error) {
    session_start();
    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn)) {
            $_SESSION['cadastrar']='1';
            header('Location:./gerenciarProdutos.php');
        }else {
            $_SESSION['cadastrar']='2';
            header('Location:./gerenciarProdutos.php');
        }
    }else {
        echo('Falha no comando SQL!');
    }
    die("Conection failed: " . $conn->connect_error);
}
