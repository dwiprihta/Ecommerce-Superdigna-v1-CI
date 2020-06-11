<section class="wn__recent__post bg--gray ptb--80">
    <div class="container">

					<div class="col-md-12 col-lg-12 col-sm-12 mt-5">
                    <nav  aria-label="breadcrumb">
                        <ol style="background-color:white;" class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                        </ol>
                        </nav>
						<div class="post__itam">
							<div class="content">
                                <div class="col-md-12 col-sm-12 ol-lg-12">
                                <form action="" method="post" class="form-inline my-2 my-lg-0" style="margin-left: 15PX;">
                                <select style="border-radius:0px; width:20%" class="form-control" name="bln" >
                                    <option value="01" <?php if ($bln == '01') { echo 'selected'; } ?>> Januari</option>
                                    <option value="02" <?php if ($bln == '02') { echo 'selected'; } ?>> Februari</option>
                                    <option value="03" <?php if ($bln == '03') { echo 'selected'; } ?>> Maret</option>
                                    <option value="04" <?php if ($bln == '04') { echo 'selected'; } ?>> April</option>
                                    <option value="05" <?php if ($bln == '05') { echo 'selected'; } ?>> Mei</option>
                                    <option value="06" <?php if ($bln == '06') { echo 'selected'; } ?>> Juni</option>
                                    <option value="07" <?php if ($bln == '07') { echo 'selected'; } ?>> Juli</option>
                                    <option value="08" <?php if ($bln == '08') { echo 'selected'; } ?>> Agustus</option>
                                    <option value="09" <?php if ($bln == '09') { echo 'selected'; } ?>> September</option>
                                    <option value="10" <?php if ($bln == '10') { echo 'selected'; } ?>> Oktober</option>
                                    <option value="11" <?php if ($bln == '11') { echo 'selected'; } ?>> November</option>
                                    <option value="12" <?php if ($bln == '12') { echo 'selected'; } ?>> Desember</option>
                                </select>
                                <select style="border-radius:0px; width:20%" class="form-control ml-3" name="thn" style="width:20%">
                                <?php for ($i = 2019; $i <= 2050; $i++) { ?>
                                    <option value="<?=$i;?>" <?php if ($thn == $i) { echo 'selected'; } ?>>
                                        <?=$i;?>
                                    </option>
                                <?php } ?>
                                </select>
                                    <button class="btn btn-md btn-success my-2 my-sm-0 ml-3" type="submit" name="submit" value="Submit"><span class='fa fa-filter' aria-hidden='true'></span> FILTER</button>
                                </form>
                                <div class="post__time">	
                            </div>	

                    <div class="x_content">
                        <div class="row">
                            <?php
                            switch ($bln) {
                                case '01':
                                $Bulan = 'Januari';
                                break;
                                case '02':
                                $Bulan = 'Februari';
                                break;
                                case '03':
                                $Bulan = 'Maret';
                                break;
                                case '04':
                                $Bulan = 'April';
                                break;
                                case '05':
                                $Bulan = 'Mei';
                                break;
                                case '06':
                                $Bulan = 'Juni';
                                break;
                                case '07':
                                $Bulan = 'Juli';
                                break;
                                case '08':
                                $Bulan = 'Agustus';
                                break;
                                case '09':
                                $Bulan = 'September';
                                break;
                                case '10':
                                $Bulan = 'Oktober';
                                break;
                                case '11':
                                $Bulan = 'November';
                                break;
                                case '12':
                                $Bulan = 'Desember';
                                break;
                            }
                            ?>
                    </div>
                            <div class="row">
                                <div class="col-lg-8">
                               <h3>Laporan Bulan <?= $Bulan;?> Tahun <?=$thn;?></h3>
                                </div>
                                    <div class="col-lg mb" style="margin-left:200px; margin-bottom:30px;">

                                    <a target="_blank" style="color:white;"href="<?=base_url();?>admin/cetak/<?=$bln;?>/<?=$thn;?>" style="margin-right: 10px ;" class="btn btn-primary"><span class='fa fa-print' aria-hidden='true' ></span> Cetak</a>
                                    </div>
                             </div>

                        <?=$this->session->flashdata('flash')?>     
                        <form action="#">               
                        <div class="table-content wnro__table table-responsive">
                                <table id="mydata">
                                    <thead style="" class="">
                                        <tr>
                                            <th>#</th>
                                            <th class="product-price"><i class="fa fa-sort"></i> Id Order</th>
                                            <th class="product-price"><i class="fa fa-sort"></i> Tgl Bayar</th>
                                            <th class="product-name"><i class="fa fa-sort"></i> Nama Pemesan</th>
                                            <th class="product-quantity"><i class="fa fa-sort"></i> Kota</th>
                                            <th class="product-remove"><i class="fa fa-sort"></i> nomor resi</th>
                                            <th class="product-remove"><i class="fa fa-sort"></i> BANK Pengirim</th>
                                            <th class="product-subtotal"><i class="fa fa-sort"></i> Subtotal</th>
                                            <th class="product-remove"><i class="fa fa-sort"></i> Ongkos Kirim</th>
                                            <th class="product-remove"><i class="fa fa-sort"></i> Tagihan</th>
                                            <th class="product-remove"><i class="fa fa-sort"></i> Jumlah Pembayaran</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $i = 1;
                                        $pendapatan = 0;
                                        foreach($data->result() as $key) :
                                            $hit= $key->total_harga-$key->ongkir;
                                            $pendapatan += $hit;
                                        ?> 
                                        <tr>
                                            <td class=""></i> <?=$i++?></a></td>
                                            <td class=""></i> <?=$key->id_order;?></a></td>
                                            <td class=""><span class="amount"><?= $key->tgl_bayar;?></span></td>
                                            <td class=""><?= $key->nama_penerima;?></td>
                                            <td class=""><?= substr($key->kota,4);?></td>
                                            <td class=""><?= $key->resi;?></td>
                                            <td class=""><?= $key->bank;?></td>
                                            <td class="">Rp <?= number_format($key->total_harga-$key->ongkir, 0,",",".");?>.-</td>
                                            <td class="">Rp <?= number_format($key->ongkir, 0,",",".");?>.-</td>
                                            <td class="">Rp <?= number_format($key->total_harga, 0,",",".");?>.-</td>
                                            <td class="">Rp <?= number_format($key->jumlah, 0,",",".");?>.-</td>
                                        </tr>
                                                  
                                    <?php endforeach;?>
                                    <tr>
                                        <td colspan="8" style="text-align:center"><b>PENDAPATAN</b></td>
                                        <td  colspan="3" >
                                            <b>
                                            <span style="float:left">Rp.</span>
                                            <span style="text-align:center"><?= number_format($pendapatan, 0,",",".");?></span>
                                            </b>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form> 										
					</div>
				</div>        
</section>

