<td valign="top" colspan="2">

<?php if($this->session->flashdata('message')){?>
<p class='flashdata'> <?php echo $this->session->flashdata('message');?> </p>
<?php } ?>

<div class="nama-content"> Informasi Akun</div>

Hi <?php 	foreach($query1->result_array() as $id) {
  echo $id['nama_user']; } ?>
 <p>Anda dapat melihat semua aktivitas terbaru akun dan memperbarui informasi akun Anda di Dasboard Akun Anda. Pilih link dibawah ini untuk melihat atau edit informasi Anda.</p>
  </td></tr>
<tr><td valign="top" width="50%"><div class="akun"><div class="nama-akun"> Informasi Kontak</div>
<?php 	foreach($query1->result_array() as $id) {
  echo $id['nama_user'].'<br>'.$id['email']; 
  } ?> - <a href="<?php echo base_url();?>pengguna_akun/gantiemail">Ganti email</a>
  <p><a href="<?php echo base_url();?>pengguna_akun/gantipass">Ganti kata sandi</a></p>
<p align="right"><a href="<?php echo base_url();?>pengguna_akun/ubahakun">Ubah</a></p>
  
  </div>
</td><td valign="top" width="50%"><div class="akun"><div class="nama-akun"> Alamat pengiriman yang digunakan</div>
<?php 	
if (!$dipakai->result_array()){
echo "<p> Anda belum menentukan alamat pengiriman </p>";
}
foreach($dipakai->result_array() as $us) {
echo $us['nama'].'<br>'.$us['alamat'].'<br>'.$us['kota_kabupaten'].'<br>'.$us['propinsi'].'<br>'.$us['hp']; ?>
<p align="right"><a href="<?php echo base_url().'pengguna_akun/alamat_ubah/'.$us['id_alamat'];?>">Ubah alamat</a></p>
<?php } ?>
<a href="<?php echo base_url();?>pengguna_akun/alamat">Pengaturan alamat</a>
</div>
</td></tr>
<tr><td>
</td></tr>

