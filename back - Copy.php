<?php


include('config2.php');
$con=mysqli_connect("localhost","root","","entreprise");
    
        
        
  
  $query="SELECT *
  FROM vehicule ";
  $query_run=mysqli_query($con,$query);  
          

          

           





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>location voiture</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   
 <div class="body">   
       
        </div>
        
        <div class="cantain">
      <div class="navbar">
        
        
    
        <div class="menu">
            
   
            <ul  class="nav navbar-nav navbar-right">            
                <li><a href="index.php" >ACCUEIL</a></li>
                <li><a href="login.html">LOGIN</a></li>
                <li><a href="back.php" class="active">VEHICULES</a></li>
                <li><a href="#">JANTES</a></li>
                <li><a href="#">L'ATELIER</a></li>
                <li><a href="#">SERVICES</a></li>
                <li><a href="#">CONTACT</a></li>
                <li><a href="tables.php">ESPACE ADMIN</a></li>
            </ul>
        </div>
       
        <div class="logo ">
            <img src="top-logo.png" alt="logo">
         
            <div class="x_content">
           
            <p class="msg">VEHICULE SELECTIONEL<br>
  
</div>
      
</div>
</div>

  <?php

while($vehiculeC=mysqli_fetch_assoc($query_run))
{
?>

    <div class="card">
  <img src="<?=  $vehiculeC['image']?>" alt="Denim Jeans" style="width:100%">
  <div class ="body"> <?=  $vehiculeC['marque']?>
  <p ><?=  $vehiculeC['kilometrage']?></p>
  <p><?= $vehiculeC['carburant']?></p>
</div>
  <p><button>Add to Cart</button></p>
</div>
  </div>
</div>

    
    <?php }
?>
  
 
    
    </div>
      </div>
    </div>
    <script src="script.js"></script>
</body>
</html>