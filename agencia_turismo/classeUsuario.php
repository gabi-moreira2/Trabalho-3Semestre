<?php

	class Usuario{
	
		private $id_cliente;
		private $nome;
		private $sexo;
		private $data_nascimento;
		private $email;
		private $senha;
		private $permissao;
		
		public function __construct($parametros){
			if(isset($parametros["id_cliente"])){
				$this->id_cliente = $parametros["id_cliente"];
			}
			$this->nome = $parametros["nome"];
			$this->sexo = $parametros["sexo"];
			$this->data_nascimento = $parametros["data_nascimento"];
			$this->email = $parametros["email"];
			$this->senha = $parametros["senha"];
			$this->permissao = $parametros["permissao"];			
		}
		
		public function get_nome(){
			return($this->nome);
		}
	
		public function get_email(){
			return($this->email);
		}	
		public function get_permissao(){
			return($this->permissao);
		}

	}



?>