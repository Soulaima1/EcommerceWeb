<?php //php start 
session_start();
include "inc/functions.php";
$id_p = 1;

$categories = getALLCategories();

if (!empty($_POST)){ 
    $produits=searchProduits($_POST['search']);
} else if (isset($_GET['prix']) && $_GET['prix'] == '0-5') {
    $produits = getProductsByPriceRange2(0, 5000);
}else if (isset($_GET['prix']) && $_GET['prix'] == '5-20') {
    $produits = getProductsByPriceRange2(5000,20000);
}else if (isset($_GET['prix']) && $_GET['prix'] == '20-50') {
    $produits = getProductsByPriceRange2(20000, 50000);
}else if (isset($_GET['prix']) && $_GET['prix'] == '50-100') {
    $produits = getProductsByPriceRange2(50000, 100000);
}else if (isset($_GET['prix']) && $_GET['prix'] == '100-150') {
    $produits = getProductsByPriceRange2(100000, 150000);

}else if (isset($_GET['prix']) && $_GET['prix'] == 'tous') {
	$produits=getALLProducts();
}




else {
    $produits=getALLProducts();
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
<?php //php start 

require_once('inc/functions.php');//pour que la fonction s'appelle une seule fois 

$categories = getALLCategories();


//php end?> 

<!-- Header -->
	<?php  //php  NAV

include "inc/header.php";
$total=0;
if(isset($_SESSION['panier'])){
$total=$_SESSION['panier'][1];
$_SESSION['total'] = $total;

}
//php end?> 
	
		<!-- Product -->
<section class="bg0 p-t-23 p-b-140" >
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>

					<?php //php start
 
						foreach($categories as $categorie){
					print '<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".'.$categorie['id'].'">
					'.$categorie['nom'].'
					</button>';
					}
					//php end
					?>
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input id="search-input" placeholder="Search" aria-label="Search" class="mtext-107 cl2 size-114 plh2 p-r-15" type="search" name="search" onkeyup="search()" placeholder="Search">
					</div>	
				</div>

			<!-- Filter -->
<div class="dis-none panel-filter w-full p-t-10">
    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
        <div class="filter-col1 p-r-15 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                Sort By
            </div>

            <ul>
               

                <li class="p-b-6">
                    <a href="#product" class="filter-link stext-106 trans-04 " id="newness-link">
                        Newness
                    </a>
                </li>

				<li class="p-b-6">
					<a href="#" class="filter-link stext-106 trans-04" id="low-to-high-link">
						Price: Low to High
					</a>
				</li>

				<li class="p-b-6">
					<a href="#" class="filter-link stext-106 trans-04" id="high-to-low-link">
						Price: High to Low
					</a>
				</li>
            </ul>
        </div>

        <div class="filter-col2 p-r-15 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                Price
            </div>

            <ul>
                <li class="p-b-6">
                <form action="#product" method="GET">
					<input type="hidden" name="prix" value="tous">
					<button type="submit" class="filter-link stext-106 trans-04 filter-link-active">Tous</button>
				</form>
				</li>
				<li class="p-b-6">
                <form action="#product" method="GET">
					<input type="hidden" name="prix" value="0-5">
					<button type="submit" class="filter-link stext-106 trans-04">0-5 DT</button>
				</form>
				</li>
				<li class="p-b-6">
                <form action="#product" method="GET">
					<input type="hidden" name="prix" value="5-20">
					<button type="submit" class="filter-link stext-106 trans-04">5 DT-20 DT</button>
				</form>
				</li>

				<li class="p-b-6">
                <form action="#product" method="GET">
					<input type="hidden" name="prix" value="20-50">
					<button type="submit" class="filter-link stext-106 trans-04">20 DT-50 DT</button>
				</form>
				</li>

                <li class="p-b-6">
                <form action="#product" method="GET">
					<input type="hidden" name="prix" value="50-100">
					<button type="submit" class="filter-link stext-106 trans-04">50 DT-100 DT</button>
				</form>
				</li>

				<li class="p-b-6">
                <form action="#product" method="GET">
					<input type="hidden" name="prix" value="100-150">
					<button type="submit" class="filter-link stext-106 trans-04">100 DT-150 DT</button>
				</form>
				</li>

				<li class="p-b-6">
                <form action="#product" method="GET">
					<input type="hidden" name="prix" value="150-200">
					<button type="submit" class="filter-link stext-106 trans-04">150 DT-200 DT</button>
				</form>
				</li>
								
							</ul>
						</div>

						

						
					</div>
				</div>
			</div>

			

			
			<div class="row isotope-grid" id="product">
  <?php if (!empty($produits)): ?>
    <?php foreach($produits as $produit): ?>
      <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $produit['categorie']; ?>" >
        <!-- Block2 -->
        <div class="block2">
          <div class="block2-pic hov-img0" id="search-result">
            <img src="images/<?php echo $produit['image']; ?>" alt="IMG-PRODUCT">
            <a href="produit.php?id=<?php echo $produit['id']; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
              Afficher
            </a>
          </div>
          <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l">
              <a href="produit.php?id=<?php echo $produit['id']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                <?php echo $produit['nom']; ?>
              </a>
              <span class="stext-105 cl3">
                <?php echo $produit['prix']; ?>
              </span>
            </div>
            
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p>Aucun produit trouvé.</p>
  <?php endif; ?>
</div>




<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>

</body>

<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--================================================F===============================================-->
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

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
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

	
	<script src="js/main.js"></script>
	<script src="js/functions.js"></script>

	<!--====================================Pour le dropdown de produit===========================================================-->


	<script src="vendor/select2/select2.min.js"></script>
<script>
    $(".js-select2").each(function(){
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
</script>

	
	


</body>
</html>