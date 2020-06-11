
<section class="wn__recent__post bg--gray ptb--80">
<div class="container">
<div class="col-md-12 col-lg-12 col-sm-12 mt-5"> 
<nav  aria-label="breadcrumb">
  <ol style="background-color:white;" class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Keranjang Belanja</a></li>
  </ol>
</nav>                
			<div class="post__itam">
				<div class="content">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <strong><i class="fa fa-exclamation-triangle"></i> Pastikan anda menekan tombol update </strong>, jika anda mengubah jumlah pembelian anda, Terimakasih !
                </div>
                     <div class="col-md-12 col-sm-12 ol-lg-12">
                            <!-- <h2 class="text-left"><b>KERANJANG BELANJAANMU</b></h2>
                     <div class="post__time">	 -->
                
                </div><?=$this->session->flashdata('notif')?>

                <form action="<?php echo base_url()?>user/ubah_cart" method="post" name="frmShopping" id="frmShopping" class="form-horizontal" enctype="multipart/form-data">
                    <?php
                        if ($cart = $this->cart->contents())
                            {
                    ?>

                <div class="row mt-3 ">
                    <div class="col-md-12 col-sm-12 ol-lg-12">        
                            <div class="table-content wnro__table table-responsive mb-5">
                                <table id="penjualan">
                                    <thead>
                                        <tr class="title-top">
                                            <th class="product-thumbnail">Foto</th>
                                            <th class="product-name">Nama Produk</th>
                                            <th class="product-price">UKURAN</th>
                                            <th class="product-price">Harga Satuan</th>
                                            <th class="product-quantity">Qty</th>
                                            <th id="amount" class="product-subtotal">Sub Tottal</th>
                                            <th class="product-remove">Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $grand_total = 0;
                                        $jumlah_total = 0;
                                        $berat_total = 0;

                                        foreach ($cart as $cr):
                                        $grand_total = $grand_total + $cr['subtotal'];
                                        $jumlah_total =  $jumlah_total + $cr['qty'];
                                        $berat_total=  $jumlah_total * $cr['berat'];
                                        ?>

                                        <input type="hidden" name="cart[<?php echo $cr['id'];?>][id]" value="<?php echo $cr['id'];?>" />
                                        <input type="hidden" name="cart[<?php echo $cr['id'];?>][rowid]" value="<?php echo $cr['rowid'];?>" />
                                        <input type="hidden" name="cart[<?php echo $cr['id'];?>][name]" value="<?php echo $cr['name'];?>" />
                                        <input type="hidden" name="cart[<?php echo $cr['id'];?>][price]" value="<?php echo $cr['price'];?>" />
                                        <input type="hidden" name="cart[<?php echo $cr['id'];?>][gambar]" value="<?php echo $cr['gambar'];?>" />
                                        <input type="hidden" name="cart[<?php echo $cr['id'];?>][berat]" value="<?php echo $cr['berat']*$cr['qty'];?>" />
                                        <input type="hidden" name="cart[<?php echo $cr['id'];?>][qty]" value="<?php echo $cr['qty'];?>" />
                                         <!-- <td><input name="jumlah" type="number" min='1' value="<?= $cr['jumlah'];?>"> </td>        -->
                                <tr>
                                    <tbody>
                                        <tr>
                                        <td><img width="60px" class="img-responsive" src="<?= base_url('assets/images/produk/').$cr['gambar'];?>"/></td>
                                        <td><?php echo $cr['name']; ?></td>
                                        <td><?php echo $cr['size']; ?></td>
                                        <td><?php echo number_format($cr['price'], 0,",","."); ?></td>
                                        <td><input type="number" min="1" class="form-control input-sm" name="cart[<?php echo $cr['id'];?>][qty]" value="<?php echo $cr['qty'];?>" /></td>
                                        <td><?php echo number_format($cr['subtotal'], 0,",",".") ?></td>
                                        <td><a href="<?php echo base_url()?>user/hapus/<?php echo $cr['rowid'];?>" class="btn btn-sm btn-danger"><i style="color:white;" class="fa fa-trash"></i></a></td>
                                        <?php endforeach; ?>  
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        <div class="cartbox__btn">
                            <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap  justify-content-between">  
                            <li><a href="<?php echo base_url('user/produk');?>">BACK SHOPPING</a></li>
                            <li><button style="background-color:white; color:black;" class="btn btn-md btn-warning" type="submit">UPDATE CART</button></li>
                                <li><a href=""  data-toggle="modal" data-target="#myModal" >REMOVE</a></li>   
                                <li><a href="<?php echo base_url('checkout');?>">CEKCOUT</a></li>           
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="cartbox__total__area">
                            <div class="cartbox-total d-flex justify-content-between">
                                <ul class="cart__total__list">
                                    <li>QTY</li>
                                    <li>BERAT </li>
                                </ul>
                                <input type="hidden" value="<?php echo number_format($jumlah_total); ?>">
                               
                                <ul class="cart__total__tk">
                                    <li><?php echo number_format($jumlah_total); ?> Pcs</li>
                                    <li><?php echo number_format($berat_total); ?> Gr</li>
                                </ul>

                            </div>
                            <div class="cart__total__amount">
                                <span>TOTAL</span>
                                <ul class="cart__total__tk">
                                <?php
                                // $jumlah_diskon=['20000','1000','5000','0']; 
                                //    if ($jumlah_total>= 60){
                                //     $detil_diskon=$jumlah_total*$jumlah_diskon['0'];
                                //     echo  "<span><b>Rp ".number_format($grand_total-$detil_diskon, 0,",",".")."</b></span>";
                                //     } elseif ($jumlah_total>=50){
                                //     $detil_diskon=$jumlah_total*$jumlah_diskon['1'];
                                //     echo  "<span><b>Rp ".number_format($grand_total, 0,",",".")-$detil_diskon."</b></span>";
                                //     } elseif ($jumlah_total>=10){
                                //         $detil_diskon=$jumlah_total*$jumlah_diskon['2'];
                                //         echo  "<span><b>Rp ".number_format($grand_total, 0,",",".")-$detil_diskon."</b></span>";
                                //     } else{
                                //         $detil_diskon=$jumlah_total*$jumlah_diskon['3'];
                                //         echo  "<span><b>Rp ".number_format($grand_total, 0,",",".")-$detil_diskon."</b></span>";
                                //     }
                                    ?>
                                    <li>Rp <?php echo number_format($grand_total, 0,",","."); ?></li>
                                 </ul>
                                 <?php
                                        }
                                    else
                                        {
                                            echo '<div style="border-radius:0px; color:#fff; background-color:#da3737;"  class="alert alert-danger" role="alert"> <strong>KERANJANG BELANJAAN KAMU MASIH KOSONG! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';	
                                        }	
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        </form> 
        <!-- cart-main-area end -->
    	</div>
		</div>	      
</section>	


<!-- Modal Penilai -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content-->
      <div class="modal-content">
      	<form method="post" action="<?php echo base_url()?>user/hapus/all">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
			Anda yakin mau mengosongkan Shopping Cart?
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-sm btn-default">Ya</button>
        </div>
        
        </form>
      </div>
      
    </div>
  </div>
  <!--End Modal-->





