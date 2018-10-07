<?php require_once("cabecalho.php");
      require_once("banco-categoria.php");
    
$id = $_GET['id'];
$dao = new ProdutoDao($mysqli);
$produto = $dao->buscaProduto($id);
$categorias = listaCategorias($mysqli);

$produto->usado = $produto->usado ? "checked='checked'" : "";
?>

<h1>Alterando produto</h1>
<form action="altera-produto.php" method="post">
    <input type="hidden" name="id" value="<?=$produto->id?>" />
    <table class="table">
      	<?php require_once ("produto-formulario-base.php");?>
        <tr>
            <td><button class="btn btn-primary" type="submit">Alterar</button></td>
        </tr>
    </table>
</form>

<?php require_once("rodape.php"); ?>
