<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_login extends CI_Controller {
       function __construct()
 {
         session_start(); //mengadakan session
  parent::__construct();
  $this->load->library("session");
  		$this->load->helper('form','url','html','text','date');
		$this->load->model('admin_model');
		$this->load->model('pengguna_model');
 } 
  
public function index() {
	$data['title'] = 'L O G I N';
	$data['content'] = 'admin_login';
	$this->load->view('admin/login', $data); 
}

function validate_credentials() { 
  $this->load->model('admin_model');
  $query = $this->admin_model->validate();
   
  if($query) // jika data user benar
  {
   $data = array(
    'username' => $this->input->post('username'),
    'is_logged_in' => true
   );
   $this->session->set_userdata($data);
   $this->admin_model->insert_userchart();
   redirect('admin/beranda');
  }
  else // username atau password salah
  {
   $this->index();
  }
 } 
	
function logout() {
  $this->admin_model->delete_seschart();
  $this->admin_model->delete_userchart();
  $this->session->sess_destroy();
  $this->index();
}





//-----------------------------------------------------------STATISTIK TRANSAKSI---------------------------------------------------------------------
function statistik_transaksi(){
		$data['content']='admin/transaksi_chart';
		$data['title'] = "Statistik Penjualan";
		$data['chart'] = $this->chart();
		$this->load->view('admin/halaman', $data);
}
function chart() {
		//get data
		//$this->load->model('pengguna_model');
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
}