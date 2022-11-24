<?php
	include '../Config.php';
	include_once '../Model/reclamation.php';
	class ReclamationsC {




/////..............................Afficher............................../////
		function Afficherreclamation(){
			$sql="SELECT * FROM reclamation";
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
		function Supprimerreclamation($idR){
			$sql="DELETE FROM reclamation WHERE idR=:idR";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idR', $idR);   
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}







/////..............................Ajouter............................../////
		function Ajouterreclamation($reclamation){
			$sql="INSERT INTO reclamation (prenom,adresse,telephone,message,idC) 
			VALUES (:prenom,:adresse,:telephone,:message,:idC)";
			
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'prenom' => $reclamation->getprenom(),
					'adresse' => $reclamation->getadresse(),
					'telephone' => $reclamation->gettelephone(),
					'message' => $reclamation->getmessage(),
					'idC' =>$reclamation->getNomC(),
					
			]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}







/////..............................Affichage par la cle Primaire............................../////
		function Recupererreclamation($id){
			$sql="SELECT * from reclamation where idR=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$reclamation=$query->fetch();
				return $reclamation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		



/////..............................search............................../////
		function Recherche($prenomP){
			$sql="SELECT * from reclamation where prenom like '".$prenomP."%' ";
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
function trireclamation(){
	$sql="SELECT * FROM reclamation order by prenom ASC";
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
		function Modifierreclamation($reclamation, $id){
			try {
				$db = config::getConnexion();
		$query = $db->prepare('UPDATE reclamation SET  prenom = :prenom, adresse = :adresse, telephone = :telephone , message = :message,  NomC=:NomC WHERE idR= :id');
				$query->execute([
					'prenom' => $reclamation->getprenom(),
					'adresse' => $reclamation->getadresse(),
					'telephone' => $reclamation->gettelephone(),
					'message' => $reclamation->getmessage(),
				
					'idC' =>$reclamation->getNomC(),
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
