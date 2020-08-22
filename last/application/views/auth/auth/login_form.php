<style>
	form {
		width: 300px;
		height: 450px;
		margin: auto;
		/* position: absolute; */
		padding: 20px 70px 50px 70px;
		background: rgba(40, 57, 101, .9);
		box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);
	}

	body .login_title {
		color: #ffffff;
		height: 40px;
		width: 92%;
		text-align: left;
		font-size: 20px;
		text-align: center;
	}

	input#login,
	input#captcha,
	input#password {
		border: none;
		padding: 15px 10px;
		border-radius: 25px;
		background: rgb(14, 0, 93);
		width: 100%;
	}

	input#login:focus,
	input#captcha:focus,
	input#password:focus {
		background: rgb(255, 255, 255);
	}

	input[type="submit"] {
		background: #1161ee;
		border: none;
		padding: 15px 20px;
		border-radius: 25px;
		/* background: rgba(255,255,255,.1); */
		width: 92%;
		color: #fff;
		display: block;
		text-transform: uppercase;
		box-sizing: border-box;
	}

	td {
		padding: 5px 0px;
		width: 100%;
		display: inherit;
	}

	a {
		color: inherit;
		text-decoration: none;
		padding: 0px 32px;
		margin-top: 20px;
	}

	a:hover {
		color: #ffffff;
	}

	hr {
		width: 92%;
		float: left;
	}

	img {
		width: 250px;
	}
</style>


<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'placeholder'	=> 'Enter Username',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username and $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'placeholder'	=> 'Enter Password',
	'class'	=> 'check',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<form action="<?php echo base_url(); ?>auth/login" method="post" accept-charset="utf-8">
	<table>
		<div class='login_title'>
			<span>Login to your account</span>
		</div>
		<tr>
			<td><?php echo form_input($login); ?></td>
			<td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']]) ? $errors[$login['name']] : ''; ?></td>
		</tr>
		<tr>
			<td><?php echo form_password($password); ?></td>
			<td style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']]) ? $errors[$password['name']] : ''; ?></td>
		</tr>

		<?php if ($show_captcha) {
			if ($use_recaptcha) { ?>
				<tr>
					<td colspan="2">
						<div id="recaptcha_image"></div>
					</td>
					<td>
						<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
						<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
						<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="recaptcha_only_if_image">Enter the words above</div>
						<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
					</td>
					<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
					<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
					<?php echo $recaptcha_html; ?>
				</tr>
			<?php } else { ?>
				<tr>
					<td colspan="3">
						<p>Enter the code exactly as it appears:</p>
						<?php echo $captcha_html; ?>
					</td>
				</tr>
				<tr>
					<td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
					<td><?php echo form_input($captcha); ?></td>
					<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
				</tr>
		<?php }
		} ?>

		<tr>
			<td colspan="3">
				<?php echo form_checkbox($remember); ?>
				<?php echo form_label('Remember me', $remember['id']); ?>
			</td>
		</tr>
	</table>
	<?php echo form_submit('submit', 'Sing In'); ?>
	<hr>
	<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>
	<?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?>
	<?php echo form_close(); ?>



	<div id="connect-with-buttons">
		<a href="<?php echo base_url() ?>auth_oa2/session/facebook" class="connect-with-button account-sprites account-sprites-facebook" title="Facebook Connect">Facebook</a>
		<a href="<?php echo base_url() ?>auth_oa2/session/google" class="connect-with-button marginleft13 account-sprites account-sprites-google" title="Google">Google</a>
	</div>