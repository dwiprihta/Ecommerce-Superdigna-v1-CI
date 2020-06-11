
<section class="wn__recent__post bg--gray ptb--80 ">		
<div class="container">   
		<div class="post__itam">
				<div class="content">
                            <!-- <h2 class="text-left"><b><i class="fa fa-cash-register"></i> CECKOUT</b></h2>
                     <div class="post__time">	 -->
                </div>		
					<?=$this->session->flashdata('notif')?>

<!-- Start Checkout Area -->
		<section class="wn__checkout__area  bg__white">
        	<div class="containe">

        		<div class="row">
        			<div class="col-lg-6 col-12">
        				<div class="customer_details">
        					<h3>Billing details</h3>
							<?php
								if ($cart = $this->cart->contents())
									{
                    			?>

						<form method="post" action="<?php echo base_url('user/send_email');?>">

							<?php $rows = $this->db->query("SELECT * FROM tbl_user where id_user='".$this->session->id_user."'")->row_array();{?>

        					<div class="customar__field">
								<input type="hidden" name="id_user" value="<?=$rows['id_user'];?>">
								
								<div class="input_box ">
									<label>Nama Penerima</label>
									<input type="text" name="nama" value="<?=$rows['nama_user'];?>">
									<small class="text-danger"><?= form_error('nama');?></small>
								</div>	

						<!-------------CEK ONGKIR-------------------->
        						<div class="input_box">
        							<label>Alamat Lengkap </label>
        							<textarea name="alamat"  placeholder=""style="width:100%;"></textarea>
									<span style="color:white;" class="badge badge-danger"><?= form_error('alamat');?></span>
        						</div>

									<?php
										$jumlah_total = 0;
										foreach ($cart as $cr):
                                        $jumlah_total =  $jumlah_total + $cr['qty'];
                                        $berat_total=  $jumlah_total * $cr['berat'];
                                        ?>
        									<input type="hidden" id="berat" name="berat" value="<?= $berat_total;?>">
										<?php endforeach;?>
									
								<div class="input_box">
        							<label>Provinsi</label>
        							<select class="select__option"  name="prov" id="prov">
									<option value="" disabled selected> Pilih Provinsi</option> 
									<?php $this->load->view('user/prov'); ?>
        							</select>
        						</div>

								<div class="input_box">
        							<label>Kota/Kabupaten</label>
        							<select class="select__option" id="kota" name="kota">
    									<option value=""  disabled selected> Pilih Kota</option> 
										<?php //$this->load->view('user/city'); ?>  
        							</select>
        						</div>
		
								<div class="input_box ">
	        							<label>Kecamatan </label>
	        							<input type="text" name="kecamatan">
	        						</div>

								<div class="input_box">
        							<label>Kode Pos </label>
        							<input type="text" placeholder="" name="kd_post">
        						</div>

								<div class="input_box">
        							<label>Kurir</label>
        							<select class="select__option" name="kurir" id="kurir">
									<option value="" disabled selected> Pilih Kurir</option>
									<option value="jne">JNE</option>
									<option value="tiki">TIKI</option>
									<option value="pos">POS Indonesia</option>
        							</select>
        						</div>

								<!-------------CEK ONGKIR-------------------->
								<div class="input_box">
										<label>Pilih Layanan Pengiriman</label>
										<select class="select__option" name="layanan" id="layanan">
											<option value="" disabled selected>Pilih Layanan</option>
										</select>
									</div>		
								
								<input type="text" name="ongkir" value="0" id="ongkir">

								<div class="margin_between">
									<div class="input_box space_between">
										<label>No Whatsapp </label>
										<input type="text" name="wa" placeholder="">
									</div>

									<div class="input_box space_between">
										<label>Email  <span>*</span></label>
										<input type="email" name="email" placeholder="" value="<?=$rows['email_user'];?>">
									</div>
								</div>
        						
								<div class="input_box">
									<label>Catatan Pengiriman (Optional)</label>
									<textarea name="catatan" style="width:100%;"></textarea>
								</div>
        					</div>
							<?php }?>
						<?php }?>
        					<!-- <div class="create__account">
        						<div class="wn__accountbox">
	        						<input class="input-checkbox" name="createaccount" value="1" type="checkbox">
	        						<span>Create an account ?</span>
        						</div>
        						<div class="account__field">
        							<form action="#">
        								<label>Account password <span>*</span></label>
        								<input type="text" placeholder="password">
        							</form>
        						</div>
        					</div> -->
        				</div>
						</div>

						<div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
							<div class="wn__order__box">
        					<h3 class="onder__title"><i class="fa fa-shopping-bag"></i> Your order</h3>
								<ul class="order__total">
									<li>PRODUK</li>
									<li>HARGA</li>
								</ul>

						   <?php
								$grand_total = 0;
								if ($cart = $this->cart->contents())
								{
									foreach ($cart as $item):
									$grand_total = $grand_total + $item['subtotal'];?>
        					<ul class="order_product">
        						<li> <?php echo $item['name']; ?> x <?php echo $item['qty']; ?><span><?php echo "<button class='btn btn-sm btn-danger'>Rp " .number_format($item['subtotal'],0,",","."); "</button>"?></span></li><hr>
        					</ul>
							<?php endforeach;?>
							

							<ul class="order_product">
								<li><h4>SUBTOTAL<span><?= "<button class='btn btn-sm btn-warning'>Rp ".number_format($grand_total,0,",",".");"</button>"?></span></h4></li><hr>
								<?php 
									$ongkir="<div id='hasil'></div>";{?>
										<li><h4> ONGKOS KIRIM<span><button class='btn btn-sm btn-primary'>30000 </button></span></h4></li>
									</ul>
								<?php }?>
	
        					<ul class="total__amount">
									<li><h4> Total Bayar  <span><?= "<button class='btn btn-sm btn-success'>Rp " .number_format($grand_total+23000,0,",",".");"</button>"?></span></h4></li>
        					</ul>	
							
							<input type="text" name="total" value="<?= $grand_total+23000;?>" id="total">	
							
									<?php
										}
										else
											{
												echo "<h5>Shopping Cart masih kosong</h5>";
											}
									?>						
        				</div>
					    <div id="accordion" class="checkout_accordion mt--30" role="tablist">
						    <div class="payment">
						        <div class="che__header" role="tab" id="headingOne">
						          	<a class="checkout__title" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						                <span><i class="fa fa-credit-card"></i> PEMBAYARAN VIA TRANSFER BANK</span>
						          	</a>
						        </div>
						        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
					            	<div class="mt-3"><div class="alert alert-primary" role="alert">
										<h4 class="alert-heading">Cara pembayaran!</h4><br><hr>
											<p>1. <b>Saat ini superdigna hanya melayani pembayaran melalui transfer BANK</b>.</p>
											<p>2. Pembayaran dilakukan dengan cara transfer manual ke rekening BCA SUPERDIGNA.</p>

											<p>3. Silahkan <b>tanyakan stok barang terlebih dahulu</b> sebelum ceckout.</p>
											<p>4. Jumlah transfer harus sesuai dengan angka yang tertera di tagihan.</p>

											<p>5. Simpan kode transaksi untuk mempermudah konfirmasi pembayaran.</p>
											<p>6. Pastikan anda melakukan <b>KONFIRMASI PEMBAYARAN</b> setelah melakukan pembayaran.</p>
											<p>7. Barang hanya akan dikirim setelah anda mengkonfirmasi pembayaran dengan benar.</p>
											<p>8. Berhati-hatilah atas segala jenis penipuan yang mengatasnamakan superdigna.</p>
											<p>9. Silahkan kirimkan pembayaran ana melalui rekening BCA dibawah.</p>
											
										<hr>
										<p class="mb-0 mt-3"><img class=""  src="<?php echo base_url('/assets/images/icon/bca2.png');?>" width="300px";  alt="product image">
										</div></div>
						        </div>
						    </div>
							

						    <!-- <div class="payment">
						        <div class="che__header" role="tab" id="headingTwo">
						          	<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							            <span><i class="fa fa-truck"></i> PEMBAYARAN VIA GO-PAY</span>
						          	</a>
						        </div>
						        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="mt-3"><div class="alert alert-success" role="alert">
										<h4 class="alert-heading">Cara pembayaran!</h4><br><hr>
											<p>1. Pembayaran dilakukan dengan cara transfer manual ke rekening BCA SUPERDIGNA.</p>

											<p>2. Silahkan <b>tanyakan stok barang terlebih dahulu</b> sebelum ceckout.</p>
											<p>3. Jumlah transfer harus sesuai dengan angka yang tertera di tagihan.</p>

											<p>4. Simpan kode transaksi untuk mempermudah konfirmasi pembayaran.</p>
											<p>5. Pastikan melakukan <b>KONFIRMASI PEMBAYARAN</b> setelah melakukan pembayaran.</p>
											<p>6. Silahkan kirimkan pembayaran ana melalui rekening BCA dibawah.</p>
										<hr>
										<p class="mb-0 mt-3"><img class=""  src="<?php echo base_url('/assets/images/icon/gopay.png');?>" width="300px";  alt="product image">
										</div></div>
						        </div>
						    </div>

							<div class="payment">
						        <div class="che__header" role="tab" id="headingThree">
						          	<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							            <span><i class="fa fa-truck"></i> PEMBAYARAN VIA ALFAMART</span>
						          	</a>
						        </div>
						        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="mt-3"><div class="alert alert-danger" role="alert">
										<h4 class="alert-heading">Cara pembayaran!</h4><br><hr>
											<p>1. Pembayaran dilakukan dengan cara transfer manual ke rekening BCA SUPERDIGNA.</p>
											<p>2. Silahkan <b>tanyakan stok barang terlebih dahulu</b> sebelum ceckout.</p>
											<p>3. Jumlah transfer harus sesuai dengan angka yang tertera di tagihan.</p>
											<p>4. Simpan kode transaksi untuk mempermudah konfirmasi pembayaran.</p>
											<p>5. Pastikan melakukan <b>KONFIRMASI PEMBAYARAN</b> setelah melakukan pembayaran.</p>
											<p>6. Silahkan kirimkan pembayaran ana melalui rekening BCA dibawah.</p>
										<hr>
											<p class="mb-0 mt-3"><img class=""  src="<?php echo base_url('/assets/images/icon/alfa.png');?>" width="300px";  alt="product image">
										</div></div>
						        </div>
						    </div> 

						    <div class="payment">
						        <div class="che__header" role="tab" id="headingThree">
						          	<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							            <span><i class="fa fa-map-pin"></i> AMBIL BARANG DI TOKO KAMI</span>
						          	</a>
						        </div>
						        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
					          		<div class="payment-body">	<div ><iframe style="width:100%; margin-bottom:50px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.9091227667536!2d110.91130261440065!3d-7.584870494530409!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a19ad7f93d949%3A0x7d6fe1eefb946dad!2ssuperdigna!5e0!3m2!1sid!2sid!4v1568258611690!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div></div>
						        </div>
						    </div>-->
							<button type="submit" name="submit" class="btn btn-primary" style="width:100%"> PESAN SEKARANG <i class="fa fa-arrow-right"></i></button>
					    </div>
					</form>
        			</div>
        		</div>
        	</div>
        </section>
        <!-- End Checkout Area -->
		</div>
	</div>
</div>
</section>

 <!-- custom -->
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

