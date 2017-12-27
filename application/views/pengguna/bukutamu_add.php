<td valign="top">

<!-- INPUT BUKU TAMU -->
<div class="nama-content"  >TESTIMONIAL PENGUNJUNG</div>
<div class="ktkbiasa"><?php if($this->session->flashdata('message')){?>
<p class='flashdata'> <?php echo $this->session->flashdata('message');?> </p>
<?php } ?>
	<div class="nama-ktkbiasa"  >Isi Testimonial</div>
	<?php echo form_open('pengguna/bukutamu_add_exe');?>
	<div class="merah"><?php echo validation_errors(); ?></div>
	<?php	if($this->session->userdata('is_logged_in') == true) {  //jika login
				foreach($query1->result_array() as $id) {  
				$nama=$id['nama_user'];
				$email=$id['email'];
				}
			echo "Nama Anda : <br>".form_input('nama',$nama,'class=inputan');  
	?>
			<br> Email : <div class="merah">* tidak akan kami publikasikan </div> 
					<?php echo form_input('email',$email,'class=inputan');   	
		} else { ?>	
		
		Nama Anda :<br> <?php echo form_input('nama','','class=inputan');  ?><br> 
		Email : <div class="merah">*tidak akan kami publikasikan </div>
		<?php  echo form_input('email','','class=inputan');  
		} ?> 
		<?php echo "<br> Komentar : <br>"; 
				$komen = array( 'name' => 'komentar',
								'id' => 'komentar',
								'class' => 'inputan-txt',
								
								'cols' => '1500',
								 );
		echo	form_textarea($komen);
			$today = date("Y-m-d H:i:s");
		echo form_hidden('tgl',$today);
		echo "<br>".form_submit('kirim','Kirim','class=tombol');
		
		?>

<?php echo form_close(); ?></div>
</td><tr>
<tr><td valign="top">
<!-- DAFTAR BUKU TAMU -->
<?php 
	if (empty($data))
	{
	echo"<font color='red'>Data Tidak Tersedia</font>";
	}else
	{
	foreach($data as $tamu)
	{ ?>
	 <div class="bktm">
	<div class="bukutamu-nama"><?php echo $tamu->nama; ?></div>
	<?php echo $tamu->komentar; ?> 
	<p align="right">Posting pada: <i>  <?php echo $tamu->tgl ?></i></p></div>
	<?php  }}
	 ?>
<div id="halaman"> <?php echo $paginator;?></div>
</td></tr>
	</table>
