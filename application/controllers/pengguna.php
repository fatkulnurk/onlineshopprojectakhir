<?php 
class Pengguna extends CI_Controller {
	 function __construct() 
	
	{
		parent::__construct();
		//$this->is_logged_in();
		$this->load->library("session");
		$this->load->helper(array('url', 'form', 'date', 'html'));
		$this->load->model(array('pengguna_model', 'admin_model'));
		$this->load->library('cart','pagination');
		//session_start();
		}
		
		
function index() {
		$data['title']='BuyFish - Jual Beli Ikan Nomor 1';
		redirect("pengguna/barang");	
		
	}
	
function barang() {
$data['content'] = 'pengguna/beranda';
		$data['title']='BuyFish - Jual Beli Ikan Nomor Satu';
  $page=$this->uri->segment(3);
  $limit = 15;      
  if(!$page){
    $offset = 0;
  }else{
    $offset = $page;
  }     
  	$tot_hal = $this->db->get('barang');
	$config['base_url'] = base_url() . '/pengguna/barang';
	$config['total_rows'] = $tot_hal->num_rows();
	$config['per_page'] = $limit;
	$config['uri_segment'] = 3;
	$config['first_link'] = 'first';
	$config['last_link'] = 'last';
	$config['next_link'] = '>';
	$config['prev_link'] = '<';
  $this->pagination->initialize($config); 
  
  $data["paginator"] = $this->pagination->create_links();	
   $data['query1'] = $this->pengguna_model->ambil_nama();
  $data['query'] = $this->pengguna_model->ambil_produk();
  $data['query2'] = $this->pengguna_model->lihatpolling();
  $data['query4'] = $this->pengguna_model->polling();
  $data['query3'] = $this->pengguna_model->semuapolling();
  $data['id_polling']=$this->uri->segment(3);
  $data['lihatip'] = $this->pengguna_model->lihat_ip_polawal();
  $data['bukutamu'] = $this->pengguna_model->bukutamu();
  $data['barangbaru'] = $this->pengguna_model->barang();
  
	if($this->input->post('submit')){
  $urut=$this->input->post('urut');
	$data['data']=$this->pengguna_model->ambil_barang_urut($offset, $limit, $urut);
  } else{
   $data['data'] = $this->pengguna_model->ambil_barang($offset, $limit);
  }
  $this->load->view('pengguna/header',$data);
  $this->load->view('pengguna/menu_kiri');
  $this->load->view('pengguna/barang',$data);
  $this->load->view('pengguna/footer');
  
	}
	
	
	
function links($page){
		$data['content'] = $page;
		$data['title'] = "BuyFish - Jual Beli Ikan Nomor 1";
		$this->load->view('pengguna/halaman', $data); 
	}
	
//---------------------- detail barang ------------------------------------------------------------------------------------------------------------------

function detail_barang($id_barang){
		$data['title'] = 'BuyFish - Jual Beli Ikan Nomor 1';
		$this->load->model('pengguna_model');
		$data['data'] = $this->pengguna_model->detail_barang($id_barang);
		$data['data1'] = $this->pengguna_model->ambil_komentar($id_barang);
		$data['query'] = $this->pengguna_model->ambil_produk();
		$data['query1'] = $this->pengguna_model->ambil_nama();
		$data['id_brng']=$this->uri->segment(3);
		$data['query2'] = $this->pengguna_model->lihatpolling();
		$data['query4'] = $this->pengguna_model->polling();
		$data['query3'] = $this->pengguna_model->semuapolling();
		$data['id_polling']=$this->uri->segment(3);
		$data['bukutamu'] = $this->pengguna_model->bukutamu();
		$data['barangbaru'] = $this->pengguna_model->barang();
		$data['lihatip'] = $this->pengguna_model->lihat_ip_polawal();
		$data['semuabarang'] = $this->pengguna_model->semua_barang();
		$this->load->view('pengguna/header',$data);
		$this->load->view('pengguna/menu_kiri');
		$this->load->view('pengguna/detail_barang',$data);
		$this->load->view('pengguna/footer');		
	}

function kategori($id_produk){
	$data['title']='BuyFish';
  $page=$this->uri->segment(4);
  $limit = 30;      
  if(!$page){
    $offset = 0;
  }else{
    $offset = $page;
  }     
  	$tot_hal = $this->pengguna_model->kategori_page($id_produk);
	$config['base_url'] = base_url() . "/pengguna/kategori/$id_produk";
	$config['total_rows'] = $tot_hal->num_rows();
	$config['per_page'] = $limit;
	$config['uri_segment'] = 4;
	$config['first_link'] = 'first';
	$config['last_link'] = 'last';
	$config['next_link'] = '>';
	$config['prev_link'] = '<';
  $this->pagination->initialize($config); 
  
  $data["paginator"] = $this->pagination->create_links();	
   $data['query1'] = $this->pengguna_model->ambil_nama();
  $data['query'] = $this->pengguna_model->ambil_produk();
  $data['query2'] = $this->pengguna_model->lihatpolling();
  $data['query4'] = $this->pengguna_model->polling();
  $data['query3'] = $this->pengguna_model->semuapolling();
  $data['id_polling']=$this->uri->segment(3);
  $data['lihatip'] = $this->pengguna_model->lihat_ip_polawal();
  $data['bukutamu'] = $this->pengguna_model->bukutamu();
  $data['barangbaru'] = $this->pengguna_model->barang();
  
	if($this->input->post('submit')){
  $urut=$this->input->post('urut');
	$data['data']=$this->pengguna_model->kategori_urut($id_produk,$offset, $limit, $urut);
	
  } else{
   $data['data'] = $this->pengguna_model->kategori($id_produk,$offset, $limit);
  }
  $this->load->view('pengguna/header',$data);
  $this->load->view('pengguna/menu_kiri');
  $this->load->view('pengguna/kategori',$data);
  $this->load->view('pengguna/footer');
  
	}

//--------------------------------------- KOMENTAR -------------------------------------------------------------------------------------------------------
function komentar_add_exe(){
		$this->load->library('form_validation');
		$this->load->model('pengguna_model');
		$data['input'] = $this->input->post('komentar');
		$id_barang = $this->input->post('id_brng');
		$rules = array( array('field' => 'komentar', 'label' => 'Komentar', 'rules' => 'required'));
        $this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {	
			redirect("pengguna/detail_barang/$id_barang");
        }	else{ //sukses
			$data['barang'] = $this->pengguna_model->detail_barang($id_barang);
			$data['komentar'] = $this->pengguna_model->ambil_komentar($id_barang);
			$this->pengguna_model->komentar_simpan();			
			redirect("pengguna/detail_barang/$id_barang");
        }
		
	}
	
//-----------------------BUKU TAMU ------------------------------------------------------------------------------------	
function bukutamu(){
	$data['title'] = 'Daftar Buku Tamu';
	$this->load->library('pagination');
  $page=$this->uri->segment(3);
  $limit = 7;      
  if(!$page){
    $offset = 0;
  }else{
    $offset = $page;
  }       
  $tot_hal = $this->db->get('buku_tamu');
  $config['base_url'] = base_url() . '/pengguna/bukutamu';
  $config['total_rows'] = $tot_hal->num_rows();
  $config['per_page'] = $limit;
  $config['uri_segment'] = 15;
  $config['first_link'] = 'first';
  $config['last_link'] = 'last';
  $config['next_link'] = 'Next';
  $config['prev_link'] = 'Previous';
  $this->pagination->initialize($config);
  $data['paginator'] = $this->pagination->create_links();
  $data['data'] = $this->pengguna_model->bukutamu_lihat($offset, $limit); 
  $data['total'] = $tot_hal->num_rows();
  	 $data['query1'] = $this->pengguna_model->ambil_nama();
	 $data['query'] = $this->pengguna_model->ambil_produk();
	 $data['query2'] = $this->pengguna_model->lihatpolling();
	 $data['query4'] = $this->pengguna_model->polling();
	 $data['query3'] = $this->pengguna_model->semuapolling();
	 $data['id_polling']=$this->uri->segment(3);
	 $data['bukutamu'] = $this->pengguna_model->bukutamu();
	 $data['lihatip'] = $this->pengguna_model->lihat_ip_polawal();
	 $data['barangbaru'] = $this->pengguna_model->barang();
	 $this->load->view('pengguna/header',$data);
	 $this->load->view('pengguna/menu_kiri');
	 $this->load->view('pengguna/bukutamu_add',$data);
	 $this->load->view('pengguna/footer');
}	
function bukutamu_add_exe(){		
		$data['title'] = "BuyFish | Testimonial Pengunjung";
		$this->load->library('form_validation');
		$rules = array( array('field' => 'nama', 'label' => 'Nama', 'rules' => 'required'),
						array('field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email'),
						array('field' => 'komentar', 'label' => 'Komentar', 'rules' => 'required'),
					);
        $this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
			redirect('pengguna/bukutamu');
        }
        else{ //sukses
			$data['query1'] = $this->pengguna_model->ambil_nama();
			$data['query'] = $this->pengguna_model->ambil_produk();
			$data['query2'] = $this->pengguna_model->lihatpolling();
			$data['query4'] = $this->pengguna_model->polling();
			$data['query3'] = $this->pengguna_model->semuapolling();
			$data['id_polling']=$this->uri->segment(3);
			$data['bukutamu'] = $this->pengguna_model->bukutamu();
			$data['barangbaru'] = $this->pengguna_model->barang();
			$this->pengguna_model->bukutamu_simpan();
			$this->session->set_flashdata('message', "Komentar anda telah terkirim, tunggu persetujuan Admin untuk menampilkannya");
			redirect('pengguna/bukutamu');
        }
	}
	
	
