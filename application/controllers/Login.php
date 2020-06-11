<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller{
 
	public function __construct(){
			parent::__construct();
			$this->load->model('M_admin');
			$this->load->library('form_validation','array','session');
			$this->load->helper('form','url');		
			}
			  
		function login(){
			$this->form_validation->set_rules('email', 'Email',  'required|trim|valid_email');
			$this->form_validation->set_rules('pass', 'Password',  'required|trim|min_length[3]');
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
							$this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong></strong> Password salah !</div>');
							redirect('home_visitor/login');
							}
		
						}else{
						$this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong></strong> Email belum diaktivasi !</div>');
						redirect('home_visitor/login');	
						}
				}else{
					$this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong></strong> Username atau password anda salah !</div>');
					redirect('home_visitor/login');	
				}
			}
			public function logout(){
				$this->session->unset_userdata('status');
				$this->session->unset_userdata('id_user');
				$this->session->unset_userdata('nama_user');
				$this->session->unset_userdata('email');
				$this->session->unset_userdata('role_id');
				$this->session->sess_destroy();
				redirect('user');
		   }  

		   public function logout2(){
			$this->session->unset_userdata('status');
			$this->session->unset_userdata('id_user');
			$this->session->unset_userdata('nama_user');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('role_id');
			$this->session->sess_destroy();
			redirect('home_visitor/login');
	   }  
	}

