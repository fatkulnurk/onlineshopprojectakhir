<script>
function proses(){
    var teks = "";
    j = document.getElementById("jumlah").selectedIndex;
    for(i=1;i<=j;i++){
        teks = teks + "Jawaban " + i + " <input type=text name=jawaban[] size=50><br>";
    }
    document.getElementById("opt").innerHTML = teks;
}
</script>





<?php echo form_open('pengguna_polling/polling_add_exe'); ?>
Home :: Polling
<div id="kotak-putus">
<div class="Ket"><table width="100%"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> Polling </td>
	
	<td align="right"><?php 
	
	echo form_submit('submit',"Simpan",'class=tmbl-putih icon-list'); ?>
		<a href="<?php echo base_url().'pengguna_polling/polling_adm';?>" class="tmbl-putih"><i class='icon-list'></i>
		 Lihat polling lainnya</a></td></tr>
	</table>
</div>
<div id="kotak-biasa">

<center>
<table class="table"><tr><td>
  Pertanyaan Polling :<br>
  <textarea rows="3" name="pertanyaan" cols="36"></textarea><?php $today = date("Y-m-d"); ?>
<input name="tanggal" type="hidden" value="<?php echo $today; ?>"><p>
  <p>Jumlah Jawaban : <select size="1" name="jumlah" id=jumlah onchange=proses()>
  <option>0</option>
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
  <option>6</option>
  <option>7</option>
  <option>8</option>
  <option>9</option>
  </select></p>
  <div id=opt></div>
  </td></tr></table>
<?php echo form_close(); ?>
</center>
</div>
</div>