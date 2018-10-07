<?php
require_once("conecta.php");

function listaCategorias($mysqli) {
    $categorias = array();
    $query = "select * from categorias";
    $resultado = $mysqli->query($query);
    while($categoria_array = $resultado->fetch_assoc()) {
        $categoria = new Categoria();
        $categoria->id = $categoria_array['id'];
        $categoria->nome = $categoria_array['nome'];
        array_push($categorias, $categoria);
    }
    return $categorias;
}
