<?php
	include '../Controller/reclamationC.php';


	$reclamationC=new ReclamationsC();


	if(isset($_GET['search']))
	{
		$listereclamation=$reclamationC->Recherche($_GET['search']);
	}
	elseif(isset($_GET['tr']))
	{
		$listereclamation=$reclamationC->trireclamation();
	}
	else{
	$listereclamation=$reclamationC->Afficherreclamation(); 
	}



?>
<html>
	<head>
	<title>Reclamation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
	</head>
	<body>		
		<div class="container my-5">
		<center><h1>Liste des reclamation</h1></center>
           

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
				<a class="btn btn-primary" href="AjouterReclamation.php" role="button">Nouveau reclamation</a>
		
					<td></td>
					<td></td>
					<td></td>
					<td></td>
		
					<td><a class="btn btn-primary" href="AfficheC.php" role="button">Liste des Categories</a></td>

					<td>
					<a class="btn btn-primary" href="AfficherReclamation.php?tr=y" role="button">Trier la liste</a>
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
				<th>idR</th>
				<th>Prenom</th>	
				<th>Adresse</th>
				<th>Telephone</th>
				<th>Message</th>
				<th>Nom Categorie</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			</thead>
			<?php
		
				foreach($listereclamation as $reclamation){
			?>
			<tr>
				<td><?php echo $reclamation['idR']; ?></td>
				<td><?php echo $reclamation['prenom']; ?></td>
				<td><?php echo $reclamation['adresse']; ?></td>
				<td><?php echo $reclamation['telephone']; ?></td>
				<td><?php echo $reclamation['message']; ?></td>
				<td><?php 	
				$category = $reclamationC->RecupererCategorie($reclamation['idC']);
				$nomC=$category['NomC'];
				echo $nomC;?></td>

				<td>
					<form method="GET" action="ModifierReclamation.php">
						<input type="submit"  class="btn btn-primary btn-sm" name="Modifier" value="Modifier">
						<input type="hidden"  value=<?php echo $reclamation['idR']; ?>  name="idR">  
					</form>
				</td>
				<td>
					<a  class="btn btn-danger btn-sm"   href="SupprimerReclamation.php?idR=<?php echo $reclamation['idR']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
		</div>
	</body>
</html>
