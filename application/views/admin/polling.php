Home :: Polling
<div id="kotak-putus">
<div class="Ket"><table width="100%"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> Polling </td>
	<td align="right"><?php
echo "<a href='".base_url()."pengguna_polling/polling_add' class='tmbl-putih'> <i class='icon-plus'></i> Buat Polling Baru </a>";
	?></td></tr>
	</table>
</div>
<div id="kotak-biasa">

	<table id="example" class="display" width="100%">
	<thead>
<tr><th>No.</th><th>Pertanyaan</th><th>Tanggal</th><th>Tools</th></tr>
	</thead>
	<tbody>
	<?php 
	
	$no = 1;
	foreach($query->result_array() as $tny)
	{
	?>
<tr><td><?php echo $no; ?></td>
	<td><?php echo $tny['pertanyaan']; ?></td>
	<td align="center"><?php echo tgl_indo($tny['tanggal']); ?></td>
	<td align="right"><?php echo '<a href="'.base_url().'pengguna_polling/polling_sebelumnya_adm/'.$tny['idtanya'].'" class="tmbl-putih"> 
	<i class="icon-signal"></i> Lihat hasil </a>';
	echo '<a href="'.base_url().'pengguna_polling/polling_edit/'.$tny['idtanya'].'" title="Ubah" class="tmbl-putih">';?>
							<i class='icon-pencil'></i>Edit</a>
			<?php echo '<a href="'.base_url().'pengguna_polling/polling_del/'.$tny['idtanya'].'" 
					title="Hapus" class="tmbl-putih" onclick="return confirm (\'Anda yakin akan menghapus polling ini?\')">'.
		"<i class='icon-remove'></i>Hapus</a> ";
		
		?>
			</td>
</tr>
<?php $no++; } ?></tbody>
</table>
</div>
</div>
