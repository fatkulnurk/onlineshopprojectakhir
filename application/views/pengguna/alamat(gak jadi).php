<table><tr><td>
<div id="bayar">
<div class="nama-content"><strong>Pilih Alamat Pengiriman</strong></div>
<table  align='center'>
	<?php  if($this->session->userdata('is_logged_in') == false)
  { ?>
 
	<tr><td>Email * </td><td><?php echo form_input('email','','class=inputan'); ?><?php $today = date("Y-m-d H:i:s");
			echo form_hidden('tgl_registrasi',$today); ?></td></tr>
	<tr><td>Password * </td><td><?php echo form_password('password','','class=inputan'); ?></td></tr>
	<tr><td>Konfirmasi Password * </td><td><?php echo form_password('konfirmasi_password','','class=inputan'); ?></td></tr>
	<?php  } ?> 
	<tr><td>Nama * </td><td><?php echo form_input('nama','','class=inputan'); ?>
			<?php  if($this->session->userdata('is_logged_in') == true) { 
						foreach($query1->result_array() as $id) { 
						echo form_hidden('id_user',$id['id_user']);   } 
						} ?> 
	</td></tr>
	<tr><td>Nomor <br> Handphone * &nbsp;</td><td><?php 
	$hp=array('name'=>'hp', 
						 'id'=>'hp', 
						 'class'=>'inputan',
						 'onKeyPress'=>'return numbersonly(this, event)');	
	echo form_input($hp); ?></td></tr>
	
	<tr><td>Provinsi *</td><td>
	<?php
   
    $js = 'onChange="fungsiambilkab(this.value);" class="inputan"';
    echo form_dropdown('provinsi',$prp,'', $js);
	?>

<!--<div id="kab"></div>--></td></tr>
	<tr><td>Kota *</td><td><?php
	echo "<div id='kab'><select class='inputan' disabled><option>-Pilih kota-</option></select></div>";
    //echo form_close();   ?> </td></tr>
	<tr><td>Alamat *</td><td><?php echo form_input('alamat','','class=inputan'); ?>	
					</td></tr>
	</table>
	<br><?php $today = date("Y-m-d H:i:s");
			echo form_hidden('tgl_pesanan',$today); ?>
</div></td>

<!--------------------------------------------------------------------------------------KRANJANG---------------------------------->
<td><div id="bayar"><div class="nama-content"><strong>Detail Order</strong></div>
<?php if(!$this->cart->contents()):
	echo "<font color='red'>Keranjang Kosong</font>";
else: ?>
		<table class='t_kranjang' align='center'>
		<tr><th align='left'>PRODUK</th><th>JUMLAH</th><th>HARGA</th></tr>
		<?php foreach($this->cart->contents() as $items) { ?>
		<tr><td><img src="<?php echo base_url().'images/'.$items['name']; ?>" width="50"><br>
		<?php foreach ($this->cart->product_options($items['rowid']) as  $option_value): ?>
<?php echo $option_value; ?>
<?php endforeach; ?>
		</td>
			<td><?php echo $items['qty']; ?></td>
			<td>Rp <?php echo $this->cart->format_number($items['subtotal']); ?>
		<?php echo form_hidden("id_barang[]",$items['id']); ?>
		<?php echo form_hidden("qty[]",$items['qty']); 
		?>
			</td></tr>
		<?php } ?>
		<tr bgcolor='#D3D3D3'><td colspan='2' valign='top' align='right'>Subtotal &nbsp; &nbsp; Rp
										<p>Ongkos kirim &nbsp; &nbsp; Rp</p>
										<p><b>TOTAL &nbsp; &nbsp; Rp</b></p></td>
			<td valign='top' align='right'> <?php 
				echo $this->cart->format_number($this->cart->total()); ?><br>
				<div id="ongkir"></div>
				<?php endif; ?>
<?php echo form_close(); ?>
</div></td></tr>
	</div>
	</div>
	
