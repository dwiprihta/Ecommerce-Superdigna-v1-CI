<section class="wn__recent__post bg--gray ptb--80 ">		
<div class="container">    
<nav  aria-label="breadcrumb">
  <ol style="background-color:white;" class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Profil Saya</a></li>
  </ol>
</nav>
		<div class="post__itam">
				<div class="content">
                            <!-- <h2 class="text-left"><b> <i class="fa fa-user"> </i> AKUN SAYA</b></h2>
                     <div class="post__time">	
                </div>		 -->
					<?=$this->session->flashdata('notif')?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><i class="fa fa-exclamation-triangle"></i> Anda harus login kembali saat mengganti data pada akun anda!</strong>
            </div>

          <div class="row">
          <div class="col-lg-4">

          <div class="alert alert-success" role="alert">
            <h4 class="alert-heading"><i class="fa fa-user"></i> Profil anda!</h4>
            <hr>
            <p mt-5>id user : 66845eb1b20675a602d3f4618eddd1b6 </p>
            <p mt-5>Nama : <?= $get['nama_user']; ?></p>
            <p mt-5>Email: <?= $get['email_user']; ?></p>
            <p mt-5>Tanggal Mulai : <?= $get['tanggal_mulai']; ?></p>
          </div>

            <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading"><i class="fa fa-exclamation-triangle"></i> Perhatian!</h4>
            <hr>
                <p>1. Jika ingin mengganti password, anda disarankan mengunakan password yang mudah diingat </p>
                <p>2. Password minimal 5 karakter (angka / huruf, bisa dikombinasikan).</p>
                <p>3. Anda juga harus menginputkan password lama anda demi keamanan.</p>
                <p>4. jika terjadi kesalahan penginputan password kami akan memaksa sistem logout.</b>.</p>
                <p>5. Saat anda berhasil mengganti anda akan diminta login kembali.</p>
                <p>6. Berhati hatilah dalam pengisian data akun.</p>
            </div>
          </div>

          <div class="col-lg-8">
          <div class="card">
                      <div class="card-body">
                          <form action="" method="post">
                            <input type="hidden" readonly="" required=""  name="id_user" class="form-control" id="recipient-name" value="<?= $get['id_user']; ?>">
                            <div class="form-group">
                                <label for="recipient-name">Nama User</label>
                                <input type="text" readonly=""  required=""  name="nama_user" class="form-control" id="recipient-name" value="<?= $get['nama_user']; ?>">
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name">Email</label>
                                <input type="text" readonly=""  required=""  name="email_user" class="form-control" id="recipient-name" value="<?= $get['email_user']; ?>">
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name">Tanggal akun</label>
                                <input type="text" readonly=""  required=""  name="tanggal_mulai" class="form-control" id="recipient-name" value="<?= $get['tanggal_mulai']; ?>">
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name">Password Baru</label>
                                <input type="password"  required=""  name="pass1" class="form-control" id="recipient-name">
                                <p class="text-danger"><?= form_error("pass1");?></p>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name">Ulangi Password Baru</label>
                                <input type="password"  required=""  name="pass2" class="form-control" id="recipient-name>">
                                <small class="text-danger"><?= form_error('pass2');?></small>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name">Password Lama</label>
                                <input type="password" required="" name="pass3" class="form-control" id="recipient-name>">
                                <small class="text-danger"><?= form_error('pass3');?></small>
                                </select>
                            </div>

                                <hr><br>
                                <button onclick="return confirm('ANDA YAKIN AKAN MEGUBAH DATA INI ?')" type="submit" name="submit" class="btn btn-primary" style="width:100%"> SIMPAN PROFIL SAYA <i class="fa fa-arrow-right"></i></button>     
                        </form>     
                      </div>
                    </div>
          </div>

        </div>
      </div>
    </div>
</section>



