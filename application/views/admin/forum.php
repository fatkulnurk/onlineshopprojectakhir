
<div id="kotak-putus">
<div class="Ket"><table width="100%" class="table"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> Forum </td>
	<td align="right"><?php echo "<a href='".base_url()."pengguna_forum/admin_topikadd' class='tmbl-putih'>";?>Buat topik baru
	<i class="icon-comment "></i></a> </td></tr>
	</table>
</div>
<div id="kotak-biasa">
	<table id="example" class="display" width="100%" class="table">
	<thead>
	<tr><th width="5"></th><th>Isi</th><th>Posting</th><th>Replay</th></tr>
	</thead>
	<tbody>
	<?php 
	foreach ($data->result_array() as $frm)
	{
	?>
<tr><td><?php echo '<a href="'.base_url().'pengguna_forum/topik_del/'.$frm['id_topik'].'" 
					title="Hapus" onclick="return confirm (\'Hapus topik &quot;'.$frm['topik'].'&quot;?\')">' ?>
<img src="<?php echo base_url();?>asset/img/del.png"></a></td>
	<td><a href="<?php echo base_url().'pengguna_forum/admin_forum_replay/'.$frm['id_topik'];?>"><img src="<?php echo base_url();?>asset/img/star.png" ><b> <?php echo $frm['topik']; ?></b></a><br>
		<?php echo $frm['isi']; ?></td>
	<td><?php echo $frm['tgl_topik']; ?><br><font size="1px">Author: <?php echo $frm['nama_user']; ?></font></td>
	<td><?php echo $frm['count']; ?></td>
	
</tr>
<?php } ?></tbody>
</table>
<?php echo form_fieldset_close(); ?>
</div>
</div>