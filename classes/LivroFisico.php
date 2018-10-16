<?php

class LivroFisico extends Livro
{

    protected $taxaImpressao;

    public function __construct($nome, $preco, $descricao, Categoria $categoria, $usado, $isbn,$taxaImpressao)
    {
        parent::__construct($nome, $preco, $descricao, $categoria, $usado);
        $this->isbn = $isbn;
        $this->taxaImpressao = $taxaImpressao;
    }
}

