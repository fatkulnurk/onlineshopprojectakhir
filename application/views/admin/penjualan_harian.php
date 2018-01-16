 <link rel="stylesheet" href="<?php echo base_url();?>asset/calendar/jquery-ui.css">
<script src="<?php echo base_url();?>asset/calendar/jquery-1.10.2.js"></script>
<script src="<?php echo base_url();?>asset/calendar/jquery-ui.js"></script>
	<script>
		$(function() {
		$( "#datepicker" ).datepicker();
		});
	</script>
<script language="javascript" src="<?php echo base_url(); ?>asset/js/jquery.dataTables.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/jquery.dataTables.css"  />  
  
 <script charset="utf-8" type="text/javascript">
 $(document).ready(function() {
    $('#example').dataTable();
} ); 
</script>
<div id="kotak-putus">
<div class="Ket"><table width="100%" class="table"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> <?php echo $title; ?> </td>
	<td align="right"><?php echo "<a href='".base_url()."admin/penjualan'>". form_button('Insert','Semua Transaksi','class=tmbl-oren')."</a>"; ?>
	<?php echo "<a href='".base_url()."admin/penjualan_bulanan'>". form_button('Insert','Transaksi Bulanan','class=tmbl-oren')."</a>"; ?>
	<?php echo "<a href='".base_url()."admin/penjualan_tahunan'>". form_button('Insert','Transaksi Tahunan','class=tmbl-oren')."</a>"; ?></td></tr>
	</table>
</div>
<center><?php echo form_open('admin/penjualan_harian');
				$tgl=array('name'=>'tanggal', 
							 'id'=>'datepicker', 
							 'class'=>'in',
							 'value'=>set_value('tanggal'));			echo form_input($tgl). 
			  form_submit('submit','Lihat transaksi','class=tmbl-ok').
			  form_close(); ?>
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

</tbody><tr ><td colspan="5" align="center" bgcolor="#DEEFFF">Total Transaksi</td><td bgcolor="#DEEFFF"  colspan="2" align="center"><?php foreach($rp as $total)
	{ echo "Rp ".number_format($total,2,',','.'); } ?></td></tr>
</table>

</div>
</div>