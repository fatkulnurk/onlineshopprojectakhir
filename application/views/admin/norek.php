
<div id="kotak-putus">
<div class="Ket"><table width="100%"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> <?php echo $title; ?> </td>
	<td align="right"><a href="<?php echo base_url();?>admin/norek_add" class="tmbl-putih"><i class="icon-plus"></i>Tambah nomor rekning</a>
	</td></tr>
	</table>
</div>
<div id="kotak-biasa">
<?php if($this->session->flashdata('message')){?>
<p class='flashdata'> <?php echo $this->session->flashdata('message');?> </p>
<?php } ?>
	<table id="example" class="display" width="100%">
	<thead>
<tr><th>No</th><th>Nama Bank</th><th>Nomor Rekning</th><th>Atas Nama</th><th>Tools</th></tr>
	</thead>
	<tbody>
	<?php 
	
	$no = 1;
	foreach($rek as $r){
	?>
<tr><td><?php echo $no++; ?></td>
	<td><?php echo $r->bankrekning;  ?></td>
	<td><?php echo $r->norekning;  ?></td>
	<td><?php echo $r->namarekning;  ?></td>
	<td><a href="<?php echo base_url().'admin/norek_edit/'.$r->id_norek;?>" class="tmbl-putih">edit..<i class="icon-pencil"></i></a>
		<?php echo '<a href="'.base_url().'admin/norek_del/'.$r->id_norek.'" class="tmbl-putih"
					title="Hapus" onclick="return confirm (\'Anda yakin akan menghapus No.rekning bank '.$r->bankrekning.' : '.$r->norekning.' ?\')"> 
					hapus<i class="icon-remove"></i></a>' ?>
					
</tr><?php } ?>
</tbody>
</table>
<?php  echo form_fieldset_close(); ?>

</div>
</div>