//------------------------------------ K E R A N J A N G -------------------------------------------------------------------------------------
function add_keranjang(){
	$id_barang= $this->input->post('id_barang');
	$stokawal=$this->input->post('stok');
	$qty=$this->input->post('qty');
	$nama=$this->input->post('nama_barang');
	if($qty<=$stokawal){
		$stok=$stokawal-1;
	
	$this->pengguna_model->kurangistok($stok,$id_barang);
	$data = array(
			'id'	=> $id_barang,
			'qty'   => $this->input->post('qty'),
		    'price' => $this->input->post('harga'),
			'name'	=> $this->input->post('gambar'),
			'stokawal'=> $this->input->post('stok'),
			'options' => array($this->input->post('nama_barang'),$this->input->post('keterangan'))			
			);
		$this->cart->insert($data);
		$this->session->set_flashdata('message', "$nama ditambahakan ke keranjang belanja ");
		
		redirect("pengguna/keranjang",$data);
		}
		else{
		$this->session->set_flashdata('message','Maaf, stok tidak tersedia stok '.str_replace('.jpg',' ',$nama).' saat ini adalah '.$stokawal.' Kg');	
	}	
		redirect("pengguna/detail_barang/".$id_barang);
	}

function hapus_keranjang($kode,$q,$id){
$total = $this->cart->total_items();
	for($i=0;$i <= $total;$i++){
		$id_barang=$id;
		$stok=$q;
		$this->pengguna_model->kurangistok($stok,$id_barang);
		}
		$data = array(
			'rowid' => $kode,
			'qty'   => 0);
		$this->cart->update($data);	
	
		redirect("pengguna/keranjang",$data);
	}

