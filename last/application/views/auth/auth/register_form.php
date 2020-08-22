<style>
	@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500);

	*:focus {
		outline: none;
	}

	body {
		margin: 0;
		padding: 0;
		background: #DDD;
		font-size: 16px;
		color: #222;
		font-family: 'Roboto', sans-serif;
		font-weight: 300;
	}

	#login-box {
		position: relative;
		margin: 5% auto;
		width: 600px;
		height: 600px;
		background: #FFF;
		border-radius: 2px;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
	}

	#captcha {
		margin-top: 10px;
	}.left {
		position: absolute;
		top: 0;
		left: 0;
		box-sizing: border-box;
		padding: 40px;
		width: 300px;
		height: 400px;
	}

	h1 {
		margin: 0 0 20px 0;
		font-weight: 300;
		font-size: 28px;
	}

	input[type="text"],
	input[type="password"] {
		display: block;
		box-sizing: border-box;
		margin-bottom: 20px;
		padding: 4px;
		width: 220px;
		height: 32px;
		border: none;
		border-bottom: 1px solid #AAA;
		font-family: 'Roboto', sans-serif;
		font-weight: 400;
		font-size: 15px;
		transition: 0.2s ease;
	}

	input[type="text"]:focus,
	input[type="password"]:focus {
		border-bottom: 2px solid #16a085;
		color: #16a085;
		transition: 0.2s ease;
	}

	input[type="submit"] {
		margin-top: 28px;
		width: 120px;
		height: 32px;
		background: #16a085;
		border: none;
		border-radius: 2px;
		color: #FFF;
		font-family: 'Roboto', sans-serif;
		font-weight: 500;
		text-transform: uppercase;
		transition: 0.1s ease;
		cursor: pointer;
	}

	input[type="submit"]:hover,
	input[type="submit"]:focus {
		opacity: 0.8;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
		transition: 0.1s ease;
	}

	input[type="submit"]:active {
		opacity: 1;
		box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
		transition: 0.1s ease;
	}

	.or {
		position: absolute;
		top: 180px;
		left: 280px;
		width: 40px;
		height: 40px;
		background: #DDD;
		border-radius: 50%;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
		line-height: 40px;
		text-align: center;
	}

	.right {
		position: absolute;
		top: 0;
		right: 0;
		box-sizing: border-box;
		padding: 40px;
		width: 300px;
		height: 400px;
		background: url('https://goo.gl/YbktSj');
		background-size: cover;
		background-position: center;
		border-radius: 0 2px 2px 0;
	}

	.right .loginwith {
		display: block;
		margin-bottom: 40px;
		font-size: 28px;
		color: #FFF;
		text-align: center;
	}

	button.social-signin {
		margin-bottom: 20px;
		width: 220px;
		height: 36px;
		border: none;
		border-radius: 2px;
		color: #FFF;
		font-family: 'Roboto', sans-serif;
		font-weight: 500;
		transition: 0.2s ease;
		cursor: pointer;
	}

	button.social-signin:hover,
	button.social-signin:focus {
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
		transition: 0.2s ease;
	}

	button.social-signin:active {
		box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
		transition: 0.2s ease;
	}

	button.social-signin.facebook {
		background: #32508E;
	}

	button.social-signin.twitter {
		background: #55ACEE;
	}

	button.social-signin.google {
		background: #DD4B39;
	}

	p {
		font-size: 13px;
		font-weight: 500;
		color: red;
	}
</style>

<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'placeholder' => "Username",
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'placeholder' => "E-mail",
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'placeholder' => "Password",
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'placeholder' => "Confirm password",
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'placeholder' => "Confirmation Code",
	'maxlength'	=> 8,
);
?>
<form id="login-box" action="<?php echo base_url(); ?>auth/register" method="post" accept-charset="utf-8">
	<div class="left">
		<h1>Sign up</h1>
		<?php if ($use_username) { ?>
			<tr>
				<td><?php echo form_input($username); ?></td>
				<td style="color: red;"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']]) ? $errors[$username['name']] : ''; ?></td>
			</tr>
		<?php } ?>
		<tr>
			<td><?php echo form_input($email); ?></td>
			<td style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']]) ? $errors[$email['name']] : ''; ?></td>
		</tr>
		<tr>
			<td><?php echo form_password($password); ?></td>
			<td style="color: red;"><?php echo form_error($password['name']); ?></td>
		</tr>
		<tr>
			<td><?php echo form_password($confirm_password); ?></td>
			<td style="color: red;"><?php echo form_error($confirm_password['name']); ?></td>
		</tr>



		<?php if ($captcha_registration) {
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
						<p style="color: #000000;">Enter the code exactly as it appears:</p>
						<?php echo $captcha_html; ?>
					</td>
				</tr>
				<tr>
					<td><?php echo form_input($captcha); ?></td>
					<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
				</tr>
		<?php }
		} ?>
		<tr>
			<?php echo form_submit('register', 'Register'); ?>

		</tr>
	</div>
	<div class="right">
		<span class="loginwith">Sign in with<br />social network</span>

		<a href=""><button class="social-signin facebook">Log in with facebook</button></a>
		<a href=""><button class="social-signin twitter">Log in with Twitter</button></a>
		<a href=""><button class="social-signin google">Log in with Google+</button></a>
	</div>
	<div class="or">OR</div>
	</div>
	<?php echo form_close(); ?>