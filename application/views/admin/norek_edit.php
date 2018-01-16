<div id="kotak-putus">
<?php echo form_open("admin/norek_edit/$edit->id_norek");
?>
<div class="Ket">
<table width="100%" class="table"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> <?php echo $title; ?> </td>
	<td align="right"><?php echo form_submit('submit','Simpan','class=tmbl-putih'); ?>
		<a href="<?php echo base_url().'admin/norek';?>" class="tmbl-putih"><i class='icon-remove'></i> Batal</a></td></tr>
	</table>
</div>
<div id="kotak-biasa" align="center">

	<table class="table">
	<tr><td valign="top">Nama Bank </td><td valign="top">: <?php echo form_input('bankrekning',$edit->bankrekning,'class=inputan'); 
				echo"<font color='red' size='1px'>".form_error('bankrekning')."</font>";?></td></tr>
	<tr><td valign="top">Nomor Rekning </td><td valign="top"> : <?php echo form_input('norekning',$edit->norekning,'class=inputan');
				echo"<font color='red' size='1px'>".form_error('norekning')."</font>";?></td></tr>		
	<tr><td valign="top">Atas Nama </td><td valign="top"> :  <?php echo form_input('namarekning',$edit->namarekning,'class=inputan'); 
				echo"<font color='red' size='1px'>".form_error('namarekning')."</font>";?></td></tr>
	</table>
	
<?php echo form_close(); ?>	
</div>
</div>