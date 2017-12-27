<table align='center'>
<tr><td> <div id="login">
<div class='nama-content'><strong>Pelanggan terdaftar</strong></div>
			<div align="right"><font size ='1' align='right'>* wajib diisi &nbsp;</font>
</div>
<?php echo form_open('pengguna/login'); ?>
<table align='center'>
<tr><td valign='top' align='right'>Email * &nbsp;</td><td>
	<?php	echo form_input('email',set_value('email'),'class=inputan'); ?></td></tr>
<tr><td valign='top' align='right'>Password * &nbsp;</td><td>
		<?php $pwd=array('name'=>'password', 
						  'id'=>'password', 
						  'class'=>'inputan');			echo form_password($pwd); ?></td></tr>
<tr><td valign='top'></td><td><font color='red' size='1px'><?php echo $message; ?> </font>
<br><a href="<?php echo base_url();?>pengguna/lupa_pass">Lupa kata sandi?</a>
</td></tr>
<tr><td ></td><td><br><?php	echo form_submit('login','L O G I N','class=tmbl'); ?> </td></tr>

</table>
<?php echo form_close(); ?>

</div></td>
<td><div id="login">
<div class='nama-content'><strong>Belum anggota?</strong></div>
Anda dipersilakan untuk mendaftar akun sebagai pelanggan baru di toko kami!<br><br>
<center><a href="<?php echo base_url().'pengguna/registrasi'?>"><?php echo form_button('daftar','D A F T A R','class=tmbl-oren'); ?></a>
</div></td>
</tr>
</table>

