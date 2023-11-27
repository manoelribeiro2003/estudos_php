<?php
//FACA A MEDIA DE DUAS NOTAS E DIGA SE O ALUNO FOI APROVADO OU REPROVADO. USE O OPERADOR TERNÁRIO

// $nota1 = 10;
// $nota2 = 6;
// $media = ($nota1 + $nota2) / 2;

// $status = ($media >=7) ? "Aprovado" : "Reprovado";
// echo "A média é: ".$media. "</br>";
// echo "O status é: ".$status;

?>


<?php
//CRIAR UMA CALCULADORA COM OS 4 OPERADORES BÁSICOS
//1.SOMA 2.SUB 3.MULT 4.DIV

// $n1 = 39;
// $n2 = 12;
// $op = 9;
// switch ($op) {
//     case 1:
//         echo $n1 + $n2;
//         break;
//     case 2:
//         echo $n1 - $n2;
//         break;
//     case 3:
//         echo $n1 * $n2;
//         break;
//     case 4:
//         echo $n1 / $n2;
//         break;

//     default:
//         echo "Digite um resultado válido <br>1.SOMA<br>2.SUBTRAÇÃO<br>3.MULTIPLICAÇÃO<br>4.DIVISÃO";
//         break;
// }

?>

<?php

// $n1 = $_POST['n1'];
// $n2 = $_POST['n2'];
// $op = $_POST['num'];

// echo 'numero 1 = '.$n1.'<br> numero 2 = '.$n2.'<br> op = '.$op;
?>


<div class="container card col-4 mt-3">
        <form action="condicional.php" method="post">
            <div class="form-group mt-2">
                <label>Nota 1</label>
                <input type="text" class="form-control" name="n1">
            </div>
            <div class="form-group mt-2">
                <label>Nota 2</label>
                <input type="text" class="form-control" name="n2">
            </div>
            <div class="form-group mt-2">
                <label>Nota 3</label>
                <input type="text" class="form-control" name="n3">
            </div>
            <input type="submit" value="Calcular" class="btn btn-primary mt-2 mb-2"/>
            <button class="btn btn-primary mt-2 mb-2">Fazer outra operação</button>

        </form>
    </div>
<?php
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $n3 = $_POST['n3'];
    $media = ($n1 + $n2 + $n3) / 3;
    $status = ($media >= 7) ? 'Aprovado' : 'Reprovado';

    echo 'A média é: ' . $media . '<br>';
    echo 'Status: ' . $status . '<br>';



?>
<br>
<a href="calculadora.html">Voltar para a página html</a>