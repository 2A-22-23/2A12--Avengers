<?php
	include '../Controller/reclamationC.php';

	$message = "" ; 
	$reclamationC=new reclamationC();
	$reclamationC->Supprimerreclamation($_GET["idR"]);
	header('Location:AfficherReclamation.php?message=reclamation Supprimé avec succés');
?>