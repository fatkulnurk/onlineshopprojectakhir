 <link rel="stylesheet" href="<?php echo base_url();?>asset/calendar/jquery-ui.css">
<script src="<?php echo base_url();?>asset/calendar/jquery-1.10.2.js"></script>
<script src="<?php echo base_url();?>asset/calendar/jquery-ui.js"></script>
	<script>
		$(function() {
		$( "#datepicker" ).datepicker();
		});
	</script>

<td valign="top">
<div class="nama-content">KONFIRMASI PEMBAYARAN</div>
<?php echo form_open_multipart('pengguna_akun/kofirm_exe'); ?>
<table align='center' width="100%" >
<?php foreach($cari as $row) { 
echo form_hidden('id_pesanan',$row->id_pesanan).
form_hidden('id_pesanan',$row->id_pesanan).
form_hidden('id_user',$row->id_user).
form_hidden('nama',$row->nama).
form_hidden('kota_id',$row->kota_id).
form_hidden('alamat',$row->alamat).
form_hidden('hp',$row->hp).
form_hidden('total_pesanan',$row->total_pesanan).
form_hidden('tgl_pesanan',$row->tgl_pesanan);
$today = date("Y-m-d H:i:s");
echo form_hidden('tgl_konfirm',$today);
?>
<table width="100%" ><tr>
	<td width="50%"><div class="akun"><div class="nama-content">Data Pengiriman</div>
		<table><tr><td>Id Pesanan</td><td>:</td><td><?php echo $row->id_pesanan; ?></td></tr>
		   <tr><td>Nama</td><td>:</td><td><?php echo $row->nama; ?></td></tr>
		   <tr><td valign="top">Alamat </td><td valign="top">:</td><td><?php echo $row->alamat.' <br> '. $row->kota_kabupaten.' <br> '. $row->propinsi; ?></td></tr>
		   <tr><td>Nomer Hp </td><td>:</td><td><?php echo $row->hp; ?></td></tr>
		</table></div></td>
	<td valign="top" width="50%"> <div class="akun"><div class="nama-content"><b>Data Pemesan</b></div>
		<table ><tr><td>Tgl Pemesanan</td><td>:</td><td><?php echo tgl_indo($row->tgl_pesanan); ?></td></tr>
		   <tr><td valign="top">Nama User</td><td valign="top">:</td><td><?php echo $row->nama_user.'<br>'.$row->email; ?></td></tr>
		   <tr><td>Total  Pemesanan</td><td>:</td><td>Rp <?php echo number_format($row->total_pesanan,2,',','.'); ?></td></tr>
		</table></div>	
			</td></tr>
</table>
	<div class="akun"><div class="nama-content">Barang yang Dipesan</div>
	<table class="t_kranjang" align="center" width="100%"><tr><th>Barang</th><th>Qty</th><th>Harga</th></tr>
		<?php 
		foreach($barang as $brg){?>
		<tr><td><img src="<?php echo base_url().'images/'.$brg->gambar;?>" width="50" align="left"/> 
		<?php echo $brg->keterangan; ?></td><td><?php echo $brg->qty;?></td><td>Rp <?php  echo number_format($brg->harga,2,',','.');  ?></td></tr>
		<?php } ?>
	</table></div>
	<div class="akun"><div class="nama-content">Data Pembayaran 
	<?php if($row->gambar){?>
	- Sudah Dikonfirmasi <?php }?></div>
	 
	<?php  if(!$row->gambar) { ?>
	<center><table>
	<tr><td valign="top">Tanggal Transfer</td><td>
			<?php $tgl=array('name'=>'tgl_transfer', 
							 'id'=>'datepicker',
							 'value'=>set_value('tgl_transfer'),							 
							 'class'=>'inputan');			echo form_input($tgl);  ?>	
							 
		<font color='red' size='1px'>* <?php echo form_error('tgl_transfer');?></font></td></tr>
	<tr><td valign="top">Nomminal Transfer  &nbsp;</td><td>
			<?php $jml=array('name'=>'nominal', 
							 'id'=>'nominal', 
							 'class'=>'inputan',
							 'value'=>set_value('nominal'),
							 'onKeyPress'=>'return numbersonly(this, event)');		echo form_input($jml); ?>
		<font color='red' size='1px'>* <?php echo form_error('nominal');?></font></td></tr>
	<tr><td valign="top">Bukti pembayaran  &nbsp;</td><td>
			<?php $gambar=array('name'=>'gambar',  
							 'id'=>'gambar',
							 'value'=>set_value('gambar'),							 
							 'class'=>'inputan');			echo form_upload($gambar); ?>
							 
		<font color='red' size='1px'>* <?php echo $this->session->flashdata('message');?></font></td></tr>
	<tr><td valign="top">Catatan</td><td>
			<?php $nama=array('name'=>'catatan', 
							  'id'=>'catatan', 
							  'class'=>'inputan',
							  'value'=>set_value('catatan'),
							  'cols' => '100',
							  'rows'=>'3');			echo form_textarea($nama); ?>
	<br><font size='1px'>misalnya: - atas nama rekening (jika menggunakan rekening milik orang lain)<br>
	- atau nama bank yang dituju</font>
							  </td></tr>
	<tr><td ></td><td><br>
			<?php $kirim=array('name'=>'submit', 
							   'value'=>'Kirim', 
							   'class'=>'tmbl');		echo form_submit($kirim); ?> 
							   <font color='red' size='1px'>* Wajib diisi</font>
							   </td></tr>		
		</table><?php }} ?>
		<?php echo form_close(); ?>
		Jika Anda menemui kesulitan atau membutuhkan informasi tambahan, silakan menghubungi

		</div>
		
</td></tr>
	</table>
	
