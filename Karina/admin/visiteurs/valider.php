<?php 
 

$idvisiteur=$_GET['id'];

//2-la chaine de connexion
include "../../inc/functions.php";
$conn=connect();

$requette="UPDATE visiteurs SET etat=1 WHERE id='$idvisiteur'";

$resultat=$conn->query($requette); 

if($resultat){ 
    header('location:liste.php?valider=ok');//bech naaref li saret l validation
}else {
echo "Erreur de validation";
}

?> 