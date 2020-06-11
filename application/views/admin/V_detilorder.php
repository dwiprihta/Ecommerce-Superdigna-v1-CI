<section class="wn__recent__post bg--gray ptb--80">
<div class="container">

<div class="col-md-12 col-lg-12 col-sm-12 mt-5">
<nav  aria-label="breadcrumb">
  <ol style="background-color:white;" class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
	<li class="breadcrumb-item"><a href="#">Transaksi </a></li>
	<li class="breadcrumb-item"><a href="#">Detil Order</a></li>
  </ol>
</nav> 
    <div class="post__itam">
        <div class="content">
            <div class="col-md-12 col-sm-12 ol-lg-12">
                <!-- <h2 class="text-left"><b>DETIL ORDER</b></h2>
            <div class="post__time">	 -->
        </div>	            
<?php
$data = $get->row();
?>
<table style="border-color:#fff; ">
    <tr>
    <td width="15%"> <b>Id Pesanan</b></td>
    <td> <b>:  <?= $data->id_order; ?></b></td>
    </tr>
    <tr>
    <td width="15%"> <b>Tujuan</b></td>
    <td> <b>: <?= $data->alamat_lengkap; ?>, <?= $data->alamat_lengkap; ?></b></td>
    </tr>
    <tr>
    <td width="15%"> <b>Kurir / Layanan</b></td>
    <td> <b>: <?= $data->kurir ?> / <?= $data->service; ?></b></td>
    </tr>
    <tr>
    <td width="15%"> <b>Catatan</b></td>
    <td> <b>: <?= $data->catatan; ?></b></td>
    </tr>
</table>

<div class="table-content wnro__table table-responsive mt-1">
                <table id="datatable">
                    <thead style="color:#fff;" class="bg-warning">
                        <tr>
                            <th class="product-name">No</th>
                            <th class="product-price">Nama Barang</th>
                            <th class="product-quantity">Qty</th>
                            <th class="product-quantity">UKURAN</th>
                            <th class="product-subtotal">Total Bayar</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        $i = 1;
                        $total_biaya = 0;
                        foreach ($get->result() as $key) :
                        $jumlah_barang=$key->jumlah_barang;
                        $ukuran=$key->ukuran;
                        $harga=$key->harga;
                        $subtotal=$jumlah_barang*$harga;
                        $total_biaya += $key->harga;
                    ?>

                        <tr>
                            <td class=""><span class="amount"><?= $i++;?></span></td>
                            <td class="product-name"> <?= $key->nama_produk; ?></td>
                            <td class=""><span class="amount"><?= $key->jumlah_barang; ?></span></td>
                                   <td class=""><span class="amount"> 
                                   <?php
                                         $rows = $this->db->query("SELECT ukuran FROM detil_order where id_order='".$key->id_order."' and id_barang='".$key->id_produk."'")->result_array();
                                         foreach ($rows as $row){?>
                                            <?= $row['ukuran'];?>
                                   <?php }?>
                                   </span></td>
                            <td class="">Rp. <?= number_format($subtotal, 0, ',', '.'); ?></td>
                        </tr>
                        
                    <?php endforeach;?>
                        <tr>
                            <td colspan="4" ><b>ONGKOS KIRIM</b></td>
                            <!-- <td >O</td> -->
                            <td style="text-align:center"><b>Rp. <?php echo number_format($data->total_harga - $total_biaya,0,',','.'); ?>,-</b></td>
                        </tr>
                        <tr>
                            <td colspan="4"><b>TOTAL BIAYA</b></td>
                            <td style="text-align:center"><b>Rp. <?php echo number_format($data->total_harga,0,',','.'); ?>,-</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>

<div class="row">
   <table class="bordered responsive-table col m8 s12 offset-m1">
      <tbody>
        
      </tbody>
   </table>
</div>									
	</div>
</div>        
</section>

