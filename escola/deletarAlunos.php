<?php
include_once("conexaoAlunos.php");
include_once('cores.php');

$id = $_POST['id'];

$sql1 = "DELETE FROM matriculas WHERE id = $id";
$sql2 = "SELECT * FROM matriculas WHERE id = $id";

$query2 = mysqli_query($conn, $sql2);
$query = mysqli_query($conn, $sql1);

$result = mysqli_fetch_array($query2);

if (mysqli_affected_rows($conn)) {
    echo(green("Aluno ".black($result['nome'])." deletado com sucesso!"));
} else {
    echo(red('Aluno não foi deletado!'));
}


?>