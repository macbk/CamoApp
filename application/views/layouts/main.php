<!doctype html>
<html lang="en">
	<head>
		<title>CamoApp</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="<?php echo base_url(); ?>">CamoApp</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Features</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Pricing</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" href="#">Disabled</a>
					</li>
				</ul>
				<?php if ($this->session->userdata('logged_in')): ?>
			      	<ul class="navbar-nav ml-auto">
			        	<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout (user: <?php echo $this->session->userdata('name') . ')'; ?></a></li>
			      	</ul>
		      	<?php endif; ?>
			</div>
		</nav>

		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php echo 'Last activity:' ?>
				</div>
				<div class="col-sm-9">
					<br>
					<?php $this->load->view($main_view); ?>
				</div>
			</div>
		</div>

	</body>
</html>