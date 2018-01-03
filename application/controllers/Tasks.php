<?php 

class Tasks extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('logged_in')) {
			$this->session->set_flashdata('no_access', 'Sorry you are not allowed. Please login.');
			redirect('home/index');
		}
	}

	public function create($statement_id)
	{
		if ($dataAjax = $this->input->post('dataAjax')) {
			
			print_r($dataAjax);
			foreach ($dataAjax as $tasks_arr) {
				$data = array(
				'statement_id' => $statement_id,
				'task_name' => $tasks_arr['name'],
				'deadline_fh' => $tasks_arr['deadlineFh']
				);

				if ($this->task_model->create_task($data)) {
					
				}
			}
			
		} else {
			$data['statement_id'] = $statement_id;
			$data['main_view'] = 'tasks/create';
			$this->load->view('layouts/main', $data);
		}
	}

	public function delete($statement_id, $task_id)
	{
		if ($this->task_model->delete_task($task_id)) {
			//$this->session->set_flashdata('task_deleted', 'Task has been deleted');
			redirect('statements/display/' . $statement_id);
		}
	}
}

?>