<?php 

class User_model extends CI_Model
{
	public function login_user($email, $password)
	{	
		$this->db->where(array(
			'email' => $email,
			'password' => $password
		));
		$query = $this->db->get('users');
		$row = $query->row();
		if (isset($row)) {
			$id = $row->id;
			$name = $row->name;
			$result = array('id' => $id, 'name' => $name);
			return $result;
		} else {
			return FALSE;
		}
		
	}
}

 ?>