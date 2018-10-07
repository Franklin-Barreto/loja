<?php
require_once ("cabecalho.php");
require_once ('conecta.php');
require_once ("banco-produto.php");
?>

<?php

$categoria = new Categoria();

foreach ($_POST as $key => $value) {
    if (strpos($key, "_")) {
        $key = str_replace("categoria_", "", $key);
        $categoria->$key = $value;
    } else {
        $$key = $value;
    }
}
$usado = array_key_exists('usado', $_POST) ? "true" : "false";
$produto = new Produto($nome,$preco,$descricao,$categoria,$usado);
$produto->id = $id;
if (alteraProduto($mysqli, $produto)) {
    ?>
<p class="text-success">O produto <?= $produto->nome; ?>, <?= $produto->preco; ?> alterado com sucesso!</p>
<?php
} else {
    $msg = $mysqli->connect_error;
    ?>
<p class="text-danger">O produto <?= $produto->nome; ?> não foi alterado: <?= $msg ?></p>
<?php
}
?>

<?php require_once("rodape.php"); ?>
