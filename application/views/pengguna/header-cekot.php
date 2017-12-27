<html>
<head>

	<title> <?php echo $title; ?> </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/style.css"  />
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

<style type="text/css">
body { font-size: 11px; font-family: "verdana"; }

pre { font-family: "verdana"; font-size: 10px; background-color: #FFFFCC; padding: 5px 5px 5px 5px; }
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
	<div id="header">
	<div class="header">
	<div id="logo" align="right">
	<script src="<?php echo base_url(); ?>asset/css/clock.js" type="text/javascript"></script><div id="clockbox"></div>
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
  echo '<a href="'.base_url().'pengguna_akun/akun">'.$id['nama_user'].'</a>';
  
	?>
	</b> | <a href="<?php echo base_url(); ?>pengguna_akun/logout">Log Out</a>	
<?php }} ?>
<p><a href="<?php echo base_url(); ?>pengguna/">Kembali ke katalog</a></p>
</div>
	<div id="main">
	
	

