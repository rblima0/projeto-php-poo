<?php require_once("conecta.php");
require_once("cabecalho.php");
require_once("logica-usuario.php");

verificaUsuario();

$categoriaDAO = new CategoriaDAO($conexao);

$categoria = new Categoria;
$categoria->setId(1);

$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);

$categorias = $categoriaDAO->listaCategorias();
?>

<h1>Formulário de Cadastro</h1>
	<form action="adiciona-produto.php" method="post">
		<table class="table">

			<?php include("produto-formulario-base.php") ?>

			<tr>
				<td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
			</tr>

		</table>
	</form>

<?php include ("rodape.php"); ?>
