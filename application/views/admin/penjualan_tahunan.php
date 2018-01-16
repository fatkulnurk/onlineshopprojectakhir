<div id="kotak-putus">
<div class="Ket"><table width="100%" class="table"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> <?php echo $title; ?> </td>
	<td align="right"><?php echo "<a href='".base_url()."admin/penjualan'>". form_button('Insert','Transaksi Harian','class=tmbl-oren')."</a>"; ?>
	<?php echo "<a href='".base_url()."admin/penjualan_bulanan'>". form_button('Insert','Transaksi Bulanan','class=tmbl-oren')."</a>"; ?>
	<?php echo "<a href='".base_url()."admin/penjualan'>". form_button('Insert','Transaksi Tahunan','class=tmbl-oren')."</a>"; ?></td></tr>
	</table>
</div>

<center>
<?php for($k=2011; $k<=date('Y'); $k++){
	$opt[] =$k; } echo "Tahun ".form_dropdown('tahun', $opt,'','class=in'); 
echo form_button('Insert','Lihat Transaksi','class=tmbl-ok');
?>
</center>

<div id="kotak-biasa">
	<table id="example" class="table" width="100%">
	<thead>
	<tr>
	<th>No.</th>
	<th>Id Pesanan</th>
	
	<th>Tgl Pemesanan </th>
	<th>Pemesan </th>
	<th>Penerima </th>
	<th>Pengiriman</th>
	<th>Jumlah</th>
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
	
	<td><?php echo $order['tgl_pesanan']; ?></td>
	<td><?php echo $order['nama_user']; ?></td>
	<td><?php echo $order['nama']; ?></td>
	<td align="center"><?php echo $order['tgl_kirim']; ?></td>
	<td><?php echo "Rp ".number_format($order['total_pesanan'],2,',','.'); ?></td>
</tr>
<?php $no++; } ?>

</tbody>
<tr><td>Total Transaksi</td><td><?php echo "Rp ".number_format($order['total_pesanan'],2,',','.'); ?></td></tr>
</table>

</div>
</div>