function keranjang() {
		$this->load->library('cart');
		$data['title'] = "BuyFish | Shopping Cart";
		//$data['stok']=$this->pengguna_model->stokbarang(); 
		$data['query1'] = $this->pengguna_model->ambil_nama();
		$this->load->view('pengguna/header-cekot',$data);
		$this->load->view('pengguna/keranjang',$data);
		$this->load->view('pengguna/footer_cekot');
		
	}

function update_keranjang() {
	$total = $this->cart->total_items();
	for($i=1;$i <= $total;$i++){
		$id_barang=$this->input->post("id_barang$i");
		$nama=$this->input->post("nama$i");
		$qty=$this->input->post("qty$i");
		$stokawal=$this->input->post("stokawal$i");
		$key=$this->input->post("rowid$i");
		$stok=$stokawal-$qty;
	if($qty<=$stokawal){
		$this->pengguna_model->kurangistok($stok,$id_barang);
		 $data = array(
			   'rowid' => $key,
               'qty'   => $qty
            );
			$this->cart->update($data); 
			$this->session->set_flashdata('message', "Berhasil diubah");
			}
	else{
		$this->session->set_flashdata('message','Maaf, stok tidak tersedia stok '.str_replace('.jpg',' ',$nama).'saat ini adalah '.$stokawal.' Kg');
		
	}			
	}	
		redirect("pengguna/keranjang");
	
	}


//---------------------------------------- REGISTRASI ------------------------------------------------------------------------------------------
function registrasi(){
	$data['content']='pengguna/registrasi';
	$data['title'] = "BuyFish | Registrasi Pelanggan";
	$data['query'] = $this->pengguna_model->ambil_produk();
	$data['query1'] = $this->pengguna_model->ambil_nama();
	$data['message']="";
	if ($this->input->post('submit')){
		$this->load->library('form_validation');
		$rules = array( array('field' => 'nama_awal', 'label' => 'Nama', 'rules' => 'required'),
						array('field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email'),
						array('field' => 'password', 'label' => 'Password', 'rules' => 'required|min_length[6]|matches[konfirmasi_password]'),
						array('field' => 'konfirmasi_password', 'label' => 'Konfirmasi Password', 'rules' => 'required'),
					);
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE) {
			$this->load->view('pengguna/halaman',$data); 
        }else{ //sukses
			if($this->pengguna_model->cekemail()==TRUE){
			//$this->session->set_flashdata('message', 'Alamat email sudah digunakan');
			$data['message']="<p class='flashdata-red'> Alamat email sudah digunakan</p>";
			$this->load->view('pengguna/halaman',$data);
			}else{
				$query = $this->pengguna_model->registrasi_simpan();
				if($query) {
					$simpan = $this->db->query("SELECT * FROM user WHERE email='".$this->input->post('email')."'");
					foreach($simpan->result_array() as $usr){
					$user = $usr['nama_user'];
					$data = array( 'email' => $this->input->post('email'),
								'user' => $user,
								'is_logged_in' => true );
					$this->session->set_userdata($data);
					$this->pengguna_model->insert_userchart();
					}
					$this->session->set_flashdata('message', 'Pendaftaran berhasil');
					redirect('pengguna_akun/akun'); 
					}
				$data['query'] = $this->pengguna_model->ambil_produk();
				redirect('pengguna/registrasi_sukses');
        }}
	}else{	
	$this->load->view('pengguna/halaman',$data);}
	}
 
