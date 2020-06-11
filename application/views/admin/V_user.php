<section class="wn__recent__post bg--gray ptb--80">
<div class="container">

					<div class="col-md-12 col-lg-12 col-sm-12 mt-5">
                    <nav  aria-label="breadcrumb">
                        <ol style="background-color:white;" class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Data User</a></li>
                        </ol>
                        </nav>
						<div class="post__itam">
							<div class="content">

                            <div class="row">
                                <div class="col-lg-8">
                                <h2 class="text-left"><b>DATA USER</b></h2>
                                </div>
                                    <div class="col-lg mb" style="margin-left:200px; margin-bottom:15px;">
                                    <a style="color:white;" href="<?php echo base_url('admin/data_user');?>" style="margin-right: 10px ;" class="btn btn-warning"><span class='fa fa-refresh' aria-hidden='true'></span> Refresh</a>
                                    </div>
                             </div><div class="post__time"></div>

                        <?=$this->session->flashdata('flash')?>     
                        <form action="#">               
                        <div class="table-content wnro__table table-responsive">
                                <table id="mydata">
                                    <thead style="" class="">
                                        <tr>
                                            <th class="product-price"><i class="fa fa-sort"></i> Image </th>
                                            <th class="product-name"><i class="fa fa-sort"></i> Id User</th>
                                            <th class="product-price"><i class="fa fa-sort"></i> Nama </th>
                                            <th class="product-subtotal"><i class="fa fa-sort"></i> Email</th>
                                            <th class="product-remove"><i class="fa fa-sort"></i> Tanggal Registrasi</th>
                                            <th class="product-remove"><i class="fa fa-sort"></i> Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $i = 1;
                                        foreach ($get as $key) :
                                        ?> 
                                        <tr>
                                            <td><img width="90px" src="<?php echo base_url('/assets/images/user_picture/')?><?=$key['image'];?>";/></td>
                                            <td class=""><?=$key['id_user'];?></td>
                                            <td class=""><?= $key['nama_user'];?></td>
                                            <td class=""><?= $key['email_user'];?></td>
                                            <td class=""><?= $key['tanggal_mulai'];?></td>
                                            <td>
                                                <!-- <a style="color:#fff;" href="<?=base_url()?>admin/detail_user/<?=$key['id_user'];?>" style="border-radius:0px; color:#fff;" class="bg-primary btn btn-sm btn-primary my-2 my-sm-0 ml-1" ><span class='fa fa-search' aria-hidden='true'></a> -->

                                                <a style="color:#fff;" href="<?=base_url()?>admin/hapus_user/<?=$key['id_user'];?>" style="border-radius:0px;" class="btn btn-sm btn-danger my-2 my-sm-0 ml-1" type="submit" name="delete" onclick="return confirm('Yakin ingin menghapus data ini ?')"><span class='fa fa-trash' aria-hidden='true'></a>
                                            </td>
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

