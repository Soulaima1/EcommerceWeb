<?php 
session_start();
//selectionner le produit avec id
include "../inc/functions.php";

//connexion bd

$conn=connect();
//id visiteur
$visiteur=$_SESSION['id'];
$total=$_SESSION['panier'][1];
$date=date('Y-m-d');

//----------creation de panier-----------

$requette_panier="INSERT INTO paniers(visiteur,total,date_creation) VALUES('$visiteur','$total','$date')";

//execution requette panier
$resultat=$conn-> query($requette_panier);
$panier_id=$conn-> lastInsertId();

$commandes=$_SESSION['panier'][3];

foreach($commandes as $commande){

$quantite=$commande[0];
$total=$commande[1];
$id_produit=$commande[4];

//requette de ajout commande
$requette="INSERT INTO commandes(quantite,total,panier,date_creation,date_modification,produit) VALUES ('$quantite','$total','$panier_id','$date','$date','$id_produit') ";
//execution requette
$resultat=$conn-> query($requette);

$requete = "UPDATE stocks SET quantite = quantite - $quantite WHERE produit = $id_produit";
$resultat = $conn->query($requete);

}



//var_dump($conn-> lastInsertId());

//supprimer le panier
$_SESSION['panier']=null;
header('location:../index.php');









?> 