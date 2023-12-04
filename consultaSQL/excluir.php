<?php
include_once('conexao.php');
include_once('cores.php');

$id = $_POST['id'];


$sql = "DELETE FROM produtos WHERE id = $id";

mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn)) {
    echo("<script>alert('Excluido com sucesso!');</script>");
    header('Location:./gerenciarProdutos.php');
} else {
    echo("<script>alert('Nada excluido!');</script>");
    header('Location:./gerenciarProdutos.php');
}
