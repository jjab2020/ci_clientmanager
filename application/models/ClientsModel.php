<?php
class ClientsModel extends CI_Model
{

	public function get_clients($start, $length)
	{
		$this->db->select('*');
		$this->db->from('client');
		$this->db->join('ville', 'ville.idVille = client.idVille');
		$this->db->limit($length,$start); 
		
		return $this->db->get();
	}

	public function get_total_clients()
	{
		return $this->db->count_all_results('client'); 
	}

	public function getVilles(){
		return $this->db->get('ville')->result_array();	

	}

}