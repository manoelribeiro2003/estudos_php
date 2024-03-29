<?php

include('./conexao.php');

$DoisMegaBytes = 2097152;

if (isset($_FILES['arquivo'])) {

    $arquivo = $_FILES['arquivo'];
    var_dump($arquivo);
    ########################## caso dê algum tipo de erro o programa morre ##########################
    if ($arquivo['error']) {
        die('Falha ao enviar arquivo');
    }

    ########################## caso o arquivo seja maior que 2MB ##########################
    if ($arquivo['size'] > $DoisMegaBytes) {
        die('Arquivo muito grande! Max: 2MB.');
    }


    ########################## Definindo alguns atributos do arquivo a ser feito upload ##########################
    #----------a pasta onde ele vai ficar------------
    $pasta = 'arquivos/'; 
    #--------o nome do arquivo que foi feito upload-----------
    $nomeDoArquivo =  $arquivo['name'];
    #----------o novo nome do arquivo com a função para deixar seu nome unico---------
    $novoNomeDoArquivo = uniqid(); 
    #----- guarda a extensão do arquivo
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));#--- retorna a extensão do nome do arquivo em minusculo

    ########################## se a extensão do arquivo feito upload for diferente de png e jpg ##########################
    if ($extensao != 'jpg' && $extensao != 'png') {
        die('Tipo de arquivo não aceito!');
    }

    ########################## definido o novo caminho que o arquivo vai ficar ##########################
    $path = $pasta . $novoNomeDoArquivo . '.' . $extensao;

    ########################## move o arquivo e verifica se foi possível movê-lo para seu novo caminho ##########################
    $deu_certo = move_uploaded_file(
        $arquivo['tmp_name'], #---nome temporario que o arquivo recebe quando é feito upload usando a superglobal FILE[]
        $path);

    ########################## caso tenha dado certo mover para o novo caminho, adiciona um registro desse arquivo no banco de dados ##########################
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
                <th>Previw</th>
                <th>Arquivo</th>
                <th>Data de Upload</th>
            </thead>
            <tbody>
                <?php
                while ($arquivo = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><img height="50" src="<?=$arquivo['path']?>"></td>
                        <td><a target="_blank" href="<?= $arquivo['path']?>"><?= $arquivo['nome'] ?></a></td>
                        <td><?= date("d/m/Y H:i", strtotime($arquivo['data_upload'])) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </form>
</body>

</html>