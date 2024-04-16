<?php
// Inclure le fichier functions.php pour avoir accès à la fonction getPrixParVolume
require_once 'functions.php';

// Récupérer les valeurs passées via la requête AJAX
$idProduit = $_GET['idProduit'];
$valeurSelectionnee = $_GET['valeurSelectionnee'];

// Appeler la fonction getPrixParVolume avec les paramètres appropriés
$resultat = getPrixParVolume($idProduit, $valeurSelectionnee);

// Envoyer la réponse
echo $resultat['prix']; // Par exemple, renvoyer le prix

// Assurez-vous de personnaliser la réponse en fonction de la structure des données renvoyées par la fonction getPrixParVolume
?>
