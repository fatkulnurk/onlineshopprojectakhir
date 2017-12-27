<html>
<head>

	<title> <?php echo $title; ?> </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/style.css"  />
    <script src="<?php echo base_url();?>asset/css/ddmenu.js" type="text/javascript"></script>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>asset/img/icon.png" />
	<script src="<?php echo base_url();?>asset/css/jquery.validate.js"></script>
	
	<script src="<?php echo base_url();?>asset/js/jquery.min.js" type="text/javascript"></script>
	
	
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
<script>

var emailfilter = /^\w+[\+\.\w\-]*@([\w\-]+\.)*\w+[\w\-]*\.([a-z]{2,4}|\d+)$/ig;

function checkmail(e) {
    var checkval = emailfilter.test(e.value);
    if (checkval == false) {
        alert("ID Email tidak valid!");
        e.select();
    }
    return checkval;
}

</script>

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

</head>
	<body>
<div class="header">
<div id="logo" align="right">
	Layanan Pelanggan: 0856 - Pin BB | Konfirmasi Pembayaran | Status Order | Bantuan |
	<?php 
	if(!$this->session->userdata('is_logged_in'))
		 
	  { ?>
	 <a href="<?php echo base_url();?>pengguna/login_cust">Login</a>
	   <?php
	  } else{
	  ?>
		<a href="<?php echo base_url(); ?>pengguna_akun/akun">Akun saya</a> | Halo, <b>
	<?php 	foreach($query1->result_array() as $id)
		{
	  echo $id['nama_user'];
	  }
		?>
		</b> 
	(<a href="<?php echo base_url(); ?>pengguna_akun/logout">Log Out</a>)	
	<?php } ?>
	
	<a href="<?php echo base_url();?>pengguna/keranjang">
			<?php echo form_button('tas',$this->cart->total_items(),'class=tas'); ?></a>
			
	
	<script src="<?php echo base_url(); ?>asset/css/clock.js" type="text/javascript"></script>
	<div id="clockbox"></div>
	<center><?php echo form_input('','','class=inputan'); ?></center>
</div>
<div id="main">
<div id='cssmenu' class='cssmenu'>
<ul>
   <li class='active'><a href='index.html'><span><a href="<?php echo base_url();?>pengguna" title="HOME">Teen25</span></a></li>
   <li class='has-sub'><a href='<?php echo base_url();?>pengguna'><span>Kategori</span></a>
      <ul>
	  <?php foreach($query as $prod){ ?>   
	   <li><a href="<?php   echo base_url().'pengguna/kategori/'.$prod->id_produk;  ?>"><?php echo $prod->nama_produk; ?></a></li>
<?php } ?>	
      
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Layanan Website</span></a>
      <ul>
		      <li><a href="<?php echo base_url();?>pengguna/bukutamu/">Buku Tamu</a></li>
               <li>     <a href="<?php echo base_url();?>pengguna_akun/konfirm_pembayaran/">Konfirmasi Pembayaran</a></li>
                <li>    <a href="<?php echo base_url();?>pengguna_polling/">polling</a></li>
                    <li><a href="<?php echo base_url();?>pengguna_forum/">Forum</a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Informasi</span></a>
   <ul>   <li> <a href="#">Account</a></li>
          <li>              <a href="<?php echo base_url();?>pengguna/carabelanja">Cara belanja</a></li>
              <li>          <a href="#">Pengiriman</a></li>
                  <li>      <a href="#">Pembayaran</a></li>
						<li><a href="#">Tentang kami</a></li>
					</ul>	</li>
					
				

</div>

		
<div id="content">
<table  width="100%" border="0">