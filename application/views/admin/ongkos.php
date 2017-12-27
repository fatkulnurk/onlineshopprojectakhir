<div id="kotak-putus">
<div class="Ket"><table width="100%"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> <?php echo $title; ?> </td>
	<td align="right"></td></tr>
	</table>
</div>
<div id="kotak-biasa">
	<table id="example" class="display" width="100%">
	<thead>
<tr><th>No</th><th>PROVINSI</th><th>KOTA/ KABUPATEN</th><th>TARIF</th><th>TOOLS</th></tr>
	</thead>
	<tbody>
	<?php 
	
	$no = 1;
	foreach($data->result_array() as $tax)
	{
	?>
<tr><td><?php echo $no; ?></td>
	<td><?php echo form_hidden('kota_id',$tax['kota_id']); ?>
					  <?php echo $tax['propinsi'];  ?></td>
            <td><?php echo $tax['kota_kabupaten'];  ?></td>
            <td><?php echo "Rp ".number_format($tax['tarif'],2,',','.')
			;  ?></td>
			<td align="center"><a href="<?php echo base_url().'admin/ongkos_edit/'.$tax['kota_id'];?>" class="tmbl-putih">
				edit ongkos..<i class="icon-pencil"></i></a></td>
</tr>
<?php $no++; } ?></tbody>
</table>
<?php echo form_fieldset_close(); ?>

</div>
</div>