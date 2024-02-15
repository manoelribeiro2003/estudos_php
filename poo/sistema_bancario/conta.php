<?php

class Conta
{
   private $agencia = "";
   private $conta = "";
   private $saldo = 0;
   private $senha = "";

   public function selecionarConta($num_conta, $conn): array
   {
      try {
         $sql = "SELECT * FROM contas WHERE conta = $num_conta";
         $linha = $conn->selecionar($sql);
         return $linha;
      } catch (Exception $e) {
         die("A conexão falhou: " . $e);
      }
   }

   public function depositar($num_conta, $conn, $valor)
   {
      try {
         //saber o saldo
         $saldo = $this->getsaldo($num_conta, $conn);
         //somar com o deposito
         $saldo += $valor;
         //atualizar saldo
         $result = $this->setSaldo($num_conta, $conn, $saldo);
         return $result ? "Deposito realizado com sucesso" : "Depósito não realizado";
      } catch (Exception $e) {
         die("Conexão falhou: " . $e->getMessage());
      }
   }

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
   public function setSaldo($num_conta, $conn, $saldo)
   {
      $sql = "UPDATE contas SET saldo = $saldo WHERE conta = $num_conta";
      $result = $conn->dml($sql);
      return $result;
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
