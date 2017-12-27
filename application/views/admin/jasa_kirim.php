<div id="kotak-putus">
<div class="Ket"><table width="100%"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> <?php echo $title; ?> </td>
	<td align="right"></td></tr>
	</table>
</div>
<div id="kotak-biasa">
	<table id="example" class="display" width="100%">
	<thead>
<tr><th>No</th><th>Nama Jasa Pengiriman</th></tr>
	</thead>
	<tbody>
	<?php 
	
	$no = 1;
	foreach($jasa->result_array() as $j){
	?>
<tr><td><?php echo $no; ?></td>
	<td><?php echo $j['nama_jasa'];  ?></td>
	
</tr>
<?php $no++; } ?></tbody>
</table>
<?php echo form_fieldset_close(); ?>

</div>
</div>