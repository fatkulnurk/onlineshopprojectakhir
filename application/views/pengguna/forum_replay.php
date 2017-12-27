<td valign="top" rowspan="3">
<div class="nama-content">
FORUM</div>
<a href="<?php echo base_url(); ?>pengguna_forum/"><i class="icon-chevron-left "></i>Back</a>
<div class="ktkbiasa"><?php foreach($topik as $tpk){ ?>
<div class="nama-ktkbiasa" ><img src="<?php echo base_url();?>asset/img/forum.png" >  <?php echo $tpk->topik; ?></div>
<?php echo $tpk->isi; ?>
<p align="right"><font size="1px">Posted: <i> <?php echo $tpk->tgl_topik; ?> </i>
<br>By:
 <?php echo $tpk->nama_user."<br> Replies:".$total;?>
 </font></p>
<?php }?>
</div>
<!--------- BALASAN ------->
<?php foreach($replay->result_array() as $rp){ ?>
<div class="bktm">
	<div class="bukutamu-nama">
	<img src="<?php echo base_url();?>asset/img/user.png" align="top"> <?php echo $rp['nama_user']; ?>
	</div>
<?php echo $rp['isi_replay']; ?>
	<p align="right"><font size="1px"><i> <?php echo $rp['tgl_replay']; ?> </i>
	</font></p>
</div>
<?php } ?>
<!--------- ISI BALASAN------->
<?php if($this->session->userdata('is_logged_in') == true) { ?>
<div class="ktkbiasa">
<?php echo form_open('pengguna_forum/forum_replay_exe'); ?>
 <div class="merah"><?php echo validation_errors(); ?></div>
<br>Replay<br><?php  $isi = array( 'name' => 'isi_replay',
								'id' => 'isi_replay',
								'class' => 'inputan-txt',
								'cols' => '1500',
								 );
echo form_textarea ($isi); ?>
<br>
<a href="<?php echo base_url();?>pengguna_forum/"><?php echo form_button('back','Back','class=tombol'); ?></a>
<?php
	echo form_submit('kirim','Kirim','class=tombol');
		foreach($query1->result_array() as $id)	{
		echo form_hidden('id_user',$id['id_user']);
				}
		$today = date("Y-m-d H:i:s");
		echo form_hidden('tgl_replay',$today);
		echo form_hidden('id_topik',$tpk->id_topik);
		//echo form_input('count',$tpk->count);

echo form_close();
?>
</div>
<?php } ?>
 </td></tr>
 
	</table>
										