<td valign="top" rowspan="3">
<!---------------DIAGRAM--------------------->

<center>	<?php if (!empty($chart)) 
				echo $chart;
		?> </center>
<br><br>
<!---------------Memilihnya--------------------->
<div class="buku-tamu" align="center">
<?php echo form_open('pengguna_polling/pilih_polling'); ?>
<table>


	<?php foreach($query4->result_array() as $poll) { ?>
	<tr><td colspan=2><div class="polling"><?php echo $poll['pertanyaan']; ?></div>
	<?php echo form_hidden('id_polling',$poll['idtanya']);?></td></tr>
		<?php } ?>
		<?php 
		$total=0;
		$ttle=0;
		foreach($query2->result_array() as $poll) {
		$ttle += $poll['jumlah'];
		}
		$ttl=$ttle;

		foreach($query2->result_array() as $poll) {
		$total += $poll['jumlah'];
		$nomor=$poll['nomor'];
		if($poll['jumlah']>0){
		$persen = sprintf("%01.1f",($poll['jumlah']/$ttl)*100);
		} else { $persen=0; }
		?>
	<tr><td>
	<?php if(!$lihatip->result_array()) { 
		echo form_radio('nomor',$poll['nomor']);
	 } ?>
	        
	 
	<?php echo $poll['jawaban']; ?></td><td><?php echo $poll['jumlah']." ($persen%)"; 
	}?></td></tr>
	<tr><td><i>Total</i></td><td><i><?php  echo $total; ?></i>
	</td></tr>
</table>
<?php if(!$lihatip->result_array()) {
	echo form_submit('pilih','Pilih','class=tmbl-red');
	 }?>
</div>
<?php echo form_close(); ?>
<br><br>
<div class="buku-tamu"><div class="polling">Polling sebelumnya : </div>
<ul>
<?php foreach($query3->result_array() as $poll){ ?>
<li>
<a href="<?php echo base_url().'pengguna_polling/polling_sebelumnya/'.$poll['idtanya']?>"><?php echo $poll['pertanyaan']; ?></a>
 <?php
 }?>
 </li>
 </ul></div>
 </td></tr>
	</table>
										