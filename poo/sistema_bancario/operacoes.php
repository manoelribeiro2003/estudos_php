<?php
//selecionar a conta
include('./conta.php');
include('./conexao_2.php');
$num_conta = $_POST['num_conta'];
$valor = $_POST['valor'];
$conn = new Conexao();
$conta = new Conta();
$linha = $conta->selecionarConta($num_conta, $conn);
echo ("
    Agência: $linha[agencia] <br> 
    Conta: $linha[conta]<br>
    Saldo: $linha[saldo]<br>
    ");



//definir e realizar a operacao
switch ($_POST['operacao']) {
    case 'Saldo':
        $saldo = $conta->getSaldo($num_conta, $conn);
        echo "Saldo: " . $saldo;
        break;

    case 'Saque':
        echo "Saque";
        break;

    case 'Deposito':
        $result = $conta->depositar($num_conta, $conn, $valor);
        echo "Result =  ".$result;
        break;

    default:
        echo "Operção inválida";
        break;
}
