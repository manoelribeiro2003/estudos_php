<?php

class Conta
{
    private $agencia = "";
    private $conta = "";
    private $saldo = 0;
    private $senha = "";

    public function __construct($agencia, $conta, $saldo, $senha)
    {
        $this->agencia = $agencia;
        $this->conta = $conta;
        $this->saldo = $saldo;
        $this->senha = $senha;
    }

    public function getAgencia(){
       return $this->agencia;
    }
    public function setAgencia($agencia){
       $this->agencia = $agencia;
    }

    public function getConta(){
       return $this->conta;
    }
    public function setConta($conta){
       $this->conta = $conta;
    }

    public function getSaldo(){
       return $this->saldo;
    }
    public function setSaldo($saldo){
       $this->saldo = $saldo;
    }

    public function getSenha(){
       return $this->senha;
    }
    public function setSenha($senha){
       $this->senha = $senha;
    }
}
