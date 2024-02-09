<?php

class Conexao
{
    public function criarConexao(): mysqli
    {
        try {
            $conn = new MySqli('localhost', 'root', '', 'banco');
            $conn->connect_error;
        } catch (Exception $e) {
            $conn = $conn->connect_error;
            echo ("Connection failed: " . $e->getMessage());
        } finally {
            return $conn;
        }
    }

    public function selecionar($sql): array
    {
        try {
            $conexao = $this->criarConexao();
            $result = $conexao->query($sql);
            $linha = mysqli_fetch_assoc($result);
            return $linha;
        } catch (Exception $e) {
            die('A conexão falhou: ' . $e);
        } finally {
            mysqli_close($conexao);
        }
    }
}
