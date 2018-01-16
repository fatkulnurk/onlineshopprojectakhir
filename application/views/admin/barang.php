<?php if($this->session->flashdata('message')){?>
<p class='flashdata'> <?php echo $this->session->flashdata('message');?> </p>
<?php } ?>
<table width="100%" class="table"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> <?php echo $title; ?> </td>
	<td align="right"><?php 
		echo "<a href='".base_url()."admin/barang_add' class='tmbl-putih'><i class='icon-plus'></i>Upload baru</a>"; ?></td></tr>
	</table>
<div id="kotak-biasa">
	<table id="example" class="table" width="100%">
	<thead>
	<tr>
	<th>No.</th>
	<th>Kode</th>
	<th>Gambar</th>
	<th>Kategori </th>
	<th width="10%">Harga</th>
	<th>Ketarangan</th>
	<th>Stok</th>
	<th>Tgl Upload</th>
	<th>Tools</th>
	<!--<th width="10%">Diskon</th>-->
	</tr>
	</thead>
	<tbody>
	<?php 
	
	$no = 1;
	foreach($data->result_array() as $brg)
	{
	?>
<tr><td><?php echo $no; ?></td>
	<td><?php echo $brg['nama_barang']; ?></td>
	<td align="center"><img src="<?php echo base_url().'images/'.$brg['gambar']?>" width="50" height="50"></td>
	<td align="center"><?php echo $brg['nama_produk']; ?></td>
	<td><?php echo "Rp ".number_format($brg['harga'],2,',','.'); ?></td>
	<td><?php echo $brg['keterangan']; ?></td>
	<td><?php echo $brg['stok']; ?> Kg</td>
	<td align="center"> <?php echo tgl_indo($brg['tgl']); ?>	</td>
    <td align="center">
	
<!--	<a href='".base_url()."admin/penjualan'class='tmbl-putih'> <i class='icon-signal'></i> Statistik Penjualan </a> -->
	
	<?php echo '<a href="'.base_url().'admin/barang_edit/'.$brg['id_barang'].'" title="Ubah" class="tmbl-putih">';?>
							<i class='icon-pencil'></i></a>
			<?php echo '<a href="'.base_url().'admin/barang_del/'.$brg['id_barang'].'" class="tmbl-putih"
					title="Hapus" onclick="return confirm (\'Anda yakin akan menghapus '.$brg['id_barang'].'?\')">' ?>
			<i class='icon-remove'></i></a></td>
			<!--<td>Jadikan Diskon</td>-->
	</tr>
	
<?php $no++; } ?></tbody>
</table>
</div>
