<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eror extends CI_Controller {

	public function __construct(){
		parent::__construct();
          $this->load->helper('form','url');
         
     }    
          public function index(){
            $this->load->view('template/404.php');
           }
}
?>