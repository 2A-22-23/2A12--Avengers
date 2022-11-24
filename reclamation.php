<?php
	class Reclamation{


		private $idR=null;
		private $prenom=null;
		private $adresse=null;
        private $telephone=null;
		private $message=null;
		private $NomC=null;

		
		function __construct($prenom,$adresse,$telephone,$message,$NomC){
			$this->prenom=$prenom;
			$this->adresse=$adresse;
			$this->telephone=$telephone;
			$this->message=$message;
			$this->NomC=$NomC;
		}


		function getidR(){
			return $this->idR;
		}
        function getprenom(){
			return $this->prenom;
		}
		function getadresse(){
			return $this->adresse;
		}
		function gettelephone(){
			return $this->telephone;
		}
		function getmessage(){
			return $this->message;
		}
        
		function getNomC(){
			return $this->NomC;
		}


		function setprenom(string $prenom){
			$this->prenom=$prenom;
		}
		function setadresse(string $adresse){
			$this->adresse=$adresse;
		}
		function settelephone(int $telephone){
			$this->telephone=$telephone;
		}
        function setmessage(string $message){
			$this->message=$message;
		}
		
		function setNomC(string $NomC){
			$this->NomC=$NomC;
		}
	}
	
?>