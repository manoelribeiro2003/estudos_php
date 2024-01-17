<?php

session_start();
if (isset($_SESSION['atualizar'])) {
    if ($_SESSION['atualizar'] == '1') {
        unset($_SESSION['atualizar']);
        echo ("<script>alert('Atualizado com sucesso!');</script>");
    } elseif ($_SESSION['atualizar'] == '2') {
        unset($_SESSION['atualizar']);
        echo ("<script>alert('Nada atualizado!');</script>");
    }
} else if (isset($_SESSION['excluir'])) {
    if ($_SESSION['excluir'] == '1') {
        unset($_SESSION['excluir']);
        echo ("<script>alert('Excluido com sucesso!');</script>");
    } else if ($_SESSION['excluir'] == '2') {
        unset($_SESSION['excluir']);
        echo ("<script>alert('Nada excluido!');</script>");
    }
} else if (isset($_SESSION['cadastrar'])) {
    if ($_SESSION['cadastrar'] == '1') {
        unset($_SESSION['cadastrar']);
        echo ("<script>alert('Cadastrado com sucesso!');</script>");
    } else if ($_SESSION['cadastrar'] == '2') {
        unset($_SESSION['cadastrar']);
        echo ("<script>alert('Nada cadastrado!');</script>");
    }
}


include_once('conexao.php');
include_once('head.php');

$sql = "SELECT * FROM `produtos` ORDER BY `produto`";
$result = mysqli_query($conn, $sql);

// $linha2 = mysqli_fetch_array($result);
// echo $linha2['produto'];

