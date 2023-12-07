<?php
include_once('conexao.php');
include_once('head.php');

$sql = "SELECT COUNT(*) AS cont FROM produtos";
$result = $conn->query($sql);
$linha = mysqli_fetch_array($result);

if ($linha) {
    echo("
    <div class='container mt-2'>
        <div class='card' style='width: 18rem;'>
             <div class='card-body'>
                <h5 class='card-title text-center'>Quantidade de Registros</h5>
                <h1 class='card-subtitle mb-2 text-muted text-center'>$linha[cont]</h1>
            </div>
        </div>
    </div>");
}

$sql2 = "SELECT SUM(quantidade) AS soma FROM produtos";
$result2 = $conn->query($sql2);
$linha2 = mysqli_fetch_array($result2);

if ($linha2) {
    echo("
    <div class='container mt-2'>
        <div class='card' style='width: 18rem;'>
            <div class='card-body'>
                <h5 class='card-title text-center'>Quantidade de Produtos</h5>
                <h1 class='card-subtitle mb-2 text-muted text-center'>$linha2[soma]</h1>
            </div>
        </div>
    </div>");
}

$sql3 = "SELECT produto, TIMESTAMPDIFF(DAY, NOW(), validade) AS prazo FROM produtos ORDER BY prazo LIMIT 0, 1;";
$result3 = $conn->query($sql3);
$linha3 = mysqli_fetch_array($result3);

if ($linha3) {
    echo("
    <div class='container mt-2'>
        <div class='card' style='width: 18rem;'>
            <div class='card-body'>
                <h5 class='card-title text-center'>Menor Validade</h5>
                <h2 class='card-subtitle mb-2 text-muted text-center'>$linha3[produto]</h1>
                <h2 class='card-subtitle mb-2 text-muted text-center'>$linha3[prazo]</h1>
            </div>
        </div>
    </div>");
}

?>