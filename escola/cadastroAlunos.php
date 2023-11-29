<?php
include_once('conexaoAlunos.php');
include_once('cores.php');

$nome = $_POST['nome'];
$curso = $_POST['curso'];
$genero = $_POST['genero'];
$idade = $_POST['idade'];

$sql = "INSERT INTO matriculas (nome, curso, genero, idade) VALUES ('$nome', '$curso', '$genero', '$idade')";

mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn)) {
    echo(green("Aluno $nome cadastrado com sucesso!"));
} else {
    echo(red('Nenhum aluno cadastrado!'));
}
 ;

?>