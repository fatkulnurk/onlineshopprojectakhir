<div class="hero is-white">
    <div class="hero-body">
        <div class="columns">
            <div class="column is-6 is-container">
                <h3 class="title is-3">Login</h3>
                <div class="is-alert is-danger">
                    <?php echo $message; ?>
                </div>
                <br>
                <?php echo form_open('pengguna/login'); ?>
                Email : <br>
                <?php	echo form_input('email',set_value('email'),'class="input is-info"'); ?> <br>
                Password :<br>
                <?php
                $pwd=array('name'=>'password',
                                'id'=>'password',
                                'class'=>'input is-info');
                echo form_password($pwd);
                ?>
                <br>
                <a href="<?php echo base_url();?>pengguna/lupa_pass">Lupa kata sandi?</a><br/>
                <?php
                echo form_submit('login','L O G I N','class="button is-link"');
                ?>
                <?php
                echo form_close();
                ?>
            </div>
            <div class="column is-6">
                <h3 class="title is-3">Belum Punya Akun?</h3>
                <p>Belum punya akun? daftar aja yuk, gratis loh.</p><br/>
                <p class="has-text-centered"> <a href="<?php echo base_url();?>pengguna/registrasi" class="button is-link">Mendaftar</a> </p>
                <br>
                <p>*) pendaftaran ini gratis.</p>
            </div>
        </div>
    </div>
</div>
<!--
<table align='center'>
<tr><td> <div id="login">
<div class='nama-content'><strong>Pelanggan terdaftar</strong></div>
			<div align="right"><font size ='1' align='right'>* wajib diisi &nbsp;</font>
</div>
<?php echo form_open('pengguna/login'); ?>
<table align='center'>
<tr><td valign='top' align='right'>Email * &nbsp;</td><td>
	<?php	echo form_input('email',set_value('email'),'class="input is-info"'); ?></td></tr>
<tr><td valign='top' align='right'>Password * &nbsp;</td><td>
		<?php $pwd=array('name'=>'password',
						  'id'=>'password',
						  'class'=>'input is-info');			echo form_password($pwd); ?></td></tr>
<tr><td valign='top'></td><td><font color='red' size='1px'><?php echo $message; ?> </font>
<br><a href="<?php echo base_url();?>pengguna/lupa_pass">Lupa kata sandi?</a>
</td></tr>
<tr><td ></td><td><br><?php	echo form_submit('login','L O G I N','class="button is-link"'); ?> </td></tr>

</table>
<?php echo form_close(); ?>
</div></td>
<td><div id="login">
<div class='nama-content'><strong>Belum anggota?</strong></div>
Anda dipersilakan untuk mendaftar akun sebagai pelanggan baru di toko kami!<br><br>
<center><a href="<?php echo base_url()?>pengguna/registrasi" ><?php echo form_button('daftar','D A F T A R','class="button is-link"'); ?></a>
</div></td>

-->
</tr>
</table>

