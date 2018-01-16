<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
 function __construct() 
	
	{
		parent::__construct();
		//$this->is_logged_in();
		$this->load->library("session");
		$this->load->helper(array('url', 'form', 'date', 'html'));
		$this->load->model(array('pengguna_model', 'admin_model'));
		$this->load->library('cart');
		//session_start();
		}



function is_logged_in() {
  $is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
   redirect('admin_login');
   die(); 
   
  } 
 } 
	
function beranda(){
$is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
  ?>
  <script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
				</script>
				<?php
 echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
   die(); 
   
  } 
	$data['content'] = ('admin/beranda');
	$data['title'] = "ADMIN | Login";
	$this->load->view('admin/halaman',$data);
}

	
function links($page){
		$data['content'] = $page;
		$data['title'] = "JuraganIkan - ADMIN";
		$this->load->view('admin/halaman', $data); 
	}
	

	
	
//------------------------------P R O D U K / K A T E G O R I----------------------------------------------------------
function produk(){
$is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
  ?>
  <script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
				</script>
				<?php
 echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
   die(); 
   
  } 
		$data['content'] = 'admin/produk';
		$data['title'] = 'Daftar Data Produk';
		$data['query'] = $this->admin_model->ambil_produk();
		$this->load->view('admin/halaman', $data);
	}

function produk_add(){
$is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
  ?>
  <script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
				</script>
				<?php
 echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
   die();

  }
	$data['title'] = "Tambah Data Kategori";
	$data['content'] = 'admin/produk_add';
	$this->load->library('form_validation');
	if($this->input->post('submit')){
		$this->form_validation->set_rules('nama_produk','Nama produk','required');
		if ($this->form_validation->run() == FALSE){
         	$this->load->view('admin/halaman',$data);
        }else{
		$this->admin_model->produk_simpan();
		$this->session->set_flashdata('message', 'Kategori Sudah Ada !');
		$this->load->view('admin/halaman',$data);
		}	
	}else{	
		$this->load->view('admin/halaman', $data);		
	}}
	
function produk_del($id_produk){
	  $this->load->model('admin_model');
	  $this->admin_model->produk_del($id_produk);
	  redirect('index.php/admin/produk');
	 }
function produk_edit($id_produk) {
$is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
  ?>
  <script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
				</script>
				<?php
 echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
   die(); 
   
  } 
	 $data['content'] = 'admin/produk_edit';
	 $data['title'] = 'Ubah Data Kategori';
	 $data['edit']=$this->admin_model->produk_edit($id_produk);
	 $this->load->library('form_validation');
	 if($this->input->post('submit')){
		$this->form_validation->set_rules('nama_produk','Nama produk','required');
		if ($this->form_validation->run() == FALSE){
         	$this->load->view('admin/halaman',$data); 
        }else{
		$id_produk = $this->input->post('id_produk');
		$nama_produk = $this->input->post('nama_produk');
		$this->admin_model->produk_edit_exe($id_produk, $nama_produk);
		redirect('admin/produk');
		}	
	} else{$this->load->view('admin/halaman', $data);
	 }}

//----------------------------------------------------------BARANG------------------------------------	
function barang() {
$is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
  ?>
  <script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
				</script>
				<?php
 echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
   die(); 
   
  } 
	$data['content'] = 'admin/barang';
	$data['title'] = 'Daftar Data Barang';
	$this->load->model('admin_model');
	$data['data'] = $this->admin_model->ambil_barang();
	$this->load->view('admin/halaman', $data);
	}
	
function barang_add(){
$is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
  ?>
  <script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
				</script>
				<?php
 echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
   die(); 
   
  } 
		$data['content'] = 'admin/barang_add';
		$data['title'] = "Tambah Data Barang";
		$data['query'] = $this->admin_model->ambil_produk();
		$this->load->view('admin/halaman', $data);
	}	
	
