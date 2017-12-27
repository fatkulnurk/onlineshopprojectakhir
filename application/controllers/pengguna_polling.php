<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pengguna_polling extends CI_Controller {

		 function __construct() 
	
	{
		parent::__construct();
		//$this->is_logged_in();
		$this->load->library("session");
		$this->load->helper(array('url', 'form', 'date', 'html'));
		$this->load->model(array('pengguna_model', 'admin_model'));
		$this->load->library('cart', 'form_validation');
		//session_start();
		}
		
function index() {
		$data['title'] = "JuraganIkan | Polling";
		//$this->load->model('pengguna_model');
		$data['query1'] = $this->pengguna_model->ambil_nama();
		$data['query'] = $this->pengguna_model->ambil_produk();
		$data['query2'] = $this->pengguna_model->lihatpolling();
		$data['query3'] = $this->pengguna_model->semuapolling();
		$data['query4'] = $this->pengguna_model->polling();
		$data['lihatip'] = $this->pengguna_model->lihat_ip_polawal();
		$data['bukutamu'] = $this->pengguna_model->bukutamu();
		$data['barangbaru'] = $this->pengguna_model->barang();
		$data['id_polling']=$this->uri->segment(3);
		$data['chart'] = $this->create_bar_chart();
		$this->load->view('pengguna/header', $data);
		$this->load->view('pengguna/menu_kiri');
		$this->load->view('pengguna/polling', $data);
		$this->load->view('pengguna/footer');
	}

function create_bar_chart() {
		//get data
		$this->load->model('pengguna_model');
		$query = $this->pengguna_model->lihatpolling();
		$query4 = $this->pengguna_model->polling();
		$jawaban = $this->pengguna_model->jwb();
		$label = array();
		$data = array();
			
		//generate bar
		$this->load->library('graph');
		$bar = new bar_outline( 50, '#9933CC', '#8010A0' );
		$bar->key( '', 10 );
		//posisi menbuat data harus setelah load library dan bar di set 

		foreach ($query->result_array() as $value){
		$label[] = $value['jawaban'];
		$bar->data[] = $value['jumlah'];
		}


		$ff = new graph();
		$ff->title( 'Hasil Polling ', '{font-size: 20px;}' );
		//set data
		$ff->data_sets[] = $bar;
		//set label
		$ff->set_x_labels( $label);
		//
		// set the X axis to show every 2nd label:
		//
		$ff->set_x_label_style( 10, '#9933CC', 0, 1 );
		//
		// and tick every second value:
		//
		$ff->set_x_axis_steps( 2 );
		//
		foreach ($jawaban->result_array() as $jwb){
		$jml = $jwb['max(jumlah)'] + 10;
		}
		
		$ff->set_y_max( $jml );
		$ff->y_label_steps( 4 );
		$ff->set_y_legend( 'Jumlah', 8, '#736AFF' );
		$ff->width = '400';
		//tambahan sintaks yang tidak ada di manual OFC
		$ff->set_output_type('js');
		return $ff->render();
	}

function pilih_polling() {
	$data['content']='pengguna/polling';
	$data['title'] = "JuraganIkan | Polling";
	$jwb= $this->input->post('nomor');
	$this->load->model('pengguna_model');
	$data['query'] = $this->pengguna_model->ambil_produk();
	$data['query1'] = $this->pengguna_model->ambil_nama();
	$data['query2'] = $this->pengguna_model->lihatpolling();
	$data['query4'] = $this->pengguna_model->polling();
	$data['query3'] = $this->pengguna_model->semuapolling();
	$data['query']=$this->pengguna_model->hitungpolling($jwb);
	$idtanya = $this->input->post('id_polling');
	redirect("pengguna_polling/polling_sebelumnya/$idtanya",$data);	 
}

function polling_sebelumnya($idtanya){
		$data['content']='pengguna/polling';
		$data['title'] = "JuraganIkan | Polling";
		$this->load->model('pengguna_model');
		$data['query'] = $this->pengguna_model->ambil_produk();
		$data['query1'] = $this->pengguna_model->ambil_nama();
		$data['query2'] = $this->pengguna_model->lihatpolling_sebelumnya($idtanya);
		$data['query4'] = $this->pengguna_model->polling_sebelumnya($idtanya);
		$data['query3'] = $this->pengguna_model->semuapolling();
		$data['id_polling']=$this->uri->segment(3);
		$data['chart'] = $this->polling_sebelumnya_chart($idtanya);
		$data['lihatip'] = $this->pengguna_model->lihat_ip($idtanya);
		$data['bukutamu'] = $this->pengguna_model->bukutamu();
		$data['barangbaru'] = $this->pengguna_model->barang();
		$this->load->view('pengguna/header', $data);
		$this->load->view('pengguna/menu_kiri');
		$this->load->view('pengguna/polling', $data);
		$this->load->view('pengguna/footer');
}

function polling_sebelumnya_chart($idtanya) {
		//get data
		$this->load->model('pengguna_model');
		$query = $this->pengguna_model->lihatpolling_sebelumnya($idtanya);
		$query4 = $this->pengguna_model->polling_sebelumnya($idtanya);
		$jawaban = $this->pengguna_model->jwb();
		$label = array();
		$data = array();
		
		
		//generate bar
		$this->load->library('graph');
		$bar = new bar_outline( 50, '#9933CC', '#8010A0' );
		$bar->key( '', 10 );
		//posisi menbuat data harus setelah load library dan bar di set 

		foreach ($query->result_array() as $value){
		$label[] = $value['jawaban'];
		$bar->data[] = $value['jumlah'];
		}

		$ff = new graph();
		$ff->title( 'Hasil Polling ', '{font-size: 12px;}' );
		//set data
		$ff->data_sets[] = $bar;
		//set label
		$ff->set_x_labels( $label);
		//
		// set the X axis to show every 2nd label:
		//
		$ff->set_x_label_style( 10, '#9933CC', 0, 1 );
		//
		// and tick every second value:
		//
		$ff->set_x_axis_steps( 2 );
		//
		foreach ($jawaban->result_array() as $jwb){
		$jml = $jwb['max(jumlah)'] + 10;
		}
		
		$ff->set_y_max( $jml );
		$ff->y_label_steps( 4 );
		$ff->set_y_legend( 'Jumlah', 8, '#736AFF' );
		$ff->width = '400';
		//tambahan sintaks yang tidak ada di manual OFC
		$ff->set_output_type('js');
		return $ff->render();
	}
	
//------------------------------------------------ADMIN--------------------------------------------------------------------------------------------------------

function polling_adm(){
	$data['content'] = 'admin/polling';
	$data['title'] = 'ADMIN | Daftar Data Polling';
	 $this->load->model('admin_model');
  $data['query'] = $this->admin_model->ambil_polling(); 
  $this->load->view('admin/halaman', $data);
	}
function polling_add(){
		$data['content'] = 'admin/polling_add';
		$data['title'] = "Tambah Pertanyaan Polling";
		$this->load->view('admin/halaman', $data);
	}	

function polling_add_exe(){
		$data['content'] = 'admin/polling_add';
				$rules = array( array('field' => 'pertanyaan', 'label' => 'Pertanyaan Polling', 'rules' => 'required'),
						 array('field' => 'jawaban[]', 'label' => 'Pilihan jawaban polling', 'rules' => 'required'),
						);
		$this->load->library('form_validation');
        $this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) { 
			?> <script type = "text/javascript" language = "javascript">
				alert("Data tidak lengkap");
				</script> <?php
			echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."pengguna_polling/polling_add'>";
			die(); 
        } else {
		$this->admin_model->polling_simpan();
		$data['title'] = "Tambah Pertanyaan Polling";
		$this->load->view('admin/halaman', $data);
		?> <script type = "text/javascript" language = "javascript">
				alert("Polling berhasil ditambahkan");
				</script>
				<?php echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."pengguna_polling/polling_adm'>";
			die(); 
	}
	}

