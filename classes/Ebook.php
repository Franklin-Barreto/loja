<?php

class Ebook extends Livro
{

    protected $waterMark;

    public function __construct($nome, $preco, $descricao, Categoria $categoria, $usado, $isbn, $waterMark)
    {
        $this->waterMark = $waterMark;
    }
}

