<?php
			$st = array('id' => 'pesanan', 'class' => 'address_info', 'style'=>'border:1px dashed #666666; padding:10px;');
			echo form_fieldset('Data Forum',$st); ?>
<a href="<?php echo base_url();?>pengguna_forum/admin_forum">Back</a>
<div id="kotak">
<?php foreach($topik as $tpk){ ?>
<div class="keterangan"><img src="<?php echo base_url();?>asset/img/star.png" >  <b><?php echo $tpk->topik; ?></b></div>
<?php echo $tpk->isi; ?>
<p align="right"><font size="1px">Posted: <i> <?php echo $tpk->tgl_topik; ?> </i>
<br>By:
 <?php echo $tpk->nama_user."<br> Replies:".$total;?>
 </font></p>
<?php }?>
</div>
<!--------- BALASAN ------->
<?php foreach($replay->result_array() as $rp){ ?>
<div class="keterangan">
	<div >
	<img src="<?php echo base_url();?>asset/img/user.png" align="top"> <?php echo $rp['nama_user']; ?>:
	</div>
<?php echo $rp['isi_replay']; ?>
	<p align="right"><font size="1px"><i> <?php echo $rp['tgl_replay']; ?> </i>
	</font></p>
</div>
<?php } ?>

<!---------form balasan---------------->

<?php echo form_open('pengguna_forum/admin_forumreplay_exe'); ?>
 <div class="tulisan-red"><?php echo validation_errors(); ?></div>
<br><div class="keterangan"><b>REPLAY</b></div><br><?php  $isi = array( 'name' => 'isi_replay',
								'id' => 'isi_replay',
								'class' => 'inputan-txt',
								'cols' => '1500',
								 );
echo form_textarea ($isi); ?>
<br>
<a href="<?php echo base_url();?>pengguna_forum/admin_forum"><?php echo form_button('back','Back','class=tombol'); ?></a>
<?php
	echo form_submit('kirim','Kirim','class=tombol');
		echo form_hidden('id_user','1');
		$today = date("Y-m-d H:i:s");
		echo form_hidden('tgl_replay',$today);
		echo form_hidden('id_topik',$tpk->id_topik);
		//echo form_input('count',$tpk->count);

echo form_close();
?>

<?php echo form_fieldset_close(); ?>
</div>
</div>