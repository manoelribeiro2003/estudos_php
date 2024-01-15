<?php

$produtos1 = array(
    array(4.50, 50),
    array(6.50, 30),
    array(4.00, 35),
);
$soma = 0;
for ($i = 0;  $i < 3; $i++){
    echo ($produtos1[$i][1] . "<br>");
        $soma += $produtos1[$i][1];
        

}
echo "Soma = ".$soma;