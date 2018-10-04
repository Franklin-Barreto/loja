<?php

include ("cabecalho.php");
include ("conecta.php");
include ("banco-produto.php");
include ("logica-usuario.php");

verificaUsuario();

extract($_POST, EXTR_OVERWRITE);
$usado = isset($usado) ? "true" : "false";

if (insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)) {
    ?>
<p class="text-success">O produto <?= $nome; ?>, <?= $preco; ?> adicionado com sucesso!</p>
<?php

} else {
    $msg = mysqli_error($conexao);
    ?>
<p class="text-danger">O produto <?= $nome; ?> não foi adicionado: <?= $msg ?></p>
<?php
}
?>

<?php include("rodape.php"); ?>
