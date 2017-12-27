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
<?php  echo form_open ('pengguna/addbayar_exe');
	foreach($query1->result_array() as $id) {  
			$id_user=$id['id_user'];
			}	echo form_hidden('id_user',$id_user);   		
?>

<div class='byr'><strong>1. Informasi Anda</strong></div>
<?php $id_pesanan = date("dmyHis");
			echo form_hidden('id_pesanan',$id_pesanan);  ?>
	<div id="bayar"><div class="nama-akun">Alamat pengiriman</div><br>
	<font color='red' size='1px'><?php echo validation_errors(); ?> </font>
<div align='right'>* wajib diisi</div>

	<table  align='center'>
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
	<?php if($alamat->result_array()){ ?>
		<tr><td colspan="2"><a href="<?php echo base_url()?>pengguna/bayar" ><?php echo form_button('bayar','&laquo; Kembali ','class=tmbl-oren');?></a> 	</td></tr>
	<?php } ?>
	
	
<!----------------------------jika Login--------------------------------->
	</table>
	<br><?php $today = date("Y-m-d H:i:s");
			echo form_hidden('tgl_pesanan',$today); ?>
	</div>
</td>

<td valign='top' ><div class='byr'><strong>3. Konfirmasi Pesanan</strong></div>
<div id="bayar" >
<?php 
//------------------------------------------------------------------------KERANJANG-------------------------------------------------
 if(!$this->cart->contents()):
	echo "<font color='red'>Keranjang Kosong</font>";
else: ?>
	<table class='t_bayar' align='center'width="600px">
	<tr><th align='left'>PRODUK</th><th>JUMLAH</th><th>HARGA</th></tr>
		<?php
		foreach($this->cart->contents() as $items) {
	 ?>
			<tr><td><img src="<?php echo base_url().'images/'.$items['name']; ?>" width="50" align="left">
					<?php foreach ($this->cart->product_options($items['rowid']) as $option_value): 
						echo $option_value; 
						endforeach; ?></td>
				<td><?php echo $items['qty']; ?></td>
				<td>Rp <?php 	echo $this->cart->format_number($items['subtotal']); 
							 echo form_hidden("id_barang[]",$items['id']); 
							 echo form_hidden("qty[]",$items['qty']); ?>
				</td></tr>
		<?php } ?>
		<tr bgcolor='#D3D3D3'><td colspan='2' valign='top' align='right'>Subtotal &nbsp; &nbsp; Rp
										<p>Ongkos kirim** &nbsp; &nbsp; Rp</p>
										<p><b>TOTAL &nbsp; &nbsp; Rp</b></p></td>
			<td valign='top' align='right'> <?php 
				echo $this->cart->format_number($this->cart->total()); ?><br>
				
		<div id='ongkir'></div>
				
				
				
				</td></tr>
		</table>
			<font size="1px">** Ongkos kirim akan muncul setelah mengisi kolom kota </font>	
	</div>
	<tr><td align="right"><?php echo form_submit('bayar','Bayar','class=tmbl'); ?></td></tr>

<?php endif; ?>
</tr>
		</table>

<?php echo form_close(); ?>