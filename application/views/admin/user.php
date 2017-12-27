<div id="kotak-putus">
<div class="Ket"><img src="<?php echo base_url();?>asset/img/prod.png"> User
</div>
<div id="kotak-biasa">
	<table id="example" class="display" width="100%">
	<thead>
<tr><th>No.</th><th>Nama</th><th>Email</th><th>Tgl Registrasi </th><th>Menu</th></tr>
	</thead>
	<tbody>
	<?php 
	
	$no = 1;
	foreach($data->result_array() as $cust)
	{
	?>
<tr><td><?php echo $no; ?></td>
	<td><?php echo $cust['nama_user']; ?></td>
	<td><?php echo $cust['email']; ?></td>
	<td><?php echo tgl_indo($cust['tgl_registrasi']); ?></td>
	<td align='center'><?php echo '<a href="'.base_url().'admin/user_pesanan/'.$cust['id_user'].'" class="tmbl-putih">
	Transaksi <i class="icon-shopping-cart"></i></a>';
	echo '<a href="'.base_url().'admin/alamat_user/'.$cust['id_user'].'" class="tmbl-putih">
	Alamat <i class="icon-map-marker "></i></a>'; ?></td>
</tr>
<?php $no++; } ?></tbody>
</table>
<?php echo form_fieldset_close(); ?>
</div>
</div>