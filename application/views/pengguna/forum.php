<td valign="top" rowspan="3">
<div class="nama-content">
FORUM </div> <?php if($this->session->userdata('is_logged_in') == true) { ?>
<div align="right"><a href="<?php echo base_url();?>pengguna_forum/topik_add"><img src="<?php echo base_url();?>asset/img/topik.png">Topik Baru</a></div>
<?php } ?>
<div class="ktkbiasa">

<table class="t_kranjang" width="100%">
<tr><th>Topik</th><th>Posting</th><th>Replay</th></tr>
<?php 
		foreach ($data->result_array() as $frm){
?>
<tr><td><a href="<?php echo base_url().'pengguna_forum/forum_replay/'.$frm['id_topik'];?>">
<img src="<?php echo base_url();?>asset/img/forum.png" > 
<b><?php echo $frm['topik']; ?></b></a>
		<p><font size="1px"><?php echo $frm['isi']; ?></font></p></td>
	<td><?php echo $frm['tgl_topik'];?>
	<br><font size="1px">Author: <?php echo $frm['nama_user']; ?></font>
	
	</td>
	<td align="center">
	<?php echo $frm['count']; ?>
	</td></tr>
<?php } ?>
</table>
<div  align="center"><?php echo $paginator;?></div>
</div>
 </td></tr>
 
	</table>
										