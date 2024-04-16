<?php //php start 

session_start();
include "inc/functions.php";
$total=0;
$id_p = 1;

$categories = getALLCategories();

if (!empty($_POST)){ 
    $produits=searchProduits($_POST['search']);
} else if (isset($_GET['prix']) && $_GET['prix'] == '0-5000') {
    $produits = getProductsByPriceRange(0, 5000);
} else {
    $produits=getALLProducts();
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
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
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
<?php //php start 



$categories = getALLCategories();
?> 


    <div class="row isotope-grid" id="product">

<?php foreach($produits as $produit): ?>

    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $produit['categorie']; ?>" >
      <!-- Block2 -->
      <div class="block2" >
        <div class="block2-pic hov-img0"  id="search-result">
          <img src="images/<?php echo $produit['image']; ?>" alt="IMG-PRODUCT" >
		  

          <a href="# " class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" onclick="getIdProduit(<?php echo $produit['id']; ?>)">
  Quick View
  
<?php
if (isset($id_p)) {
  $p = getProduitById($id_p);
}
?>
</a>




</a>

		  
        </div>

        <div class="block2-txt flex-w flex-t p-t-14">
          <div class="block2-txt-child1 flex-col-l ">
		  <a href="produit.php?id=<?php echo $produit['id']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
              <?php echo $produit['nom']; ?>
            </a>

            <span class="stext-105 cl3">
              <?php echo $produit['prix']; ?>
            </span>
          </div>

          <div class="block2-txt-child2 flex-r p-t-3">
            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
              <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
              <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
            </a>
          </div>
        </div>
      </div>


	  

    </div>



  <?php endforeach; ?>

			
</div>

<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>


<!-- Modal1 -->
<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">

	
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
					
				</button>

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
                

    <img src="images/<?php echo $p['image']; ?>" alt="IMG-PRODUCT">





										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-02.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-03.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
    

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="vendor/isotope/isotope.pkgd.min.js"></script>

<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>

	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	

<script>
	$(document).ready(function() {
    function sortProducts(order, key) {
      const grid = $('.isotope-grid');
      const iso = new Isotope(grid[0], {
        itemSelector: '.isotope-item',
        layoutMode: 'fitRows',
        getSortData: {
          price: function(itemElem) {
            const priceText = $(itemElem).find('.stext-105').text();
            return parseFloat(priceText.replace(/[^\d.-]/g, ''));
          },
          date: '.date parseInt'
        },
        sortBy: key,
        sortAscending: (order === 'asc')
      });
    
      // Ajouter une fonction de filtre pour filtrer les produits selon le prix
      
      
    }
    
    const lowToHighLink = $('#low-to-high-link');
    const highToLowLink = $('#high-to-low-link');
    const newnessLink = $('#newness-link');
    const priceFilterLink = $('#price-filter-link');
    
    lowToHighLink.on('click', function(e) {
      e.preventDefault();
      sortProducts('asc', 'price');
    });
    
    highToLowLink.on('click', function(e) {
      e.preventDefault();
      sortProducts('desc', 'price');
    });
    
    newnessLink.on('click', function(e) {
      e.preventDefault();
      sortProducts('desc', 'date');
    });
    
    priceFilterLink.on('click', function(e) {
      e.preventDefault();
      const grid = $('.isotope-grid');
      <?php 	$produits = getProductsByPriceRange(0, 5000);  ?>
    });
  });
</script>




<!--===============================================================================================-->
	<script src="js/main.js"></script>
  <script src="js/functions.js"></script>

</html>




		