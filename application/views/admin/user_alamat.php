<div id="kotak-putus">
<div class="Ket">
<table width="100%"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> Daftar Alamat <b><?php echo $nama->nama_user; ?></b></td>
	<td align="right"><?php echo "<a href='".base_url()."admin/user'>". form_button('Insert','Kembali','class=tmbl-oren')."</a>"; ?></td></tr>
	</table>
</div>
<div id="kotak-biasa">
	<table id="example" class="display" width="100%">
	<thead>
<tr><th>No.</th><th>Nama</th><th>Alamat</th><th>No. Telpon </th><th>Status</th></tr>
	</thead>
	<tbody>
	<?php 
	
	$no = 1;
	foreach($data->result_array() as $al)
	{
	?>
<tr><td><?php echo $no; ?></td>
	<td><?php echo $al['nama']; ?></td>
	<td><?php echo $al['alamat'].'<br>'.$al['kota_kabupaten'].' - '.$al['propinsi']; ?></td>
	<td><?php echo $al['hp']; ?></td>
	<td><?php if($al['sts_alamat']=='1'){echo "Alamat utama";} 
			if($al['sts_alamat']=='2'){echo "tidak digunakan";}
			if($al['sts_alamat']=='0'){echo "-";} ?></td>

</tr>
<?php $no++; } ?></tbody>
</table>
<?php echo form_fieldset_close(); ?>
</div>
</div>