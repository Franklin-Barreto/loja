<?php

abstract class Livro extends Produto
{

    protected $isbn;

    public function calculaImposto()
    {
        return $this->preco * 0.065;
    }
}

