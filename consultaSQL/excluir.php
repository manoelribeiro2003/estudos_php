<?php
include_once('conexao.php');
include_once('cores.php');

$id = $_POST['id'];


$sql = "DELETE FROM produtos WHERE id = $id";

mysqli_query($conn, $sql);

session_start();
if (mysqli_affected_rows($conn)) {
    $_SESSION['excluir'] = '1';
    header('Location:./gerenciarProdutos.php');
} else {
    $_SESSION['excluir'] = '2';
    header('Location:./gerenciarProdutos.php');
}
