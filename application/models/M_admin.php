<?php
     Class M_admin extends CI_Model{

     //------------------SPECECIAL FUNCTION------------------------//
     function insert($table = '', $data = '')
     {
          return $this->db->insert($table, $data);
          }

	function get_all($table)
	{
		$this->db->from($table);

		return $this->db->get();
	}

	function get_where($table = null, $where = null)
	{
		$this->db->from($table);
          $this->db->where($where);
          $this->db->order_by('tgl_order', 'DESC');
		return $this->db->get();
     }
     
     function get_where_profil($table = null, $where = null)
	{
		$this->db->from($table);
          $this->db->where($where);
		return $this->db->get();
	}

	function update($table = null, $data = null, $where = null)
	{
		return $this->db->update($table, $data, $where);
	}

	function delete($table = null, $where = null)
	{
		$this->db->where($where);
		$this->db->delete($table);
     }
     //------------------SPECECIAL FUNCTION------------------------//

     function get_all_produk(){
          $hasil=$this->db->get('tbl_produk');
          return $hasil->result();
     }

     public function show_produk(){
          $query=$this->db->get('v_produk');
          return $query->result_array();

          // $this->db->select('*');
          // $this->db->like('nama_produk');
          // $this->db->or_like('id_produk');
          // return $query=$this->db->get('v_produk',$number,$offset)->result_array();
          // $query=$this->db->get('v_produk');
          // return $query->result_array();
     }

     public function show_produk_user($number,$offset,$keyword){
          
          $this->db->select('*');
          $this->db->like('nama_produk');
          $this->db->or_like('id_produk');
          return $query=$this->db->get('v_produk',$number,$offset)->result_array();
          $query=$this->db->get('v_produk');
          return $query->result_array();
     }

     public function getwarna(){
          $query=$this->db->get('tbl_warna');
          return $query->result_array();
     }

     public function getbahan(){
     $query=$this->db->get('tbl_bahan');
     return $query->result_array();
}

        public function getukuran(){
          $query=$this->db->get('tbl_stok');
          return $query->result_array();
     }

        public function add_produk(){
          $uk = implode(",", $this->input->post('ukuran'));
          $filename = $this->upload->data('file_name');
          $data = [
               "id_produk" =>$this->input->post('',true),
               "nama_produk" =>$this->input->post('nama_produk',true),
               "ukuran" =>$uk,
               "id_warna" =>$this->input->post('warna',true),
               "id_bahan" =>$this->input->post('bahan',true),
               "qty" =>$this->input->post('qty',true),
               "berat"=>$this->input->post('berat',true),
               "harga" =>$this->input->post('harga',true),
               "deskripsi" =>$this->input->post('deskripsi',true),
               // "foto"=>$this->input->post('userfile',true)
               "foto"=>$filename];
               $this->db->insert('tbl_produk', $data);
          }

     //UBAH PRODUK
     public function getdetilproduk($id){
          $query=$this->db->get_where('tbl_produk', ['id_produk'=>$id]);
          return $query->row_Array();
      }
     
      public function getdetilproduk2($id){
          $query=$this->db->get_where('v_produk', ['id_produk'=>$id]);
          return $query->row_Array();
      }

      public function update_produk(){
          $uk = implode(",", $this->input->post('ukuran'));
          //$filename = $this->upload->data('file_name');
          $data = [
               "id_produk" =>$this->input->post('id_produk',true),
               "nama_produk" =>$this->input->post('nama_produk',true),
               "ukuran" =>$uk,
               "id_warna" =>$this->input->post('warna',true),
               "id_bahan" =>$this->input->post('bahan',true),
               "qty" =>$this->input->post('qty',true),
               "berat"=>$this->input->post('berat',true),
               "harga" =>$this->input->post('harga',true),
               "deskripsi" =>$this->input->post('deskripsi',true),
               // "foto"=>$this->input->post('userfile',true)
               "foto" =>$this->input->post('userfile',true)];

               $this->db->where('id_produk',$this->input->post('id_produk'));
               $this->db->update('tbl_produk', $data);
     }

     //HAPUS PRODUK
     function del_produk($where,$table){
          $this->db->where($where);
          $this->db->delete($table);
        }
  
        public function cari_produk(){
            $keyword=$this->input->post('search');
            $this->db->like('nama_produk',$keyword);
            $this->db->or_like('id_produk',$keyword);
            $query=$this->db->get('v_produk');
            return $query->result_array();
       }

     function add_user(){
          $data=[
			'id_role'=>1,
			'nama_user'=>htmlspecialchars($this->input->post('nama')),
			'image'=>'default.jpg',
			'email_user'=>htmlspecialchars($this->input->post('email')),
			'password'=>password_hash($this->input->post('pass1'),PASSWORD_DEFAULT),
			'tanggal_mulai'=>date("Y/m/d"),
			'aktif'=>1
               ];
			$this->db->insert('tbl_user',$data);
     }

     function add_cart(){
          $harga=$this->input->post('harga');
          $jumlah=$this->input->post('jumlah');
          $total=$harga*$jumlah;
     
          $data=[
			'id_user'=>htmlspecialchars($this->input->post('id_user')),
			'id_produk'=>htmlspecialchars($this->input->post('id_produk')),
               'ukuran' => htmlspecialchars($this->input->post('ukuran')),
               'jumlah'=>htmlspecialchars($this->input->post('jumlah')),
               'total_harga'=>$total,
               'deskripsi'=>$this->input->post('deskripsi')
               ];
               $this->db->insert('tbl_cart',$data);  
     }

     function cek_login($data){    
          /*return $this->db->get_where($table,$where);*/
           $query = $this->db->get_where('tbl_user', $data);
          return $query;
        }

        public function show_cart($id){
          $query=$this->db->get_where('v_cart', ['id_user'=>$id]);
          return $query->result_array();
      }

     //HAPUS CART
     function del_cart($where,$table){
          $this->db->where($where);
          $this->db->delete($table);
        }

     public function show_order(){
          $query=$this->db->order_by('tgl_order', 'DESC');
          $query=$this->db->get_where('v_transaksi','resi is NULL');
          return $query->result_array();
     }

     //ADD ORDER
     function add_order(){
     $uk = implode(",", $this->input->post('ukuran'));
     $data=[
          'id_user'=>htmlspecialchars($this->input->post('id_user')),
          'id_produk'=>htmlspecialchars($this->input->post('id_produk')),
          "ukuran" =>$uk,
          'jumlah'=>htmlspecialchars($this->input->post('jumlah')),
          'total_harga'=>$total,
          'deskripsi'=>$this->input->post('deskripsi')
          ];
          $this->db->insert('tbl_cart',$data);  
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

     //UPDATE KONFIRM
     public function getdetiltransaksi($id){
          $query=$this->db->get_where('tbl_konfirm', ['id_order'=>$id]);
          return $query->row_Array();
      }

     public function update_konfirm(){
          $data = [
               "id_order" =>$this->input->post('id_order',true),
               "metode_bayar" =>$this->input->post('metode_bayar',true),
               "nama" =>$this->input->post('nama',true),
               "tgl_bayar" =>$this->input->post('tgl_bayar',true),
               "bank" =>$this->input->post('bank',true),
               "jumlah"=>$this->input->post('jumlah',true),
               "foto" =>$this->input->post('foto',true),
               "resi" =>$this->input->post('resi',true)];
               $this->db->where('id_order',$this->input->post('id_order'));
               $this->db->update('tbl_konfirm', $data);
          }

     public function cari_order(){
          $keyword=$this->input->post('search');
          $this->db->like('id_order',$keyword);
          $this->db->or_like('nama_penerima',$keyword);
          $query=$this->db->get_where('v_transaksi','resi IS NULL');
          return $query->result_array();
     }

     public function show_transaksi(){
          $query=$this->db->get_where('v_transaksi','resi IS NOT NULL');
          return $query->result_array();
     }

     public function cari_transaksi(){
          $keyword=$this->input->post('search');
          $this->db->like('id_order',$keyword);
          $this->db->or_like('nama_penerima',$keyword);
          $query=$this->db->get_where('v_transaksi','resi IS NOT NULL');
          return $query->result_array();
     }

     public function show_user(){
          $query=$this->db->get_where('tbl_user','id_role=1');
          return $query->result_array();
     }

     public function cari_user(){
          $keyword=$this->input->post('search');
          $this->db->like('id_user',$keyword);
          $this->db->or_like('nama_user',$keyword);
          $query=$this->db->get_where('tbl_user','id_role=1');
          return $query->result_array();
     }

     public function show_admin(){
          $query=$this->db->get_where('tbl_user','id_role=2');
          return $query->result_array();
     }

     public function cari_admin(){
          $keyword=$this->input->post('search');
          $this->db->like('id_user',$keyword);
          $this->db->or_like('nama_user',$keyword);
          $query=$this->db->get_where('tbl_user','id_role=2');
          return $query->result_array();
     }

     public function getprofil($id){
          $query=$this->db->get_where('tbl_user', ['id_user'=>$id]);
          return $query->row_Array();
      }

     // public function update_profil(){
     //      $data = [
     //           "id_order" =>$this->input->post('id_order',true),
     //           "metode_bayar" =>$this->input->post('metode_bayar',true),
     //           "nama" =>$this->input->post('nama',true),
     //           "tgl_bayar" =>$this->input->post('tgl_bayar',true),
     //           "bank" =>$this->input->post('bank',true),
     //           "jumlah"=>$this->input->post('jumlah',true),
     //           "foto" =>$this->input->post('foto',true),
     //           "resi" =>$this->input->post('resi',true)];
     //           $this->db->where('id_order',$this->input->post('id_order'));
     //           $this->db->update('tbl_konfirm', $data);
     // }

     function report($where = '')
	{
		$this->db->select('*');
		$this->db->from('v_report');
		$this->db->where($where);
		$this->db->group_by('id_order');

		return $this->db->get();
	}

     public function show_report(){
          $query=$this->db->get('v_report');
          return $query->result_array();
     }

     public function cari_report(){
          $keyword=$this->input->post('search');
          $this->db->like('id_order',$keyword);
          $this->db->or_like('nama_penerima',$keyword);
          $query=$this->db->get_('v_report');
          return $query->result_array();
     }

     public function update_password(){
          $data = [
               "id_user" =>$this->input->post('id_user',true),
               "id_role" =>1,
               "nama_user" =>$this->input->post('nama_user',true),
               "image" =>'default.jpg',
               "email_user" =>$this->input->post('email_user',true),
               "password"=>password_hash($this->input->post('pass2'),PASSWORD_DEFAULT),
               "tanggal_mulai" =>$this->input->post('tanggal_mulai',true),
               "aktif" =>1];
               $this->db->where('id_user',$this->input->post('id_user'));
               $this->db->update('tbl_user', $data);
               //var_dump($data); die;
          }

          public function update_password2(){
               $data = [
                    "id_user" =>$this->input->post('id_user',true),
                    "id_role" =>2,
                    "nama_user" =>$this->input->post('nama_user',true),
                    "image" =>'default.jpg',
                    "email_user" =>$this->input->post('email_user',true),
                    "password"=>password_hash($this->input->post('pass2'),PASSWORD_DEFAULT),
                    "tanggal_mulai" =>$this->input->post('tanggal_mulai',true),
                    "aktif" =>1];
                    $this->db->where('id_user',$this->input->post('id_user'));
                    $this->db->update('tbl_user', $data);
                    //var_dump($data); die;
               }

	// ---------------PAGINATION------------------------//
	function jumlah_produk(){
		return $this->db->get('tbl_produk')->num_rows();
     }

     function jumlah_user(){
		return $this->db->get('tbl_user')->num_rows();
     }
  // ---------------PAGINATION------------------------//
}
?>