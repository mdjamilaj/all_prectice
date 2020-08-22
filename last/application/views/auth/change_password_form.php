<style>
	form {
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
		width: 340px;
		margin: 5% auto;
	}

	label {
		display: block;
		font-size: 13px;
		line-height: 18px;
		cursor: pointer;
		margin-bottom: 11px;
	}

	input {
		background: #ffffff;
		width: 200px;
		height: 30px;
		border-radius: 5px;
		border: 1px solid #263ee8;
		padding: 10px 8px;
	}

	input[type="submit"] {
		width: 200px;
		height: 33px;
		border: 1px solid #1000ff;
		border-radius: 5px;
		margin-top: 5px;
		background: #0400ff;
		color: #fff !important;
	}
</style>


<?php
$old_password = array(
	'name'	=> 'old_password',
	'id'	=> 'old_password',
	'value' => set_value('old_password'),
	'size' 	=> 30,
);
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size' 	=> 30,
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
<table>
	<tr>
		<?php echo form_label('Old Password', $old_password['id']); ?>
		<?php echo form_password($old_password); ?>
		<td style="color: red;"><?php echo form_error($old_password['name']); ?><?php echo isset($errors[$old_password['name']]) ? $errors[$old_password['name']] : ''; ?></td>
	</tr>
	<tr>
		<?php echo form_label('New Password', $new_password['id']); ?>
		<?php echo form_password($new_password); ?>
		<td style="color: red;"><?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']]) ? $errors[$new_password['name']] : ''; ?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Confirm New Password', $confirm_new_password['id']); ?></td>
		<td><?php echo form_password($confirm_new_password); ?></td>
		<td style="color: red;"><?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']]) ? $errors[$confirm_new_password['name']] : ''; ?></td>
	</tr>
	<tr>
		<div style="margin-top:10px; font-size: 12px;">
			© 2020 Developed by : IT LAB SOLUTIONS LTD.
		</div>
	</tr>
</table>
<?php echo form_submit('change', 'Change Password'); ?>
<?php echo form_close(); ?>