function barang_add_exe(){
	$data['content']='admin/barang_add';
	$data['title'] = "Tambah data barang";
	$this->load->library('form_validation');
	$rules = array( array('field' => 'nama_barang', 'label' => 'Nama Barang', 'rules' => 'required'),
					array('field' => 'harga', 'label' => 'Harga', 'rules' => 'required'),
					array('field' => 'stok', 'label' => 'Stok', 'rules' => 'required'),
					array('field' => 'keterangan', 'label' => 'Keterangan', 'rules' => 'required'),
					);
	$this->form_validation->set_rules($rules);
	if ($this->form_validation->run() == FALSE) {
			$data['query'] = $this->admin_model->ambil_produk();
			$this->load->view('admin/halaman',$data); 
    }else{ 
		$config['upload_path'] = './images';
		$filename = $this->input->post('nama_barang');
		$config['file_name'] = $filename;
		$config['overwrite'] = false;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '3000';
		$field_name='gambar';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload($field_name)){
			$this->session->set_flashdata('message', 'Gambar belum diupload');
			$data['query'] = $this->admin_model->ambil_produk();
			$this->load->view('admin/halaman',$data); 
		} else{
			$image_data = $this->upload->data();
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
			$this->load->library('image_lib', $config);
			 if(!$this->image_lib->resize()){
    echo $this->image_lib->display_errors();
  }
	
$data = array();
  $data['nama_barang'] = $this->input->post('nama_barang');
  $data['id_produk'] = $this->input->post('id_produk');
  $data['gambar'] = $image_data['file_name'];
  $data['harga'] = $this->input->post('harga');
  $data['stok'] = $this->input->post('stok');
  $data['keterangan'] = $this->input->post('keterangan');
  $data['tgl'] = $this->input->post('tgl'); 
  $data['sts'] = "1"; 
  $this->admin_model->barang_simpan($data); 
$this->session->set_flashdata('message', 'insert data sukses');  
  redirect('admin/barang');
	}}
}

function barang_del($id_barang){
	  $this->load->model('admin_model');
	  $this->admin_model->barang_del($id_barang);
	  redirect('admin/barang');
	 }
	 
function barang_edit($id_barang) {
$is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
  ?>
  <script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
				</script>
				<?php
 echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
   die(); 
   
  } 
	 $data['content'] = 'admin/barang_edit';
	 $data['title'] = 'Update Data Barang';
	// $this->load->model('admin_model');
	 $data['query'] = $this->admin_model->ambil_produk();
	 $data['edit']=$this->admin_model->barang_edit($id_barang);
	 $this->load->view('admin/halaman', $data);
	 }
	 
function barang_edit_exe() {
	$data['content']='admin/barang_edit';
	$data['title'] = "Ubah data barang";
	$this->load->library('form_validation');
	$rules = array( array('field' => 'nama_barang', 'label' => 'Nama Barang', 'rules' => 'required'),
					array('field' => 'harga', 'label' => 'Harga', 'rules' => 'required'),
					array('field' => 'stok', 'label' => 'Stok', 'rules' => 'required'),
					array('field' => 'keterangan', 'label' => 'Keterangan', 'rules' => 'required'),
					//array('field' => 'gambar', 'label' => 'Gambar', 'rules' => 'required'),
					array('field' => 'id_produk', 'label' => 'Jenis Barang', 'rules' => 'required'),
					);
	$this->form_validation->set_rules($rules);
	if ($this->form_validation->run() == FALSE) {
			// $data['query'] = $this->admin_model->ambil_produk();
		$id_barang = $this->input->post('id_barang');
		$nama_barang = $this->input->post('nama_barang'); 
	$this->session->set_flashdata('message', 'Penyimpanan Gagal');
	 redirect("admin/barang_edit/$id_barang"); 
        }
    else{

	 $id_barang = $this->input->post('id_barang');
	 $nama_barang = $this->input->post('nama_barang'); 
	 $id_produk = $this->input->post('id_produk');  
	 $harga = $this->input->post('harga'); 
	 $stok = $this->input->post('stok');
	 $keterangan = $this->input->post('keterangan');
	 $data['title'] = 'Ubah Data Barang';  
	 $this->load->model('admin_model');
	 $data['edit']=$this->admin_model->barang_edit_exe($id_barang, $nama_barang, $id_produk, $harga, $stok, $keterangan );
	 $this->session->set_flashdata('message', "$nama_barang berhasil diubah");
	 redirect('admin/barang');
	 }
	 }
