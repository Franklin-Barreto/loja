<?php

require_once ("cabecalho.php");
require_once ("banco-categoria.php");
require_once ("logica-usuario.php");
require_once 'classes\Categoria.php';
require_once 'classes\Produto.php';

verificaUsuario();
$categoria = new Categoria();
$categoria->id = 1;

$categorias = listaCategorias($mysqli);
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
