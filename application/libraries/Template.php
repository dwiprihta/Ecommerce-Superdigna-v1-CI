<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
   function __construct()
   {
      $this->ci =&get_instance();
   }

   function admin($template, $data='')
   {
      // $data['content'] = $this->ci->load->view($template, $data, TRUE);
      // $data['nav']  = $this->ci->load->view('admin/nav', $data, TRUE);
      // $this->ci->load->view('admin/dashboard', $data);
   }

   function olshop($template, $data='')
   {
     // $this->ci->load->model('app');

      //$data['kategori'] = $this->ci->app->get_all('t_kategori');
      $data['content'] = $this->ci->load->view($template, $data, TRUE);

      $this->ci->load->view('index', $data);

   }
}

