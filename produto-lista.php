<?php require_once("conecta.php");
require_once("cabecalho.php");
require_once("logica-usuario.php");

verificaUsuario();
?>

<table class="table table-striped table-bordered">
<?php
$produtoDAO = new ProdutoDAO($conexao);

$produtos = $produtoDAO->listaProdutos();
foreach($produtos as $produto){
?>
	<tr>
		<td><?=$produto->getNome()?></td>
		<td><?=$produto->getPreco()?></td>
		<td><?= $produto->valorComDesconto()?></td>
		<td><?= $produto->calculaImposto() ?></td>
		<td><?=substr($produto->getDescricao(), 0, 40)?></td>
		<td><?=$produto->getCategoria()->getNome()?></td>
		<td>
			<?php
				if($produto->temIsbn()){
					echo "ISBN: ".$produto->getIsbn();
				}
			?>
		</td>
		<td><a href="produto-altera-formulario.php?id=<?=$produto->getId()?>" class="btn btn-primary">Alterar</a></td>
		<td>
			<form action="remove-produto.php" method="post">
				<input type="hidden" name="id" value="<?=$produto->getId()?>" />
				<button class="btn btn-danger">Remover</button>
			</form>
		</td>
	</tr>
<?php
}
//  } ou endforeach
?>
</table>

<?php include ("rodape.php"); ?>