function polling_del($idtanya){
	//$this->load->model('admin_model');
	$this->admin_model->polling_delete($idtanya);
	  redirect("pengguna_polling/polling_adm");
}

function reset_hasil($idtanya){
		$this->load->model('admin_model');
		$this->admin_model->polling_reset($idtanya);
		redirect("pengguna_polling/polling_sebelumnya_adm/$idtanya");
}



function chart_pemilih() {
		//get data
		$this->load->model('pengguna_model');
		$query = $this->pengguna_model->lihatpolling();
		$query4 = $this->pengguna_model->polling();
		$jawaban = $this->pengguna_model->jwb();
		$label = array();
		$data = array();
		
		foreach ($query4->result_array() as $tny){
		$pertanyaan = $tny['pertanyaan'];
		}
		
		//generate bar
		$this->load->library('graph');
		$bar = new bar_outline( 50, '#9933CC', '#8010A0' );
		$bar->key( $pertanyaan, 10 );
		//posisi menbuat data harus setelah load library dan bar di set 

		foreach ($query->result_array() as $value){
		$label[] = $value['jawaban'];
		$bar->data[] = $value['jumlah'];
		}


		$ff = new graph();
		$ff->title( 'Hasil Polling ', '{font-size: 20px;}' );
		//set data
		$ff->data_sets[] = $bar;
		//set label
		$ff->set_x_labels( $label);
		//
		// set the X axis to show every 2nd label:
		//
		$ff->set_x_label_style( 10, '#9933CC', 0, 1 );
		//
		// and tick every second value:
		//
		$ff->set_x_axis_steps( 2 );
		//
		foreach ($jawaban->result_array() as $jwb){
		$jml = $jwb['max(jumlah)'] + 10;
		}	
		$ff->set_y_max( $jml );
		$ff->y_label_steps( 4 );
		$ff->set_y_legend( 'Jumlah', 8, '#736AFF' );
		$ff->width = '400';
		//tambahan sintaks yang tidak ada di manual OFC
		$ff->set_output_type('js');
		return $ff->render();
	}
function polling_sebelumnya_adm($idtanya){
		$data['content']='admin/polling_detail';
		$data['title'] = "JuraganIkan | Admin-Polling";
		$this->load->model('pengguna_model');
		$data['jawaban'] = $this->pengguna_model->lihatpolling_sebelumnya($idtanya);
		$data['pertanyaan'] = $this->pengguna_model->polling_sebelumnya($idtanya);
		$data['chart'] = $this->polling_sebelumnya_chart($idtanya);
		$this->load->view('admin/halaman', $data);
}
function polling_edit($idtanya){
	 $data['content'] = 'admin/polling_edit';
	 $data['title'] = 'Ubah Data Polling';
	 $this->load->model('pengguna_model');
	 $data['jawaban'] = $this->pengguna_model->lihatpolling_sebelumnya($idtanya);
 	 $data['pertanyaan'] = $this->pengguna_model->polling_sebelumnya($idtanya);
	 $this->load->view('admin/halaman', $data);
}
function polling_edit_exe(){
	 $data['title'] = 'Ubah Data Barang';  
	 $this->load->model('admin_model');
	 $idtanya= $this->input->post('idtanya');
	 $this->admin_model->polling_edit_exe($idtanya);
	 redirect("pengguna_polling/polling_sebelumnya_adm/$idtanya");
} 
}

/* End of file welcome.php */
