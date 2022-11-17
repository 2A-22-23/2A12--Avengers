<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion formulaire</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <a href="ajouter.php" class="Btn_add"> <img src= "plus.png" > Envoyer</a>

        <table>
            <tr id="items">
                <th> prenom</th>
                <th> telephone</th>
                <th> adresse </th>
                <th>message</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php 
                //inclure la page de connexion
                include_once "connexion.php";
                //requête pour afficher la liste des formulaire
                $req = mysqli_query($con , "SELECT * FROM reclamation");
                if(mysqli_num_rows($req) == 0){
                    //s'il n'existe pas d'employé dans la base de donné , alors on affiche ce message :
                    echo "Il n'y a pas encore d'employé ajouter !" ;
                    
                }else {
                    //si non , affichons la liste de tous les formulaire 
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['prenom']?></td>
                            <td><?=$row['telephone']?></td>
                            <td><?=$row['adresse']?></td>
                            <td><?=$row['message']?></td>
                            <!--Nous alons mettre l'id de chaque formulaire  dans ce lien -->
                            <td><a href="modifier.php?id=<?=$row['id']?>"><img src="pen.png"></a></td>
                            <td><a href="supprimer.php?id=<?=$row['id']?>"><img src="trash.png"></a></td>
                        </tr>
                        <?php
                    }
                    
                }
            ?>
      
         
        </table>
   
   
   
   
    </div>
</body>
</html>