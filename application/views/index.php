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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

	<!-- Bootstrap core CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			 

	<!-- Modernizer js -->
	<script src="<?php echo base_url()?>assets/js/vendor/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/vendor/modernizr-3.5.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

	<!-- Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154563123-1"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-154563123-1');
	</script>
	<!-- Google Analytics -->

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-5W8GZXH');</script>
	<!-- End Google Tag Manager -->
    
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
		
		<script type="text/javascript">
		$(function () {
		$('[data-toggle="tooltip"]').tooltip()
		})
		</script>
<!--End of Tawk.to Script-->
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5W8GZXH"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<header id="wn__header" class="header__area header__absolute sticky__header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<div class="logo">
							<a href="<?php echo base_url()?>user">
								<img src="<?php echo base_url()?>assets/images/logo/logo.png" alt="logo images">
							</a>
						</div>
                    </div>
                    
					<div class="col-lg-8 d-none d-lg-block">
						<nav class="mainmenu__nav">
							<ul class="meninmenu d-flex justify-content-start">
								<li class="drop with--one--item"><a href="<?php echo base_url()?>user">Home</a></li>
								<li class="drop with--one--item"><a href="<?php echo base_url()?>user/produk">Shop</a></li>
								<li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#caraorder">CARA ORDER</i></a></li>			
								<li class="drop with--one--item"><a href="<?php echo base_url()?>user/transaksi">KONFIRMASI PEMBAYARAN</a></li>
								<li><a href="<?php echo base_url()?>user/menu_contact">Contact</a></li>
							</ul>
						</nav>
					</div>
					
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
							<!-- <li class="shop_search mr-3"><a class="search__active" href="#"></a></li> -->
							<!-- <li class="wishlist"><a href="wishlist.html"></a></li> -->
							
							<?php
								if ($cart = $this->cart->contents())
									{
                                        $jumlah_total = 0;
                                        foreach ($cart as $cr):
										$jumlah_total =  $jumlah_total + $cr['qty'];			
							?>							
										<?php endforeach;?>				
										<li class="shopcart"><a href="<?= base_url('user/cart')?>"> <span class="product_qun"><?php if ($jumlah_total<1)
											{echo"0";}else{ echo $jumlah_total;}?></span></a>	
										<?php }else{?>
											<li class="shopcart"><a href="<?= base_url('user/cart')?>"> <span class="product_qun">0</span></a>	
										<?php }?>
	
							</li>	
							
							<?php 
								if ($this->session->userdata('id_role')=="1"){
								$rows = $this->db->query("SELECT * FROM tbl_user where id_user='".$this->session->id_user."'")->row_array();?>
									<li class="setting__bar__icon"><a class="setting__active" href="#"><img style="border-radius:50px;" width="25px" class="mb-1valign" src="<?php echo base_url('/assets/images/user_picture/')?><?=$rows['image'];?>"></a>
										<div class="searchbar__content setting__block">
											<div class="content-inner">
												<div class="">
												
													<strong class=" switcher-label">
														<img style="border-radius:50px; " width="60px" class="mb-1" src="<?php echo base_url('/assets/images/user_picture/')?><?=$rows['image'];?>">
													</strong>
													<div class="switcher-options">
														<div class="switcher-currency-trigger">
														<a href="<?=base_url()?>user/profil/<?=$rows['id_user'];?>"><?= strtoupper($rows['nama_user']);?></a>
													</div><hr>
												
													<div class="switcher-options">
														<div class="switcher-currency-trigger">
														<a style="color:white;" class="btn btn-sm btn-danger mt-3" href="<?php echo base_url('login/logout')?>">LOG-OUT</a>	
														</div>
													</div>
												</div>
										</div>
									</li>
								<?php }else{?>
									<li class="setting__bar__icon"><a class="setting__active" href="<?php echo base_url('login/login')?>"><img style="border-radius:50px;" width="25px" class="mb-1valign" src="<?php echo base_url('/assets/images/user_picture/default2.jpg');?>"></a>
									</a>
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
							<?php }?>
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
								<li><a href="<?php echo base_url()?>Home_visitor/menu_contact">CONTACT</a></li>
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
<div class="item">

<?= $content; ?>
<!-- end item -->
</div>
<!-- CONTEN UTAMA-->

