<?php  
session_start(); //5ater bech nest7a9 les variables de session (l id)
//1-recuperation des donnes de la formulaire
$id=$_POST['idstock'];
$quantite=$_POST['quantite'];

//2-la chaine de connexion
include "../../inc/functions.php";
$conn=connect();

   //3-creation de la requette
   $requette="UPDATE stocks SET quantite='$quantite' WHERE id='$id'";
   //4-execution de la requette
   $resultat=$conn->query($requette); 
   if($resultat){
      header('location:liste.php?modif=ok');
   }
?> 
