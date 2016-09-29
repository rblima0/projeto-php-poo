<?php require_once("conecta.php");
require_once("cabecalho.php");

$categoria = new Categoria;
$categoria->setId($_POST['categoria_id']);

if(array_key_exists('usado', $_POST)){
	$usado = "true";
}else{
	$usado = "false";
}

if ($_POST['tipoProduto'] == "Livro") {
    $produto = new Livro($_POST['nome'], $_POST['preco'], $_POST['descricao'], $categoria, $usado);
    $produto->setIsbn($_POST["isbn"]);
} else {
    $produto = new Produto($_POST['nome'], $_POST['preco'], $_POST['descricao'], $categoria, $usado);
}

$produto->setId($_POST['id']);

$produtoDAO = new ProdutoDAO($conexao);

if($produtoDAO->alteraProduto($produto)){ ?>
	<p class="alert-success">O Produto <?=$produto->getNome()?>, <?=$produto->getPreco()?> foi alterado com sucesso!</p>
<?php } else {
	$msg = mysqli_error($conexao);
?>
	<p class="alert-danger">O produto <?=$produto->getNome()?> não foi alterado.<br><?=$msg?></p>
<?php
}
?>

<?php include ("rodape.php"); ?>
