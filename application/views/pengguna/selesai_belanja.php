<td valign="top">
<?php if($this->session->flashdata('message')){?>
<p class='flashdata'> <?php echo $this->session->flashdata('message');?> </p>
<?php } ?>
<div class="cekot">TERIMA KASIH TELAH BERBELANJA DI JURAGAN IKAN ! <img src="<?php echo base_url();?>asset/img/lop.png"></div>
<div class="tulisan" align="center"><br>Hi, <b><?php 	foreach($query1->result_array() as $id)
	{
  echo $id['nama_user'];
  }
	?></b> <br>
Anda telah melakukan pemesanan pada kami dengan rincian : <br>
<?php 	foreach($det->result_array() as $d) { 
		echo "Nomor order : <b> ". $d['id_pesanan'];
  ?> </b><br>
Total Pembayaran: <b> Rp <?php echo number_format($d['total_pesanan'],2,',','.') ;
 }?></b><br>
Pemesanan hanya akan diproses apabila pembayaran dilakukan satu hari (24 jam) ke salah satu akun kami dibawah ini :
<p align="center"> <?php foreach($rekning as $s){
if($s->bankrekning == 'BCA'){
	echo '<img src="'.base_url().'asset/img/bca.jpg">';
}
if($s->bankrekning == 'BNI'){
	echo '<img src="'.base_url().'asset/img/bni.jpg">';
}
if($s->bankrekning == 'BRI'){
	echo '<img src="'.base_url().'asset/img/bri.jpg">';
}

echo "<br>Nomor Rekning : <b>".$s->norekning.
	 "</b><br>Atas Nama : ".$s->namarekning.'</p>';

} ?>
</p>
	Jika menggunakan m-Banking, e-Banking atau ATM non-tunai dikolom "Berita" harap cantumkan Nomor Order:  <?php $this->input->post('id_pesanan'); ?>
</div>
<div class="tulisan" align="center"><b>APA YANG HARUS SAYA LAKUKAN SELANJUTNYA? </b><p>
<img src="<?php echo base_url();?>asset/img/selesai.jpg"></p>
</div>
</td></tr>
	</table>