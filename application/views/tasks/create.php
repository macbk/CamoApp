<div class="card">
	<div class="card-header">
	Add tasks:
</div>
<div class="card-body">
	<form>
		<div class="form-row">
			<div class="form-group col-md-8">
				<input type="text" class="form-control" id="inputTask" placeholder="Task">
			</div>
			<div class="form-group col-md-2">
				<input type="text" class="form-control" id="inputDeadline" placeholder="Deadline">
			</div>
			<div class="form-group col-md-2">
				<div>
					<button type="button" class="btn btn-success" id="add-btn">+</button>
				</div>
			</div>
		</div>
	</form>
	<div>
		<h4>Tasks:</h4>
		<table class="table table-sm table-hover">
			<tbody id="table-body">
				<!-- <tr id="task-0">
					<th scope="row">1</th>
					<td>EMM/05-55/...</td>
					<td>500 FH</td>
					<td>DEL</a></td>
				</tr> -->
			</tbody>
		</table>
	</div>
</div>
	<div class="card-footer text-muted">
		<a href="<?php echo base_url() . "statements/display/" . $this->uri->segment(3); ?>" class="card-link">Back</a>
		<a href="<?php echo base_url() . "statements/display/" . $this->uri->segment(3); ?>" class="card-link disabled" id="save-btn">Save</a>
	</div>
</div>

<script src="<?php echo base_url(); ?>assets/js/task_create.js"></script>