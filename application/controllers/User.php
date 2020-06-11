<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
    $this->load->library('template','form_validation','array','session','cart', 'Recaptcha');
    $this->load->model('M_admin');
    $this->load->helper('form','url');
          if($this->session->userdata('id_role')=="2") {
               redirect('admin');
            }
          }

          public function index(){
               //$data['user']=$this->db->get_where('tbl_user',['email_user'=>$this->session->userdata('email')])->row_array();
               $data['produk']=$this->M_admin->cari_produk();
               $this->load->view('template/V_header_user.php');
               $this->load->view('user/V_main_user.php',$data);
               $this->load->view('template/footer_user.php');
          }

          public function menu_contact(){
                $this->load->view('template/V_header_user');
                $this->load->view('template/V_contact.php');
                $this->load->view('template/footer_user.php');
          }

          public function produk(){
            $keyword=$this->input->post('search');
            //start
            $this->load->database();
            $jumlah_data = $this->M_admin->jumlah_produk();
            $this->load->library('pagination');
            $config['base_url'] = base_url().'/user/produk/';
            $config['total_rows'] = $jumlah_data;
            $config['per_page'] = 6;
            $from = $this->uri->segment(3);
        
            // Membuat Style pagination untuk BootStrap v4
              $config['first_link']       = 'First';
              $config['last_link']        = 'Last';
              $config['next_link']        = 'Next';
              $config['prev_link']        = 'Prev';
              $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
              $config['full_tag_close']   = '</ul></nav></div>';
              $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
              $config['num_tag_close']    = '</span></li>';
              $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
              $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
              $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
              $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
              $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
              $config['prev_tagl_close']  = '</span>Next</li>';
              $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
              $config['first_tagl_close'] = '</span></li>';
              $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
              $config['last_tagl_close']  = '</span></li>';
            //Tambahan untuk styling
              $this->pagination->initialize($config);
              $data['produk'] = $this->M_admin->show_produk_user($config['per_page'],$from,$keyword);
               $this->load->view('template/V_header_user.php');
               $this->load->view('user/V_produk.php',$data);
               $this->load->view('template/footer_user.php');
          }

          public function detil_produk($id){
              $id= decrypt_url($id);
              $this->load->library('user_agent');
              $data['user']=$this->db->get_where('tbl_user',['email_user'=>$this->session->userdata('email')])->row_array();
              $data['ip_address'] = $this->input->ip_address();
              $data['produk']=$this->M_admin->getdetilproduk2($id);
              $data['warna']=$this->M_admin->getwarna();
              $data['ukuran']=$this->M_admin->getukuran();
              $data['bahan']=$this->M_admin->getbahan();

              $this->load->view('template/V_header_user',$data);
              $this->load->view('user/V_detil_produk.php',$data);
              $this->load->view('template/footer_user.php');
            }

          public function add_cart(){
            //    $this->form_validation->set_rules('jumlah', 'Jumlah',  'required|trim|number');
            //    $this->form_validation->set_rules('ukuran', 'Ukuran',  'required');
            //    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim');
               
            //    if ($this->form_validation->run()){
            //         echo "BADALAAAA";
            //    }else{
            //         $data=$this->M_admin->add_cart();
            //         $this->session->set_flashdata('notif','<div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>PRODUK BERHASIL DITAMBAHKAN KE KERANJANG BELANJAAN ANDA</strong></div>');
            //         redirect('user/cart');
            //    }
            // $uk = implode(",", $this->input->post('ukuran'));
            // $harga=$this->input->post('harga');
            // $jumlah=$this->input->post('jumlah');
            // $total=$harga*$jumlah;
    
                $data_produk= array('id' => $this->input->post('id'),
                'name' => $this->input->post('nama'),
                'size' => $this->input->post('ukuran'),
                'price' => $this->input->post('harga'),
                'gambar' => $this->input->post('gambar'),
                'berat' => $this->input->post('berat'),
                'qty' =>$this->input->post('qty'));
                  
            $this->cart->insert($data_produk);
            $this->session->set_flashdata('notif','<div style="border-radius:0px; color:#fff; background-color:#008cff;" class="alert alert-primary" role="alert"> <strong>Produk berhasil ditambahkan ke keranjang belanja anda ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('user/cart');
          }

          function hapus($rowid)
          {
              if ($rowid=="all")
                  {
                      $this->cart->destroy();
                  }
              else
                  {
                      $data = array('rowid' => $rowid,
                                    'qty' =>0);
                      $this->cart->update($data);
                  }
                  $this->session->set_flashdata('notif','<div  style="border-radius:0px; color:#fff; background-color:#008cff;" class="alert alert-primary" role="alert"> <strong>Produk berhasil dihapus dari keranjang belanja anda ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                  redirect('user/cart');
          }

          function ubah_cart()
            {
            $cart_info = $_POST['cart'] ;
            foreach( $cart_info as $id => $cart)
            {
                $rowid = $cart['rowid'];
                $price = $cart['price'];
                $amount = $price * $cart['qty'];
                $qty = $cart['qty'];
                $data = array('rowid' => $rowid,
                                'price' => $price,
                                'amount' => $amount,
                                'qty' => $qty);
                $this->cart->update($data);
            }
            $this->session->set_flashdata('notif','<div style="border-radius:0px; color:#fff; background-color:#008cff;" class="alert alert-primary" role="alert"> <strong>Produk di kranjang belanja anda berhasil diubah ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('user/cart');
        }
            
          public function cart(){
               $angka1=$this->input->post('harga');
               $angka2=$this->input->post('jumlah');
              
               $data['hasil']=$angka1 * $angka2;
               $this->load->view('template/V_header_user');
               $this->load->view('user/V_cart.php',$data);
               $this->load->view('template/footer_user.php');	
          }

          public function cart2(){
            $this->load->view('template/V_header_user');
            $this->load->view('user/V_cart2.php');
            $this->load->view('template/footer_user.php');	
       }

        //HAPUS DATA PRODUK
	     public function del_cart($id){
               $where=array('id_user'=>$id);
               $this->M_admin->del_cart($where,'tbl_cart');
               $this->session->set_flashdata('notif','<div class="alert alert-primary" role="alert"> <strong>Data Berhasil dihapus! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
               redirect('user/cart');
            }

//----------------------------CECKOUT--------------------------------------------//

       public function city()
       {
          $prov = $this->input->post('prov', TRUE);
          $curl = curl_init();
    
          curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$prov",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key:b277bcce83b57bd914e9db7110ab40d9"
            ),
          ));
    
          $response = curl_exec($curl);
          $err = curl_error($curl);
    
          curl_close($curl);
    
          if ($err) {
            echo "cURL Error #:" . $err;
          } else {
             $data = json_decode($response, TRUE);
    
             echo '<option value="" selected disabled>Kota / Kabupaten</option>';
             for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
                echo '<option value="'.$data['rajaongkir']['results'][$i]['city_id'].','.$data['rajaongkir']['results'][$i]['city_name'].'">'.$data['rajaongkir']['results'][$i]['city_name'].'</option>';
             }
          }
       }


      public function getcost()
        {
          $asal = 169;
          $dest = $this->input->post('dest', TRUE);
          $kurir = $this->input->post('kurir', TRUE);
          $berat = 0;

          foreach ($this->cart->contents() as $key) {
            $berat += ($key['weight'] * $key['qty']);
          }

          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=$asal&destination=$dest&weight=$berat&courier=$kurir",
            CURLOPT_HTTPHEADER => array(
              "content-type: application/x-www-form-urlencoded",
              "key: b277bcce83b57bd914e9db7110ab40d9"
            ),
          ));

          $response = curl_exec($curl);
          $err = curl_error($curl);

          curl_close($curl);

          if ($err) {
            echo "cURL Error #:" . $err;
          } else {
            $data = json_decode($response, TRUE);

            echo '<option value="" selected disabled>Layanan yang tersedia</option>';

            for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {

              for ($l=0; $l < count($data['rajaongkir']['results'][$i]['costs']); $l++) {

                echo '<option value="'.$data['rajaongkir']['results'][$i]['costs'][$l]['cost'][0]['value'].','.$data['rajaongkir']['results'][$i]['costs'][$l]['service'].'('.$data['rajaongkir']['results'][$i]['costs'][$l]['description'].')">';
                echo $data['rajaongkir']['results'][$i]['costs'][$l]['service'].'('.$data['rajaongkir']['results'][$i]['costs'][$l]['description'].')</option>';

              }
            }
          }
        }


      function cost()
        {
          $biaya = explode(',', $this->input->post('layanan', TRUE));
          $total = $this->cart->total() + $biaya[0];
          echo $biaya[0].','.$total;
        }
   //----------------------------CECKOUT--------------------------------------------//

    //---------------CHECKOUT------------------------//
   
  public function ceckout()
    {
        if (!$this->session->userdata('id_user') || !$this->cart->contents())
		{
			redirect('home_visitor/login');
		}

		if ($this->input->post('submit', TRUE) == 'Submit')
      {
          $this->load->library('form_validation');
          $this->form_validation->set_rules('nama', 'NAMA', 'required');
          $this->form_validation->set_rules('alamat', 'ALAMAT', 'required');
          $this->form_validation->set_rules('prov', 'PROVINSI', 'required');
          $this->form_validation->set_rules('kota', 'KOTA/KABUPATEN', 'required');
          $this->form_validation->set_rules('kecamatan', 'KECAMATAN', 'required');
          $this->form_validation->set_rules('kd_post', 'KODE POST', 'required');
          $this->form_validation->set_rules('kurir', 'KURIR', 'required');
          $this->form_validation->set_rules('layanan', '  LAYANAN', 'required');
          $this->form_validation->set_rules('wa', 'NOMOR WHATSHAPP', 'required');
          $this->form_validation->set_rules('email', 'EMAIL', 'required');

         if ($this->form_validation->run() == TRUE)
         {
            $get = $this->m_ADMIN->get_where('tbl_user', ['id_user' => $this->session->userdata('uid_user')]);
            if ($get->num_rows() > 0)
            {
               //proses
               $this->load->library('email');

                $config = [
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'protocol'  => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_user' => 'prihtapambudi@gmail.com',  // Email gmail
                'smtp_pass'   => 'prihta123',  // Password gmail
                'smtp_crypto' => 'ssl',
                'smtp_port'   => 465,
                'crlf'    => "\r\n",
                'newline' => "\r\n"
              ];
	  
                $this->email->initialize($config);
                $user = $get->row();
                $id_order = time();
                $id_user =  $this->input->post('id_user', TRUE);
                $harga_total = $this->input->post('total', TRUE);
                $tgl_pesan = date("Y-m-d");
                $nama =  $this->input->post('nama', TRUE);
                $alamat = $this->input->post('alamat', TRUE);
                $provinsi = $this->input->post('prov', TRUE);
                $kota = $this->input->post('kota', TRUE);
                $kecamatan = $this->input->post('kecamatan', TRUE);
                $pos = $this->input->post('kd_post', TRUE);
                $kurir = $this->input->post('kurir', TRUE);
                $service = $this->input->post('layanan', TRUE);
                $ongkir = $this->input->post('ongkir', TRUE);
                $telfon= $this->input->post('wa', TRUE);
                //$harga_total = $this->input->post('total', TRUE);
                $email = $this->input->post('email', TRUE);
                $catatan = $this->input->post('catatan', TRUE);
                $bts = date("Y-m-d", mktime(0,0,0, date("m"), date("d") + 3, date("Y")));
                $status=1;
                $notif='RESI BELUM TERSEDIA';
                $table = '';
                $no = 1;

					foreach ($this->cart->contents() as $carts) {
						$table .= '<tr><td>'.$no++.'</td><td>'.$carts['name'].'</td><td>'.$carts['qty'].'</td><td style="text-align:right">'.number_format($carts['prize'], 0, ',', '.').'</td></tr>';
					}
               $this->email->from('prihtapambudi@gmail.com', "SUPERDIGNA");
               $this->email->to('prihta96@gmail.com');
               $this->email->subject('Pembayaran');
               $this->email->message(
                  'Terima Kasih telah melakukan pemesanan di toko kami, selanjutnya silahkan anda mentransfer uang senilai <b>Rp. '.number_format($total, 0, ',', '.').',-</b> ke no. rekening <b>90xxxx</b> paling lambat '.$bts.' agar pesanan anda bisa kami proses. Detail pembayaran sebagai berikut :<br/><br/>
                  <table border="1" style="width: 80%">
                  <tr><th>#</th><th>Nama Barang</th><th>Jumlah</th><th>Harga</th></tr>
                  '.$table.'
                  <tr><td colspan="3">Ongkos Kirim</td><td style="text-align:right">'.number_format($ongkir, 0, ',', '.').'</td></tr>
                  <tr><td colspan="3">Total</td><td style="text-align:right">'.number_format($total, 0, ',', '.').'</td></tr>
                  </table>
                  ');

               if ($this->email->send())
               {
                $data = array(
                  'id_order' => $id_order,
                  'id_user' => $id_user,
                  'total_harga' =>   $harga_total,
                  'tgl_order' =>  $tgl_pesan,
                  'nama_penerima' =>  $nama,
                  'alamat_lengkap' => $alamat,
                  'provinsi' =>  $provinsi,
                  'kota' =>  $kota,
                  'kecamatan' =>  $kecamatan,
                  'pos' => $pos,
                  'kurir' => $kurir,
                  'service' =>  $service,
                  'telfon_penerima' => $telfon,
                  'email' => $email,
                  'batas_bayar' => $bts,
                  'catatan' => $catatan,
                  'status' => $status,
                  'notif' => $notif
						);

						if ($this->M_admin->insert('tbl_order', $data)) {
							foreach ($this->cart->contents() as $key) {
								$detail = [
                  'id_order' => $id_order,
                  'id_barang' => $key['id'],
                  'jumlah_barang' => $key['qty'],
                  'ukuran' => $key['size'],
                  'harga' => $key['prize']
                ];
                var_dump($detail); die;
								$this->M_admin->insert('detil_order', $detail);
							}

							$this->cart->destroy();
							echo '<script type="text/javascript">alert("Silahkan cek email anda untuk detail pembayaran...");window.location.replace("'.base_url().'")</script>';
						}
               } else {
                  echo '<script type="text/javascript">alert("Email gagal terkirim")</script>';
               }

            } else {
               //pesan
               echo '<script type="text/javascript">alert("User tidak dikenali")</script>';
            }
            
         }
      }

		//$this->template->olshop('ceckout');
         $this->load->view('template/v_header_user');
         $this->load->view('user/v_checkout');
         $this->load->view('template/footer_user');  
       }

       public function transaksi(){

        if (!$this->session->userdata('id_user'))
          {
             redirect('home_visitor/login');
          }
          $data['get'] = $this->M_admin->get_where('tbl_order', ['id_user' => $this->session->userdata('id_user')], 'ORDER BY tgl_order DESC');
  
          $this->load->view('template/v_header_user');
          $this->load->view('user/v_transaksi',$data);
          $this->load->view('template/footer_user'); 
    } 

        public function detail_transaksi()
        {
            if (!is_numeric($this->uri->segment(3))) {
            redirect('user');
            }

            $table = "tbl_order o JOIN detil_order do ON (o.id_order = do.id_order) JOIN tbl_produk i ON (do.id_barang = i.id_produk)";
            $data['get'] = $this->M_admin->get_where($table, ['o.id_order' => $this->uri->segment(3)]);
            $this->load->view('template/V_header_user');
            $this->load->view('admin/V_detilorder',$data);
            $this->load->view('template/footer_user'); 
        }

        public function konfirm_bayar(){
          $this->form_validation->set_rules('id_order','id_order','required');
          $this->form_validation->set_rules('nama','nama','required');
          $this->form_validation->set_rules('date','Tanggal','required');
          $this->form_validation->set_rules('jumlah','jumlah','required'); 
        // $this->form_validation->set_rules('Userfile','userfile','required'); 
          //$this->form_validation->set_rules('jk','Jenis Kelamin','required'); 

          if ($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('notif','<div style="border-radius:0px; color:#fff; background-color:#da3737;"  class="alert alert-danger" role="alert"> <strong>KONFIRMASI  GAGAL! CEK KEMBALI DATA ANDA PASTIKAN ANDA MENGISI SEMUA FORM DENGAN TEPAT, PASTIKAN FORMAT DAN UKURAN FOTO BUKTI TRANSAKSI SUDAH SESUAI! <i class="fa fa-heart-broken"></i></strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                              redirect('user/transaksi');
          }else
            {
              $config['upload_path']          = './assets/images/confirm';
                      $config['allowed_types']        = 'jpeg|jpg|png';
                      $config['max_size']             = 200;
                      $config['max_width']            = 3000;
                      $config['max_height']           = 3000;
                      $this->load->library('upload', $config);
                      if (!$this->upload->do_upload('userfile'))
                          {
                              $error = array('error' => $this->upload->display_errors());
                              $this->session->set_flashdata('notif','<div style="border-radius:0px; color:#fff; background-color:#da3737;"  class="alert alert-danger" role="alert"> <strong>KONFIRMASI  GAGAL! CEK KEMBALI DATA ANDA PASTIKAN ANDA MENGISI SEMUA FORM DENGAN TEPAT, PASTIKAN FORMAT DAN UKURAN FOTO BUKTI TRANSAKSI SUDAH SESUAI! <i class="fa fa-heart-broken"></i></strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                              redirect('user/transaksi');
                  var_dump ($error);
                  }
              else{

                $this->M_admin->konfirm_bayar();
                $this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Konfirmasi berhasil dikirim!</strong> tim kami akan mengecek konfirmasi anda, setelah kami memastikan data anda, kami akan segera mengirimkan nomor resi kepada anda melalui halaman ini, Terimakasih 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('user/transaksi');
              }	
            }
    }

  public function hapus_transaksi()
	{
		if (!is_numeric($this->uri->segment(3))) {
			redirect('user');
		}

		$table = array('tbl_order', 'detil_order');
		$this->M_admin->delete($table, ['id_order' => $this->uri->segment(3)]);
		$this->session->set_flashdata('flash','<div  style="border-radius:0px; color:#fff; background-color:#008cff;" class="alert alert-primary" role="alert"> <strong>Data berhasil dihapus ! </strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('user/transaksi');
	}
    
  public function send_email(){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('nama', 'NAMA', 'required');
                $this->form_validation->set_rules('alamat', 'ALAMAT', 'required');
                $this->form_validation->set_rules('prov', 'PROVINSI', 'required');
                $this->form_validation->set_rules('kota', 'KOTA/KABUPATEN', 'required');
                $this->form_validation->set_rules('kecamatan', 'KECAMATAN', 'required');
                $this->form_validation->set_rules('kd_post', 'KODE POST', 'required');
                $this->form_validation->set_rules('kurir', 'KURIR', 'required');
                $this->form_validation->set_rules('layanan', '  LAYANAN', 'required');
                $this->form_validation->set_rules('wa', 'NOMOR WHATSHAPP', 'required');
                $this->form_validation->set_rules('email', 'EMAIL', 'required');

              if ($this->form_validation->run() == FALSE)
              { 
                $this->session->set_flashdata('notif','<div style="border-radius:0px; color:#fff; background-color:#da3737;"  class="alert alert-danger" role="alert"> <strong>CECKOUT GAGAL! CEK KEMBALI DATA ANDA PASTIKAN ANDA MENGISI SEMUA FORM DENGAN TEPAT <i class="fa fa-heart-broken"></i></strong> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('checkout');  
              }else{
                $id_order = time();
                $id_user =  $this->input->post('id_user', TRUE);
                $harga_total = $this->input->post('total', TRUE);
                $tgl_pesan = date("Y-m-d");
                $nama =  $this->input->post('nama', TRUE);
                $alamat = $this->input->post('alamat', TRUE);
                $provinsi = $this->input->post('prov', TRUE);
                $kota = $this->input->post('kota', TRUE);
                $kecamatan = $this->input->post('kecamatan', TRUE);
                $pos = $this->input->post('kd_post', TRUE);
                $kurir = $this->input->post('kurir', TRUE);
                $service = $this->input->post('layanan', TRUE);
                $ongkir = $this->input->post('ongkir', TRUE);
                $telfon= $this->input->post('wa', TRUE);
                //$harga_total = $this->input->post('total', TRUE);
                $email = $this->input->post('email', TRUE);
                $catatan = $this->input->post('catatan', TRUE);
                $bts = date("Y-m-d", mktime(0,0,0, date("m"), date("d") + 3, date("Y")));
                $status='BELUM DIPROSES';
                $table = '';
                $no = 1;

                  $data = array(
                  'id_order' => $id_order,
                  'id_user' => $id_user,
                  'total_harga' =>   $harga_total,
                  'tgl_order' =>  $tgl_pesan,
                  'nama_penerima' =>  $nama,
                  'alamat_lengkap' => $alamat,
                  'provinsi' =>  $provinsi,
                  'kota' =>  $kota,
                  'kecamatan' =>  $kecamatan,
                  'pos' => $pos,
                  'kurir' => $kurir,
                  'service' =>  $service,
                  'ongkir' =>  $ongkir,
                  'telfon_penerima' => $telfon,
                  'email' => $email,
                  'batas_bayar' => $bts,
                  'catatan' => $catatan,
                  'status' => $status
              );

                  if ($this->M_admin->insert('tbl_order', $data)) {
                    foreach ($this->cart->contents() as $key) {
                      $detail = [
                        'id_order' => $id_order,
                        'id_barang' => $key['id'],
                        'ukuran' => $key['size'],
                        'jumlah_barang' => $key['qty'],
                        'harga' => $key['subtotal']
                      ];
                      $this->M_admin->insert('detil_order', $detail);
                    }
                    $this->cart->destroy();
                    $this->session->set_flashdata('notif','<div class="alert alert-primary alert-dismissible fade show" role="alert">
                      <strong><i class="fa fa-smile"></i> Kamu sudah checkout,</strong> segera lakukan pembayaran dan konfirmasi bayar agar pesanan anda dapat segera kami proses !
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>');
                      redirect('user/transaksi');  
                  }
              }
            } 
               
      //---------------CHECKOUT------------------------//

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
          $this->load->view('template/V_header_user.php');
          $this->load->view('user/V_profil.php',$data);
          $this->load->view('template/footer_user.php');
        }else{
          $get_data = $this->M_admin->get_where_profil('tbl_user', array('id_user' => $this->session->userdata('id_user')))->row();
          if (!password_verify($this->input->post('pass3',TRUE), $get_data->password))
          { 
            echo '<script type="text/javascript">alert("PASSWORD LAMA YANG ANDA MASUKAN SALAH !");window.location.replace("'.base_url().'login/logout2")</script>';

          } else {
          $cek=$this->M_admin->update_password();
          $this->session->set_flashdata('notif','<div style="border-radius:0px; color:#fff; background-color:#008cff;" class="alert alert-primary" role="alert"> <strong>PASSWORD BERHASIL DIRUBAH!</strong>  silahkan login kembali dengan password baru anda! <i class="fa fa-heart-broken"></i><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
          redirect('login/logout2');
        }
      }
    }

    // public function password()
    //   {
    //     if ($this->input->post('submit', TRUE) == 'Submit')
    //     {
    //       $this->load->library('form_validation');
    //       //validasi form

    //       $this->form_validation->set_rules('pass1', 'Password Baru', 'required|min_length[5]');
    //       $this->form_validation->set_rules('pass2', 'Ketik Ulang Password Baru', 'required|matches[pass1]');
    //       $this->form_validation->set_rules('pass3', 'Password Lama', 'required');

    //       if ($this->form_validation->run() == TRUE)
    //       {
    //         $get_data = $this->app->get_where('tbl_user', array('id_user' => $this->session->userdata('id_user')))->row();

    //         if (!password_verify($this->input->post('pass3',TRUE), $get_data->password))
    //         {
    //           echo '<script type="text/javascript">alert("PASSWORD LAMA YANG ANDA MASUKAN SALAH !");window.location.replace("'.base_url().'home/logout")</script>';

    //         } else {

    //           $pass = $this->input->post('pass1', TRUE);
    //           $data['password'] = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);
    //           $cond = array('id_user' => $this->session->userdata('id_user'));

    //           $this->M_admin->update('tbl_user', $data, $cond);
    //           redirect('home/logout');
    //         }
    //       }
    //     }
        
    //     $this->load->view('template/V_header_user.php');
    //     $this->load->view('user/V_profil.php');
    //     $this->load->view('template/footer.php');
    //   }

}

     