function registrasi_sukses(){
		$data['content']='pengguna/akun';
		$data['title'] = "BuyFish | Registrasi Pelanggan";
		$data['message'] = 'Pendaftaran pelanggan sukses';
		$data['query'] = $this->pengguna_model->ambil_produk();
		$this->load->view('pengguna/halaman',$data);
	}	

	
//-----------------------L O G I N------------------------------------------------------------------------------------------------------

function login_cust(){
		$data['content']='pengguna/login_cust';
		$data['title'] = "BuyFish | Login Pelanggan";
		$this->load->model('pengguna_model');
		$data['query'] = $this->pengguna_model->ambil_produk();
		$data['query1'] = $this->pengguna_model->ambil_nama();
		$data['message'] = '';
		$this->load->view('pengguna/halaman',$data);
	}
	
function login() { 
  $query = $this->pengguna_model->validate();
    if($query) // jika data user benar
  {
	  
	$simpan = $this->db->query("SELECT * FROM user WHERE email='".$this->input->post('email')."'");
		foreach($simpan->result_array() as $usr){
		$user = $usr['nama_user'];
		
   $data = array(
    'email' => $this->input->post('email'),
	'user' => $user,
    'is_logged_in' => true
   );
   $this->session->set_userdata($data);
   $this->pengguna_model->insert_userchart();
		}
   redirect('pengguna_akun/akun');
  }
  else // username atau password salah
  {
	$data['content']='pengguna/login_cust';
		$data['title'] = "BuyFish | Login Pelanggan";
		$data['message'] = 'Email atau password anda salah';
		$this->load->model('pengguna_model');
		$data['query'] = $this->pengguna_model->ambil_produk();
		$this->load->view('pengguna/halaman',$data); 
  }
 }  
 
 
 
function is_logged_in() {
	  $is_logged_in = $this->session->userdata('is_logged_in');
	  if(!isset($is_logged_in) || $is_logged_in != true) {
			redirect('pengguna/login_cust');
	  die(); }
	} 
	
function lupa_pass(){
	$data['title'] = "BuyFish | Login Pelanggan";
	$data['content']='pengguna/lupa_pass';
	$data['query'] = $this->pengguna_model->ambil_produk();
	$data['query1'] = $this->pengguna_model->ambil_nama();
	$this->load->library('form_validation');
	$m=$this->input->post('email');
	if($this->input->post('submit')){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('pengguna/halaman',$data);
		} else{ $mail=$this->pengguna_model->lupa_pass(); 
				if ($mail == FALSE){
				$this->session->set_flashdata('message',"email '$m' tidak terdaftar");
				redirect('pengguna/lupa_pass');
				} else{
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://server250.web-hosting.com';
			$config['smtp_port'] = 465;
			$config['smtp_user'] = 'bos@dibumi.com';
			$config['smtp_pass'] = 'bos@dibumi.com';
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('bos@dibumi.com', 'BuyFish');
			$this->email->set_mailtype("html");
			$this->email->to("$m");       
			$this->email->subject('BuyFish - Lupa Password Anda?');
			foreach($mail as $m){
			$nama=$m->nama_user;
			$pesan = '<center><h1><a href="'.base_url().'pengguna/barang" ><font face="Curlz MT" color="#D2322D">BuyFish</font></a>
			<i> - Ganti Password Anda</i></h1>Hi '.$nama.'! <br>
			<a href="'.base_url().'pengguna/reset_pass/'.$m->id_user.'">Klik disini </a> untuk mengganti password anda';
			$this->email->message($pesan);
			}
			if($this->email->send()){
			   $this->session->set_flashdata('message','Kami telah kirim email dengan instruksi untuk mengatur ulang password anda.
											Cek email inbox Anda dan klik link yang diberikan.');
				redirect('pengguna/barang');
		   } else {
            show_error($this->email->print_debugger()); 
			}} }} else{
		$this->load->view('pengguna/halaman',$data);
		}
	}
