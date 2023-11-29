<?php
include_once('cores.php');
$conn = new mySqli('localhost', 'root', '', 'bd_escola');

if($conn->connect_error){
    die(red('Erro ao conectar-se: ').$conn->connect_error);
}else {
    // echo(green('Conexão bem sucedida'));
}
?>