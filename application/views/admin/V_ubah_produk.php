
<section class="wn__recent__post bg--gray ptb--80">
<div class="container">

	<div class="col-md-12 col-lg-12 col-sm-12 mt-5">   
	<nav  aria-label="breadcrumb">
                        <ol style="background-color:white;" class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Data Produk</a></li>
							<li class="breadcrumb-item"><a href="#">Ubah Produk</a></li>
                        </ol>
                        </nav>   
		<div class="post__itam">
			<div class="content">
				<div class="col-md-12 col-sm-12 ol-lg-12">
					<h2 class="text-left"><b>UBAH PRODUK</b></h2>
				<div class="post__time"></div>	
	
    <!-- Start Checkout Area -->
        <section class="wn__checkout__area section-padding--lg bg__white">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-6 col-12">
        				<div class="customer_details">
        					<div class="customar__field">

							<form action="" method="post">
							    <input type="hidden" required="" class="form-control" name="userfile" value="<?= $produk['foto'];?>">  
							<div class="form-group">
							      <label style="float:left; margin-left: 15px;">ID PRODUK</label>
							      <div class="col-lg-12 col-md-12 col-sm-12">
							      <input type="text" readonly="" required="" class="form-control" name="id_produk" value="<?= $produk['id_produk'];?>">  
							      </div>   
							</div>

                            <div class="form-group">
							      <label style="float:left; margin-left: 15px;">NAMA PRODUK</label>
							      <div class="col-lg-12 col-md-12 col-sm-12">
							      <input type="text" required="" class="form-control" name="nama_produk" value="<?= $produk['nama_produk'];?>">  
							      </div>   
							</div>

						<div class="form-group">
						     <label style="float:left; margin-left: 20px;">JENIS</label>
						      <div class="col-lg-12 col-md-12 col-sm-12">
						      <select required="" class="form-control" name="warna">
							  <option></option>
							  	<?php foreach($warna as $wrn):?>
                         			<option value="<?= $wrn['id_warna'];?>"><?= $wrn['warna'];?></option>
                    			<?php endforeach;?>      
						      </select>
						  </div>
						</div>

						<div class="form-group">
						     <label style="float:left; margin-left: 20px;">BAHAN</label>
						      <div class="col-lg-12 col-md-12 col-sm-12">
						      <select disabel="" required="" class="form-control" name="bahan">
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
							<input type="number" class="form-control" placeholder="" name="qty" style="margin-left: 15px" value="<?= $produk['qty'];?>">
							</div>
							<div class="col-lg-5">
							<label style="float:left; margin-left: 20px">Berat Satuan (Gram)</label>
							<input type="number" class="form-control" placeholder="" name="berat" style="margin-left: 20px" value="<?= $produk['berat'];?>">
							</div>
						</div>
						</div>
					
						<div class="form-group">
								<label style="float:left; margin-left: 15px;">HARGA SATUAN</label>
								<div class="col-lg-12 col-md-12 col-sm-12">
								<input type="number" required="" class="form-control" name="harga" value="<?= $produk['harga'];?>">  
								<input type="hidden" required="" class="form-control" name="deskripsi" value="<?= $produk['deskripsi'];?>">
								</div>   
						</div>
                            </div>                 
                        </div>
					</div>

					
					
        			<div class="col-lg-6 col-12 md-mt-40 sm-mt-40">			
        					<h3 class="onder__title"></h3>
        					<ul class="order__total">
							<img width="350px" src="<?php echo base_url('/assets/images/produk/')?><?=$produk['foto'];?>";/>
        					</ul>	
					    <div id="accordion" class="checkout_accordion mt--30" role="tablist">
						<div class="payment">
						        <div class="che__header" role="tab" id="headingTwo">
						          	<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							            <span>UBAH UKURAN YANG TERSEDIA</span>
						          	</a>
						        </div>
						        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
							<section style="margin-left:25px;"><br>

								<?php $ukr=explode(",",$produk['ukuran']);
									foreach($ukr as $uk):?>
								<div class="form-check"> 
									<input class="form-check-input" name="ukuran[]" type="checkbox" value="<?= $uk;?>"  id="defaultCheck1" checked="true">
									<?= $uk;?>
								</div>
								<?php endforeach;?>
		
							</section>
						        </div>
							</div>
					
							<!-- <div class="payment">
						        <div class="che__header" role="tab" id="headingThree">
						          	<a class="collapsed checkout__title" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							            <span>UBAH DESKRIPSI PRODUK</span>
						          	</a>
						        </div><br>
						        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"><?= $produk['deskripsi'];?></textarea>
						        </div>
							</div>		 -->
        			</div>
        		</div>
			</div>
			
			<div class="post__time"></div>	
					<!--BUTTON-->
						<div class="single-sidebar-widget user-info-widget">
							<center>
							<div class="button-groub">
							<input class="btn btn-primary"  type="submit" name="input" size="35" value="SIMPAN" >
							<!-- <input class="btn btn-warning" type="reset" name="reset" size="35" value="RESET"></div> -->
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
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
  }
}
</script>