function gaklaku(){
$is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
  ?>
  <script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
				</script>
				<?php
 echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
   die(); 
   
  } 
	$data['content'] = 'admin/barang';
	$data['title'] = 'Barang Belum Terjual';
	$data['data'] = $this->admin_model->barang_gaklaku();
	$this->load->view('admin/halaman', $data);
}
//--------------------------------------BUKU TAMU----------------------------------------------------------------------------------
function bukutamu() {
$is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
  ?>
  <script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
				</script>
				<?php
 echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
   die(); 
   
  }
	$data['content'] = 'admin/bukutamu';
	$data['title'] = 'Daftar Buku Tamu';
	$data['query'] = $this->admin_model->ambil_bukutamu();
	$this->load->view('admin/halaman', $data);
	}
function bukutamu_del($id_bukutamu){
	  $this->admin_model->bukutamu_del($id_bukutamu);
	  redirect('admin/bukutamu');
	 }
function bukutamu_tampil($id_bukutamu){
$is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
  ?>
  <script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
				</script>
				<?php
 echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
   die(); 
   
  }
	  $this->admin_model->bukutamu_tampil($id_bukutamu);
	  redirect('admin/bukutamu');
	 }

//---------------------------------------------------Pesanan---------------------------------------------------------------
function pesanan(){
	$is_logged_in = $this->session->userdata('is_logged_in');
	if(!isset($is_logged_in) || $is_logged_in != true){ 
		?><script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
		</script><?php
		echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
	die(); 
   }
		$data['content'] = 'admin/pesanan';
		$data['title'] = 'Daftar Pesanan';
		$data['data'] = $this->admin_model->pesanan(); 
	 // $data['total'] = $jml->num_rows();
		$this->load->view('admin/halaman', $data);
}

function detail_pesanan($id_pesanan){
	$is_logged_in = $this->session->userdata('is_logged_in');
	if(!isset($is_logged_in) || $is_logged_in != true){ 
		?><script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
		</script><?php
		echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
	die(); 
   }
	$data ['content']='admin/pesanan_detail';
	$data ['title']='Detail Pesanan';
	$data['data'] = $this->admin_model->detail_pesanan($id_pesanan);
	$data['barang'] = $this->admin_model->barang_pesanan($id_pesanan);
	$this->load->view('admin/halaman', $data);
}
function diterima($id_pesanan){
	$is_logged_in = $this->session->userdata('is_logged_in');
	if(!isset($is_logged_in) || $is_logged_in != true){ 
		?><script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
		</script><?php
		echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
	die(); 
   }
	$this->admin_model->diterima($id_pesanan);
	redirect("admin/detail_pesanan/$id_pesanan");
}
//---------------------------------------------------ongkos---------------------------------------------------------------
function ongkos() {
	$is_logged_in = $this->session->userdata('is_logged_in');
	if(!isset($is_logged_in) || $is_logged_in != true){ 
		?><script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
		</script><?php
		echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
	die(); 
   }
	$data['content'] = 'admin/ongkos';
	$data['title'] = 'Daftar Ongkos Kirim';
	$this->load->model('admin_model');
  $data['data'] = $this->admin_model->ongkos();
  $this->load->view('admin/halaman', $data);
	}
function ongkos_edit($kota_id) {
		 $data['content'] = 'admin/ongkos_edit';
		 $data['title'] = 'Ubah Data Kategori';
		 $this->load->model('admin_model');
		 $data['edit']=$this->admin_model->ongkos_edit($kota_id);
		 $this->load->view('admin/halaman', $data);
	 } 
