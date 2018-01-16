<?php
$this->load->library('session');
?>
<!-- header.php di foder application -> views -> pengguna -->
<html>
<head>

	<title> <?php echo $title; ?> </title>
    <!-- Css Bulma & fontawesome-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/bulma/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/font-awesome/css/font-awesome.css">

    <!-- Costum css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/style.css"  />

    <!-- bulma costum
            background-image: radial-gradient(circle 78px at left, #16d9e3 0%, #31bfe4 47%, #46aef7 100%);
     -->
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:400,300italic,500,700) !important;
        body{
            background: #e3e3e3;
        }
        .herohead{
            width: 100% !important;
        }
        .heroheadnew{

            background-image: linear-gradient(-20deg, #b721ff 0%, #207dfd 80%);
            background: #03a0ed;
            width: 100% !important;
        }
        .bannergoblok{
            z-index: 692;
            float:left;
            margin-left:-43px;
        }
        .opopadding{
            padding-left: 18px;
        }
        .form-search{
            background-color: #ffffff;
            color: #000000 !important;
            border: #002658 solid 1px;
            width: 100%;
            border-radius: 25px;
        }


        hero.is-small .hero-body {
            padding-bottom: 0rem;
            padding-top: 0.4rem;
        }
        .hero.is-small > .hero-body {
            padding-bottom: 0rem;
            padding-top: 0.49rem;
        }
        #subcontent-left{
            background: #e3e3e3;
            border: none;
        }
    </style>

    <!-- js import -->
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
<?php $this->load->view('fungsitanggal');?>
	<body>

    <nav class="navbar">
        <section class="hero herohead is-link is-small">
            <div class="hero-body">
                <div class="columns">
                    <div class="column is-2 has-text-centered">
                        <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>/asset/images/logo.png"></a>
                    </div>
                    <div class="column is-6">
                        <form action="<?php echo base_url();?>search.php" method="get">
                            <div class="field has-addons has-addons-centered">
                                <div class="control is-expanded is-outlined">
                                    <input class="input is-white form-search" name="query" type="text" placeholder="Masukan nama produk...">
                                </div>
                                <p class="control">
                                    <input type="submit" class="button is-grey form-search-button" value="Search">
                                </p>
                            </div>
                        </form>

                    </div>
                    <div class="column is-2 has-text-right is-hidden-tablet-only is-hidden-mobile">
                        <a href="<?php echo base_url();?>" class="button is-light">
                        <span class="icon is-large">
                          <i class="fa fa-gift"></i>
                        </span>
                        </a>
                        <a class="button" href="<?php echo base_url();?>pengguna/keranjang">
                        <span class="icon is-small">
                          <i class="fa fa-shopping-bag"></i>
                        </span>
                        </a>
                    </div>
                    <div class="column is-2 has-text-right is-hidden-tablet-only is-hidden-mobile">
                        <?php
                        if(!$this->session->userdata('is_logged_in'))
                        { ?>
                                <a href="<?php echo base_url();?>pengguna/registrasi" class="button is-light">Daftar</a>
                                <a href="<?php echo base_url();?>pengguna/login_cust" class="button is-link is-rounded">Masuk</a>
                            <?php
                        } else{
                            foreach($query1->result_array() as $id)
                            {
                                echo '<a href="'.base_url().'pengguna_akun/akun" class="button is-info is-rounded">'.$id['nama_user'].'</a>';
                            }
                            ?>
                            <a href="<?php echo base_url(); ?>pengguna_akun/logout" class="button is-light">Log Out</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </nav>
    <nav class="navbar herohead is-link is-small">
        <div id="navbarExampleTransparentExample" class="navbar-menu container">
            <div class="navbar-start">
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="">
                        <strong>
                    <span class="icon is-small">
                        <i class="fa fa-tasks"></i>
                    </span>
                            KATEGORI
                        </strong>
                    </a>
                    <div class="navbar-dropdown">
                        <?php foreach($query as $prod){ ?>
                            <a class="navbar-item" href="<?php   echo base_url().'pengguna/kategori/'.$prod->id_produk;  ?>"><?php echo $prod->nama_produk; ?></a>
                        <?php } ?>
                    </div>
                </div>
                <a class="navbar-item" href="<?php echo base_url();?>pengguna_akun/konfirm_pembayaran/">
                    <strong>
                <span class="icon is-small">
                    <i class="fa fa-whatsapp"></i>
                </span> KONFIRMASI
                    </strong>
                </a>
                <a class="navbar-item" href="<?php echo base_url();?>pengguna/pengiriman">
                    <strong>
                <span class="icon is-small">
                    <i class="fa fa-truck"></i>
                </span> PENGIRIMAN
                    </strong>
                </a>
                <a class="navbar-item" href="<?php echo base_url();?>pengguna/carapembayaran">
                    <strong>
                <span class="icon is-small">
                    <i class="fa fa-money"></i>
                </span> CARA BAYAR
                    </strong>
                </a>
                <a class="navbar-item" href="<?php echo base_url();?>rss.php">
                    <strong>
                <span class="icon is-small">
                    <i class="fa fa-rss"></i>
                </span> RSS
                    </strong>
                </a>
            </div>
        </div>
    </nav>

    <!--
    <nav class="navbar">
        <section class="hero heroheadnew is-link is-small">
            <div class="hero-body container">
                <div class="columns">
                    <div class="column is-2 has-text-centered">
                        <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>/asset/images/logo.png"></a>
                    </div>
                    <div class="column is-5 has-text-centered">
                        <div class="navbar-start">
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link" href="">
                                    <strong>
                                        PRODUCT
                                    </strong>
                                </a>
                                <div class="navbar-dropdown">
                                    <a class="navbar-item" href="http://localhost/teen25/pengguna/kategori/4">Mini Dress</a>
                                    <a class="navbar-item" href="http://localhost/teen25/pengguna/kategori/15">Rok</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-3">
                        <div class="field has-addons has-addons-centered">
                            <div class="control is-expanded is-outlined has-icons-right">
                                <input class="input form-search" type="text" placeholder="Search ...">
                                <span class="icon is-small is-right">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="column is-1 has-text-right is-hidden-tablet-only is-hidden-mobile">
                        <span class="icon is-medium">
                          <span class="fa-stack">
                            <i class="fa fa-user-o fa-stack-2x"></i>
                          </span>
                        </span>
                        <span class="icon is-medium">
                          <span class="fa-stack">
                            <i class="fa fa-shopping-cart fa-stack-2x"></i>
                          </span>
                        </span>
                    </div>
                </div>
            </div>
        </section>
    </nav>
    -->
    <!--
    <nav class="navbar">
        <section class="hero heroheadnew is-link is-small">
            <div class="hero-body container">
                <div class="columns">
                    <div class="column is-2 has-text-centered">
                        <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>/asset/images/logo.png"></a>
                    </div>
                    <div class="column is-5 has-text-centered">

                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link" href="">
                                <strong>
                                    PRODUCT
                                </strong>
                            </a>
                            <div class="navbar-dropdown">
                                <a class="navbar-item" href="http://localhost/teen25/pengguna/kategori/4">Mini Dress</a>
                                <a class="navbar-item" href="http://localhost/teen25/pengguna/kategori/15">Rok</a>
                            </div>
                        </div>
                    </div>
                    <div class="column is-3">
                        <div class="field has-addons has-addons-centered">
                            <div class="control is-expanded is-outlined has-icons-right">
                                <input class="input form-search" type="text" placeholder="Search ...">
                                <span class="icon is-small is-right">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="column is-1 has-text-right is-hidden-tablet-only is-hidden-mobile">
                        <span class="icon is-medium">
                          <span class="fa-stack">
                            <i class="fa fa-user-o fa-stack-2x"></i>
                          </span>
                        </span>
                        <span class="icon is-medium">
                          <span class="fa-stack">
                            <i class="fa fa-shopping-cart fa-stack-2x"></i>
                          </span>
                        </span>
                    </div>
                </div>
            </div>
        </section>
    </nav>
-->
<!-- header mod
<nav class="navbar">
    <section class="hero herohead is-link is-small">
        <div class="hero-body">
            <div class="columns">
                <div class="column is-2 has-text-centered">
                    <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>/asset/images/logo.png"></a>
                </div>
                <div class="column is-6">
                    <div class="field has-addons has-addons-centered">
                        <div class="control is-expanded is-outlined">
                            <input class="input is-link form-search" type="text" placeholder="Masukan nama produk...">
                        </div>
                        <p class="control">
                            <a class="button is-link form-search-button">
                                Search
                            </a>
                        </p>
                    </div>
                </div>
                <div class="column is-2 has-text-right is-hidden-tablet-only is-hidden-mobile">
                    <a class="button is-light">
                        <span class="icon is-large">
                          <i class="fa fa-gift"></i>
                        </span>
                    </a>
                    <a class="button">
                        <span class="icon is-small">
                          <i class="fa fa-camera"></i>
                        </span>
                    </a>
                    <a class="button">
                        <span class="icon is-small">
                          <i class="fa fa-shopping-bag"></i>
                        </span>
                    </a>
                </div>
                <div class="column is-2 has-text-right is-hidden-tablet-only is-hidden-mobile">
                    <a class="button is-light">Daftar</a>
                    <a class="button is-link is-rounded">Masuk</a>
                </div>
            </div>
        </div>
    </section>
</nav>
<nav class="navbar herohead is-link is-small">
    <div id="navbarExampleTransparentExample" class="navbar-menu container">
        <div class="navbar-start">
            <a class="navbar-item" href="<?php echo base_url();?>">
                <strong>
                <span class="icon is-small">
                    <i class="fa fa-home"></i>
                </span> HOME
                </strong>
            </a>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="">
                    <strong>
                    <span class="icon is-small">
                        <i class="fa fa-tasks"></i>
                    </span>
                    KATEGORI
                    </strong>
                </a>
                <div class="navbar-dropdown">
                    <?php foreach($query as $prod){ ?>
                        <a class="navbar-item" href="<?php   echo base_url().'pengguna/kategori/'.$prod->id_produk;  ?>"><?php echo $prod->nama_produk; ?></a>
                    <?php } ?>
                </div>
            </div>
            <a class="navbar-item" href="">
                <strong>
                <span class="icon is-small">
                    <i class="fa fa-whatsapp"></i>
                </span> KONFIRMASI
                </strong>
            </a>
            <a class="navbar-item" href="">
                <strong>
                <span class="icon is-small">
                    <i class="fa fa-commenting-o"></i>
                </span> FORUM
                </strong>
            </a>
            <a class="navbar-item" href="">
                <strong>
                <span class="icon is-small">
                    <i class="fa fa-phone-square"></i>
                </span> HUBUNGI KAMI
                </strong>
            </a>
            <a class="navbar-item" href="">
                <strong>
                <span class="icon is-small">
                    <i class="fa fa-question-circle"></i>
                </span> BANTUAN
                </strong>
            </a>
            <a class="navbar-item" href=""></a>
        </div>
    </div>
</nav>

-->
<!--
<div class="tabs">
    <div class="container">
        <ul>
            <li class="is-active"><a href="web.html">Web</a></li>
            <li><a href="gambar.html">Gambar</a></li>
            <li><a href="video.html">Video</a></li>
            <li><a href="berita.html">Berita</a></li>
            <li><a>Lainnya</a></li>
        </ul>
    </div>
</div>
-->
<!-- end header mod -->
<!--
<div id="header">
<div id="logo" align="right">
	Layanan Pelanggan: 08885489165 - Pin BB 31622A3A | Konfirmasi Pembayaran | Status Order | Bantuan |
	<?php 
	if(!$this->session->userdata('is_logged_in'))
		 
	  { ?>
	 <a href="<?php echo base_url();?>pengguna/login_cust">Login</a>
	   <?php
	  } else{
		  
	  ?>
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

if(isset($_SESSION['userid']))
{ 
  if($_SESSION['userid'] == 0)
  { 
     $ses = null; //Declare him as guest 
   } 
}

if(!function_exists("freichatx_get_hash")){
function freichatx_get_hash($ses){

       if(is_file("C:/xampp/htdocs/freichat/hardcode.php")){

               require "C:/xampp/htdocs/freichat/hardcode.php";

               $temp_id =  $ses.$uid;

               return md5($temp_id);

       }
       else
       {
               echo "<script>alert('module freichatx says: hardcode.php file not found!');</script>";
       }

       return 0;
}
}
?>
<script type="text/javascript" language="javascipt" src="http://localhost/freichat/client/main.php?id=<?php echo $ses;?>&xhash=<?php echo freichatx_get_hash($ses); ?>"></script>
	<link rel="stylesheet" href="http://localhost/freichat/client/jquery/freichat_themes/freichatcss.php" type="text/css">
<!--===========================FreiChatX=======END=========================-->
<!--
		 Halo, <b>
	<?php 	foreach($query1->result_array() as $id)
		{
	  echo '<a href="'.base_url().'pengguna_akun/akun">'.$id['nama_user'].$_SESSION['userid'].'</a>';
	  }
		?>
		</b> 
	(<a href="<?php echo base_url(); ?>pengguna_akun/logout">Log Out</a>)	
	<?php } ?>
	
	<a href="<?php echo base_url();?>pengguna/keranjang">
			<?php echo form_button('tas',$this->cart->total_items(),'class=tas'); ?></a>
			
	
	<script src="<?php echo base_url(); ?>asset/css/clock.js" type="text/javascript"></script>
	<div id="clockbox"></div>
	
</div>
<div id="main">
    <!--
<div id='cssmenu' class='cssmenu'>
<ul>
   <li class='has-sub'><a href='<?php echo base_url();?>pengguna'><span>Kategori</span></a>
      <ul>
	  <?php foreach($query as $prod){ ?>   
	   <li><a href="<?php   echo base_url().'pengguna/kategori/'.$prod->id_produk;  ?>"><?php echo $prod->nama_produk; ?></a></li>
<?php } ?>	
      
      </ul>
   </li>
  
	<li class='active'><a href="<?php echo base_url();?>pengguna/bukutamu/">Buku Tamu</a></li>
    <li class='active'>    <a href="<?php echo base_url();?>pengguna_polling/">polling</a></li>
    <li class='active'><a href="<?php echo base_url();?>pengguna_forum/">Forum</a></li>
	<li class='active'>     <a href="<?php echo base_url();?>pengguna_akun/konfirm_pembayaran/">Konfirmasi Pembayaran</a></li>
    <li class='has-sub'><a href='#'><span>Informasi</span></a>
   <ul>   	<?php 
	if($this->session->userdata('is_logged_in'))
		 
	  { ?>
	   <li><a href="<?php echo base_url(); ?>pengguna_akun/akun">Akun saya</a></li>
	   <?php
	  } ?>
 
          <li>              <a href="<?php echo base_url();?>pengguna/carabelanja">Cara belanja</a></li>
              <li>          <a href="<?php echo base_url();?>pengguna/pengiriman">Pengiriman</a></li>
                  <li>      <a href="<?php echo base_url();?>pengguna/carapembayaran">Cara Pembayaran</a></li>
						<li><a href="#">Tentang kami</a></li>
					</ul>	</li>
					
			<li class='active'><a href="<?php echo base_url();?>pengguna/bukutamu/">Kontak</a></li>		
				

</div>

		-->
<div>
<table width="100%">