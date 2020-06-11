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
									<p>Terimakasih telah mengunjungi website superdigna, kami akan sangat senang bila anda mau mengunjungi sosial media kami <span class='fa fa-heart'></span></p>
								</div>
									<div class="footer__content">
										<ul class="social__net social__net--2 d-flex justify-content-center">
											<li><a href="https://bit.ly/WA_Superdigna"><i class="fa fa-whatsapp"></i></a></li>
											<li><a href="https://www.facebook.com/Superdigna-104067237708341/?modal=admin_todo_tour"><i class="fa fa-facebook"></i></a></li>
											<li><a href="https://www.instagram.com/super_digna"><i class="fa fa-instagram"></i></a></li>
											<li><a href="https://www.youtube.com/channel/UCq6FXXUnK56OkcTYacrk_4g?view_as=subscriber"><i class="fa fa-youtube"></i></a></li>
											<li><a href="https://www.superdigna.com"><i class="fa fa-globe"></i></a></li>
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
									<p>Copyright <i class="fa fa-copyright"></i> <a href="https://freethemescloud.com/">Superdigna</a> All Rights Reserved <span class='fa fa-heart'></span></p>
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
		<!-- //Footer Area -->
		

		 <!-- Data Tables -->
			<script>
			$(document).ready(function(){
				$('#tabel-data').DataTable();
			});
			</script>

        <!-- JS Files -->
        <script src="<?php echo base_url()?>assets/js/vendor/jquery-3.2.1.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/popper.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/plugins.js"></script>
        <script src="<?php echo base_url()?>assets/js/active.js"></script>
        <script src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
        <!-- JS Files -->
		
</body>
</html>

<!--------------KONFIRMASI BAYAR--------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="mt-3"><div class="alert alert-primary" role="alert">
            <p>1. Saat ini superdigna hanya melayani pembayaran melalui transfer bank BCA.</p>
            <p>2. Saat upload bukti <b>pastikan semua tulisan terlihat dengan jelas</b>.</p>
            <p>3. Upload foto dengan <b>format JPG, JPEG, atau PNG, dengan maksimal ukuran foto adalah 200KB</b>.</p>
			<p>4. <b>Pastikan anda mengisis seluruh form input konfirmasi, dengan lengkap dan benar </b>.</p>
          </div></div>
	  <?php echo form_open_multipart('user/konfirm_bayar');?>
	  
	  <div class="form-group">
            <label for="recipient-name" class="col-form-label">ID Transaksi:</label>
            <input type="text" name="id_order" class="form-control" id="recipient-name">
            <small class="text-danger"><?= form_error('nama');?></small>
		  </div>
		  
        <input type="hidden" name="metode" class="form-control" value="Transfer BCA">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Metode Pembayaran</label>
            <select disabled="" name="metod" class="form-control" id="exampleFormControlSelect1">
              <option VALUE="transfer BCA">Transfer bank</option>
            </select>
          </div>
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Rekening Pengirim:</label>
            <input type="text" name="nama" class="form-control" id="recipient-name">
            <small class="text-danger"><?= form_error('nama');?></small>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tanggal transfer</label>
            <input type="date" name="date" class="form-control" id="recipient-name">
            <small class="text-danger"><?= form_error('date');?></small>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Dari Bank</label>
            <select  name="bank_pengirim" class="form-control" id="exampleFormControlSelect1">
              <option VALUE="BCA">BCA</option>
              <option VALUE="BRI">BRI</option>
              <option VALUE="BNI">BNI</option>
              <option VALUE="MANDIRI">MANDIRI</option>
              <option VALUE="BANK LAIN">BANK LAIN</option>
            </select>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Jumlah transfer</label>
            <input type="number" name="jumlah" class="form-control" id="recipient-name">
          </div>

          <div class="form-group">
            <label for="exampleFormControlFile1">File Bukti Pembayarn</label>
            <input type="file" name="userfile" id="userfile" class="form-control-file" id="exampleFormControlFile1">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-primary">Konfirmasi Sekarang <i class="fa fa-arrow-right"></i></button>
      </div>
    </div>
    </form>
  </div>
</div>
<!--------------KONFIRMASI BAYAR--------------------->

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
	<script>
  $(document).ready(function(){
    $('#tabel-data').DataTable();
});
  </script>

  
</body>
</html>