if ($result) {
    echo ("
    <div class='container card mt-2'>
        <h2>Lista de Produtos</h2>
        <a href='./index.html' class='btn btn-primary mb-2 mt-2'>Cadastrar</a>
        <div>
            <div class='row mb-3 text-center d-none d-lg-block'>
                <div class='col-lg-12 col-sm-12'>
                    <div class='m-2'>
                        <button class='btn btn-warning' onclick='abrirModalFiltro()'>Filtrar Produtos</button>
                    </div>
                    <button class='btn btn-warning d-none' id='btnRemoverFiltro' onclick='removerFiltro()'>Remover Filtros</button>
                </div>
            </div>
        </div>
        <table class='table table-striped table-sm' id='tabelaPrincipal'>
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

    while ($linha = mysqli_fetch_array(($result))) {
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
    echo ("
        </table>
    </div>
    ");
} else {
    echo ('0 results');
}
?>

<div class="modal fade" id='modalEditar' tabindex="-1" role="dialog" aria-label="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="./atualizar.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Produto</h5>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" id="editarId" name="id" class="form-control">
                        <label>ID</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" id="editarProduto" name="produto" class="form-control">
                        <label>Produto</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" id="editarValor" name="valor" class="form-control">
                        <label>Valor</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" id="editarQuantidade" name="quantidade" class="form-control">
                        <label>Quantidade</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" id="editarValidade" name="validade" class="form-control">
                        <label>Validade</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type='hidden' name='editar' value='editar'></input>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="fecharModalEditar()">Fechar</button>
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id='modalVender' tabindex="-1" role="dialog" aria-label="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="./atualizar.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Vender Produto</h5>
                </div>

                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" id="vendasVerId" name="id" class="form-control">
                        <label>Id</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" id="vendasVerProduto" name="produto" class="form-control" disabled>
                        <label>Produto</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" id="vendasVerQuantidade" class="form-control" disabled>
                        <label>Quantidade</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" id="vendasEditarVenda" name="venda" class="form-control">
                        <label>Venda</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type='hidden' name='vender' value='vender'></input>
                        <input type="hidden" id="vendasHiddenQuantidade" name="quantidade" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="fecharModalVender()">Fechar</button>
                        <input type="submit" class="btn btn-primary" value="Vender">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id='modalFiltro' tabindex="-1" role="dialog" aria-label="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Filtrar Produto</h5>
            </div>
            <div class="modal-body">
                <h5>Filtrar por ...</h5>
                <div class="form-floating mb-3">
                    <input type="text" id="filtroId" name="id" class="form-control">
                    <label>Id</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" id="filtroProduto" name="produto" class="form-control">
                    <label>Produto</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="fecharModalFiltro()">Fechar</button>
                    <button type="button" class="btn btn-primary" onclick="aplicarFiltros()">Filtrar</button>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    //-----------------------------Modal Editar---------------------------------
    function abrirModalEditar(id) {
        $("#modalEditar").modal("show");

        produto = document.getElementById("produtos" + id);
        valor = document.getElementById("valor" + id);
        quantidade = document.getElementById("quantidade" + id);
        validade = document.getElementById("validade" + id);

        editarId = document.getElementById("editarId");
        editarProduto = document.getElementById("editarProduto");
        editarValor = document.getElementById("editarValor");
        editarQuantidade = document.getElementById("editarQuantidade");
        editarValidade = document.getElementById("editarValidade");

        editarId.value = id;
        editarProduto.value = produto.value;
        editarValor.value = valor.value;
        editarQuantidade.value = quantidade.value;
        editarValidade.value = validade.value;
    }

    function fecharModalEditar() {
        $("#modalEditar").modal("hide");
    }
    // ------------------------------------------------------------------------

    //------------------------------Modal Vender-------------------------------
    function abrirModalVender(id) {
        limparCampoVendas();
        $("#modalVender").modal("show");

        produto = document.getElementById("produtos" + id);
        quantidade = document.getElementById("quantidade" + id);

        verId = document.getElementById("vendasVerId");
        verProduto = document.getElementById("vendasVerProduto");
        verQuantidade = document.getElementById("vendasVerQuantidade");
        hiddenQuantidade = document.getElementById("vendasHiddenQuantidade");
        venda = document.getElementById("vendasEditarVenda");

        verId.value = id;
        verProduto.value = produto.value;
        verQuantidade.value = quantidade.value;
        hiddenQuantidade.value = quantidade.value;

        venda.max = quantidade.value;
        venda.min = 1;

    }

    function limparCampoVendas() {
        document.getElementById("vendasEditarVenda").value = "";
    }

    function fecharModalVender() {
        $("#modalVender").modal("hide");
        limparCampoVendas();
    }
    // -------------------------------------------------------------------------------

    // --------------------------------Modal Filtro-----------------------------------
    function abrirModalFiltro() {
        limparCampos();
        $("#modalFiltro").modal("show");
    }

    function fecharModalFiltro() {
        $("#modalFiltro").modal("hide");
    }

    function limparCampos() {
        document.getElementById("filtroId").value = "";
        document.getElementById("filtroProduto").value = "";

    }

    const btnRemoverFiltro = document.querySelectorAll('#btnRemoverFiltro');

    function aplicarFiltros() {
        let idProduto = document.getElementById("filtroId").value;
        let produto = document.getElementById("filtroProduto").value;
        let tabela = document.getElementById("tabelaPrincipal");
        let json = {};


        if (idProduto != "") {
            json.idProduto = idProduto;
        }
        if (produto != "") {
            json.produto = produto;
        }


        if (idProduto != "" || produto != "") {
            $.ajax({
                url: "./querys.php",
                method: "POST",
                data: {
                    filtroTabela: "sim",
                    tabela: "produtos_full",
                    filtroData: JSON.stringify(json)
                },
                
                success: (data) => {
                    alert(data);
                    tabela.innerHTML = data;
                    btnRemoverFiltro[0].classList.remove("d-none");

                    $("#modalFiltro").modal("hide");
                }
            })
        }
        fecharModalFiltro();
    }


    function removerFiltro() {
        let tabela = document.getElementById("tabelaPrincipal");
        $.ajax({
            url: "./querys.php",
            method: "POST",
            data: {
                tabelaNormal: "sim",
                tabela: "produtos",
                removerFiltro: "sim"
            },
            success: (data) => {
                tabela.innerHTML = data;
                btnRemoverFiltros[0].classList.add("d-none");
            }
        })
    }
    // ------------------------------------------------------------------------
</script>