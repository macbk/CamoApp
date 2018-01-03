<?php 

class Statement_model extends CI_Model
{
	public function create_statement($data)
	{
		$this->db->insert('statements', $data);
		return $this->db->insert_id();
	}

	public function get_statement($statement_id)
	{	
		$this->db->where('id', $statement_id);
		$query = $this->db->get('statements');
		return $query->row();
	}

	public function get_all_statements($active)
	{
		if ($active) {
			$this->db->where('active', TRUE);
		} else {
			$this->db->where('active', FALSE);
		}
		$this->db->order_by('ac_reg', 'inc');
		$query = $this->db->get('statements');
		return $query->result();
	}
}

?>