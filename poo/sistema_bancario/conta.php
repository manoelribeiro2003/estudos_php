<?php

class Conta
{
   private $agencia = "";
   private $conta = "";
   private $saldo = 0;
   private $senha = "";

   public function selecionarConta($conta, $conn): array
   {
      try {
         $sql = "SELECT * FROM contas WHERE conta = $conta";
         $linha = $conn->selecionar($sql);
         return $linha;
      } catch (Exception $e) {
         die("A conexão falhou: " . $e);
      }
   }

   //  public function __construct($agencia, $conta, $saldo, $senha)
   //  {
   //      $this->agencia = $agencia;
   //      $this->conta = $conta;
   //      $this->saldo = $saldo;
   //      $this->senha = $senha;
   //  }

   public function getAgencia()
   {
      return $this->agencia;
   }
   public function setAgencia($agencia)
   {
      $this->agencia = $agencia;
   }

   public function getConta()
   {
      return $this->conta;
   }
   public function setConta($conta)
   {
      $this->conta = $conta;
   }

   public function getSaldo($num_conta, $conn)
   {
      $sql = "SELECT saldo FROM contas WHERE conta = $num_conta";
      $linha = $conn->selecionar($sql);
      return $linha['saldo'];
   }
   public function setSaldo($saldo)
   {
      $this->saldo = $saldo;
   }

   public function getSenha()
   {
      return $this->senha;
   }
   public function setSenha($senha)
   {
      $this->senha = $senha;
   }
}
