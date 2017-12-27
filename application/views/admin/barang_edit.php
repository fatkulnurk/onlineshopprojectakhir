<?php
	$att = array('id' => 'barang-form');
	echo form_open('admin/barang_edit_exe', $att);
	echo form_hidden('id_barang',$edit->id_barang);
?>
<div id="kotak-putus"><?php echo form_open_multipart('admin/barang_add_exe'); ?>
	<div class="Ket"><table width="100%"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> Barang </td>
	<td align="right"><?php echo form_submit('submit','Simpan','class=tomb'); ?>
		<a href="<?php echo base_url().'admin/Barang';?>"><?php echo form_button('back','Batal','class=tomb'); ?></a></td></tr>
	</table>
</div>
<div id="kotak-biasa">
<?php if($this->session->flashdata('message')){?>
<p class='flashdata'> <?php echo $this->session->flashdata('message');?> </p>
<?php } ?>
<table align="center"  border="0">
 <tr>
    <td colspan="3"> 
<input name="tgl" type="hidden" value="<?php echo $edit->tgl; ?>"></td>
<input name="id_barang" type="hidden" value="<?php echo $edit->id_barang; ?>"></td>

  </tr> 
 <tr>
    <td >Gambar</td>
    <td >:</td>
    <td ><img src="<?php echo base_url().'images/'.$edit->gambar;?>" width="100" height="100"></td>
  </tr>
  
  <tr>
    <td>Kode</td>
    <td>:</td>
    <td><input type="text" name="nama_barang" value="<?php echo $edit->nama_barang; ?>" class='inputan'></td>
  </tr>
  <tr>
    <td>Kategori</td>
    <td>:</td>
    <td>
	<select name="id_produk" size="1" class='inputan'> 
	<?php foreach($query as $prod){ 
	if($prod->id_produk == $edit->id_produk ){
	echo "<option value='$prod->id_produk' selected>$prod->nama_produk</option>";
	} else {
	?>
	
	  
	  <option value='<?php  echo $prod->id_produk;  ?>' > <?php  echo $prod->nama_produk;  ?> </option>
	  
	  
    <?php } } ?>
	</select>
	</td>
  </tr>
  <tr>
    <td>Harga</td>
    <td>: Rp</td>
    <td> <input type="text" name="harga" value="<?php echo $edit->harga; ?>" class='inputan'></td>
  </tr>
  <tr>
    <td>Stok</td>
    <td>:</td>
    <td><input name="stok" type="text" value="<?php echo $edit->stok; ?>" class='inputan'> Kg</td>
  </tr>
  <tr>
    <td colspan="3" valign="top">Keterangan :</td>
    </tr>
    <tr><td colspan="3"><textarea name='keterangan'><?php echo $edit->keterangan; ?></textarea></td>
  </tr>

</table>
</form>
</div>
</div>