<?php

include_once('conexao.php');
include_once('head.php');


$sql = "SELECT id, produto FROM produtos ORDER BY produto";
$result = $conn->query($sql);

// if ($result) {
//     echo("
//     <div class='container card mt-2'>
//         <h2>Lista de Produtos</h2>
//         <form action='./dropdown_pesquisa.php' method='POST'>
//             <select class='form-select' name='id_produto'>"    
//     );
//     while ($linha = mysqli_fetch_array($result)) {
//         echo("
//                 <option value='$linha[id]'>$linha[produto]</option>
//         ");
//     }
//     echo("
//             </select>
//             <input class='btn btn-danger mt-2 mb-2' type='submit' value='Pesquisar'></input>
//         </form>
//     </div>
//         ");
// }

// USANDO O FOREACH

// if ($result) {
//     echo("
//     <div class='container card mt-2'>
//         <h2>Lista de Produtos</h2>
//         <form action='./dropdown_pesquisa.php' method='POST'>
//             <select class='form-select' name='id_produto'>"
//     );

//     foreach ($result as $linha) {
//         echo("
//                 <option value='{$linha['id']}'>{$linha['produto']}</option>
//         ");
//     }

//     echo("
//             </select>
//             <input class='btn btn-danger mt-2 mb-2' type='submit' value='Pesquisar'></input>
//         </form>
//     </div>
//     ");
// }

//USANDO A FUNÇÃO 

if ($result) {
    echo("
    <div class='container card mt-2'>
        <h2>Lista de Produtos</h2>
        <form action='./dropdown_pesquisa.php' method='POST'>
            <select class='form-select' name='id_produto'>"
    );

    foreach ($result as $linha) {
        echo("
                <option value='{$linha['id']}'>{$linha['produto']}</option>
        ");
    }

    echo("
            </select>
            <input class='btn btn-danger mt-2 mb-2' type='submit' value='Pesquisar'></input>
        </form>
    </div>
    ");
}