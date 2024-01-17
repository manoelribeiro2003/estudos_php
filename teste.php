<?php
if($_POST['nome'] && $_POST['sobrenome']){
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
</head>
<body>
    <form action="" method="post">
        <label>Nome: </label><br>
        <input type="text" name="nome"><br>
        <label>Sobrenome: </label><br>
        <input type="text" name="sobrenome"><br>
        <button type="submit">Enviar</button>
    </form>
    <?='Nome: '.$nome.'Sobrenome: '.$sobrenome?>
</body>
</html>