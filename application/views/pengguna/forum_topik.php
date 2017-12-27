<td valign="top" rowspan="3">
<div class="nama-content">
FORUM</div>
<div class="ktkbiasa">
<div class="nama-ktkbiasa" >Topik Baru</div>
<div class="merah"><?php echo validation_errors(); ?></div>
Judul Topik <br> 
<?php echo form_open('pengguna_forum/topik_add_exe'); 
echo form_input('topik','','class=inputan'); ?>
<br>Isi<br><?php  $isi = array( 'name' => 'isi',
								'id' => 'isi',
								'class' => 'inputan-txt',
								'cols' => '1500',
								 );
echo form_textarea ($isi); ?>
<br>
<a href="<?php echo base_url();?>pengguna_forum"><?php echo form_button('back','Back','class=tombol'); ?></a>
<?php
foreach($query1->result_array() as $id)	{
		echo form_hidden('id_user',$id['id_user']);
				}
$today = date("Y-m-d H:i:s");
		echo form_hidden('tgl_topik',$today);
 
echo form_submit('kirim','Kirim','class=tombol');
echo form_close();
?>

</div>
 </td></tr>
 
	</table>
										