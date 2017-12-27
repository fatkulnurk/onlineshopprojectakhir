<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pengguna_model extends CI_Model{
public	function _construct()
	{ parent::_construct();
	}	
	
//------------------ B U K U T A M U --------------------------------

function bukutamu_simpan() {
		$data = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'komentar' => $this->input->post('komentar'),
			'tgl' => $this->input->post('tgl')
		);
		$simpan = $this->db->insert('buku_tamu',$data);
		return $simpan;
		
	}
	
function ambil_bukutamu($num, $offset) {
		$this->db->order_by('tgl', 'DESC');
		$data = $this->db->get('buku_tamu',$num,$offset);
		return $data->result();
	 }
	 
function bukutamu() {
		$query=$this->db->query("SELECT * FROM buku_tamu LIMIT 3");
		return $query;
	 }
//------------------------------------------------- B A R A N G ----------------------------------------------------------------------------------------
function ambil_barang($offset, $limit) {		
		$query=$this->db->query("SELECT * FROM barang,produk WHERE produk.id_produk=barang.id_produk  ORDER BY barang.tgl DESC LIMIT $offset, $limit");
		return $query; } 
	 
function total_barang() {
		$query=$this->db->query("SELECT * FROM barang");
		return $query; }

function detail_barang($id_barang) {
		$query=$this->db->query("SELECT * FROM barang,produk WHERE barang.id_barang='$id_barang' AND produk.id_produk=barang.id_produk ");
		return $query; }
	 
 function ambil_produk() {
 $query=$this->db->query("SELECT * FROM produk ORDER BY nama_produk ASC "); 
 return $query->result();
	 }
	 
//------------------------------------------------- KERANJANG ----------------------------------------------------------------------------------------
function stok() { 													//belum tuntas
		$query=$this->db->query("SELECT * FROM barang ");
		return $query;
	 }

function ambil_gambar() {
		$gambar=$this->db->query("SELECT * FROM barang ");
		return $gambar;
	 }
	 
	 
	 
//----------------------------------------- K A T E G O R I / P R O D U K ------------------------------------------------------------------------
function kategori($id_produk){
$query=$this->db->query("SELECT * FROM barang,produk WHERE barang.id_produk='$id_produk' AND produk.id_produk=barang.id_produk;");
		return $query; } 

function kategori_barang($id_produk){
$query=$this->db->query("SELECT * FROM barang,produk WHERE barang.id_produk='$id_produk' AND produk.id_produk=barang.id_produk GROUP BY produk.id_produk");
		return $query;
} 
	 
	 

//------------------------------------------------- K O M E N T A R ----------------------------------------------------------------------------------------

function ambil_komentar($id_barang ) {		
		$query=$this->db->query("SELECT * FROM komentar, user WHERE komentar.id_barang = '$id_barang' AND komentar.id_user = user.id_user ORDER BY komentar.tgl_komentar DESC");
		return $query;
	 } 
function total_komentar() {
		$query=$this->db->query("SELECT * FROM komentar");
		return $query;
}

function ambil_nama() {		
$id=$this->session->userdata('email');
		$query=$this->db->query("SELECT * FROM user WHERE email='$id'");
		return $query;
	 }
	 
function komentar_simpan() {
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'id_barang' => $this->input->post('id_barang'),
			'komentar' => $this->input->post('komentar'),
			'tgl_komentar' => $this->input->post('tgl_komentar')
		);
		$simpan = $this->db->insert('komentar',$data);
		return $simpan;
		
	}
	 

//---------------------------K E R A N J A N G --------------------------------------------

function add_keranjang($id_barang)
	{
		$query = $this->db->get_where('barang', array('id_barang'=>$id_barang));
		return $query->row();
		}
		
//----------------------------------------- R E G I S T R A S I--------------------------------------------------------------------------------

