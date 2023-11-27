<?php

$produto = $_POST['produto'];
$valor = $_POST['valor'];
$quantidade = $_POST['quantidade'];
$validade = $_POST['validade'];

echo "Produto: " . $produto . "<br>
     valor: " . $valor . "<br>
     quantidade: " . $quantidade . "<br>
     validade: " . $validade . "<br>";

//CONEXÃO COM BANCO DE DADOS
//$conn = new MySqli ('localhost', 'root', 'password', 'test');

$conn = new MySqli('localhost', 'root', '', 'produtos_full');

if ($conn->connect_error) {
    die("Conection failed: " . $conn->connect_error);
} else {
    echo "<br><div style='color:green'>Produto cadastrado com sucesso!</div>";
    $sql = "INSERT INTO `produtos`(`produto`, `valor`, `quantidade`, `validade`) VALUES ('$produto','$valor', '$quantidade', '$validade')";
    mysqli_query($conn, $sql);
}
