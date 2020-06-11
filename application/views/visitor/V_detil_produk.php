
<section class="wn__recent__post bg--gray ptb--80">
<div class="container">

	<div class="col-md-12 col-lg-12 col-sm-12 mt-5">    
		<div class="post__itam">
			<div class="content">
			
			<!--AREA DETIL-->
		            <div class="modal-content">
		                <div class="modal-body mt-4 mb-3">
		                    <div class="modal-product">	
		                        <!-- Start product images -->
		                        <div class="product-images">
		                            <div class="main-image images">
									<img  src="<?php echo base_url('/assets/images/produk/')?><?=$produk['foto'];?>"  alt="product image">
		                            </div>
		                        </div>
		                        <!-- end product images -->
		                        <div class="product-info">
		                            <h1> <?= $produk['nama_produk'].' ('.$produk['warna'].')';?></h1>
		                            <div class="rating__and__review">
		                                <ul class="rating">
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                </ul>
		                            </div>
		                            <div class="price-box-3">
		                                <div class="s-price-box">
		                                    <span class="new-price"><?= 'Rp '. $produk['harga'];?></span>
		                                    <span class="old-price"><?php $a=$produk['harga']; $b=10000; $c=$a+$b; echo 'Rp '. "$c";?></span>
		                                </div>
		                            </div>
		                            <div class="quick-desc">
									<?= 'Rp '. $produk['deskripsi'];?>
		                            </div>
									
									<input style="width:90%" placeholder="JUMLAH" class="form-control" type="number" name="jumlah"  min='1'>

									<div  style="width:90%"id="accordion" class="checkout_accordion mt--30 " role="tablist">
									<div class="payment">

									<div class="che__header" role="tab" id="headingTwo">
											<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												<span>TAMABAHKAN UKURAN</span>
											</a>
										</div>
									<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
									<section style="margin-left:25px;"><br>
									
									<?php $ukr=explode(",",$produk['ukuran']);
									foreach($ukr as $uk):?>
								<div class="form-check"> 
									<input class="form-check-input" name="ukuran[]" type="checkbox" value="<?= $uk;?>"  id="defaultCheck1" >
									<?= $uk;?>
								</div>
								<?php endforeach;?>
									</section>
									</div> 

									<div class="che__header mt--30" role="tab" id="headingThree">
										<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											<span>TAMBAHKAN CATATAN UNTUK PENJUAL</span>
										</a>
									</div><br>
									<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
									<textarea  placeholder="Contoh : 2 Ukuran XL dan 1 Ukuran L (Jika anda memsan lebih dari 1 produk dengan ukuran yang berbeda" class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"></textarea>
									</div>
									</div>
									</div>
		                            
		                            <div class="addtocart-btn mt-1">  
										<a href="<?= base_url('home_visitor/login');?>"><i class="fa fa-cart-arrow-down"></i>  TAMBAH KE KRANJANG</a>
		                                <a href="<?= base_url('home_visitor/login');?>"><i class="fa fa-shopping-bag"></i> BELI</a>
									</div>
					<!--AREA DETIL-->
			</div>
		</div>
	</div>			      
</section>				     
