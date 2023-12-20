<?php

include_once('./conexao.php');
include_once('./head.php');
$sql = "SELECT nome, id_paciente FROM pacientes";

$result = $conn->query($sql);

if (!isset($_SESSION['cadastrar'])) {
    $mensagem = '';
}elseif (isset($_SESSION['cadastrar'])) {
    if ($_SESSION['cadastrar'] == TRUE) {
        $mensagem = green('Paciente cadastrado com sucesso');
        // session_destroy();
    }elseif ($_SESSION['cadastrar'] == FALSE) {
        $mensagem = red("Não cadastrado");
        // session_destroy();
    }
}
var_dump($mensagem);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Atendimentos</title>
</head>

<body>

    <div class="container card mt-3">
        <div class='mt-2'>
            <h2 style='text-align: center;' class='mt-0'>CADASTRO DE ATENDIMENTOS</h2>
            <div class="form-text text-center"><?echo $mensagem ?></div>
        </div>

        <form action="./cadastrar_atendimento.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Data do Atendimento</label>
                <input type="date" class="form-control" id="nome" name="data" onblur="V_nome(this)" required>
                <div id="alertaNome" class="form-text"></div>
            </div>

            <div class="mb-3">
                <label class="form-label">Triagem do Atendimento</label>
                <select class="form-select" name="tipo" id="sexo">
                    <option value="M" selected>Moderado</option>
                    <option value="G">Grave</option>
                    <option value="C">Crítico</option>
                </select>
                <div id="alertaSexo" class="form-text"></div>
            </div>

            <div class="mb-3">
                <label class="form-label">Paciente</label>
                <select class="form-select" name="id_paciente" id="sexo">
                    <?php foreach ($result as $i) {
                        echo ("<option value='$i[id_paciente]'>$i[nome]</option>");
                    } ?>
                </select>
            </div>

            <input value="Cadastrar" type="submit" class="btn btn-warning" onclick="V_cadastrar(this)">
        </form>
        <script type="text/javascript" src="./pacientes.js"></script>
    </div>



</body>

</html>