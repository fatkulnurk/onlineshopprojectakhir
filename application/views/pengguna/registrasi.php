
<td valign="top"><div class="nama-content"> Registrasi Pelanggan Baru</div>
<?php echo form_open('pengguna/registrasi');?>
<?php echo $message; ?>
 <table align='center'>
<tr><td valign='top' align='right'>Nama awal &nbsp; &nbsp; &nbsp;</td><td>
		<?php 	echo form_input('nama_awal',set_value('nama_awal'),'class="input is-info"');
		$today = date("Y-m-d H:i:s");
		echo form_hidden('tgl',$today); ?>
	<font color='red' size='1px'>*</font></td><td><?php echo"<font color='red' size='1px'>".form_error('nama_awal')."</font>";?></td></tr>
<tr><td valign='top' align='right'>Nama Akhir &nbsp; &nbsp; &nbsp;</td><td>
		<?php 	echo form_input('nama_akhir',set_value('nama_akhir'),'class="input is-info"');?></td><td></td></tr>
<tr><td valign='top' align='right'>Email &nbsp; &nbsp; &nbsp;</td><td>
		<?php echo form_input('email',set_value('email'),'class="input is-info"'); ?>
	<font color='red' size='1px'>*</font></td><td><?php echo"<font color='red' size='1px'>".form_error('email')."</font>";?></td></tr>
<tr><td valign='top' align='right'>Kata Sandi &nbsp; &nbsp; &nbsp; </td><td>
		<?php echo form_password('password',set_value('password'),'class="input is-info"'); ?>
	<font color='red' size='1px'>* Password minimal 6 karakter</font></td><td><?php echo"<font color='red' size='1px'>".form_error('password')."</font>";?></td></tr>
<tr><td valign='top' align='right'>Ketik ulang kata sandi &nbsp; &nbsp; &nbsp;</td><td>
		 <?php echo  form_password('konfirmasi_password',set_value('konfirmasi_password'),'class="input is-info"'); ?>
		<font color='red' size='1px'>* </font></td><td><?php echo"<font color='red' size='1px'>".form_error('konfirmasi_password')."</font>";?></td></tr>
<tr><td  ><font color='red' size='1px'>* Wajib diisi</font></td><td>
		<?php $kirim=array('name'=>'submit', 
						   'value'=>'Kirim', 
						   'class'=>'button is-info');		echo form_submit($kirim); ?> </td></tr>
</table>
<?php form_close(); ?>

</td></tr>
	</table>

	
