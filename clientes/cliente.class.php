<?php 
	class clientes{
		//decarando variaveis//
		private $nomeCliente;
		private $email;
		private $dataCadastro;

		//construtor//
		public function __construct($nomeCliente, $dataCadastro, $email){
			$this->setNomeCliente($nomeCliente);			
			$this->setDataCadastro($dataCadastro);
			$this->setEmail($email);
		}
		//pega e entrega NOME//
		public function setNomeCliente($nomeCliente){
			$this->nomeCliente= $nomeCliente;
		}
		public function getNomeCliente(){
			return $this->nomeCliente;
		}
		
		//pega e entrega EMAIL//
		public function setEmail($email){
			$this->email= $email;
		}
		public function getEmail(){
			return $this->email;
		}		
		
		
		//pega e entrega DATA CADASTRO//
		public function setDataCadastro($dataCadastro){
			$data = explode('/',$dataCadastro);
			$this->dataCadastro= "$data[2]-$data[1]-$data[0]";			
		}
		public function getDataCadastro(){
			return $this->dataCadastro;
		}
		
	}

?>
