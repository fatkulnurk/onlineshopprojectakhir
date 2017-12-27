<div id="kotak-putus"><?php echo form_open('admin/produk_add'); ?>
<div class="Ket"><table width="100%"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> <?php echo $title; ?> </td>
	<td align="right"><?php echo form_submit('submit','Simpan','class=tmbl-putih'); ?>
		<a href="javascript:history.back(1)" class="tmbl-putih"><i class='icon-remove'></i> Batal</a></td></tr>
	</table>
</div>
<div id="kotak-biasa">
<?php if($this->session->flashdata('message')){?>
<p class='flashdata'> <?php echo $this->session->flashdata('message');?> </p>
<?php } ?>
<table align="center" border="0">
 
  <tr>
    <td><font color='#252222' face='Verdana, Geneva, Arial, Helvetica, Sans-Serif' size='2px'>
	Kategori :</td>
    <td><?php echo form_input('nama_produk',set_value('nama_produk'),'class=inputan'); ?>
	</td>
	<td><font color='red' size='1px'><?php echo validation_errors(); ?></font>
	</td>
  </tr>
</table>
<?php echo form_close(); ?>
</div>
</div>