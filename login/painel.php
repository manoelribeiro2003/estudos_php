<?php
include_once('./protect.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>

<body>

    <h1>Bem vindo ao painel</h1><?= $_SESSION['nome'] ?>
    <a href="./logout.php">Sair</a>

</body>

</html>