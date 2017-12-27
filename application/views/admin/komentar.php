<div id="kotak-putus">
<div class="Ket"><table width="100%"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> <?php echo $title; ?> </td>
	<td align="right"></td></tr>
	</table>
</div>
<div id="kotak-biasa">
	<table id="example" class="display" width="100%">
	<thead>
	<tr><th>No.</th><th>Komentar </th><th>Barang</th><th>Date time</th><th>Nama </th><th>Email </th><th>Tools</th></tr>
	</thead>
	<tbody>
	<?php 
	
	$no = 1;
	foreach($data->result_array() as $k)
	{
	?>
<tr><td><?php echo $no; ?></td>
	<td><?php echo $k['komentar']; ?></td>
	<td><img src="<?php echo base_url().'images/'.$k['gambar']; ?>" width="50" align="top"> <?php echo $k['nama_barang']; ?></td>
	<td align="center"><?php echo $k['tgl_komentar']; ?></td>
	<td><?php echo $k['nama_user']; ?></td>
	<td><?php echo $k['email']; ?></td>
	<td><?php echo '<a href="'.base_url().'admin/komentar_del/'.$k['id_komentar'].'" 
					title="Hapus" class="tmbl-putih" onclick="return confirm (\'Anda yakin akan menghapus komentar ini?\')">' ?>
		<i class="icon-remove"></i>..hapus</a></td>
	</tr>
	
<?php $no++; } ?></tbody>
</table>
<?php echo form_fieldset_close(); ?>
</div>
</div>