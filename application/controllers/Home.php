<?php 

	class Home extends CI_Controller
	{
		
		public function index()
		{	
			if ($this->session->userdata('logged_in')) {
				redirect('statements/index');
			} else {
				$this->load->view('users/login_view');
			}
		}
	}

 ?>