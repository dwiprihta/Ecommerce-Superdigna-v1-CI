<section class="wn__recent__post bg--gray ptb--80">
<div class="container">

					<div class="col-md-12 col-lg-12 col-sm-12 mt-5">
                    <nav  aria-label="breadcrumb">
                        <ol style="background-color:white;" class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Data Transaksi</a></li>
                        </ol>
                        </nav>
						<div class="post__itam">
							<div class="content">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h2 class="text-left"><b>DATA TRANSAKSI</b></h2>
                                </div>
                                
                                    <div class="col-lg mb" style="margin-left:200px; margin-bottom:15px;">
                                    <a style="color:white;" href="<?php echo base_url('admin/data_transaksi');?>" style="margin-right: 10px ;" class="btn btn-warning"><span class='fa fa-refresh' aria-hidden='true'></span> Refresh</a>
                                    </div>
                             </div>
                            <div class="post__time">

                        <?=$this->session->flashdata('flash')?>     
                        <form action="#">               
                        <div class="table-content wnro__table table-responsive">
                                <table id="mydata">
                                    <thead style="" class="">
                                        <tr>
                                            <th class="product-name"><i class="fa fa-sort"></i> Id Order</th>
                                            <th class="product-price"><i class="fa fa-sort"></i> Nama Pemesan</th>
                                            <!-- <th class="product-quantity">Jumlah</th> -->
                                            <th class="product-subtotal"><i class="fa fa-sort"></i> Tanggal Pesan</th>
                                            <th class="product-remove"><i class="fa fa-sort"></i> Batas Bayar</th>
                                            <th class="product-remove"><i class="fa fa-sort"></i> Status</th>
                                            <th class="product-remove"><i class="fa fa-sort"></i> Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $i = 1;
                                        foreach ($get as $key) :
                                        ?> 
                                        <tr>
                                            <td class="product-name"><a href=""><i class="fa fa-check-circle"> </i> <?=$key['id_order'];?></a></td>
                                            <td class=""><span class="amount"><?= $key['nama_penerima'];;?></span></td>
                                            <!-- <td class=""><?= $key['jumlah_barang'];?> Pcs</td> -->
                                            <td class=""><?= $key['tgl_order'];?></td>
                                            <td class=""><?= $key['batas_bayar'];?></td>
                                            <td class=""><a style="color:white;"class="badge badge-success"><i class="fa fa-check"></i> SUCCESS</a></td>  
                                          <td>

                                          <!-- <button style="border-radius:0px;" class="btn btn-sm btn-success my-2 my-sm-0" type="submit" name="ubah"><span class="fa fa-check" aria-hidden="true"></button>
                                         -->
                                            <a href="<?=base_url()?>admin/detail_transaksi/<?=$key['id_order'];?>" style="border-radius:0px; color:#fff;" class="bg-primary btn btn-sm btn-primary my-2 my-sm-0 ml-1" ><span class='fa fa-search' aria-hidden='true'></a>

                                            <a href="<?=base_url()?>admin/hapus_transaksi/<?=$key['id_order'];?>" style="border-radius:0px;" class="btn btn-sm btn-danger my-2 my-sm-0 ml-1" type="submit" name="delete" onclick="return confirm('Yakin ingin menghapus data ini ?')"><span class='fa fa-trash' aria-hidden='true'></a>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </form> 										
					</div>
				</div>        
</section>

