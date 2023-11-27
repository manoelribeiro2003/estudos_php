<?php

$nome = $_POST['nome'];
$curso = $_POST['curso'];
$genero = $_POST['genero'];
$idade = $_POST['idade'];

$conn = new mySqli('localhost', 'root', '', 'bd_escola');

if($conn->connect_error){
    die("Erro ao conectar-se: ".$conn->connect_error);
}else {
    // echo"Conexão bem sucedida";

    $sql1 = "INSERT INTO matriculas (nome, curso, genero, idade) VALUES ('$nome', '$curso', '$genero', '$idade')";
    mysqli_query($conn, $sql);

    $sql2 = "SELECT * FROM matriculas WHERE nome = '$nome';";
    $busca = mysqli_query($conn, $sql2);
    $linha = mysqli_fetch_array($busca);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</head>
<body>
<div class="container mt-3">
        <?=($linha)? "<div style='color:green'>Aluno adicionado!</div>" : "<div style='color:red'>Produto não localizado!</div>";
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">CURSO</th>
                    <th scope="col">GÊNERO</th>
                    <th scope="col">IDADE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= ($linha)? $linha['id'] : " não encontrado";
                        ?></td>
                    <td><?= ($linha)? $linha['nome'] : " não encontrado";
                        ?></td>
                    <td><?= ($linha)? $linha['curso'] : " não encontrado";
                        ?></td>
                    <td><?= ($linha)? $linha['genero'] : " não encontrado";
                        ?></td>
                    <td><?= ($linha)? $linha['idade'] : " não encontrado";
                        ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>