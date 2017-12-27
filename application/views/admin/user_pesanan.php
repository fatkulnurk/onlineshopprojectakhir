<div id="kotak-putus"><div class="Ket"><table width="100%"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> Pesanan <b><?php echo $nama->nama_user; ?></b></td>
	<td align="right"><?php echo "<a href='".base_url()."admin/user'>". form_button('Insert','Kembali','class=tmbl-oren')."</a>"; ?></td></tr>
	</table>
</div>
<div id="kotak-biasa">
	<table id="example" class="display" width="100%">
	<thead>
	<tr>
	<th>No.</th>
	<th>Id Pesanan</th>
	<th>Total Pesanan</th>
	<th>Tgl Pemesanan </th>
	
	<th>Status</th>
	<th>Pengiriman</th>
	</tr>
	</thead>
	<tbody>
	<?php 
	
	$no = 1;
	foreach($data->result_array() as $order)
	{
	$id=$order['id_pesanan'];
	?>
<tr><td><?php echo $no; ?></td>
	<td><a href="<?php echo base_url().'admin/detail_pesanan/'.$order['id_pesanan']?>"><?php echo $order['id_pesanan']; ?></a></td>
	<td><?php echo "Rp ".number_format($order['total_pesanan'],2,',','.'); ?></td>
	<td><?php echo tgl_indo($order['tgl_pesanan']); ?></td>
	
	<td align="center"><?php if(!$order['gambar']){ echo "belum transfer";
		} else{ if(!$order['no_resi']){ ?> <font color='red'>confim </font>
		<?php }
		else{ echo "Resi : ".$order['no_resi'];}
		} ?>	</td>
	<td align="center">
	<?php if ($order['tgl_kirim']=='0000-00-00'){ echo "-";}
	else{
	echo $order['tgl_kirim']; } ?></td>
</tr>
<?php $no++; } ?></tbody>
</table>

</div>
</div>