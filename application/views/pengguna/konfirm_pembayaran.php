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
<div class="ktkbiasa">

Terima kasih atas pembayaran yang telah dilakukan. Mohon mengisi data ini untuk proses pemeriksaan pembayaran dan pengiriman pesanan Anda. 
Tanpa konfirmasi ini, kami tidak dapat mengetahui pembayaran Anda.<br><br>
<?php if($this->session->flashdata('message')){?>
<p class='flashdata-red'> <?php echo $this->session->flashdata('message');?> </p>
<?php } ?>
<table align='center' width="80%">
<tr><td colspan="2">

<?php echo form_open('pengguna_akun/konfirm_pembayaran');?>
<div class="nama-ktkbiasa" >Nomor Pesanan : <br>
<?php $id_pesan=array('name'=>'id_pesanan', 
							  'id'=>'id_pesanan', 
							  'class'=>'inputan',
							   'value'=>set_value('id_pesanan'),
							  'onKeyPress'=>'return numbersonly(this, event)');		
							  echo form_input($id_pesan).form_submit('ok','OK','class=tmbl-ijo'); 
							  
							  ?>
</div>
<?php echo form_close(); ?></td></tr>
</table>
<?php if ($cari){
?>
<?php echo form_open_multipart('pengguna_akun/kofirm_exe'); ?>

<?php foreach($cari as $row) { 
echo form_hidden('id_pesanan',$row->id_pesanan).
form_hidden('id_user',$row->id_user).
form_hidden('id_alamat',$row->id_alamat).
form_hidden('total_pesanan',$row->total_pesanan).
form_hidden('tgl_pesanan',$row->tgl_pesanan);
$today = date("Y-m-d H:i:s");
echo form_hidden('tgl_konfirm',$today);
?>


	<?php if($row->gambar){?>
	- Sudah Dikonfirmasi <?php }?>
	 
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
<?php }?>
<br>Jika Anda menemui kesulitan atau membutuhkan informasi tambahan, silakan menghubungi 
</div>
</td></tr>

	</table>
