
<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'class' => 'form-control',
	'autocomplete' => 'off',
	'placeholder'	=> 'Enter E-mail',
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
	'autocomplete' => 'off',
	'placeholder'	=> 'Enter Password',
	'class'	=> 'check form-control',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'class' => 'custom-control-input',
	'id' => 'customCheckLogin',
	'type' => 'checkbox',
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
  <!-- Favicon -->
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/brand/favicon-32x32.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body class="bg-default">
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary pt-lg-4 pb-lg-4">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Welcome!</h1>
              <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
	<!-- Page content -->
	<form action="<?php echo base_url(); ?>auth/login" method="post" accept-charset="utf-8">
		<div class="container mt--8 pb-5">
		<div class="row justify-content-center">
			<div class="col-lg-5 col-md-7">
			<div class="card bg-secondary border-0 mb-0">
				<div class="card-header bg-transparent pb-3">
				<div class="text-muted text-center mt-2 mb-3"><small>Sign in with</small></div>
				<div class="btn-wrapper text-center">
					<a href="#" class="btn btn-neutral btn-icon">
					<span class="btn-inner--icon"><img src="<?php echo base_url(); ?>assets/img/icons/common/github.svg"></span>
					<span class="btn-inner--text">Github</span>
					</a>
					<a href="<?php echo base_url() ?>auth_oa2/session/google" class="btn btn-neutral btn-icon">
					<span class="btn-inner--icon"><img src="<?php echo base_url(); ?>assets/img/icons/common/google.svg"></span>
					<span class="btn-inner--text">Google</span>
					</a>
				</div>
				</div>
				<div class="card-body px-lg-3 py-lg-3">
				<div class="text-center text-muted mb-2">
					<small>Or sign in with credentials</small>
				</div>
				<form role="form">
					<div class="form-group mb-3">
					<div class="input-group input-group-merge input-group-alternative">
						<div class="input-group-prepend">
						<span class="input-group-text"><i class="ni ni-email-83"></i></span>
						</div>
						<?php echo form_input($login); ?>
					</div>
					<?php if(isset($errors[$login['name']]) ){ ?><div class="alert alert-danger"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']]) ? $errors[$login['name']] : ''; ?> </div><?php } ?>
					</div>
					<div class="form-group">
					<div class="input-group input-group-merge input-group-alternative">
						<div class="input-group-prepend">
						<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
						</div>
						<?php echo form_password($password); ?>
					</div>
					</div>
					<?php if(isset($errors[$password['name']])){ ?><div class="alert alert-danger"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']]) ? $errors[$password['name']] : ''; ?></div><?php } ?>
					<div class="custom-control custom-control-alternative custom-checkbox">
					<?php echo form_checkbox($remember); ?>
					<label class="custom-control-label" for=" customCheckLogin">
						<span class="text-muted">Remember me</span>
						<?php echo form_label('', $remember['id']); ?>
					</label>
					</div>
					<div class="text-center">
						<?php # echo form_submit('submit', 'Sing In'); ?>
						<input type="submit" value="Submit" class="btn btn-primary my-4">
					</div>
				</form>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-6">
				<a href="<?php echo base_url(); ?>auth/forgot_password" class="text-light"><small>Forgot password?</small></a>
				</div>
				<div class="col-6 text-right">
				<a href="<?php echo base_url(); ?>auth/register" class="text-light"><small>Create new account</small></a>
				</div>
			</div>
			</div>
		</div>
		</div>
	</form>
  </div>
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>