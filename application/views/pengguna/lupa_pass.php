<td valign="top">
<div class="nama-content">Lupa kata sandi?</div>
<div class="ktkbiasa" width="100%">
Tolong masukkan alamat email Anda. Kami akan kirim email dengan instruksi untuk mengubah password Anda.
<p align="right"><font size="1px">*Wajib diisi</font></p>
<?php if($this->session->flashdata('message')){?>
<p class='flashdata-red'> <?php echo $this->session->flashdata('message');?> </p>
<?php } ?>
<?php echo form_open('pengguna/lupa_pass');?>
<div class="nama-ktkbiasa" align="center">Email* :
<?php $em=array('name'=>'email', 
				'id'=>'email', 
				'class'=>'input is-info',
				'value'=>set_value('email')
				);	echo form_input($em); 
	echo "<div class='merah'>".form_error('email')."</div>"; ?>
							  
</div>
<table width="100%"> <tr><td>
<?php echo '<a href="'.base_url().'">'. form_button('login','� KEMBALI','class=tmbl-oren')."</a></td><td align='right'>".
 form_submit('submit','KIRIM','class=tmbl-oren'); 
 echo form_close();?></td></tr>
</table>
</div>
</td></tr>

	</table>
