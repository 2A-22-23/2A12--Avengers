<?php
    include_once '../Model/reclamation.php';
    include_once '../Controller/reclamationC.php';


    $error = "";
    $mess = "" ; 


    // create user
    $reclamation = null;

    // create an instance of the controller
    $reclamationC = new reclamationC();
    if (
        isset($_POST["prenom"]) &&
		isset($_POST["adresse"]) && 
        isset($_POST["telephone"]) &&
        isset($_POST["message"]) &&
        !empty($_POST["NomC"])
      ) {
        if (			
            !empty($_POST["prenom"]) && 
			!empty($_POST["adresse"]) && 
            !empty($_POST["telephone"]) &&
            !empty($_POST["message"]) && 
            !empty($_POST["NomC"])
        ) {
            $reclamation = new reclamation(
                $_POST['prenom'], 
				$_POST['adresse'],
                $_POST['telephone'],
                $_POST['message'],
                $_POST['NomC'],
            );
            $reclamationC->Modifierreclamation($reclamation, $_GET["idR"]);
            header('Location:AfficherReclamation.php?mess=reclamation Modifé avec succés');
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
        <center><h1>Modifier Reclamation</h1></center>
        
        <hr>
		<br>
		<br>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_GET['idR'])){
				$reclamation = $reclamationC    ->Recupererreclamation($_GET['idR']);
				
		?>
    
        <form method="post" onchange ="Verif();" >
            <!--------------------------------------------Prenom------------------------------------------------->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label ">Prenom</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo $reclamation['prenom'];?>">
                    <a id="test1"></a>
                </div>
            </div>
            <!---------------------------------------------Adresse---------------------------------------------->
            <div class="input-group mb-3">
            <label class="col-sm-3 col-form-label ">Adresse</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="adresse" id="adresse"  aria-label = "Adresse"  placeholder= "Adresse" value="<?php echo $reclamation['adresse']; ?>" >
                    <a id="test2"></a>
                </div>
            </div>

            <!---------------------------------------------telephone---------------------------------------------->
            <div class="input-group mb-3">
                    <label class="col-sm-3 col-form-label " for="telephone">Num Telephone</label>
                    <span class="input-group-text" >+216</span>
                      <div class="col-sm-6">
                    <input type="telephone" class="form-control" name="telephone" id="telephone"  placeholder= "Telephone" value="<?php echo $reclamation['telephone']; ?>" >
                    <a id="test3"></a>
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
                 <a class="btn btn-primary" href="Afficherreclamation.php" role="button">Retour</a>
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
