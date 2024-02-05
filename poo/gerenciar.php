<?php

include('./Produto.php');
$p = new Produto();
$p->nome = 'batata';
echo ('Produto: ' . $p->nome);


