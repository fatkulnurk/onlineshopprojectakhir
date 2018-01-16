<!DOCTYPE html>
<html>
	<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<!-- Bootstrap -->
	<link href="<?php echo base_url();?>asset/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?php echo base_url();?>asset/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="<?php echo base_url();?>asset/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- jQuery custom content scroller -->
	<link href="<?php echo base_url();?>asset/admin/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

	<!-- Custom Theme Style -->
	<link href="<?php echo base_url();?>asset/admin/build/css/custom.min.css" rel="stylesheet">

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
	
<body class="nav-md footer_fixed">

<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="" class="site_title"><i class="fa fa-bug"></i> <span>BuyFish</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url();?>asset/admin/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url();?>admin/beranda"><i class="fa fa-home"></i> Dashboard</a></li>
                  <li><a><i class="fa fa-table"></i> Katalog <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url();?>admin/produk/">Kategori</a></li>
                        <li><a href="<?php echo base_url();?>admin/barang/">Barang</a></li>
                        <li><a href="<?php echo base_url();?>admin/ongkos/">Ongkos kirim</a></li>
                        <li><a href="<?php echo base_url();?>admin/jasa_kirim/">Jasa pengiriman</a></li>
                        <li><a href="<?php echo base_url();?>admin/norek/">Nomor Rekning</a></li>
                        <li><a href="<?php echo base_url();?>admin/user/">User</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-shopping-bag"></i> Tambah Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url();?>admin/produk">Tambah Data Produk</a></li>
                        <li><a href="<?php echo base_url();?>admin/barang_add">Tambah Data Barang</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cart-plus"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url();?>admin/pesanan/"> Pesanan</a></li>
                        <li><a href="<?php echo base_url();?>admin/pengiriman"> Pengiriman</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Laporan</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url();?>admin/"><i class="fa fa-bar-chart"></i> Transaksi Penjualan <span class="label label-success pull-right"></span></a></li>
                  <li><a href="<?php echo base_url();?>admin/"><i class="fa fa-signal"></i> Data Barang belum Terjual <span class="label label-success pull-right"></span></a></li>
                  <li><a href="<?php echo base_url();?>admin/"><i class="fa fa-bar-chart-o"></i> Data Barang Stok Habis <span class="label label-success pull-right"></span></a></li>
                  <li><a><i class="fa fa-table"></i> Layanan <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url();?>admin/transaksi">Transaksi Penjualan</a></li>
                            <li><a href="<?php echo base_url();?>admin/gaklaku">Data Barang belum Terjual</a></li>
                            <li><a href="#">Data Barang Stok Habis</a></li>
                        </ul>
                   </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>



          <!-- top navigation -->
          <div class="top_nav">
              <div class="nav_menu">
                  <nav>
                      <div class="nav toggle">
                          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                      </div>

                      <ul class="nav navbar-nav navbar-right">
                          <li class="">
                              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                  <img src="<?php echo base_url();?>asset/admin/images/img.jpg" alt=""> Admin
                                  <span class=" fa fa-angle-down"></span>
                              </a>
                              <ul class="dropdown-menu dropdown-usermenu pull-right">
                                  <li><a href="<?php echo base_url();?>admin_login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                              </ul>
                          </li>

                          <li role="presentation" class="dropdown">
                              <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                  <i class="fa fa-envelope-o"></i>
                                  <span class="badge bg-green">1</span>
                              </a>
                              <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                  <li>
                                      <a>
                                          <span class="image"><img src="<?php echo base_url();?>asset/admin/images/img.jpg" alt="Profile Image" /></span>
                                          <span>
                                              <span>admin</span>
                                              <span class="time">1 week ago</span>
                                          </span>
                                          <span class="message">
                                              Jika ada pesan maka akan ditampilkan disini.
                                          </span>
                                      </a>
                                  </li>
                                  <li>
                                      <div class="text-center">
                                          <a>
                                              <strong>See All Alerts</strong>
                                              <i class="fa fa-angle-right"></i>
                                          </a>
                                      </div>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </nav>
              </div>
          </div>
          <!-- /top navigation -->

          <!-- page content -->
          <div class="right_col" role="main">




<!--
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
				<a href="<?php echo base_url();?>pengguna_polling/polling_add">Tambah Data Polling</a>
                        <a href="<?php echo base_url();?>admin/pengiriman_add">Tambah Data Pengiriman</a> -->
                   
                
   

	
