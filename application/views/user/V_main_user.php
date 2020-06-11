
	  <!-- Start Slider area -->
	  <div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
        	<!-- Start Single Slide -->
	        <div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			<div class="contentbox">
		            				<h2><span  style="color:#f9ae0c;">OUR OFFLINE  </span></h2>
		            				<h2><span  style="color:#AB2327;">STORE IS</span></h2>
									<h2><span  style="color:#AB2327;">COOMING SOON <i style="color:#f9ae0c;" class="fa fa-heart"></i></span></h2>
		            				<!-- <h2>DI <span  style="color:#f9ae0c;">SINI </span></h2> -->
									<a href="<?php echo base_url()?>user/produk"><button class="shopbtn btn btn-warning mt-5">SHOP NOW</a>
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
			<!-- End Single Slide -->
			
        	<!-- Start Single Slide -->
	        <div class="slide animation__style10 bg-image--2 image-responsive fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			<div class="contentbox">
		            				<h2>WE<span> HAVE<span></h2>
		            				<h2>NEW <span> COLOR</span></h2>
									<a href="<?php echo base_url()?>user/produk"><button class="shopbtn btn btn-warning mt-5">SHOP NOW</a>
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
			<!-- End Single Slide -->
			
			<!-- Start Single Slide -->
	        <div class="slide animation__style10 bg-image--3 fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			<div class="contentbox">
								<h2> COMBED<span> 30S<span></h2>
		            				<h2>PREMIUM <span></span></h2>
									<h2> <span> QUALITY</span></h2>
									<a href="<?php echo base_url()?>user/produk"><button class="shopbtn btn btn-warning mt-5">SHOP NOW</a>
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
            <!-- End Single Slide -->
        </div>
        <!-- End Slider area -->
		
	<!-- CARA ORDER -->
		<section class="wn__product__area brown--color pt--80  pb--30">
			<div class="container">
				<a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#caraorder">
					<img src="<?php echo base_url()?>assets/images/testimonial/horder.png" alt="logo images">
				</a>			
		<!-- CARA ORDER -->

		<!-- Start BEst Seller Area -->
		<section class="wn__product__area brown--color pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">PRODUK <span class="color--theme">SUPERDIGNA</span></h2>
							<p>Beberapa produk t-shirt dari superdigna yang kami tampilkan di sini, kami akan sangat bahagia jika anda bersedia melihat detil dari produk kami, klik shop now <span class='fa fa-heart'></span></p>
						</div>
					</div>
				</div>

				<!-- Start Single Tab Content -->
				<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
					
		<!-- Start Single Product -->
		
					<?php foreach($produk as $prd):?>    
					<div class="product product__style--3">
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="product__thumb">
								<a class="first__img" href="<?= base_url('user/detil_produk/')?><?= encrypt_url($prd['id_produk']);?>"><img  src="<?php echo base_url('/assets/images/produk/')?><?=$prd['foto'];?>"  alt="product image"></a>
								<div class="hot__box">
									<span class="hot-label"><?=$prd['nama_produk'];?></span>
								</div>
							</div>
							<div class="product__content content--center">
									<h4><a href="<?= base_url('home_visitor/detil_produk/')?><?= $prd['id_produk'];?>"><span class="hot-label"><?=$prd['nama_produk'];?></a></h4>
								<ul class="prize d-flex">
										<li><?= 'Rp '. $prd['harga'];?>	</li>
									<li class="old_prize"><?php $a=$prd['harga']; $b=10000; $c=$a+$b; echo 'Rp '. "$c";?></li>
								</ul>
								<div class="action">
									<div class="actions_inner">
											<ul class="add_to_links">
											<a style="color:white" href="<?= base_url('user/detil_produk/')?><?= encrypt_url($prd['id_produk']);?>" class="btn btn-sm btn-danger" name="shop" value="SHOP NOW"> SHOP NOW</a>
													<!-- <li><a class="cart" href="wishlist.html"><i class="bi bi-heart-beat"></i></a></li> -->
													<!-- <li><a class="wishlist"href="<?= base_url('home_visitor/menu_cart');?>"1><i class="bi bi-shopping-cart-full"></i></a></li>

													<li><a href="<?= base_url('user/detil_produk/')?><?= $prd['id_produk'];?>" <i class="bi bi-search"></i></a></li> -->
											</ul>
									</div>
								</div>
							</div>
						</div>
						</div>
						<?php endforeach;?>
					<!-- Start Single Product -->
					</div>
				</div>
				<!-- End Single Tab Content -->
			</div>
		</section>
		<!-- Start BEst Seller Area -->
		<!-- Start NEwsletter Area -->
		<section class="wn__newsletter__area bg-image--7">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 offset-lg-5 col-md-12 col-12 ptb--150">
						<div class="section__title text-center">
						<p><h1>SUPER<span style="color:#faac02;">DIGNA</span></h1>
						</div>
						<div class="newsletter__block text-center">
						<p>Superdigna adalah produsen kaos premium yang mengusung konsep untuk kaum millenial, saat ini superdigna memiliki 8 varian warna dengan bahan cotton combed 30S, bahan Combed 30S sangat cocok dipakai di iklim tropis seperti indonesia, karna memiliki karakteristik yang lembut dan dingin saat dipakai, superdigna juga melayani custom design bagi kalian yang ingin mencetak kreatifitas kalian sendiri didalam kaos.</p>
						<a href="<?php echo base_url()?>user/produk"><button class="shopbtn btn btn-lg btn-warning mt-4">ORDER NOW</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- <section class="wn__newsletter__area bg-image--7">
			<div class="container">

				<div class="row">
					<div class="col-lg-7 offset-lg-5 col-md-12 col-12 ptb--150">
						<div class="newsletter__block text-right">
						<p><h1>SUPER<span style="color:#faac02;">DIGNA</span></H1><hr width="8%;" style="float:right; border-width:7px; border-color:#f0cc18;"></BR>
						Superdigna adalah produsen kaos premium yang mengusung konsep untuk kaum millenial, saat ini superdigna memiliki 8 varian warna dengan bahan cotton combed 30S, bahan Combed 30S sangat cocok dipakai di iklim tropis seperti indonesia, karna memiliki karakteristik yang lembut dan dingin saat dipakai, superdigna juga melayani custom design bagi kalian yang ingin </p>
					</div>
				</div>
			</div>
		</section> -->
		<!-- End NEwsletter Area -->

		<!-- Start Recent Post Area -->
		<section class="wn__recent__post bg--gray ptb--80">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">TESTIMONI <span class="color--theme">CUSTOMER</span></h2>
							<p>Lihatlah bagaimana orang orang yang sudah berbahagia karna memiliki produk superdigna, jadilah orang bahagia berikutnya dengan memiliki produk superdigna <span class='fa fa-heart'></span></p>
						</div>
					</div>
				</div>
				<div class="row mt--50">
					<div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content">
								<h3><a class="justify-content-center" ><img src="<?php echo base_url()?>assets/images/testimonial/testi1.jpg" style="width:100%"?></a></h3>
								
								<div class="post__time">
									<span class="day"><b><i class="fa fa-heart"></i> Our Customer</b><br>
									<ul class="rating d-flex">
									<li class="on"><i style="color:#f9ae0c;" class="fa fa-star"></i></li>
										<li class="on"><i style="color:#f9ae0c;" class="fa fa-star"></i></li>
										<li class="on"><i style="color:#f9ae0c;" class="fa fa-star"></i></li>
										<li class="on"><i style="color:#f9ae0c;" class="fa fa-star"></i></li>
										<li class="on"><i style="color:#f9ae0c;" class="fa fa-star"></i></li>
									</ul>
									<div class="post-meta">	
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content">
									<h3><a class="justify-content-center"><img src="<?php echo base_url()?>assets/images/testimonial/testi2.jpg" style="width:100%"?></a></h3>
									<div class="post__time">
										<span class="day"><b><i class="fa fa-heart"></i> Our Customer</b><br>
										<ul class="rating d-flex">
										<li class="on"><i style="color:#f9ae0c;" class="fa fa-star"></i></li>
										<li class="on"><i style="color:#f9ae0c;" class="fa fa-star"></i></li>
										<li class="on"><i style="color:#f9ae0c;" class="fa fa-star"></i></li>
										<li class="on"><i style="color:#f9ae0c;" class="fa fa-star"></i></li>
										<li class="on"><i style="color:#f9ae0c;" class="fa fa-star"></i></li>
									</ul>
										<div class="post-meta">	
										</div>
									</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content">
									<h3><a class="justify-content-center" ><img src="<?php echo base_url()?>assets/images/testimonial/testi3.jpg" style="width:100%"?></a></h3>
								<!-- <p>We are proud to announce the very first the edition of the frankfurt news.We are proud to announce the very first of  edition of the fault frankfurt news for us <span class='fa fa-heart'></span></p> -->
								<div class="post__time">
									<span class="day"><b><i class="fa fa-heart"></i> Our Customer</b><br>
									<ul class="rating d-flex">
										<li class="on"><i style="color:#f9ae0c;" class="fa fa-star"></i></li>
										<li class="on"><i style="color:#f9ae0c;" class="fa fa-star"></i></li>
										<li class="on"><i style="color:#f9ae0c;" class="fa fa-star"></i></li>
										<li class="on"><i style="color:#f9ae0c;" class="fa fa-star"></i></li>
										<li class="on"><i style="color:#f9ae0c;" class="fa fa-star"></i></li>
									</ul>
									<div class="post-meta">	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Recent Post Area -->

		<!-- Best Sale Area -->
		<section class="best-seel-area pt--80">
			<div class="container">
				<div class="row">
					<div class="col-lg-12"><div class="ft__logo">
							<a href="">
							<img alt="big images" src="<?php echo base_url()?>assets/images/logo/logo1.png">
								</a>
						</div>
					</div>
				</div>
			</div> 
	<!-- Best Sale Area Area -->
		   
 	<!-- QUICKVIEW PRODUCT -->
		<div id="quickview-wrapper">
		    <!-- Modal -->
		    <div class="modal fade" id="productmodal" tabindex="-1" role="dialog">
		        <div class="modal-dialog modal__container" role="document">
		            <div class="modal-content">
		                <div class="modal-header modal__header">
		                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                </div>
		                <div class="modal-body">
		                    <div class="modal-product">
						
		                        <!-- Start product images -->
		                        <div class="product-images">
		                            <div class="main-image images">
									<img alt="big images" src="<?php echo base_url()?>assets/images/product/big-img/1.jpg">
		                            </div>
		                        </div>
		                        <!-- end product images -->
		                        <div class="product-info">
		                            <h1>Simple Fabric Bags</h1>
		                            <div class="rating__and__review">
		                                <ul class="rating">
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                </ul>
		                                <div class="review">
		                                    <a href="#">4 customer reviews</a>
		                                </div>
		                            </div>
		                            <div class="price-box-3">
		                                <div class="s-price-box">
		                                    <span class="new-price">$17.20</span>
		                                    <span class="old-price">$45.00</span>
		                                </div>
		                            </div>
		                            <div class="quick-desc">
		                                Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations creates a modern look.
		                            </div>
		                            <div class="select__color">
		                                <h2>Select color</h2>
		                                <ul class="color__list">
		                                    <li class="red"><a title="Red" href="#">Red</a></li>
		                                    <li class="gold"><a title="Gold" href="#">Gold</a></li>
		                                    <li class="orange"><a title="Orange" href="#">Orange</a></li>
		                                    <li class="orange"><a title="Orange" href="#">Orange</a></li>
		                                </ul>
		                            </div>
		                            <div class="select__size">
		                                <h2>Select size</h2>
		                                <ul class="color__list">
		                                    <li class="l__size"><a title="L" href="#">L</a></li>
		                                    <li class="m__size"><a title="M" href="#">M</a></li>
		                                    <li class="s__size"><a title="S" href="#">S</a></li>
		                                    <li class="xl__size"><a title="XL" href="#">XL</a></li>
		                                    <li class="xxl__size"><a title="XXL" href="#">XXL</a></li>
		                                </ul>
		                            </div>
		                            <div class="social-sharing">
		                                <div class="widget widget_socialsharing_widget">
		                                    <h3 class="widget-title-modal">Share this product</h3>
		                                    <ul class="social__net social__net--2 d-flex justify-content-start">
		                                        <li class="facebook"><a href="#" class="rss social-icon"><i class="zmdi zmdi-rss"></i></a></li>
		                                        <li class="linkedin"><a href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
		                                        <li class="pinterest"><a href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
		                                        <li class="tumblr"><a href="#" class="tumblr social-icon"><i class="zmdi zmdi-tumblr"></i></a></li>
		                                    </ul>
		                                </div>
		                            </div>
		                            <div class="addtocart-btn">
		                                <a href="#">Add to cart</a>
									</div>
									
									<div class="product__info__detailed">
										<div class="pro_details_nav nav justify-content-start" role="tablist">
											<a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">ESTIMASIKAN BIAYA ONGKIR</a>
										</div>
										<div class="tab__container">
											<!-- Start Single Tab Content -->
											<div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
												<div class="description__attribute">
													<p>Ideal for cold-weather training or work outdoors, the Chaz Hoodie promises superior warmth with every wear. Thick material blocks out the wind as ribbed cuffs and bottom band seal in body heat.Ideal for cold-weather training or work outdoors, the Chaz Hoodie promises superior warmth with every wear. </p>
												</div>
											</div>					
										</div>
									</div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	
		<!-- END QUICKVIEW PRODUCT -->

		