<!-- Footer Area -->
<footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
			<div class="footer-static-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="footer__widget footer__menu">
								<div class="ft__logo">
									<!-- <a href="index.html">
										<img src="images/logo/logo.png" alt="logo">
									</a> -->
									<p>Terimakasih telah mengunjungi website superdigna, kami akan sangat senang bila anda mau mengunjungi sosial media kami.</p>
								</div>
								<div class="footer__content">
									<ul class="social__net social__net--2 d-flex justify-content-center">
										<li><a href="#"><i class="bi bi-facebook"></i></a></li>
										<li><a href="#"><i class="bi bi-google"></i></a></li>
										<li><a href="#"><i class="bi bi-twitter"></i></a></li>
										<li><a href="#"><i class="bi bi-linkedin"></i></a></li>
										<li><a href="#"><i class="bi bi-youtube"></i></a></li>
									</ul>
									<ul class="mainmenu d-flex justify-content-center">
										<li><a href="<?php echo base_url()?>user/produk">All Product</a></li>
										<!-- <li><a href="index.html">Wishlist</a></li> -->
										<li><a href="<?= base_url('user/cart')?>">Keranjang</a></li>
										<li><a href="<?php echo base_url()?>user/menu_contact">Contact</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="copyright__wrapper">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="copyright">
								<div class="copy__right__inner text-left">
									<p>Copyright <i class="fa fa-copyright"></i> <a href="https://freethemescloud.com/">Superdigna</a> All Rights Reserved</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="payment text-right">
								<img src="images/icons/payment.png" alt="" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<!-- javascript ongkir -->
		<script type="text/javascript">
         $(document).ready(function() {
    
               $('#prov').change(function() {
                  var prov = $('#prov').val();
                  var province = prov.split(',');

                  $.ajax({
                     url: "<?=base_url();?>checkout/city",
                     method: "POST",
                     data: { prov : province[0] },
                     success: function(obj) {
                        $('#kota').html(obj);
                     }
                  });
               });

               $('#kota').change(function() {
                  var kota = $('#kota').val();
                  var dest = kota.split(',');
                  var kurir = $('#kurir').val()

                  $.ajax({
                     url: "<?=base_url();?>checkout/getcost",
                     method: "POST",
                     data: { dest : dest[0], kurir : kurir },
                     success: function(obj) {
                        $('#layanan').html(obj);
                     }
                  });
               });

               $('#kurir').change(function() {
                  var kota = $('#kota').val();
                  var dest = kota.split(',');
                  var kurir = $('#kurir').val()

                  $.ajax({
                     url: "<?=base_url();?>checkout/getcost",
                     method: "POST",
                     data: { dest : dest[0], kurir : kurir },
                     success: function(obj) {
                        $('#layanan').html(obj);
                     }
                  });
               });

               $('#layanan').change(function() {
                  var layanan = $('#layanan').val();

                  $.ajax({
                     url: "<?=base_url();?>checkout/cost",
                     method: "POST",
                     data: { layanan : layanan },
                     success: function(obj) {
                        var hasil = obj.split(",");

                        $('#ongkir').val(hasil[0]);
                        $('#total').val(hasil[1]);
                     }
                  });
               });

            $(window).scroll(function(){
               if ($(this).scrollTop() > 100) {
                  $('.back-top').fadeIn();
              	} else {
                  $('.back-top').fadeOut();
               }
            });
            $('.back-top').click(function(){
               $("html, body").animate({ scrollTop: 0 }, 600);
            	return false;
            });
         });
      </script>
		<!-- javascript ongkir -->

		 <!-- Data Tables -->
		<script src="<?=base_url();?>assets/js/datatable/jquery.dataTables.min.js"></script>
		<script src="<?= base_url(); ?>assets/js/datatable/dataTables.bootstrap.min.js"></script>
		<script src="<?= base_url(); ?>assets/js/datatable/dataTables.responsive.min.js"></script>

        <!-- JS Files -->
        <script src="<?php echo base_url()?>assets/js/vendor/jquery-3.2.1.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/popper.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/plugins.js"></script>
        <script src="<?php echo base_url()?>assets/js/active.js"></script>
        <script src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
        <!-- JS Files -->
		
</body>
<script>
			$(document).ready(function(){
				$('#datatable').DataTable();
			});
		</script>
</html>

<!-- CARA ORDER -->
<div id="quickview-wrapper">
				<!-- Modal -->
				<div class="modal fade" id="caraorder" tabindex="-1" role="dialog">
					<div class="modal-dialog modal__container" role="document">
						<div class="modal-content">
							<div class="modal-header modal__header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body">
								<div class="modal-product">

									<!-- Start product images -->
									<div class="row">
									<div class="col-lg-4">
									<div class="product-images">
										<div class="main-image images" style="width:300px">
											<img  alt="big images" src="<?php echo base_url()?>assets/images/testimonial/cara_bayarp.png">
										</div>
									</div>
									</div>
									<!-- end product images -->
									<div class="col-lg-8">
									<div class="alert alert-primary" role="alert">
										<h4 class="alert-heading">Cara Pemesanan!</h4><br><hr>
											<p>1. Klik <b>Menu SHOP</b> pada navigation bar, untuk memilih produk yang anda sukai, masukan kedalam keranjang belanja anda.</p>
											<p>2. Klik <b>Checkout</b> pada keranjang jika anda ingin melanjutkan proses pembelian ke proses pembayaran, <b>sebelum melakukan checkout silahkan tanyakan stok dahulu</b> melalui menu chat di pojok kiri bawah layar anda.</p>
											<p>3. pastikan anda mengisi seluruh form pada halaman checkout <b>dengan benar.</p>
											<p>4. Anda akan diarahkan kedalam halaman transaksi yang berisis detil transaksi anda. </b></p>
											<p>5. Silahkan kirimkan pembayaran ana melalui <b>rekening BCA berikut</b><div class="btn btn-sm btn-primary">015 425 5555</div> atas nama <B>PT ADIPILAR NANDITAMA.</B></p>
											<p>6. Setelah melakukan transfer pembayaran <b>pastikan anda mengkonfirmasi pembayaran</b> anda melalui tombol<div class="btn btn-sm btn-success"><i class="fa fa-check"></i></div> pada menu transaksi.</p>
											<p>7. Setelah melakukan konfirmsi bayar, pihak superdigna akan segera melakukan pengecekan, jika data konfirmasi sudah sesuai ,<b>kami akan segere mengirimkan nomor resi pengiriman dalam halaman transaksi.</b></p>
											<p>8. Terimakasih sudah berbelanja di superdigna <span class='fa fa-heart'></span></b></p>
										</div>
									</div></div>
								</div>
								<!-- <button type="submit" name="submit" class="btn btn-primary" style="width:100%"> DOWNLOAD PANDUAN PEMESANAN <i class="fa fa-download"></i></button> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END QUICKVIEW PRODUCT -->
			
	</div>
	<!-- //Main wrapper -->

