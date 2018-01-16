<?php 
class Pengguna_akun extends CI_Controller {
	function __construct() 
	
	{
		parent::__construct();
		session_start();
		//$this->is_logged_in();
		$this->load->library('session');
		$this->load->helper(array('url', 'form', 'date', 'html'));
		$this->load->model(array('pengguna_model', 'admin_model'));
		$this->load->library('cart');
		}
		
function links($page){
		$data['content'] = $page;
		$data['title'] = "BuyFish";
		$this->load->view('pengguna/halaman', $data); 
	}
	
function akun(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true) {
		echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."pengguna/login_cust'>";
		die(); 
		}	$data['content']='pengguna/masuk';
			$data['title'] = "BuyFish | Registrasi Pelanggan";
			$data['message'] = 'Selamat Datang';
			$this->load->model('pengguna_model');
			$data['query'] = $this->pengguna_model->ambil_produk();
			$data['query1'] = $this->pengguna_model->ambil_nama();
			$data['dipakai'] = $this->pengguna_model->akunalamat_dipakai();
			$this->load->view('pengguna/header',$data);
			$this->load->view('pengguna/akun_menu',$data);
			$this->load->view('pengguna/akun',$data);
	}


function logout() {
	$this->pengguna_model->delete_seschart();
  $this->pengguna_model->delete_userchart();
  $this->session->sess_destroy();
   echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."pengguna'>";
   die(); 
}

function pesanan(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true) {
		echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."pengguna/login_cust'>";
		die(); 
		}	$data['content']='pengguna/masuk';
			$data['title'] = "BuyFish | Registrasi Pelanggan";
			$data['message'] = 'Selamat Datang';
			$data['query'] = $this->pengguna_model->ambil_produk();
			$data['query1'] = $this->pengguna_model->ambil_nama();
			$data['pesanan'] = $this->pengguna_model->pesanan_akun();	
			$this->load->view('pengguna/header',$data);
			$this->load->view('pengguna/akun_menu',$data);
			$this->load->view('pengguna/akun_pesanan',$data);
			$this->load->view('pengguna/footer');
	}
function pesanan_det($id_pesanan){
	$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true) {
		echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."pengguna/login_cust'>";
		die(); 
		}
		$data['title'] = "Detail Pesanan"; 
		$data['query'] = $this->pengguna_model->ambil_produk();
		$data['query1'] = $this->pengguna_model->ambil_nama();
		$data['cari'] = $this->admin_model->detail_pesanan($id_pesanan);
		$data['barang'] = $this->admin_model->barang_pesanan($id_pesanan);
		 $data['msg'] = '';
		$this->load->view('pengguna/header',$data);
		$this->load->view('pengguna/akun_menu',$data);
		$this->load->view('pengguna/akun_pesanan_det',$data);
		$this->load->view('pengguna/footer');
		
	}

//----------------------------------alamat----------------------------------------------------------------------------------------
function alamat(){
	$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true) {
		echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."pengguna/login_cust'>";
		die(); 
	}	$data['title'] = "BuyFish | Akun - address book";
		$this->load->model('pengguna_model');
		$data['query'] = $this->pengguna_model->ambil_produk();
		$data['query1'] = $this->pengguna_model->ambil_nama();
		$data['alamat'] = $this->pengguna_model->akunalamat();
		$data['dipakai'] = $this->pengguna_model->akunalamat_dipakai();
		$this->load->view('pengguna/header',$data);
		$this->load->view('pengguna/akun_menu',$data);
		$this->load->view('pengguna/akun_alamat',$data);
		$this->load->view('pengguna/footer');
}

function alamatbaru(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true) {
		echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."pengguna/login_cust'>";
		die(); 
	}	$data['title'] = "BuyFish | Address book";
		$this->load->model('pengguna_model');
		$data['query'] = $this->pengguna_model->ambil_produk();
		$data['query1'] = $this->pengguna_model->ambil_nama();
		$data['alamat'] = $this->pengguna_model->akunalamat();
		$prov = $this->pengguna_model->getpropinsi();
		foreach ($prov as $d){
			$data['prp'][0]="-Pilih Propinsi-";
			$data['prp'][$d->propinsi_id]=$d->propinsi;
		}
		$this->load->view('pengguna/header',$data);
		$this->load->view('pengguna/akun_menu',$data);
		$this->load->view('pengguna/akun_alamat_add',$data);
		$this->load->view('pengguna/footer');
}