function reset_pass($id_user){
	$data['title'] = "BuyFish | Login Pelanggan";
	$data['content']='pengguna/lupa_pass_ganti';
	$data['query'] = $this->pengguna_model->ambil_produk();
	$data['query1'] = $this->pengguna_model->ambil_nama();
	$data['em'] = $this->pengguna_model->ambil_email($id_user);
	$this->load->library('form_validation');
	if($this->input->post('submit')){
		$rules = array( array('field' => 'password', 'label' => 'Password', 'rules' => 'required|min_length[6]|matches[konfirmasi_password]'),
						array('field' => 'konfirmasi_password', 'label' => 'Konfirmasi Password', 'rules' => 'required'),
					);
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE) {
			$this->load->view('pengguna/halaman',$data);
		}
		else{
			$this->pengguna_model->gantipass();
			$this->pengguna_model->validate();
			 $simpan = $this->db->query("SELECT * FROM user WHERE email='".$this->input->post('email')."'");
			foreach($simpan->result_array() as $usr){
			$user = $usr['nama_user'];
				$data = array( 'email' => $this->input->post('email'),
								'user' => $user,
								'is_logged_in' => true );
			  $this->session->set_userdata($data);
			  $this->pengguna_model->insert_userchart();
			}
			  redirect('pengguna/barang');
		}
	} else{
		$this->load->view('pengguna/halaman',$data);
	}
}	
//----------------------------------PEMBAYARAN alamat----------------------------------------------------------------------------------------
/* function alamat(){
		
		$data['title'] = "BuyFish | Polling";
		$this->load->model('pengguna_model');
		$data['query'] = $this->pengguna_model->ambil_produk();
		$data['query1'] = $this->pengguna_model->ambil_nama();
		$this->load->view('pengguna/header-cekot',$data);
		$this->load->view('pengguna/alamat',$data);
} */
//----------------------------------PEMBAYARAN----------------------------------------------------------------------------------------


function login_bayar(){
		$data['title'] = "BuyFish | Login Pelanggan";
		$data['query'] = $this->pengguna_model->ambil_produk();
		if($this->input->post('submit')){
			$query = $this->pengguna_model->validate();
			if($query) // jika data user benar
			{	
			$simpan = $this->db->query("SELECT * FROM user WHERE email='".$this->input->post('email')."'");
			foreach($simpan->result_array() as $usr){
			$user = $usr['nama_user'];
				$data = array( 'email' => $this->input->post('email'),
								'user' => $user,
								'is_logged_in' => true );
			   $this->session->set_userdata($data);
			   $this->pengguna_model->insert_userchart();
			}
			   redirect('pengguna/bayar');
			} else // username atau password salah
			{
				$data['content']='pengguna/login_bayar';
				$data['title'] = "BuyFish | Login Pelanggan";
				$data['message'] = 'Email atau password anda salah';
				$this->load->model('pengguna_model');
				$data['query'] = $this->pengguna_model->ambil_produk();
				$this->load->view('pengguna/header-cekot',$data);
				$this->load->view('pengguna/login_bayar',$data);
				$this->load->view('pengguna/footer_cekot');
			  }
		}else{
			$data['message'] = '';
			$this->load->view('pengguna/header-cekot',$data);
			$this->load->view('pengguna/login_bayar',$data);
			$this->load->view('pengguna/footer_cekot');
			}
	}
 
function bayar(){
	$data['content']='pengguna/bayar';
	$this->load->library('cart');
	$data['title'] = "BuyFish | Bayar";
	$data['query'] = $this->pengguna_model->ambil_produk();
	$data['query1'] = $this->pengguna_model->ambil_nama();
	if($this->session->userdata('is_logged_in') == true){
		$data['dipakai'] = $this->pengguna_model->akunalamat_dipakai();
		} 
		$prov = $this->pengguna_model->getpropinsi();
		foreach ($prov as $d){
			$data['prp'][0]="-Pilih Propinsi-";
			$data['prp'][$d->propinsi_id]=$d->propinsi;
		}
		$this->load->view('pengguna/header-cekot',$data);
		$this->load->view('pengguna/bayar',$data);
		$this->load->view('pengguna/footer_cekot');
		
    }
	
function ambil_kab()
{
    $key = $this->input->post('key');
			$this->load->model('pengguna_model');
        $kab = $this->pengguna_model->ambil_kab($key);
		?> <script type="text/javascript">
	function fungsiambilkota(nilai){
           $.ajax({
                type: "POST",
                url: "<?php echo site_url('pengguna/ambil_ongkir');?>",
                data:"key="+nilai,
                success: function(data){
                    $("#ongkir").html(data);
					
                },
 
                error:function(XMLHttpRequest){
                    alert(XMLHttpRequest.responseText);
                }
 
            })
 
        };
</script>
	<?php
			
	    echo '<select  name="pilihkab" class="inputan" onChange="fungsiambilkota(this.value);" id="kab">';
		echo '<option> -Pilih kota- </option>';
        foreach ($kab as $row){
            echo '<option value="'.$row['kota_id'].'">'.$row['kota_kabupaten'].'</option>';
        }
        echo '</select>' ;
 }
 
 