function ongkos_edit_exe() {
		 $kota_id = $this->input->post('kota_id');
		 $tarif = $this->input->post('tarif');
		 $data['title'] = 'Ubah Data Kategori';
		 $data['edit'] = $this->admin_model->ongkos_edit_exe($kota_id, $tarif);
		redirect('admin/ongkos');
	 }

//---------------------------------------------------------------daftar user---------------------------------------------
function user(){
$is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
  ?>
  <script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
				</script>
				<?php
 echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
   die(); 
   
  }
	$data['content'] = 'admin/user';
	$data['title'] = 'Daftar Pelanggan';
	$data['data'] = $this->admin_model->user(); 
	$this->load->view('admin/halaman', $data);
}

function user_pesanan($id_user){
$is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
  ?>
  <script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
				</script>
				<?php
 echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
   die(); 
   
  }
	$data['content'] = 'admin/user_pesanan';
	$data['title'] = 'Pesanan Pelanggan';
	$data['data'] = $this->admin_model->pesanan_akun($id_user); 
	$data['nama'] = $this->admin_model->nama_akun($id_user); 
	$this->load->view('admin/halaman', $data);
}
//-----------------------------------------------------------------------alamat---------------------------------------------
function alamat_user($id_user){
$is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
  ?>
  <script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
				</script>
				<?php
 echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
   die(); 
   
  }
	$data['content'] = 'admin/user_alamat';
	$data['title'] = 'Pesanan Pelanggan';
	$data['nama'] = $this->admin_model->nama_akun($id_user); 
	$data['data'] = $this->admin_model->alamat_user($id_user); 
	$this->load->view('admin/halaman', $data);
}
//-----------------------------------------------------------------------Komentar---------------------------------------------
function komentar(){
$is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
  ?>
  <script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
				</script>
				<?php
 echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
   die(); 
   
  }
	$data['content'] = 'admin/komentar';
	$data['title'] = 'Daftar Komentar Barang';
	$this->load->model('admin_model');
	$data['data'] = $this->admin_model->komentar(); 
  //$data['total'] = $tot_hal->num_rows();
	$this->load->view('admin/halaman', $data);
}
function komentar_det($id_barang){
$is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
  ?>
  <script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
				</script>
				<?php
 echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
   die(); 
   
  }
	$data['content'] = 'admin/komentar_detail';
	$data['title'] = 'Daftar Komentar';
	$this->load->model('pengguna_model');
	$data['barang'] = $this->pengguna_model->detail_barang($id_barang);
	$data['komentar'] = $this->pengguna_model->ambil_komentar($id_barang);
	$this->load->model('admin_model');	
	$this->load->view('admin/halaman', $data);
}
function komentar_add_exe(){
		$this->load->library('form_validation');
		$this->load->model('pengguna_model');
		$id_barang = $this->input->post('id_barang');
		$rules = array( array('field' => 'komentar', 'label' => 'Komentar', 'rules' => 'required'));
        $this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {	
			redirect("admin/komentar/$id_barang");
        }	else{ //sukses
			$data['barang'] = $this->pengguna_model->detail_barang($id_barang);
			$data['komentar'] = $this->pengguna_model->ambil_komentar($id_barang);
			$this->pengguna_model->komentar_simpan();			
			redirect("admin/komentar/$id_barang");
        }
	}
function komentar_del($id_komentar){
	$this->load->model('admin_model');
	$this->admin_model->komentar_del($id_komentar);
	  redirect("admin/komentar/");
	}
