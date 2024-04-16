<?php
session_start();

// Inclure les fichiers nécessaires
include "../inc/functions.php";
$conn = connect();

$visiteur = $_SESSION['id'];

$id_produit = $_POST['produit'];
$quantite = $_POST['quantite'];
$volume = $_POST['volume'];
echo "Le volume sélectionné est : " . $volume;

$pv = getPrixParVolume($id_produit, $volume);

// Requête de sélection du produit
$requete = "SELECT prix, nom, image FROM produits WHERE id='$id_produit'";
$resultat = $conn->query($requete);
$produit = $resultat->fetch();

// Requête pour obtenir le prix du volume sélectionné
$requete_volume = "SELECT ml, prix FROM volume WHERE id_p = $id_produit AND ml = $volume";
$resultat_volume = $conn->query($requete_volume);
$volume_info = $resultat_volume->fetch();
echo "Le prix du volume sélectionné est : " . $volume_info['prix'];

$total = intval($quantite) * intval($volume_info['prix']);
$date = date('Y-m-d');

if (!isset($_SESSION['panier'])) {
  // Le panier n'existe pas, on le crée
  $_SESSION['panier'] = array($visiteur, 0, $date, array());
}

$_SESSION['panier'][1] += $total;
$_SESSION['panier'][3][] = array($quantite, $total, $date, $date, $id_produit, $produit['nom'], $produit['image']);

header('Location: ../produit.php?id=' . $_POST['produit']);
?>
