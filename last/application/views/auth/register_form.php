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
		padding-top: 0px !important;
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
	}

	.left {
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

	#loginBtn {
		margin-top: 2px;
		width: 262px;
		height: 41px;
		background: #16a085;
		border: none;
		border-radius: 2px;
		color: #FFF !important;
		font-family: 'Roboto', sans-serif;
		font-weight: 500;
		text-transform: uppercase;
		transition: 0.1s ease;
		cursor: pointer;
		letter-spacing: 1px;
	}


	#loginBtn:hover,
	#loginBtn:focus {
		opacity: 0.8;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
		transition: 0.1s ease;
	}

	#loginBtn:active {
		opacity: 1;
		box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
		transition: 0.1s ease;
	}

	.or {
		position: absolute;
		top: 180px;
		left: 307px;
		width: 29px;
		height: 29px;
		background: #DDD;
		border-radius: 50%;
		box-shadow: 0 2px 4px rgba(2, 0, 0, 0.4);
		line-height: 30px;
		text-align: center;
	}

	a {
		text-decoration: none;
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

	p.social-signin {
		margin-bottom: 20px;
		width: 220px;
		padding: 13px 9px;
		height: 16px;
		border: none;
		border-radius: 2px;
		color: #FFF;
		font-family: 'Roboto', sans-serif;
		font-weight: 500;
		transition: 0.2s ease;
		cursor: pointer;
	}

	p.social-signin:hover,
	p.social-signin:focus {
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
		transition: 0.2s ease;
	}

	p.social-signin:active {
		box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
		transition: 0.2s ease;
	}

	p.social-signin.facebook {
		background: #32508E;
	}

	p.social-signin.twitter {
		background: #55ACEE;
	}

	p.social-signin.google {
		background: #DD4B39;
	}

	p {
		font-size: 13px;
		font-weight: 500;
		color: red;
	}

	::placeholder {
		color: #16a085;
		opacity: .7;
		/* Firefox */
	}

	.error_all {
		width: 580px;
		background: #ffffff;
		height: 150px;
		position: relative;
		transform: translate(0px, 150px);
		z-index: 99;
		padding: 10px;
		margin: 3% auto 0%;
		box-shadow: 0 16px 24px rgba(0, 0, 0, 0.4);
	}

	.slim .row {
		margin: 0;
		width: 100%;
	}

	.slim .box01 {
		width: 100% !important;
		margin: 0 !important;
	}

	.regbtn_margin {
		margin-left: 0px !important;
	}
</style>

<?php
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'placeholder' => 'Email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'class'	=> 'small input-text',
);

