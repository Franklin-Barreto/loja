<?php
require_once ("cabecalho.php");
require_once ("logica-usuario.php");

verificaUsuario();
$categoria = new Categoria();
$categoria->id = 1;

$dao = new CategoriaDao($mysqli);
$categorias = $dao->listaCategorias();
$produto = new Produto('','','',$categoria,'');
?>

<h1>Formulário de produto</h1>
<form action="adiciona-produto.php" method="post">
	<table class="table">
       <?php require_once("produto-formulario-base.php")?>
        <tr>
			<td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
		</tr>
	</table>
</form>

<?php require_once("rodape.php"); ?>
