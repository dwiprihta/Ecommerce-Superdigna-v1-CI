<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->library('form_validation','array');
		$this->load->helper('form','url');
		 if($this->session->userdata('id_role')!=="2") {
          redirect('login/login');
          }
		}

	public function index(){
		$this->load->view('template/V_header_admin.php');
		$this->load->view('admin/V_main_admin.php');
		$this->load->view('template/footer.php');
	}

	public function data_produk(){
		// $keyword=$this->input->post('search');
		// //start
		// $this->load->database();
		// $jumlah_data = $this->M_admin->jumlah_produk();
		// $this->load->library('pagination');
		// $config['base_url'] = base_url().'/admin/data_produk/';
		// $config['total_rows'] = $jumlah_data;
		// $from = $this->uri->segment(3);

		// //Tambahan untuk styling
		// 	$this->pagination->initialize($config);
		// 	$data['produk'] = $this->M_admin->show_produk($config['per_page'],$from,$keyword);
		// 	$this->load->view('template/V_header_admin.php');
		// 	$this->load->view('admin/V_data_produk.php',$data);
		// 	$this->load->view('template/footer.php');

		if (!$this->session->userdata('id_user'))
		 {
		 redirect('home_visitor/login');
		 }

		 $data['get'] = $this->M_admin->show_produk();
		 if ($this->input->post('search')){
            $data['get']=$this->M_admin->cari_produk();
		}
		 $this->load->view('template/V_header_admin');
		 $this->load->view('admin/V_data_produk',$data);
		 $this->load->view('template/footer'); 
    }

	public function show_warna(){
		$this->load->view('template/V_header_admin.php');
		$this->load->view('admin/V_tambah_produk.php',$data);
		$this->load->view('template/footer.php');
   }


   public function add_produk(){
	$this->form_validation->set_rules('nama_produk','nama','required');
	// $this->form_validation->set_rules('nama','Nama','required'); 
	// $this->form_validation->set_rules('jk','Jenis Kelamin','required'); 

	//data warna dan ukuran
	$data['warna']=$this->M_admin->getwarna();
	$data['ukuran']=$this->M_admin->getukuran();
	$data['bahan']=$this->M_admin->getbahan();

	if ($this->form_validation->run()==FALSE){
		$this->load->view('template/V_header_admin.php');
		$this->load->view('admin/V_tambah_produk.php',$data);
		$this->load->view('template/footer.php');
	}else
		{
			$config['upload_path']          = './assets/images/produk';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 800;
			$config['max_width']            = 4500;
			$config['max_height']           = 5700;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('userfile'))
					 {
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('flash','<div  style="border-radius:0px; color:#fff; background-color:#da3737;"  class="alert alert-danger" role="alert"> <strong>Data Gagal ditambahkan! Kami mengalami masalah pada foto anda, baca kembali aturan pengisian dibawah ini !</strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('admin/add_produk');
					}
			else{

				$this->M_admin->add_produk();
				$this->session->set_flashdata('notif','<div  style="border-radius:0px; color:#fff; background-color:#008cff;" class="alert alert-primary" role="alert"> <strong>Data berhasil ditambahkan ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('admin/data_produk');
			}	
		}
	}

		public function ubah_produk($id){ 
			$data['produk']=$this->M_admin->getdetilproduk($id);
			
			$data['warna']=$this->M_admin->getwarna();
			$data['ukuran']=$this->M_admin->getukuran();
			$data['bahan']=$this->M_admin->getbahan();

			$this->form_validation->set_rules('id_produk','id_produk','required|numeric');
			// $this->form_validation->set_rules('nama','Nama','required'); 
			// $this->form_validation->set_rules('jk','Jenis Kelamin','required'); 
			if ($this->form_validation->run()==FALSE){
				$this->load->view('template/V_header_admin.php');
				$this->load->view('admin/V_ubah_produk.php',$data);
				$this->load->view('template/footer.php');
			}else{
			   $this->M_admin->update_produk();
			   $this->session->set_flashdata('notif','<div  style="border-radius:0px; color:#fff; background-color:#008cff;" class="alert alert-primary" role="alert"> <strong>Data berhasil diubah ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			   redirect('admin/data_produk');
			}
	   }

	//HAPUS DATA PRODUK
	public function del_produk($id){
		$where=array('id_produk'=>$id);
		$this->M_admin->del_produk($where,'tbl_produk');
		$this->session->set_flashdata('notif','<div  style="border-radius:0px; color:#fff; background-color:#008cff;" class="alert alert-primary" role="alert"> <strong>Data berhasil dihapus ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('admin/data_produk');
		  }

 //ADD KONFIRM
 public function konfirm_bayar(){
	$filename = $this->upload->data('file_name');
	$data = [
		 "id_order" =>$this->input->post('id_order',true),
		 "metode_bayar" =>$this->input->post('metode',true),
		 "nama" =>$this->input->post('nama',true),
		 "tgl_bayar" =>$this->input->post('date',true),
		 "bank" =>$this->input->post('bank_pengirim',true),
		 "jumlah" =>$this->input->post('jumlah',true),
		 "foto"=>$filename];
		 $this->db->insert('tbl_konfirm', $data);
	}

public function data_order(){
	if (!$this->session->userdata('id_user'))
		 {
		 redirect('home_visitor/login');
		 }

		 $data['get'] = $this->M_admin->show_order();
		 if ($this->input->post('search')){
            $data['get']=$this->M_admin->cari_order();
		}
		 $this->load->view('template/V_header_admin');
		 $this->load->view('admin/v_data_order',$data);
		 $this->load->view('template/footer'); 
	} 

	public function detail_transaksi()
	{
		 if (!is_numeric($this->uri->segment(3))) {
		 redirect('user');
		 }

		 $table = "tbl_order o JOIN detil_order do ON (o.id_order = do.id_order) JOIN tbl_produk i ON (do.id_barang = i.id_produk)";
		 $data['get'] = $this->M_admin->get_where($table, ['o.id_order' => $this->uri->segment(3)]);
		 $this->load->view('template/V_header_admin');
		 $this->load->view('admin/V_detilorder',$data);
		 $this->load->view('template/footer'); 
	}

	public function hapus_order()
	{
		if (!is_numeric($this->uri->segment(3))) {
			redirect('home');
		}

		$table = array('tbl_order', 'detil_order');

		$this->M_admin->delete($table, ['id_order' => $this->uri->segment(3)]);
		$this->session->set_flashdata('flash','<div  style="border-radius:0px; color:#fff; background-color:#008cff;" class="alert alert-primary" role="alert"> <strong>Data berhasil dihapus ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('admin/data_order');
	}

	public function hapus_transaksi()
	{
		if (!is_numeric($this->uri->segment(3))) {
			redirect('admin');
		}

		$table = array('tbl_order', 'detil_order');

		$this->M_admin->delete($table, ['id_order' => $this->uri->segment(3)]);
		$this->session->set_flashdata('flash','<div  style="border-radius:0px; color:#fff; background-color:#008cff;" class="alert alert-primary" role="alert"> <strong>Data berhasil dihapus ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('admin/data_transaksi');
	}

	public function data_konfirm($id)
	{ 
		
		$data['get']=$this->M_admin->getdetiltransaksi($id);
		$this->form_validation->set_rules('id_order','id_order','required');
		
		if ($this->form_validation->run()==FALSE){
			$this->load->view('template/V_header_admin.php');
			$this->load->view('admin/V_data_konfirm.php',$data);
			$this->load->view('template/footer.php');
		}else{
		   $cek=$this->M_admin->update_konfirm();
		   $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert"> <strong>DATA DIPROSES ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		   redirect('admin/data_transaksi');
		}
   }
   
public function data_transaksi(){
	if (!$this->session->userdata('id_user'))
		 {
		 redirect('home_visitor/login');
		 }

		 $data['get'] = $this->M_admin->show_transaksi();
		 if ($this->input->post('search')){
            $data['get']=$this->M_admin->cari_transaksi();
		}
		 $this->load->view('template/V_header_admin');
		 $this->load->view('admin/V_transaksi',$data);
		 $this->load->view('template/footer'); 
	} 

	public function data_user(){
		if (!$this->session->userdata('id_user'))
		 {
		 redirect('home_visitor/login');
		 }

		 $data['get'] = $this->M_admin->show_user();
		 if ($this->input->post('search')){
            $data['get']=$this->M_admin->cari_user();
		}
		 $this->load->view('template/V_header_admin');
		 $this->load->view('admin/V_user',$data);
		 $this->load->view('template/footer'); 
	} 

	public function hapus_user()
	{
		if (!is_numeric($this->uri->segment(3))) {
			redirect('home');
		}

		$table =('tbl_user');
		$this->M_admin->delete($table, ['id_user' => $this->uri->segment(3)]);
		$this->session->set_flashdata('flash','<div  style="border-radius:0px; color:#fff; background-color:#008cff;" class="alert alert-primary" role="alert"> <strong>Data berhasil dihapus ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('admin/data_user');
	}
	
		public function data_admin(){
			if (!$this->session->userdata('id_user'))
				 {
				 redirect('home_visitor/login');
				 }
		
				 $data['get'] = $this->M_admin->show_admin();
				 if ($this->input->post('search')){
					$data['get']=$this->M_admin->cari_admin();
				}
				 $this->load->view('template/V_header_admin');
				 $this->load->view('admin/V_admin',$data);
				 $this->load->view('template/footer'); 
			} 
	
			public function hapus_admin()
			{
				if (!is_numeric($this->uri->segment(3))) {
					redirect('home_visitor/login');
				}
		
				$table =('tbl_user');
				$this->M_admin->delete($table, ['id_user' => $this->uri->segment(3)]);
				$this->session->set_flashdata('flash','<div  style="border-radius:0px; color:#fff; background-color:#008cff;" class="alert alert-primary" role="alert"> <strong>Data berhasil dihapus ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('admin/data_admin');
			}

			public function report()
				{
					$this->load->library('form_validation');
					//$this->cek_login();

					if ($this->input->post('submit', TRUE) == 'Submit')
					{
						$this->form_validation->set_rules('bln', 'Bulan', 'required|numeric');
						$this->form_validation->set_rules('thn', 'Tahun', 'required|numeric');

						if ($this->form_validation->run() == TRUE)
						{
							$bln = $this->input->post('bln', TRUE);
							$thn = $this->input->post('thn', TRUE);
						}

					} else {
						$bln = date('m');
						$thn = date('Y');
					}
					//YYYY-mm-dd
					//2017-04-31
					$awal = $thn.'-'.$bln.'-01';
					$akhir = $thn.'-'.$bln.'-31';

					$where = ['tgl_bayar >=' => $awal, 'tgl_bayar <=' => $akhir];

					$data['data'] = $this->M_admin->report($where);
					$data['bln'] = $bln;
					$data['thn'] = $thn;

					$this->load->view('template/V_header_admin');
				 	$this->load->view('admin/V_laporan',$data);
				 	$this->load->view('template/footer');
				}
		
				public function cetak()
				{
					//$this->cek_login();
					if (!is_numeric($this->uri->segment(3)) || !is_numeric($this->uri->segment(4)) )
					{
						redirect('admin');
					}
			
					$bln = $this->uri->segment(3);
					$thn = $this->uri->segment(4);
					$awal = $thn.'-'.$bln.'-01';
					$akhir = $thn.'-'.$bln.'-31';
			
					$where = ['tgl_bayar >=' => $awal, 'tgl_bayar <=' => $akhir];
			
					$data['data'] = $this->M_admin->report($where);
					$data['bln'] = $bln;
					$data['thn'] = $thn;
			
					$this->load->view('admin/cetak', $data);
				}

				public function profil($id)
				{ 		
				  
					// if (!is_numeric($this->uri->segment(3))) {
					//   redirect('user');
					// }
		  
				  $id= decrypt_url($id);
				  $this->load->library('user_agent');
				  $data['user']=$this->db->get_where('tbl_user',['email_user'=>$this->session->userdata('email')])->row_array();
				  $data['ip_address'] = $this->input->ip_address();
		  
				  $data['get']=$this->M_admin->getprofil($id);
				  $this->form_validation->set_rules('pass1', 'Password Baru', 'required|min_length[5]');
				  $this->form_validation->set_rules('pass2', 'Ketik Ulang Password Baru', 'required|matches[pass1]');
				  $this->form_validation->set_rules('pass3', 'Password Lama', 'required');
				  
				  if ($this->form_validation->run()==FALSE){
					$this->load->view('template/V_header_admin.php');
					$this->load->view('admin/V_profil.php',$data);
					$this->load->view('template/footer.php');
				  }else{
					$get_data = $this->M_admin->get_where_profil('tbl_user', array('id_user' => $this->session->userdata('id_user')))->row();
					if (!password_verify($this->input->post('pass3',TRUE), $get_data->password))
					{ 
					  echo '<script type="text/javascript">alert("PASSWORD LAMA YANG ANDA MASUKAN SALAH !");window.location.replace("'.base_url().'login/logout2")</script>';
		  
					} else {
					$cek=$this->M_admin->update_password2();
					$this->session->set_flashdata('notif','<div style="border-radius:0px; color:#fff; background-color:#008cff;" class="alert alert-primary" role="alert"> <strong>PASSWORD BERHASIL DIRUBAH!</strong>  silahkan login kembali dengan password baru anda! <i class="fa fa-heart-broken"></i><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('login/logout2');
				  }
				}
			  }

}
