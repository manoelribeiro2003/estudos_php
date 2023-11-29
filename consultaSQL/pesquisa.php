<?php

// if (isset($_SESSION['result'])) {
//     if ($_SESSION['result'] == "1") {
//         unset($_SESSION[['result']]);
//         echo ("<script>alert('Atualização feita com sucesso')</script>");
//     } elseif ($_SESSION['result'] == '2') {
//         unset($_SESSION[['result']]);
//         echo ("<script>alert('Erro ao atualizar')</script>");
//     }
// }

$id = $_POST['id'];

include_once('conexao.php');
include_once('head.php');

$sql = "SELECT * FROM `produtos` WHERE `id` = $id";
$resultado = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($resultado);

if ($linha) {
    echo "
    <body>
    <div class='card container mt-3 '>
        <div class='mt-2'>
            <h2 style='text-align: center;' class='mt-0'>VER PRODUTO</h2>
        </div>
        <form action='atualizar.php' method='POST'>
            <div class='mb-3'>
                <label class='form-label'>Produto*</label>
                <input value='$linha[produto]' type='text' class='form-control' id='produto' name='produto' onblur='V_produto(this)' required>
                <div id='alertaProduto' class='form-text'></div>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Valor*</label>
                <input value='$linha[valor]' type='text' class='form-control' id='valor' name='valor' onblur='V_valor(this)' required>
                <div id='alertaValor' class='form-text'></div>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Quantidade*</label>
                <input value='$linha[quantidade]' type='text' class='form-control' id='quantidade' name='quantidade' onblur='V_quantidade(this)'
                    required>
                <div id='alertaQuantidade' class='form-text'></div>
            </div>
            <div class='mb-3'>
                <label class='form-label'>Validade*</label>
                <input value='$linha[validade]' type='date' class='form-control' id='validade' name='validade' onblur='V_validade(this)'
                    required>
            </div>
                <div id='alertaValidade' class='form-text'></div>
            <input type='hidden' name= 'id' value='$linha[id]'>
            <div class='mb-3'>
                <input type='submit' class='btn btn-primary' onblur='V_cadastrar(this)' value='Atualizar'>
            </div>
        </form>
    </div>
    </body>";
} else {
    echo "<br><div style='color:red'>Produto não localizado!</div>";
}
?>


<!-- <!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <? //= ($linha)? "<div style='color:green'>Produto localizado!</div>" : "<div style='color:red'>Produto não localizado!</div>";
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">PRODUTO</th>
                    <th scope="col">VALOR</th>
                    <th scope="col">QUANTIDADE</th>
                    <th scope="col">VALIDADE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><? //= ($linha)? $linha['id'] : " não encontrado";
                        ?></td>
                    <td><? //= ($linha)? $linha['produto'] : " não encontrado";
                        ?></td>
                    <td><? //= ($linha)? $linha['valor'] : " não encontrado";
                        ?></td>
                    <td><? //= ($linha)? $linha['quantidade'] : " não encontrado";
                        ?></td>
                    <td><? //= ($linha)? $linha['validade'] : " não encontrado";
                        ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html> -->