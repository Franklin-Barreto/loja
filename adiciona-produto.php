<?php

require_once ("cabecalho.php");
require_once ("logica-usuario.php");

verificaUsuario();
foreach ($_POST as $key => $value) {
    
    $$key = $mysqli->real_escape_string($value);
}
$usado = isset($usado) ? "true" : "false";
$categoria = new Categoria();
$categoria->id = $categoria_id;
$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
$dao = new ProdutoDao($mysqli);
if ($dao->insereProduto($produto)) {
    ?>
<p class="text-success">O produto <?= $produto->nome; ?>, <?= $produto->preco; ?> adicionado com sucesso!</p>
<?php
} else {
    $msg = $mysqli->error;
    ?>
<p class="text-danger">O produto <?= $produto->nome; ?> não foi adicionado: <?= $msg ?></p>
<?php
}
?>

<?php require_once("rodape.php"); ?>