function ambil_ongkir() {
		$ongkir =(int)$this->input->post('ongkir',true);
		$key = $this->input->post('key');
		$this->load->model('pengguna_model');
		$kab = $this->pengguna_model->ambil_tarif($key);
		$this->load->library('cart');	
	    foreach ($kab as $row){  
		$tarif = $row['tarif'];          
            echo '<p> ' .$this->cart->format_number($tarif) . '</p>';
		$jml=$this->cart->total();
		$total = $tarif+$jml;
        echo '<p><b>' .$this->cart->format_number($total).form_hidden('total_pesanan',$total). '</p>';
		}
	} 


function bayar_exe() {
	$data['title'] = "BuyFish | Checkout";
	$data['content']='pengguna/selesai_belanja';
	$q=$this->pengguna_model->cekidpesanan();	
	if($q->result_array()==TRUE ) { 
		redirect('pengguna/');
	}
	else{ $this->pengguna_model->pesanan_simpan();
	
		$eml=$this->session->userdata('email');
		$item[] = $this->cart->contents();
		$total = $this->cart->total();
		$tarif = $this->input->post('tarif');
		$tgl = $this->input->post('tgl_pesanan');
		$subtotal = $total + $tarif;
		$idpesanan = $this->input->post('id_pesanan');
		$nama = $this->input->post('nama');
		//-- KIRIM EMAIL --//
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://server250.web-hosting.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'bos@dibumi.com';
		$config['smtp_pass'] = 'bos@dibumi.com';
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('bos@dibumi.com', 'BuyFish');
		$this->email->set_mailtype("html");
		$this->email->to("$eml");       
		$this->email->subject("BuyFish - Detail Pembelian [".$idpesanan."]");
	
		$pesan = '<center><font size=4 face=ariel><b>Hei <font color=red><b>'.$nama.'</b></font>, Terimakasih telah melakukan pembelian di web kami BuyFish pada tanggal <font color=red><b>'.$tgl.'</b></font> dengan total pembelian <font color=red><b>Rp. '.$this->cart->format_number($subtotal).'</b></font> id pesanan anda adalah <font color=red><b>'.$idpesanan.'</b></font></b></font><br><br><font size=3 face=arial>Jika ada pertanyaan silahkan hubungi custemer service kami: 089666816527</font> </center>';
		$this->email->message($pesan);
		
		if($this->email->send()){
			$this->session->set_flashdata('message','Kami telah mengirim detail pesanan anda ke email '.$eml);
			redirect('pengguna/selesai_belanja');
		   } else {
            show_error($this->email->print_debugger()); 
			}
		
		}	 	
		redirect('pengguna/selesai_belanja');
}

function addbayar_exe() {
		$data['title'] = "BuyFish | Checkout";
		$data['query1'] = $this->pengguna_model->ambil_nama();
		$data['query'] = $this->pengguna_model->ambil_produk();
		$this->load->library('form_validation');
		$kota = $this->input->post('pilihkab');
		$tarif = $this->pengguna_model->ambil_tarif($kota);
		$eml=$this->session->userdata('email');
		
		$item[] = $this->cart->contents();
		$total = $this->cart->total();
		$tgl = $this->input->post('tgl_pesanan');
		$idpesanan = $this->input->post('id_pesanan');
		$nama = $this->input->post('nama');
		
		$rules = array( array('field' => 'nama','label' => 'Nama','rules' => 'required'),
						array('field' => 'hp','label' => 'Nomer Handphone','rules' => 'required'),
						array('field' => 'pilihkab','label' => 'Kota','rules' => 'required'),
						array('field' => 'alamat','label' => 'Alamat', 'rules' => 'required'),
				);
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE) {
				$data['content']='pengguna/bayar_bukualamat_add';
				$data['dipakai'] = $this->pengguna_model->akunalamat_dipakai();	
				$data['alamat'] = $this->pengguna_model->akunalamat();
				$prov = $this->pengguna_model->getpropinsi();
		foreach ($prov as $d){
			$data['prp'][0]="-Pilih Propinsi-";
			$data['prp'][$d->propinsi_id]=$d->propinsi;
		}
			$this->load->view('pengguna/halaman',$data); 
        }
        else {
			$this->pengguna_model->pesanan_addalamat();
			foreach ($tarif as $row){

		$subtotal = $total + $row['tarif'];
			
		//-- KIRIM EMAIL --//
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://server250.web-hosting.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'bos@dibumi.com';
		$config['smtp_pass'] = 'bos@dibumi.com';
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('bos@dibumi.com', 'BuyFish');
		$this->email->set_mailtype("html");
		$this->email->to("$eml");       
		$this->email->subject("BuyFish - Detail Pembelian [".$idpesanan."]");
	
		$pesan = '<center><font size=4 face=ariel><b>Hei <font color=red><b>'.$nama.'</b></font>, Terimakasih telah melakukan pembelian di web kami BuyFish pada tanggal <font color=red><b>'.$tgl.'</b></font> dengan total pembelian <font color=red><b>Rp. '.$this->cart->format_number($subtotal).'</b></font> id pesanan anda adalah <font color=red><b>'.$idpesanan.'</b></font></b></font><br><br><font size=3 face=arial>Jika ada pertanyaan silahkan hubungi custemer service kami: 089666816527</font> </center>';
		$this->email->message($pesan);
			}
		if($this->email->send()){
			$this->session->set_flashdata('message','Kami telah mengirim detail pesanan anda ke email '.$eml);
			redirect('pengguna/selesai_belanja');
		   } else {
            show_error($this->email->print_debugger()); 
			}
/* 			echo '<script language="javascript">';
			echo 'alert("message successfully'..' sent")';
			echo '</script>'; */
			
			//redirect('pengguna/selesai_belanja');
				
		
        }
}

