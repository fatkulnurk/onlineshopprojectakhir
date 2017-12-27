<script language="javascript" src="<?php echo base_url(); ?>asset/js/jquery.js" type="text/javascript"></script>
  <script language="javascript" src="<?php echo base_url(); ?>asset/js/jquery.dataTables.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/jquery.dataTables.css"  /> 
  
  <script charset="utf-8" type="text/javascript">
 $(document).ready(function() {
    $('#example').dataTable();
} );
</script>

<div id="kotak-putus"><div class="Ket"><table width="100%"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> <?php echo $title; ?> </td>
	<td align="right">
	</td></tr>
	</table>
</div>
	<table id="example" class="display" width="100%">
	<thead>
<tr><th>No.</th><th>Nama</th><th>Email</th><th>Pesan </th><th>Tanggal </th><th>Tools </th></tr>
	</thead>
	<tbody>
	<?php 
	
	$no = 1;
	foreach($query as $tamu)
	{
	?>
<tr><td><?php echo $no; ?></td>
	<td><?php echo $tamu->nama; ?></a></td>
		<td><?php echo $tamu->email; ?></td>
		<td><?php echo $tamu->komentar; ?></td>
		<td><?php echo tgl_indo($tamu->tgl); ?></td>
		<td align="center"><?php if ($tamu->sts_bukutamu=='0'){echo '<a href="'.base_url().'admin/bukutamu_tampil/'.$tamu->id_bukutamu.'" class="tmbl-putih">
		<i class="icon-ok"></i> Tampilkan</a>';}
		if($tamu->sts_bukutamu=='1'){echo "<font color='green'><i class='icon-ok'></i> Ditampilkan </font>";}
		echo '<a href="'.base_url().'admin/bukutamu_del/'.$tamu->id_bukutamu.'" 
						title="Hapus" class="tmbl-putih" onclick="return confirm (\'Anda yakin akan menghapus data ini?\')">' ?>
			<i class="icon-remove"></i> hapus </a></td>
</tr>
<?php $no++; } ?></tbody>
</table>
