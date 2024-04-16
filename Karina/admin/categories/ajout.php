<?php  
session_start(); //5ater bech nest7a9 les variables de session (l id)
//1-recuperation des donnes de la formulaire
$nom=$_POST['nom'];
$description=$_POST['description'];
$createur=$_SESSION['id'];// 5dgina l id meli 7alel l  session 
$date_creation=date("Y-m-d");//date aujourdhui

//2-la chaine de connexion
include "../../inc/functions.php";
$conn=connect();




try {
   //3-creation de la requette
   $requette="INSERT INTO categories(nom,description,createur,date_creation) VALUES ('$nom','$description','$createur','$date_creation') ";
   //4-execution de la requette
   $resultat=$conn->query($requette); 
   if($resultat){
      header('location:liste.php?ajout=ok');
   }
 } catch(PDOException $e) {
   //echo "Connection failed: " . $e->getMessage();
   if ( $e-> getcode()==23000){//23000 howa l code derreur mta3 ki tekteb hajtin fi cle unique
      header('location:liste.php?erreur=duplicate');
   }
 }
?> 
