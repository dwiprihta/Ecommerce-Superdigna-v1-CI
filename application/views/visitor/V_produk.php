<section class="wn__recent__post bg--gray ptb--80">
<div class="containe">
					<div class="col-md-12 col-lg-12 col-sm-12 mt-5">                 
						<div class="post__itam">
							<div class="content">
                                <div class="col-md-12 col-sm-12 ol-lg-12">
                                    <h2 class="text-left"><b>OUR ALL PRODUCT</b></h2>
                                <div class="post__time">	
                            </div>	
        <!-- Start Shop Page -->
        <div class="page-shop-sidebar left--sidebar bg--white ">
        	<div class="containe">
        		<div class="row">
        			
        			<div class="col-lg-12 col-12 order-1 order-lg-2">
        				<div class="row">
        					<div class="col-lg-12">
								<div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
									<div class="shop__list nav justify-content-center" role="tablist">
			                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
			                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-list" role="tab"><i class="fa fa-list"></i></a>
			                        </div>
			                        <p>Showing 1–12 of 40 results</p>
			                        <div class="orderby__wrapper">
			                        	<span>Sort By</span>
			                        	<select class="shot__byselect">
			                        		<option>Default sorting</option>
			                        		<option>HeadPhone</option>
			                        		<option>Furniture</option>
			                        		<option>Jewellery</option>
			                        		<option>Handmade</option>
			                        		<option>Kids</option>
			                        	</select>
			                        </div>
		                        </div>
        					</div>
        				</div>
        				<div class="tab__container">
	        				<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
	        					<div class="row">
								<?php foreach($produk as $prd):?>    
	        						<!-- Start Single Product -->
		        					<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
			        					<div class="product__thumb">
										<a class="first__img" href="<?= base_url('home_visitor/detil_produk/')?><?= $prd['id_produk'];?>"><img  src="<?php echo base_url('/assets/images/produk/')?><?=$prd['foto'];?>"  alt="product image"></a>
											<div class="hot__box">
											<span class="hot-label"><?=$prd['nama_produk'].' ('.$prd['warna'].')';?></span>
											</div>
										</div>
										<div class="product__content content--center">
										<h4><a href="<?= base_url('home_visitor/detil_produk/')?><?= $prd['id_produk'];?>"><span class="hot-label"><?=$prd['nama_produk'].'<br>'. ' ('.$prd['warna'].')';?></a></h4>
											<ul class="prize d-flex">
											<li><?= 'Rp '. $prd['harga'];?>	</li>
										<li class="old_prize"><?php $a=$prd['harga']; $b=10000; $c=$a+$b; echo 'Rp '. "$c";?></li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
													<a style="color:white" href="<?= base_url('home_visitor/detil_produk/')?><?= $prd['id_produk'];?>" class="btn btn-sm btn-danger" name="shop" value="SHOP NOW"> SHOP NOW</a>
													</ul>
												</div>
											</div>
											
										</div>
		        					</div>
									<?php endforeach;?>
		        					<!-- End Single Product -->

	        					</div>
	        				</div>

	        				<div class="shop-grid tab-pane fade" id="nav-list" role="tabpanel">
	        					<div class="list__view__wrapper">
								<?php foreach($produk as $prd):?>   
	        						<!-- Start Single Product -->
	        						<div class="list__view">
	        							<div class="thumb">
										<a class="first__img" href="<?= base_url('home_visitor/detil_produk/')?><?= $prd['id_produk'];?>"><img  src="<?php echo base_url('/assets/images/produk/')?><?=$prd['foto'];?>"  alt="product image"></a>
	        							</div>
	        							<div class="content">
	        							<h4><a href="<?= base_url('home_visitor/detil_produk/')?><?= $prd['id_produk'];?>"><span class="hot-label"><?=$prd['nama_produk'].'<br>'. ' ('.$prd['warna'].')';?></a></h4>
	        								
										<div class="price-box-3">
		                                <div class="s-price-box mb-3 mt-3">
		                                    <span class="new-price"><?= 'Rp '. $prd['harga'];?></span>
		                                    <span class="old-price"><?php $a=$prd['harga']; $b=10000; $c=$a+$b; echo 'Rp '. "$c";?></span>
		                                </div>
		                            </div>
	        								<p class="mb-2"><?= 'Rp '. $prd['deskripsi'];?></p>
	        								<ul class="cart__action d-flex">
	        									<li class="cart"><a href="<?= base_url('home_visitor/detil_produk/')?><?= $prd['id_produk'];?>"><i class="fa fa-heart"></i> SHOP NOW</a></li>
	        									
	        								</ul>

	        							</div>
	        							</div>
										<hr class="mb-3 mt-3">
									<?php endforeach;?>			
	        						<!-- End Single Product -->				
	        					</div>
	        				</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End Shop Page -->
</div>
</div>
</section>
	