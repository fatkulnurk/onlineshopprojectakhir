<div id="kotak-putus">
<?php echo form_open("admin/produk_edit/$edit->id_produk");
	  echo form_hidden('id_produk',$edit->id_produk);
?>
<div class="Ket">
<table width="100%" class="table"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> <?php echo $title; ?> </td>
	<td align="right"><?php echo form_submit('submit','Simpan','class=tmbl-putih'); ?>
		<a href="<?php echo base_url().'admin/produk';?>" class="tmbl-putih"><i class='icon-remove'></i> Batal</a></td></tr>
	</table>
</div>
<div id="kotak-biasa" align="center">
Nama Produk : <?php echo form_input('nama_produk',$edit->nama_produk,'class=inputan'); ?>
<font color='red' size='1px'><?php echo validation_errors(); ?></font>
</div>
</div>