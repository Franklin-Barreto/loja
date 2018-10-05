<?php
require_once('conecta.php');

function buscaUsuario($mysqli,$email, $senha) {
    $senhaMd5 = md5($senha);
    $query = "select * from usuarios where email='{$email}' and senha='{$senhaMd5}'";
    $resultado = $mysqli->query($query);
    $usuario = $resultado->fetch_assoc();
    return $usuario;
}
