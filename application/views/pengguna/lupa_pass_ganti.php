<td valign="top">
<div class="nama-content">RESET PASSWORD <?php foreach($em as $m){ echo $m->email; ?></div>
<div class="ktkbiasa" width="100%">
<div class="nama-ktkbiasa">Masukkan Password Baru</div>
<?php if($this->session->flashdata('message')){?>
<p class='flashdata-red'> <?php echo $this->session->flashdata('message');?> </p>
<?php } $id = $m->id_user;
 echo form_open("pengguna/reset_pass/$id").
 form_hidden('email',$m->email); }?>
<table width="100%"><tr><td>Password Baru* : <?php $em=array('name'=>'password', 
				'id'=>'password', 
				'class'=>'inputan'
				);							echo form_password($em); 
	echo "<div class='merah'>".form_error('password')."</div>"; ?></td>
	<td valign="top">Ketik Ulang* :
	<?php $emk=array('name'=>'konfirmasi_password', 
				'id'=>'konfirmasi_password', 
				'class'=>'inputan'
				);							echo form_password($emk); 
	echo "<div class='merah'>".form_error('konfirmasi_password')."</div>"; ?>
</td>
<td valign="top"><?php echo form_submit('submit','SIMPAN','class=tmbl-oren');  echo form_close();?></td></tr>
</table>
<font size="1px">*Wajib diisi</font>

 
							  



</div>
</td></tr>

	</table>
