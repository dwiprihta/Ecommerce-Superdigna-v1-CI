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
											<li><a href="https://bit.ly/WA_Superdigna"><i class="fa fa-whatsapp"></i></a></li>
											<li><a href="https://www.facebook.com/Superdigna-104067237708341/?modal=admin_todo_tour"><i class="fa fa-facebook"></i></a></li>
											<li><a href="https://www.instagram.com/super_digna"><i class="fa fa-instagram"></i></a></li>
											<li><a href="https:https://www.youtube.com/channel/UCq6FXXUnK56OkcTYacrk_4g?view_as=subscriber"><i class="fa fa-youtube"></i></a></li>
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
		<!-- //Footer Area -->
		

        <!-- JS Files -->
        <script src="<?php echo base_url()?>assets/js/vendor/jquery-3.2.1.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/popper.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/plugins.js"></script>
        <script src="<?php echo base_url()?>assets/js/active.js"></script>
        <!-- JS Files -->

		<script src="<?php echo base_url().'assets/js/datatable/jquery-2.2.4.min.js'?>"></script>
		<!-- <script src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script> -->
		<script src="<?php echo base_url().'assets/js/datatable/jquery.dataTables.min.js'?>"></script>
		<!-- <script src="<?php echo base_url().'assets/js/moment.js'?>"></script> -->
		<script>

			$(document).ready(function(){
				$('#mydata').DataTable();
			});
		</script>	

</body>
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
									<div class="col-lg-5">
									<div class="product-images">
										<div class="main-image images">
											<img width="100%" alt="big images" src="<?php echo base_url()?>assets/images/product/big-img/1.jpg">
										</div>
									</div>
									</div>
									<!-- end product images -->
									<div class="col-lg-7">
									<div class="alert alert-primary" role="alert">
										<h4 class="alert-heading">Cara Pemesanan!</h4><br><hr>
											<p>1. <b>Saat ini superdigna hanya melayani pembayaran melalui transfer BANK</b>.</p>
											<p>2. Pembayaran dilakukan dengan cara transfer manual ke rekening BCA SUPERDIGNA.</p>

											<p>3. Silahkan <b>tanyakan stok barang terlebih dahulu</b> sebelum ceckout.</p>
											<p>4. Jumlah transfer harus sesuai dengan angka yang tertera di tagihan.</p>

											<p>5. Simpan kode transaksi untuk mempermudah konfirmasi pembayaran.</p>
											<p>6. Pastikan anda melakukan <b>KONFIRMASI PEMBAYARAN</b> setelah melakukan pembayaran.</p>
											<p>7. Barang hanya akan dikirim setelah anda mengkonfirmasi pembayaran dengan benar.</p>
											<p>8. Berhati-hatilah atas segala jenis penipuan yang mengatasnamakan superdigna.</p>
											<p>9. Silahkan kirimkan pembayaran ana melalui rekening BCA dibawah.</p>
											<p>1. <b>Saat ini superdigna hanya melayani pembayaran melalui transfer BANK</b>.</p>
											<p>2. Pembayaran dilakukan dengan cara transfer manual ke rekening BCA SUPERDIGNA.</p>

											<p>3. Silahkan <b>tanyakan stok barang terlebih dahulu</b> sebelum ceckout.</p>
											<p>4. Jumlah transfer harus sesuai dengan angka yang tertera di tagihan.</p>

											<p>5. Simpan kode transaksi untuk mempermudah konfirmasi pembayaran.</p>
										</div>
									</div></div>
									
								</div>
								<button type="submit" name="submit" class="btn btn-primary" style="width:100%"> DOWNLOAD PANDUAN PEMESANAN <i class="fa fa-download"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END QUICKVIEW PRODUCT -->
			
	</div>
	<!-- //Main wrapper -->