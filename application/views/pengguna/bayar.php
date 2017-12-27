    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url();?>asset/css/ui.theme.css" type="text/	css" media="all" />
		<script src="<?php echo base_url();?>asset/js/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>asset/js/jquery-ui.min.js" type="text/javascript"></script>

<table align="center" ><tr>
<td valign='top' rowspan="2">
<script type="text/javascript">
//perhatikan, kuncinya adalah disini
        function fungsiambilkab(nilai){
           $.ajax({
                type: "POST",
                url: "<?php echo site_url('pengguna/ambil_kab');?>",
                data:"key="+nilai,
                success: function(data){
                    $("#kab").html(data);
                },
 
                error:function(XMLHttpRequest){
                    alert(XMLHttpRequest.responseText);
                }
 
            })
 
        }; 
	</script>
<?php   if($this->session->userdata('is_logged_in') == true) {
			if(!$dipakai->result_array()){
				echo form_open ('pengguna/bayar_addalamat');
			}else{
				echo form_open ('pengguna/bayar_exe');
				foreach($dipakai->result_array() as $id) {  
					echo form_hidden('id_user',$id['id_user']);  
			} }
			
		}
		
		
		
		
		else{
			echo form_open ('pengguna/bayar_daftar_exe'); } 
?>

<div class='byr'><strong>1. Informasi Anda</strong></div>
<?php $id_pesanan = date("dmyHis");
			echo form_hidden('id_pesanan',$id_pesanan);  ?>
	<div id="bayar"><div class="nama-akun">Alamat pengiriman</div><br>
	<font color='red' size='1px'><?php echo validation_errors(); ?> </font>
<div align='right'>* wajib diisi</div>

	<table  align='center'>
	<?php  if($this->session->userdata('is_logged_in') == false) //jika blm login
  {		?>
	<tr><td>Email * </td><td><?php echo form_input('email',set_value('email'),'class=inputan'); ?><?php $today = date("Y-m-d H:i:s");
			echo form_hidden('tgl_registrasi',$today);  
		?></td></tr>
	<tr><td>Password * </td><td><?php echo form_password('password','','class=inputan'); ?></td></tr>
	<tr><td>Konfirmasi <br> Password * </td><td><?php echo form_password('konfirmasi_password','','class=inputan'); ?></td></tr>
	<tr><td>Nama * </td><td><?php echo form_input('nama',set_value('nama'),'class=inputan'); ?> 
	</td></tr>
	<tr><td>Nomor <br> Handphone * &nbsp;</td>
		<td><?php $hp=array('name'=>'hp', 
							 'id'=>'hp', 
							 'class'=>'inputan',
							 'value'=>set_value('hp'),
							 'onKeyPress'=>'return numbersonly(this, event)');	
			echo form_input($hp); ?></td></tr>
	<tr><td>Provinsi *</td><td>
		<?php $js = 'onChange="fungsiambilkab(this.value);" class="inputan"';
			echo form_dropdown('provinsi',$prp,'', $js); ?></td></tr>
	<tr><td>Kota *</td><td><?php echo "<div id='kab'><select class='inputan' disabled><option>-Pilih kota-</option></select></div>"; ?> </td></tr>
	<tr><td>Alamat *</td><td><?php echo form_input('alamat',set_value('alamat'),'class=inputan'); ?>	</td></tr>
<?php  
			//echo form_hidden('tarif',$us['tarif']);
			

} ?> 
<!----------------------------jika Login----------------------------------------------------------------------------------------------------->
<?php  if($this->session->userdata('is_logged_in') == true && !$dipakai->result_array()){ 
		redirect('pengguna_akun/newaddress');
		} 
		?>
		
