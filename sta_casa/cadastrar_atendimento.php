<?php

if (!isset($_POST['data']) && !isset($_POST['tipo']) && !isset($_POST['id_paciente'])) {
    echo ('Preencha os dados');
} else {
    $data = $_POST['data'];
    $tipo = $_POST['tipo'];
    $id_paciente = $_POST['id_paciente'];

    include_once('./conexao.php');

    $sql = "INSERT INTO `atendimentos` (`data`, `tipo`, `id_paciente`) VALUES ('$data', '$tipo', $id_paciente)";

    if($conn->query($sql)){
        session_start();
        if ($conn->affected_rows) {
            $_SESSION['cadastrar'] = TRUE;
            header('Location:./formulario_atendimento.php');
        }else {
            $_SESSION['cadastrar'] = FALSE;
            header('Location:./formulario_atendimento.php');
        }
    }else {
        echo('Erro na query'.$conn->error);
    }




}
