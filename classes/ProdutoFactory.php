<?php

class ProdutoFactory
{

    private $mysqli;

    private $classes = array(
        "Produto",
        "LivroFisico",
        "Ebook"
    );

    public function __construct($conexao)
    {
        $this->mysqli = $conexao;
    }

    public function criaProduto($tipoProduto, $params)
    {
        $categoria = new Categoria();
        foreach ($params as $key => $value) {
            if (strpos($key, "_")) {
                $key = str_replace("categoria_", "", $key);
                $categoria->$key = $this->mysqli->real_escape_string($value);
            } else {
                $$key = $this->mysqli->real_escape_string($value);
            }
        }
        $usado = isset($usado) ? "true" : "false";
        // $categoria->id = $categoria_id;
       
        if (in_array($tipoProduto, $this->classes)) {
            $ultimoParametro = $tipoProduto == "Ebook" ? $waterMark : $tipoProduto == "LivroFisico" ? $taxaImpressao : "";
            $produto = new $tipoProduto($nome, $preco, $descricao, $categoria, $usado, $isbn, $ultimoParametro);
            $produto->id = $id;
        } else {
            $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
            $produto->id = $id;
        }
      //  $produto->atualizaBaseadoEm($params);
        return $produto;
    }
}

