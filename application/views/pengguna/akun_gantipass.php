<td valign="top">	
<div class="nama-content"> Ubah kata sandi</div>
<div class="akun"><div class="nama-akun"> Informasi pengesahan</div>
<?php echo form_open('pengguna_akun/gantipass_exe'); ?>
<table>
<tr><td align="right">Email &nbsp;</td><td><?php foreach ($query1->result_array() as $em){ echo $em['email']. form_hidden('email',$em['email']); } ?></td></tr>
<tr><td align="right">Kata Sandi Lama*</td><td><?php echo form_password('password_lama','','class=inputan'); ?></td></tr>
<tr><td align="right">Kata Sandi Baru</td><td><?php echo form_password('password','','class=inputan'); ?></td></tr>
<tr><td align="right">&nbsp;&nbsp;&nbsp; Ketik Ulang Kata Sandi Baru*</td><td><?php echo form_password('konfirmasi_password','','class=inputan'); ?></td></tr>
</table>
<font color='red' size='1px'><?php echo $this->session->flashdata('message'); ?>
</font>

<div align="right"><?php echo form_submit('simpan','SIMPAN','class=tmbl-oren').
form_close(); ?></div>
</div>
</td></tr>
<tr><td>nxn
</td></tr>
</table>
 </div>
<br>

