<?php
	class Produto {
		private $id;
		private $nome;
		private $preco;
		private $descricao;
		private $categoria;
		private $usado;

		function __construct($nome, $preco, $descricao, Categoria $categoria, $usado) {
		    $this->setNome($nome);
		    $this->setPreco($preco);
		    $this->setDescricao($descricao);
		    $this->setCategoria($categoria);
		    $this->setUsado($usado);
		}

		function __toString() {
      return $this->nome.":".$this->preco;
		}

		public function temIsbn() {
    	return $this instanceof Livro;
		}

		public function calculaImposto() {
			return $this->preco * 0.20;
		}

    /*function __destruct() {
      echo "o objeto $this->nome foi destruido";
    }*/

		public function valorComDesconto($valor = 0.1) {
			if($valor > 0 && $valor <= 0.5 ){
				$this->preco -= $this->preco * $valor;
			}
			return $this->preco;
		}

		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}

		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getpreco(){
			return $this->preco;
		}
		public function setPreco($preco){
			if($preco > 0){
				$this->preco = $preco;
			}
		}

		public function getDescricao(){
			return $this->descricao;
		}
		public function setDescricao($descricao){
			$this->descricao = $descricao;
		}

		public function getCategoria(){
			return $this->categoria;
		}
		public function setCategoria($categoria){
			$this->categoria = $categoria;
		}

		public function getUsado(){
			return $this->usado;
		}
		public function setUsado($usado){
			$this->usado = $usado;
		}
	}
?>
