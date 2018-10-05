<?php
require_once ("cabecalho.php");
require_once ("banco-produto.php");
require_once ("logica-usuario.php");

verificaUsuario();

foreach ($_POST as $key => $value) {
    $$key = $mysqli->real_escape_string($value);
}
$usado = isset($usado) ? "true" : "false";

if (insereProduto($mysqli,$nome, $preco, $descricao, $categoria_id, $usado)) {
    ?>
<p class="text-success">O produto <?= $nome; ?>, <?= $preco; ?> adicionado com sucesso!</p>
<?php
} else {
    $msg = $mysqli->error;
    ?>
<p class="text-danger">O produto <?= $nome; ?> não foi adicionado: <?= $msg ?></p>
<?php
}
?>

<?php require_once("rodape.php"); ?>
