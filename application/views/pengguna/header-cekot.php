<html>
<head>

	<title> <?php echo $title; ?> </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/style.css"  />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/bulma/style.css"  />
	<link rel="shortcut icon" href="<?php echo base_url(); ?>asset/img/icon.png" />
	<script src="<?php echo base_url();?>asset/css/jquery.js"></script>
	<script src="<?php echo base_url();?>asset/css/jquery.validate.js"></script>
	<link rel="stylesheet" href="<?php echo base_url();?>asset/calendar/jquery-ui.css">
	<script src="<?php echo base_url();?>asset/calendar/jquery-1.9.1.js"></script>
	<script src="<?php echo base_url();?>asset/calendar/jquery-ui.js"></script>
	
	<script>
	$(function() {
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	</script>
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
            background-color: #0c8fea;
            color: white !important;
            border:white solid 1px;
            width: 100%;
            border-radius: 25px;
        }
        .form-search:hover{
            border:white solid 1px !important;
            color: white;

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


    <style type="text/css">
body { font-size: 14px; }

pre {font-size: 10px; background-color: #FFFFCC; padding: 5px 5px 5px 5px; }
pre .comment { color: #008000; }
pre .builtin { color:#FF0000;  }
</style>
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
                                    <a class="button is-grey form-search-button">
                                        Search
                                    </a>
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
	<div id="header">
	<div class="header">
	<div id="main">
	
	

