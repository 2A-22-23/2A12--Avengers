<?php
	include '../Config.php';
	include_once '../Model/Vehicule.php';
	class vehiculeC {




/////..............................Afficher............................../////
		function AfficherVehicule(){
			$sql="SELECT * FROM vehicule";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}




		


/////..............................Supprimer............................../////
		function SupprimerVehicule($matricule){
			$sql="DELETE FROM vehicule WHERE matricule=:matricule";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':matricule', $matricule);   
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}







/////..............................Ajouter............................../////
		function AjouterVehicule($vehicule){
			$sql="INSERT INTO vehicule (marque,couleur,kilometrage,carburant,image,idC) 
			VALUES (:marque,:couleur,:kilometrage,:carburant,:image,:idC)";
			
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'marque' => $vehicule->getmarque(),
					'couleur' => $vehicule->getcouleur(),
					'kilometrage' => $vehicule->getkilometrage(),
					'carburant' => $vehicule->getcarburant(),
					'image' => $vehicule->getimage(),
					'idC' =>$vehicule->getNomC(),
					
			]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}







/////..............................Affichage par la cle Primaire............................../////
		function RecupererVehicule($matricule){
			$sql="SELECT * from vehicule where matricule=$matricule";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$vehicule=$query->fetch();
				return $vehicule;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		



/////..............................search............................../////
		function Recherche($marqueP){
			$sql="SELECT * from vehicule where marque like '".$marqueP."%' ";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}


/////..............................tri............................../////
function triVehicule(){
	$sql="SELECT * FROM vehicule order by marque ASC";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur:'. $e->getMessage());
	}
}

/////..............................Update............................../////
		function ModifierVehicule($vehicule, $id){
			try {
				$db = config::getConnexion();
		$query = $db->prepare('UPDATE vehicule SET  marque = :marque, couleur = :couleur, kilometrage = :kilometrage, carburant = :carburant, image = :image , NomC = :NomC   WHERE matricule= :id');
				$query->execute([
					'marque' => $vehicule->getmarque(),
					'couleur' => $vehicule->getcouleur(),
					'kilometrage' => $vehicule->getkilometrage(),
					'carburant' => $vehicule->getcarburant(),
					'image' => $vehicule->getimage(),
					'NomC' => $vehicule->getNomC(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		
		
	function RecupererCategorie($idC){
		$sql="SELECT * from categorie where idC=$idC";
		$db = config::getConnexion();
		try{
			$query=$db->prepare($sql);
			$query->execute();

			$categorie=$query->fetch();
			return $categorie;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
	}
}

?>
