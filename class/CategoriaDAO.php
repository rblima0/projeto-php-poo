<?php

class categoriaDAO {
		private $conexao;

		function __construct($conexao){
			$this->conexao = $conexao;
		}

	function listaCategorias(){
		$categorias = array();
		$resultado = mysqli_query($this->conexao, "select * from categorias");
		while($categoria_atual = mysqli_fetch_assoc($resultado)){

			$categoria = new Categoria;
			$categoria->setId($categoria_atual["id"]);
			$categoria->setNome($categoria_atual["nome"]);

			array_push($categorias, $categoria);
		}
		return $categorias;
	}
}
?>