function ambil_kab()
{
$this->load->model('pengguna_model');
    $key = $this->input->post('key');
        $kab = $this->pengguna_model->ambil_kab($key);;
         
        echo '<select name="pilihkab" class="inputan">';
			echo '<option> -Pilih kota- </option>';
        foreach ($kab as $row){
            echo '<option value="'.$row['kota_id'].'" >'.$row['kota_kabupaten'].'</option>';
        }
        echo '</select>';
 }
 
function alamatbaru_exe(){
	$data['title'] = "BuyFish | Address book";
	$this->load->library('form_validation');
	$rules = array( array('field' => 'nama','label' => 'Nama','rules' => 'required'),
					array('field' => 'hp','label' => 'Nomer Handphone','rules' => 'required'),
					array('field' => 'provinsi','label' => 'Provinsi','rules' => 'required'),
					array('field' => 'pilihkab','label' => 'Kota','rules' => 'required'),
					array('field' => 'alamat','label' => 'Alamat', 'rules' => 'required'),
				);
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE) { //jika tidak lengkap
				$data['content']='pengguna/bayar';
				$data['title'] = "BuyFish | Address book";
				//$this->load->model('pengguna_model');
				$data['query1'] = $this->pengguna_model->ambil_nama();
				$prov = $this->pengguna_model->getpropinsi();
		foreach ($prov as $d){
			$data['prp'][0]="-Pilih Propinsi-";
			$data['prp'][$d->propinsi_id]=$d->propinsi;
		}
		/* $this->session->set_flashdata('message', validation_errors());
		redirect('pengguna_akun/alamatbaru');
		 */
		$this->load->view('pengguna/header',$data);
		$this->load->view('pengguna/akun_menu',$data);
		$this->load->view('pengguna/akun_alamat_add',$data);
		$this->load->view('pengguna/footer');
        }
        else {
			$this->load->model('pengguna_model');
			$this->pengguna_model->akunalamat_baru();
			$this->session->set_flashdata('message', 'Alamat pelanggan berhasil disimpan ');
			redirect('pengguna_akun/alamat'); 
        }
	}
 
function alamat_pilih($id_alamat) {
	$data['title'] = "JuraganIkan | Address book";
	$this->load->model('pengguna_model');
	$data['query'] = $this->pengguna_model->ambil_produk();
	$data['query1'] = $this->pengguna_model->ambil_nama();
	$data['query2'] = $this->pengguna_model->akunalamat_jadikan($id_alamat);
	redirect("pengguna_akun/alamat",$data); 
}

function alamat_ubah($id_alamat){
	$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true) {
		echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."pengguna/login_cust'>";
		die(); 
	}
	$data['title'] = "JuraganIkan | Address book";
	$this->load->model('pengguna_model');
	$data['query'] = $this->pengguna_model->ambil_produk();
	$data['query1'] = $this->pengguna_model->ambil_nama();
	$data['query3'] = $this->pengguna_model->akunalamat_edit($id_alamat);
	$data['alamat'] = $this->pengguna_model->akunalamat();
	$key = $this->input->post('key');
	$data['kabupaten'] = $this->pengguna_model->ambil_kab($key);	
	$prov = $this->pengguna_model->getpropinsi();
	$prov1 = $this->pengguna_model->akunalamat_edit($id_alamat);
		foreach ($prov1 as $al){
		$data['prp'][$al->propinsi_id] = $al->propinsi;
		}
		foreach ($prov as $d){
		$data['prp'][$d->propinsi_id]=$d->propinsi;
		}
	$this->load->view('pengguna/header',$data);
	$this->load->view('pengguna/akun_menu',$data);
	$this->load->view('pengguna/akun_alamat_edit',$data);
	$this->load->view('pengguna/footer');
}

function ambil_kab_ubah() {
$this->load->model('pengguna_model');
    $key = $this->input->post('key');
    $kab = $this->pengguna_model->ambil_kab($key);
        echo '<select name="pilihkab" class="inputan">';
			echo '<option> -Pilih kota- </option>';
        foreach ($kab as $row){
            echo '<option value="'.$row['kota_id'].'">'.$row['kota_kabupaten'].'</option>';
        }	echo '</select>';
 }
 
