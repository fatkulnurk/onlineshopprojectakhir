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
function bukutamu() {
		$query=$this->db->query("SELECT * FROM buku_tamu WHERE sts_bukutamu='1'  ORDER BY tgl DESC LIMIT 3");
		return $query;
	 }

function bukutamu_lihat($offset, $limit){
		$query=$this->db->query("SELECT * FROM buku_tamu WHERE sts_bukutamu='1' ORDER BY tgl DESC LIMIT $offset, $limit" ); 
		return $query->result();
	}
//------------------------------------------------- B A R A N G ----------------------------------------------------------------------------------------
function barang() {
		$query=$this->db->query("SELECT * FROM barang ORDER BY tgl DESC LIMIT 5 ");
		return $query; }
function semua_barang() {
		$query=$this->db->query("SELECT * FROM barang");
		return $query; }
function ambil_barang_urut($offset, $limit, $urut) {	
		$query=$this->db->query("SELECT * FROM barang,produk WHERE produk.id_produk=barang.id_produk AND barang.sts='1' ORDER BY barang.$urut LIMIT $offset, $limit");
		return $query; }
function ambil_barang($offset, $limit) {
		$query=$this->db->query("SELECT * FROM barang,produk WHERE produk.id_produk=barang.id_produk AND barang.sts='1' ORDER BY barang.tgl DESC LIMIT $offset, $limit");
		return $query; }
function detail_barang($id_barang) {
		$query=$this->db->query("SELECT * FROM barang,produk WHERE barang.id_barang='$id_barang' AND produk.id_produk=barang.id_produk ");
		return $query; }
function ambil_produk() {
	 $query=$this->db->query("SELECT * FROM produk ORDER BY nama_produk ASC "); 
	 return $query->result();
	 }
	 
//------------------------------------------------- KERANJANG ----------------------------------------------------------------------------------------	 
function kurangistok($stok,$id_barang) {

		$query=$this->db->query("UPDATE barang SET stok='$stok' WHERE id_barang='$id_barang' ");
		return $query; 
	 }
	 
function kembalikanqty() {
$total = $this->cart->total_items();
for($i=0;$i<=$total;$i++){
	$qty= $this->input->post("qty$i");
	$id_barang= $this->input->post("id_barang$i");
	
		$query=$this->db->query("UPDATE barang SET stok=stok+'$qty' WHERE id_barang='$id_barang' ");
		
		return $query;}
	 }
	 
function stokbarang() {
$total = $this->cart->total_items();
for($i=0;$i<=$total;$i++){
	$id_barang= $this->input->post("id_barang$i");
} $query=$this->db->query("SELECT * FROM barang WHERE id_barang='$id_barang' ");
		return $query;
	 }
		  

/* public function kri(){
 $dts=$this->app_model->list_data('master_kriteria'); 
 foreach($dts->result() as $ds){ $id=$ds->kriteria_id;
 $kriteria_nama=$ds->kriteria_nama; $atr=array('kriteria_id'=>"$id"); 
$dt=$this->app_model->data_tabel('tbl_kriteria_detail',$atr);
 $g['']=""; 
 foreach($dt->result() as $dd){
 $g[$dd->kri_det_skor]=humanize($dd->kri_det_nama); } 
 $dta[]="<tr> <td><div class=\"controls\">".$kriteria_nama."</div></td>
 <td><div class=\"controls\">".form_dropdown("k$id",$g)."</div></td> </tr>"; } 
 return $dta; } */
	 
	 
//----------------------------------------- K A T E G O R I / P R O D U K ------------------------------------------------------------------------
function kategori_page($id_produk){
$query=$this->db->query("SELECT * FROM barang,produk WHERE barang.id_produk='$id_produk' AND produk.id_produk=barang.id_produk ");
		return $query; }
