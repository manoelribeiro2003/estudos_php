<?php



//$sql -> comando sql

//$result -> objeto resultante da query do tipo mysli_result 
// $result = $conn->query($sql);

//$linha -> um int que é o numero de registros encontrados no result (que é resultado da query)
// $linha = $result->num_rows;

//$usuario -> é um array que contem os dados do registro => 
// $usuario = $result->fetch_assoc();

include_once('./conexao.php');

if (isset($_POST['email']) || isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo ('Preencha seu email!');
    } elseif (strlen($_POST['senha']) == 0) {
        echo ('Preencha sua senha');
    } else {
        $email = $conn->real_escape_string($_POST['email']); //limpar a string de caracteres especiais - evitar mysql injection
        $senha = $conn->real_escape_string($_POST['senha']); //limpar a string de caracteres especiais - evitar mysql injection

        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";//Comando SQL
        $result = $conn->query($sql);

        if ($result) {//Se a query for bem sucedida e $result um objeto tipo mysli_result

           $linha = $result->num_rows;//$linha recebe o numero de registros da query
           
           if ($linha == 1) {//se o numero de registros for igual a 1

            $usuario = $result->fetch_assoc();
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header('Location:./painel.php');

           }else {//se tiver mais de um ou 0, para aqui codigo

            die('Falha ao logar! Email ou senha incorretos!');

           }

        }else {//Se a query nao for bem sucedida, para aqui
            die('Erro no comando SQL');
        }
         

        

        

        

    }
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Acesse sua conta</h1>
    <form action="" method="POST">
        <p>
            <label>Email</label>
            <input type="text" name="email">
        </p>
        <p>
            <label>Senha</label>
            <input type="password" name="senha">
        </p>
        <button type="submit">ENTRAR</button>
    </form>
</body>

</html>