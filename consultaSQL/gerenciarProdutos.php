<?php
include_once('conexao.php');
include_once('head.php');

$sql = "SELECT * FROM produtos";
$result = mysqli_query($conn, $sql);

// $linha2 = mysqli_fetch_array($result);
// echo $linha2['produto'];

if ($result) {
    echo ("
    <div class='container card mt-2'>
        <h2>Lista de Produtos</h2>
        <a href='index.html' class='btn btn-primary mb-2 mt-2'>Cadastrar</a>
        <table class='table table-striped table-sm' id='tabela`rincipal'>
            <tr>
                <th>ID</th>
                <th>Produtos</th>
                <th>Valor</th>
                <th>Quantidade</th>
                <th>Validade</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
        ");

    while ($linha = mysqli_fetch_array(($result))) {
        echo ("
            <tr id='trCadastro'>
                <form action='pesquisa.php' method='POST'>
                    <td data-label='ID'>$linha[id]</td>
                    <td data-label='Produto'>$linha[produto]</td>
                    <td data-label='Valor'>$linha[valor]</td>
                    <td data-label='Quantidde'>$linha[quantidade]</td>
                    <td data-label='Validade'>$linha[validade]</td>
                    <td><input class='btn btn-warning' type='submit' name='comando' value='Editar'></input></td>
                    <input type='hidden' name='id' value='$linha[id]'></input>
                </form>
                <form action='excluir.php' method='POST'>
                    <td><input class='btn btn-danger' type='submit' name='comando' value='Deletar' onclick=\"return confirm('Deseja deletar o produto')\"></input></td>
                    <input type='hidden' name='id' value='$linha[id]'></input>
                </form>
            </tr>
        ");
    }
    echo("
        </table>
    </div>
    ");
}else {
    echo('0 results');
}

