<?php
	include '../Controller/CategorieC.php';
	

	$message = "" ; 
	$categorieC=new CategorieC();
	$categorieC->SupprimerCategorie($_GET["idC"]);
	header('Location:AfficheC.php?message=Categorie Supprimé avec succés');
?>