 <link rel="stylesheet" href="<?php echo base_url();?>asset/calendar/jquery-ui.css">
<script src="<?php echo base_url();?>asset/calendar/jquery-1.10.2.js"></script>
<script src="<?php echo base_url();?>asset/calendar/jquery-ui.js"></script>
	<script>
		$(function() {
		$( "#datepicker" ).datepicker();
		$( "#datepicker1" ).datepicker();
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
<div class="Ket"><table width="100%"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> <?php echo $title; ?> </td>
	<td align="right">
		<?php echo "<a href='".base_url()."admin/transaksi' class='tmbl-putih'> <i class='icon-list'></i> Semua Transaksi </a>
					
					<a href='".base_url()."admin/penjualan_excel'class='tmbl-putih'> <i class='icon-download-alt'></i> Excel </a>"; ?>
					<!--<a href='".base_url()."admin/transaksi'class='tmbl-putih'> <i class='icon-signal'></i> Statistik transaksi </a>
					<a href='".base_url()."admin/transaksi_cetak' target='_blank' class='tmbl-putih'> <i class='icon-print'></i> Cetak </a>
					<a href='".base_url()."admin/transaksi'class='tmbl-putih'> <i class='icon-download-alt'></i> PDF </a>-->
	
	</td></tr>
	</table>


</div>	
<center><?php echo form_open('admin/transaksi');
				/* $options = array('tgl_pesanan'  => 'Tanggal Pesanan',
								 'tgl_transfer'    => 'Tanggal Transfer',
								 'tgl_konfirm'   => 'Tanggal Konfirmasi',
								 'tgl_kirim' => 'Tanggal Pengiriman',);			echo form_dropdown('tanggal', $options,  set_value('tanggal'),'class=in'); */

				$dari=array('name'=>'dari', 
							 'id'=>'datepicker', 
							 'class'=>'in',
							 'value'=>set_value('dari'));			echo " Dari ".form_input($dari);
							 
				$sampai=array('name'=>'sampai', 
							 'id'=>'datepicker1', 
							 'class'=>'in',
							 'value'=>set_value('sampai'));			echo " sampai ".form_input($sampai). 
			  form_submit('submit','Lihat transaksi','class=tmbl-ok').
			  form_close(); ?>
</center>
<div id="kotak-biasa">
	<table id="example" class="display" width="100%">
	<thead>
		<tr><th>No.</th><th>Id Pesanan</th><th>Tgl Pengiriman </th>
			<th>Nama Barang </th><th>Qty</th><th>Harga</th><th>Sub total</th></tr>
	</thead>
	<tbody> <?php $no = 1;
	foreach($data->result_array() as $order) {
	?>
<tr><td><?php echo $no; ?></td>
	<td><?php echo $order['id_pesanan']; ?></td>
	<td><?php echo tgl_indo($order['tgl_kirim']); ?></td>
	<td><?php echo $order['nama_barang']; ?></td>
	<td><?php echo $order['qty']; ?></td>
	<td><?php echo "Rp ".number_format($order['harga'],2,',','.');?></td>
	<td><?php $total= $order['qty'] * $order['harga']; echo  "Rp ".number_format($total); ?></td>
</tr>
<?php $no++; } ?>

</tbody>
<tr ><td colspan="5" align="center" bgcolor="#DEEFFF">Total Transaksi</td><td bgcolor="#DEEFFF"  colspan="2" align="center"><?php foreach($rp as $total)
	{ echo "Rp ".number_format($total,2,',','.'); } ?></td></tr>
</table>

</div>
</div>