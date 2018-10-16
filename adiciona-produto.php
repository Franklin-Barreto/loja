<?php
require_once ("cabecalho.php");
require_once ("logica-usuario.php");

verificaUsuario();

$tipoProduto = $_POST['tipoProduto'];
$factory = new ProdutoFactory($mysqli);
$produto = $factory->criaProduto($tipoProduto, $_POST);

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
