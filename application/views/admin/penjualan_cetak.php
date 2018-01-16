<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}

body {font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 11px;}

.t_data
	 {
	 border-collapse:collapse;
	 }
	 

	 
	.t_data tr th
	 {
	 font-size:12px;
	 font-weight:bold;
	 padding:6px;
	 	  border:0.1px solid #D3D3D3;
	 }
	 
	.t_data tr td
	 {
	 font-size:12px;
	 padding:4px;
border:0.1px solid #D3D3D3;
	 }
	 
-->
</style>
	<table id="example" class="t_data" width="100%" class="table">
	<tr>
	<th >No.</th>
	<th >Id Pesanan</th>	
	<th >Tgl Pemesanan </th>
	<th >Tgl Transfer </th>
	<th >Tgl Konfirmasi </th>
	<th >Pemesan </th>
	<th >Penerima </th>
	<th >Pengiriman</th>
	<th >Jumlah</th>
	</tr>

	<?php 
	
	$no = 1;
	foreach($data->result_array() as $order)
	{
	$id=$order['id_pesanan'];
	?>
<tr><td ><?php echo $no; ?></td>
	<td ><a href="<?php echo base_url().'admin/detail_pesanan/'.$order['id_pesanan']?>"><?php echo $order['id_pesanan']; ?></a></td>
	
	<td ><?php echo $order['tgl_pesanan']; ?></td>
	<td ><?php echo $order['tgl_transfer']; ?></td>
	<td ><?php echo $order['tgl_konfirm']; ?></td>
	<td ><?php echo $order['nama_user']; ?></td>
	<td ><?php echo $order['nama']; ?></td>
	<td align="center" ><?php echo $order['tgl_kirim']; ?></td>
	<td ><?php echo "Rp ".number_format($order['total_pesanan'],2,',','.'); ?></td>
</tr>
<?php $no++; } ?>

</tbody>
<tr ><td colspan="7" align="center" bgcolor="#DEEFFF" >Total Transaksi</td><td  colspan="2" align="center" bgcolor="#DEEFFF" ><?php foreach($rp as $total)
	{ echo "Rp ".number_format($total,2,',','.'); } ?></td></tr>
</table>
    <span ><img src="<?php echo base_url();?>asset/img/pr.png"><a href="#"></i> Cetak </a></span>