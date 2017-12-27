<?php foreach($data as $det){
 ?>
<div id="kotak-putus"><div class="Ket"><table width="100%"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> <?php echo $title.' - ' .$det->id_pesanan; ?> </td>
	<td align="right"><?php echo '<a href="'.base_url().'admin/pesanan" class="tmbl-putih"><i class="icon-list"></i> Lihat pesanan lainnya</a>'; ?>
	</td></tr>
	</table>
</div>

<table  width="100%" class="t_data"><tr><th>PENGIRIMAN</th><th>PEMESAN</th><th>DATA KONFIRMASI</th><th>STATUS PENGIRIMAN</th></tr>
	<tr><td valign="top"><table><tr><td>Id Pesanan</td><td>:</td><td><b><?php echo $det->id_pesanan; ?></b></td></tr>
			   <tr><td>Nama</td><td>:</td><td><?php echo $det->nama; ?></td></tr>
			   <tr><td valign="top">Alamat </td><td valign="top">:</td><td><?php echo $det->alamat.' <br> '. $det->kota_kabupaten.' <br> '. $det->propinsi; ?></td></tr>
			   <tr><td>Nomer Hp </td><td>:</td><td><?php echo $det->hp; ?></td></tr>
			</table></td>
		<td valign="top"><table><tr><td>Tgl Pemesanan</td><td>:</td><td><?php echo tgl_indo($det->tgl_pesanan); ?></td></tr>
			   <tr><td valign="top">Nama User</td><td valign="top">:</td><td><?php echo $det->nama_user.'<br>'.$det->email; ?></td></tr>
			   <tr><td>Total  Pemesanan</td><td>:</td><td>Rp <?php echo number_format($det->total_pesanan,2,',','.'); ?></td></tr>
			</table> </td>
		<td align="center"><?php if($det->tgl_transfer == 0000-00-00){ echo "Belum Transfer";
				} else{ ?><table align="center" width="100%">
					<tr><td valign="top" width="50%" colspan="2"><a href="<?php echo base_url().'images/up/'.$det->gambar?>" target="_blank">
						<img src="<?php echo base_url().'images/up/'.$det->gambar?>" width="120" height="120" align="left"/></a></td>
						<td valign="midle"> <?php if ($det->sts=='1'){ echo "<div class='flashdata'>
								<i class='icon-ok-sign '></i> diterima</div>";
								} else {
								?>
							<a href="<?php echo base_url().'admin/diterima/'.$det->id_pesanan;?>" class="tmbl-putih">
							<i class="icon-ok"></i> diterima</a>
							<?php  } ?></td></tr>
					<tr><td> Tgl Konfirmasi </td><td>:</td><td> <?php echo tgl_indo($det->tgl_konfirm); ?></td></tr>
					<tr><td> Tgl Transfer </td><td>:</td><td> <?php echo tgl_indo($det->tgl_transfer); ?></td></tr>
					<tr><td> Nominal </td><td>:</td><td> Rp <?php echo number_format($det->nominal,2,',','.'); ?></td></tr>		
					<tr><td valign="top"> Catatan </td><td valign="top">:</td><td> <?php echo $det->catatan; ?></td></tr>
					<tr></tr>
					</table>
				<?php } ?>
		</td>
		<td valign="top" align="center"><?php if($det->sts != '0' && $det->jasa==0){ ?> 
		<a href="<?php echo base_url().'admin/resi_add/'.$det->id_pesanan?>"> 
		<?php echo form_button('insert','Masukkan No.Resi','class=tmbl-oren'); ?> </a>
				<?php } if($det->no_resi) { ?><table align="center" width="100%">
					<tr><td> Nomer Resi </td><td>:</td><td> <?php echo $det->no_resi; ?></td></tr>
					<tr><td> Tgl Pengiriman </td><td>:</td><td> <?php echo tgl_indo($det->tgl_kirim); ?></td></tr>		
					<tr><td valign="top"> Catatan </td><td valign="top">:</td><td> <?php echo $det->catatan; ?></td></tr>
				</table> 
			<?php }?>
		</td></tr>
		<tr><td colspan="4">
		<div id="kotak"><div class="keterangan"><b>BARANG YANG DIPESAN</b></div>

	<table class="t_det" align="center" width="100%"><tr><th>No.</th><th>Barang</th><th>Qty</th><th>Harga</th></tr>
		<?php $no=1;
		foreach($barang as $brg){?>
		<tr><td valign="top"><?php echo $no++; ?></td><td><img src="<?php echo base_url().'images/'.$brg->gambar?>" width="50" align="left"/> <?php echo $brg->keterangan; ?></td><td><?php echo $brg->qty;?></td><td>Rp <?php  echo number_format($brg->harga,2,',','.');  ?></td></tr>
		<?php } ?>
	</table> 

	</div>
		</td></tr>
</table>
 
 <?php   } /* echo form_fieldset_close();  */?>
</div>
<br>