function kategori($id_produk ,$offset, $limit){
$query=$this->db->query("SELECT * FROM barang,produk WHERE barang.id_produk='$id_produk' AND produk.id_produk=barang.id_produk 
						ORDER BY barang.tgl DESC LIMIT $offset, $limit");
		return $query; }
		
function kategori_urut($id_produk,$offset, $limit, $urut){
$query=$this->db->query("SELECT * FROM barang,produk WHERE barang.id_produk='$id_produk' AND 
	produk.id_produk=barang.id_produk ORDER BY barang.$urut LIMIT $offset, $limit");
		return $query;
} 
	 
	 

//------------------------------------------------- K O M E N T A R ----------------------------------------------------------------------------------------
 function ambil_komentar($id_barang ) {		
		$query=$this->db->query("SELECT * FROM komentar, user WHERE komentar.id_barang = '$id_barang' AND komentar.id_user = user.id_user 
								ORDER BY komentar.tgl_komentar ASC");
		return $query;
	 }
/* function total_komentar() {
		$query=$this->db->query("SELECT * FROM komentar");
		return $query;
} */

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
		
//---------- Insert chat user ------ //
function insert_userchart() {
$userchat = $this->session->userdata('user');
$data = array(
			'user' => $userchat
		);
		$simpan = $this->db->insert('user_login',$data);
	return $simpan; 
}

//---------- delete chat user ------ //
function delete_userchart() {
$userchat = $this->session->userdata('user');
$query=$this->db->query("DELETE FROM user_login WHERE user='$userchat'");
		return $query; 
}

function id_user() {
$id=0;
$id_user = $this->session->userdata('user');
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
	
	
//----------------------------------------- R E G I S T R A S I--------------------------------------------------------------------------------

function registrasi_simpan() {
$na_wal=$this->input->post('nama_awal');
$nakir=$this->input->post('nama_akhir');
		$data = array(
			'email' => $this->input->post('email'),
			'nama_user'=> "$na_wal $nakir",
			'password'=>md5($this->input->post('password')),
			'tgl_registrasi' => $this->input->post('tgl')
		);
		$simpan = $this->db->insert('user',$data);
		//loginnnnnnnnnnnnnnnnnnnnnnnnn 	return $simpan; 
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('user');
		if($query->num_rows == 1){
		return true;}
	}
	
//----------------------------------------------cek email--------------------------------------------------------------------------------	
function cekemail(){
	$email=$this->input->post('email');
	$q=$this->db->query("SELECT * FROM user WHERE email='$email'");
	return $q->result_array();	
}
//----------------------------------------- L O G I N--------------------------------------------------------------------------------	
  function validate(){
	  $this->db->where('email', $this->input->post('email'));
	  $this->db->where('password', md5($this->input->post('password')));
	  $query = $this->db->get('user');
		  if($query->num_rows == 1)
		  {
		   return true;
		  } 
 } 

 
 //---------------------------------------------------------------PESANAN-------------------------------------------------------------
function cekidpesanan(){
	$id=$this->input->post('id_pesanan');
	$q=$this->db->query("SELECT * FROM pesanan WHERE id_pesanan='$id'");
	return $q;
}

	function hitungcart(){
$jum = 0;	
 foreach($this->cart->contents() as $items):
 $jum++;
 endforeach;
 return $jum;
}

function pesanan_simpan() {
		$pesanan = array(
			'id_pesanan' => $this->input->post('id_pesanan'),
			'id_user' => $this->input->post('id_user'),
			'id_alamat' => $this->input->post('id_alamat'),
			'tgl_pesanan' => $this->input->post('tgl_pesanan'),
			'total_pesanan' => $this->input->post('total_pesanan'),
		);
		$simpan = $this->db->insert('pesanan',$pesanan);
		$total = $this->pengguna_model->hitungcart();
		for($i=0;$i < $total; $i++) {
		$brg = $this->input->post("id_barang");
		$qty = $this->input->post("qty");
		
		$detail = array(
			'id_pesanan' => $this->input->post('id_pesanan'),
			'id_barang' => $brg[$i],
			'qty' => $qty[$i]
		);
		$simpan = $this->db->insert('pesanan_det',$detail);
		}
		
		return $simpan;
	}


	
function pesanan_addalamat() {
	$iu = $this->input->post('id_user');
	$q =$this->db->query("SELECT * FROM alamat WHERE id_user='$iu'");
	if ($q->result_array()==TRUE){
		$this->db->query("UPDATE alamat SET sts_alamat='0' WHERE id_user='$iu'");
	}
	$alamat = array(
			'kota_id' => $this->input->post('pilihkab'),
			'alamat' => $this->input->post('alamat'),
			'nama' => $this->input->post('nama'),
			'hp' => $this->input->post('hp'),
			'id_user' => "$iu",
			'sts_alamat' => '1' );
	$this->db->insert('alamat',$alamat);
	$simpan=$this->db->query("SELECT * FROM alamat WHERE id_user='$iu' AND sts_alamat='1'");
		foreach($simpan->result_array() as $id){
		$kota = $id['kota_id'];
		$al= $id['id_alamat'];
		}
		$simpan=$this->db->query("SELECT * FROM propinsi_kota WHERE kota_id='$kota'");
		foreach($simpan->result_array() as $trf){
		$ongkir = $trf['tarif'];
		} $total = $this->cart->total() + $ongkir;	
	$pesanan = array(
			'id_pesanan' => $this->input->post('id_pesanan'),
			'id_user' => "$iu",
			'tgl_pesanan' => $this->input->post('tgl_pesanan'),
			'id_alamat' => "$al",
			'total_pesanan' => "$total");
	$this->db->insert('pesanan',$pesanan);
	
	$total = $this->pengguna_model->hitungcart();
		$brg = $this->input->post('id_barang');
		$qty = $this->input->post('qty');
		for($i=0;$i < $total; $i++) {
		$brg = $this->input->post("id_barang");
		$qty = $this->input->post("qty");
		
		$detail = array(
			'id_pesanan' => $this->input->post('id_pesanan'),
			'id_barang' => $brg[$i],
			'qty' => $qty[$i]
		);
		$simpan = $this->db->insert('pesanan_det',$detail);
		} return $simpan;
	} 
	
function daftar_pesanan_simpan() {
	$user = array(	'email' => $this->input->post('email'),			//registrasi dulu
					'nama_user'=> $this->input->post('nama'),
					'password'=>md5($this->input->post('password')),
					'tgl_registrasi' => $this->input->post('tgl_registrasi'));	
	$simpan = $this->db->insert('user',$user);  					//-------sampai sini---
	$id=$this->input->post('email')	;	//-------insert alamat----
	$simpan = $this->db->query("SELECT * FROM user WHERE email='$id'");
		foreach($simpan->result_array() as $usr){
		$id_user = $usr['id_user'];
		}
		$alamat = array(
			'kota_id' => $this->input->post('pilihkab'),
			'alamat' => $this->input->post('alamat'),
			'nama' => $this->input->post('nama'),
			'hp' => $this->input->post('hp'),
			'id_user' => "$id_user",
			'sts_alamat' => '1'
		);	$simpan = $this->db->insert('alamat',$alamat); //--------sampai sini---
		$simpan=$this->db->query("SELECT * FROM alamat WHERE id_user='$id_user'");
		foreach($simpan->result_array() as $id){
		$kota = $id['kota_id'];
		$al=$id['id_alamat'];
		}
		$simpan=$this->db->query("SELECT * FROM propinsi_kota WHERE kota_id='$kota'");
		foreach($simpan->result_array() as $trf){
		$ongkir = $trf['tarif'];
		} $total = $this->cart->total() + $ongkir;		
		$pesanan = array( //-----simpan data pesanan----
			'id_pesanan' => $this->input->post('id_pesanan'),
			'id_user' => "$id_user",
			'id_alamat' => "$al",
			'total_pesanan' => "$total",
			'tgl_pesanan' => $this->input->post('tgl_pesanan')
		);
		$simpan = $this->db->insert('pesanan',$pesanan); //----sampai sini----
		//-----simpan barang pesanan-----
		$totalcart = $this->pengguna_model->hitungcart();
		for($i=0;$i < $totalcart; $i++) {
		$brg = $this->input->post("id_barang");
		$qty = $this->input->post("qty");
		
		$detail = array(
			'id_pesanan' => $this->input->post('id_pesanan'),
			'id_barang' => $brg[$i],
			'qty' => $qty[$i]
		);
		$simpan = $this->db->insert('pesanan_det',$detail);
		}
	//loginnnnnnnnnnnnnnnnnnnnnnnnn 	 
  $this->db->where('email', $this->input->post('email'));
  $this->db->where('password', md5($this->input->post('password')));
  $query = $this->db->get('user');
  if($query->num_rows == 1)
  {return true;
  }}
  
function selesai_belanja(){
	$id=$this->session->userdata('email');
		$query=$this->db->query("SELECT * FROM user WHERE email='$id'");
		foreach($query->result_array() as $user){
			$iu= $user['id_user']; }
	$q=$this->db->query("SELECT * FROM pesanan WHERE id_user='$iu' ORDER BY id_pesanan DESC LIMIT 1");
	return $q;
 }

//---------------------------------------------------------------DETAIL PESANAN-------------------------------------------------------------

function pesanan_akun() {	
		$id=$this->session->userdata('email');
		$query=$this->db->query("SELECT * FROM user WHERE email='$id'");
		foreach($query->result_array() as $user){
		$iu= $user['id_user']; }
		$query=$this->db->query("SELECT * FROM pesanan,jasa_pengiriman WHERE pesanan.id_user='$iu' AND pesanan.jasa=jasa_pengiriman.jasa
				ORDER BY pesanan.tgl_pesanan DESC");
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

function lihat_ip_polawal() {
	$query=$this->db->query("SELECT * FROM polling_pertanyaan ORDER BY idtanya DESC LIMIT 1");
			foreach($query->result_array() as $poll){
					$idtanya = $poll['idtanya']; 
			}
	$ip = $_SERVER['REMOTE_ADDR'];
	$query=$this->db->query("SELECT * FROM polling_pertanyaan, polling_jawaban, polling_vote WHERE polling_vote.ip= '$ip' 
		AND polling_vote.nomor=polling_jawaban.nomor AND polling_jawaban.idtanya=polling_pertanyaan.idtanya AND polling_pertanyaan.idtanya='$idtanya'");
	return $query;
 }
 
function lihat_ip($idtanya) {
	$query=$this->db->query("SELECT * FROM polling_pertanyaan WHERE idtanya='$idtanya'");
			foreach($query->result_array() as $poll){
					$idtanya = $poll['idtanya']; 
			}
	$ip = $_SERVER['REMOTE_ADDR'];
	$query=$this->db->query("SELECT * FROM polling_pertanyaan, polling_jawaban, polling_vote WHERE polling_vote.ip= '$ip' 
		AND polling_vote.nomor=polling_jawaban.nomor AND polling_jawaban.idtanya=polling_pertanyaan.idtanya AND polling_pertanyaan.idtanya='$idtanya'");
	return $query;
 } 
 
function hitungpolling($jwb){
			$data = array(
				'ip' => $_SERVER['REMOTE_ADDR'],
				'nomor' => $this->input->post('nomor'),
				'tgl' => date("Y-m-d"),
			);
			$query = $this->db->insert('polling_vote',$data);
			$query=$this->db->query("UPDATE polling_jawaban SET jumlah=jumlah+1 WHERE nomor='$jwb'");
		return $query;	
	 }
	 
	  function polling_sebelumnya($idtanya)
	 {
	 $query4=$this->db->query("SELECT * FROM polling_pertanyaan WHERE idtanya='$idtanya'");
	 return $query4;
 }
 
function lihatpolling_sebelumnya($idtanya){
	 $query2=$this->db->query("SELECT * FROM polling_pertanyaan WHERE idtanya='$idtanya'");
		foreach($query2->result_array() as $poll){
			$idtanya = $poll['idtanya']; 
			}
		$query2=$this->db->query("SELECT * FROM polling_jawaban,polling_pertanyaan WHERE polling_jawaban.idtanya='$idtanya' 
									AND polling_jawaban.idtanya=polling_pertanyaan.idtanya");
		return $query2;
 }

 
 
 //------------------------------------KOTA-------------------------------------------------------------------------
 function getpropinsi(){
		//return $this->db->get('propinsi')->result();
		$query2=$this->db->query("SELECT * FROM propinsi ORDER BY propinsi ASC");
	return $query2->result();
	}
function ambil_kab($key) {
		return $this->db->get_where('propinsi_kota', array('propinsi_id' => $key))->result_array();
	}
function ambil_tarif($key) {
		return $this->db->get_where('propinsi_kota', array('kota_id' => $key))->result_array();
	}
  
 //---------------------------------------FORUM------------------------------------------------------------------------
function forum($offset, $limit){
		$query=$this->db->query("SELECT * FROM forum_topik, user WHERE forum_topik.id_user = user.id_user 
								ORDER BY forum_topik.id_topik DESC LIMIT $offset, $limit" ); 
		return $query;
	}
function forum_simpan(){
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'topik' => $this->input->post('topik'),
			'isi' => $this->input->post('isi'),
			'tgl_topik' => $this->input->post('tgl_topik')
		);
		$simpan = $this->db->insert('forum_topik',$data);
		return $simpan;
	}
function forum_replay($id_topik){
		$query=$this->db->query("SELECT * FROM forum_topik,forum_replay,user WHERE user.id_user=forum_replay.id_user AND 
								forum_replay.id_topik=forum_topik.id_topik AND forum_replay.id_topik='$id_topik'"); 
		return $query;
	}
	
function forumreplay_simpan(){
		$data = array(
			'id_user' => $this->input->post('id_user'),
			'id_topik' => $this->input->post('id_topik'),
			'isi_replay' => $this->input->post('isi_replay'),
			'tgl_replay' => $this->input->post('tgl_replay')
		);
		$simpan = $this->db->insert('forum_replay',$data);
		return $simpan;
	}
function topik($id_topik){
		$query=$this->db->query("SELECT * FROM forum_topik,user WHERE forum_topik.id_user = user.id_user AND forum_topik.id_topik='$id_topik'"); 
		return $query->result();
	}
	
function hitungreplay($id_topik){
	$query=$this->db->query("UPDATE forum_topik SET count=count+1 WHERE id_topik='$id_topik'");
	return $query;	
 }
 
//--------------------------------------------------------AKUN ALAMAT-------------------------------------------------



 function akunalamat (){
		$id=$this->session->userdata('email');
		$query=$this->db->query("SELECT * FROM user WHERE email='$id'");
		foreach($query->result_array() as $user){
		$iu= $user['id_user']; }
		$query=$this->db->query("SELECT * FROM user,alamat,propinsi_kota,propinsi WHERE user.id_user='$iu' AND  alamat.id_user=user.id_user 
				AND propinsi.propinsi_id=propinsi_kota.propinsi_id AND alamat.kota_id=propinsi_kota.kota_id AND alamat.sts_alamat='0';");
		return $query;
 }
 
 function akunalamat_dipakai (){
		$id=$this->session->userdata('email');
		$query=$this->db->query("SELECT * FROM user WHERE email='$id'");
		foreach($query->result_array() as $user){
		$iu= $user['id_user']; }
		$query=$this->db->query("SELECT * FROM user,alamat,propinsi_kota,propinsi WHERE user.id_user='$iu' AND  alamat.id_user=user.id_user 
								AND propinsi.propinsi_id=propinsi_kota.propinsi_id AND alamat.kota_id=propinsi_kota.kota_id AND alamat.sts_alamat='1';");
		return $query;
 }
 
 function akunalamat_baru(){
 $alamat = array(
			'kota_id' => $this->input->post('pilihkab'),
			'alamat' => $this->input->post('alamat'),
			'nama' => $this->input->post('nama'),
			'hp' => $this->input->post('hp'),
			'id_user' => $this->input->post('id_user')
		);
		$simpan = $this->db->insert('alamat',$alamat);
		return $simpan;
	}
function akunalamat_jadikan($id_alamat){
	$id=$this->session->userdata('email');
	$query=$this->db->query("SELECT * FROM user WHERE email='$id'");
	foreach($query->result_array() as $user){
	$iu= $user['id_user']; }
	$query=$this->db->query("UPDATE alamat SET sts_alamat='0' WHERE id_user='$iu'");
	$query=$this->db->query("UPDATE alamat SET sts_alamat='1' WHERE id_alamat='$id_alamat' AND id_user='$iu'");
	return $query;	
	}
	
function akunalamat_edit($id_alamat){
	$query=$this->db->query("SELECT * FROM alamat,propinsi,propinsi_kota WHERE alamat.id_alamat='$id_alamat' 
							AND alamat.kota_id=propinsi_kota.kota_id
							AND propinsi.propinsi_id=propinsi_kota.propinsi_id");
	return $query->result();
	}

function akunalamat_edit_exe($data){
		$query = $this->db->insert('alamat', $data);
		return $query;
}

function alamat_del($id_alamat) {
	  $this->db->query("UPDATE alamat SET sts_alamat='2' WHERE id_alamat='$id_alamat'");
	 }
	 
//-------------------------------------------------------Ganti Password------------------------------------------------------------
function cari_gantipass(){
$em = $this->input->POST('email');
$pl = $this->input->POST('password_lama');
$query = $this->db->query("SELECT * FROM user WHERE email='$em' AND password=MD5('$pl')");
return $query->result();
}

function gantipass(){
$em = $this->input->POST('email');
$pb = $this->input->POST('password');
$query = $this->db->query("UPDATE user SET password=MD5('$pb') WHERE email='$em'");
return $query;
}

 function lupa_pass(){
	$mail=$this->input->post('email');
	$q=$this->db->query("SELECT * FROM user WHERE email='$mail' ");
	return $q->result();
 }
 
 function ambil_email($id_user){
	$q=$this->db->query("SELECT * FROM user WHERE id_user='$id_user' ");
	return $q->result();
 }
 
function gantiemail(){
	$id = $this->input->POST('id_user');
	$pb = $this->input->POST('email');
	$query = $this->db->query("UPDATE user SET email='$pb' WHERE id_user='$id'");
return $query;
}

function gantinama(){
	$n = $this->input->POST('nama');
	$nb = $this->input->POST('nama_b');
	$em = $this->input->POST('email');
	$query = $this->db->query("UPDATE user SET nama_user='$n $nb' WHERE email='$em'");
return $query;
}
//--------------------------------------------Konfirmasi pembayaran----------------------------------------------------------------

function konfirm_bayar($data){
	$id_pesanan = $this->input->POST ('id_pesanan');
	$this->db->where('id_pesanan',$id_pesanan);
			$this->db->update('pesanan',$data);
} 
	

function konfirm_cari() {
	$c = $this->input->POST ('id_pesanan');
	$query = $this->db->query ("SELECT * FROM pesanan, user, alamat, propinsi_kota, propinsi WHERE pesanan.id_pesanan = '$c'
								AND pesanan.id_user = user.id_user
								AND propinsi_kota.propinsi_id=propinsi.propinsi_id
								AND alamat.id_alamat=pesanan.id_alamat
								AND alamat.kota_id=propinsi_kota.kota_id ");
	return $query->result();	 
	 }
	 
function barang_pesanan() {	
$c = $this->input->POST ('id_pesanan');
		$query=$this->db->query("SELECT * FROM barang,pesanan_det WHERE pesanan_det.id_pesanan='$c' AND barang.id_barang=pesanan_det.id_barang");
		return $query->result();
	 }

}
