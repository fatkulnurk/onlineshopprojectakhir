<td valign="top" height="30">
<?php 
if ($data->result_array() == FALSE){
	echo"<font color='red'>Data Tidak Tersedia</font>";
	}
	else {
?>
<table width="100%"><tr><td align="left">

 <?php 
	
	$no = 1;
foreach($data->result_array() as $b)
	{ $id_produk = $b['id_produk'];}
 echo form_open("pengguna/kategori/$id_produk");
 echo 'Atur berdasarkan '; 
$options = array( 'tgl DESC' => 'Barang baru',
                  'stok ASC'  => 'Popularitas',
                  'harga ASC'    => 'Harga terendah',
                  'harga DESC'   => 'Harga tertinggi',
                  
                );

echo form_dropdown('urut', $options,set_value('urut'), 'class=qty').
	 form_submit('submit','Urutkan','class=tmbl-biru').
	 form_close();
?></td>
<td align="right"><div id="halaman"><?php echo $paginator;?></div> </td></tr></table>
</td></tr>
<td valign="top">

<?php  
	$no = 1;
	foreach($data->result_array() as $brg)
	{
?>

<div class="barang">
<?php echo form_open('pengguna/add_keranjang'); 
		  echo form_hidden('id_barang',$brg['id_barang']);
		  echo form_hidden('harga',$brg['harga']);
		  echo form_hidden('nama_barang',$brg['nama_barang']);
		  echo form_hidden('gambar',$brg['gambar']);
		  echo form_hidden('keterangan',$brg['keterangan']);
?>
<a href="<?php echo base_url().'pengguna/detail_barang/'.$brg['id_barang'] ?>">
<p style="text-align:center; margin:0px auto; "><strong>
<img src="<?php echo base_url().'images/'.$brg['gambar']?>" class="image is-128x128" />
<?php echo form_hidden('qty','1');
	if ($brg['stok']==0){
	echo br(2). $brg['nama_barang'].br(1)."<div class='sold' align='center'>". br(1)."Rp". number_format($brg['harga'],2,',','.')."</div></strong></p></a>";
		}
	else { echo  br(2)."".
				$brg['nama_barang'].br(2)."Rp ". number_format($brg['harga'],2,',','.')."<strong></p></a><br><center>".
			form_submit('submit','Beli', 'class="button is-info tmbl"'); }?>
		<?php echo form_close(); ?>
</div>
<?php }}   ?>
</td></tr>
<tr><td valign="top" align="center"><div id="halaman"><?php echo $paginator;?></div>
</td></tr>
	</table>
