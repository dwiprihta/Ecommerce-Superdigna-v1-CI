<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Cetak Laporan Penjualan</title>
     <!-- Favicons -->
         <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/logo/logo2.png">
         <link rel="apple-touch-icon" href="<?php echo base_url()?>assets/images/icon.png">
      
         <!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
         <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
         <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
         <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> 

         
         <!-- Stylesheets -->
         <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
         
         <!-- Cusom css -->
         <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
         <link rel="stylesheet" href="<?php echo base_url()?>assets/css/plugins.css">
         <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
         <link rel="stylesheet" href="<?php echo base_url()?>assets/css/plugins/check.css">
   </head>
   <body>
  
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

            <div class="col-md-12 col-sm-12 ">
               <center><h3>Laporan Penjualan Superdigna</h3></center>
               <center><h3>Laporan Bulan <?= $Bulan;?> Tahun <?=$thn;?></h3></center></br><hr></br>
            </div></br>

            <div class="col-md-12 col-sm-12">
            <div class="table-content wnro__table ">
                                <table style="border:1px solid black" id="datatable">
                                    <thead style="border:1px solid black" class="">
                                        <tr style="border:1px solid black">
                                            <th style="border:1px solid black">#</th>
                                            <th style="border:1px solid black" class="product-quantity">Id Order</th>
                                            <th style="border:1px solid black" class="product-name">Nama </th>
                                            <th style="border:1px solid black" class="product-quantity">Kota Tujuan</th>
                                            <th style="border:1px solid black" class="product-remove">BANK Pengirim</th>
                                            <th style="border:1px solid black" class="product-subtotal">Subtotal</th>
                                            <th style="border:1px solid black" class="product-remove">Ongkir</th>
                                            <th style="border:1px solid black" class="product-remove">Total Bayar</th>
                                            <th style="border:1px solid black" class="product-remove">Dibayarkan</th>
                                           
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
                                            <td style="border:1px solid black" class=""></i> <?=$i++?></a></td>
                                            <td style="border:1px solid black" class=""></i> <?=$key->id_order;?></a></td>
                                            <td style="border:1px solid black" class="product-name"><?= $key->nama_penerima;?></td>
                                            <td style="border:1px solid black" class=""><?= substr($key->kota,4);?></td>
                                            <td style="border:1px solid black" class=""><?= $key->bank;?></td>
                                            <td style="border:1px solid black" class="">Rp <?= number_format($key->total_harga-$key->ongkir, 0,",",".");?>.-</td>
                                            <td style="border:1px solid black" class="">Rp <?= number_format($key->ongkir, 0,",",".");?>.-</td>
                                            <td style="border:1px solid black" class="">Rp <?= number_format($key->total_harga, 0,",",".");?>.-</td>
                                            <td style="border:1px solid black" class="">Rp <?= number_format($key->jumlah, 0,",",".");?>.-</td>
                                        </tr>
                                                  
                                    <?php endforeach;?>
                                    <tr>
                                        <td style="border:1px solid black" colspan="8" style="text-align:center"><b><h5>PENDAPATAN</h5></b></td>
                                        <td style="border:1px solid black" colspan="3" >
                                            <b>
                                            <h6><span style="">Rp </span>
                                            <span style="text-align:center"><?= number_format($pendapatan, 0,",",".");?></span></h6>
                                            </b>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
            </div>
         </div>
      </div>
      <script type="text/javascript">
         window.print();
      </script>
   </body>
</html>
