<?php
include('./Produto.php');

$p = new Produto("Abacaxi", 1, 5.99);
echo (
    'Produto: '. $p->getNome(). '<br>'.
    'Faturamento maximo: '.$p->faturamentoMax());