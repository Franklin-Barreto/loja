<?php
require_once ('conecta.php');

function listaProdutos($mysqli)
{
    $produtos = array();
    $resultado = $mysqli->query("select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id");
    if ($resultado) {
        while ($produtoB = $resultado->fetch_assoc()) {
            
            $categoria = new Categoria();
            foreach ($produtoB as $key => $value) {
                if (strpos($key, "_")) {
                    $key = str_replace("categoria_", "", $key);
                    $categoria->$key = $value;
                } else {
                    $$key = $value;
                }
            }
            $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
            $produto->id = $id;
            array_push($produtos, $produto);
        }
    }
    
    return $produtos;
}

function insereProduto($mysqli, Produto $produto)
{
    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado)
        values ('{$produto->nome}', {$produto->preco}, '{$produto->descricao}', {$produto->categoria->id}, {$produto->usado})";
    return $mysqli->query($query);
}

function alteraProduto($mysqli, Produto $produto)
{
    $query = "update produtos set nome = '{$produto->nome}', preco = {$produto->preco}, descricao = '{$produto->descricao}',
        categoria_id= {$produto->categoria->id}, usado = {$produto->usado} where id = '{$produto->id}'";
    return $mysqli->query($query);
}

function removeProduto($mysqli, $id)
{
    $query = "delete from produtos where id = {$id}";
    return $mysqli->query($query);
}

function buscaProduto($mysqli, $id)
{
    $query = "select * from produtos where id = {$id}";
    
    $resultado = $mysqli->query($query);
    $produto_buscado = $resultado->fetch_assoc();
    $categoria = new Categoria();
    $categoria->id = $produto_buscado['categoria_id'];
    
    $id = $produto_buscado['id'];
    $nome = $produto_buscado['nome'];
    $descricao = $produto_buscado['descricao'];
    $categoria = $categoria;
    $preco = $produto_buscado['preco'];
    $usado = $produto_buscado['usado'];
    $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
    $produto->id = $id;
    return $produto;
}
