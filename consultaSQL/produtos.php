<?php

$produto = $_POST['produto'];
$valor = $_POST['valor'];
$quantidade = $_POST['quantidade'];
$validade = $_POST['validade'];

$conn = new MySqli('localhost', 'root', '', 'produtos_full');

    $sql = "INSERT INTO `produtos`(`produto`, `valor`, `quantidade`, `validade`) VALUES ('$produto','$valor', '$quantidade', '$validade')";

if (!$conn->connect_error) {
    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn)) {
            header('Location:./gerenciarProdutos.php');
        }else {
            header('Location:./gerenciarProdutos.php');
        }
    }else {
        echo('Falha no comando SQL!');
    }
    die("Conection failed: " . $conn->connect_error);
}
