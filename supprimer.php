<?php
  //connexion a la base de données
  include_once "connexion.php";
  //récupération de l'id dans le lien
  $matricule= $_GET['matricule'];
  //requête de suppression
  $req = mysqli_query($con , "DELETE FROM vehicule WHERE matricule= $matricule");
  //redirection vers la page index.php
  header("Location:index.php")
?>