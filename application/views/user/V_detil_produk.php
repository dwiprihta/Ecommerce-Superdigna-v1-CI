<section class="wn__recent__post bg--gray ptb--80">
<div class="container">

	<div class="col-md-12 col-lg-12 col-sm-12 mt-5">   
<nav  aria-label="breadcrumb">
  <ol style="background-color:white;" class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
	<li class="breadcrumb-item"><a href="#">Shop</a></li>
	<li class="breadcrumb-item"><a href="#">Detil Produk</a></li>
  </ol>
</nav> 
		<div class="post__itam">
			<div class="content">
			<form method="post" action="<?= base_url('user/add_cart');?>" name="form1">
			<?=$this->session->flashdata('notif')?>
			
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
		                            <h1><?= $produk['nama_produk'].' ('.$produk['warna'].')';?></h1>
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
											<span class="new-price"><strong>Rp</strong> <strong name="str" id="str"><?=  $produk['harga'];?></strong></span>
											<span class="old-price"><?php $a=$produk['harga']; $b=10000; $c=$a+$b; echo 'Rp '. "$c";?></span>
											<!-- <p id='dee'>
											<?php 
											$rows = $this->db->query("SELECT stok FROM tbl_stok where id_produk='".$produk['id_produk']."'")->row_array();{?>
												<?= $rows['stok'];?>
											<?php }?>  -->
		                                </div>
									</div><br><hr>
									
		                            <div class="mt-3 mb-3">
										<!-- <b>DESKRIPSI : </b><br> -->
											<p> 
												<i class="fa fa-star-o" Style="color:#f9ae0c;"></i> Berbahan 100% cotton combed 30S</br>
												<i class="fa fa-star-o" Style="color:#f9ae0c;"></i> Available for printing Manual, DTG, Heat Transfer ( Polyflex )</br>
												<!-- <i class="fa fa-star-o" Style="color:#f9ae0c;"></i> Sudah disusutkan menggunakan hot steam</br> -->
											</p>
		                            </div>

									<?php $rows = $this->db->query("SELECT qty FROM tbl_produk where id_produk='".$produk['id_produk']."'")->row_array();{?>
										<?php if ($rows['qty']<=0){?>
										<button type="button" class="btn btn-sm btn-danger mb-3"><i class="fa fa-exclamation-circle"></i> Stok habis</button>
										<?php }else{?>
											<button type="button" class="btn btn-sm btn-success mb-3">Stok <span class="badge badge-light"><?=$rows['qty'];?></span>	</button>
										<?php }?>
									<?php };?>
								
									<div class="form-group">
										<label for="exampleFormControlInput1">Jumlah</label>
										<input style="width:90%; height:50px; border-radius:0px;" placeholder="JUMLAH" class="form-control" type="number" name="qty" min='1' value="1">
									</div>

									<div class="form-group">
										<label for="exampleFormControlSelect1">Pilih Ukuran</label>
										<select onchange="hitung();" name="ukuran" id="uk" style="width:90%; height:50px; border-radius:0px;">
										<?php 
										$rows = $this->db->query("SELECT * FROM tbl_stok where id_produk='".$produk['id_produk']."'")->result_array();
										foreach($rows as $uk):?>
										<option value=<?=$uk['ukuran'];?>><?=$uk['ukuran'];?> | Jumlah Stok :  
										 <?php if ($uk['stok']<=0){
											 echo 'STOK HABIS !';}
											 else{
												echo $uk['stok']." Pcs";}?>
										<?php endforeach;?>
										</select>
									</div>  

									<!-- <div class="form-group">
										<label for="exampleFormControlSelect1">Pilih Ukuran</label>
										<select onchange="hitung();" name="ukuran" id="uk" style="width:90%; height:50px; border-radius:0px;">
										<?php $ukr=explode(",",$produk['ukuran']);
										foreach($ukr as $uk):?>
										<option value=<?=$uk;?>><?=$uk;?></option>
										<?php endforeach;?>
										</select>
									</div> -->
									
									<!--THE HIDDEN FORM-->
										<input type="hidden" name="id" value="<?php echo $produk['id_produk']; ?>" />
										<input type="hidden" name="nama" value="<?php echo $produk['nama_produk']; ?>" />
										<input type="hidden" name="nama" value="<?php echo $produk['nama_produk']; ?>" />
										<input type="hidden" name="hargabf" value="<?php echo $produk['harga']; ?>" />
										<input type="hidden" name="harga" id="hrga" onkeyup="copytextbox();" value="<?php echo $produk['harga']; ?>"/>
										<input type="hidden" name="berat" value="<?php echo $produk['berat']; ?>" />
										<input type="hidden" name="gambar" value="<?php echo $produk['foto']; ?>" />
									<!-- <input type="hidden" name="qty" value="1" /> -->
									<!--THE HIDDEN FORM-->

									<div class="addtocart-btn mt-1">
									<?php $rows = $this->db->query("SELECT qty FROM tbl_produk where id_produk='".$produk['id_produk']."'")->row_array();{?>
										<?php if ($rows['qty']<=0){?>
											<button type="button" style="width:90%; height:50px; border-radius:0px;" class="btn btn-lg btn-danger mt-4"><i class="fa fa-exclamation-circle"></i>  STOK HABIS</button> 
										<?php }else{?>
											<button style="width:90%; height:50px; border-radius:0px;" class="btn btn-lg btn-primary mt-4" type="sumbit" name="submit" value="TAMBAHKAN"> <i class="fa fa-cart-plus"></i> KERANJANG</button> 
										<?php }?>
									<?php };?>
									</div> 
								
					<!--AREA DETIL-->
				</form>	

				<!--COMPAS PRODUCT-->
						<div class="product__info__detailed">
							<div class="pro_details_nav nav justify-content-start" role="tablist">
	                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab"><i class="fa fa-twitch"></i> DESKRIPSI</a>
	                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-review" role="tab"><i class="fa fa-list"></i> SIZE CART</a>
								<a class="nav-item nav-link" data-toggle="tab" href="#nav-xx" role="tab"><i class="fa fa-cogs"></i> PERAWATAN</a>
	                        </div>
	                        <div class="tab__container">
	                        	<!-- Start Single Tab Content -->
	                        	<div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
									<div class="description__attribute">
										<!-- <b><i class="fa fa-arrow-right"></i> Material Bahan</b><hr> -->
										<!-- Superdigna menggunakan bahan 100% Cpmbed 30S Yang sangat nyaman dipakai di negara beriklim tropis seperti Indonesia -->
										<i class="fa fa-star" style="color:#f9ae0c;"></i> <b>100% 30s Combed Cotton</b><br>
										<ul class="ml-3">Bahan kaos cotton combed 30s mempunyai sifat tidak panas,serta gampang menyerap keringat. Kaos dengan bahan cotton combed 30s sangat pas dipakai di daerah beriklimtropis seperti di Indonesia karna sifatnya yang mampumenyerap  keringat dengan baik.</ul><br><hr>

										<!-- <i class="fa fa-star" style="color:#f9ae0c;"></i> Penjahitan ganda di bagian leher dan pundak/rib.<br><hr> -->
										<i class="fa fa-star mt-3" style="color:#f9ae0c;"></i><b> Jahitan ganda di bagian ujung lengan dan  bawah kaos.</b><br>
										<ul class="ml-3">Jahitan ujung lengan dan bawah kaos menggunakan jahitan ganda, sehingga sangat kuat dan tidak mudah lepas.</ul></br><hr>

										<i class="fa fa-star mt-3" style="color:#f9ae0c;"></i><b> Easy tear away label ( mudah disobek )</b><br>
										<ul class="ml-3">Label pada kaos bisa disobek, sehingga sangat memudahkan bagi anda yang ingin membuat brand/ merek anda sendiri menggunakan kaos superdigna.</ul><br><hr>
										
										<i class="fa fa-star mt-3" style="color:#f9ae0c;"></i> <b>Sangat mudah diaplikasikan pada sablon manual, DTG dan </br><i class="fa fa-star" style="color:#fff;"></i> Heat Transfer ( Polyflex )</b></br>
										
										<ul class="ml-3">Kaos superdigna sangat untuk cocok diaplikasikan pada sablon manual, DTG dan Heat Transfer ( Polyflex ), sehingga menjadi pilihan tepat bagi anda yang ingin membuka usaha sablon.</ul></br><hr>

										<center class="mt-3"><b><i class="fa fa-heart" style="color:#f9ae0c;"></i> Export Quality <i class="fa fa-heart" style="color:#f9ae0c;"></i></b></center>
																			<!-- <?= $produk['deskripsi'];?> -->
									</div>
	                        	</div>
	                        	<!-- End Single Tab Content -->
	                        	<!-- Start Single Tab Content -->
	                        	<div class="pro__tab_label tab-pane fade" id="nav-review" role="tabpanel">
									<div class="review__attribute">
									<img  src="<?php echo base_url('/assets/images/about/size_cart.jpg');?>"  alt="size cart">	
										</div>
									</div>
									<div class="pro__tab_label tab-pane fade" id="nav-xx" role="tabpanel">
									<div class="review__attribute">
									<img  src="<?php echo base_url('/assets/images/about/caper.jpg');?>"  alt="cara perawatan">	
										</div>
									</div>
	                        	</div>
								
	                        	<!--COMPAS PRODUCT-->		
			</div>
		</div>

		
	        </div>
        </div>
	</div>	
</section>	

<script language="javascript">
function validate()
{
var chks = document.getElementsByName('ukuran[]');
var hasChecked = false;
for (var i = 0; i < chks.length; i++)
{
	if (chks[i].checked)
	{
	hasChecked = true;
	break;
	}
}

if (hasChecked == false)
	{
	Swal.fire({
	type: 'error',
	title: 'GAGAL DITAMBAHKAN',
	text: 'Pilih setidaknya 1 ukuran',
	
	})
	return false;
	}

return true;
}
</script>

<script language="JavaScript" type="text/javascript">
function hitung(){
var myForm = document.form1;
var y=eval(myForm.hargabf.value);
var pil= myForm.ukuran.value;
		if (pil == "XXL") {
		var z = y+5000;
		}else if (pil ==  "XXXL") {
			var z = y+10000;
		} else if (pil ==  "XXXXL") {
			var z = y+15000;
		} else{
			var z = y+0;
		}
		myForm.harga.value = z;
		document.getElementById('str').innerHTML = z;
		document.getElementById('dee').innerHTML = pil;
		myForm.str.value = z;
		myForm.dee.value = pil;
		//myForm.y.value = "";
}
function resetForm(){
	(document.form1.reset());
}
//
</script>
