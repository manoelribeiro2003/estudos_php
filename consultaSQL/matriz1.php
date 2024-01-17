<?php

/*$produtos1 = array(
    array(4.50, 50),
    array(6.50, 30),
    array(4.00, 35),
);
$soma = 0;
for ($i = 0;  $i < 3; $i++){
    echo ($produtos1[$i][1] . "<br>");
        $soma += $produtos1[$i][1];
        

}
echo "Soma = ".$soma;*/
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//----- CRIAR UMA MATRIZ COM AS NOTAS DE 5 ALUNOS. CADA ALUNO FEZ 3 PROVAS E A MÉDIA NA INSTITUIÇÃO É 7. CALCULAR A MÉDIA POR ALUNO E VERIFICAR SE FOI APROVADO -----

/*$notas = array(
    array(4, 8, 9),
    array(10, 8, 9),
    array(4, 8, 1),
    array(4, 2, 9),
    array(10, 7, 9),

);

for ($i=0; $i < 5; $i++) {

    $media = ($notas[$i][0] + $notas[$i][1] + $notas[$i][2]) / 3;
    if ($media >= 7) {
        echo('Aluno aprovado com média: '.$media. '<br>');
    } else {
        echo('Aluno reprovado com média: '.$media. '<br>');
    }
    
}*/


/*echo '------------------------------------<br>';
$med = 0;
for ($i=0; $i < 5; $i++) { 
    for ($x=0; $x < 3; $x++) { 
        $med += $notas[$i][$x];
    }
    $med = ($med / 3);
    echo('Medias: '.$med.'<br>');
    $med = 0;
}*/

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//----- CRIAR UMA MATRIZ QUE REPRESENTE UM CONJUNTO DE 4 TIMES. CADA TIME TERÁ PONTOS DE ACORDO COM O RESULTADO DO JOGO. VERIFICAR A PONTUAÇÃO FINAL DE CADA UM -----

/*$times = array(
    array(3, 1, 1),
    array(1, 1, 3),
    array(1, 3, 0),
    array(0, 0, 1)
);

for ($i = 0; $i < 4; $i++) {
    $pontos = ($times[$i][0] + $times[$i][1] + $times[$i][2]) / 3;
    echo ("Pontos do time " . ($i + 1) . ": $pontos <br>");
}

echo "<br>------------------<br>";

for ($x = 0; $x < 4; $x++) {
    $pont = 0;
    for ($y = 0; $y < 3; $y++) {
        $pont += $times[$x][$y]; 
    }
    $pont = ($pont /3);
    echo ("Pontos do time " . ($x + 1) . ": $pont <br>");
}*/
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//----------------------------------------------------------------- ATIVIDADE MEDIA DOS ALUNOS ------------------------------------------------------------
$todasAsNotas = array(
    array("nota1" => 8, "nota2" => 9, "nota3" => 10),
    array("nota1" => 2, "nota2" => 7, "nota3" => 10),
    array("nota1" => 6, "nota2" => 3, "nota3" => 5),
    array("nota1" => 9, "nota2" => 9, "nota3" => 10),
    array("nota1" => 8, "nota2" => 10, "nota3" => 10),
);
foreach ($todasAsNotas as $index => $notas) {
    $media = 0;
    foreach ($notas as $key => $value) {
        $media += $value;
    }
    $media = round($media / 3, 2);
    echo ("Media do Aluno ".($index+1). " = $media <br>");
}