<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna_forum extends CI_Controller {
	public function _construct()
	
	{
	session_start();
		parent::_construct();
		}
		
function index() {
		
		$data['title']='BuyFish';
		$this->load->model('pengguna_model');
		$this->load->library('pagination');
		$page=$this->uri->segment(3);
		  $limit = 15;      
		  if(!$page){
			$offset = 0;
		  }else{
			$offset = $page;
		  }     
			$jml = $this->db->get('forum_topik');  
			$config['base_url'] = base_url() . '/pengguna_forum';
			$config['total_rows'] = $jml->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'first';
			$config['last_link'] = 'last';
			$config['next_link'] = '>';
			$config['prev_link'] = '<';
			$this->pagination->initialize($config);           
			$data["paginator"] = $this->pagination->create_links();
	  $data['data'] = $this->pengguna_model->forum($offset, $limit);
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
	  $this->load->view('pengguna/forum',$data);
	  $this->load->view('pengguna/footer'); 	
	}

function topik_add(){
		$data['title'] = "JuraganIkan | Forum";
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
		$this->load->view('pengguna/forum_topik',$data);
		$this->load->view('pengguna/footer');
	}
function topik_add_exe(){
		$this->load->library('form_validation');
		$this->load->model('pengguna_model');
		$rules = array( array('field' => 'topik', 'label' => 'Topik', 'rules' => 'required'),
						array('field' => 'isi', 'label' => 'Isi', 'rules' => 'required'),
					);
        $this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
			redirect('pengguna_forum/topik_add');
        }	else{ //sukses
			$data['query1'] = $this->pengguna_model->ambil_nama();
			$data['query'] = $this->pengguna_model->ambil_produk();
			$data['query2'] = $this->pengguna_model->lihatpolling();
			$data['query4'] = $this->pengguna_model->polling();
			$data['query3'] = $this->pengguna_model->semuapolling();
			$data['id_polling']=$this->uri->segment(3);
			$data['bukutamu'] = $this->pengguna_model->bukutamu();
			$data['barangbaru'] = $this->pengguna_model->barang();
			 $data['lihatip'] = $this->pengguna_model->lihat_ip_polawal();
			$this->pengguna_model->forum_simpan();
			redirect('pengguna_forum');
        }
}
function forum_replay($id_topik){
		$data['title'] = "JuraganIkan | Forum";
		$this->load->model('pengguna_model');
		$data['query'] = $this->pengguna_model->ambil_produk();
		$data['query1'] = $this->pengguna_model->ambil_nama();
		$data['query2'] = $this->pengguna_model->lihatpolling();
		$data['query4'] = $this->pengguna_model->polling();
		$data['query3'] = $this->pengguna_model->semuapolling();
		$data['id_polling']=$this->uri->segment(3);
		$data['bukutamu'] = $this->pengguna_model->bukutamu();
		$data['barangbaru'] = $this->pengguna_model->barang();
		 $data['lihatip'] = $this->pengguna_model->lihat_ip_polawal();
		$data['topik'] = $this->pengguna_model->topik($id_topik);
		$data['replay'] = $this->pengguna_model->forum_replay($id_topik);
		$rep = $this->pengguna_model->forum_replay($id_topik);
		$data['total'] = $rep->num_rows();
		$this->load->view('pengguna/header',$data);
		$this->load->view('pengguna/menu_kiri');
		$this->load->view('pengguna/forum_replay',$data);
		$this->load->view('pengguna/footer');	
	}
	
