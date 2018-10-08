<?php
require_once ('conecta.php');

function listaProdutos($mysqli)
{
    $produtos = array();
    $resultado = $mysqli->query("select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id");
    if ($resultado) {
        while ($produto = $resultado->fetch_assoc()) {
            array_push($produtos, $produto);
        }
    }
    return $produtos;
}

function insereProduto($mysqli,Produto $produto)
{
    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado)
        values ('{$produto->nome}', {$produto->preco}, '{$produto->descricao}', {$produto->categoria_id}, {$produto->usado})";
    return $mysqli->query($query);
}

function alteraProduto($mysqli, Produto $produto)
{
    $query = "update produtos set nome = '{$produto->nome}', preco = {$preco}, descricao = '{$descricao}',
        categoria_id= {$categoria_id}, usado = {$usado} where id = '{$id}'";
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
    return $resultado->fetch_assoc();
}
