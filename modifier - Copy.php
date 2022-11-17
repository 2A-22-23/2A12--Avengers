<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

         //connexion à la base de donnée
          include_once "connexion.php";
         //on récupère le id dans le lien
          $matricule = $_GET['matricule'];
          //requête pour afficher les infos d'un employé
          $req = mysqli_query($con , "SELECT * FROM vehicule WHERE matricule = $matricule");
          $row = mysqli_fetch_assoc($req);


       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($marque) && isset($couleur) && isset($kilometrage) && isset($carburant)){
               //requête de modification
               $req = mysqli_query($con, "UPDATE vehicule SET marque= '$marque' , couleur= '$couleur' , kilometrage = '$kilometrage',carburant='$carburant', WHERE matricule = $matricule");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: index.php");
                }else {//si non
                    $message = "voiture non modifié";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>

    <div class="form">
        <a href="index.php" class="back_btn"><img src="back.png"> Retour</a>
        <h2>Modifier l'employé : <?=$row['marque']?> </h2>
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>
        <form action="" method="POST">
        <label>matricule</label>
            <input type="text" name="matricule">
            <label>marque</label>
            <input type="text" name="marque" value="<?=$row['marque']?>">
            <label>couleur</label>
            <input type="text" name="couleur" value="<?=$row['couleur']?>">
            
            <label>kilometrage</label>
            <input type="text" name="kilometrage" value="<?=$row['kilometrage']?>">
           
            <label for ="carburant">carburant:

</label>
<select name="carburant">
<option value="ds">diesel</option>   
<option value="es">Essene</option> 
<option value="el">Électrique</option>  
</select>
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>
</html>