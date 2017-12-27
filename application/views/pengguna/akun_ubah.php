<td valign="top">	
<div class="nama-content"> Ubah kata sandi</div>
<div class="akun"><div class="nama-akun"> Informasi pengesahan</div>
<?php echo form_open('pengguna_akun/ubahakun'); ?>
<table>
<tr><td align="right">Email &nbsp;</td><td><?php foreach ($query1->result_array() as $em){ echo $em['email']. form_hidden('email',$em['email']);  ?></td></tr>
<tr><td align="right">Nama Lama &nbsp;</td><td><?php echo $em['nama_user'];  ?></td></tr>
<tr><td align="right">Nama Depan* &nbsp;</td><td><?php echo form_input('nama',set_value('nama'),'class=inputan'); ?></td></tr>
<tr><td align="right">Nama Belakang &nbsp;</td><td><?php echo form_input('nama_b',set_value('nama_b'),'class=inputan'); }?></td></tr>
</table><font color='red' size='1px'><?php echo form_error('nama'); ?></font>
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

