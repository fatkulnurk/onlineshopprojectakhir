
<table align="center" width="100%" >
<tr><td valign="top" width="50%"><div class="akun"><div class="nama-akun">Alamat yang digunakan</div>
<?php if (!$dipakai->result_array()){
echo "<p> Anda belum menentukan alamat pengiriman </p>";
}

foreach($dipakai->result_array() as $us) {
echo $us['nama'].'<br>'.$us['alamat'].'<br>'.$us['kota_kabupaten'].' - '.$us['propinsi'].'<br>'.$us['hp'];
}
?>
  </div>
  <a href="<?php echo base_url()?>pengguna/bayar" ><?php echo form_button('bayar','&laquo; Kembali ','class=tmbl-oren');?></a> 
    <a href="<?php echo base_url()?>pengguna_akun/newaddress" class="tmbl-oren" ><i class="icon-plus-sign"></i>Tambah alamat baru</a>
</td><td valign="top" width="50%">

<div class="akun"><div class="nama-akun">Alamat tambahan</div>
<?php 	if($alamat->result_array()==FALSE){ echo '<div class="keterangan"> Tidak ada alamat tambahan</div>';}
foreach($alamat->result_array() as $alm) {
?>
<div class="keterangan">
  <?php echo $alm['nama'].'<br>'.$alm['alamat'].'<br>'.$alm['kota_kabupaten'].' - '.$alm['propinsi'].'<br>'.$alm['hp']; 
echo form_open('pengguna_akun/alamat_pilih'); echo form_hidden('sts',$alm['sts_alamat']);?>
<p><a href="<?php echo base_url().'pengguna_akun/address_pilih/'.$alm['id_alamat'];?>">
<img src ="<?php echo base_url();?>asset/img/star.png" > Gunakan sebagai alamat pengiriman</a></p></div> 
<?php echo form_close(); }?>
  </div>
</td></tr>
	</table>

