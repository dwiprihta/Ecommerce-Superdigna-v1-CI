
<section class="wn__recent__post bg--gray ptb--80">
<div class="container">

					<div class="col-md-12 col-lg-12 col-sm-12 mt-5">
                    <nav  aria-label="breadcrumb">
                        <ol style="background-color:white;" class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Data Order</a></li>
                        </ol>
                        </nav>

						<div class="post__itam">
							<div class="content">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h2 class="text-left"><b>DATA ORDER</b></h2>
                                </div>
                                    <div class="col-lg mb" style="margin-left:200px; margin-bottom:15px;">
                                    <a style="color:white;" href="<?php echo base_url('admin/data_order');?>" style="margin-right: 10px ;" class="btn btn-warning"><span class='fa fa-refresh' aria-hidden='true'></span> Refresh</a>
                                    </div>
                             </div>
                             <div class="post__time">
                             </div>

                        <?=$this->session->flashdata('flash')?>     
                        <form action="#">               
                        <div class="table-content wnro__table table-responsive">
                                <table class="" id="mydata">
                                    <thead>
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
                                            <td class="product-name"><a href="<?=base_url()?>admin/detail_transaksi/<?=$key['id_order'];?>"><i class="fa fa-check-circle"> </i> <?=$key['id_order'];?></a></td>
                                            <td class=""><span class="amount"><?= $key['nama_penerima'];;?></span></td>
                                            <!-- <td class=""><?= $key['jumlah_barang'];?> Pcs</td> -->
                                            <td class=""><?= $key['tgl_order'];?></td>
                                            <td class=""><?= $key['batas_bayar'];?></td>
                                            <?php 
                                                $rows = $this->db->query("SELECT * FROM tbl_konfirm where id_order='".$key['id_order']."'")->row_array();
                                                $row = $this->db->query("SELECT * FROM tbl_order where id_order='".$key['id_order']."'")->row_array();
                                                  if (!$rows==0){?>
                                                    <td class=''><a href="<?=base_url()?>admin/data_konfirm/<?=$key['id_order'];?>" style='color:white;' class='badge badge-primary'><i class='fa fa-check'></i> DIKONFIRM</a></td>
                                                  <?php }elseif (date("Y-m-d")>$row['batas_bayar']){?>
                                                      <td class=""><a style="color:white;"class="badge badge-danger"><i class="fa fa-check"></i> KADALUARSA</a></td>
                                                  <?php }else{
                                                    echo'<td class=""><a style="color:white;" class="badge badge-warning"><i class="fa fa-check"></i> MENUNGGU</a></td>';
                                                  }
                                            ?>
                                           
                                          <td>
                                          <a style="color:#fff;" class="btn btn-sm btn-primary" href="<?=base_url()?>admin/detail_transaksi/<?=$key['id_order'];?>"><span class='fa fa-search' aria-hidden='true' data-toggle="tooltip" data-placement="top" title="DETIL ORDER"></span></a>

                                          <a style="color:#fff;"class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini ?')" href="<?=base_url()?>admin/hapus_order/<?=$key['id_order'];?>"><span class='fa fa-trash' aria-hidden='true' id="DELETE ORDER"></span></a>

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



