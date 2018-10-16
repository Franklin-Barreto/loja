<?php

class ProdutoDao
{

    private $mysqli;

    private $factory;

    public function __construct($conexao)
    {
        $this->mysqli = $conexao;
        $this->factory = new ProdutoFactory($conexao);
    }

    function listaProdutos()
    {
        $produtos = array();
        $resultado = $this->mysqli->query("select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id");
        if ($resultado) {
            while ($produtoB = $resultado->fetch_assoc()) {

                $produto = $this->factory->criaProduto($produtoB['tipoProduto'], $produtoB);
                array_push($produtos, $produto);
            }
        }
        return $produtos;
    }

    function insereProduto(Produto $produto)
    {
        $tipoProduto = get_class($produto);
        $query = "insert into produtos (nome, preco, descricao, categoria_id, usado,isbn,tipoProduto,waterMark,taxaImpressao)
        values ('{$produto->nome}', {$produto->preco}, '{$produto->descricao}', {$produto->categoria->id}, {$produto->usado},'{$produto->isbn}','{$tipoProduto}','{$produto->waterMark}','{$produto->taxaImpressao}')";
        return $this->mysqli->query($query);
    }

    function alteraProduto(Produto $produto)
    {
        $tipoProduto = get_class($produto);
        $query = "update produtos set nome = '{$produto->nome}', preco = {$produto->preco}, descricao = '{$produto->descricao}',
        categoria_id= {$produto->categoria->id}, usado = {$produto->usado}, isbn = {$produto->isbn}, tipoProduto = '{$tipoProduto}',
 waterMark='{$produto->waterMark}', taxaImpressao='{$produto->taxaImpressao}'  where id = '{$produto->id}'";
        return $this->mysqli->query($query);
    }

    function removeProduto($id)
    {
        $query = "delete from produtos where id = {$id}";
        return $this->mysqli->query($query);
    }

    function buscaProduto($id)
    {
        $query = "select * from produtos where id = {$id}";

        $resultado = $this->mysqli->query($query);
        $produto_buscado = $resultado->fetch_assoc();
        $produto = $this->factory->criaProduto($produto_buscado['tipoProduto'], $produto_buscado);
        return $produto;
    }
}

