<?php
require_once ("cabecalho.php");
?>

<?php
$factory = new ProdutoFactory($mysqli);
$produto = $factory->criaProduto($_POST['tipoProduto'], $_POST);

$dao = new ProdutoDao($mysqli);
if ($dao->alteraProduto($produto)) {
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
