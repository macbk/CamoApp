<!doctype html>
<html lang="en">
	<head>
		<title>Login Page</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/login.css">
	</head>
	<body>
		<div class="container">

			<!-- Login form -->
			<?php $attributes = array('id' => 'login_form', 'class' => 'form-signin'); ?>

			<?php echo form_open('users/login', $attributes); ?>

				<h2 class="form-signin-heading">Please log in</h2>

				<?php 
					if ($this->session->flashdata('errors')) {
						echo '<small class="form-text text-muted">' . $this->session->flashdata('errors') . '</small>';
					} else if ($this->session->flashdata('login_failed')) {
						echo '<small class="form-text">' . $this->session->flashdata('login_failed') . '</small>';
					} else if ($this->session->flashdata('no_access')) {
						echo '<small class="form-text">' . $this->session->flashdata('no_access') . '</small>';
					}
				?>

				<?php $data = array(
					'type' => 'email',
					'id' => 'inputEmail',
					'class' => 'form-control',
					'name' => 'email',
					'placeholder' => 'Email address',
					); ?>
				<?php echo form_input($data); ?>

				<?php $data = array(
					'class' => 'form-control',
					'name' => 'password',
					'placeholder' => 'Password',
					); ?>
				<?php echo form_password($data); ?>

				<?php $data = array(
				'class' => 'btn btn-lg btn-outline-info btn-block',
				'name' => 'submit',
				'value' => 'Login',
				); ?>
				<?php echo form_submit($data); ?>
			<?php echo form_close(); ?>

		</div> <!-- /container -->
	</body>
</html>