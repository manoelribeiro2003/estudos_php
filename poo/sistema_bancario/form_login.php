<?php
include_once ("./head.php");

echo ("
        <body>
            <div class='card container mt-3'>
                <div class='mt-2'>
                    <h2 style='text-align: center;' class='mt-0'>LOGIN CONTA BANCÁRIA</h2>
                </div>
                <form action='./login.php' method='POST'>
                    <div class='mb-3'>
                        <label class='form-label'>Agência*</label>
                        <input value='' type='text' class='form-control' id='agencia' name='agencia' onblur='V_produto(this)' maxlength=\"10\" required>
                        <div id='alertaAgencia' class='form-text'></div>
                    </div>
                    <div class='mb-3'>
                        <label class='form-label'>Conta*</label>
                        <input value='' type='text' class='form-control' id='conta' name='conta' onblur='V_valor(this)' maxlength=\"10\" required>
                        <div id='alertaConta' class='form-text'></div>
                    </div>
                    <div class='mb-3'>
                        <label class='form-label'>Senha*</label>
                        <input value='' type='text' class='form-control' id='senha' name='senha' onblur='V_quantidade(this)' maxlength=\"6\" required>
                        <div id='alertaSenha' class='form-text'></div>
                    </div>
                    <input type='hidden' name= 'id' value=''>
                    <div class='mb-3'>
                        <input type='submit' class='btn btn-primary' onblur='V_cadastrar(this)' value='Atualizar'>
                    </div>
                </form>
            </div>
        </body>
")

?>