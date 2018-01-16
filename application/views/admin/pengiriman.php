<div id="kotak-putus">
<div class="Ket"><table width="100%" class="table"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> <?php echo $title; ?> </td>
	<td align="right"></td></tr>
	</table>
</div>
<div id="kotak-biasa">
	<table id="example" class="table" width="100%">
	<thead>
<tr><th>No</th><th>No. Pesanan</th><th>Tujuan</th><th>Nama Penerima</th><th>Nomor Resi</th><th>Tgl Pengiriman</th></tr>
	</thead>
	<tbody>
	<?php 
	
	$no = 1;
	foreach($pengiriman as $p){
	?>
<tr><td><?php echo $no; ?></td>
	<td><?php echo $p->id_pesanan; ?></td>
    <td><?php echo $p->alamat.'<br>'.$p->kota_kabupaten.' - '.$p->propinsi;  ?></td>
    <td><?php echo $p->nama.'<br> HP : '.$p->hp;  ?></td>
    <td><?php echo $p->nama_jasa.' : '.$p->no_resi; ?></td>
    <td><?php echo tgl_indo($p->tgl_kirim); ?></td>
</tr>
<?php $no++; } ?></tbody>
</table>
<?php echo form_fieldset_close(); ?>

</div>
</div>