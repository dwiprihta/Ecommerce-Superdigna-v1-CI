<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_visitor extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->library('form_validation','array');
		$this->load->helper('form','url');

		if($this->session->userdata('status')=="login") {
               redirect('user');
		  }
		}
		
	public function index(){
        $data['produk']=$this->M_admin->show_produk();
        if ($this->input->post('search')){
            $data['produk']=$this->M_admin->cari_produk();
		}
		$this->load->view('template/V_header_visitor.php');
		$this->load->view('visitor/V_main_visitor.php',$data);
		$this->load->view('template/footer.php');
    }

	public function menu_contact(){
		$this->load->view('template/V_header_visitor');
		$this->load->view('template/V_contact.php');
		$this->load->view('template/footer.php');
	}

	public function produk(){
		$data['produk']=$this->M_admin->show_produk();
		$this->load->view('template/V_header_visitor.php');
		$this->load->view('visitor/V_produk.php',$data);
		$this->load->view('template/footer.php');
	}

	public function detil_produk($id){
			$this->load->library('user_agent');
			$data['ip_address'] = $this->input->ip_address();
			$data['produk']=$this->M_admin->getdetilproduk2($id);
			$data['warna']=$this->M_admin->getwarna();
			$data['ukuran']=$this->M_admin->getukuran();
			$data['bahan']=$this->M_admin->getbahan();

			$this->load->view('template/V_header_visitor');
			$this->load->view('visitor/V_detil_produk.php',$data);
			$this->load->view('template/footer.php');
	}

	public function register(){
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email',  'required|trim|valid_email|is_unique[tbl_user.email_user]');
		$this->form_validation->set_rules('pass1', 'Password',  'required|trim|min_length[5]|matches[pass2]');
		$this->form_validation->set_rules('pass2', 'Password',  'required|trim|min_length[5]|matches[pass1]');
		if ($this->form_validation->run()==false){
		$this->load->view('template/V_register.php'); 	
		}else{
			$this->M_admin->add_user();
			$this->session->set_flashdata('notif','<div style="border-radius:5px; color:#fff; background-color:#008cff;" class="alert alert-primary alert-dismissible fade show" role="alert"><strong><i class="fa fa-check"></i> Selamat!</strong> Akun selesai dibuat</div>');
			redirect('home_visitor/login');		
		}
	}

	function login(){
			$this->form_validation->set_rules('email', 'Email',  'required|trim|valid_email');
			$this->form_validation->set_rules('pass', 'Password',  'required|trim|min_length[5]');
			if ($this->form_validation->run()==false){
			$this->load->view('template/V_login.php'); 	
		}else{
			$this->_login();
		}
	}
		
	 function _login(){
	    $email = $this->input->post('email');
	    $password = $this->input->post('pass');

	    $user=$this->db->get_where('tbl_user', ['email_user'=>$email])->row_array();
	    	if ($user){
			    if($user['aktif']==1){
				    if (password_verify($password,$user['password'])){
					    $data=[
						    'email'=>$user['email_user'],
							'id_role'=>$user['id_role'],
							'id_user'=>$user['id_user'],
							'nama_user'=>$user['nama_user'],
							'status' => "login"
					    ];
						$this->session->set_userdata($data);
						if ($data['id_role']==1){
							redirect('user');
						}else{
							redirect('admin');
						}
				    }else{
					$this->session->set_flashdata('notif','<div style="border-radius:5px; color:#fff; background-color:#da3737;" class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fa fa-exclamation-triangle"></i> Password salah !</div>');
					redirect('home_visitor/login');
				    }

			    }else{
				$this->session->set_flashdata('notif','<div style="border-radius:5px; color:#fff; background-color:#da3737;" class="alert alert-danger alert-dismissible fade show" role="alert"><strong></strong><i class="fa fa-exclamation-triangle"></i> Email belum diaktivasi !</div>');
				redirect('home_visitor/login');	
			    }
		}else{
			$this->session->set_flashdata('notif','<div style="border-radius:5px; color:#fff; background-color:#da3737;" class="alert alert-danger alert-dismissible fade show" role="alert"><strong></strong><i class="fa fa-exclamation-triangle"></i> Username atau password anda salah !</div>');
			redirect('home_visitor/login');	
		}
	}
		
}
