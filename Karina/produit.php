<?php //php start 
session_start();
include "inc/functions.php";

$categories = getALLCategories();

//APPEL DE LA FONCTION getProduitById

if (isset($_GET['id'])){
 $produit= getProduitById($_GET['id']);

  $volumes = getVolume($_GET['id']); 

  $sous_images=getSousImage($_GET['id']); 


}
$commandes=array();
if (isset($_SESSION['panier'])){
    if(count($_SESSION['panier'][3])>0){
        $commandes=$_SESSION['panier'][3];
    }

}


//php end?> 



<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->



</head>
<body class="animsition">
<?php  //php  NAV

include "inc/header.php";
$total=0;
if(isset($_SESSION['panier'])){
$total=$_SESSION['panier'][1];
$_SESSION['total'] = $total;

}

//php end?> 

<div class="row col-12 mt-4">
      <?php if(isset($_SESSION['etat']) && $_SESSION['etat']==0){ 

print'<div class="alert alert-danger">Compte non validée  </div>
';
} ?> 

        </div>


        </div>
      
<!-- breadcrumb -->
<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			
				

			<span class="stext-109 cl4">
			<?php
foreach ($categories as $categorie) {
    if ($categorie['id'] == $produit['categorie']) {
        echo $categorie['nom'];
    }
}
?>
			</span>
		</div>
	</div>
		

	
	

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>


							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="images/<?php echo $produit['image']; ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="images/<?php echo $produit['image']; ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo $produit['image']; ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<?php
										$i = 1; // Déclaration de la variable

										foreach ($sous_images as $sous_image) {
											if ($i == 1) {
												?>
												<div class="item-slick3" data-thumb="images/<?php echo $sous_image['s_image']; ?>">
													<div class="wrap-pic-w pos-relative">
														<img src="images/<?php echo $sous_image['s_image']; ?>" alt="IMG-PRODUCT">
														<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/<?php echo $sous_image['s_image']; ?>">
															<i class="fa fa-expand"></i>
														</a>
													</div>
												</div>
												<?php
											}
											$i++;
										}
										?>


								<div class="item-slick3" data-thumb="images/<?php echo $sous_image['s_image']; ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="images/<?php echo $sous_image['s_image']; ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/<?php echo $sous_image['s_image']; ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
						<?php echo $produit['nom']; ?>
						</h4>

						<span class="mtext-106 cl2">
						<div id="resultat"> <?php

$id_produit = $produit['id']; // Récupérer l'ID du produit
$v = 30; // Définir la valeur de volume

// Appeler la fonction getPrixParVolume
$volume = getPrixParVolume($id_produit, $v);

// Vérifier si un résultat a été retourné
if ($volume) {
echo "";
} else {
echo "Aucun résultat trouvé.";
}

?></div>
						</span>

						<p class="stext-102 cl3 p-t-23">
						<?php echo $produit['description']; ?>
						</p>
						
						<!--  -->
						<div class="p-t-33">
						
<div class="flex-w flex-r-m p-b-10">
  <div class="size-203 flex-c-m respon6">
    Volume
	

	 
  </div>

  <div class="size-204 respon6-next">
  <div class="rs1-select2 bor8 bg0">
  <select class="js-select2" name="volume" id="variables" onchange="afficherValeur(<?php echo $produit['id']; ?>, this.value)">
  <option value="">Choose an option</option>
  <?php foreach($volumes as $volume): ?>
    <option value="<?php echo $volume['ml']; ?>"><?php echo $volume['ml']; ?> ml</option>
  <?php endforeach; ?>
</select>

    <div class="dropDownSelect2"></div>
  </div>
</div>

</div>

</div>

<div class="flex-w flex-r-m p-b-10">
  <div class="size-204 flex-w flex-m respon6-next">
    <form class="d-flex" action="actions/commander.php" method="POST">
      <div class="wrap-num-product flex-w m-r-20 m-tb-10">
        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
          <i class="fs-16 zmdi zmdi-minus"></i>
        </div>
        <input class="mtext-104 cl3 txt-center num-product" type="number" name="quantite" value="1">
        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
          <i class="fs-16 zmdi zmdi-plus"></i>
        </div>
      </div>
      <input type="hidden" value="<?php echo $produit['id'] ?>" name="produit">
	  <input type="hidden" name="volume" id="volume" value="">

	  <button type="submit" id="commander-<?php echo $produit['id'] ?>" <?php if((!isset($_SESSION['nom'])) || (isset($_SESSION['etat']) && $_SESSION['etat'] == 0)) { echo "disabled"; } ?> class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04" onclick="checkFormSubmission(event)">Commander</button>

       
    </form>
  </div>
</div>




						<!--  -->
						
					</div>
				</div>
			</div>

			
	</section>











	  

      <?php  
      include "inc/footer.php";
       ?>

</body>



<script>
  function checkFormSubmission() {
    var selectedVolume = document.getElementById('variables').value;
    if (selectedVolume === '') {
      event.preventDefault(); // Empêche la soumission du formulaire
      alert('Veuillez choisir une option de volume.');
    }
	else{
		Swal.fire({
        icon: 'success',
        text: 'ajout de produit avec succès!',
        confirmButtonText: 'OK',
        timer: 2000
      });
	}
  }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script><!--SWEET ALERT POUR MINDIQUER QUANT JAJOUTE UN VISITEUR-->
<script>
    // Votre code JavaScript avec la fonction showSuccessAlert()
    function showSuccessAlert() {
      Swal.fire({
        icon: 'success',
        text: 'Création de compte avec succès!',
        confirmButtonText: 'OK',
        timer: 2000
      });
    }
  </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/


	
	</script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>


<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="js/functions.js"></script>
		
<script>
 function afficherValeur(idProduit, v) {
  var select = document.getElementById("variables");
  var valeurSelectionnee = select.value;

  // Mettre à jour la valeur du champ caché
  document.getElementById("volume").value = valeurSelectionnee;

  // Effectuer une requête AJAX pour obtenir le prix
  $.ajax({
    url: 'inc/getPrixParVolume.php',
    type: 'GET',
    data: { idProduit: idProduit, valeurSelectionnee: valeurSelectionnee },
    success: function(response) {
      var resultat = document.getElementById("resultat");
      resultat.textContent = "Prix : " + response + " Dt";
    },
    error: function() {
      console.log("Une erreur s'est produite lors de la requête AJAX.");
    }
  });
}




  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>