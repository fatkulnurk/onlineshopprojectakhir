<head>
<title> <?php echo $title; ?> </title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/style_admin.css"  />
</head>
<br><br><br><br><br><br><br><br><br>
<div id="login">
<?php echo form_open('admin_login/validate_credentials'); ?>
<table align='center' >
<tr>
<td colspan='3'><img src="<?php echo base_url();?>asset/img/logo-login2.png"><br><br></td>
</tr>
<tr>
<td valign='top'>Username</td><td valign='top'>:</td><td><?php echo form_input('username','','class=inputan'); ?>
<?php echo form_error('username'); ?></td>
</tr>
<tr>
<td valign='top'>Password</td><td valign='top'>:</td><td><?php echo form_password('password','','class=inputan'); ?><?php echo form_error('password'); ?></td>
</tr>
<tr>
<td colspan='3' align='center' ><?php echo form_reset('reset','Reset','class=tmbl-oren')." ".form_submit('submit','Login','class=tmbl-oren'); ?></td>
</tr>
<tr>
</tr>
</table>
<?php echo form_close(); ?>
<p align='center'>Administator JuraganIkan - 2016</p>
</div>