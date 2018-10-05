<?php
require_once("conecta.php");

function listaCategorias($mysqli) {
    $categorias = array();
    $query = "select * from categorias";
    $resultado = $mysqli->query($query);
    while($categoria = $resultado->fetch_assoc()) {
        array_push($categorias, $categoria);
    }
    return $categorias;
}
