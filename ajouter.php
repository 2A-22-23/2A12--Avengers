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
       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if( isset($prenom) && isset($adresse) && isset($telephone) && isset($message)){
                //connexion à la base de donnée
                include_once "connexion.php";
                //requête d'ajout
                $req = mysqli_query($con , "INSERT INTO reclamation VALUES( '$id','$prenom ','$adresse','$telephone','$message')");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: index.php");
                }else {//si non
                    $message = "formulaire non ajouté";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="index.php" class="back_btn"> Retour</a>
        <h2>Ajouter une Réclamation</h2>
        <p class="erreur_message">
            <?php 
            // si la variable message existe , affichons son contenu
            if(isset($message)){
                echo $message;
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
            <input type="submit" value="Envoyer" name="button">
        </form>
    </div>
</body>
</html>