//----------------------------------------------------bayar daftar------------------------------------------------------
function bayar_daftar_exe(){
	$data['title'] = "BuyFish | Checkout";
		$this->load->library('form_validation');
		$rules = array( array('field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email'),
						array('field' => 'password', 'label' => 'Password', 'rules' => 'required|min_length[6]|matches[konfirmasi_password]'),
						array('field' => 'konfirmasi_password', 'label' => 'Konfirmasi Password', 'rules' => 'required'),
						array('field' => 'nama', 'label' => 'Nama', 'rules' => 'required'),
						array('field' => 'hp', 'label' => 'Nomer Handphone', 'rules' => 'required'),
						array('field' => 'pilihkab', 'label' => 'Kota', 'rules' => 'required'),
						array('field' => 'alamat', 'label' => 'Alamat', 'rules' => 'required') ); 
		$this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == FALSE) {
				$data['content']='pengguna/bayar';
				$prov = $this->pengguna_model->getpropinsi();
				foreach ($prov as $d){
					$data['prp'][0]="-Pilih Propinsi-";
					$data['prp'][$d->propinsi_id]=$d->propinsi; 
					} 		
		$this->load->view('pengguna/header-cekot',$data);
		$this->load->view('pengguna/bayar',$data);
		$this->load->view('pengguna/footer_cekot');
        } else {	//daftar langsung login
				$this->pengguna_model->daftar_pesanan_simpan();
				$simpan = $this->db->query("SELECT * FROM user WHERE email='".$this->input->post('email')."'");
				foreach($simpan->result_array() as $usr){
				$user = $usr['nama_user'];
				$data = array( 'email' => $this->input->post('email'),
								'user' => $user,
								'is_logged_in' => true );
				$this->session->set_userdata($data);
				$this->pengguna_model->insert_userchart();
				}
				$eml=$this->session->userdata('email');
		$item[] = $this->cart->contents();
		$total = $this->cart->total();
		$tarif = $this->input->post('tarif');
		$tgl = $this->input->post('tgl_pesanan');
		$subtotal = $total + $tarif;
		$idpesanan = $this->input->post('id_pesanan');
		$nama = $this->input->post('nama');
		//-- KIRIM EMAIL --//
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://server250.web-hosting.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'bos@dibumi.com';
		$config['smtp_pass'] = 'bos@dibumi.com';
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('bos@dibumi.com', 'BuyFish');
		$this->email->set_mailtype("html");
		$this->email->to("$eml");       
		$this->email->subject("BuyFish - Detail Pembelian [".$idpesanan."]");
	
		$pesan = '<center><font size=4 face=ariel><b>Hei <font color=red><b>'.$nama.'</b></font>, Terimakasih telah melakukan pembelian di web kami BuyFish pada tanggal <font color=red><b>'.$tgl.'</b></font> dengan total pembelian <font color=red><b>Rp. '.$this->cart->format_number($subtotal).'</b></font> id pesanan anda adalah <font color=red><b>'.$idpesanan.'</b></font></b></font><br><br><font size=3 face=arial>Jika ada pertanyaan silahkan hubungi custemer service kami: 089666816527</font> </center>';
		$this->email->message($pesan);
		
		if($this->email->send()){
			$this->session->set_flashdata('message','Kami telah mengirim detail pesanan anda ke email '.$eml);
			redirect('pengguna/selesai_belanja');
		   } else {
            show_error($this->email->print_debugger()); 
			}
			
				redirect('pengguna/selesai_belanja');		
    }
}

