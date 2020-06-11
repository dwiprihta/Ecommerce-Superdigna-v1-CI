<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'cart'));
		//$this->load->model('app');
	}


          public function index()
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
                    $get = $this->M_admin->get_where('tbl_user', ['id_user' => $this->session->userdata('id_user')]);
        
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
                    $table .= '<tr><td>'.$no++.'</td><td>'.$carts['name'].'</td><td>'.$carts['qty'].'</td><td style="text-align:right">'.number_format($carts['subtotal'], 0, ',', '.').'</td></tr>';
                  }
        
                       $this->email->from('prihtapambudi@gmail.com', "Olshopku");
                       $this->email->to($user->email);
                       $this->email->subject('Pembayaran');
                       $this->email->message(
                          'Terima Kasih telah melakukan pemesanan di toko kami, selanjutnya silahkan anda mentransfer uang senilai <b>Rp. '.number_format($total, 0, ',', '.').',-</b> ke no. rekening <b>90xxxx</b> paling lambat '.$bts.' agar pesanan anda bisa kami proses. Detail pembayaran sebagai berikut :<br/><br/>
                    <table border="1" style="width: 80%">
                    <tr><th>#</th><th>Nama Barang</th><th>Jumlah</th><th>Harga</th></tr>
                    '.$table.'
                    <tr><td colspan="3">Ongkos Kirim</td><td style="text-align:right">'.number_format($ongkir, 0, ',', '.').'</td></tr>
                    <tr><td colspan="3">Total</td><td style="text-align:right">'.number_format($total, 0, ',', '.').'</td></tr>
                    </table>
                    '
                       );
        
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
                          'harga' => $key['prize']
                        ];
        
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
        
            $this->template->olshop('checkout');
        
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
 $cart=$this->cart->contents();
 var_dump($cart);
 foreach ($this->cart->contents() as $key) {
   $berat += ($key['berat'] * $key['qty']);
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

   echo '<option value="" selected disabled>Layanan yang tersedia</option>';

   for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {

     for ($l=0; $l < count($data['rajaongkir']['results'][$i]['costs']); $l++) {

       echo '<option value="'.$data['rajaongkir']['results'][$i]['costs'][$l]['cost'][0]['value'].','.$data['rajaongkir']['results'][$i]['costs'][$l]['service'].'('.$data['rajaongkir']['results'][$i]['costs'][$l]['description'].')">';
       echo $data['rajaongkir']['results'][$i]['costs'][$l]['service'].'('.$data['rajaongkir']['results'][$i]['costs'][$l]['description'].')</option>';

     }
   }
 }
}

public function cost()
  {
  $biaya = explode(',', $this->input->post('layanan', TRUE));
  $total = $this->cart->total() + $biaya[0];
  echo $biaya[0].','.$total;
  }
}
   //----------------------------CECKOUT--------------------------------------------//
      

     