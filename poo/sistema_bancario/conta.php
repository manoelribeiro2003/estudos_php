<?php

class Conta
{
   function login($agencia, $num_conta, $senha, $conn)
   {
      try {
         $sql = "SELECT agencia, conta, senha FROM contas WHERE conta = $num_conta";
         $linha = $conn->selecionar($sql);
         if ($linha['agencia'] == $agencia and $linha['conta'] == $num_conta and $linha['senha'] == md5($senha)) {
            return 'Acesso permitido';
         } else {
            return 'Acesso negado. Credenciais Inválidas';
         }
      } catch (Exception $e) {
         die("A conexão falhou: " . $e);
         return 'Acesso negado';
      }
   }

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

   function criarConta($agencia, $num_conta, $saldo, $senha, $conn)
   {
      try {
         $sql = "INSERT INTO contas (agencia, conta, saldo, senha) VALUES ('$agencia', '$num_conta', '$saldo', '" . md5($senha) . "')";
         $result = $conn->dml($sql);
         return $result ? "Conta criada com sucesso" : "Falha ao criar conta";
      } catch (Exception $e) {
         die("Erro ao criar a conta: " . $e->getMessage());
         return "Falha ao criar conta";
      }
   }

   public function depositar($num_conta, $conn, $valor)
   {
      try {

         //saber o saldo
         $saldo = $this->getSaldo($num_conta, $conn);
         //somar com o deposito
         $saldo += $valor;
         //atualizar saldo
         $result = $this->setSaldo($num_conta, $conn, $saldo);
         return $result ? "Deposito realizado com sucesso" : "Depósito não realizado";
      } catch (Exception $e) {

         die("Conexão falhou: " . $e->getMessage());
      }
   }

   function sacar($num_conta, $conn, $valor)
   {
      try {

         // saber o saldo
         $saldo = $this->getSaldo($num_conta, $conn);
         //verificar se há saldo suficiente
         if ($saldo >= $valor) {
            //caso sim, subtrair
            $saldo -= $valor;
            //e atualizar o saldo
            $result = $this->setSaldo($num_conta, $conn, $saldo);
            return $result ? "Saque realizado com sucesso" : "A operação de saque falhou";
         } else {
            echo 'Saldo insuficiente!';
         }
      } catch (Exception $e) {
         die("Conexão falhou: " . $e->getMessage());
         return 'Saque não realizado';
      }
   }

   public function getAgencia($num_conta, $conn)
   {
      $sql = "SELECT agencia FROM contas WHERE conta = $num_conta";
      $linha = $conn->selecionar($sql);
      return $linha['agencia'];
   }

   // public function setAgencia($agencia)
   // {
   //    $this->agencia = $agencia;
   // }

   // public function getConta()
   // {
   //    return $this->conta;
   // }

   // public function setConta($conta)
   // {
   //    $this->conta = $conta;
   // }

   public function getSaldo($num_conta, $conn)
   {
      $sql = "SELECT saldo FROM contas WHERE conta = $num_conta;";
      $linha = $conn->selecionar($sql);
      return $linha['saldo'];
   }
   public function setSaldo($num_conta, $conn, $saldo)
   {
      $sql = "UPDATE `contas` SET `saldo` = $saldo WHERE `conta` = $num_conta";
      $result = $conn->dml($sql);
      return $result;
   }

   public function getSenha($num_conta, $conn)
   {
      $sql = "SELECT senha FROM contas WHERE conta = $num_conta;";
      $linha = $conn->selecionar($sql);
      return $linha['senha'];
   }

   // public function setSenha($senha)
   // {
   //    $this->senha = $senha;
   // }
}
