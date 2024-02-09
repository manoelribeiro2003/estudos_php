<?php

include_once('./head.php');

echo ("
    <body>
        <div class='card container mt-3'>
            <div class='mb-2'>
                <h2 style='text-align: center;' class='mt-0'>OPERAÇÕES BANCÁRIAS</h2>
            </div>
            <form action='./operacoes.php' method='POST'>
                <div class='mb-3'>
                    <label class='form-label'>Conta*</label>
                    <input type='text' class='form-control' id='num_conta' name='num_conta' onblur='V_num_conta(this)'>
                    <div id='alertaNum_conta' class='form-text'></div>
                </div>
                <div class='mb-3'>
                    <label class='form-label'>Operação</label>
                    <select class='form-select' name='operacao' id='operacao'>
                        <option value='Saldo' selected>Saldo</option>
                        <option value='Saque'>Saque</option>
                        <option value='Deposito'>Depósito</option>
                    </select>
                    <div id='alertaOperacao' class='form-text'></div>
                </div>
                <div class='mb-3'>
                    <label class='form-label'>Valor*</label>
                    <input type='text' class='form-control' id='valor' name='valor' onblur='V_valor(this)'>
                    <div id='alertaValor' class='form-text'></div>
                </div>
                <input type='hidden' name= 'id' value=''>
                <div class='mb-3'>
                    <input type='submit' class='btn btn-primary' onblur='V_cadastrar(this)' value='Confirmar'>
                </div>
            </form>
        </div>
    </body>
");
