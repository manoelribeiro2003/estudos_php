<?php
//selecionar a conta
include('./conta.php');
include('./conexao_2.php');
$num_conta = $_POST['num_conta'];
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
        echo "Depósito";
        break;

    default:
        echo "Operção inválida";
        break;
}
