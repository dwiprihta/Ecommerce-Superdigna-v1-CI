<section class="wn__recent__post bg--gray ptb--80">
<div class="container">

<div class="col-md-12 col-lg-12 col-sm-12 mt-5">
<nav  aria-label="breadcrumb">
    <ol style="background-color:white;" class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Data Order</a></li>
        <li class="breadcrumb-item"><a href="#">Konfirmasi Order</a></li>
    </ol>
    </nav>
    <div class="post__itam">
        <div class="content">
            <div class="col-md-12 col-sm-12 ol-lg-12">
                <h2 class="text-left"><b>DATA KONFIRMASI ORDER</b></h2>
            <div class="post__time">	
        </div>

        <div class="row">
            <div class="col lg-3">
                <img src="<?php echo base_url()?>assets/images/confirm/<?= $get['foto']; ?>" >   
            </div>
           
            <div class="col lg-9">
            <div class="mt-3"><div class="alert alert-primary" role="alert">
                <p>1. Cek kembali detail orderan, ,<b>pastikan order dari user sudah tepat (jumlah, alamat pengiriman, dll)</b></p>
                <p>2. Pastikan Jumlah yang dibayarkan user sudah sesuai dengan jumlah tagihan</b>.</p>
                <p>3. <b>Cek bukti transfer</b>, pastikan semua tulisan pada foto terlihat dengan jelas.</p>
                <p>4. <b>Cek pada rekining</b>, pastikan pemesan sudah benar benar melakukan transfer pembayaran.</p>
                <p>5. Setelah semua sudah tepat, <b>pastikan anda mengisi nomor resi pengiriman, sebelum konfirmasi order.</b></p>
            </div></div>

            <div class="card" style="width: 100%">
            <div class="card-body">  
            <form action="" method="post">
                    <div class="form-group">
                        <label for="recipient-name">ID Order</label>
                        <input type="text" readonly="" required=""  name="id_order" class="form-control" id="recipient-name" value="<?= $get['id_order']; ?>">
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name">Metode Pembayaran</label>
                        <input type="text" readonly="" required=""  name="metode_bayar" class="form-control" id="recipient-name" value="<?= $get['metode_bayar']; ?>">
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name">Nama Pemilik Rekening</label>
                        <input type="text" readonly="" required=""  name="nama" class="form-control" id="recipient-name" value="<?= $get['nama']; ?>">
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name">Tanggal Bayar</label>
                        <input type="text" readonly="" required=""  name="tgl_bayar" class="form-control" id="recipient-name" value="<?= $get['tgl_bayar']; ?>">
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name">Bank</label>
                        <input type="text" readonly="" required=""  name="bank" class="form-control" id="recipient-name" value="<?= $get['bank']; ?>">
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name">Jumlah Bayar</label>
                        <input type="text" readonly="" required=""  name="jumlah" class="form-control" id="recipient-name" value="<?= $get['jumlah']; ?>">
                        </select>
                    </div>

                    <input type="hidden" readonly="" required=""  name="foto" class="form-control" id="recipient-name" value="<?= $get['foto']; ?>">

                    <div class="form-group">
                        <label for="recipient-name">Nomor Resi</label>
                        <input autofocus="" required="" type="text" name="resi" class="form-control" id="recipient-name">
                        </select>
                    </div>
                            <br>
                         <hr>
                        <input type="submit" name="submit" style="width:100%;" onclick="return confirm('ANDA YAKIN AKAN MEMPROSES ORDER INI ? PASTIKAN NOMOR RESI YANG ANDA MASUKAN SUDAH BENAR')" class="btn btn-primary" value="PROSES ORDER">
                </form>   
            </div>
            </div>
                <!-- <ul class="list-group list-group-flush">
                <li class="list-group-item"><b><label>Nomor Pesanan : </label></br><?= $data->id_order; ?></b></li>
                <li class="list-group-item"><b>Metode Bayar :</br> <?= $data->metode_bayar; ?></b></li>
                <li class="list-group-item"><b>Nama Pemilik Rekening : </br> <?= $data->nama; ?></b></li>
                <li class="list-group-item"><b>Tanggal bayar : </br> <?= $data->tgl_bayar; ?></b></li>
                <li class="list-group-item"><b>Bank Transfer : </br> <?= $data->bank; ?></b></li>
                <li class="list-group-item"><b>Jumlah :</br>Rp  <?= $data->jumlah; ?></b></li>
            </ul> -->
            </div>
           
	    </div>
       
        
    </div>        
</section>

