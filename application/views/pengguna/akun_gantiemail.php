<td valign="top">	
<div class="nama-content"> Ubah E-mail</div>
<div class="akun"><div class="nama-akun"> Informasi e-mail Anda</div>
<?php echo form_open('pengguna_akun/gantiemail'); ?>
<table>
<tr><td align="right">Email lama &nbsp;</td><td><?php foreach ($query1->result_array() as $em){ 
				echo $em['email']. form_hidden('id_user',$em['id_user']); } ?></td></tr>
<tr><td align="right">Email baru* &nbsp; </td><td><?php echo form_input('email',set_value('email'),'class=inputan'); ?></td></tr>
</table><font color='red' size='1px'><?php echo form_error('email'); ?></font>
 <font size="1px">*Wajib diisi</font>


<div align="right"><?php echo form_submit('submit','SIMPAN','class=tmbl-oren').
form_close(); ?></div>
</div>
</td></tr>
<tr><td>nxn
</td></tr>
</table>
 </div>
<br>

