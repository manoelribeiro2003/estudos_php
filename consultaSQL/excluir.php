<?php
include_once('conexao.php');
include_once('cores.php');

$id = $_POST['id'];


$sql = "DELETE FROM produtos WHERE id = $id";

mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn)) {
    echo (green("Produto ". black($id). " deletado com sucesso!"));
} else {
    echo (red("Nenhum produto foi deletado!"));
}
