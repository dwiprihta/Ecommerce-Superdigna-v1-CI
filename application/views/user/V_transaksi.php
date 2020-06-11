
<section class="wn__recent__post bg--gray ptb--80">
<div class="container">
	<div class="col-md-12 col-lg-12 col-sm-12 mt-5"> 
  
<div class="container">
<nav  aria-label="breadcrumb">
  <ol style="background-color:white;" class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
  </ol>
</nav>     
		<div class="post__itam">
				<div class="content">
                            <!-- <h2 class="text-left"><b> <i class="fa fa-random"> </i> DATA TRANSAKSI </b></h2>
                     <div class="post__time">	 -->
                		
<?=$this->session->flashdata('notif')?>
<!-- Start Checkout Area -->
		<section class="wn__checkout__area  bg__white">
        	<div class="containe">

        <?php 
         $i = 1;
        foreach ($get->result() as $key) :
            ?>
            <div class="card mb-3" style="width:100%;">
                <div class="row no-gutters">
                    <div class="col-md-2">
                    <img src="<?php echo base_url()?>assets/images/icon/trans.jpg" >
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <span class="badge badge-pill badge-primary"><?= $i++; ?></span>
                        <?php 
                        $rows = $this->db->query("SELECT * FROM tbl_konfirm where id_order='".$key->id_order."'")->row_array();
                        $row = $this->db->query("SELECT * FROM tbl_order where id_order='".$key->id_order."'")->row_array();
                       
                        if (!$rows==0){
                         echo '<span style="color:white;" class="badge badge-success mb-1 mt-3">Diproses</span>';
                        }elseif (date("Y-m-d")>$row['batas_bayar']){
                          echo '<span class="badge badge-danger mb-1 mt-3">Kadaluwarsa</span>';
                        }else{echo '<span style="color:#fff;" class="badge badge-warning mb-1 mt-3">Menunggu Pembayaran</span>';
                        }
                          ?>
                        <p class="card-text">ID TRANSAKSI : <?= $key->id_order; ?></p>
                        <p class="card-text">TANGGAL PESAN : <?= $key->tgl_order; ?></p>
                        <p class="card-text">BATAS BAYAR : <?= $key->batas_bayar; ?></p>
                        <p class="card-text">TOTAL BAYAR : Rp <?= number_format($key->total_harga, 0,",","."); ?></p>
                        <?php 
                          $rows = $this->db->query("SELECT * FROM tbl_konfirm where id_order='".$key->id_order."'")->row_array();
                           $rows = $this->db->query("SELECT * FROM tbl_konfirm where id_order='".$key->id_order."'")->row_array();
                          {?>
                        <p class="card-text">RESI ANDA : <span class="badge badge-success mb-1 mt-3"><?= $rows['resi'];?></span> 
                        <?php }?><br><hr> 
                        <a href="<?=base_url()?>user/detail_transaksi/<?= $key->id_order;?>" class="btn btn-sm btn-primary mt-2 ml-1" style=" border-radius:0px; color:white;" data-toggle="tooltip" data-placement="top" title="LIHAT DETAIL ORDER">DETIL ORDER</i></a>  
                        
                        <?php 
                        $rows = $this->db->query("SELECT * FROM tbl_konfirm where id_order='".$key->id_order."'")->row_array();
                        $row = $this->db->query("SELECT * FROM tbl_order where id_order='".$key->id_order."'")->row_array();

                        if (!$rows==0){?>

                         <?php
                         }elseif (date("Y-m-d")>$row['batas_bayar']){?>
                          
                        <?php  }else{?>
                          <a disabled="" data-toggle="modal" data-target="#exampleModal<?= $key->id_order?>" data-whatever="@mdo" href="#" class="btn btn-sm btn-success mt-2 ml-1"  style="border-radius:0px; color:white;"><i class="fa fa-check"> </i></a>

                        <?php }?>

                        <a onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS TRANSAKSI INI ?')" href="<?=base_url()?>user/hapus_transaksi/<?= $key->id_order;?>" class="btn btn-sm btn-danger mt-2 ml-1" style=" border-radius:0px; color:white;" data-toggle="tooltip" data-placement="top" title="HAPUS TRANSAKSI"><i class="fa fa-trash"></i></a>  


                        <!-- <a data-toggle="modal" data-target="#resi" data-whatever="@mdo" href="#" class="btn btn-sm btn-danger mt-2 ml-1" style="border-radius:0px; color:white;">CEK RESI </a> -->

                    </div>
                    </div>
                </div>
                </div>
            <?php endforeach;?>
        	</div>
        </section>
        <!-- End Checkout Area -->
		</div>
	</div>
</div>
</section>

<!--------------KONFIRMASI BAYAR--------------------->
<?php 
    $i = 1;
      foreach ($get->result() as $key) :
    ?>
<div class="modal fade" id="exampleModal<?= $key->id_order; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <input type="hidden" name="id_order" class="form-control" value="<?= $key->id_order; ?>">
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
<?php endforeach;?>
<!--------------KONFIRMASI BAYAR--------------------->



