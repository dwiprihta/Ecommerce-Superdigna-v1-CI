
<section class="wn__recent__post bg--gray ptb--80 ">		
<div class="container">    
<nav  aria-label="breadcrumb">
		<ol style="background-color:white;" class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item"><a href="#">Keranjang</a></li>
			<li class="breadcrumb-item"><a href="#">Checkout</a></li>
		</ol>
		</nav>
		<div class="post__itam">
				<div class="content">
                            <!-- <h2 class="text-left"><b><i class="fa fa-cash-register"></i> CECKOUT</b></h2>
                     <div class="post__time">	 -->
               	
					<?=$this->session->flashdata('notif')?>

<!-- Start Checkout Area -->
		<section class="wn__checkout__area  bg__white">
        	<div class="containe">

        		<div class="row">
        			<div class="col-lg-6 col-12">
        				<div class="customer_details">

						<div class="alert alert-danger" role="alert">
							1. <b>Anda wajib mengisi seluruh form pada menu checkout,</b> kecuali pada isian catatan !</br>
							2. <b>Pastikan anda mengisi seluruh form isian dengan benar,</b> dan cek kembali sebelum anda submit !</br>
							3. kami tidak bertanggung jawab untuk kesalahan form pengsisian order, yang mengakibatkan kesalahan pengiriman !</b>
						</div>

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
        							<textarea name="alamat"  placeholder="" style="width:100%;"></textarea>
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
									<?php $this->load->view('prov'); ?>
        							</select>
        						</div>

								<div class="input_box">
        							<label>Kota/Kabupaten</label>
        							<select name="kota" class="select__option" id="kota">
    									<option value=""  disabled selected> Pilih Kota</option> 
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
										<option value="pos">POS INDONESIA</option>
										<option value="tiki">TIKI</option>
                     					<option value="jne">JNE</option>
        							</select>
        						</div>

								<div class="input_box">
									<label>Pilih Layanan Pengiriman</label>
									<select class="select__option" name="layanan" id="layanan">
										<option value="" disabled selected>Pilih Layanan</option>
									</select>
								</div>		

								<script>
									$('#ongkir').on('change', function(){
										var input = $(this).val();
										$('#preview_input').text(input);
									});
								</script>	

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
        				</div>
						</div>

				<div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
					<div class="wn__order__box">

					<table class="table table-responsive">
					<thead style="color:#fff;" class="bg-primary">
						<tr text-align="center">
						<th width="5%"; scope="col">NO</th>
						<th width="50%"; scope="col">ORDER</th>
						<th width="5%"; scope="col">QTY</th>
						<th scope="col">TOTAL</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$grand_total = 0;
						$i=1;
						if ($cart = $this->cart->contents())
						{
							foreach ($cart as $item):
							$grand_total = $grand_total + $item['subtotal'];?>
					
						<tr>
						<td><?= $i++;?></td>
						<td><?php echo $item['name']; ?></td>
						<td><?php echo $item['qty']; ?></td>
						<td><span><?php echo "<span class='btn btn-sm btn-danger'>Rp " .number_format($item['subtotal'],0,",","."); "</span>"?></span></td>
						</tr>
					<?php endforeach;?>
						<tr>
						<td></td>
						<td><b>SUBTOTAL</b></td>
						<td></td>
						<td>Rp <b><span><input style="width:100px; border:none; background-color:#F4F4F4;" readonly="" type="text"  value="<?= number_format($grand_total,0,",",".");?>"></span></b></td>
						</tr>

						<tr>
						<td></td>
						<td><b>ONGKIR</b></td>
						<td></td>
						<td>
							<div class="input_box">
							Rp <b><input type="text" style="width:100px; border:none; background-color:#F4F4F4;" value="0.-" readonly="" name="ongkir" id="ongkir"></b>
        					</div>
						</td>
						</tr>

						<tr>
						<td></td>
						<td><b>TOTAL BAYAR</b></td>
						<td></td>
						<td>
							<div class="input_box">
							Rp <b><input style="width:100px; border:none; background-color:#F4F4F4;" readonly="" type="number" name="total" value="<?= $this->cart->total();?>" id="total"></b>
        					</div>
						</td>
						</tr>
					</tbody>

					<?php
						}
							else
								{
									echo "<h5>Shopping Cart masih kosong</h5>";
								}
						?>	
					</table>

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
										<p class="mb-0 mt-3"><img class=""  src="<?php echo base_url('/assets/images/icon/bca2.png');?>" width="600px";  alt="product image">
										</div></div>
						        </div>
						    </div>
							
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

<!-- <input type="text" name="input" value="" id="input"> -->
