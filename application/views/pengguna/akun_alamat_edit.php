<script type="text/javascript">
//perhatikan, kuncinya adalah disini
        function fungsiambilkab(nilai){
           $.ajax({
                type: "POST",
                url: "<?php echo site_url('pengguna_akun/ambil_kab_ubah');?>",
                data:"key="+nilai,
                success: function(data){
                    $("#kab").html(data);
                },
                error:function(XMLHttpRequest){
                    alert(XMLHttpRequest.responseText);
                }
            })
        };
</script>
<td valign="top"><div class="nama-content"> Ubah Buku Alamat</div>
<div class="akun"><div class="nama-akun">Informasi Kontak</div>
<div class="keterangan">
<font color='red' size='1px'><?php echo validation_errors(); ?> </font>
<?php echo form_open('pengguna_akun/alamat_ubah_exe'); 
foreach($query3 as $al){
	echo form_hidden('id_alamat',$al->id_alamat);
	echo form_hidden('sts',$al->sts);
	echo form_hidden('id_user',$al->id_user);
?>
	Nama * <br><?php echo form_input('nama',$al->nama,'class=inputan'); ?><br>
	Nomor  Handphone *<br>
			<?php $hp=array('name'=>'hp', 'id'=>'hp', 'class'=>'inputan','onKeyPress'=>'return numbersonly(this, event)');	
			echo form_input($hp,$al->hp); ?><br>
	Provinsi *<br>
			<?php $js = 'onChange="fungsiambilkab(this.value);" class="inputan"';
			echo form_dropdown('provinsi', $prp,'', $js);?><br>
	Kota *<br><div id="kab"><?php $options = array( $al->kota_id  => $al->kota_kabupaten);
	$cl = 'class="inputan"';
	echo form_dropdown('pilihkab', $options,'',$cl); ?>
	</div>
	
	Alamat *<br><?php echo form_input('alamat',$al->alamat,'class=inputan');?></div>	
	
	<a href="<?php echo base_url()?>pengguna_akun/alamat" >
		<?php echo form_button('bayar','&laquo; Kembali','class=tmbl-oren');?> </a>
		<?php echo form_submit('bayar','Simpan alamat ini','class=tmbl-oren');?>
<?php }
echo form_close(); ?>	

</div></td>
</td></tr>
	</table>

	