//----------------------------------------------------Selesai------------------------------------------------------
function selesai_belanja() {
		$data['content']='pengguna/selesai_belanja';
		$data['title'] = "BuyFish | checkout";
		$this->load->library('cart');
		$this->cart->destroy();	
		$data['query'] = $this->pengguna_model->ambil_produk();
		$data['query1'] = $this->pengguna_model->ambil_nama();
		$data['det'] = $this->pengguna_model->selesai_belanja();
		$data['rekning'] = $this->admin_model->norek();
		$data['email'] = $email=$this->session->userdata('email');
	
		$this->load->view('pengguna/halaman',$data);	
	}
//-----------------------------------CARA BELANJA------------------------------------------------------------------------------------------
function carabelanja(){
		$data['title'] = "BuyFish | How to Shop";
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
		//$this->load->view('pengguna/menu_kiri');
		$this->load->view('pengguna/i-carabelanja',$data);
		$this->load->view('pengguna/footer');
}
//---------------------------------------------------------------Pengiriman--------------------------------------------------------------------
function pengiriman(){
		$data['title'] = "BuyFish | Pengiriman";
		$data['query'] = $this->pengguna_model->ambil_produk();
		$data['query1'] = $this->pengguna_model->ambil_nama();
		$data['query2'] = $this->pengguna_model->lihatpolling();
		$data['query4'] = $this->pengguna_model->polling();
		$data['query3'] = $this->pengguna_model->semuapolling();
		$data['id_polling']=$this->uri->segment(3);		
		$data['bukutamu'] = $this->pengguna_model->bukutamu();
		$data['barangbaru'] = $this->pengguna_model->barang();
		$data['lihatip'] = $this->pengguna_model->lihat_ip_polawal();
		//$data['semuabarang'] = $this->pengguna_model->semua_barang();
		$data['data'] = $this->admin_model->ongkos();
		$this->load->view('pengguna/header',$data);
		//$this->load->view('pengguna/menu_kiri');
		$this->load->view('pengguna/i-pengiriman',$data);
		$this->load->view('pengguna/footer');
}
//----------------------------------------------------------Cara Pembayaran---------------------------------------------------------------
function carapembayaran(){
		$data['title'] = "BuyFish | Pengiriman";
		$data['query'] = $this->pengguna_model->ambil_produk();
		$data['query1'] = $this->pengguna_model->ambil_nama();
		$data['query2'] = $this->pengguna_model->lihatpolling();
		$data['query4'] = $this->pengguna_model->polling();
		$data['query3'] = $this->pengguna_model->semuapolling();
		$data['id_polling']=$this->uri->segment(3);		
		$data['bukutamu'] = $this->pengguna_model->bukutamu();
		$data['barangbaru'] = $this->pengguna_model->barang();
		$data['lihatip'] = $this->pengguna_model->lihat_ip_polawal();
		$data['rekning'] = $this->admin_model->norek();
		//$data['semuabarang'] = $this->pengguna_model->semua_barang();
		$data['data'] = $this->admin_model->ongkos();
		$this->load->view('pengguna/header',$data);
		//$this->load->view('pengguna/menu_kiri');
		$this->load->view('pengguna/i-pembayaran',$data);
		$this->load->view('pengguna/footer');
}
function lokasi(){
		$data['title'] = "BuyFish | Pengiriman";
		$data['query'] = $this->pengguna_model->ambil_produk();
		$data['query1'] = $this->pengguna_model->ambil_nama();
		$data['query2'] = $this->pengguna_model->lihatpolling();
		$data['query4'] = $this->pengguna_model->polling();
		$data['query3'] = $this->pengguna_model->semuapolling();
		$data['id_polling']=$this->uri->segment(3);		
		$data['bukutamu'] = $this->pengguna_model->bukutamu();
		$data['barangbaru'] = $this->pengguna_model->barang();
		$data['lihatip'] = $this->pengguna_model->lihat_ip_polawal();
		$data['rekning'] = $this->admin_model->norek();
		//$data['semuabarang'] = $this->pengguna_model->semua_barang();
		$data['data'] = $this->admin_model->ongkos();
		$this->load->view('pengguna/header',$data);
		//$this->load->view('pengguna/menu_kiri');
		$this->load->view('pengguna/i-lokasi',$data);
		$this->load->view('pengguna/footer');
}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
/* nama filenya sama dengan perintah config/routes.php */