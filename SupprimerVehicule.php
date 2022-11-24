<?php
	include '../Controller/vehiculeC.php';

	$message = "" ; 
	$vehiculeC=new VehiculeC();
	$vehiculeC->SupprimerVehicule($_GET["matricule"]);
	header('Location:AfficherVehicule.php?message=Vehicule Supprimé avec succés');
?>