<!-- THIS IS WEBSITE ONLINE SHOP FOR SUPERDDIGNA -->
<!-- CREATE BY DWI PRIHTA PAMBUDI -->

<!-- HEADER CALL ASSETS AND NAVIGATION MENU-->
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>SUPERDIGNA</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="<?php echo base_url()?>assets/images/logo/logo2.png">
    <link rel="apple-touch-icon" href="<?php echo base_url()?>assets/images/icon.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

  
	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> 

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
	
	<!-- Cusom css -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/plugins.css">
	
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/plugins/check.css">

	<!-- Modernizer js -->
    <script src="<?php echo base_url();?>assets/js/vendor/modernizr-3.5.0.min.js"></script>
    
    <!-- JS Files -->
	<!--Start of Tawk.to Script-->
		<script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/5d85cbd5c22bdd393bb6fddb/default';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
		})();
		</script>
<!--End of Tawk.to Script-->
</head>

<body>
	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<header id="wn__header" class="header__area header__absolute sticky__header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<div class="logo">
							<a href="<?php echo base_url()?>home_visitor">
								<img src="<?php echo base_url()?>assets/images/logo/logo.png" alt="logo images">
							</a>
						</div>
                    </div>
                    
					<div class="col-lg-8 d-none d-lg-block">
						<nav class="mainmenu__nav">
							<ul class="meninmenu d-flex justify-content-start">
								<li class="drop with--one--item"><a href="<?php echo base_url()?>Home_visitor">Home</a></li>
								<li class="drop with--one--item"><a href="<?php echo base_url()?>Home_visitor/produk">Shop</a></li>

								<li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#caraorder">CARA ORDER</i></a></li>			
								<li class="drop with--one--item"><a href="index.html">KONFIRMASI PEMBAYARAN</a></li>

								<li><a href="<?php echo base_url()?>Home_visitor/menu_contact">Contact</a></li>
							</ul>
						</nav>
                    </div>
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">

							<li class="shop_search mr-3"><a class="search__active" href="#"></a></li>

							<!-- <li class="wishlist"><a href="wishlist.html"></a></li> -->

							<li class="shopcart"><a href="cart.html"><span class="product_qun">0</span></a>
								
							</li>

							<li class="setting__bar__icon"><a class="btn btn-sm btn-warning setting__active" style="border-radius:100px;" href="#"></a>
								<div class="searchbar__content setting__block">
									<div class="content-inner">
										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>AKUN SAYA</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<span class="currency-trigger"><a href="<?php echo base_url('login/login')?>">LOGIN / REGISTER</a></span>
													<!-- <ul class="switcher-dropdown">
														<li>GBP - British Pound Sterling</li>
														<li>EUR - Euro</li>
													</ul> -->
												</div>
											</div>
										</div>
								</div>
							</li>
						</ul>
					</div>
                </div>
                
				<!-- Start Mobile Menu -->
				<div class="row d-none">
					<div class="col-lg-12 d-none">
						<nav class="mobilemenu__nav">
							<ul class="meninmenu">
								<li><a href="<?php echo base_url()?>Home_visitor">Home</a></li>
								<li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#caraorder">CARA ORDER</i></a></li>
								<li><a href="contact.html">KONFIRMASI PEMBAYARAN</a></li>

								<li><a href="<?php echo base_url()?>Home_visitor/menu_contact"">CONTACT</a></li>
		
							</ul>
						</nav>
					</div>
				</div>
				<!-- End Mobile Menu -->
	            <div class="mobile-menu d-block d-lg-none">
	            </div>
	            <!-- Mobile Menu -->	
			</div>		
		</header>
		<!-- //Header -->
		<!-- Start Search Popup -->
		<div class="brown--color box-search-content search_active block-bg close__top">
			<form id="search_mini_form" class="minisearch" action="#">
				<div class="field__search">
					<input type="text" placeholder="Search entire store here...">
					<div class="action">
						<a href="#"><i class="zmdi zmdi-search"></i></a>
					</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>close</span>
			</div>
        </div>
<!-- End Search Popup -->
<!-- HEADER CALL ASSETS AND NAVIGATION MENU-->

