<?php require_once("cabecalho.php");
      require_once("logica-usuario.php");

$id = $_POST['id'];
$dao = new ProdutoDao($mysqli);
$dao->removeProduto($id);
$_SESSION["success"] = "Produto removido com sucesso.";
header("Location: produto-lista.php");
die();
?>
