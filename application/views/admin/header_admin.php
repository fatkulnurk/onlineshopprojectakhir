<html>
	<head>
	<title> <?php echo $title; ?> </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/style_admin.css"  />
    <script src="<?php echo base_url();?>asset/css/ddmenu.js" type="text/javascript"></script>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>asset/img/icon.png" />
	<script src="<?php echo base_url();?>asset/css/jquery.js"></script>
	<script src="<?php echo base_url();?>asset/css/jquery.validate.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/tinymce/tinymce.min.js"></script>
<script language="javascript" src="<?php echo base_url(); ?>asset/js/jquery.js" type="text/javascript"></script>
  <script language="javascript" src="<?php echo base_url(); ?>asset/js/jquery.dataTables.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/jquery.dataTables.css"  />  
 <script charset="utf-8" type="text/javascript">
 $(document).ready(function() {
    $('#example').dataTable();
} ); 
</script>
	
<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>

 <script>
       $(document).ready(function(){
           $("#formku").validate();
        });
   </script>

   <style type="text/css">
       label.error {
           color: red; padding-left: .5em;
       }
   </style>

 <SCRIPT TYPE="text/javascript">
<!--
// copyright 1999 Idocs, Inc. http://www.idocs.com
// Distribute this script freely but keep this notice in place
function numbersonly(myfield, e, dec)
{
var key;
var keychar;

if (window.event)
key = window.event.keyCode;
else if (e)
key = e.which;
else
return true;
keychar = String.fromCharCode(key);

// control keys
if ((key==null) || (key==0) || (key==8) ||
(key==9) || (key==13) || (key==27) )
return true;

// numbers
else if ((("0123456789").indexOf(keychar) > -1))
return true;

// decimal point jump
else if (dec && (keychar == "."))
{
myfield.form.elements[dec].focus();
return false;
}
else
return false;
}

//-->
</SCRIPT>
 <!-- -- Script Chat -->
		                     <!--===========================FreiChat=======START=========================-->
<!--	For uninstalling ME , first remove/comment all FreiChat related code i.e below code
	 Then remove FreiChat tables frei_session & frei_chat if necessary
         The best/recommended way is using the module for installation                         -->

<?php
$_SESSION['userid'] = $this->pengguna_model->id_user();
$ses=null;
 if(isset($_SESSION['userid']))
{ 
  if($_SESSION['userid'] != null) // Here null is guest 
  { 
   $ses=$_SESSION['userid']; //LOOK, now userid will be passed to FreiChat 
  } 
} 

if(!function_exists("freichatx_get_hash")){
function freichatx_get_hash($ses){

       if(is_file("C:/xampp/htdocs/freichat/hardcode.php")){

               require "C:/xampp/htdocs/freichat/hardcode.php";

               $temp_id =  $ses . $uid;

               return md5($temp_id);

       }
       else
       {
               echo "<script>alert('module freichatx says: hardcode.php file not
found!');</script>";
       }

       return 0;
}
}
?>
<script type="text/javascript" language="javascipt" src="http://localhost/freichat/client/main.php?id=<?php echo $ses;?>&xhash=<?php echo freichatx_get_hash($ses); ?>"></script>
	<link rel="stylesheet" href="http://localhost/freichat/client/jquery/freichat_themes/freichatcss.php" type="text/css">
<!--===========================FreiChatX=======END=========================-->  
</head>
<?php $this->load->view('fungsitanggal');?>
	
<body>
	<div class="header">
		<div id="logo" align="right"></div>
	</div>
	<div id="main">
		<div id='cssmenu' class='cssmenu'>
	<ul>
	   <li class='active'><a href='index.html'><span><a href="<?php echo base_url();?>admin/beranda" title="HOME">Home</span></a></li>
	   <li class='has-sub'><a href='<?php echo base_url();?>#'><span>Katalog</span></a>
			<ul>
				<li><a href="<?php echo base_url();?>admin/produk/">Kategori</a></li>
				<li><a href="<?php echo base_url();?>admin/barang/">Barang</a></li>
				<li><a href="<?php echo base_url();?>admin/ongkos/">Ongkos kirim</a></li>
				<li><a href="<?php echo base_url();?>admin/jasa_kirim/">Jasa pengiriman</a></li>
				<li><a href="<?php echo base_url();?>admin/norek/">Nomor Rekning</a></li>
				<li><a href="<?php echo base_url();?>admin/user/">User</a></li>

			</ul>
	   </li>
	   <li class='has-sub'><a href='#'><span>Tambah Data</span></a>
			<ul>
				<li><a href="<?php echo base_url();?>admin/produk">Tambah Data Produk</a></li>
				<li><a href="<?php echo base_url();?>admin/barang_add">Tambah Data Barang</a></li>
				<li><a href="#">Tambah Data Pengiriman</a></li>
			</ul>
	   </li>	   
	   <li class='has-sub'><a href='#'><span>Transaksi</span></a>
			<ul>
			<li><a href="<?php echo base_url();?>admin/pesanan/"> Pesanan</a></li>
			<li><a href="<?php echo base_url();?>admin/pengiriman"> Pengiriman</a></li>
			</ul>
	   </li>
	   <li class='has-sub'><a href='#'><span>Layanan Website</span></a>
			<ul>
				<li><a href="<?php echo base_url();?>pengguna_polling/polling_adm">Polling</a></li>
				<li><a href="<?php echo base_url();?>admin/bukutamu/">Buku Tamu</a></li>
				<li><a href="<?php echo base_url();?>pengguna_forum/admin_forum/">Forum</a></li>
				<li><a href="<?php echo base_url();?>admin/komentar/">Komentar</a></li>
			</ul>	</li>
		<li class='has-sub'><a href='#'><span>Laporan</span></a>
			<ul>
				<li><a href="<?php echo base_url();?>admin/transaksi">Transaksi Penjualan</a></li>
                <li><a href="<?php echo base_url();?>admin/gaklaku">Data Barang belum Terjual</a></li>
                <li><a href="#">Data Barang Stok Habis</a></li>
				
			</ul>	</li>
		<li class='active'><?php echo anchor('/admin_login/logout/', 'Logout'); ?></li>				
					
	</ul>
	</div>
				<!--		<a href="<?php echo base_url();?>pengguna_polling/polling_add">Tambah Data Polling</a>
                        <a href="<?php echo base_url();?>admin/pengiriman_add">Tambah Data Pengiriman</a> -->
                   
                
   

	
