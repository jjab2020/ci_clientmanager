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

	public function getAllClient()
	{
		$this->db->select('c.idClient,CONCAT(c.prenomClient,"-",c.nomClient) nomClient');
		$this->db->from('client c');
		$this->db->join('ville v', 'v.idVille = c.idVille');
		return $this->db->get()->result_array();
	}
}
