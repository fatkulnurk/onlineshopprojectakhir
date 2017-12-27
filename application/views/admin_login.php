 <!-- form login dari : http://www.cssflow.com/snippets/dark-login-form  -->
 <html lang="en"> 
<head><title>Menu Admin </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  
  <link rel="stylesheet" href="<?php echo base_url();?>/css/style_login.css">
<link rel="shortcut icon" href="<?php echo base_url(); ?>img/icon.jpg" />
  <body>
 <table width="90%" align="center">
 <br>
 <tr><td width="53%"><div align="center"><font color ="white"><img src="<?php echo base_url();?>img/baner.png">MENU ADMIN</font></div></td>
   <td width="47%">&nbsp;</td>
 </tr>
 <tr><td colspan="2" valign="top">
	 <form method="post" action="<?php echo base_url(); ?>index.php/login/masuklogin" class="login">
    <p>
      <label for="login">Username:</label>
      <input type="text" name="username" id="username" value="">
    </p>

    <p>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" value="">
    </p>

    <p class="login-submit">
      <button type="submit" class="login-button">Login</button>
    </p>

    <p class="forgot-password"><a href="#">Forgot your password?</a></p>
  </form>
	</td>
   </tr>
 </table>
 
 
  
</body>
</html>