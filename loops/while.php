<!DOCTYPE html>
<html lang="pt=br">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora com php</title>
</head>

<body>

    <div class="container card col-4 mt-3">
        <form method="post">
            <div class="form-group mt-2">
                <label>Nota 1</label>
                <input type="number" class="form-control" name="n1">
            </div>
            <div class="form-group mt-2">
                <label>Nota 2</label>
                <input type="number" class="form-control" name="n2">
            </div>
            <div class="form-group mt-2">
                <label>Nota 3</label>
                <input type="number" class="form-control" name="n3">
            </div>
            <input type="submit" value="Calcular" class="btn btn-primary mt-2 mb-2" />
            <button class="btn btn-primary mt-2 mb-2">Fazer outra operação</button>
        </form>
    </div>

    <script>

    </script>


</body>

</html>
<?php
//if (!empty($_POST['n1']) && !empty($_POST['n2']) && !empty($_POST['n3'])) {
    $media = ($_POST['n1'] + $_POST['n2'] + $_POST['n3']) / 3;
    $status = ($media >= 7) ? 'Aprovado' : 'Reprovado';

    echo 'A média é: ' . $media . '<br>';
    echo 'Status: ' . $status . '<br>';
//}




?>