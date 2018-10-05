<?php
$mysqli = new mysqli('localhost', 'root', '', 'loja');

if ($mysqli->connect_errno) {
    printf("Erro ao conectar ao banco de dados", $mysqli->connect_error);
}

