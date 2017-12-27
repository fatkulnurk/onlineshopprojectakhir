<div id="kotak-putus"><div class="Ket"><img src="<?php echo base_url();?>asset/img/prod.png"> Pesanan
</div>
<div id="kotak-biasa">
	<table id="example" class="display" width="100%">
	<thead>
	<tr>
	<th>No.</th>
	<th>Id Pesanan</th>
	<th>Total Pesanan</th>
	<th>Tgl Pemesanan </th>
	<th>Pemesan </th>
	<th>Penerima </th>
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
	<td><?php echo $order['nama_user']; ?></td>
	<td><?php echo $order['nama']; ?></td>
	<td align="center"><?php if(!$order['gambar']){ echo "belum transfer";
		} else{ 
			if(!$order['no_resi']&&$order['sts']=='1'){ ?> <font color='red'>Pembayaran diterima</font>
		<?php }
			if($order['no_resi']){ echo "Resi : ".$order['no_resi'];}
			if(!$order['no_resi'] && $order['sts']=='0'){ echo "<font color='red'>Sudah transfer</font>";}
		} ?>	</td>
	<td align="center">
	<?php if($order['tgl_kirim']=='0000-00-00'){
	echo"Belum dikirim";
	} else{ echo tgl_indo($order['tgl_kirim']); }?></td>
</tr>
<?php $no++; } ?></tbody>
</table>

</div>
</div>