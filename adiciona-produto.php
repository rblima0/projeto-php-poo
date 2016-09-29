<?php require_once("conecta.php");
require_once("cabecalho.php");
require_once("logica-usuario.php");

verificaUsuario();

$categoria = new Categoria;
$categoria->setId($_POST["categoria_id"]);z

if(array_key_exists('usado', $_POST)) {
    $usado = "true";
} else {
    $usado = "false";
}

if($_POST['tipoProduto'] == "Livro"){
  $produto = new Livro($_POST['nome'], $_POST['preco'], $_POST['descricao'], $categoria, $usado);
  $produto->setIsbn($_POST["isbn"]);
}else{
  $produto = new Produto($_POST['nome'], $_POST['preco'], $_POST['descricao'], $categoria, $usado);
}

$produtoDAO = new ProdutoDAO($conexao);

if($produtoDAO->insereProduto($produto)) { ?>
	<p class="alert-success"> Produto <?= $produto->getNome() ?>, <?= $produto->getPreco() ?>  adicionado com sucesso !</p>
<?php } else {
	$msg = mysqli_error($conexao);
?>
	<p class="alert-danger">Erro, o produto <?= $produto->getNome() ?> não foi adicionado: <?= $msg?></p>
<?php
}
?>

<?php include ("rodape.php"); ?>
