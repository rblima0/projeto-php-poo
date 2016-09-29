<?php
//função para listar os produtos
class produtoDAO {
	private $conexao;

	function __construct($conexao){
		$this->conexao = $conexao;
	}

	function listaProdutos(){
		$produtos = array();
		$resultado = mysqli_query($this->conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id");
		while ($produto_atual = mysqli_fetch_assoc($resultado)) {

			$isbn = $produto_atual['isbn'];
      $tipoProduto = $produto_atual['tipoProduto'];

			$categoria = new Categoria;
			$categoria->setNome($produto_atual["categoria_nome"]);

			if($tipoProduto == "Livro"){
				$produto = new Livro($produto_atual["nome"], $produto_atual["preco"], $produto_atual["descricao"], $categoria, $produto_atual["usado"]);
				$produto->setIsbn($isbn);
			}else{
				$produto = new Produto($produto_atual["nome"], $produto_atual["preco"], $produto_atual["descricao"], $categoria, $produto_atual["usado"]);
			}

			$produto->setId($produto_atual["id"]);

			array_push($produtos, $produto);
		}
		return $produtos;
	}

	//função para inserir novos produtos
	function insereProduto(Produto $produto) {
		if ($produto->temIsbn()) {
        $isbn = $produto->getIsbn();
    } else {
        $isbn = "";
    }

		$tipoProduto = get_class($produto);

	    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado, isbn, tipoProduto) values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, {$produto->getUsado()}, '{$isbn}', '{$tipoProduto}')";
	    return mysqli_query($this->conexao, $query);
	}

	//funcao para alterar o produto
	function alteraProduto(Produto $produto){
		if ($produto->temIsbn()) {
        $isbn = $produto->getIsbn();
    } else {
        $isbn = "";
    }

    $tipoProduto = get_class($produto);

		$query = "update produtos set nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', categoria_id= {$produto->getCategoria()->getId()}, usado = {$produto->getUsado()}, isbn = '{$isbn}', tipoProduto = '{$tipoProduto}' where id = '{$produto->getId()}'";
		return mysqli_query($this->conexao, $query);
	}

	//função para buscar um produto para altera-lo
	function buscaProduto($id) {
	    $query = "select * from produtos where id = {$id}";
	    $resultado = mysqli_query($this->conexao, $query);
	    return mysqli_fetch_assoc($resultado);
	}

	//função para remover produtos
	function removeProduto($id){
		$query = "delete from produtos where id = {$id}";
		return mysqli_query($this->conexao, $query);
	}
}