function forum_replay_exe(){
		$this->load->library('form_validation');
		$this->load->model('pengguna_model');
		$id_topik = $this->input->post('id_topik');
		$rules = array( array('field' => 'isi_replay', 'label' => 'Isi', 'rules' => 'required'),
					);
        $this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
		
			redirect("pengguna_forum/forum_replay/$id_topik");
        }	else{ //sukses
			$data['query1'] = $this->pengguna_model->ambil_nama();
			$data['query'] = $this->pengguna_model->ambil_produk();
			$data['query2'] = $this->pengguna_model->lihatpolling();
			$data['query4'] = $this->pengguna_model->polling();
			$data['query3'] = $this->pengguna_model->semuapolling();
			$data['query5'] = $this->pengguna_model->hitungreplay($id_topik);
			$data['id_polling']=$this->uri->segment(3);
			$data['bukutamu'] = $this->pengguna_model->bukutamu();
			$this->pengguna_model->forumreplay_simpan();
			
			redirect("pengguna_forum/forum_replay/$id_topik");
        }
}


//---------------------------------------------------------------------FORUM (ADMIN)--------------------------------------------------------------
function admin_forum() {
		
		$data['title']='JuraganIkan';
		$this->load->model('pengguna_model');
		$this->load->library('pagination');
		$page=$this->uri->segment(3);
		  $limit = 30;      
		  if(!$page){
			$offset = 0;
		  }else{
			$offset = $page;
		  }     
			$jml = $this->db->get('forum_topik');  
			$config['base_url'] = base_url() . '/pengguna_forum/admin_forum';
			$config['total_rows'] = $jml->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'first';
			$config['last_link'] = 'last';
			$config['next_link'] = '>';
			$config['prev_link'] = '<';
			$this->pagination->initialize($config);           
			$data["paginator"] = $this->pagination->create_links();
	  $data['data'] = $this->pengguna_model->forum($offset, $limit); 
	  $data['total'] = $jml->num_rows();

	  $this->load->view('admin/header_admin',$data);
	  $this->load->view('admin/forum',$data);
	  $this->load->view('admin/footer'); 	
	}
	
function topik_del(){
	$this->load->model('admin_model');
	$this->admin_model->topik_del($id_topik);
	redirect("pengguna_forum/admin_forum");
}
function admin_topikadd(){
		$data['title'] = "JuraganIkan | Forum";
		$data['content'] = 'admin/forum_topik';	
		$this->load->model('pengguna_model');
		$data['query1'] = $this->pengguna_model->ambil_nama();			
		$this->load->view('admin/halaman',$data);
	}	
function admin_topikadd_exe(){
		$this->load->library('form_validation');
		$this->load->model('pengguna_model');
		$rules = array( array('field' => 'topik', 'label' => 'Topik', 'rules' => 'required'),
						array('field' => 'isi', 'label' => 'Isi', 'rules' => 'required'),
					);
        $this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
			redirect('pengguna_forum/admin_topikadd');
        }	else{ //sukses
			$data['id_polling']=$this->uri->segment(3);
			$this->pengguna_model->forum_simpan();
			redirect('pengguna_forum/admin_forum');
        }
}
function admin_forum_replay($id_topik){
		$data['title'] = "JuraganIkan | Forum";
		$data['content'] = 'admin/forum_replay';
		$this->load->model('pengguna_model');
		$data['topik'] = $this->pengguna_model->topik($id_topik);
		$data['replay'] = $this->pengguna_model->forum_replay($id_topik);
		$rep = $this->pengguna_model->forum_replay($id_topik);
		$data['total'] = $rep->num_rows();
		$this->load->view('admin/halaman',$data);	
	}
	
function admin_forumreplay_exe(){
		$this->load->library('form_validation');
		$this->load->model('pengguna_model');
		$id_topik = $this->input->post('id_topik');
		$rules = array( array('field' => 'isi_replay', 'label' => 'Isi', 'rules' => 'required'),
					);
        $this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
		
			redirect("pengguna_forum/admin_forum_replay/$id_topik");
        }	else{ //sukses
			$data['query5'] = $this->pengguna_model->hitungreplay($id_topik);
			$this->pengguna_model->forumreplay_simpan();
			
			redirect("pengguna_forum/admin_forum_replay/$id_topik");
        }
	}

}

/* End of file welcome.php */
