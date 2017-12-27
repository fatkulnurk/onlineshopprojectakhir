<td valign="top">	
<div class="nama-content"> Pesanan Saya</div>
<div class="akun">

<table  width="100%"  class="t_kranjang">
<tr><th>Nomer Order </th><th>Tanggal</th><th>Total Pesanan</th><th>Status</th></tr>

<?php  if(!$pesanan->result_array()){ echo "<tr><td colspan='4'>Tidak ada transaksi</td></tr>";} else{
foreach ($pesanan->result_array() as $psn){?>
<tr><td> <a href="<?php echo base_url().'pengguna_akun/pesanan_det/'.$psn['id_pesanan']; ?>"><?php echo $psn['id_pesanan']; ?> </a></td>
	<td><?php echo tgl_indo($psn['tgl_pesanan']); ?></td>
	<td>Rp <?php echo  number_format($psn['total_pesanan'],2,',','.'); ?></td>
	<td><?php 	if($psn['tgl_konfirm']== 0000-00-00){ echo "<font color='red'>Belum Transfer.!</font>";}
				if ($psn['tgl_konfirm']!= 0000-00-00 && $psn['sts']==0){ echo 'Proses...';}
				if ($psn['sts']==1 && $psn['jasa']==0){ echo 'Pembayaran diterima <i class="icon-ok"></i>';}
				if ($psn['jasa']!=0){ echo 'No. Resi '.$psn['nama_jasa'].' : '. $psn['no_resi'];}
				?></td>
</tr>
<?php  }}?>
</table>

</div>
</td></tr>

</table>