//----------------------------------------------------------------pengiriman--------------------------------------------------
function jasa_kirim(){
$is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
  ?>
  <script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
				</script>
				<?php
 echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
   die(); 
   
  }
	$data['content']='admin/jasa_kirim';
	$data['title']='Jasa pengiriman';
	$data['jasa']=$this->admin_model->jasa();
	$this->load->view('admin/halaman',$data);
}
function pengiriman(){
$is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
  ?>
  <script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
				</script>
				<?php
 echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
   die(); 
   
  }
	$data['content'] = 'admin/pengiriman';
	$data['title'] = 'Data Pengiriman Pesanan';
	$data['pengiriman'] = $this->admin_model->pengiriman(); 
	$this->load->view('admin/halaman', $data);
}
function pengiriman_add(){
$is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
  ?>
  <script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
				</script>
				<?php
 echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
   die(); 
   
  }
	$data['content'] = 'admin/pengiriman_add';
	$data['title'] = 'Tambah Data Pengiriman';
	$data['data'] = $this->admin_model->detail_pesanan($id_pesanan);
	$this->load->view('admin/halaman', $data);
}
function resi_add($id_pesanan){
$is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
  ?>
  <script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
				</script>
				<?php
 echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
   die(); 
   
  }
	$data['content'] = 'admin/pengiriman_add';
	$data['title'] = 'Tambah Data Pengiriman';
	$data['data'] = $this->admin_model->detail_pesanan($id_pesanan);
	$data['jasa'] = $this->admin_model->jasa();
	$this->load->view('admin/halaman', $data);
	
}
function pengiriman_exe(){
		$id_pesanan= $this->input->post('id_pesanan');
		$data['content']='admin/pengiriman_add';
		$data['title'] = "Data Pengiriman";
		$this->load->library('form_validation');
		$rules = array( array('field' => 'resi', 'label' => 'Nomer Resi', 'rules' => 'required'),
						array('field' => 'tgl_kirim', 'label' => 'Tanggal Pengiriman', 'rules' => 'required'),
						array('field' => 'jasa', 'label' => 'Jasa Pengiriman', 'rules' => 'required'));
        $this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {	
		//$this->load->view("admin/resi_add/$id_pesanan", $data);
			//redirect("admin/resi_add/");
		redirect("admin/resi_add/$id_pesanan");
        }	else{ //sukses
			$this->admin_model->resi_simpan();			
			redirect("admin/detail_pesanan/$id_pesanan");
        }
		
	}
	
function transaksi(){
$is_logged_in = $this->session->userdata('is_logged_in');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
  ?>
  <script type = "text/javascript" language = "javascript">
				alert("Anda tidak berhak masuk ke halaman ini !!!");
				</script>
				<?php
 echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin_login'>";
   die(); 
   
  }
	$data['content'] = 'admin/transaksi';
	$data['title'] = 'Transaksi';
	if($this->input->post('submit')){
		$tanggal=$this->input->post('tanggal');
		$dari=$this->input->post('dari');
		$sampai=$this->input->post('sampai');
		//$data['data']=$this->admin_model->penjualan_per($tanggal,$dari,$sampai);
		$data['data']=$this->admin_model->penjualan_per($dari,$sampai);
		$data['rp'] = $this->admin_model->penjualan_rp_per($dari,$sampai);
		$this->load->view('admin/halaman', $data);
	}else {
		//$data['data'] = $this->admin_model->penjualan(); 
		$data['data'] = $this->admin_model->penjualan_barang(); 
		$data['rp'] = $this->admin_model->penjualan_rp();
		$this->load->view('admin/halaman', $data);
	}
}

function penjualan_cetak(){
	$data['content'] = 'admin/penjualan_cetak';
	$data['title'] = 'Cetak Transaksi';
	if($this->input->post('submit')){
		$tanggal=$this->input->post('tanggal');
		$dari=$this->input->post('dari');
		$sampai=$this->input->post('sampai');
		$data['data']=$this->admin_model->penjualan_per($tanggal,$dari,$sampai);
		$data['rp'] = $this->admin_model->penjualan_rp_per($tanggal,$dari,$sampai);
		$this->load->view('admin/penjualan_cetak', $data);
		
	}else {
		$data['data'] = $this->admin_model->penjualan_barang(); 
		$data['rp'] = $this->admin_model->penjualan_rp();
		$this->load->view('admin/penjualan_cetak', $data);
	}
}

