<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    die('Voce não pode acessar essa página, pois nao está logado. <a href="./index.php">Acessar</a>');
}

?>