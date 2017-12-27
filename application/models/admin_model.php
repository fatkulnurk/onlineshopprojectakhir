<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model{
public	function _construct()
	{ parent::_construct();
	}
	
	
function validate()
 {
  $this->db->where('username', $this->input->post('username'));
  $this->db->where('password', md5($this->input->post('password')));
  $query = $this->db->get('admin');
   
  if($query->num_rows == 1)
  {
   return true;
  }
 }	
 
 //---------- Insert chat user ------ //
function insert_userchart() {
$userchat = $this->session->userdata('username');;
$data = array(
			'user' => $userchat
		);
		$simpan = $this->db->insert('user_login',$data);
	return $simpan; 
}

//---------- delete chat user ------ //
function delete_userchart() {
$userchat = $this->session->userdata('username');
$query=$this->db->query("DELETE FROM user_login WHERE user='$userchat'");
		return $query; 
}

function id_user() {
$id=0;
$id_user = $this->session->userdata('username');
		$query=$this->db->query("SELECT id FROM user_login where user='$id_user'");
		if($query->num_rows()>0)
		{
			$row = $query->row_array();
			$id= $row['id'];
		}
		return $id; }
	
function delete_seschart() {
$userchat = $this->pengguna_model->id_user();
$query=$this->db->query("DELETE FROM frei_session WHERE session_id='$userchat'");
		return $query; 
}
 
//------------------ P R O D U K -----------------------------------------------------------------------------------------------------------------------
function produk_simpan() {
	$kat=$this->input->post('nama_produk');
	$simpan=$this->db->query("SELECT * FROM produk WHERE nama_produk='$kat'");
	if($simpan->result_array()==FALSE){
		$data = array( 'nama_produk' => "$kat" );
		$simpan = $this->db->insert('produk',$data);	
	}else{?>
		<script type = "text/javascript" language = "javascript"> 
		alert("Kategori sudah ada!");</script><?php
		echo"<meta http-equiv = 'refresh' content = '0; url = ".base_url()."admin/produk_add'>";
		die(); 
	}return $simpan;
	}
 function ambil_produk() {
		$this->db->order_by('nama_produk', 'ASC');
		$data = $this->db->get('produk');
		return $data->result();
	 }

	
function produk_del($id_produk){
		$query=$this->db->query("DELETE FROM produk WHERE id_produk='$id_produk'");
	}
	
function produk_edit($id_produk) {
	$tampil="SELECT * FROM produk WHERE id_produk ='$id_produk'";
	$query = $this->db->query($tampil);
	return $query->row();
	}
	
function produk_edit_exe($id_produk, $nama_produk)
{
	$data = array(
			'id_produk' => $id_produk,
			'nama_produk' => $nama_produk
		);
		$this->db->where('id_produk',$id_produk);
		$this->db->update('produk',$data);
}

//------------------ B A R A N G -----------------------------------------------------------------------------------------------------------------

function barang_simpan($data) {
		$query = $this->db->insert('barang', $data);
		return $query;		
	}

function ambil_barang() {		
		$query=$this->db->query("SELECT * FROM barang,produk WHERE produk.id_produk=barang.id_produk AND barang.sts='1' ORDER BY barang.id_barang DESC");
		return $query;
	 }  
	 
function barang_del($id_barang) {
	  $query=$this->db->query("UPDATE barang SET sts='0' WHERE id_barang='$id_barang'");
	 }
	 
function barang_edit($id_barang) {
	$tampil=" SELECT * FROM barang,produk WHERE produk.id_produk=barang.id_produk AND barang.id_barang ='$id_barang'";
	$query = $this->db->query($tampil);
	return $query->row();
	}

function barang_edit_exe($id_barang, $nama_barang, $id_produk, $harga, $stok, $keterangan) {
	$data = array('id_barang' => $id_barang,
			'nama_barang' => $nama_barang,
			'id_produk' => $id_produk,
			'harga' => $harga,
			'stok' => $stok,
			'keterangan' => $keterangan );
	$this->db->where('id_barang',$id_barang);
	$this->db->update('barang',$data);}
function barang_gaklaku(){
	$q=$this->db->query("SELECT * FROM barang,produk WHERE NOT EXISTS (SELECT * FROM pesanan_det WHERE barang.id_barang = pesanan_det.id_barang) 
							AND barang.id_produk=produk.id_produk");
	return $q;}

//---------------Buku Tamu------------------------------------------------------------------------------------------------------------

function ambil_bukutamu() {
		$query=$this->db->query("SELECT * FROM buku_tamu WHERE sts_bukutamu!='2' ORDER BY tgl DESC ");
		return $query->result();
	 }	 
function bukutamu_del($id_bukutamu) {
	  $query=$this->db->query("UPDATE buku_tamu SET sts_bukutamu='2' WHERE id_bukutamu='$id_bukutamu'");
	 }	
function bukutamu_tampil($id_bukutamu){
 $query=$this->db->query("UPDATE buku_tamu SET sts_bukutamu='1' WHERE id_bukutamu='$id_bukutamu'");
	 }	 
//--------------------------------------------KOMENTAR--------------------------------------------------------
function komentar() {	
		$query=$this->db->query("SELECT * FROM barang,produk,komentar,user WHERE komentar.id_barang=barang.id_barang AND komentar.id_user=user.id_user 
								AND barang.id_produk=produk.id_produk ORDER BY komentar.tgl_komentar DESC ");
		return $query;
	 }
	 
function komentar_del($id_komentar) {
	  $query=$this->db->query("DELETE FROM komentar WHERE id_komentar='$id_komentar'");
	 }
	 
//---------------------------------------------------POLLING--------------------------------------------------------
function ambil_polling() {
		$query=$this->db->query("SELECT  *  FROM polling_pertanyaan ORDER BY tanggal DESC ");
		return $query;		
	 } 

function pertanyaan_polling (){
		$query1=$this->db->query("SELECT * FROM polling_pertanyaan ORDER BY tanggal DESC");
		return $query1;
}

function polling_simpan() {
		$data = array(
			'idtanya' =>"null",
			'pertanyaan' => $this->input->post('pertanyaan'),
			'tanggal' => $this->input->post('tanggal')
		);
		$simpan = $this->db->insert('polling_pertanyaan',$data);
		$simpan=$this->db->query("SELECT idtanya FROM polling_pertanyaan ORDER BY idtanya DESC LIMIT 1");
		foreach($simpan->result_array() as $poll){
		$idtanya = $poll['idtanya']; }
		foreach($this->input->post('jawaban') as $jawaban)
		{
		$data1 = array(
			'nomor'=>"null",
			'idtanya' =>"$idtanya",
			'jawaban' => "$jawaban",
			'jumlah' => "0"
		);
		$simpan = $this->db->insert('polling_jawaban',$data1);
		}
		return $simpan;
	}
	
function polling_edit_exe($idtanya){
	$pertanyaan = $this->input->post('pertanyaan');
	$simpan=$this->db->query("UPDATE polling_pertanyaan SET pertanyaan='$pertanyaan' WHERE idtanya='$idtanya'");
	$simpan=$this->db->query("SELECT * FROM polling_jawaban WHERE idtanya='$idtanya'");
	$count = $simpan->num_rows();
	for($i=0;$i<=$count;$i++){
	$jawaban = $this->input->post("jawaban$i");
	$nomor = $this->input->post("nomor$i");
	$simpan=$this->db->query("UPDATE polling_jawaban SET jawaban='$jawaban' WHERE nomor='$nomor'");
	}
	return $simpan;
}

function polling_delete($idtanya) {
 $query=$this->db->query("SELECT * FROM polling_pertanyaan, polling_jawaban, polling_vote 
								WHERE polling_pertanyaan.idtanya='$idtanya' AND polling_pertanyaan.idtanya=polling_jawaban.idtanya 
								AND polling_jawaban.nomor=polling_vote.nomor");
 foreach($query->result_array() as $jwbn){
 $idjwaban= $jwbn['nomor'];
 }
 if($query->result_array()==TRUE){
 $query=$this->db->query("DELETE FROM polling_vote WHERE nomor='$idjwaban'");
 }
$query=$this->db->query("DELETE FROM polling_jawaban WHERE idtanya='$idtanya'");
$query=$this->db->query("DELETE FROM polling_pertanyaan WHERE idtanya='$idtanya'");
}

function polling_reset($idtanya) {
		$query=$this->db->query("SELECT * FROM polling_pertanyaan, polling_jawaban, polling_vote 
								WHERE polling_pertanyaan.idtanya='$idtanya' AND polling_pertanyaan.idtanya=polling_jawaban.idtanya 
								AND polling_jawaban.nomor=polling_vote.nomor");
		
				foreach($query->result_array() as $jwbn){
				$idjwaban= $jwbn['nomor'];
				}
		if($query->result_array()==TRUE){
		$query=$this->db->query("DELETE FROM polling_vote WHERE nomor='$idjwaban'");
		}
		$query=$this->db->query("UPDATE polling_jawaban SET jumlah='0' WHERE idtanya='$idtanya'");
		return $query;
}
//--------------------------------------------------forum------------------------------------------------------------------------------------------
function topik_del($id_topik) {
	  $query=$this->db->query("DELETE FROM forum_topik WHERE id_topik='$id_topik'");
	 }

//--------------------------------------------------PESANAN------------------------------------------------------------------------------------------
function pesanan() {	
		$query=$this->db->query("SELECT * FROM pesanan,user,alamat WHERE pesanan.id_user=user.id_user AND pesanan.id_alamat=alamat.id_alamat ORDER BY pesanan.tgl_pesanan DESC ");
		return $query;
	 }

function detail_pesanan($id_pesanan) {		
		$query=$this->db->query("SELECT * FROM pesanan, user, alamat, propinsi_kota, propinsi WHERE pesanan.id_pesanan = '$id_pesanan'
AND pesanan.id_user= user.id_user
AND propinsi_kota.propinsi_id=propinsi.propinsi_id
AND alamat.id_alamat=pesanan.id_alamat
AND alamat.kota_id=propinsi_kota.kota_id");
		return $query->result();
	 }
	 
function barang_pesanan($id_pesanan) {	
		$query=$this->db->query("SELECT * FROM barang,pesanan_det WHERE pesanan_det.id_pesanan='$id_pesanan' AND barang.id_barang=pesanan_det.id_barang");
		return $query->result();
	 }

function resi_simpan() {
		$id_pesanan = $this->input->post('id_pesanan');
		$resi = $this->input->post('resi');
		$tgl = $this->input->post('tgl_kirim');		
		$jasa = $this->input->post('jasa');		
		$simpan = $this->db->query("UPDATE pesanan SET no_resi='$resi', tgl_kirim='$tgl', jasa='$jasa' WHERE id_pesanan ='$id_pesanan'");
		return $simpan;
	}
	
function jasa(){
$query=$this->db->query("SELECT * FROM jasa_pengiriman WHERE nama_jasa!='-'");
		return $query;
}

function diterima($id_pesanan){
$q=$this->db->query("UPDATE pesanan SET sts='1' WHERE id_pesanan='$id_pesanan'");
return $q;
}
//-----------------------------------------------------------Pengiriman---------------------------------------------------------------------------
/*SELECT * FROM pesanan, user, alamat, propinsi_kota, propinsi WHERE pesanan.id_pesanan = '$id_pesanan'
AND pesanan.id_user= user.id_user
AND propinsi_kota.propinsi_id=propinsi.propinsi_id
AND alamat.id_alamat=pesanan.id_alamat
AND alamat.kota_id=propinsi_kota.kota_id*/

function pengiriman(){
	$query=$this->db->query("SELECT * FROM pesanan,user,alamat,propinsi_kota,propinsi,jasa_pengiriman WHERE pesanan.no_resi!=' '
			AND pesanan.id_user=user.id_user 
			AND propinsi_kota.propinsi_id=propinsi.propinsi_id
			AND alamat.id_alamat=pesanan.id_alamat
			AND alamat.kota_id=propinsi_kota.kota_id
			AND pesanan.jasa=jasa_pengiriman.jasa");
	return $query->result();
}
//--------------------------------------------------ONGKOS------------------------------------------------------------------------------------------

function ongkos() {	
		$query=$this->db->query("SELECT * FROM propinsi_kota,propinsi WHERE propinsi.propinsi_id=propinsi_kota.propinsi_id ORDER BY 
		propinsi_kota.propinsi_id ASC");
		return $query; 
		}
	
function ongkos_edit($kota_id) {
		$tampil="SELECT * FROM propinsi_kota,propinsi WHERE propinsi.propinsi_id=propinsi_kota.propinsi_id AND propinsi_kota.kota_id='$kota_id'";
		$query = $this->db->query($tampil);
		return $query->row();
		}
function ongkos_edit_exe($kota_id, $tarif){
	$data = array(
			'kota_id' => $kota_id,
			'tarif' => $tarif
		);
		$this->db->where('kota_id',$kota_id);
		$this->db->update('propinsi_kota',$data);
		}
//----------------------------------------------------daftar pelanggan----------------------------------------
function user() {	
		$query=$this->db->query("SELECT * FROM user ORDER BY nama_user DESC");
		return $query;
	}
	 
function pesanan_akun($id_user) {	
		$query=$this->db->query("SELECT * FROM pesanan WHERE id_user='$id_user' ORDER BY tgl_pesanan DESC");
		return $query;	
	}
function nama_akun($id_user) {	
		$query=$this->db->query("SELECT * FROM user WHERE id_user='$id_user'");
		return $query->row();	
	}	 
//------------------------------------------------------- daftar alamat -------------------------------------------------------------------------------
 function alamat_user ($id_user){
		$query=$this->db->query("SELECT * FROM user,alamat,propinsi_kota,propinsi WHERE user.id_user='$id_user' AND  alamat.id_user=user.id_user 
				AND propinsi.propinsi_id=propinsi_kota.propinsi_id AND alamat.kota_id=propinsi_kota.kota_id");
		return $query;
 }

//------------------------------------------------------- Penjualan -------------------------------------------------------------------------------
/* function penjualan(){
		$query=$this->db->query("SELECT * FROM pesanan,user WHERE pesanan.id_user=user.id_user AND pesanan.tgl_kirim != '0000-00-00'
				ORDER BY pesanan.tgl_pesanan  DESC ");
		return $query; 	} */
function penjualan_rp(){
		$query=$this->db->query("SELECT sum(total_pesanan) FROM pesanan WHERE tgl_kirim != '0000-00-00'");
		return $query->row(); }
/* function penjualan_per($tanggal,$dari,$sampai){
		$query=$this->db->query("SELECT * FROM pesanan,pesanan_det,barang,user,alamat 
		WHERE pesanan.id_user=user.id_user 
		AND pesanan_det.id_pesanan=pesanan.id_pesanan 
		AND barang.id_barang=pesanan_det.id_barang
		AND alamat.id_alamat=pesanan.id_alamat
		AND pesanan.tgl_kirim != '0000-00-00'
		AND pesanan.$tanggal BETWEEN '$dari' AND '$sampai' ORDER BY pesanan.tgl_pesanan  DESC ");
		return $query; } */
function penjualan_per($dari,$sampai){
		$query=$this->db->query("SELECT * FROM pesanan,pesanan_det,barang 
		WHERE pesanan_det.id_pesanan=pesanan.id_pesanan 
		AND barang.id_barang=pesanan_det.id_barang
		AND pesanan.tgl_kirim != '0000-00-00'
		AND pesanan.tgl_kirim BETWEEN '$dari' AND '$sampai' ORDER BY pesanan.tgl_pesanan  DESC ");
		return $query; }
/* function penjualan_rp_per($tanggal,$dari,$sampai){
		$query=$this->db->query("SELECT sum(total_pesanan) FROM pesanan WHERE tgl_kirim != '0000-00-00' AND $tanggal BETWEEN '$dari'	AND '$sampai'");
		return $query->row(); } */
function penjualan_rp_per($dari,$sampai){
		$query=$this->db->query("SELECT sum(total_pesanan) FROM pesanan WHERE tgl_kirim != '0000-00-00' AND tgl_kirim BETWEEN '$dari'	AND '$sampai'");
		return $query->row(); }
		
function penjualan_barang(){
		$query=$this->db->query("SELECT * FROM pesanan,pesanan_det,barang,user,alamat 
		WHERE pesanan.id_user=user.id_user 
		AND pesanan_det.id_pesanan=pesanan.id_pesanan 
		AND barang.id_barang=pesanan_det.id_barang
		AND alamat.id_alamat=pesanan.id_alamat
		AND pesanan.tgl_kirim != '0000-00-00' ORDER BY pesanan.id_pesanan  DESC ");
		return $query; 	}
/*function penjualan_barang_rp(){
		$query=$this->db->query("SELECT sum(total_pesanan) FROM pesanan WHERE tgl_kirim != '0000-00-00'");
		return $query->row(); }		
function penjualan_barang_per($tanggal,$dari,$sampai){
		$query=$this->db->query("SELECT * FROM pesanan,pesanan_det,barang,user WHERE pesanan.id_user=user.id_user AND pesanan.tgl_kirim != '0000-00-00'
		AND pesanan_det.id_pesanan=pesanan.id_pesanan AND barang.id_barang=pesanan_det.id_barang
		AND pesanan.$tanggal BETWEEN '$dari' AND '$sampai' ORDER BY pesanan.tgl_pesanan  DESC ");
		return $query; }
function penjualan_barang_rp_per($tanggal,$dari,$sampai){
		$query=$this->db->query("SELECT sum(total_pesanan) FROM pesanan WHERE tgl_kirim != '0000-00-00' AND $tanggal BETWEEN '$dari'	AND '$sampai'");
		return $query->row(); }	 */

function norek(){
	$q=$this->db->query("SELECT * FROM norek WHERE sts='1'");
	return $q->result();}
function norek_add($data){
	$query = $this->db->insert('norek', $data);
	return $query;	}
function norek_edit($id_norek){
	$query = $this->db->query("SELECT * FROM norek WHERE id_norek='$id_norek'");
	return $query->row();}	
function norek_edit_exe($id_norek,$namarekning,$norekning,$bankrekning){
	$data = array('id_norek' => $id_norek,
			'namarekning' => $namarekning,
			'norekning' => $norekning,
			'bankrekning' => $bankrekning,
			'sts' => 1, );
	$this->db->where('id_norek',$id_norek);
	$this->db->update('norek',$data);}	
function norek_del($id_norek){
$query = $this->db->query("UPDATE norek SET sts='0' WHERE id_norek='$id_norek'");
	return $query;
}
}
