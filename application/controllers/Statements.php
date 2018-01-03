<?php 


class Statements extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('logged_in')) {
			$this->session->set_flashdata('no_access', 'Sorry you are not allowed. Please login.');
			redirect('home/index');
		}
	}

	public function index()
	{
		$data['active_statements'] = $this->statement_model->get_all_statements(TRUE);
		$data['draft_statements'] = $this->statement_model->get_all_statements(FALSE);
		$data['main_view'] = 'statements/index';
		$this->load->view('layouts/main', $data);
	}

	public function create()
	{
		define('AIRCRAFT', array(
								'SP-DXA' => '1206',
								'SP-DXB' => '1207',
								'SP-DXC' => '1208',
								'SP-DXD' => '1209'
								));

		$this->form_validation->set_rules('ac_reg', 'Aircraft Registration', 'trim|required');
    	$this->form_validation->set_rules('ms_num', 'MS Number', 'trim|required');

    	if ($this->form_validation->run() == FALSE) {
			$data['main_view'] = 'statements/create';
			$this->load->view('layouts/main', $data);	
    	} else {
    		$data = array(
    			'statement_user_id' => $this->session->userdata('user_id'),
    			'ac_reg' => $this->input->post('ac_reg'),
    			'ac_num' => AIRCRAFT[$this->input->post('ac_reg')],
    			'ms_num' => $this->input->post('ms_num'),
    			'crs' => $this->input->post('crs'),
    			'organization' => $this->input->post('organization'),
    			'crs_fh' => $this->input->post('crs_fh'),
    			'active' => FALSE
    			);
    		if ($last_statement_id = $this->statement_model->create_statement($data)) {
    			redirect('statements/display/' . $last_statement_id);
    		}
    	}
	}

	public function display($statement_id)
	{
		$data['tasks'] = $this->task_model->get_tasks_for_statement($statement_id);
		$data['statement_data'] = $this->statement_model->get_statement($statement_id);
		$data['main_view'] = 'statements/display';
		$this->load->view('layouts/main', $data);
	}

	public function sign($statement_id)
	{
		echo 'sign';
	}
}

?>