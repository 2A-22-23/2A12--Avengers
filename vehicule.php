<?php
	class vehicule{
		private $matricule=null;
		private $marque=null;
		private $couleur=null;
		private $kilometrage=null;
        private $carburant=null;
		private $image=null;
		private $NomC=null;

		
		function __construct($marque,$couleur,$kilometrage,$carburant, $image,$NomC){
			$this->marque=$marque;
			$this->couleur=$couleur;
			$this->kilometrage=$kilometrage;
			$this->carburant=$carburant;
			$this->image=$image;
            $this->NomC=$NomC;
		}
		function getmatricule(){
			return $this->matricule;
		}
		function getmarque(){
			return $this->marque;
		}
		function getcouleur(){
			return $this->couleur;
		}
		function getkilometrage(){
			return $this->kilometrage;
		}
        
        
        function getcarburant(){
        return $this->carburant;
        }

		function getimage(){
			return $this->image;
		}
		function getNomC(){
			return $this->NomC;
		}
		function setmarque(string $marque){
			$this->marque=$marque;
		}
		function setcouleur(string $couleur){
			$this->couleur=$couleur;
		}
		function setkilometrage(int $kilometrage){
			$this->kilometrage=$kilometrage;
		}
        function setcarburant(string $carburant){
			$this->carburant=$carburant;
		}
		function setimage(string $image){
			$this->image=$image;
		}
		function setNomC(string $NomC){
			$this->NomC=$NomC;
		}
	}
	
?>