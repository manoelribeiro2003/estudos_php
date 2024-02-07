<?php

class Conexao
{
    public function criarConexao()
    {
        try {
            $conn = new MySqli('localhost', 'root', '', 'banco');
            $conn->connect_error;
        } 
        catch (Exception $e) {
            $conn = $conn->connect_error;
            echo("Connection failed: " . $e->getMessage());
        } 
        finally {
            return $conn;
        }
    }
}
