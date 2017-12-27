<table  align="center" width="90%" >
<tr><td colspan="2">
<?php echo form_open("pengguna/update_keranjang"); ?>
<div class="nama-content"><strong>Daftar Pesanan Anda</strong></div>
<?php if($this->session->flashdata('message')){?>
<p class='flashdata'> <?php echo $this->session->flashdata('message');?> </p>
<?php } ?>
<div class="buku-tamu"><?php if(!$this->cart->contents()):
	echo "<font color='red'>Keranjang Kosong</font><div align='right'>".nbs(10);
	echo "<a href ='".base_url()."'>".form_button('Kembali ke Katalog','Kembali ke Katalog','class=tmbl-oren')."</a></div>";
else:?>
	<table   class="t_kranjang" width="100%">
	<tr>
	<th colspan='2' align='left'> Pesanan</th><th >Harga</th><th>Jumlah</th><th>Sub Total</th><th>Tools</th>
	</tr>	
	

<?php $i = 1; 
$kr=0;
 foreach($this->cart->contents() as $items):
$kr++;
?>
<tr>
	<td><?php echo form_hidden("rowid$kr", $items['rowid']);
			  echo form_hidden("nama$kr", $items['name']); ?>
		<img src="<?php echo base_url().'images/'.$items['name']; ?>" width="100"/>
	</td>
	<td >	
	<?php foreach ($this->cart->product_options($items['rowid']) as $option_value):  
	echo $option_value;
	endforeach; 
	  echo form_hidden("id_barang$kr", $items['id']);
	  echo form_hidden("stokawal$kr", $items['stokawal']);
	  
	  ?>
	
	</td>
	
	<td><?php echo 'Rp '.$this->cart->format_number($items['price']);?></td>
	<td><?php $qty=array('name'=>"qty$kr", 
						 'class'=>'qty',
						 'size'=>'2',
						 'onKeyPress'=>'return numbersonly(this, event)',
						 'value'=>$items['qty']);										echo form_input($qty)." Kg";
				?>
					
				

					
			
	</td>
	<td><?php echo 'Rp '. $this->cart->format_number($items['subtotal']); ?></td>
	<td><p align='right'><?php echo '<a href="'.base_url().'pengguna/hapus_keranjang/'.$items['rowid'].'/'.$items['stokawal'].'/'.$items['id'].'" title="Hapus">' ?>
			<img src="<?php echo base_url();?>asset/img/remove.png"/>hapus</a></p></td>
	
</tr>
	<?php $i++; ?>
		<?php endforeach; ?>
<tr>
	<td colspan='3'>Total</td><td colspan='2'>Rp <?php echo $this->cart->format_number($this->cart->total()); ?>
	<font color='red' size='1px'>*</font>
	</td>
</tr>
	</table>
	<table width='100%'>
	<tr><td><font color='red' size='1px'>*</font> &nbsp;Total harga di atas belum termasuk ongkos kirim yang akan 
		dihitung saat selesai belanja.<br>
		<font color='red' size='1px'>**</font>  Apabila Anda mengubah jumlah, jangan lupa tekan tombol Update Keranjang Belanja</td>
	<td align="right" valign='top'><?php echo form_submit('submit','Update keranjang belanja','class=tmbl-biru'); ?></td></tr></table></div>
	

		<tr><td>
		<a href="<?php echo base_url() ?>"> <?php echo form_button('bayar','&laquo; Lanjutkan belanja ','class=tmbl-putih');?> </a>
</td><td align="right">
	 <?php if($this->session->userdata('is_logged_in') == true) : 								//Jika siuser udah login
	 ?>
   <div align='right'> <a href="<?php echo base_url()?>pengguna/bayar" >
   <?php echo form_button('bayar','Lanjutkan kepembayaran &raquo;','class=tmbl-oren');?> </a>
	  </div>
 <?php else : ?>
  <a href="<?php echo base_url()?>pengguna/login_bayar" >
  <?php echo form_button('bayar','Lanjutkan Kepembayaran &raquo;','class=tmbl-oren'); 
  ?> </a> </div>

 <?php endif;
	echo form_close(); 
	endif;?>
	 </td></tr>
</table>



	

		