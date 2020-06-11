<!DOCTYPE html>
<html lang="en">
<head>
	<title>BUAT AKUN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->

<link rel="shortcut icon" href="<?php echo base_url()?>assets/images/logo/logo2.png">
    <link rel="apple-touch-icon" href="<?php echo base_url()?>assets/images/icon.png">

<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">	
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/util.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/util.css">
	<link  href="<?php echo base_url()?>/assets/css/login/font.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url()?>assets/css/login/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
	
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">		
					<span class="login100-form-title p-b-3">
						<b>BUAT AKUN <i class="fa fa-exclamation"></i></b>
					</span>
					<?=$this->session->flashdata('notif')?>
					<hr>
						
					<form method="post" action="<?= base_url('home_visitor/register');?>">
                         <div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama');?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-user"></i>
						</span>
						<small class="text-danger"><?= form_error('nama');?></small>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" value="<?= set_value('email');?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-envelope"></i>
						</span>
						<small class="text-danger"><?= form_error('email');?></small>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="pass1" placeholder="Password" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-lock"></i>
						</span>
					</div>
					<small class="text-danger"><?= form_error('pass1');?></small>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required" >
						<input class="input100" type="password" name="pass2" placeholder="Ulangi Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-lock"></i>
						</span>
                         </div>

					
					<div class="container-login100-form-btn p-t-25">
						<button type="submit" class="login100-form-btn" name="submit">
							DAFTAR AKUN
						</button>
					</div>
				</form>

					<div class="text-center w-full p-t-50">
							<a class="txt1 hov1" href="<?php echo base_url('home_visitor/login')?>">
							Kembali Login							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>