function registrasi_simpan() {
		$data = array(
			'email' => $this->input->post('email'),
			'nama_user'=> $this->input->post('nama_awal'),
			'password'=>md5($this->input->post('password')),
			'tgl_registrasi' => $this->input->post('tgl')
		);
		$simpan = $this->db->insert('user',$data);
		return $simpan;
		
	}
	
//----------------------------------------- L O G I N--------------------------------------------------------------------------------	
  function validate()
 {
  $this->db->where('email', $this->input->post('email'));
  $this->db->where('password', md5($this->input->post('password')));
  $query = $this->db->get('user');
  if($query->num_rows == 1)
  {
   return true;
  }
  
 } 
 
 //---------------------------------------------------------------PESANAN-------------------------------------------------------------
 function pesanan_simpan() {
		$alamat = array(
			'kota_id' => $this->input->post('pilihkab'),
			'alamat' => $this->input->post('alamat'),
			'id_user' => $this->input->post('id_user')
		);
		$simpan = $this->db->insert('alamat',$alamat);
		$simpan=$this->db->query("SELECT * FROM alamat ORDER BY id_alamat DESC LIMIT 1");
		foreach($simpan->result_array() as $id){
		$id_alamat = $id['id_alamat'];
		}		
		$pesanan = array(
			'id_pesanan' => $this->input->post('id_pesanan'),
			'id_user' => $this->input->post('id_user'),
			'nama' => $this->input->post('nama'),
			'id_alamat' => "$id_alamat",
			'hp' => $this->input->post('hp'),
			'total_pesanan' => $this->input->post('total_pesanan'),
			'tgl_pesanan' => $this->input->post('tgl_pesanan')
		);
		$simpan = $this->db->insert('pesanan',$pesanan);
		$simpan=$this->db->query("SELECT * FROM pesanan ORDER BY tgl_pesanan DESC LIMIT 1");
		foreach($simpan->result_array() as $ps){
		$id_pesanan = $ps['id_pesanan'];
		}
		
		$total = $this->cart->total_items();
		$brg = $this->input->post('id_barang');
		$qty = $this->input->post('qty');
		for($i=0;$i< $total; $i++)
		{
		$detail = array(
			'id_detail' => "null",
			'id_pesanan' => "$id_pesanan",
			'id_barang' => $brg[$i],
			'qty' => $qty[$i]
		);
		$simpan = $this->db->insert('pesanan_det',$detail);
		}
		
		return $simpan;
		
	} 

function daftar_pesanan_simpan() {
		$user = array(
			'email' => $this->input->post('email'),
			'nama_user'=> $this->input->post('nama'),
			'password'=>md5($this->input->post('password')),
			'tgl_registrasi' => $this->input->post('tgl_registrasi')
		);	$simpan = $this->db->insert('user',$user);
		  $this->db->where('email', $this->input->post('email'));
 /* $login
  $this->db->where('password', md5($this->input->post('password')));
  $query = $this->db->get('user');
  if($query->num_rows == 1)
  {
   return true;
  } */
			$simpan = $this->db->query("SELECT * FROM user ORDER BY id_user DESC LIMIT 1");
		foreach($simpan->result_array() as $usr){
		$id_user = $usr['id_user'];
		}
		$alamat = array(
			'kota_id' => $this->input->post('pilihkab'),
			'alamat' => $this->input->post('alamat'),
			'id_user' => "$id_user",
		);	$simpan = $this->db->insert('alamat',$alamat);
			$simpan=$this->db->query("SELECT * FROM alamat ORDER BY id_alamat DESC LIMIT 1");
		foreach($simpan->result_array() as $id){
		$id_alamat = $id['id_alamat'];
		$id_user = $id['id_user'];
		}		
		$pesanan = array(
			'id_pesanan' => $this->input->post('id_pesanan'),
			'id_user' => "$id_user",
			'nama' => $this->input->post('nama'),
			'id_alamat' => "$id_alamat",
			'hp' => $this->input->post('hp'),
			'total_pesanan' => $this->input->post('total_pesanan'),
			'tgl_pesanan' => $this->input->post('tgl_pesanan')
		);
		$simpan = $this->db->insert('pesanan',$pesanan);
		$simpan=$this->db->query("SELECT * FROM pesanan ORDER BY tgl_pesanan DESC LIMIT 1");
		
		foreach($simpan->result_array() as $ps){
		$id_pesanan = $ps['id_pesanan'];
		}
		$total = $this->cart->total_items();
		$brg = $this->input->post('id_barang');
		$qty = $this->input->post('qty');
		for($i=0;$i< $total; $i++)
		{
		$detail = array(
			'id_detail' => "null",
			'id_pesanan' => "$id_pesanan",
			'id_barang' => $brg[$i],
			'qty' => $qty[$i]
		);
		$simpan = $this->db->insert('pesanan_det',$detail);
		}		return $simpan;	
	}
	
