<?php  //php start
        //1- connexion vers la BD

function connect()
{
    $servername="localhost";
    
    $DBuser="root";
    
    $DBpassword="";
    
    $DBname="ecommerce";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully"; pour ne pas lafficher apres le test
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }

      return $conn;
}
function getALLCategories(){
        //1- connexion vers la BD

    $conn=connect();



   
    //2- creation de la requette
    $requette="SELECT * FROM categories";//i na3mel sleect 9a3da njib fi donne mel base
    
    //3- execution de la requette
    
    $resultat=$conn->query($requette);
    
    //4- resultat de la requette
    
    $categories=$resultat->fetchALL();
    
    // var_dump($categories);
    
    
return $categories;
    


}

//PRODUIT 

function getALLProducts(){
        //1- connexion vers la BD
    
        $conn=connect();

        
        //2- creation de la requette
        $requette="SELECT * FROM produits ";
        
        //3- execution de la requette
        
        $resultat=$conn->query($requette);
        
        //4- resultat de la requette
        
        $produits=$resultat->fetchALL();
        
        // var_dump($categories);
        
        
    return $produits;
        
    

}

//fonction search produits
function searchProduits($keywords){//keywords l kelma li bech nektebha f search
//1- connexion vers la BD
    
$conn=connect();


  //2- creaton de la requette
  $requette = "SELECT * FROM produits WHERE nom LIKE '%$keywords%'";

     //3- execution de la requette
     $resultat=$conn->query($requette);

     //4 - resultat

     $produits=$resultat->fetchALL();
     return $produits;

}


function getProduitById($id){//id mtaa l produit li bech naffichih 3lih
//1- connexion vers la BD

$conn=connect();
  //2- creaton de la requette
$requette="SELECT * FROM produits WHERE id=$id";
//3- execution de la requette
$resultat=$conn->query($requette);

//4 - resultat

$produit=$resultat->fetch();// fetch menghir ALL 5ater bech njib produit barka
return $produit;

}


function AddVisiteur($data){

//1- connexion vers la BD

$conn=connect();

 //2- creaton de la requette
 $mphash=md5($data['mp']);
 $requette="INSERT INTO visiteurs(nom,prenom,email,mp,telephone) VALUES('".$data['nom']."','".$data['prenom']."','".$data['email']."','".$mphash."','".$data['telephone']."')";//lena bech 3abi fel base hedheka 3leh 3malt insert

 //3- execution de la requette
$resultat=$conn->query($requette);

//4 - resultat

if ($resultat){//ken sar l ajout fel base return true snn false
  return true;
}else{
  return false;
}
}


function ConnectVisiteur($data){//ken raj3elna donne mdp et email shah ken maraj3 chy ray wahda fihom ghalta
  //1- connexion vers la BD

$conn=connect();

//2- creaton de la requette
$email=$data['email'];
$mp=md5($data['mp']);
$requette="SELECT * FROM visiteurs WHERE email='$email' AND mp='$mp'";
//3- execution de la requette
$resultat=$conn->query($requette);

//4 - resultat

$user=$resultat->fetch();
return $user;
}

function ConnectAdmin($data){
  //1- connexion vers la BD

  $conn=connect();

  //2- création de la requête
  $email=$data['email'];
  $mp=md5($data['mp']);
  
  //Affichage des valeurs des variables pour débogage
  echo "Email: " . $email . "<br>";
  echo "Mot de passe: " . $mp . "<br>";
  
  $requette="SELECT * FROM administrateur WHERE email='$email' AND mp='$mp'";


  //3- exécution de la requête
  $resultat=$conn->query($requette);

  
  //4- récupération du résultat
  $user=$resultat->fetch();
  return $user;
}

function getAllUsers(){
   //1- connexion vers la BD

$conn=connect();

//2- creaton de la requette

$requette="SELECT * FROM visiteurs WHERE etat=0";
//3- execution de la requette
$resultat=$conn->query($requette);

//4 - resultat

$users=$resultat->fetchAll();//5ater bech njib barcha visiteurs;

return $users;

}

function getStocks(){

     //1- connexion vers la BD

$conn=connect();

//2- creaton de la requette

$requette="SELECT p.nom,s.quantite,s.id FROM produits p, stocks s WHERE p.id=s.produit";
//3- execution de la requette
$resultat=$conn->query($requette);
//4 - resultat

$stocks=$resultat->fetchAll();//5ater bech njib barcha visiteurs;

return $stocks;

}

function getAllpaniers(){
    //1- connexion vers la BD

    $conn=connect();

    //2- creaton de la requette
    
    $requette="SELECT v.nom,v.prenom,v.telephone,p.total ,p.etat,p.date_creation,p.id FROM paniers p, visiteurs v WHERE p.visiteur=v.id";
    //3- execution de la requette
    $resultat=$conn->query($requette);
    //4 - resultat
    
    $paniers=$resultat->fetchAll();//5ater bech njib barcha visiteurs;
    
    return $paniers;

}

function getAllCommandes(){
    //1- connexion vers la BD

    $conn=connect();

    //2- creaton de la requette
    
    $requette="SELECT p.nom,p.image,c.quantite,c.total,c.panier FROM Commandes c,produits p WHERE c.produit=p.id";
    //3- execution de la requette
    $resultat=$conn->query($requette);

    //4 - resultat
    $commandes=$resultat->fetchALL();

    return $commandes;


}

