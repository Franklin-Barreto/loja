<?php

class CategoriaDao
{
    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }
    
    function listaCategorias() {
        $categorias = array();
        $query = "select * from categorias";
        $resultado = $this->mysqli->query($query);
        while($categoria_array = $resultado->fetch_assoc()) {
            $categoria = new Categoria();
            $categoria->id = $categoria_array['id'];
            $categoria->nome = $categoria_array['nome'];
            array_push($categorias, $categoria);
        }
        return $categorias;
    }
}