$username = array(
	'name'	=> 'username',
	'id'	=> 'username',
	'placeholder' => 'Username',
	'autocomplete' => 'off',
	'value'	=> set_value('username'),
	'maxlength'	=> 50,
	'class'	=> 'small input-text',
);
$firstname = array(
	'name'	=> 'firstname',
	'id'	=> 'firstname',
	'placeholder' => 'firstname',
	'value'	=> set_value('firstname'),
	'maxlength'	=> 20,
	'class'	=> 'small input-text',
);
$lastname = array(
	'name'	=> 'lastname',
	'id'	=> 'lastname',
	'placeholder' => 'lastname',
	'value'	=> set_value('lastname'),
	'maxlength'	=> 20,
	'class'	=> 'small input-text',
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'placeholder' => 'Password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'class'	=> 'small input-text',
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'placeholder' => 'Confirm Password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'class'	=> 'small input-text',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);


$error_message = '';
if (form_error($email['name']) != '') {
	$error_message = "<small class=\"error\">" . str_replace("Login field", "Email field", form_error($email['name'])) . "</small>";
}

if (isset($errors[$email['name']])) {
	$error_message .= "<small class=\"error\">" . str_replace("Login", "Email", $errors[$email['name']]) . "</small>";
}

if (form_error($username['name']) != '') {
	$error_message .= "<small class=\"error\">" . str_replace("Login field", "Username field", form_error($email['name'])) . "</small>";
}

if (isset($errors[$username['name']])) {
	$error_message .= "<small class=\"error\">" . str_replace("Login", "Username", $errors[$username['name']]) . "</small>";
}

if (form_error($firstname['name']) != '') {
	$error_message .= "<small class=\"error\">" . form_error($firstname['name']) . "</small>";
}

if (isset($errors[$firstname['name']])) {
	$error_message .= "<small class=\"error\">" . $errors[$firstname['name']] . "</small>";
}

if (form_error($lastname['name']) != '') {
	$error_message .= "<small class=\"error\">" . form_error($lastname['name']) . "</small>";
}

if (isset($errors[$lastname['name']])) {
	$error_message .= "<small class=\"error\">" . $errors[$lastname['name']] . "</small>";
}

if (form_error($password['name']) != '') {
	$error_message .= "<small class=\"error\">" . form_error($password['name']) . "</small>";
}

if (form_error($confirm_password['name']) != '') {
	$error_message .= "<small class=\"error\">" . form_error($confirm_password['name']) . "</small>";
}

$captcha_content = '';
if ($captcha_registration) {
	if ($use_recaptcha) {
		$captcha_content = '
		<div id="account-signup-divider" class="shared-divider">
			<div class="shared-divider-label">
				<span>Confirmation Code</span>
			</div>
		</div>

		<div id="recaptcha_image"></div>
		<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
		<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type(\'audio\')">Get an audio CAPTCHA</a></div>
		<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type(\'image\')">Get an image CAPTCHA</a></div>

		<div class="recaptcha_only_if_image">Enter the words above</div>
		<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />

		<div id="account-signup-divider" class="shared-divider"></div>
		';

		$captcha_content .= $recaptcha_html;
	} else {
		$captcha_content = '
		<div id="account-signup-divider" class="shared-divider">
			<div class="shared-divider-label">
				<span>Confirmation Code</span>
			</div>
		</div>

		<p>Enter the code exactly as it appears:</p>
		' . $captcha_html . '
		<p>' . form_label('Confirmation Code', $captcha['id']) . '</p>
		<p>' . form_input($captcha) . '</p>

		<div id="account-signup-divider" class="shared-divider"></div>
		';
	}
}

if (form_error('recaptcha_response_field') != '') {
	$error_message = "<small class=\"error\">" . form_error('recaptcha_response_field') . "</small>";
}

if (form_error($captcha['name']) != '') {
	$error_message = "<small class=\"error\">" . form_error($captcha['name']) . "</small>";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Registration Form</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en-us" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="imagetoolbar" content="no" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
	<link href="/css/main.css" media="all" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="wrapper">
		<div class="slim container">
			<div class="row">
				<div class="box01">
					<?php if (!empty($error_message)) { ?>
						<div class="error_all">
							<?php echo $error_message; ?>
						</div>
					<?php } ?>
					<div class="row left10">
						<form id="login-box" action="<?php echo base_url(); ?>auth/register" class="nicely" method="post" accept-charset="utf-8">
							<div class="left">
								<h1>Register</h1>
								<?php echo form_input($email); ?>

								<?php echo form_input($username); ?>

								<?php echo form_input($firstname); ?>

								<?php echo form_input($lastname); ?>

								<?php echo form_password($password); ?>

								<?php echo form_password($confirm_password); ?>

								<?php echo $captcha_content; ?>

								<div class="logbtn regbtn_margin">
									<button type="submit" id="loginBtn" class="nice radius button white">Register</button>
								</div>
							</div>
							<div class="right">
								<span class="loginwith">Sign in with<br />social network</span>

								<a href="">
									<p class="social-signin facebook">Log in with facebook</p>
								</a>
								<a href="">
									<p class="social-signin twitter">Log in with Twitter</p>
								</a>
								<a href="<?php echo base_url(); ?>auth_oa2/session/google">
									<p class="social-signin google" title="Use Register In G-mail Account ">Log in with Google</p>
								</a>
							</div>
							<div class="or">OR</div>
					</div>
					</form>

					<!-- <div id="connect-with-buttons">
						<a href="/auth_oa2/session/facebook" class="connect-with-button account-sprites account-sprites-facebook" title="Facebook Connect"></a>
						<a href="/auth_oa2/session/google" class="connect-with-button marginleft13 account-sprites account-sprites-google" title="Google"></a>
					</div> -->
				</div>

			</div>
		</div>
	</div>
	</div>
</body>

</html>