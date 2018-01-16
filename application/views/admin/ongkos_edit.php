<div id="kotak-putus">
<?php echo form_open('admin/ongkos_edit_exe');
		echo form_hidden('kota_id',$edit->kota_id);
?>
<div class="Ket">
<table width="100%" class="table"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> <?php echo $title; ?> </td>
	<td align="right"><?php echo form_submit('submit','Simpan','class=tmbl-putih'); ?>
		<a href="<?php echo base_url().'admin/ongkos';?>" class="tmbl-putih"><i class='icon-remove'></i> Batal</a></td></tr>
	</table>
</div>
<div id="kotak-biasa" align="center">

	<table class="table">
	<tr><td>Propinsi </td><td>: <?php	
				echo $edit->propinsi; ?></td></tr>
		<tr><td>Kota/Kabupaten </td><td> : <?php	
				echo $edit->kota_kabupaten; ?></td></tr>		
		<tr><td>Tarif </td><td> : Rp <?php $tr=array('name'=>'tarif','id'=>'tarif','class'=>'inputan','class'=>'inputan','onKeyPress'=>'return numbersonly(this, event)');
								echo form_input($tr,$edit->tarif); ?></td></tr>
	</table>
<?php echo form_close(); ?>	
</div>
</div>