function changerEtatPanier($data){

//1- connexion vers la BD

$conn=connect();

//2- creaton de la requette

$requette="UPDATE paniers SET etat='".$data['etat']."'WHERE id='".$data['panier_id']."'";
   //3- execution de la requette
   $resultat=$conn->query($requette);

}


function getPanierByEtat($paniers,$etat){

$paniersEtat=array();
foreach($paniers as $p){
  if($p['etat']==$etat){
    array_push($paniersEtat,$p);
  }

}
return $paniersEtat;

}

function EditAdmin($data){
//1- connexion vers la BD

$conn=connect();

//2- creaton de la requette
if ($data['mp']==""){//lezem ntetsi 3al les champs lkol ena testit ken 3al mp ken fih valeur
  $requette="UPDATE administrateur SET nom='".$data['nom']."' , email='".$data['email']."' WHERE id='".$data['id_admin']."'";


 } if($data['nom']==""){
  $requette="UPDATE administrateur SET  email='".$data['email']."',mp='".md5($data['mp'])."' WHERE id='".$data['id_admin']."'";

 } if($data['email']==""){
  $requette="UPDATE administrateur SET  mp='".md5($data['mp'])."' WHERE id='".$data['id_admin']."'";
 }if($data['email']!=="" && $data['nom']!=="" && $data['mp']!==""){
  $requette="UPDATE administrateur SET nom='".$data['nom']."' , email='".$data['email']."',mp='".md5($data['mp'])."' WHERE id='".$data['id_admin']."'";
 }
 //3- execution de la requette
$resultat=$conn->query($requette);
return true;
}

function getData(){

  $data=array();

  $conn=connect();
//calculer le nombre des produits dans la base
  $requette="SELECT COUNT(*) FROM produits";
  $resultat=$conn->query($requette);
  $nbrPrds=$resultat-> fetch();
//calculer le nombre des categories dans la base

  $requette1="SELECT COUNT(*) FROM categories";
  $resultat1=$conn->query($requette1);
  $nbrCat=$resultat1-> fetch();
//calculer le nombre des clients dans la base

  $requette2="SELECT COUNT(*) FROM visiteurs";
  $resultat2=$conn->query($requette2);
  $nbrClients=$resultat2-> fetch();;

  $data["produits"]=$nbrPrds[0];
  $data["categories"]=$nbrCat[0];
  $data["clients"]=$nbrClients[0];

  return $data;
}

function getProductsByPriceRange($min, $max,$id) {
  //1- connexion vers la BD

  $conn = connect();
if (!$conn) {
    die("Erreur de connexion à la base de données");
}


  //2- creaton de la requette
  
  $requette = "SELECT * FROM produits WHERE prix >= $min AND prix <= $max AND $id=categorie";
    //3- execution de la requette
  $resultat=$conn->query($requette);

  //4 - resultat
  $produits = $resultat->fetchALL();


  return $produits;

}

function getProductsByPriceRange2($min, $max) {
  //1- connexion vers la BD

  $conn = connect();
if (!$conn) {
    die("Erreur de connexion à la base de données");
}


  //2- creaton de la requette
  
  $requette = "SELECT * FROM produits WHERE prix >= $min AND prix <= $max";
    //3- execution de la requette
  $resultat=$conn->query($requette);

  //4 - resultat
  $produits = $resultat->fetchALL();


  return $produits;

}

function getVolume($id_produit){

  //1- connexion vers la BD
  
  $conn = connect();
  
  //2- création de la requête
  $requete = "SELECT volume.ml, volume.prix
  FROM produits
  INNER JOIN volume ON produits.id = volume.id_p
  WHERE volume.id_p = $id_produit;
  
  ";
  
  //3- exécution de la requête
  $resultat = $conn->query($requete);
  
  //4 - resultat
  $volumes = $resultat->fetchAll();

  return $volumes;
}



function getSousImage($id_produit){

  //1- connexion vers la BD
  
  $conn = connect();
  
  //2- création de la requête
  $requete = "SELECT *
  FROM produits
  INNER JOIN sous_image ON produits.id = sous_image.id_image
  WHERE sous_image.id_image = $id_produit;
  
  ";
  
  //3- exécution de la requête
  $resultat = $conn->query($requete);
  
  //4 - resultat
  $simage = $resultat->fetchAll();

  return $simage;
}

function getPrixParVolume($id_produit, $v)
{
  // Connexion à la base de données
  $conn = connect();

  // Préparation de la requête avec des paramètres liés
  $requete = "SELECT volume.ml, volume.prix
              FROM produits
              INNER JOIN volume ON produits.id = volume.id_p
              WHERE volume.id_p = :id_produit AND volume.ml = :v";

  // Préparation de la requête avec des paramètres liés
  $stmt = $conn->prepare($requete);
  $stmt->bindValue(':id_produit', $id_produit);
  $stmt->bindValue(':v', $v);
  $stmt->execute();

  // Récupération du résultat
  $volume = $stmt->fetch();

  return $volume;
}

function getALLProductsCategorie($id)
{
//1- connexion vers la BD
    
$conn=connect();

        
//2- creation de la requette
$requette="SELECT * FROM produits where categorie=$id ";

//3- execution de la requette

$resultat=$conn->query($requette);

//4- resultat de la requette

$produits=$resultat->fetchALL();

// var_dump($categories);


return $produits;
}


 

//php end?> 

