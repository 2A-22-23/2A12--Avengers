<?php
include_once '../Model/vehicule.php';
include_once '../Controller/vehiculeC.php';




$errorMessage = "";
$successMessage = "" ;






// create user
$vehicule = null;

// create an instance of the controller
$vehiculeC = new VehiculeC();
if (		
    isset($_POST["marque"]) &&
    isset($_POST["couleur"]) &&
    isset($_POST["kilometrage"]) &&
    isset($_POST["carburant"]) && 
    isset($_FILES["image"]) &&
    isset($_POST["NomC"]) 
){
    if ( !empty($_POST["marque"]) &&  !empty($_POST["couleur"])  &&  !empty($_POST["kilometrage"]) && !empty($_POST["carburant"]) && !empty($_FILES["image"]) && !empty($_POST["NomC"]) ){
        
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "./image/" . $filename;
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }
        
        $vehicule = new Vehicule(
            $_POST['marque'], 
            $_POST['couleur'],
            $_POST['kilometrage'],
            $_POST['carburant'],
            $filename,
            $_POST['NomC'],
        );
        $vehiculeC->AjouterVehicule($vehicule);
        header("Location:AfficherVehicule.php?successMessage=Vehicule ajouté avec succés");

        
        
    }
    else
        $errorMessage = "Missing information";

        
        
        
}   


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
     <script src ="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> 
    <title>Gestion Produit</title>
</head>
    <body>
  <script src="../Controle.js"></script>
  
    <div class="container my-5">
    <center><h1>Nouveau Vehicule</h1></center>
    <hr>
    <br>
        
      


        <form method="post" class="form" id="form" enctype="multipart/form-data" onchange="Verif();" >



            <!--------------------------------------------Nom Produit------------------------------------------------->
            <div class=" input-group mb-3 ">
                <label class="col-sm-3 col-form-label ">Marque</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"  name="marque" id="marque"  placeholder= "Marque" >
                    <a id="test1"></a>
                </div>
            </div>





            <!---------------------------------------------Couleur---------------------------------------------->
            <div class="input-group mb-3">
            <label class="col-sm-3 col-form-label ">Couleur</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="couleur" id="couleur"  aria-label = "couleur" >
                    <a id="test2"></a>
                </div>
            </div>
            
      
             
            <!---------------------------------------------Kilometrage---------------------------------------------->
                <div class="input-group mb-3">
                    <label class="col-sm-3 col-form-label ">Kilometrage</label>
                      <div class="col-sm-6">
                    <input type="number" class="form-control" name="kilometrage" id="kilometrage"  placeholder ="kilometrage" >
                    <a id="test3"></a>
                </div>
            </div>
            <!---------------------------------------------Carburant---------------------------------------------->
            <div class="input-group mb-3">
                    <label class="col-sm-3 col-form-label ">Carburant</label>
                      <div class="col-sm-6">


                    <select name="carburant" id="carburant">
                        <option value="Diesel">Diesel</option>
                        <option value="Essence">Essence</option>
                        <option value="Electrique">Electrique</option>
                    </select>

                    <a id="test4"></a>
                </div>
            </div>
            <!---------------------------------------------Image---------------------------------------------->
            <div class="input-group mb-3">
                <label class="col-sm-3 col-form-label ">Image</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="image" id="image">
                </div>
             </div>


             <!---------------------------------------------Category---------------------------------------------->
            <div class="input-group mb-3">
                    <label class="col-sm-3 col-form-label ">Categorie</label>
                      <div class="col-sm-6">
                        <select id="CatId" name="NomC"  class="form-control"  >
                        <?php 
                        //récuperer la liste des categories 
                        function AfficherCategorie(){
                            $sql="SELECT * FROM categorie";
                            $db = config::getConnexion();
                            try{
                                $liste = $db->query($sql);
                                return $liste;
                            }
                            catch(Exception $e){
                                die('Erreur:'. $e->getMessage());
                            }
                        }

	                    $listeCategorie=AfficherCategorie();
                        foreach($listeCategorie as $categorie){ 
                        ?>
                        <option value="<?php echo $categorie['idC']; ?>" class="form-control" ><?php echo $categorie['NomC']; ?></option>    
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
                <button type="submit" class="btn btn-primary" name = "Ajouter"  id ="Ajouter">Ajouter</button>
             </div>
             <div class="col-sm-3 d-grid">
                 <a class="btn btn-primary" href="AfficherVehicule.php" role="button">Retour</a>
             </div>
          </div>
            </table>
        </form>
        </div>
    </body>
</html>
