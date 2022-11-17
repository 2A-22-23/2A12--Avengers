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


</div>
    <?php
       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(  isset($marque) && isset($couleur) && isset($kilometrage) && isset($carburant)){
                //connexion à la base de donnée
                include_once "connexion.php";
                //requête d'ajout
                $req = mysqli_query($con , "INSERT INTO vehicule VALUES( '$matricule','$marque','$couleur','$kilometrage','$carburant')");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: index.php");
                }else {//si non
                    $message = "vehicule non ajouté";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="index.php" class="back_btn"><img src="back.png"> Retour</a>
        <h2>Ajouter une voitures</h2>
        <p class="erreur_message">
            <?php 
            // si la variable message existe , affichons son contenu
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>
        <form action="" method="POST">
        <label>matricule</label>
            <input type="mat"id="matricule" name="matricule"
            pattern="[0-9]{3}-[0-9]{4}" required>
            <label>marque</label>
            <input type="text" name="marque">
            <label>couleur</label>
            <input type="text" name="couleur">
            <label>kilometrage</label>
            <input type="number" name="kilometrage">
           
            <label for ="carburant">carburant:

</label>
<select name="carburant">
<option value="ds">diesel</option>   
<option value="es">Essene</option> 
<option value="el">Électrique</option>  
</select>
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>