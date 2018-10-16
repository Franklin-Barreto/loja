<?php

class Produto
{

    private $id;

    private $nome;

    private $preco;

    private $descricao;

    private $categoria;

    private $usado;

    public function __construct($nome, $preco, $descricao, Categoria $categoria, $usado)
    {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
        $this->usado = $usado;
    }

    public function __set($nome, $valor)
    {
        $this->$nome = $valor;
    }

    public function __get($nome)
    {
        return $this->$nome;
    }

    public function precoComDesconto($valorDesconto = 0.1)
    {
        if ($valorDesconto > 0 && $valorDesconto <= 0.5)
            $this->preco -= $this->preco * $valorDesconto;
        return $this->preco;
    }

    public function temIsbn()
    {
        return $this instanceof Livro;
    }

    public function temTaxaImpressao()
    {
        return $this instanceof LivroFisico;
    }

    public function temWaterMark()
    {
        return $this instanceof Ebook;
    }

    public function atualizaBaseadoEm($params)
    {
        if ($this->temIsbn()) {
            $this->isbn = $params["isbn"];
        }
        if ($this->temWaterMark()) {
            $this->waterMark = $params["waterMark"];
        }
        if ($this->temTaxaImpressao()) {
            $this->taxaImpressao = $params["taxaImpressao"];
        }
    }

    public function calculaImposto()
    {
        return $this->preco * 0.195;
    }
}