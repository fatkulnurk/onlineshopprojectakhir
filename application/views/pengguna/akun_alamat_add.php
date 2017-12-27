<script type="text/javascript">
//perhatikan, kuncinya adalah disini
        function fungsiambilkab(nilai){
           $.ajax({
                type: "POST",
                url: "<?php echo site_url('pengguna_akun/ambil_kab');?>",
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
<td valign="top"><div class="nama-content"> Tambah Buku Alamat</div>
<div class="akun"><div class="nama-akun">Informasi Kontak</div>
<div class="keterangan">
<?php echo form_open('pengguna_akun/alamatbaru_exe'); 
foreach($query1->result_array() as $id) {  
			$id_user=$id['id_user'];
			}
						echo form_hidden('id_user',$id_user);
?>
	Nama * <br><?php echo"<font color='red' size='1px'>".form_error('nama')."</font>". form_input('nama',set_value('nama'),'class=inputan');?><br>

	Nomor  Handphone *<br>
			<?php $hp=array('name'=>'hp', 'id'=>'hp', 'class'=>'inputan','onKeyPress'=>'return numbersonly(this, event)');	
			echo "<font color='red' size='1px'>".form_error('hp')."</font>".form_input($hp,set_value('hp')); ?><br>
	Provinsi *<br>
			<?php $js = 'onChange="fungsiambilkab(this.value);" class="inputan"';
			echo form_dropdown('provinsi', $prp,set_select('provinsi', $prp), $js);?><br>
	Kota *<br><div id="kab"><select class='inputan'><option>-Pilih kota-</option></select></div>
	Alamat *<br><?php echo "<font color='red' size='1px'>".form_error('alamat')."</font>".
	form_input('alamat',set_value('alamat'),'class=inputan');?></div>	
	
	<a href="<?php echo base_url()?>pengguna_akun/alamat" >
		<?php echo form_button('bayar','&laquo; Kembali','class=tmbl-oren');?> </a>
	<a href="<?php echo base_url()?>pengguna_akun/alamatbaru" >
		<?php echo form_submit('bayar','Simpan alamat ini','class=tmbl-oren');?> </a>
<?php echo form_close(); ?>	

</div></td>
</td></tr>
	</table>

	
