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
          $id = $_GET['id'];
          //requête pour afficher les infos d'un formulaire
          $req = mysqli_query($con , "SELECT * FROM reclamation WHERE id = $id");
          $row = mysqli_fetch_assoc($req);


       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations formulaire  dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($nom) && isset($prenom) && $age){
               //requête de modification
               $req = mysqli_query($con, "UPDATE reclamation SET prenom = '$prenom' , telephone = '$telephone' ,  adresse= '$adresse' WHERE id = $id");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: index.php");
                }else {//si non
                    $message = "formulaire non modifié";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>

    <div class="form">
        <a href="index.php" class="back_btn"><img src="back.png"> Retour</a>
        <h2>Modifier l'employé : <?=$row['prenom']?> </h2>
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>
        <form action="" method="POST">
        <label> id</label>
            <input type="text" name=" id">
            <label> prenom</label>
            <input type="text" name=" prenom">
            <label> adresse </label>
            <input type="text" name="adresse">
            <label> telephone</label>
            <input type="text" name=" telephone">
            <label> message</label>
            <input type="text" name=" message">
            <input type="submit" value="MODIFIER" name="button">
        </form>
    </div>
</body>
</html>