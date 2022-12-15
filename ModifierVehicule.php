<?php
    include_once '../Model/vehicule.php';
    include_once '../Controller/vehiculeC.php';


    $error = "";
    $mess = "" ; 


    // create user
    $vehicule = null;

    // create an instance of the controller
    $vehiculeC = new VehiculeC();
    if (		
        isset($_POST["marque"]) &&
		isset($_POST["couleur"]) && 
        isset($_POST["kilometrage"]) &&
        isset($_POST["carburant"]) && 
        isset($_POST["image"] )&&
        isset($_POST["NomC"] )) 
        {
        if (			
            !empty($_POST["marque"]) && 
			!empty($_POST["couleur"]) && 
            !empty($_POST["kilometrage"]) &&
            !empty($_POST["carburant"]) && 
            !empty($_POST["image"]) &&
            !empty($_POST["NomC"])
        ) {
            $vehicule = new Vehicule(
                $_POST['marque'], 
				$_POST['couleur'],
                $_POST['kilometrage'],
                $_POST['carburant'],
                $_POST['image'],
                $_POST['NomC'],
            );
            $vehiculeC->ModifierVehicule($vehicule, $_GET["matricule"]);
            header('Location:AfficherVehicule.php?mess=Vehicule Modifé avec succés');
        }
        else
         //    Partie Controle Saisie //
            $error = "Missing information";
    }    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
     <script src ="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> 
    <title>Modification</title>
</head>
    <body>
    <script src="../Controle.js"></script>
        <div class="container my-5" >
        <center><h1>Modifier Produit</h1></center>
        
        <hr>
		<br>
		<br>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_GET['matricule'])){
				$vehicule = $vehiculeC->RecupererVehicule($_GET['matricule']);
				
		?>
    
        <form method="post" onchange ="Verif();" >
            <!--------------------------------------------Nom Produit------------------------------------------------->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label ">Marque</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="marque" id="marque" value="<?php echo $vehicule['marque'];?>">
                    <a id="test1"></a>
                </div>
            </div>
            <!---------------------------------------------couleur---------------------------------------------->
            <div class="row mb-3">
            <label class="col-sm-3 col-form-label ">Couleur</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="couleur" id="couleur" value="<?php echo $vehicule['couleur']; ?>">
                    <a id="test2"></a>
                </div>
            </div>

            <!---------------------------------------------Quantité---------------------------------------------->
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label " >Kilometrage</label>
                      <div class="col-sm-6">
                    <input type="number" class="form-control" name="quantite"  id="quantite" value="<?php echo $vehicule['kilometrage']; ?>">
                    <a id="test3"></a>
                      </div>
                </div>
            <!---------------------------------------------Image---------------------------------------------->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label ">Image</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="image" id="image" value="<?php echo $vehicule['image']; ?>">
                </div>
             </div>
            <!---------------------------------------------Categorie---------------------------------------------->                

            <div class="input-group mb-3">
                    <label class="col-sm-3 col-form-label ">Categorie</label>
                      <div class="col-sm-6">
                        <select id="CatId" name="NomC"  class="form-control"  >
                        <?php 
                        //récuperer la liste des categories 
                        function ModifierCategorie($categorie, $id){
                            try {
                                $db = config::getConnexion();
                        $query = $db->prepare('UPDATE categorie SET  NomC = :NomC WHERE idC= :id');
                                $query->execute([
                                    'NomC' => $categorie->getNomC(),
                                    'idC' => $id
                                ]);
                                echo $query->rowCount() . " records UPDATED successfully <br>";
                            } catch (PDOException $e) {
                                $e->getMessage();
                            }
                        }
                    
                

	                    $listeCategorie=AfficherCategorie();
                        foreach($listeCategorie as $categorie){ 
                        ?>
                        <option id="<?php echo $categorie['idC']; ?>" class="form-control" ><?php echo $categorie['NomC']; ?></option>    
                        <?php
                        //fin foreach 
                        }
                        ?>
                            </select>
                    
                </div>
        </div>  






             <!---------------------------------------------Buttons---------------------------------------------->
             <div class="row mb-5">
             <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Modifier</button>
             </div>
             <div class="col-sm-3 d-grid">
                 <a class="btn btn-primary" href="AfficherVehicule.php" role="button">Retour</a>
             </div>
          </div>
            </table>
        </form>
        </div>
        <?php
            }
        ?>
        
    </body>
</html>
