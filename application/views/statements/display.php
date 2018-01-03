<div class="card">
  <div class="card-header">
	Maintenance Statement:
  </div>
  <div class="card-body">
	<h4><?php echo 'MS-' . $statement_data->ac_reg; ?></h4>
	<p>MS no: <?php echo $statement_data->ms_num; ?></p>

	<table class="table table-sm table-hover">
		<thead>
			<tr>
				<th scope="col"></th>
				<th scope="col">Task</th>
				<th scope="col">Deadline</th>
				<th scope="col" style="color:white;">Delete</th>
			</tr>
		</thead>
		<tbody class="table-body">
			<?php if($tasks): ?>
				<?php $counter = 1; ?>
				<?php foreach ($tasks as $task): ?>
					<tr id="<?php echo $task->id; ?>">
						<th scope="row"><?php echo $counter; ?></th>
						<td><?php echo $task->task_name; ?></td>
						<td><?php echo $task->deadline_fh; ?></td>
						<td><a href="<?php echo base_url() . 'tasks/delete/' . $task->statement_id . '/' . $task->id; ?>" class="btn btn-outline-danger btn-sm btn-list">X</a></td>
					</tr>
				<?php $counter++; ?>	
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<th scope="row">No tasks</th>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
  </div>
  <div class="card-footer text-muted">
	<a href="<?php echo base_url(); ?>statements/index" class="card-link">Back</a>
	<a href="<?php echo base_url() . "tasks/create/" . $statement_data->id; ?>" class="card-link"><?php echo ($tasks ? 'Edit Tasks' : 'Add Tasks'); ?></a>
	<a href="<?php echo base_url() . "statements/sign/" . $statement_data->id; ?>" class="card-link">Sign</a>
  </div>
</div>

<!-- JS code to remove Task from View after click on Button -->
<!-- <script type="text/javascript">
	document.querySelector('.table-body').addEventListener('click', function(event) {
		var elID = event.target.parentNode.parentNode.id;
		if (elID) {
			console.log(elID);
			var el = document.getElementById(elID);
			el.parentNode.removeChild(el);
			document.getElementById('sign-btn').textContent = "Save";
			document.getElementById('sign-btn').href = "<?php echo base_url() . 'tasks/delete/' . $task->statement_id; ?>"
		}
	});
</script> -->