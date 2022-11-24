<?php
	class Categorie{
		private $idC=null;
		private $NomC=null;

		function __construct($NomC){
			$this->NomC=$NomC;

		}
		function getidC(){
			return $this->idC;
		}
		function getNomC(){
			return $this->NomC;
		}
		}
?>