function alamat_kirim(){
	$id=$this->session->userdata('email');	
	$query2=$this->db->query("SELECT * FROM user WHERE id_user='$id'");
/* 	foreach($query2->result_array() as $user){
		$iu= $user['id_user']; }
	$query2=$this->db->query("SELECT * FROM alamat WHERE id_user='$iu'"); */
	return $query2; 
	}
	
//---------------------------------------------------------------DETAIL PESANAN-------------------------------------------------------------
function detail_pesanan() {	
		$id=$this->session->userdata('email');
		$query=$this->db->query("SELECT * FROM user WHERE email='$id'");
		foreach($query->result_array() as $user){
		$iu= $user['id_user']; }
		$query=$this->db->query("SELECT * FROM pesanan WHERE id_user='$iu' ORDER BY tgl_pesanan DESC");
		return $query;	
	 }
 
 
 //-----------------------------------------POLLING--------------------------------------------------------------------------------	
 function jwb()
 {
 $jawaban=$this->db->query("Select max(jumlah) from polling_jawaban;");
 return $jawaban;
 }

 function polling()
 {
 $query4=$this->db->query("SELECT * FROM polling_pertanyaan ORDER BY idtanya DESC LIMIT 1");
 return $query4;
 }
 
function lihatpolling() {
	$query2=$this->db->query("SELECT * FROM polling_pertanyaan ORDER BY idtanya DESC LIMIT 1");
	foreach($query2->result_array() as $poll){
		$idtanya = $poll['idtanya']; 
		}
	$query2=$this->db->query("SELECT * FROM polling_jawaban WHERE idtanya='$idtanya'");
	return $query2;
 }
 
function semuapolling() {
	$query3=$this->db->query("SELECT * FROM polling_pertanyaan ORDER BY idtanya");
	return $query3;
 }
 
function hitungpolling($jwb){
	$query=$this->db->query("UPDATE polling_jawaban SET jumlah=jumlah+1 WHERE nomor='$jwb'");
	return $query;
	
 }
 
  function polling_sebelumnya($idtanya)
 {
 $query4=$this->db->query("SELECT * FROM polling_pertanyaan WHERE idtanya='$idtanya'");
 return $query4;
 }
 
 function lihatpolling_sebelumnya($idtanya)
 {
 $query2=$this->db->query("SELECT * FROM polling_pertanyaan WHERE idtanya='$idtanya'");
	foreach($query2->result_array() as $poll){
		$idtanya = $poll['idtanya']; 
		}
	$query2=$this->db->query("SELECT * FROM polling_jawaban WHERE idtanya='$idtanya'");
	return $query2;
 }
 
 
 
 //------------------------------------KOTA-------------------------------------------------------------------------
 	function getpropinsi(){
		return $this->db->get('propinsi')->result();
		}
	
	function ambil_kab($key) {
      return $this->db->get_where('propinsi_kota', array('propinsi_id' => $key))->result_array();
	  }
 
 	function ambil_tarif($key) {
      return $this->db->get_where('propinsi_kota', array('kota_id' => $key))->result_array();
	  }
  
 
 
}
