<!DOCTYPE html>
<html>
<head>
<title> <?php echo $title; ?> </title>
    <!--
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/style_admin.css"  />
-->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url();?>asset/login/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/login/css/main.css">
    <!--===============================================================================================-->
</head>
<body>
<?php echo form_open('admin_login/validate_credentials'); ?>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form">
                <span class="login100-form-title p-b-48" align="center">
                        <img src="<?php echo base_url();?>asset/images/logo2.png" width="200"/>
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                    <?php echo form_input('username','','class="input100"'); ?>
                    <span class="focus-input100" data-placeholder="Username"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <?php echo form_password('password','','class="input100"'); ?>
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button name="submit" class="login100-form-btn">
                            Login
                        </button>

                    </div>
                </div>

                <div class="text-center p-t-115">
						<span class="txt1">
							PT. BuyFish Indonesia -
						</span>

                    <a class="txt2" href="#">
                        2018
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="<?php echo base_url();?>asset/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>asset/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>asset/login/vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo base_url();?>asset/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>asset/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>asset/login/vendor/daterangepicker/moment.min.js"></script>
<script src="<?php echo base_url();?>asset/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>asset/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url();?>asset/login/js/main.js"></script>

<?php echo form_close(); ?>
</body>
<!--
<br><br><br><br><br><br><br><br><br>
<div id="login">
<?php echo form_open('admin_login/validate_credentials'); ?>
<table align='center' >
<tr>
<td colspan='3'><img src="<?php echo base_url();?>asset/images/logo2.png"><br><br></td>
</tr>
<tr>
<td valign='top'>Username</td><td valign='top'>:</td><td><?php echo form_input('username','','class=inputan'); ?>
<?php echo form_error('username'); ?></td>
</tr>
<tr>
<td valign='top'>Password</td><td valign='top'>:</td><td><?php echo form_password('password','','class=inputan'); ?>

        <?php echo form_error('password'); ?></td>
</tr>
<tr>
<td colspan='3' align='center' >
<?php echo form_reset('reset','Reset','class=tmbl-oren')." ".form_submit('submit','Login','class=tmbl-oren'); ?>
</td>
</tr>
<tr>
</tr>
</table>
<?php echo form_close(); ?>
<p align='center'>PT. BuyFish Indonesia - 2018</p>
</div>
-->
</html>