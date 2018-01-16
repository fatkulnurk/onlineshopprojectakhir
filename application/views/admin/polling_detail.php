<div id="kotak-putus">
<div class="Ket"><table width="100%" class="table"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png">Detail polling </td>
	<td align="right"><?php foreach($pertanyaan->result_array() as $pr) {
	echo '<a href="'.base_url().'pengguna_polling/reset_hasil/'.$pr['idtanya'].'"
		  onclick="return confirm (\'Anda yakin akan mereset hasil polling ini?\')" class="tmbl-putih">
		  <i class="icon-refresh"></i> Reset Hasil </a>';
	echo "<a href='".base_url()."pengguna_polling/polling_edit/".$pr['idtanya']."' title='ubah' class='tmbl-putih'><i class='icon-pencil'></i> Edit </a>";
		 }	
	echo "<a href='".base_url()."pengguna_polling/polling_adm' class='tmbl-putih'> <i class='icon-list'></i> Lihat Polling Lain </a>";	?>
	</td></tr>
	</table>
</div>
<div id="kotak-biasa">
<table align="center" width="100%" class="table">
<tr><td>
	<!---------------DIAGRAM--------------------->
<center>	<?php if (!empty($chart)) 
				echo $chart;
		?> </center>		
	<table class="t_poll" align="center" width="500">
	<?php 
		$total=0;
		$ttle=0;
		foreach($jawaban->result_array() as $jwb) {
		$ttle += $jwb['jumlah'];
		}
		$ttl=$ttle; ?>
<tr><td align="center" colspan="2"><b><?php echo $jwb['pertanyaan']; ?></b></td></tr>
<tr><td align="center">Total votes</td><td align="center"> <?php echo $ttle; ?></td></tr>
	<?php foreach($jawaban->result_array() as $jwb) {
	$jumlah=$jwb['jumlah'];
	if ($jumlah>0){ 
		$persen = round((($jumlah/$ttl)*100),1);
		} else{
		$persen =0;
		}
		
		?>	
	<tr><td align="center"><?php echo $jwb['jawaban']; ?></a></td>
	<td align="center"><?php echo $persen.'% ('.$jumlah.' votes)'; ?></td>
	</tr><?php  }?>	
	</table>

		</fieldset>
	</td>
</tr>
	</table>

</div>
</div>