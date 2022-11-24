<?php
include_once '../Model/Categorie.php';
include_once '../Controller/CategorieC.php';


$NomC="";

$errorMessage = "";
$successMessage = "" ;






// create user
$categorie = null;

// create an instance of the controller
$categorieC = new CategorieC();
if (		
    isset($_POST["NomC"]) 
 
){
    if ( !empty($_POST["NomC"])) {
        $categorie = new Categorie(
            $_POST['NomC'], 

        );
        $categorieC->AjouterCategorie($categorie);
        header("Location:AfficheC.php?successMessage=Categorie ajouté avec succés");

        
        
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
    <title>Gestion Categorie</title>
</head>
    <body>
  <script src="../Controle.js"></script>
  
    <div class="container my-5">
    <center><h1>Nouveau Categorie</h1></center>

    <hr>
    <br>
        
      


        <form method="post" class="form" id="form" onchange= "Verif();" >



            <!--------------------------------------------Nom Produit------------------------------------------------->
            <div class=" input-group mb-3 ">
                <label class="col-sm-3 col-form-label ">Nom Categorie</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"  name="NomC" id="NomC" value="<?php echo $NomC; ?>" placeholder= "Nom Categorie" >
                    <a id="testt"></a>
                </div>
            </div>



<!---------------------------------------------Buttons---------------------------------------------->



             <div class="row mb-5">
             <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary" name = "Ajouter"  id ="Ajouter"  >Ajouter</button>
             </div>
             <div class="col-sm-3 d-grid">
                 <a class="btn btn-primary" href="AfficheC.php" role="button">Retour</a>
             </div>
          </div>
            </table>
        </form>
        </div>
    </body>
</html>
