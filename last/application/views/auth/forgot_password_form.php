<style>
	body {
		background: #fff;
		font-family: "Open Sans", Arial, "Lucida Grande", sans-serif;
		font-size: 13px;
		line-height: 18px;
		text-shadow: 0 0 1px rgba(0, 0, 0, 0.01);
		color: #555;
		position: relative;
		background-position: 0 0;
		padding-top: 60px;
		background: #f4f4f4;
	}

	div#wrapper {
		padding: 20px;
		margin: auto;
		height: 211px;
		margin: 6% auto;
	}

	div#header {
		height: auto;
		margin: 0 0 27px;
	}

	.row.left10 {
		padding-left: 10px;
	}

	form {
		width: 280px;
		margin: 0;
	}

	label {
		display: block;
		font-size: 13px;
		line-height: 18px;
		cursor: pointer;
		margin-bottom: 11px;
	}

	.slim .row {
		margin: 0 0 18px -12px;
		width: 100%;
	}

	.login-window {
		background: #fff;
		padding: 30px 30px 60px 30px;
		-webkit-border-radius: 3px;
		-moz-border-radius: 3px;
		border-radius: 3px;
		border: solid 1px #ddd;
		-webkit-box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
		-moz-box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
		box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.25);
		position: relative;
	}

	.slim .box01 {
		width: 340px;
		/* margin-left: 320px; */
		margin: auto;
	}

	h1 {
		color: #000000;
	}

	.resetbtn_margin {
		margin-left: 60px;
	}

	button#loginBtn {
		width: 200px;
		height: 33px;
		border: 1px solid #1000ff;
		border-radius: 5px;
		margin-left: -59px;
		margin-top: -3px;
		background: #0400ff;
		color: #fff !important;
	}

	input#login {
		background: #ffffff;
		width: 200px;
		height: 30px;
		border-radius: 5px;
		border: 1px solid #263ee8;
		padding: 10px 8px;
	}

	button#loginBtn {
		width: 200px;
		height: 33px;
		border: 1px solid #1000ff;
		border-radius: 5px;
		margin-left: -59px;
		margin-top: 5px;
		background: #0400ff;
		color: #fff !important;
	}

	small.error {
		color: red;
	}
</style>

<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'class'	=> 'small input-text',
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}

$error_message = '';
if (form_error($login['name']) != '') {
	$error_message = "<small class=\"error\">" . str_replace("Login field", "Email field", form_error($login['name'])) . "</small>";
}

if (isset($errors[$login['name']])) {
	$error_message .= "<small class=\"error\">" . str_replace("Login", "Email", $errors[$login['name']]) . "</small>";
} ?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Forget Password Email Send</title>
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
					<div class="login-window">
						<div id="header">
							<h1>Reset Password</h1>
						</div>

						<?php echo $error_message; ?>

						<div class="row left10">

							<?php echo form_open($this->uri->uri_string(), array('class' => 'nicely')); ?>
							<?php echo form_label($login_label, $login['id']); ?>
							<?php echo form_input($login); ?>

							<div class="logbtn resetbtn_margin">
								<button type="submit" id="loginBtn" class="nice radius button white">Reset Password</button>
							</div>
							</form>

						</div>
						<div style="margin-top:10px; font-size: 12px;">
							&copy; <?php echo date("Y"); ?> Developed by : IT LAB SOLUTIONS LTD.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
