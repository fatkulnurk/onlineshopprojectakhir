<td valign="top">

<div class="nama-content"  >CARA PEMBAYARAN</div>
BuyFish memberikan kemudahan kepada Anda dalam bertransaksi dan berbelanja.
<div class="ktkbiasa">
	<div class="nama-ktkbiasa"  >Bank Transfer</div>
	Kami menerima pembayaran melalui transfer uang tunai antarbank. Anda dapat melakukan transfer uang tunai melalui bank Anda dan juga melalui ATM. 
	Kami menerima transfer uang tunai melalui rekening berikut:
	<p align="center"> <?php foreach($rekning as $s){
if($s->bankrekning == 'BCA'){
	echo '<p> <img src="'.base_url().'asset/img/bca.jpg">';}
if($s->bankrekning == 'Mandiri'){
	echo '<img src="'.base_url().'asset/img/mandiri.jpg">';
}
if($s->bankrekning == 'BNI'){
	echo '<img src="'.base_url().'asset/img/bni.jpg">';
}
if($s->bankrekning == 'BRI'){
	echo '<img src="'.base_url().'asset/img/bri.jpg">';
}

echo "<br>Bank :".$s->bankrekning.
	"<br>Nomor Rekning : ".$s->norekning.
	"<br>Atas Nama : ".$s->namarekning.'</p>';

} ?>
</p>
Untuk transfer via ATM, silakan temukan ATM terdekat Anda dengan mengakses laman ATM Locator kami: 
<?php echo '<a href="'.base_url().'pengguna/lokasi" class="tmbl-oren">'. 'Lokasi ATM <i class="icon-map-marker"></i> '."</a>"; ?>
<p>Pengiriman baru dapat diproses bila Anda telah melakukan konfirmasi pembayaran<br>
Untuk konfirmasi pembayaran Anda, silakan klik :<?php echo '<a href="'.base_url().'pengguna_akun/konfirm_pembayaran">'.form_button('','Konfirmasi Pembayaran','class=tmbl-oren').'</a>' ?></p>
	</div>
</td><tr>
<tr><td valign="top">

</td></tr>
	</table>
