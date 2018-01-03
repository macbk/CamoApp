<?php 

class Task_model extends CI_Model
{
	
	public function get_tasks_for_statement($statement_id)
	{
		$this->db->where('statement_id', $statement_id);
		$query = $this->db->get('tasks');
		return $query->result();

	}

	public function create_task($data)
	{
		$insert_data = $this->db->insert('tasks', $data);
		return $insert_data;
	}

	public function delete_task($task_id)
	{
		$this->db->where('id', $task_id);
		$this->db->delete('tasks');
		return TRUE;
	}


}

?>