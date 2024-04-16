<?php //php start bech l categorie 1 w 2 w 3 w 4 yatl3ou fel page connexion
session_start();

//condition bech lutilisateur ki yabda halel session ma3andouch l ha9 ihel l page connexion ken maysaker
if(isset($_SESSION['nom'])){//ma3neha lutilisateur connecte
 // header('location:profile.php');
  }


include "../inc/functions.php";
$user=true;


if(!empty($_POST)){//click sur le bouton sauvegarder

  $user=ConnectAdmin($_POST);//$_POST feha les donnes mta3 l formulaire 
  //var_dump($user);
  if(is_array($user) && count($user)>0){//ma3netha 3ala9al 3andi ligne donc l user mte3i shih
    Session_start();
    $_SESSION['id']=$user['id'];
    $_SESSION['email']=$user['email'];
    $_SESSION['nom']=$user['nom'];
    $_SESSION['mp']=$user['mp'];
    header('location:profile.php');//redirection vers la page profile
  }

}

//php end?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.css"><!--SWEET ALERT POUR MINDIQUER QUANT JAJOUTE UN VISITEUR-->


</head>
<body>

      <!--Fin nav-->
      <div class="col-12 p-5">
        <h1 class="text-center">Espace Admin : Connexion</h1>
        <form action="connexion.php" method="post">
            <div class="mb-3">

              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" name="mp" class="form-control" id="exampleInputPassword1">
              </div>

            <button type="submit" class="btn btn-primary">Connecter</button>
          </form>
      </div>
      
<!--FOOTER-->
<?php  
      include "../inc/footer.php";
?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script><!--SWEET ALERT POUR MINDIQUER QUANT JAJOUTE UN VISITEUR-->
<?php  //php ALERT
if(!$user){
  print "
  <script >
   
  Swal.fire({
  icon: 'Erreur',
  text: 'Cordonnes non validé!',
  icon:'error',
  confirmButtonText:'ok',
  timer:2000
})
</script>
  ";
}


//php end?>
</html>