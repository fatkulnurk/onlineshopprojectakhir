<?php
			$st = array('id' => 'pesanan', 'class' => 'address_info', 'style'=>'border:1px dashed #666666; padding:10px;');
			echo form_fieldset('Topik Baru',$st); ?>
<?php echo form_open('pengguna_forum/admin_topikadd_exe'); ?>
<table align="center">
<tr><td>
<?php $today = date("Y-m-d H:i:s"); 
	echo form_hidden('tgl_topik',$today);
	echo form_hidden('id_user','1');
	?>
	Judul topik : <br>
<?php	echo	 form_input('topik','','class=inputan');?>
</td></tr>
<tr><td>Isi : <br>
 <?php  $isi = array( 'name' => 'isi',
								'id' => 'isi',
								'class' => 'inputan',
										 );
echo form_textarea ($isi); ?></td></tr>
<tr><td><a href="<?php echo base_url()?>pengguna_forum/admin_forum">
<?php echo form_input('kembali','Kembali','class=tombol'); ?>
</a>
<?php echo form_submit('simpan','Simpan','class=tombol'); ?></td></tr>
</table>
<?php echo form_close(); ?>
<?php echo form_fieldset_close(); ?>
</div>
</div>