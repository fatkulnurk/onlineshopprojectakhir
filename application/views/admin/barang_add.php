<div id="kotak-putus"><?php echo form_open_multipart('admin/barang_add_exe'); ?>
	<div class="Ket"><table width="100%" class="table"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> Barang </td>
	<td align="right"><?php echo form_submit('submit','Simpan','class="btn btn-info"'); ?>
		<a href="<?php echo base_url().'admin/Barang';?>" class="btn btn-default"><i class='icon-remove'></i> Batal</a></td></tr>
	</table>
</div>
<div id="kotak-biasa">

<table align="center" border="0" class="table">
 <tr>
    <td colspan="3"> <?php $today = date("Y-m-d"); ?>
<input name="tgl" type="hidden" value="<?php echo $today; ?>" ></td>
  </tr> 
 <tr>
    <td >Gambar</td>
    <td >:</td>
    <td valign="middle">
	<?php $gambar=array('name'=>'gambar',  
							 'id'=>'gambar',  
							 'value'=>set_value('gambar'),  
							 'class'=>'inputan');			echo form_upload($gambar); ?></td>
	<td><?php echo "<font color='red' size='1px'>".$this->session->flashdata('message')."</font>";?></td>
  </tr>
  <tr>
    <td>Nama Barang</td>
    <td>:</td>
    <td><input type="text" name="nama_barang" class="inputan" value="<?php echo set_value('nama_barang'); ?>"></td>
	<td><?php echo"<font color='red' size='1px'>".form_error('nama_barang')."</font>";?></td>
  </tr>
  <tr>
    <td>Kategori</td>
    <td>:</td>
    <td>
	<select name="id_produk" size="1" class="inputan"> 
	  <option>-pilih kategori-</option>
	  <?php foreach($query as $prod){ ?>
	  <option value="<?php echo $prod->id_produk; ?>"> <?php  echo $prod->nama_produk;  ?> </option>
    <?php } ?>
	</select> &nbsp;

	<a href="<?php echo base_url();?>admin/produk_add" title="Tambah Kategori" class="tmbl-putih"><i class="icon-plus"></i> kategori </a>
	</td>
	<td><?php echo"<font color='red' size='1px'>".form_error('id_produk')."</font>";?></td>
  </tr>
  <tr>
    <td>Harga</td>
    <td>: Rp</td>
    <td><input name="harga" class="inputan" onKeyPress="return numbersonly(this, event)" value="<?php echo set_value('harga'); ?>"></td>
	<td><?php echo"<font color='red' size='1px'>".form_error('harga')."</font>";?></td>
  </tr>
  <tr>
    <td>Stok</td>
    <td>:</td>
    <td><input name="stok" type="text" class="inputan" onKeyPress="return numbersonly(this, event)" value="<?php echo set_value('stok'); ?>"> Kg</td>
	<td><?php echo"<font color='red' size='1px'>".form_error('stok')."</font>";?></td>
  </tr>
  <tr>
    <td>Keterangan </td><td>:</td><td><?php echo"<font color='red' size='1px'>".form_error('keterangan')."</font>";?></td></tr>
   <tr>
    <td colspan='4' valign="top"> <textarea name='keterangan'cols="100" class="inputan"> <?php echo set_value('keterangan'); ?></textarea></td>
	
  </tr>

</table>
<?php echo form_close(); ?>
</div>
</div>