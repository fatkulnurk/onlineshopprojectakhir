
<?php
$st = array('id' => 'pesanan', 'class' => 'address_info', 'style'=>'border:1px dashed #666666; padding:10px;');
 echo form_fieldset('Komentar Barang',$st); 
foreach($barang->result_array() as $brg)
	{
 ?>
 <div id="kotak"><div class='tulisan-red'><?php echo $brg['nama_barang']; ?></div>
 <table align="center"><tr>
<td><img src="<?php echo base_url().'images/'.$brg['gambar']; ?>" width="200"></td>
<td valign="top"><div class="keterangan"><?php echo $brg['keterangan'];?></div>
<div class="keterangan"><?php echo "Rp ".number_format($brg['harga'],2,',','.'); ?></div>
<div class="keterangan">Stok : <?php echo $brg['stok']; ?></div>
</td>
	 </tr></table>
	</div>

	<?php } ?>
	<table class="t_data" width="100%">
	<?php
foreach($komentar->result_array() as $k)
	{?>
<tr><td><div class="keterangan"><b><?php echo $k['nama_user'].'</b> : <p>'.
$k['komentar']; ?></p>
<div align="right">
<i><?php echo $k['tgl_komentar']; ?></i></div>
<?php echo '<a href="'.base_url().'admin/komentar_del/'.$k['id_komentar'].'" 
					title="Hapus" onclick="return confirm (\'Anda yakin akan menghapus komentar ini?\')">' ?>
<img src="<?php echo base_url();?>asset/img/remove.png">hapus</a>
</div></td></tr> 
 <?php } ?>
</table>
<?php echo form_open('admin/komentar_add_exe');
    foreach($barang->result_array() as $id)	{
		echo form_hidden('id_barang',$id['id_barang']);
		}
		echo form_hidden('id_user','1');
		$today = date("Y-m-d H:i:s");
		echo form_hidden('tgl_komentar',$today).
			 form_textarea('komentar','','class=inputan').'<br>'.
			 '<a href="'.base_url().'admin/barang">'.
			 form_button('kembali','Kembali','class=tombol').'</a>'.
			 form_submit('kirim','KIRIM','class=tombol').
			 form_close().
			 form_fieldset_close(); ?>

<br>
