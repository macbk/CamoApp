<?php 
	class Users extends CI_Controller
	{
		public function login()
		{
			$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');

			if ($this->form_validation->run() == FALSE) {
				$data = array('errors' => validation_errors());
				$this->session->set_flashdata($data);
				redirect('home/index');
			} else {
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$result = $this->user_model->login_user($email, $password);
				$user_id = $result['id'];

				if ($user_id) {
					$user_data = array(
						'user_id' => $user_id,
						'name' => $result['name'],
						'logged_in' => TRUE
						);
					$this->session->set_userdata($user_data);
					$this->session->set_flashdata('login_success', 'Your are logged in');
					redirect('home/index');
				} else {
					$this->session->set_flashdata('login_failed', 'Invalid user');
					redirect('home/index');
				}
			}
		}
	

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home/index');
	}

}
?>