<?php
function carregaClasse($nomeDaClasse) {
	require_once("class/".$nomeDaClasse.".php");
}
spl_autoload_register("carregaClasse");

error_reporting(E_ALL ^ E_NOTICE);
require_once("mostra-alerta.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Loja</title>
	<link rel="stylesheet" href="css/loja.css">
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Minha Loja</a>
			</div>

			<div class="navbar-right">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Index</a></li>
					<li><a href="produto-lista.php">Produtos</a></li>
					<li><a href="produto-formulario.php">Adiciona Produto</a></li>
					<li><a href="contato.php">Contato</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="principal">
			<?php
			mostraAlerta("success");
			mostraAlerta("danger");
			?>