function alamat_ubah_exe(){
	$data['title'] = 'Ubah Data Barang'; 
	$id_alamat = $this->input->post('id_alamat');
	$data = array(); 
		$data['id_user'] = $this->input->post('id_user'); 
		$data['nama ']= $this->input->post('nama');  
		$data['hp ']= $this->input->post('hp'); 
		$data['kota_id'] = $this->input->post('pilihkab');
		$data['alamat'] = $this->input->post('alamat');
		$data['sts'] = $this->input->post('sts');
		$this->pengguna_model->akunalamat_edit_exe($data);
		$this->pengguna_model->alamat_del($id_alamat);
		$this->session->set_flashdata('message', 'Alamat pelanggan berhasil disimpan ');
		redirect('pengguna_akun/alamat');
}

function alamat_del($id_alamat){
	  $this->pengguna_model->alamat_del($id_alamat);
	  redirect('pengguna_akun/alamat');
}
//-------------------------------------------------------------------
 function address(){
	$data['title'] = "BuyFish | Akun - address book";
	$this->load->model('pengguna_model');
	$data['query'] = $this->pengguna_model->ambil_produk();
	$data['query1'] = $this->pengguna_model->ambil_nama();
	$data['alamat'] = $this->pengguna_model->akunalamat();
	$data['dipakai'] = $this->pengguna_model->akunalamat_dipakai();
	$this->load->view('pengguna/header-cekot',$data);
	$this->load->view('pengguna/bayar_bukualamat',$data);
	$this->load->view('pengguna/footer_cekot');
}
function address_pilih($id_alamat) {
	$data['title'] = "BuyFish | Address book";
	$this->load->model('pengguna_model');
	$data['query'] = $this->pengguna_model->ambil_produk();
	$data['query1'] = $this->pengguna_model->ambil_nama();
	$data['query2'] = $this->pengguna_model->akunalamat_jadikan($id_alamat);
	redirect("pengguna/bayar",$data); 
}
function address_del($id_alamat){
	  $this->load->model('pengguna_model');
	  $this->pengguna_model->alamat_del($id_alamat);
	  redirect('pengguna_akun/address');
}
function newaddress(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true) {
		echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."pengguna/login_cust'>";
		die(); 
	}	$data['title'] = "BuyFish | Address book";
		$data['query'] = $this->pengguna_model->ambil_produk();
		$data['query1'] = $this->pengguna_model->ambil_nama();
		$q=$this->pengguna_model->ambil_nama();
		foreach ($q->result_array() as $id){
		$id_user=$id['id_user'];
		}
		$data['alamat'] = $this->admin_model->alamat_user($id_user);
		$prov = $this->pengguna_model->getpropinsi();
		foreach ($prov as $d){
			$data['prp'][0]="-Pilih Propinsi-";
			$data['prp'][$d->propinsi_id]=$d->propinsi;
		}
		$this->load->view('pengguna/header-cekot',$data);
		$this->load->view('pengguna/bayar_bukualamat_add',$data);
		$this->load->view('pengguna/footer_cekot');
}
//---------------------------------------------------- KONFIRMASI -------------------------------------------------------------------------------

function konfirm_pembayaran(){
		$data['title'] = "BuyFish | Konfirmasi Pembayaran";
		$data['query'] = $this->pengguna_model->ambil_produk();
		$data['query1'] = $this->pengguna_model->ambil_nama();
		$data['query2'] = $this->pengguna_model->lihatpolling();
		$data['query4'] = $this->pengguna_model->polling();
		$data['query3'] = $this->pengguna_model->semuapolling();
		$data['id_polling']=$this->uri->segment(3);
		$data['bukutamu'] = $this->pengguna_model->bukutamu();
		$data['lihatip'] = $this->pengguna_model->lihat_ip_polawal();
		 $data['barangbaru'] = $this->pengguna_model->barang();
		if ($this->input->post('ok')){
			$data['cari'] = $this->pengguna_model->konfirm_cari();
			$data['barang'] = $this->pengguna_model->barang_pesanan();
			if($data['cari']==null) {
				$this->session->set_flashdata('message', 'Nomor pesanan '.  set_value('id_pesanan') .' tidak ditemukan');  
				redirect('pengguna_akun/konfirm_pembayaran');	
			} else {			
			$this->load->view('pengguna/header',$data);
			$this->load->view('pengguna/menu_kiri');
			$this->load->view('pengguna/konfirm_pembayaran',$data);
			$this->load->view('pengguna/footer');
			}
		}else{
		$data['cari'] = $this->pengguna_model->konfirm_cari();
		$this->load->view('pengguna/header',$data);
		$this->load->view('pengguna/menu_kiri');
		$this->load->view('pengguna/konfirm_pembayaran',$data);
		$this->load->view('pengguna/footer');
		}
	}


