<?php

include('./conexao.php');

if (isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];

    if ($arquivo['error']) {
        die('Falha ao enviar arquivo');
    }

    if ($arquivo['size'] > 2097152) {
        die('Arquivo muito grande! Max: 2MB.');
    }

    $pasta = 'arquivos/';
    $nomeDoArquivo =  $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));


    if ($extensao != 'jpg' && $extensao != 'png') {
        die('Tipo de arquivo não aceito!');
    }

    $path = $pasta . $novoNomeDoArquivo . '.' . $extensao;
    $deu_certo = move_uploaded_file($arquivo['tmp_name'], $path);

    if ($deu_certo) {
        $conn->query("INSERT INTO arquivos(nome, path) VALUES ('$nomeDoArquivo','$path')") or die('Erro: ' . $conn->error);
        echo "
        <p style=\"color: green;\">Arquivo enviado com sucesso</p>
        <p>Para acessa-lo, <a target='_blank' href=\"arquivos/$novoNomeDoArquivo.$extensao\">clique aqui</a></p>
        ";
    } else {
        echo '<p style="color: red;">Falha ao enviar arquivo</p>';
    }
}

$result = $conn->query('SELECT * FROM arquivos') or die($conn->error);



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivos</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data" action="">
        <label for="">Selecione o arquivo</label>
        <input name="arquivo" type="file">
        <p>
            <button type="submit">Enviar arquivo</button>
        </p>
        <h1>Lista de Arquivos</h1>
        <table border="1" cellpadding="10">
            <thead>
                <th>Arquivo</th>
                <th>Data de Upload</th>
            </thead>
            <tbody>
                <?php
                while ($arquivo = $result->fetch_assoc()) {
                    # code...

                ?>
                    <tr>
                        <td><?= $arquivo['nome'] ?></td>
                        <td><?= date("d/m/Y H:i", strtotime($arquivo['data_upload'])) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </form>
</body>

</html>