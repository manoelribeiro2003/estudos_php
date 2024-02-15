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

    public function dml($sql){
        try {
            $conexao = $this->criarConexao();
            mysqli_query($conexao, $sql);
            if (mysqli_affected_rows($conexao)) {
                return TRUE;
            }else{
                return FALSE;
            }
        } catch (Exception $e) {
            die("A conexão falhou: ".$e->getMessage());
            return FALSE;
        }finally{
            mysqli_close($conexao);//fechar a conexão
        }
    }

}
