
<section class="wn__recent__post bg--gray ptb--80">
<div class="container">

	<div class="col-md-12 col-lg-12 col-sm-12 mt-5">  
	<nav  aria-label="breadcrumb">
                        <ol style="background-color:white;" class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Data Produk</a></li>
							<li class="breadcrumb-item"><a href="#">Tambah Produk</a></li>
                        </ol>
                        </nav>  
		<div class="post__itam">
			<div class="content">
				<div class="col-md-12 col-sm-12 ol-lg-12">
					<h2 class="text-left"><b>TAMBAH PRODUK</b></h2>
				<div class="post__time mb--2"></div>	

				<?=$this->session->flashdata('flash')?>
				<div class="alert alert-primary" role="alert">
				<h4 class="alert-heading">Petunjuk Pengisian Produk !</h4><hr><br>
					<p>1. Isilah seluruh form isian produk dengan lengkap dan tepat.</p>
					<p>2. Usahakan upload foto produk ukuran 450 X 570 Pixel, dengan format JPG/PNG, ukuran foto produk tidak boleh melebihi ukuran 800KB.</p>
					<p>3. Tinggi maksimal foto adalah 4500px, dan lebar maksimal foto adalah 5700px.</p>
					<p>4. Pada isian berat gunakan satuan gram saat mengisikanya.</p>
					<p>5. Saat mengisi harga cukup tulisakan angka saja tidak perlu menambahkan mata uang titik atau koma (contoh : 40000).</p>
					<p>6. Pastikan anda menambahkan ukuran pada produk.</p>
					<p>7. Berhati-hatilah saat penghisian produk.</p>
				<!-- <p>6. Disarankan untuk menambahkan deskripsi produk agar user dapat mengetahui keunggulan produk.</p> -->
				</div>
				
    <!-- Start Checkout Area -->
        <section class="wn__checkout__area section-padding--lg bg__white" style="margin-top:-60px;">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-6 col-12">
					
        				<div class="customer_details">
        					<div class="customar__field">
							<?php echo form_open_multipart('admin/add_produk');?>
							<div class="form-group">
							      <label style="float:left; margin-left: 15px;">FOTO PRODUK</label>
							      <div class="col-lg-12 col-md-12 col-sm-12">
							      <input type="file" required="" class="form-control" name="userfile" id="userfile" onchange="tampilkanPreview(this,'preview')">  
							      </div>   
							</div>

                            <div class="form-group">
							      <label style="float:left; margin-left: 15px;">NAMA PRODUK</label>
							      <div class="col-lg-12 col-md-12 col-sm-12">
							      <input type="nama_produk" required="" class="form-control" name="nama_produk">  
							      </div>   
							</div>

						<div class="form-group">
						     <label style="float:left; margin-left: 20px;">JENIS</label>
						      <div class="col-lg-12 col-md-12 col-sm-12">
						      <select required="" class="form-control" name="warna">
							  	<?php foreach($warna as $wrn):?>
                         			<option value="<?= $wrn['id_warna'];?>"><?= $wrn['warna'];?></option>
                    			<?php endforeach;?>      
						      </select>
						  </div>
						</div>

						<div class="form-group">
						     <label style="float:left; margin-left: 20px;">BAHAN</label>
						      <div class="col-lg-12 col-md-12 col-sm-12">
						      <select readonly="" required="" class="form-control" name="bahan">
							  	<?php foreach($bahan as $bhn):?>
                         			<option value="<?= $bhn['id_bahan'];?>"><?= $bhn['bahan'];?></option>
                    			<?php endforeach;?>      
						      </select>
						  </div>
						</div>

						<div class="form-group">	
						<div class="form-row">
							<div class="col-lg-6">
							<label style="float:left; margin-left: 15px">QTY</label>
							<input type="number" class="form-control" placeholder="" name="qty" style="margin-left: 15px">
							</div>
							<div class="col-lg-5">
							<label style="float:left; margin-left: 20px">Berat Satuan (Gram)</label>
							<input type="number" class="form-control" placeholder="" name="berat" style="margin-left: 20px">
							</div>
						</div>
						</div>
					
						<div class="form-group">
								<label style="float:left; margin-left: 15px;">HARGA SATUAN</label>
								<div class="col-lg-12 col-md-12 col-sm-12">
								<input type="number" required="" class="form-control" name="harga">  
								</div>   
						</div>
                            </div>                 
                        </div>
					</div>
				
        				<div class="col-lg-6 col-12 md-mt-40 sm-mt-40">			
        					<h3 class="onder__title"></h3>
        					<ul class="order__total">
							<img id="preview" width="350px" src="<?php echo base_url()?>/assets/images/png-img/1.png";/>
        					</ul>	
					    <div id="accordion" class="checkout_accordion mt--30" role="tablist">
						<div class="payment">
						        <div class="che__header" role="tab" id="headingTwo">
						          	<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							            <span>TAMABAHKAN UKURAN YANG TERSEDIA</span>
						          	</a>
						        </div>
						    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
							<section style="margin-left:25px;"><br>
							<?php foreach($ukuran as $uk):?>
								<div class="form-check"> 
									<input class="form-check-input" name="ukuran[]" type="checkbox" value="<?= $uk['ukuran'];?>" id="defaultCheck1">
										<?= $uk['ukuran'];?>
								</div>
								<?php endforeach;?>

								<input type="hidden" required="" class="form-control" name="deskripsi" value="Superdigna adalah produsen kaos premium, berbahan cotton combed 30S, bahan Combed 30S sangat cocok dipakai di iklim tropis seperti indonesia, karna memiliki karakteristik yang lembut dan dingin saat dipakai, saat ini superdigna memiliki 10 varian warna , superdigna juga melayani custom design bagi kalian yang ingin mencetak kreatifitas kalian sendiri didalam kaos.">

								<!-- <div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										M
									</label>
								</div> -->
							</section>
						        </div>
							</div>
					
							<!-- <div class="payment">
						        <div class="che__header" role="tab" id="headingThree">
						          	<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							            <span>TAMBAHKAN DESKRIPSI PRODUK</span>
						          	</a>
						        </div><br>
						        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"></textarea>
						        </div>
							</div>	 -->

        			</div>
        		</div>
			</div>
			
			<div class="post__time"></div>	
					<!--BUTTON-->
						<div class="single-sidebar-widget user-info-widget">
							<center>
							<div class="button-groub">
							<input class="btn btn-primary"  type="submit" name="input" size="35" value="TAMBAHKAN" onclick="if(!this.form.checkbox.checked){alert('You must agree to the terms first.');return false}">
							<input class="btn btn-warning" type="reset" name="reset" size="35" value="RESET"></div>
							</center>
						</div>
					<!--BUTTON-->    
        		</section>				     
			</section>

<script type="text/javascript">
function tampilkanPreview(userfile,idpreview)
{
  var gb = userfile.files;
  for (var i = 0; i < gb.length; i++)
  {
    var gbPreview = gb[i];
    var imageType = /image.*/;
    var preview=document.getElementById(idpreview);
    var reader = new FileReader();
    if (gbPreview.type.match(imageType))
    {
      //jika tipe data sesuai
      preview.file = gbPreview;
      reader.onload = (function(element)
      {
        return function(e)
        {
          element.src = e.target.result;
        };
      })(preview);
      //membaca data URL gambar
      reader.readAsDataURL(gbPreview);
    }
      else
      {
        //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png atau .jpg.");
      }
  }
}
</script>