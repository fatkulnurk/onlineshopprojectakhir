<td colspan="2"><?php if($this->session->flashdata('message')){?>
<p class='flashdata'> <?php echo $this->session->flashdata('message');?> </p>
<?php } ?>
<div class="nama-content">Buku Alamat</div>

<div align="right"><a href="<?php echo base_url()?>pengguna_akun/alamatbaru" >
    <?php echo form_button('bayar','Tambah alamat baru','class=tmbl-oren');?> </a></div>
  </td></tr>
<tr><td valign="top" width="50%"><div class="akun"><div class="nama-akun">Alamat yang digunakan</div>
<?php if (!$dipakai->result_array()){
echo "<p> Anda belum menentukan alamat pengiriman </p>";
}

foreach($dipakai->result_array() as $us) {
echo $us['nama'].'<br>'.$us['alamat'].'<br>'.$us['kota_kabupaten'].' - '.$us['propinsi'].'<br>'.$us['hp'];
?><p align="right"><a href="<?php echo base_url().'pengguna_akun/alamat_ubah/'.$us['id_alamat'];?>">
<img src ="<?php echo base_url();?>asset/img/edt.png" > Ubah Alamat</a> </p>
<?php
}
?>
  </div>
</td><td valign="top" width="50%">

<div class="akun"><div class="nama-akun">Alamat tambahan</div>
<?php 	if(!$alamat->result_array()){ 
echo "<p align='center'>Tidak ada alamat tambahan</p>";} else{
foreach($alamat->result_array() as $alm) {
?>
<div class="keterangan">
  <?php echo $alm['nama'].'<br>'.$alm['alamat'].'<br>'.$alm['kota_kabupaten'].' - '.$alm['propinsi'].'<br>'.$alm['hp']; 
echo form_open('pengguna_akun/alamat_pilih'); echo form_hidden('sts',$alm['sts_alamat']);?>
<div align="right"><a href="<?php echo base_url().'pengguna_akun/alamat_ubah/'.$alm['id_alamat'];?>">
	<img src ="<?php echo base_url();?>asset/img/edt.png" > Ubah Alamat</a>
</div><?php echo '<a href="'.base_url().'pengguna_akun/alamat_del/'.$alm['id_alamat'].'" 
					title="Hapus" onclick="return confirm (\'Anda yakin akan menghapus alamat atas nama '.$alm['nama'].'?\')">' ?>
<img src ="<?php echo base_url();?>asset/img/delt.png" ><font color="#D2322D"> Hapus Alamat</font></a>
<p><a href="<?php echo base_url().'pengguna_akun/alamat_pilih/'.$alm['id_alamat'];?>">
<img src ="<?php echo base_url();?>asset/img/star.png" > Gunakan sebagai alamat pengiriman</a></p></div> 
<?php echo form_close(); }}?>
  </div>
</td></tr>
<tr><td>
</td></tr>
	</table>

