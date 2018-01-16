<script language="javascript" src="<?php echo base_url(); ?>asset/js/jquery.js" type="text/javascript"></script>
  <script language="javascript" src="<?php echo base_url(); ?>asset/js/jquery.dataTables.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/jquery.dataTables.css"  />  
  
 <script charset="utf-8" type="text/javascript">
 $(document).ready(function() {
    $('#example').dataTable();
} ); 
</script>
<div id="kotak-putus">
<div class="Ket">
<table width="100%" class="table"><tr>
	<td><img src="<?php echo base_url();?>asset/img/prod.png"> <?php echo $title; ?> </td>
	<td align="right">		</td></tr>
	</table>
</div>
<div id="kotak-biasa">	
			<table id="example" class="table" width="100%">
	<thead><tr><th>No</th><th>NAMA KATEGORI</th><th>TOOLS</th></tr></thead><tbody>
			<?php $no = 1;
                foreach($query as $prod){
				 
			?>
			<tr>
			<td><?php echo $no++; ?></td>
            <td><input type="hidden" value="<?php echo $prod->id_produk;  ?>"><?php echo $prod->nama_produk; ?></td>
            <td><?php echo '<a href="'.base_url().'admin/produk_edit/'.$prod->id_produk.'" class="tmbl-putih">'?>
				<i class='icon-pencil'></i> edit</a>
			<?php echo '<a href="'.base_url().'admin/produk_del/'.$prod->id_produk.'" class="tmbl-putih" 
			onclick="return confirm (\'Anda yakin akan menghapus '.$prod->nama_produk.'?\')">' ?>
			<i class='icon-remove'></i> hapus</a></td>
			</tr>
			<?php } ?></tbody>
			</table>
</div>
</div>