function kofirm_exe(){
$data['title'] = "Konfirasi Pembayaran";
$data['query2'] = $this->pengguna_model->lihatpolling();
		$data['query4'] = $this->pengguna_model->polling();
		$data['query3'] = $this->pengguna_model->semuapolling();
		$data['id_polling']=$this->uri->segment(3);
		$data['bukutamu'] = $this->pengguna_model->bukutamu();
		$data['lihatip'] = $this->pengguna_model->lihat_ip_polawal();
		$data['barangbaru'] = $this->pengguna_model->barang();
$this->load->library('form_validation');
	$rules = array( array('field' => 'tgl_transfer', 'label' => 'Tanggal Transfer', 'rules' => 'required'),
					array('field' => 'nominal', 'label' => 'Nominal', 'rules' => 'required'),
					array('field' => 'gambar', 'label' => 'Gambar', 'rules' => 'trim'),
					);
	$this->form_validation->set_rules($rules);
	if ($this->form_validation->run() == FALSE) {
		$data['query'] = $this->pengguna_model->ambil_produk();
		$data['query1'] = $this->pengguna_model->ambil_nama();
		$data['cari'] = $this->pengguna_model->konfirm_cari();
		$data['barang'] = $this->pengguna_model->barang_pesanan();
		$this->load->view('pengguna/header',$data);
		$this->load->view('pengguna/menu_kiri');
		$this->load->view('pengguna/konfirm_pembayaran',$data);
		$this->load->view('pengguna/footer');
    }else{ 
	 	$config['upload_path'] = './images/up';
		$filename = $this->input->post('id_pesanan');
		$config['file_name'] = $filename;
		$config['overwrite'] = true;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '3000';
		$field_name='gambar';
   		$this->load->library('upload', $config);
		if(!$this->upload->do_upload($field_name)){
			$this->session->set_flashdata('message', 'Gambar belum diupload');
			$data['query'] = $this->pengguna_model->ambil_produk();
			$data['query1'] = $this->pengguna_model->ambil_nama();
			$data['cari'] = $this->pengguna_model->konfirm_cari();
			$data['barang'] = $this->pengguna_model->barang_pesanan();
			$this->load->view('pengguna/header',$data);
			$this->load->view('pengguna/menu_kiri');
			$this->load->view('pengguna/konfirm_pembayaran',$data);
			$this->load->view('pengguna/footer');
		}
		else{
		$image_data = $this->upload->data();
		$config['image_library'] = 'gd2';
		$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
  		$this->load->library('image_lib', $config);
  if(!$this->image_lib->resize()){
    echo $this->image_lib->display_errors();
  }
 $data = array();
  $data['id_user'] = $this->input->post('id_user');
  $data['gambar'] = $image_data['file_name'];
  $data['id_alamat'] = $this->input->post('id_alamat'); 
  $data['total_pesanan'] = $this->input->post('total_pesanan'); 
  $data['tgl_konfirm'] = $this->input->post('tgl_konfirm'); 
  $data['tgl_pesanan'] = $this->input->post('tgl_pesanan'); 
  $data['nominal'] = $this->input->post('nominal'); 
  $data['tgl_transfer'] = $this->input->post('tgl_transfer'); 
  $data['catatan'] = $this->input->post('catatan'); 
  $this->pengguna_model->konfirm_bayar($data);
  redirect('pengguna_akun/konfirm_sukses');
	}
	}
}
function konfirm_sukses(){
		$data['title'] = "Konfirmasi Pembayaran";
		$this->load->model('pengguna_model');
		$data['query'] = $this->pengguna_model->ambil_produk();
		$data['query1'] = $this->pengguna_model->ambil_nama();
		$data['query2'] = $this->pengguna_model->lihatpolling();
		$data['query4'] = $this->pengguna_model->polling();
		$data['query3'] = $this->pengguna_model->semuapolling();
		$data['id_polling']=$this->uri->segment(3);
		$data['bukutamu'] = $this->pengguna_model->bukutamu();
		$data['lihatip'] = $this->pengguna_model->lihat_ip_polawal();
		$data['barangbaru'] = $this->pengguna_model->barang();
		$this->load->view('pengguna/header',$data);
		$this->load->view('pengguna/menu_kiri');
		$this->load->view('pengguna/konfirm_sukses');
		$this->load->view('pengguna/footer');
}
function gantipass(){
	$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true) {
		echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."pengguna/login_cust'>";
		die(); 
	}	$data['title'] = "JuraganIkan | Konfirmasi Pembayaran";
		$this->load->model('pengguna_model');
		$data['query'] = $this->pengguna_model->ambil_produk();
		$data['query1'] = $this->pengguna_model->ambil_nama();
		$this->load->view('pengguna/header',$data);
		$this->load->view('pengguna/akun_menu');
		$this->load->view('pengguna/akun_gantipass',$data);
	}
