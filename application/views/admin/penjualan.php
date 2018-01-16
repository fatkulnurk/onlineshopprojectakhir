<div id="kotak-putus"><div class="Ket"><img src="<?php echo base_url();?>asset/img/prod.png"> Pesanan
</div>
<div id="kotak-biasa">
	<table id="example" class="table" width="100%">
	<thead>
	<tr>
	<th>No.</th>
	<th>Tanggal</th>
	<th>No.Pesanan</th>
	<th>Nama Barang</th>
	<th>Qty </th>
	<th>Harga </th>
	<th>Total</th>
	<th>Pengiriman</th>
	</tr>
	</thead>
	<tbody>
	<?php 
	
	$no = 1;
	foreach($penjualan->result_array() as $order)
	{
	$id=$order['id_pesanan'];
	?>
<tr><td><?php echo $no; ?></td>
	<td><?php echo tgl_indo($order['tgl_transfer']); //echo "Rp ".number_format($order['total_pesanan'],2,',','.'); ?></td>
	<td><a href="<?php echo base_url().'admin/detail_pesanan/'.$order['id_pesanan']?>"><?php echo $order['id_pesanan']; ?></a></td>
	<td><?php echo $order['nama_barang']; ?></td>
	<td><?php if($order['qty']>'1'){ echo $order['qty'].' pcs';}
				else{echo $order['qty'].' pc';;}
	 ?></td>
	<td><?php echo "Rp ".number_format($order['harga'],2,',','.'); ?></td>
	<td><?php $ttl=$order['harga']*$order['qty']; echo "Rp ".number_format($ttl,2,',','.'); ?></td>
	<td align="center">
	<?php if($order['tgl_kirim']=='0000-00-00'){
	echo"-";
	} else{ echo tgl_indo($order['tgl_kirim']); }?></td>
</tr>
<?php $no++; } ?></tbody>
</table>

</div>
</div>