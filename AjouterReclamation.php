<?php
include_once '../Model/reclamation.php';
include_once '../Controller/reclamationC.php';




$errorMessage = "";
$successMessage = "" ;






// create user
$reclamationn = null;

// create an instance of the controller
$reclamationC = new ReclamationsC();
if (		
    isset($_POST["prenom"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["telephone"]) &&
    isset($_POST["message"]) && 
    isset($_POST["NomC"]) 
){
    if ( !empty($_POST["prenom"]) &&  !empty($_POST["adresse"])  &&  !empty($_POST["telephone"]) && !empty($_POST["message"])  && !empty($_POST["NomC"])){
        

        $reclamationn = new Reclamation(
            $_POST['prenom'], 
            $_POST['adresse'],
            $_POST['telephone'],
            $_POST['message'],
            $_POST['NomC'],
        );

        $reclamationC->Ajouterreclamation($reclamationn);
        header("Location:AfficherReclamation.php?successMessage=reclamation ajouté avec succés");
  
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
    <title>Gestion Reclamation</title>
</head>
    <body>
  <script src="../Controle.js"></script>
  
    <div class="container my-5">
    <center><h1>Nouveau reclamation</h1></center>
    <hr>
    <br>
        
      


        <form method="post" class="form" id="form" enctype="multipart/form-data" onchange="Verif();" >



            <!--------------------------------------------Prenom------------------------------------------------->
            <div class=" input-group mb-3 ">
                <label class="col-sm-3 col-form-label ">Prenom</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"  name="prenom" id="prenom"  placeholder= "Prenom" >
                    <a id="test1"></a>
                </div>
            </div>





            <!---------------------------------------------Adresse---------------------------------------------->
            <div class="input-group mb-3">
            <label class="col-sm-3 col-form-label ">Adresse</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="adresse" id="adresse"  aria-label = "Adresse"  placeholder= "Adresse" >
                    <a id="test2"></a>
                </div>
            </div>
            
      
             
            <!---------------------------------------------Telephone---------------------------------------------->
                <div class="input-group mb-3">
                    <label class="col-sm-3 col-form-label " for="telephone">Num Telephone</label>
                    <span class="input-group-text" >+216</span>
                      <div class="col-sm-6">
                    <input type="telephone" class="form-control" name="telephone" id="telephone"  placeholder= "Telephone">
                    <a id="test3"></a>
                </div>
                
            </div>
            <!---------------------------------------------Message---------------------------------------------->
            <div class="input-group mb-3">
                    <label class="col-sm-3 col-form-label" for="comment" >Message</label>
                    <div class="col-sm-6">
                    <textarea  class="input-group mb-3"  type="comment" id="message" name="message" cols="10" rows="10" ></textarea>
                    <a id="test4"></a>
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
                 <a class="btn btn-primary" href="AfficherReclamation.php" role="button">Retour</a>
             </div>
          </div>
            </table>
        </form>
        </div>
    </body>
</html>
