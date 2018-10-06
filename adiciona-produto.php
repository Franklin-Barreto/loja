<?php
require_once ("cabecalho.php");
require_once ("banco-produto.php");
require_once ("logica-usuario.php");
require_once 'class\Produto.php';

verificaUsuario();
$produto = new Produto();
foreach ($_POST as $key => $value) {
    
    $produto->$key = $mysqli->real_escape_string($value);
}
$produto->usado = isset($usado) ? "true" : "false";

if (insereProduto($mysqli,$produto)) {
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
