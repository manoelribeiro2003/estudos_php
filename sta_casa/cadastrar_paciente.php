<?php

$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$cpf = $_POST['cpf'];
$data = $_POST['data'];

include_once('./conexao.php');

$sql = "INSERT INTO pacientes (nome, sexo, cpf, data_nascimento) VALUE ('$nome', '$sexo', '$cpf', '$data')";

if ($conn->query($sql)) {
    session_start();
    if (mysqli_affected_rows($conn)) {
        $_SESSION['cadastrar'] = '1';
        header('Location:./formulario_pacientes.php');
    }else{
        $_SESSION['cadastrar'] = '1';
        header('Location:./formulario_pacientes.php');
    }
}else{
    echo('Falha no comando SQL.');

}

?>