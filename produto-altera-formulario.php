<?php require_once("conecta.php");
require_once("cabecalho.php");

$produtoDAO = new ProdutoDAO($conexao);
$categoriaDAO = new CategoriaDAO($conexao);

$id = $_GET['id'];
$produto_buscado = $produtoDAO->buscaProduto($id);

$categoria = new Categoria;
$categoria->setId($produto_buscado["categoria_id"]);

$categorias = $categoriaDAO->listaCategorias();
$usado = $produto_buscado['usado'] ? "checked='checked'" : "";

$isbn = $produto_buscado['isbn'];
$tipoProduto = $produto_buscado['tipoProduto'];

if ($tipoProduto == "Livro") {
    $produto = new Livro($produto_buscado["nome"], $produto_buscado["preco"], $produto_buscado["descricao"], $categoria, $usado);
    $produto->setIsbn($isbn);
} else {
    $produto = new Produto($produto_buscado["nome"], $produto_buscado["preco"], $produto_buscado["descricao"], $categoria, $usado);
}

$produto->setId($produto_buscado["id"]);
?>

<h1>Formulário Alterar Produto</h1>
	<form action="altera-produto.php" method="post">
		<input type="hidden" name="id" value="<?=$produto->getId()?>">
		<table class="table">

			<?php include ("produto-formulario-base.php") ?>

			<tr>
				<td><button class="btn btn-primary" type="submit">Alterar</button></td>
			</tr>

		</table>
	</form>

<?php include ("rodape.php"); ?>