function penjualan_excel(){
		$data['data'] = $this->admin_model->penjualan_barang(); 
		$data['rp'] = $this->admin_model->penjualan_rp();
		$this->load->view('admin/penjualan_excel', $data);
		
	/* 	$this->load->library('PHPExcel');
		$objPHPExcel = new PHPExcel();

//create column
$objPHPExcel->getActiveSheet()->setCellValue('A2', 'No');
$objPHPExcel->getActiveSheet()->setCellValue('B2', 'Nama');
$objPHPExcel->getActiveSheet()->setCellValue('C2', 'Alamat');
$objPHPExcel->getActiveSheet()->setCellValue('D2', 'Email');

//make a border column
$objPHPExcel->getActiveSheet()->getStyle('A2:D2')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

//create data per row
$objPHPExcel->getActiveSheet()->setCellValue('A3', '1');
$objPHPExcel->getActiveSheet()->setCellValue('B3', 'Ikhwan');
$objPHPExcel->getActiveSheet()->setCellValue('C3', 'Yogyakarta');
$objPHPExcel->getActiveSheet()->setCellValue('D3', 'ikhwan@mail.com');

//create data per row
$objPHPExcel->getActiveSheet()->setCellValue('A4', '2');
$objPHPExcel->getActiveSheet()->setCellValue('B4', 'Insan');
$objPHPExcel->getActiveSheet()->setCellValue('C4', '<a class="zem_slink" title="Lombok" href="http://maps.google.com/maps?ll=-8.565,116.351&spn=0.1,0.1&q=-8.565,116.351 (Lombok)&t=h" target="_blank" rel="geolocation">Lombok</a>');
$objPHPExcel->getActiveSheet()->setCellValue('D4', 'insan@mail.com');

//create data per row
$objPHPExcel->getActiveSheet()->setCellValue('A5', '3');
$objPHPExcel->getActiveSheet()->setCellValue('B5', 'Randa');
$objPHPExcel->getActiveSheet()->setCellValue('C5', '<a class="zem_slink" title="West Java" href="http://maps.google.com/maps?ll=-6.75,107.5&spn=1.0,1.0&q=-6.75,107.5 (West%20Java)&t=h" target="_blank" rel="geolocation">Jawa Barat</a>');
$objPHPExcel->getActiveSheet()->setCellValue('D5', 'Randa@mail.com');

//auto size column
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);

// Rename worksheet name
$objPHPExcel->getActiveSheet()->setTitle('Data Mahasiswa');

// Set active sheet index to the first sheet, so <a class="zem_slink" title="Microsoft Excel" href="http://office.microsoft.com/en-us/excel" target="_blank" rel="homepage">Excel</a> opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client�s web browser (Excel2007)
header('<a class="zem_slink" title="Internet media type" href="http://en.wikipedia.org/wiki/Internet_media_type" target="_blank" rel="wikipedia">Content-Type</a>: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Data_Mhs_'.mdate('%d_%m_%y').'.xlsx"');
header('<a class="zem_slink" title="Web cache" href="http://en.wikipedia.org/wiki/Web_cache" target="_blank" rel="wikipedia">Cache-Control</a>: max-age=0');
// If you're serving to <a class="zem_slink" title="Internet Explorer 9" href="http://windows.microsoft.com/ie" target="_blank" rel="homepage">IE 9</a>, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 <a class="zem_slink" title="Greenwich Mean Time" href="http://en.wikipedia.org/wiki/Greenwich_Mean_Time" target="_blank" rel="wikipedia">GMT</a>'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');

 */
}
//------------------------------------------------------------------------nomor rekning-----------------------------------
function norek(){
	$data['content']='admin/norek';
	$data['title']='Nomor Rekning';
	$data['rek']=$this->admin_model->norek();
	$this->load->view('admin/halaman',$data);
	}
