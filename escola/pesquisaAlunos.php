<?php
include_once('conexaoAlunos.php');
include_once('cores.php');

$id = $_POST['id'];

$sql = "SELECT * FROM matriculas WHERE id = $id";
$query = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($query);


echo("
<body>
<div class='card container mt-3 '>
    <div class='mt-2'>
        <h2 style='text-align: center;' class='mt-0'>VER PRODUTO</h2>
    </div>
    <form action='atualizar.php' method='POST'>
        <div class='mb-3'>
            <label class='form-label'>Nome*</label>
            <input value='$linha[nome]' type='text' class='form-control' id='produto' name='produto' onblur='V_produto(this)' required>
            <div id='alertaProduto' class='form-text'></div>
        </div>
        <div class='mb-3'>
            <label class='form-label'>Curso*</label>
            <input value='$linha[curso]' type='text' class='form-control' id='valor' name='valor' onblur='V_valor(this)' required>
            <div id='alertaValor' class='form-text'></div>
        </div>
        <div class='mb-3'>
            <label class='form-label'>Genero*</label>
            <input value='$linha[genero]' type='text' class='form-control' id='quantidade' name='quantidade' onblur='V_quantidade(this)'
                required>
            <div id='alertaQuantidade' class='form-text'></div>
        </div>
        <div class='mb-3'>
            <label class='form-label'>Idade*</label>
            <input value='$linha[idade]' type='number' class='form-control' id='validade' name='validade' onblur='V_validade(this)'
                required>
    </form>
</div>
</body>");

echo($linha['nome']);

?>