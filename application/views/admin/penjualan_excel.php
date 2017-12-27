
<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=penjualan.xls");
header("Pragma: no-cache");
header("Expires: 10");
?>
	<table width="100%" border="1">
	<tr>
	<th >No.</th><th >Id Pesanan</th><th >Tgl pengiriman </th><th >Nama Barang</th>
	<th >Qty</th>
	<th >Harga </th>
	<th >Subtotal </th>
	</tr>

	<?php 
	
	$no = 1;
	foreach($data->result_array() as $order)
	{
	?>
<tr><td ><?php echo $no; ?></td>
	<td ><?php echo $order['id_pesanan']; ?></td>
	<td ><?php echo $order['tgl_kirim']; ?></td>
	<td ><?php echo $order['nama_barang']; ?></td>
	<td ><?php echo $order['qty']; ?></td>
	<td ><?php echo $order['harga']; ?></td>
	<td ><?php echo $order['nama']; ?></td>
	<td><?php echo "Rp ".number_format($order['harga'],2,',','.');?></td>
	<td><?php $total= $order['qty'] * $order['harga']; echo  "Rp ".number_format($total); ?></td>
</tr>
<?php $no++; } ?>

</tbody>
<tr ><td colspan="7" align="center" bgcolor="#DEEFFF" >Total Transaksi</td><td  colspan="2" align="center" bgcolor="#DEEFFF" ><?php foreach($rp as $total)
	{ echo "Rp ".number_format($total,2,',','.'); } ?></td></tr>
</table>
    <span ><img src="<?php echo base_url();?>asset/img/pr.png"><a href="#"></i> Cetak </a></span>