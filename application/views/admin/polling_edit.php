<div id="kotak-putus"><?php 	echo form_open('pengguna_polling/polling_edit_exe');?>
<div class="Ket">
	<table width="100%"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> <?php echo $title; ?> </td>
	<td align="right"><?php echo form_Submit('submit','Simpan','class=tmbl-putih');
	foreach($pertanyaan->result_array() as $pr) {
	echo "<a href='".base_url()."pengguna_polling/polling_sebelumnya_adm/".$pr['idtanya']."' class='tmbl-putih'><i class='icon-share-alt'></i> Batal </a>"; 
	}
	echo "<a href='".base_url()."pengguna_polling/polling_adm' class='tmbl-putih'><i class='icon-list'></i> Lihat Polling Lain </a>";
	 ?></td></tr>
	</table>
</div>

<table align="center" width="100%">
<tr><td>


	<?php foreach($pertanyaan->result_array() as $tny)
	{ ?>
	<table align="center">
		<tr><td valign="top" colspan="2">Pertanyaan Polling :<br><br> <?php echo form_textarea('pertanyaan',$tny['pertanyaan'],'class=inputan'); 
		 echo form_hidden("idtanya",$tny['idtanya']);
		}?> 
		
		</td></tr>
	<?php 
	$no=1;		
	foreach($jawaban->result_array() as $jwb)
	{ 
	?>
		<tr><td align="right">Jawaban <?php echo $no; ?> : &nbsp; </td><td> <?php echo form_input("jawaban$no",$jwb['jawaban'],'class=inputan'); 
		echo form_hidden("nomor$no",$jwb['nomor']);	
		$no++;} ?> </td></tr>
	</table>

	
<?php echo form_close();
echo form_fieldset_close(); ?>
	</td>
</tr>
	</table>

</div>