<!-------------------------------------------------------------Jika punya alamat-------------------------------------------->
	<?php if($this->session->userdata('is_logged_in') == true ){ 
	
					foreach($dipakai->result_array() as $us) {						
					$email=$this->session->userdata('email');
					?>
					
				<tr><td>Nama * </td><td><?php $nama = array('name'=>'nama', 
														'id'=>'nama', 
														'class'=>'inputan',
														'value'=>$us['nama'],
														'readonly'=>'yes');		echo form_input($nama); 
														echo form_hidden('id_alamat',$us['id_alamat']);
														?> </td></tr>
				<tr><td>Email * </td><td><?php $nama = array('name'=>'email', 
														'id'=>'email', 
														'class'=>'inputan',
														'value'=>$email,
														'readonly'=>'yes');		echo form_input($nama); 
														echo form_hidden('id_alamat',$us['id_alamat']);
														?> </td></tr>
				<tr><td>Nomor <br> Handphone * &nbsp;</td> 
					<td><?php $hp=array('name'=>'hp', 
										'id'=>'hp', 
										'class'=>'inputan',
										'value'=>$us['hp'],
										'readonly'=>'yes');						echo form_input($hp); ?></td></tr>
				<tr><td>Provinsi * &nbsp;</td>
					<td><?php $pr=array('name'=>'provinsi', 
										'id'=>'provinsi', 
										'class'=>'inputan',
										'value'=>$us['propinsi'],
										'readonly'=>'yes');						echo form_input($pr); ?></td></tr>
				<tr><td>Kota * &nbsp;</td><td><?php $pr=array(	'name'=>'pilihkab', 
																'id'=>'pilihkab', 
																'class'=>'inputan',
																'value'=>$us['kota_kabupaten'],
																'readonly'=>'yes');	
						echo form_input($pr), form_hidden('pilihkab',$us['kota_id']); ?></td></tr>
				<tr><td>Alamat * &nbsp;</td><td><?php $al=array('name'=>'alamat', 
																'id'=>'alamat', 
																'class'=>'inputan',
																'value'=>$us['alamat'],
																'readonly'=>'yes');	
						echo form_input($al); ?></td></tr>
						
				<tr><td colspan="2" align="center"> 
			  <a href="<?php echo base_url()?>pengguna_akun/newaddress" class="tmbl-oren" > Tambah alamat baru <i class="icon-plus"></i></a>
			  <a href="<?php echo base_url();?>pengguna_akun/address" class="tmbl-oren"><i class="icon-list-alt"></i> Buku alamat </a>
				</td></tr>
	<?php echo form_hidden('tarif',$us['tarif']); }  }  ?>
	</table>
	<br><?php 	$today = date("Y-m-d H:i:s");
			echo form_hidden('tgl_pesanan',$today);
			
			?>
	</div>
</td>


<!---------------------------------------------------------------Keranjang------------------------------------------------------------------------>

<td valign='top' ><div class='byr'><strong>3. Konfirmasi Pesanan</strong></div>
<div id="bayar" >
<?php if(!$this->cart->contents()):
	echo "<font color='red'>Keranjang Kosong</font>";
else: ?>
		<table class='t_bayar' align='center' width="600px">
		<tr><th align='left'>PRODUK</th><th>JUMLAH</th><th>HARGA</th></tr>
		<?php $kr=0;
		foreach($this->cart->contents() as $items) {
			$kr++;?>
		<tr><td><img src="<?php echo base_url().'images/'.$items['name']; ?>" width="50"><br>
		<?php foreach ($this->cart->product_options($items['rowid']) as  $option_value): 
		echo $option_value; 
		endforeach; ?>
		</td>
			<td><?php echo $items['qty']; ?></td>
			<td>Rp <?php echo $this->cart->format_number($items['subtotal']); ?>
		<?php echo form_hidden("id_barang[]",$items['id']); ?>
		<?php echo form_hidden("qty[]",$items['qty']); 
		?>
			</td></tr>
		<?php } ?>
		<tr bgcolor='#D3D3D3'><td colspan='2' valign='top' align='right'>Subtotal &nbsp; &nbsp; Rp
										<p>Ongkos kirim ** &nbsp; &nbsp; Rp</p>
										<p><b>TOTAL ***&nbsp; &nbsp; Rp</b></p></td>
			<td valign='top' align='right'> <?php 
				echo $this->cart->format_number($this->cart->total()); ?><br>
				<?php if($this->session->userdata('is_logged_in') == true) //jika login 
		{ foreach($dipakai->result_array() as $us) {
		echo "<p>".$this->cart->format_number($us['tarif'])."</p>";
		$jml=$this->cart->total();
		$tarif = $us['tarif']; 
		$total = $tarif+$jml;
        echo '<p><b>' .$this->cart->format_number($total). form_hidden('total_pesanan',$total).'</p>';
		
		}
		//echo form_submit('bayar','Bayar','class=tmbl');
		}
		?>
		<?php if($this->session->userdata('is_logged_in') == false) //jika tdk login 
		{
		echo "<div id='ongkir'></div>";
		}
		?>
				
				
				
				</td></tr>
		</table>
			<font size="1px">** Ongkos kirim akan muncul setelah mengisi kolom kota <br>
							*** Penambahan nominal untuk memudahkan proses konfirmasi pembayaran</font> 	
	</div>
	<p align="right"><?php echo form_submit('submit','Bayar','class=tmbl'); ?></p>
<?php endif; ?>
</tr>
		</table>

<?php echo form_close(); ?>