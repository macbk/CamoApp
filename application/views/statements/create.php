<div class="card">
  <div class="card-header">
	New statements:
	<?php echo validation_errors("<p class='bg-danger'>"); ?>
  </div>
  <div class="card-body">

  	<?php $attributes = array('id' => 'create_form'); ?>

  	<?php echo form_open('statements/create', $attributes); ?>

  		<div class="form-row">
  			<div class="form-group col-md-6">
  				<?php echo form_label('Aircraft:');?>
				<?php $data = array(
					'class' => 'form-control',
					'name' => 'ac_reg',
					'placeholder' => 'Enter Register Number'
					);
				?>
				<?php echo form_input($data); ?>
  			</div>
  			<div class="form-group col-md-6">
  				<?php echo form_label('Statement number:');?>
				<?php $data = array(
					'class' => 'form-control',
					'name' => 'ms_num',
					'placeholder' => 'Enter MS Number',
					// 'disabled' => TRUE
					);
				?>
				<?php echo form_input($data); ?>
  			</div>
  		</div>

  		<div class="form-row">
	  		<div class="form-group col-md-6">
	  			<?php echo form_label('CRS:');?>
				<?php $data = array(
					'class' => 'form-control',
					'name' => 'crs',
					'placeholder' => 'Enter CRS number'
					);
					?>
				<?php echo form_input($data); ?>
	  		</div>
	  		<div class="form-group col-md-6">
	  			<?php echo form_label('Maintenance Organization:');?>
				<?php $data = array(
					'class' => 'form-control',
					'name' => 'organization',
					'placeholder' => 'Enter Maintenance Organization'
					);
					?>
				<?php $options = array('SOT Warszawa' => 'SOT Warszawa', 'SOT Szczecin' => 'SOT Szczecin'); ?>
				<?php echo form_dropdown($data, $options); ?>
	  		</div>
	  	</div>

	  	<div class="form-row">
	  		<div class="form-group col-md-6">
	  			<?php echo form_label('Aircraft Flight Hours:');?>
				<?php $data = array(
					'class' => 'form-control',
					'name' => 'crs_fh',
					'placeholder' => 'Enter Flight Hours'
					);
					?>
				<?php echo form_input($data); ?>
	  		</div>
	  		<div class="form-group col-md-6">
	  			<?php echo form_label('Date of CRS:');?>
				<?php $data = array(
					'class' => 'form-control',
					'name' => 'crs_date',
					'type' => 'date'
					);
					?>
				<?php echo form_input($data); ?>
	  		</div>
	  	</div>
		<?php $data = array(
			'class' => 'btn btn-primary',
			'name' => 'submit',
			'value' => 'Create',
			); 
		?>
		<!-- <?php echo form_submit($data); ?> -->

	<?php echo form_close(); ?>

  </div>
  <div class="card-footer text-muted">
	<a href="<?php echo base_url(); ?>statements/index" class="card-link">Back</a>
	<a href="#" class="card-link" value="submit" onclick="submitForm()">Create</a>
  </div>
</div>

<script>
	function submitForm() {
		document.getElementById('create_form').submit();
	}
</script>