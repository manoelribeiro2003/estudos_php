<?php
include_once('./conexao.php');
include_once('./head.php');

$sql = "SELECT atendimentos.id_atendimento, pacientes.nome, atendimentos.tipo, atendimentos.data FROM atendimentos JOIN pacientes ON atendimentos.id_paciente = pacientes.id_paciente";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desgraça</title>
</head>

<body>

    <div class='container card mt-2'>
        <h2>Lista de Atendimentos</h2>
        <table class='table table-striped table-sm'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data</th>
                <th>Tipo</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
            <?php while($linha = $result->fetch_array()){
                echo("
                <tr id='trCadastro'>
                <form action='' method='POST'>
                    <td data-label='ID'>$linha[id]</td>
                    <td data-label='Produto'>$linha[nome]</td>
                    <td data-label='Valor'>$linha[data]</td>
                    <td data-label='Quantidde'>$linha[tipo]</td>
                    <td><input class='btn btn-warning' type='submit' name='comando' value='Editar'></input></td>
                    <input type='hidden' name='id' value='$linha[id_atendimento]'></input>
                </form>
                <form action='' method='POST'>
                    <td><input class='btn btn-danger' type='submit' name='comando' value='Deletar' onclick=\"return confirm('Deseja deletar o atendimento?')\"></td>
                    <input type='hidden' name='id' value='$linha[id_atendimento]'></input>
                </form>
            </tr>
                
                ");
                }?>
            
        </table>
    </div>

</body>

</html>