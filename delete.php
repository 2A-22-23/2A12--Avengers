<?php
include('config2.php');
$con=mysqli_connect("localhost","root","","entreprise");
        $matriculee=$_GET['matricule'];
    
        if(isset($_GET['marticule'])){
          $delete2=mysqli_query($con,"DELETE FROM vehicule WHERE matricule ='$matriculee ") ;    
          $delete=mysqli_query($con,"UPDATE vehicule SET matricule=NULL WHERE matricule ='$matriculee' ") ;
          $delete2=mysqli_query($con,"DELETE FROM vehicule WHERE matricule ='$matriculee' ") ;
          
       
        }
        
 
 
  header('Location:tables.php');