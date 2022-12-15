<?php
	include '../Controller/VehiculeC.php';


	$vehiculeC=new VehiculeC();


	if(isset($_GET['search']))
	{
		$listeVehicule=$vehiculeC->Recherche($_GET['search']);
	}
	elseif(isset($_GET['tr']))
	{
		$listeVehicule=$vehiculeC->triVehicule();
	}
	else{
	$listeVehicule=$vehiculeC->AfficherVehicule(); 
	}


?>
<html>
	<head>
	<title>Vehicles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
	</head>
	<body>		
		<div class="container my-5">
		<center><h1>Liste des Vehicles</h1></center>
           

		<hr>
		<br>
		<?php
           if(isset($_GET['successMessage'])){
            $successMessage = $_GET['successMessage'];
              
            echo "<div class='alert alert-warning alert-dismissible fade show' rol e='alert'>
            '$successMessage'
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>"; 
           }

		   if(isset($_GET['message'])){
            $message = $_GET['message'];
              
            echo "<div class='alert alert-warning alert-dismissible fade show' rol e='alert'>
            '$message'
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>"; 
           }

		   if(isset($_GET['mess'])){
            $mess = $_GET['mess'];
              
            echo "<div class='alert alert-warning alert-dismissible fade show' rol e='alert'>
            '$mess'
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>"; 
           }

          ?>


		<br>
		
		
		<div class="row">
			
			<div class="col-md-8">
				
				<a class="btn btn-primary" href="AjouterVehicule.php" role="button">Nouveau Vehicule</a>
		
					<td></td>
					<td></td>
					<td></td>
					<td></td>
		
					<td><a class="btn btn-primary" href="AfficheC.php" role="button">Liste des Categories</a></td>

				
					<td>
					<a class="btn btn-primary" href="AfficherVehicule.php?tr=y" role="button">Trier la liste</a>
					</td>
					<td><!-- Start Metier Imprimer--->
			
				<a  class="btn btn-primary"  href="javascript:window.print()">Imprimer</a>
				
		</td>
			</div>
			<div class="col-md-4"> 
				<form method="get"> 
					<input type="text" name="search" id="search" class="form-control" placeholder="Search...">
				</form>
			</div>
		</div>
		<table class="table">
		   <thead>
			<tr>
				<th>Matricule</th>
				<th>Marque</th>	
				<th>Couleur</th>
				<th>Kilometrage</th>
				<th>Carburant</th>
				<th>image</th>
				<th>Nom Categorie</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			</thead>
			<?php
		
				foreach($listeVehicule as $vehicule){
			?>
			<tr>
				<td><?php echo $vehicule['matricule']; ?></td>
				<td><?php echo $vehicule['marque']; ?></td>
				<td><?php echo $vehicule['couleur']; ?></td>
				<td><?php echo $vehicule['kilometrage']; ?></td>
				<td><?php echo $vehicule['carburant']; ?></td>
				<td><img style="max-width: 20%;max-height=20%" src="./image/<?php echo $vehicule['image']; ?>"></td>
				<td><?php 	
				$category = $vehiculeC->RecupererCategorie($vehicule['idC']);
				$marqueP=$category['NomC'];
				echo $marqueP;						?></td>
				<td>
					<form method="GET" action="ModifierVehicule.php">
						<input type="submit"  class="btn btn-primary btn-sm" name="Modifier" value="Modifier">
						<input type="hidden"  value=<?php echo $vehicule['matricule']; ?>  name="matricule">  
					</form>
				</td>
				<td>
					<a  class="btn btn-danger btn-sm"   href="SupprimerVehicule.php?matricule=<?php echo $vehicule['matricule']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
		</div>
	</body>
</html>
