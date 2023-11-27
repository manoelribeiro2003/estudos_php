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
        <form action="tabuada.php" method="post">
            <div class="form-group mt-2">
                <label>Multiplicando</label>
                <input type="number" class="form-control" name="multiplicando">
            </div>
            <div class="form-group mt-2">
                <label>Multiplicador</label>
                <input type="number" class="form-control" name="multiplicadorMaximo">
            </div>
            <input type="submit" value="Calcular" class="btn btn-primary mt-2 mb-2" />
        </form>
    </div>

    <script>

    </script>


</body>

</html>

<?php
if (!empty($_POST['multiplicando']) && !empty($_POST['multiplicadorMaximo'])) {

    $multiplicando = $_POST['multiplicando'];
    $multMax = $_POST['multiplicadorMaximo'];
    $cont = 1;

    while ($cont <= $multMax) {
        echo "$multiplicando x $cont = " . $multiplicando * $cont . '<br>';
        $cont++;
    }
}


?>
<form action="" method="post">
    <label>Numero</label>
    <input type="text" name="num">
</form>