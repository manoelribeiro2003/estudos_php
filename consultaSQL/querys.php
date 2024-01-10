<?php

session_start();

include_once("./conexao.php");
//terceiro passo e fim do filtro
//passo 2 da remoção
function gerarTabelaHTML($mysql_query)
{
    echo ("
            <tr>
                <th>ID</th>
                <th>Produtos</th>
                <th>Valor</th>
                <th>Quantidade</th>
                <th>Validade</th>
                <th>Editar</th>
                <th>Deletar</th>
                <th>Vender</th>
            </tr>
        ");

    while ($linha = mysqli_fetch_array(($mysql_query))) {
        echo ("
            <tr id='trCadastro'>
            
                    <td data-label='ID'>$linha[id]</td>
                    <td data-label='Produto'>$linha[produto]</td>
                    <td data-label='Valor'>$linha[valor]</td>
                    <td data-label='Quantidde'>$linha[quantidade]</td>
                    <td data-label='Validade'>$linha[validade]</td>
                    <td><button class='btn btn-warning' onclick='abrirModalEditar($linha[id])'><i class='fa fa-edit'></i></button></td>
                    <input type='hidden' id='produtos$linha[id]' value='$linha[produto]'></input>
                    <input type='hidden' id='valor$linha[id]' value='$linha[valor]'></input>
                    <input type='hidden' id='quantidade$linha[id]' value='$linha[quantidade]'></input>
                    <input type='hidden' id='validade$linha[id]' value='$linha[validade]'></input>
                
                <form action='./excluir.php' method='POST'>
                    <td><button class=' btn btn-danger' type='submit' name='comando'onclick=\"return confirm('Deseja deletar o produto?')\"><i class='fa fa-trash'></i></button></td>
                    <input type='hidden' name='id' value='$linha[id]'></input>
                </form>
                <td><button class='btn btn-success' onclick='abrirModalVender($linha[id])'><i class='fa fa-shopping-cart'></i></button></td>
            </tr>
        ");
    }
}


//segundo paso
function retornarTabelaComFiltros($conexao, $tabela, $filtros) {

    $filtros = json_decode($filtros, true);
    //monta a string SQL
    $sql = "SELECT * FROM produtos WHERE";
    if (isset($filtros['idProduto'])) {
        $id_pro = $filtros['idProduto'];
        $sql .= " id = $id_pro AND";
    }
    if (isset($filtros['produto'])) {
        $prod = $filtros['produto'];
        $sql .= " produto LIKE '%$prod%' AND";
    }
    //remove o and do final
    $final = trim(substr($sql, strlen($sql) - 3, strlen($sql)));
    if ($final == 'AND') {
        $sql = trim(substr($sql, 0, strlen($sql) - 3));
    }
    //finaliza a substring
    $sql .=  ' LIMIT 0, 10';

    gerarTabelaHTML(mysqli_query($conexao, $sql));

    $_SESSION['filtro'] = $sql;
}

//começa aqui
if (isset($_POST['filtroTabela']) && isset($_POST['tabela']) && isset($_POST['filtroData'])) {
    retornarTabelaComFiltros($conn, $_POST['tabela'], $_POST['filtroData']);
}

//passo 1 da remoção
if (isset($_POST['tabelaNormal']) && isset($_POST['tabela'])) {
    $tabela = $_POST['tabela'];
    $sql = "SELECT * FROM produtos LIMIT 0, 10";
    $result = mysqli_query($conn, $sql);
    gerarTabelaHTML($result);
}
//passo da remoção
if (isset($_POST['removerFiltro'])) {
    unset($_SESSION['filtro']);
}