function norek_add(){
	$data['content']='admin/norek_add';
	$data['title']='Nomor Rekning';
	if($this->input->post('submit')){
		$this->load->library('form_validation');
		$rules = array( array('field' => 'norekning', 'label' => 'Nomor Rekning', 'rules' => 'required'),
						array('field' => 'namarekning', 'label' => 'Atas Nama', 'rules' => 'required'),
						array('field' => 'bankrekning', 'label' => 'Nama Bank', 'rules' => 'required'));
        $this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {	
			$this->load->view('admin/halaman',$data);
		}else{
			$data = array();
			  $data['norekning'] = $this->input->post('norekning');
			  $data['namarekning'] = $this->input->post('namarekning');
			  $data['bankrekning'] = $this->input->post('bankrekning');
			  $data['sts'] = "1";
			$this->admin_model->norek_add($data);
			redirect('admin/norek');
		}
	}
	else{
	$this->load->view('admin/halaman',$data);
	}}
function norek_edit($id_norek){
	$data['content']='admin/norek_edit';
	$data['title']='Nomor Rekning';
	if($this->input->post('submit')){
	$this->load->library('form_validation');
		$rules = array( array('field' => 'norekning', 'label' => 'Nomor Rekning', 'rules' => 'required'),
						array('field' => 'namarekning', 'label' => 'Atas Nama', 'rules' => 'required'),
						array('field' => 'bankrekning', 'label' => 'Nama Bank', 'rules' => 'required'));
        $this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
			$data['edit']=$this->admin_model->norek_edit($id_norek);	
			$this->load->view('admin/halaman',$data);
		}else{
			$norekning = $this->input->post('norekning');
			$namarekning = $this->input->post('namarekning');
			$bankrekning = $this->input->post('bankrekning');
			$this->admin_model->norek_edit_exe($id_norek,$namarekning,$norekning,$bankrekning);
			$this->session->set_flashdata('message', "Berhasil diubah");
			redirect('admin/norek');
		}
	}else{
		$data['edit']=$this->admin_model->norek_edit($id_norek);
		$this->load->view('admin/halaman',$data);}
	}
function norek_del($id_norek){
	$this->admin_model->norek_del($id_norek);
	$this->session->set_flashdata('message', "Berhasil dihapus");
		redirect('admin/norek');
} 
function penjualan(){
	$data['content']='admin/penjualan';
	$data['title']='Penjualan Barang';
	$data['penjualan']=$this->admin_model->penjualan_barang();
	$this->load->view('admin/halaman',$data);
}
/* function penjualan_harian(){	
$data['content'] = 'admin/penjualan_harian';
	$data['title'] = 'Transaksi Penjualan Harian';
	if($this->input->post('submit')){
		$tanggal=$this->input->post('tanggal');
		$data['data']=$this->admin_model->penjualan_per($tanggal);
		$data['rp'] = $this->admin_model->penjualan_rp_per($tanggal); 
		$this->load->view('admin/halaman', $data);
	}else{
		$data['data'] = $this->admin_model->penjualan(); 
		$data['rp'] = $this->admin_model->penjualan_rp();
		$this->load->view('admin/halaman', $data);}
	
}
function penjualan_bulanan(){
	$data['content'] = 'admin/penjualan_bulanan';
	$data['title'] = 'Transaksi Penjualan Bulanan';
	$data['data'] = $this->admin_model->penjualan(); 
	$this->load->view('admin/halaman', $data);
}
function penjualan_tahunan(){
	$data['content'] = 'admin/penjualan_tahunan';
	$data['title'] = 'Transaksi Penjualan Tahunan';
	$data['data'] = $this->admin_model->penjualan(); 
 	$this->load->view('admin/halaman', $data);
} */
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
/* nama filenya sama dengan perintah config/routes.php */