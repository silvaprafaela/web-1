<?php 
	class Fornecedores{
		//declarando variaveis//
		private $nomeFornecedor;
		private $dataFundacao;
		private $email;

		//construtor//
		public function __construct($nomeFornecedor, $dataFundacao, $email){
			$this->setNomeFornecedor($nomeFornecedor);
			$this->setDataFundacao($dataFundacao);
			$this->setEmail($email);
		}
		//pega e entrega NOME DO FORNECEDOR//
		public function setNomeFornecedor($nomeFornecedor){
			$this->nomeFornecedor= $nomeFornecedor;
		}
		public function getNomeFornecedor(){
			return $this->nomeFornecedor;
		}
		//pega e entrega DATA DE FUNDACAO//
		public function setDataFundacao($dataFundacao){
			$dataFundacao = explode('/',$dataFundacao);
			$this->dataFundacao= "$dataFundacao[2]-$dataFundacao[1]-$dataFundacao[0]";			
		}
		public function getDataFundacao(){
			return $this->dataFundacao;
		}
		//pega e entrega o EMAIL//
		public function setEmail($email){
			$this->email= $email;
		}
		public function getEmail(){
			return $this->email;
		}
	}
?>
