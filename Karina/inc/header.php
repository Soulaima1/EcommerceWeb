<?php //php start 

require_once('inc/functions.php');//pour que la fonction s'appelle une seule fois 

$categories = getALLCategories();

$total=0;



//php end?> 

<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			

				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="index.php">Home</a>
								
							</li>
							
							<li class="label1" data-label1="hot">
								<a href="produits.php">Produits</a>
							</li>

							<li>
								<a href="panier.php">panier</a>
							</li>

							

						
							<?php  
              if (isset($_SESSION['nom'])){

                print '<li class="nav-item">
                <a class="nav-link active" aria-current="page" href="profile.php">Profile</a>
              </li>';
              
              
              }else{

              
                  print '
                  <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="connexion.php">Connexion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="registre.php">Register</a>
              </li>';
                 
              }

            ?> 


						</ul>
					</div>	


					<!-- Icon header -->

					

           
                
					<div class="wrap-icon-header flex-w flex-r-m">
  <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
    <i class="zmdi zmdi-search"></i>
  </div>

  <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php 
    if(isset($_SESSION['panier'][3]) && is_array($_SESSION['panier'][3])) {
      echo count($_SESSION['panier'][3]);
    } else {
      echo '0';
    }
  ?>">
    <i class="zmdi zmdi-shopping-cart"></i>
  </div>

  <?php //php start
  if (isset($_SESSION['nom'])) {
    print '<a href="deconnexion.php" class="btn btn-primary" style="margin-left: 10px;">Déconnexion</a>';
  } //php end?>
</div>

				</nav>
			
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>
				</li>

				
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.html">Home</a>
					*
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="product.html">Shop</a>
				</li>

				<li>
					<a href="shoping-cart.html" class="label1 rs1" data-label1="hot">Features</a>
				</li>

				<li>
					<a href="blog.html">Blog</a>
				</li>

				<li>
					<a href="about.html">About</a>
				</li>

				<li>
					<a href="contact.html">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15" action="index.php" method="POST">
					<button class="flex-c-m trans-04" type="submit">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>

			

	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
				<?php
				if (!empty($commandes)) {

					foreach($commandes as $index=>$commande )
					{
						print' 
						
						<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
						
						<img src="images/'.$commande[6].'" height="60" />
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
							'.$commande[5].'
							</a>

							<span class="header-cart-item-info">
							'.$commande[0].' x '.$commande[1].'
							</span>
						</div>
					</li>

						';
					}
					
					
				} else {
					echo "";
				}
					
				?> 
					

					

					
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
					<p>Total: <?php if (!isset($_SESSION['total'])) { echo 0; } else { echo $_SESSION['total']; } ?></p>



					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="panier.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						
					</div>
				</div>
			</div>
		</div>
	</div>