<?php 
session_start(); //5ater bech nest7a9 les variables de session (l id)

//1-recuperation des donnes de la formulaire

$nom=$_POST['nom'];

$description=$_POST['description'];

$prix=$_POST['prix'];

$categorie=$_POST['categorie'];

$quantite=$_POST['quantite'];

$date_creation=date("Y-m-d");

$createur=$_SESSION['id'];// 5dhina l id meli 7alel l  session 

//upload image
$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image=$_FILES["image"]["name"];
  } else {
    echo "Sorry, there was an error uploading your file.";
  }


$date=date("Y-m-d");


//2-la chaine de connexion
include "../../inc/functions.php";
$conn=connect();

try {
//3-creation de la requette

    $requette="INSERT INTO produits(nom,description,prix,image,createur,categorie,date_creation) VALUES ('$nom','$description','$prix','$image','$createur','$categorie','$date') ";

 //4-execution de la requette
 
    $resultat=$conn->query($requette); 

    if($resultat){

      $produit_id=$conn-> LastInsertId();
     
      $requette2="INSERT INTO stocks(produit,quantite,createur,date_creation) Values ('$produit_id','$quantite','$createur','$date_creation')";


      if($conn->query($requette2)){

        header('location:liste.php?ajout=ok');
    
      }else{
        echo "impossible d'ajouter le stock du produit";
      }
    }
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    if ( $e-> getcode()==23000){//23000 howa l code derreur mta3 ki tekteb hajtin fi cle unique
       header('location:liste.php?erreur=duplicate');
    }
  }

?> 