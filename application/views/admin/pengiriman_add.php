 <link rel="stylesheet" href="<?php echo base_url();?>asset/calendar/jquery-ui.css">
<script src="<?php echo base_url();?>asset/calendar/jquery-1.10.2.js"></script>
<script src="<?php echo base_url();?>asset/calendar/jquery-ui.js"></script>
	<script>
		$(function() {
		$( "#datepicker" ).datepicker();
		});
	</script>
<div id="kotak-putus"><?php echo form_open('admin/pengiriman_exe'); 
	foreach($data as $or)
	{?><div class="Ket">

<table width="100%" class="table"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> Pesanan </td>
	<td align="right"><a href="<?php echo base_url(); ?>admin/pesanan"><?php echo form_submit('submit','Simpan','class=tomb'); ?></a>
	
		<a href="<?php echo base_url().'admin/detail_pesanan/'.$or->id_pesanan;?>"><?php echo form_button('back','Batal','class=tomb'); ?></a></td></tr>
	</table>
</div>


<table align="center" class="table">
<tr><td>Id Pesanan</td><td>: <?php  echo $or ->id_pesanan;
echo form_hidden('id_pesanan',$or->id_pesanan); }?></td></tr>
<tr><td>Nomor Resi</td><td>: <?php echo form_input('resi','','class=inputan'); ?></td></tr>
<tr><td>Tgl Pengiriman</td><td>: <?php $tgl=array('name'=>'tgl_kirim', 
							 'class'=>'inputan',
							 'id'=>'datepicker',); echo form_input($tgl);  ?>	</td></tr>
<tr><td>Jasa Pengiriman</td><td>: 
<select name="jasa" size="1" class="inputan"> 
	  <option>-Pilih jasa pengiriman-</option>
	 <?php foreach($jasa->result_array() as $j){ ?>
	  <option value="<?php echo $j['jasa']; ?>"> <?php  echo $j['nama_jasa'];  ?> </option>
    <?php } ?>
	</select> 	
</td></tr></table>			
<?php echo form_close(); ?>
</div>