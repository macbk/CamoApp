<div class="card">
  <div class="card-header">
	Last statements:
  </div>
  <div class="card-body">
  	<h4>Actual:</h4>
	<table class="table table-sm table-hover">
<!-- 		<thead>
			<tr>
				<th scope="col"></th>
				<th scope="col">Actual</th>
				<th scope="col"></th>
			</tr>
		</thead> -->
		<tbody>
			<?php $counter = 1; ?>
			<?php foreach ($active_statements as $statement): ?>
				<tr>
					<th scope="row"><?php echo $counter; ?></th>
					<td><?php echo $statement->ac_reg . "-" . $statement->ms_num ?></td>
					<td><a href="<?php echo base_url() . "statements/display/" . $statement->id; ?>"><?php echo "Edit"; ?></a></td>
				</tr>
			<?php $counter++; ?>	
			<?php endforeach; ?>
		</tbody>
	</table>

	<h4>Draft:</h4>
	<table class="table table-sm table-hover">
<!-- 		<thead>
			<tr>
				<th scope="col"></th>
				<th scope="col">MS Number</th>
				<th scope="col"></th>
			</tr>
		</thead> -->
		<tbody>
			<?php $counter = 1; ?>
			<?php foreach ($draft_statements as $statement): ?>
				<tr>
					<th scope="row"><?php echo $counter; ?></th>
					<td><?php echo $statement->ac_reg . "-" . $statement->ms_num ?></td>
					<td><a href="<?php echo base_url() . "statements/display/" . $statement->id; ?>"><?php echo "Edit"; ?></a></td>
				</tr>
			<?php $counter++; ?>	
			<?php endforeach; ?>
		</tbody>
	</table>
  </div>
  <div class="card-footer text-muted">
	<a href="<?php echo base_url(); ?>statements/create" class="card-link">Create New</a>
  </div>
</div>