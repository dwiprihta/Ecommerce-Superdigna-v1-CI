
<section class="wn__recent__post bg--gray ptb--80">
<div class="container">

					<div class="col-md-12 col-lg-12 col-sm-12 mt-5">  
                        <nav  aria-label="breadcrumb">
                        <ol style="background-color:white;" class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Data Produk</a></li>
                        </ol>
                        </nav>                  
						<div class="post__itam">
							<div class="content">

                            <div class="row" style="margin-bottom:15px;">
                                <div class="col-lg-8">
                                <h2 class="text-left"><b>DATA PRODUK</b></h2>
                                </div>
                                    <div class="col-lg mb" style="margin-left:100px; margin-bottom:0px;">
                                    <a style="color:white;" class="btn btn-md btn-primary" href="<?= base_url();?>admin/add_produk"><span class='fa fa-plus' aria-hidden='true'></span> TAMBAH</a> 
                                    <a style="color:white;" class="btn btn-md btn-warning" href="<?= base_url();?>admin/data_produk"><span class='fa fa-refresh' aria-hidden='true'></span> REFRESH</a>
                                    </div>
                             </div>
                             <div class="post__time"></div>

                      <?=$this->session->flashdata('notif')?>        
                         <form action="#">               
                            <div class="table-content wnro__table table-responsive">
                                <table id="mydata">  
                                <thead>
                                        <th class="product-thumbnail">FOTO</th> 
                                            <!-- <th class="product-thumbnail">FOTO</th>  -->
                                            <th class="product-name"><i class="fa fa-sort"></i> NAMA PRODUK</th>
                                            <th class="product-price"><i class="fa fa-sort"></i> UKURAN & STOK</th>
                                            <th class="product-quantity"><i class="fa fa-sort"></i> JENIS WARNA</th>
                                            <th class="product-subtotal"><i class="fa fa-sort"></i> BERAT</th>
                                            <!-- <th class="product-remove"><i class="fa fa-sort"></i> QTY</th> -->
                                            <th class="product-remove"><i class="fa fa-sort"></i> HARGA</th>
                                            <th class="product-remove"><i class="fa fa-sort"></i> ACTION</th>
                                        </tr>
                                    </thead>

                                        <tbody>
                                            <!-- <td class="product-thumbnail"><a href="#"><img src="images/product/sm-3/1.jpg" alt="product img"></a></td> -->
                                            <?php foreach($get as $prd):?>    
                                                <tr>
                                                    <td><img width="90px" src="<?php echo base_url('/assets/images/produk/')?><?=$prd['foto'];?>";/></td>
                                                    <td><?=$prd['nama_produk'];?></td>
                                                    <td class=""><span class="amount"> 
                                                    <?php
                                                        $rows = $this->db->query("SELECT * FROM tbl_stok where id_produk='".$prd['id_produk']."'")->result_array();
                                                        foreach ($rows as $row){?>
                                                                <?= $row['ukuran'];?> (<?= $row['stok'];?>),
                                                    <?php }?>
                                                    </span></td>
                                                    <td><?=$prd['warna'];?></td>
                                                    <td><?=$prd['berat'].' Gr';?></td>
                                                    
                                                    <!-- <td class=""><span class="amount">
                                                    <?php
                                                        $rows = $this->db->query("SELECT stok FROM tbl_stok where id_produk='".$prd['id_produk']."'")->result_array();
                                                        foreach ($rows as $row){?>
                                                                <?= $row['stok'].',';?>
                                                    <?php }?></span></td> -->

                                                    <td><?='Rp '. $prd['harga'];?></td>
                                                    <td> 
                                                    <a style="color:#fff;" class="btn btn-sm btn-primary" href="<?= base_url();?>admin/ubah_produk/<?=$prd['id_produk'];?>"><span class='fa fa-pencil' aria-hidden='true' data-toggle="tooltip" data-placement="top" title="UBAH PRODUK"></span></a>
                                                    <a style="color:#fff;"class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini ?')" href="<?php echo base_url();?>admin/del_produk/<?=$prd['id_produk'];?>"><span class='fa fa-trash' aria-hidden='true' id="DELETE PRODUK"></span></a></td>
                                                </tr>
                                                <?php endforeach;?>    
                                        </tbody>
                                </table>
                                </hr><br>
                            </div>
                        </form>               
					</div>
				</div>   
        </section>

    