function gantipass_exe(){
	$data['title'] = "Pengaturan Akun";
		$this->load->library('form_validation');
		$rules = array( array('field' => 'password_lama', 'label' => 'Password lama', 'rules' => 'required'),
						array('field' => 'password', 'label' => 'Password baru', 'rules' => 'required|min_length[6]|matches[konfirmasi_password]'),
						array('field' => 'konfirmasi_password', 'label' => 'Konfirmasi Password', 'rules' => 'required'),
					);
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', validation_errors());
    redirect(base_url().'pengguna_akun/gantipass');
        }
        else{ 
			$query = $this->pengguna_model->cari_gantipass();
			if (!$query) {
			$this->session->set_flashdata('message', 'Password tidak cocok! ');
    redirect(base_url().'pengguna_akun/gantipass');
			} else {
			$query = $this->pengguna_model->gantipass();
			$this->session->set_flashdata('message', 'Password berhasil diganti ');
    redirect(base_url().'pengguna_akun/akun');
			}
        }
}

function gantiemail(){
	$is_logged_in = $this->session->userdata('is_logged_in');
	if(!isset($is_logged_in) || $is_logged_in != true) {
		echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."pengguna/login_cust'>";
		die(); 
	}
	$data['title'] = "Ubah email";
	$this->load->model('pengguna_model');
	$data['query'] = $this->pengguna_model->ambil_produk();
	$data['query1'] = $this->pengguna_model->ambil_nama();
	$this->load->library('form_validation');
	if($this->input->post('submit')){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('pengguna/header',$data);
			$this->load->view('pengguna/akun_menu');
			$this->load->view('pengguna/akun_gantiemail',$data);
		}else{
			$this->pengguna_model->gantiemail();
			$this->pengguna_model->validate();
				 $data = array(
						'email' => $this->input->post('email'),
						'is_logged_in' => true   );
				  $this->session->set_userdata($data);
			$this->session->set_flashdata('message', 'E-mail berhasil diganti ');
			redirect('pengguna_akun/akun');
		}
	}else{ 
		$this->load->view('pengguna/header',$data);
		$this->load->view('pengguna/akun_menu');
		$this->load->view('pengguna/akun_gantiemail',$data);
	}}
function ubahakun(){
	$is_logged_in = $this->session->userdata('is_logged_in');
	if(!isset($is_logged_in) || $is_logged_in != true) {
		echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."pengguna/login_cust'>";
		die(); 
	}
	$data['title'] = "Ubah akun";
	$data['query'] = $this->pengguna_model->ambil_produk();
	$data['query1'] = $this->pengguna_model->ambil_nama();
	$this->load->library('form_validation');
	if($this->input->post('submit')){
		$this->form_validation->set_rules('nama', 'Nama Depan', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('pengguna/header',$data);
			$this->load->view('pengguna/akun_menu');
			$this->load->view('pengguna/akun_ubah',$data);
		}else{
			$this->pengguna_model->gantinama();
			$this->session->set_flashdata('message', 'nama akun berhasil diganti ');
			redirect('pengguna_akun/akun');
		}
	}else{ 
		$this->load->view('pengguna/header',$data);
		$this->load->view('pengguna/akun_menu');
		$this->load->view('pengguna/akun_ubah',$data);
}
}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
/* nama filenya sama dengan perintah config/routes.php */