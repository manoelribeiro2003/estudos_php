<?php

class Produto
{
    private $nome = "";
    private $quantidade = 0;
    private $preco = 0;

    private function __construct($nome, $quantidade, $preco)
    {
        $this->nome = $nome;
        $this->quantidade = $quantidade;
        $this->preco = $preco;
    }

    public function faturamentoMax(){
        $faturamento = $this->quantidade * $this->preco;
        return $faturamento;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }


}

