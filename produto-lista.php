<?php
require_once ("cabecalho.php");
?>

<table class="table table-striped table-bordered">

    <?php
    $dao = new ProdutoDao($mysqli);
    $produtos = $dao->listaProdutos();
    foreach ($produtos as $produto) :
        ?>
    <tr>
		<td><?= $produto->nome ?></td>
		<td><?= $produto->preco ?></td>
		<td><?= $produto->calculaImposto() ?></td>
		<td><?= substr($produto->descricao, 0, 40) ?></td>
		<td><?= $produto->categoria->nome ?></td>
		<td><?= $produto->isbn?"ISBN:".$produto->isbn:"" ?></td>
		<td><a class="btn btn-primary"
			href="produto-altera-formulario.php?id=<?=$produto->id?>">alterar</a></td>
		<td>
			<form action="remove-produto.php" method="post">
				<input type="hidden" name="id" value="<?=$produto->id?>" />
				<button class="btn btn-danger">remover</button>
			</form>
		</td>
	</tr>
    <?php
    endforeach
    ;
    ?>
</table>

<?php require_once("rodape.php"); ?>
