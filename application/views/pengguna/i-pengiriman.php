<script language="javascript" src="<?php echo base_url(); ?>asset/js/jquery.js" type="text/javascript"></script>
  <script language="javascript" src="<?php echo base_url(); ?>asset/js/jquery.dataTables.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/jquery.dataTables.css"  /> 
  
  <script charset="utf-8" type="text/javascript">
 $(document).ready(function() {
    $('#example').dataTable();
} );
</script>

<td valign="top">
<div class="nama-content"  >WAKTU DAN BIAYA PENGIRIMAN BARANG</div>
<p>Teen25 mengirimkan barang pesanan ke seluruh Indonesia. Bekerja sama dengan JNE, Pandu Logistic dan Pos Indonesia, 
kami pastikan pengiriman barang Anda aman dan layanan pelanggan kami akan selalu membantu Anda dengan memberikan informasi mengenai 
status pengiriman barang yang Anda pesan.</p>
<p>Pengiriman dilakukan dalam waktu 2 hingga 6 hari kerja. 
Bila Anda melakukan metode pembayaran bank transfer, pengiriman baru dapat diproses bila Anda telah melakukan konfirmasi pemesanan.</p>
<p align="center">
<img src="<?php echo base_url();?>asset/img/pandu.png" >
<img src="<?php echo base_url();?>asset/img/jne.png" >
<img src="<?php echo base_url();?>asset/img/pos.png" >
</p>
<p><b>Biaya pengiriman : Disesuaikan dengan lokasi pengiriman barang dan jenis barang yang di pesan.</b></p><br>
		<table id="example" class="display" width="100%">
			<thead>

		<tr><th>No</th><th>PROVINSI</th><th>KOTA/ KABUPATEN</th><th>BIAYA</th></tr>
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
		</tr>

		<?php $no++; } ?></tbody>
		</table>
</td><tr>
<tr><td valign="top">
	
</td></tr>
	</table>
